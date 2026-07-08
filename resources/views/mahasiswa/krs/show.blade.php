@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">

        <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
            <div>
                <h1 class="fw-bold mb-1">Detail KRS Mahasiswa</h1>
                <p class="text-muted mb-0">Detail pengajuan KRS dan daftar kelas yang dipilih</p>
            </div>

            <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-secondary rounded-3">
                Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-3">
                {{ session('error') }}
            </div>
        @endif

        {{-- Informasi KRS --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                    <div>
                        <h5 class="fw-bold mb-3">Informasi KRS</h5>
                    </div>

                    @if($krs->status === 'pending')
                        <a href="{{ route('mahasiswa.krs.detail.create', $krs->id) }}" class="btn btn-primary rounded-3">
                            + Tambah Kelas
                        </a>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Nama Mahasiswa</label>
                        <div>{{ $mahasiswa->Fullname }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">NIM</label>
                        <div>{{ $mahasiswa->NIM }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Tahun Ajaran</label>
                        <div>{{ $krs->tahun_ajaran }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Semester</label>
                        <div>{{ ucfirst($krs->semester) }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Total SKS</label>
                        <div>{{ $krs->total_sks }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
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

                @if($krs->status !== 'pending')
                    <div class="alert alert-info mt-2 mb-0 rounded-3">
                        KRS ini sudah diproses dosen, jadi data kelas tidak bisa diubah lagi.
                    </div>
                @endif
            </div>
        </div>

        {{-- Daftar kelas --}}
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Daftar Mata Kuliah / Kelas</h5>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead style="background:#d9e8ff;">
                            <tr>
                                <th>No</th>
                                <th>Kode Kelas</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen</th>
                                <th>SKS</th>
                                <th>Status</th>
                                @if($krs->status === 'pending')
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($krs->details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->kelas->kode_kelas ?? '-' }}</td>
                                    <td>{{ $detail->kelas->matakuliah->Nama_Mata_Kuliah ?? '-' }}</td>
                                    <td>{{ $detail->kelas->dosen->Fullname ?? '-' }}</td>
                                    <td>{{ $detail->kelas->matakuliah->SKS ?? '-' }}</td>
                                    <td>
                                        @if($detail->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($detail->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($detail->status == 'declined')
                                            <span class="badge bg-danger">Declined</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $detail->status }}</span>
                                        @endif
                                    </td>

                                    @if($krs->status === 'pending')
                                        <td class="text-center">
                                            <form action="{{ route('mahasiswa.krs.detail.destroy', [$krs->id, $detail->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kelas ini dari KRS?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $krs->status === 'pending' ? 7 : 6 }}" class="text-center text-muted">
                                        Belum ada kelas yang ditambahkan ke KRS ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection