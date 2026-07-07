<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Kelas;
use App\Models\KrsDetail;
use Illuminate\Http\Request;

class KrsDetailController extends Controller
{
    public function index()
    {
        $krsdetail = KrsDetail::all();

        return view('krsdetail.index', compact('krsdetail'));
    }

    public function create()
    {
        $krs = Krs::all();
        $kelas = Kelas::all();

        return view('krsdetail.create', compact('krs', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_krs'   => 'required',
            'kode_kelas' => 'required',
            'status'     => 'required',
        ]);

        KrsDetail::create([
            'kode_krs'   => $request->kode_krs,
            'kode_kelas' => $request->kode_kelas,
            'status'     => $request->status,
        ]);

        return redirect()->route('krsdetail.index')
            ->with('success', 'Data KRS Detail berhasil ditambahkan.');
    }

    public function show($id)
    {
        $krsdetail = KrsDetail::findOrFail($id);

        return view('krsdetail.show', compact('krsdetail'));
    }

    public function edit($id)
    {
        $krsdetail = KrsDetail::findOrFail($id);
        $krs = Krs::all();
        $kelas = Kelas::all();

        return view('krsdetail.edit', compact('krsdetail', 'krs', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_krs'   => 'required',
            'kode_kelas' => 'required',
            'status'     => 'required',
        ]);

        $krsdetail = KrsDetail::findOrFail($id);

        $krsdetail->update([
            'kode_krs'   => $request->kode_krs,
            'kode_kelas' => $request->kode_kelas,
            'status'     => $request->status,
        ]);

        return redirect()->route('krsdetail.index')
            ->with('success', 'Data KRS Detail berhasil diupdate.');
    }

    public function destroy($id)
    {
        $krsdetail = KrsDetail::findOrFail($id);
        $krsdetail->delete();

        return redirect()->route('krsdetail.index')
            ->with('success', 'Data KRS Detail berhasil dihapus.');
    }
}