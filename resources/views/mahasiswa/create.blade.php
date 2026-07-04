@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 900px; margin:auto;">
        <h2 class="fw-bold mb-4">Tambah Mahasiswa</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="Fullname" class="form-control" value="{{ old('Fullname') }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="NIM" class="form-control" value="{{ old('NIM') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="NIDN" class="form-control" value="{{ old('NIDN') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="Tempat_Lahir" class="form-control" value="{{ old('Tempat_Lahir') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="Tanggal_Lahir" class="form-control" value="{{ old('Tanggal_Lahir') }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Alamat</label>
                <textarea name="Alamat" class="form-control" rows="4">{{ old('Alamat') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection