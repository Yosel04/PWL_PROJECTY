@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 900px; margin:auto;">
        <h2 class="fw-bold mb-4">Tambah KRS</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('krs.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Mahasiswa</label>
                <select name="kode_mahasiswa" class="form-control">
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach ($mahasiswa as $m)
                        <option value="{{ $m->id }}" {{ old('kode_mahasiswa') == $m->id ? 'selected' : '' }}>
                            {{ $m->Fullname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran') }}">
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Semester</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="semester" value="ganjil" {{ old('semester') == 'ganjil' ? 'checked' : '' }}>
                    <label class="form-check-label">Ganjil</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="semester" value="genap" {{ old('semester') == 'genap' ? 'checked' : '' }}>
                    <label class="form-check-label">Genap</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="partial" {{ old('status') == 'partial' ? 'selected' : '' }}>Partial</option>
                    <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Total SKS</label>
                <input type="number" name="total_sks" class="form-control" value="{{ old('total_sks') }}">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('krs.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection