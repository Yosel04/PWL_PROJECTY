<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\KrsDetail;
use Illuminate\Http\Request;

class DosenKrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa'])
            ->latest()
            ->get();

        return view('dosen.krs.index', compact('krs'));
    }

    public function show($id)
    {
        $krs = Krs::with([
            'mahasiswa',
            'details.kelas.matakuliah',
            'details.kelas.dosen'
        ])->findOrFail($id);

        return view('dosen.krs.show', compact('krs'));
    }

    public function approve($id)
    {
        $krs = Krs::with('details')->findOrFail($id);

        // update status krs
        $krs->update([
            'status' => 'approved'
        ]);

        // update semua detail krs jadi approved
        KrsDetail::where('kode_krs', $krs->id)->update([
            'status' => 'approved'
        ]);

        return redirect()
            ->route('dosen.krs.show', $krs->id)
            ->with('success', 'KRS berhasil di-approve.');
    }

    public function reject($id)
    {
        $krs = Krs::with('details')->findOrFail($id);

        // update status krs
        $krs->update([
            'status' => 'declined'
        ]);

        // update semua detail krs jadi declined
        KrsDetail::where('kode_krs', $krs->id)->update([
            'status' => 'declined'
        ]);

        return redirect()
            ->route('dosen.krs.show', $krs->id)
            ->with('success', 'KRS berhasil di-reject.');
    }
}