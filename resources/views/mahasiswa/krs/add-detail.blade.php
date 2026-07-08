@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">

        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-1">Tambah Kelas ke KRS</h1>
                <p class="text-muted mb-0">
                    Pilih kelas yang ingin dimasukkan ke KRS semester {{ ucfirst($krs->semester) }}
                    {{ $krs->tahun_ajaran }}
                </p>
            </div>

            <a href="{{ route('mahasiswa.krs.show', $krs->id) }}" class="btn btn-secondary rounded-3">
                Kembali
            </a>
        </div>

        @if(session('error'))
            <div class="alert alert-danger rounded-3">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger rounded-3">
                <div class="fw-semibold mb-2">Ada data yang belum sesuai:</div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- info singkat KRS --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Informasi KRS</h5>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="fw-semibold">Mahasiswa</label>
                        <div>{{ $mahasiswa->Fullname }}</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="fw-semibold">NIM</label>
                        <div>{{ $mahasiswa->NIM }}</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="fw-semibold">Status KRS</label>
                        <div>
                            @if($krs->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($krs->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($krs->status == 'declined')
                                <span class="badge bg-danger">Declined</span>
                            @else
                                <span class="badge bg-secondary">{{ $krs->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- form tambah kelas --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Pilih Kelas</h5>

                @if($kelasList->count() > 0)
                    <form action="{{ route('mahasiswa.krs.detail.store', $krs->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kode_kelas" class="form-label fw-semibold">Daftar Kelas Tersedia</label>
                            <select name="kode_kelas" id="kode_kelas" class="form-select" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelasList as $kelas)
                                    <option value="{{ $kelas->id }}" {{ old('kode_kelas') == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->kode_kelas }}
                                        | {{ $kelas->matakuliah->Nama_Mata_Kuliah ?? 'Mata kuliah tidak ditemukan' }}
                                        | {{ $kelas->matakuliah->SKS ?? 0 }} SKS
                                        | Dosen: {{ $kelas->dosen->Fullname ?? '-' }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">
                                Pilih satu kelas untuk ditambahkan ke KRS ini.
                            </small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary rounded-3">
                                Simpan Kelas
                            </button>

                            <a href="{{ route('mahasiswa.krs.show', $krs->id) }}" class="btn btn-outline-secondary rounded-3">
                                Batal
                            </a>
                        </div>
                    </form>
                @else
                    <div class="alert alert-info rounded-3 mb-0">
                        Semua kelas sudah masuk ke KRS ini, atau belum ada kelas yang tersedia untuk dipilih.
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection