@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 900px; margin:auto;">
        <h2 class="fw-bold mb-4">Edit Dosen</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="Fullname" class="form-control" value="{{ old('Fullname', $dosen->Fullname) }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text" name="NIP" class="form-control" value="{{ old('NIP', $dosen->NIP) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="NIDN" class="form-control" value="{{ old('NIDN', $dosen->NIDN) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Pendidikan Terakhir</label>
                <input type="text" name="Pendidikan_Terakhir" class="form-control" value="{{ old('Pendidikan_Terakhir', $dosen->Pendidikan_Terakhir) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select name="Jurusan_id" class="form-control">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}"
                            {{ old('Jurusan_id', $dosen->Jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->Nama_Jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="Tempat_Lahir" class="form-control" value="{{ old('Tempat_Lahir', $dosen->Tempat_Lahir) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="Tanggal_Lahir" class="form-control" value="{{ old('Tanggal_Lahir', $dosen->Tanggal_Lahir) }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Alamat</label>
                <textarea name="Alamat" class="form-control" rows="4">{{ old('Alamat', $dosen->Alamat) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection