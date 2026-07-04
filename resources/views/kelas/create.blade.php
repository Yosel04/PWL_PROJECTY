@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 950px; margin:auto;">
        <h2 class="fw-bold mb-4">Tambah Kelas</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Kode Kelas</label>
                <input type="text" name="kode_kelas" class="form-control" value="{{ old('kode_kelas') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <select name="kode_mata_kuliah" class="form-control">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliah as $mk)
                        <option value="{{ $mk->id }}" {{ old('kode_mata_kuliah') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->Nama_Mata_Kuliah }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Dosen</label>
                <select name="kode_dosen" class="form-control">
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosen as $d)
                        <option value="{{ $d->id }}" {{ old('kode_dosen') == $d->id ? 'selected' : '' }}>
                            {{ $d->Fullname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-control">
                        <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                        <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Jam</label>
                    <select name="jam" class="form-control">
                        <option value="08:00 - 09:40">08:00 - 09:40</option>
                        <option value="09:50 - 11:30">09:50 - 11:30</option>
                        <option value="12:30 - 14:10">12:30 - 14:10</option>
                        <option value="17:00 - 18:40">17:00 - 18:40</option>
                        <option value="19:00 - 20:40">19:00 - 20:40</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control" value="{{ old('tahun_ajaran') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ruang Kelas</label>
                    <input type="text" name="ruang_kelas" class="form-control" value="{{ old('ruang_kelas') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Max</label>
                <input type="number" name="jumlah_max" class="form-control" value="{{ old('jumlah_max') }}">
            </div>

            <div class="mb-4">
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

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection