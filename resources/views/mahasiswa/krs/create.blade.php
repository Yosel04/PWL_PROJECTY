@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Buat Pengajuan KRS</h1>
                <p class="text-muted mb-0">Silakan isi tahun ajaran dan semester</p>
            </div>

            <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-secondary rounded-3">
                Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Mahasiswa</label>
                        <input type="text" class="form-control rounded-3" value="{{ $mahasiswa->Fullname }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control rounded-3" placeholder="Contoh: 2026/2027" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Semester</label>
                        <select name="semester" class="form-select rounded-3" required>
                            <option value="">-- Pilih Semester --</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-3">
                        Buat KRS
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection