<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = MataKuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
    $matakuliah = MataKuliah::all();
    return view('matakuliah.create', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        
        MataKuliah::create($data);

        return redirect()->route('matakuliah.index');
    }

    public function edit($id)
    {
        $matakuliah = MataKuliah::find($id);
        
        if (!$matakuliah) {
            return redirect()->route('matakuliah.index')->with('error', 'Data tidak ditemukan');
        }

        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $matakuliah = MataKuliah::find($id);
        
        $data = $request->except(['_token', '_method']);
        
        $matakuliah->update($data);

        return redirect()->route('matakuliah.index');
    }

    public function destroy($id)
    {
        $matakuliah = MataKuliah::find($id);
        $matakuliah->delete();

        return redirect()->route('matakuliah.index');
    }
}