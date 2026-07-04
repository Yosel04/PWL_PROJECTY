@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 900px; margin:auto;">
        <h2 class="fw-bold mb-4">Tambah Mata Kuliah</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Jurusan ID</label>
                <input type="text" name="Jurusan_Id" class="form-control" value="{{ old('Jurusan_Id') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Mata Kuliah</label>
                <input type="text" name="Kode_Mata_Kuliah" class="form-control" value="{{ old('Kode_Mata_Kuliah') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="Nama_Mata_Kuliah" class="form-control" value="{{ old('Nama_Mata_Kuliah') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">SKS</label>
                <input type="text" name="SKS" class="form-control" value="{{ old('SKS') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Dosen ID</label>
                <input type="text" name="Dosen_Id" class="form-control" value="{{ old('Dosen_Id') }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection