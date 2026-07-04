<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $krs = Krs::all();

        return view('krs.index', compact('krs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();

        return view('krs.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Krs::create([

            'kode_mahasiswa' => $request->kode_mahasiswa,

            'tahun_ajaran' => $request->tahun_ajaran,

            'semester' => $request->semester,

            'status' => $request->status,

            'total_sks' => $request->total_sks

        ]);

        return redirect('/krs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);

        $krs->delete();

        return redirect('/krs');
    }
}