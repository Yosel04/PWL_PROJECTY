<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Halaman index
    public function index()
    {
        $kelas = Kelas::with(['dosen', 'matakuliah'])->get();

        return view('kelas.index', compact('kelas'));
    }

    // Halaman form tambah
    public function create()
    {
        $dosen = Dosen::all();
        $matakuliah = Matakuliah::all();

        return view('kelas.create', compact(
            'dosen',
            'matakuliah'
        ));
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required',
            'kode_mata_kuliah' => 'required',
            'kode_dosen' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'tahun_ajaran' => 'required',
            'ruang_kelas' => 'required',
            'jumlah_max' => 'required',
            'semester' => 'required',
        ]);

        Kelas::create([
            'kode_kelas' => $request->kode_kelas,
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'kode_dosen' => $request->kode_dosen,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'tahun_ajaran' => $request->tahun_ajaran,
            'ruang_kelas' => $request->ruang_kelas,
            'jumlah_max' => $request->jumlah_max,
            'semester' => $request->semester,
        ]);

        return redirect('/kelas')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    // Hapus kelas
    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();

        return redirect('/kelas')
            ->with('success', 'Kelas berhasil dihapus');
    }
}