<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        
        Jurusan::create($data);

        return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Data tidak ditemukan');
        }

        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        
        $data = $request->except(['_token', '_method']);
        
        $jurusan->update($data);

        return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}