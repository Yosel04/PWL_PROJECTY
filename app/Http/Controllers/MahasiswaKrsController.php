<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Krs;
use App\Models\KrsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaKrsController extends Controller
{
    /**
     * Ambil data mahasiswa dari user yang login
     */
    private function getMahasiswaLogin()
    {
        $user = Auth::user();

        if (!$user || !$user->mahasiswa) {
            abort(403, 'Akun mahasiswa ini belum terhubung ke data mahasiswa.');
        }

        return $user->mahasiswa;
    }

    /**
     * Hitung ulang total SKS berdasarkan detail KRS
     */
    private function recalculateKrs($krs)
    {
        $detailKrs = KrsDetail::with('kelas.matakuliah')
            ->where('kode_krs', $krs->id)
            ->get();

        $totalSks = 0;

        foreach ($detailKrs as $detail) {
            if ($detail->kelas && $detail->kelas->matakuliah) {
                $totalSks += (int) $detail->kelas->matakuliah->SKS;
            }
        }

        $krs->update([
            'total_sks' => $totalSks,
        ]);
    }

    /**
     * List KRS milik mahasiswa login
     */
    public function index()
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $krsList = Krs::with('details')
            ->where('kode_mahasiswa', $mahasiswa->id)
            ->latest()
            ->get();

        return view('mahasiswa.krs.index', compact('mahasiswa', 'krsList'));
    }

    /**
     * Form buat KRS baru
     */
    public function create()
    {
        $mahasiswa = $this->getMahasiswaLogin();

        return view('mahasiswa.krs.create', compact('mahasiswa'));
    }

    /**
     * Simpan KRS baru
     */
    public function store(Request $request)
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $request->validate([
            'tahun_ajaran' => 'required|string|max:50',
            'semester' => 'required|in:ganjil,genap',
        ]);

        $krs = Krs::create([
            'kode_mahasiswa' => $mahasiswa->id,
            'tahun_ajaran'   => $request->tahun_ajaran,
            'semester'       => $request->semester,
            'status'         => 'pending',
            'total_sks'      => 0,
        ]);

        return redirect()
            ->route('mahasiswa.krs.show', $krs->id)
            ->with('success', 'KRS berhasil dibuat. Silakan tambahkan kelas ke KRS.');
    }

    /**
     * Detail KRS milik mahasiswa login
     */
    public function show($id)
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $krs = Krs::with([
            'details.kelas.matakuliah',
            'details.kelas.dosen'
        ])
            ->where('id', $id)
            ->where('kode_mahasiswa', $mahasiswa->id)
            ->firstOrFail();

        return view('mahasiswa.krs.show', compact('mahasiswa', 'krs'));
    }

    /**
     * Form tambah detail kelas ke KRS
     */
    public function createDetail($id)
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $krs = Krs::where('id', $id)
            ->where('kode_mahasiswa', $mahasiswa->id)
            ->firstOrFail();

        if ($krs->status !== 'pending') {
            return redirect()
                ->route('mahasiswa.krs.show', $krs->id)
                ->with('error', 'KRS yang sudah diproses dosen tidak bisa ditambah kelas lagi.');
        }

        $kelasDipilih = KrsDetail::where('kode_krs', $krs->id)
            ->pluck('kode_kelas')
            ->toArray();

        $kelasList = Kelas::with(['matakuliah', 'dosen'])
            ->whereNotIn('id', $kelasDipilih)
            ->get();

        return view('mahasiswa.krs.add-detail', compact('mahasiswa', 'krs', 'kelasList'));
    }

    /**
     * Simpan detail kelas ke KRS
     */
    public function storeDetail(Request $request, $id)
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $krs = Krs::where('id', $id)
            ->where('kode_mahasiswa', $mahasiswa->id)
            ->firstOrFail();

        if ($krs->status !== 'pending') {
            return redirect()
                ->route('mahasiswa.krs.show', $krs->id)
                ->with('error', 'KRS yang sudah diproses dosen tidak bisa diubah lagi.');
        }

        $request->validate([
            'kode_kelas' => 'required|exists:kelas,id',
        ]);

        $sudahAda = KrsDetail::where('kode_krs', $krs->id)
            ->where('kode_kelas', $request->kode_kelas)
            ->exists();

        if ($sudahAda) {
            return back()->with('error', 'Kelas ini sudah ada di KRS.');
        }

        KrsDetail::create([
            'kode_krs'   => $krs->id,
            'kode_kelas' => $request->kode_kelas,
            'status'     => 'pending',
        ]);

        $this->recalculateKrs($krs);

        $krs->update([
            'status' => 'pending',
        ]);

        return redirect()
            ->route('mahasiswa.krs.show', $krs->id)
            ->with('success', 'Kelas berhasil ditambahkan ke KRS.');
    }

    /**
     * Hapus detail kelas dari KRS mahasiswa
     */
    public function destroyDetail($krsId, $detailId)
    {
        $mahasiswa = $this->getMahasiswaLogin();

        $krs = Krs::where('id', $krsId)
            ->where('kode_mahasiswa', $mahasiswa->id)
            ->firstOrFail();

        if ($krs->status !== 'pending') {
            return redirect()
                ->route('mahasiswa.krs.show', $krs->id)
                ->with('error', 'KRS yang sudah diproses dosen tidak bisa diubah lagi.');
        }

        $detail = KrsDetail::where('id', $detailId)
            ->where('kode_krs', $krs->id)
            ->firstOrFail();

        $detail->delete();

        $this->recalculateKrs($krs);

        return redirect()
            ->route('mahasiswa.krs.show', $krs->id)
            ->with('success', 'Kelas berhasil dihapus dari KRS.');
    }
}