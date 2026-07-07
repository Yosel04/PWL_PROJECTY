@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Tambah Kelas ke KRS</h1>
                <p class="text-muted mb-0">
                    Pilih kelas yang ingin dimasukkan ke KRS
                </p>
            </div>

            <a href="{{ route('mahasiswa.krs.show', $krs->id) }}" class="btn btn-secondary rounded-3">
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

        @if(session('error'))
            <div class="alert alert-danger rounded-3">{{ session('error') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <form action="{{ route('mahasiswa.krs.detail.store', $krs->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih Kelas</label>
                        <select name="kode_kelas" class="form-select rounded-3" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach($kelasList as $kelas)
                                <option value="{{ $kelas->id }}">
                                    {{ $kelas->kode_kelas }}
                                    - {{ $kelas->matakuliah->Nama_Mata_Kuliah ?? '-' }}
                                    ({{ $kelas->matakuliah->SKS ?? 0 }} SKS)
                                    - Dosen: {{ $kelas->dosen->Fullname ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-3">
                        Simpan ke KRS
                    </button>
                </form>
            </div>
        </div>

        @if($kelasList->count())
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Daftar Kelas Tersedia</h5>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead style="background:#d9e8ff;">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Mata Kuliah</th>
                                    <th>Dosen</th>
                                    <th>SKS</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelasList as $kelas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kelas->kode_kelas }}</td>
                                        <td>{{ $kelas->matakuliah->Nama_Mata_Kuliah ?? '-' }}</td>
                                        <td>{{ $kelas->dosen->Fullname ?? '-' }}</td>
                                        <td>{{ $kelas->matakuliah->SKS ?? '-' }}</td>
                                        <td>{{ $kelas->hari }}</td>
                                        <td>{{ $kelas->jam }}</td>
                                        <td>{{ $kelas->ruang_kelas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection