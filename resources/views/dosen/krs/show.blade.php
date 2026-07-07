@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">

        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Detail Pengajuan KRS</h1>
                <p class="text-muted mb-0">Detail KRS mahasiswa dan proses approval dosen</p>
            </div>

            <a href="{{ route('dosen.krs.index') }}" class="btn btn-secondary rounded-3">
                Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- Informasi KRS --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Informasi KRS</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">Nama Mahasiswa</label>
                        <div>{{ $krs->mahasiswa->Fullname ?? '-' }}</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-semibold">NIM</label>
                        <div>{{ $krs->mahasiswa->NIM ?? '-' }}</div>
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
            </div>
        </div>

        {{-- Detail Mata Kuliah / Kelas --}}
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Daftar Mata Kuliah yang Diambil</h5>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead style="background:#d9e8ff;">
                            <tr>
                                <th>No</th>
                                <th>Kode Kelas</th>
                                <th>Mata Kuliah</th>
                                <th>Dosen Pengampu</th>
                                <th>SKS</th>
                                <th>Status Detail</th>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada detail KRS.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Tombol Approval --}}
        @if($krs->status === 'pending')
        <div class="d-flex gap-2">
            <form action="{{ route('dosen.krs.approve', $krs->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success"
                    onclick="return confirm('Yakin ingin approve KRS ini?')">
                    Approve KRS
                </button>
            </form>

            <form action="{{ route('dosen.krs.reject', $krs->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Yakin ingin reject KRS ini?')">
                    Reject KRS
                </button>
            </form>
        </div>
    @else
        <div class="alert alert-info rounded-3 mb-0">
            KRS ini sudah diproses dosen dan statusnya <strong>{{ ucfirst($krs->status) }}</strong>.
        </div>
    @endif

    </div>
</div>
@endsection