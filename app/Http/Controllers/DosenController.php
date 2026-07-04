<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with('jurusan')->latest()->get();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $jurusans = Jurusan::orderBy('Nama_Jurusan', 'asc')->get();
        return view('dosen.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fullname' => 'required|max:255',
            'NIP' => 'required|max:255|unique:table_dosen,NIP',
            'NIDN' => 'required|max:255|unique:table_dosen,NIDN',
            'Pendidikan_Terakhir' => 'required|max:255',
            'Jurusan_id' => 'required|exists:jurusan,id',
            'Tempat_Lahir' => 'required|max:255',
            'Tanggal_Lahir' => 'required|date',
            'Alamat' => 'required',
        ]);

        Dosen::create([
            'Fullname' => $request->Fullname,
            'NIP' => $request->NIP,
            'NIDN' => $request->NIDN,
            'Pendidikan_Terakhir' => $request->Pendidikan_Terakhir,
            'Jurusan_id' => $request->Jurusan_id,
            'Tempat_Lahir' => $request->Tempat_Lahir,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Alamat' => $request->Alamat,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $jurusans = Jurusan::orderBy('Nama_Jurusan', 'asc')->get();

        return view('dosen.edit', compact('dosen', 'jurusans'));
    }

    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'Fullname' => 'required|max:255',
            'NIP' => 'required|max:255|unique:table_dosen,NIP,' . $dosen->id,
            'NIDN' => 'required|max:255|unique:table_dosen,NIDN,' . $dosen->id,
            'Pendidikan_Terakhir' => 'required|max:255',
            'Jurusan_id' => 'required|exists:jurusan,id',
            'Tempat_Lahir' => 'required|max:255',
            'Tanggal_Lahir' => 'required|date',
            'Alamat' => 'required',
        ]);

        $dosen->update([
            'Fullname' => $request->Fullname,
            'NIP' => $request->NIP,
            'NIDN' => $request->NIDN,
            'Pendidikan_Terakhir' => $request->Pendidikan_Terakhir,
            'Jurusan_id' => $request->Jurusan_id,
            'Tempat_Lahir' => $request->Tempat_Lahir,
            'Tanggal_Lahir' => $request->Tanggal_Lahir,
            'Alamat' => $request->Alamat,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}