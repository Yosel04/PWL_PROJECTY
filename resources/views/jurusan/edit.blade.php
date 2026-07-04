@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 800px; margin:auto;">
        <h2 class="fw-bold mb-4">Edit Jurusan</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Jurusan</label>
                <input type="text" name="Kode_Jurusan" class="form-control" value="{{ old('Kode_Jurusan', $jurusan->Kode_Jurusan) }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Nama Jurusan</label>
                <input type="text" name="Nama_Jurusan" class="form-control" value="{{ old('Nama_Jurusan', $jurusan->Nama_Jurusan) }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection