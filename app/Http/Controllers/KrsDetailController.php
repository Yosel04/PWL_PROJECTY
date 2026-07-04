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
        KrsDetail::create([
            'kode_krs' => $request->kode_krs,
            'kode_kelas' => $request->kode_kelas,
            'status' => $request->status
        ]);

        return redirect('/krsdetail');
    }
}