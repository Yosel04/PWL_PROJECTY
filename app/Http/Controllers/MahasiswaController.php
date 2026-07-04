<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    public function create()
    {
        return view('mahasiswa.create', []);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        Mahasiswa::create($data);

        return redirect()->action([MahasiswaController::class, 'index']);
    }

    public function show($id)
    {
        return Mahasiswa::find($id);
    }

    public function edit($id)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => Mahasiswa::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'id', '_method');

        Mahasiswa::find($id)->update($data);

        return redirect()->action([MahasiswaController::class, 'index']);
    }

    public function destroy($id) // Tambahkan $id di sini
{
    \App\Models\Mahasiswa::find($id)->delete();

    return redirect()->action([MahasiswaController::class, 'index']);
}
}