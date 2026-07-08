@extends('layouts.app')

@section('content')
<div class="container page-container py-2">
    <div class="content-card p-4 p-lg-5">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div>
                <h1 class="page-title">Detail Pengajuan KRS</h1>
                <p class="page-subtitle">
                    Detail KRS mahasiswa dan proses approval dosen
                </p>
            </div>

            <a href="{{ route('dosen.krs.index') }}" class="btn btn-outline-secondary px-4">
                Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-4 border-0 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Ringkasan atas --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="section-card p-3 h-100">
                    <div class="info-label">Mahasiswa</div>
                    <div class="info-value">{{ $krs->mahasiswa->Fullname ?? '-' }}</div>
                    <div class="text-muted small mt-1">NIM: {{ $krs->mahasiswa->NIM ?? '-' }}</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="section-card p-3 h-100">
                    <div class="info-label">Periode KRS</div>
                    <div class="info-value">{{ $krs->tahun_ajaran }}</div>
                    <div class="text-muted small mt-1">Semester {{ ucfirst($krs->semester) }}</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="section-card p-3 h-100">
                    <div class="info-label">Status & Total SKS</div>
                    <div class="mb-2">
                        @if($krs->status == 'pending')
                            <span class="badge-status status-pending">Pending</span>
                        @elseif($krs->status == 'approved')
                            <span class="badge-status status-approved">Approved</span>
                        @elseif($krs->status == 'declined')
                            <span class="badge-status status-declined">Declined</span>
                        @else
                            <span class="badge-status status-default">{{ $krs->status }}</span>
                        @endif
                    </div>
                    <div class="text-muted small">Total SKS: <strong class="text-dark">{{ $krs->total_sks }}</strong></div>
                </div>
            </div>
        </div>

        {{-- Informasi KRS --}}
        <div class="section-card p-4 mb-4">
            <h5 class="fw-bold mb-3">Informasi KRS</h5>
            <hr class="soft-divider">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="info-label">Nama Mahasiswa</div>
                    <div class="info-value">{{ $krs->mahasiswa->Fullname ?? '-' }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="info-label">NIM</div>
                    <div class="info-value">{{ $krs->mahasiswa->NIM ?? '-' }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="info-label">Tahun Ajaran</div>
                    <div class="info-value">{{ $krs->tahun_ajaran }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="info-label">Semester</div>
                    <div class="info-value">{{ ucfirst($krs->semester) }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="info-label">Total SKS</div>
                    <div class="info-value">{{ $krs->total_sks }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="info-label">Status KRS</div>
                    <div>
                        @if($krs->status == 'pending')
                            <span class="badge-status status-pending">Pending</span>
                        @elseif($krs->status == 'approved')
                            <span class="badge-status status-approved">Approved</span>
                        @elseif($krs->status == 'declined')
                            <span class="badge-status status-declined">Declined</span>
                        @else
                            <span class="badge-status status-default">{{ $krs->status }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail Mata Kuliah / Kelas --}}
        <div class="section-card p-4 mb-4">
            <h5 class="fw-bold mb-3">Daftar Mata Kuliah yang Diambil</h5>
            <hr class="soft-divider">

            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 70px;">No</th>
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
                                            <span class="badge-status status-pending">Pending</span>
                                        @elseif($detail->status == 'approved')
                                            <span class="badge-status status-approved">Approved</span>
                                        @elseif($detail->status == 'declined')
                                            <span class="badge-status status-declined">Declined</span>
                                        @else
                                            <span class="badge-status status-default">{{ $detail->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-state">Belum ada detail KRS.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Tombol Approval --}}
        @if($krs->status === 'pending')
            <div class="section-card p-4">
                <h5 class="fw-bold mb-2">Aksi Approval</h5>
                <p class="text-muted mb-4">
                    Pilih approve jika KRS sudah sesuai, atau reject jika perlu ditolak.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <form action="{{ route('dosen.krs.approve', $krs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success px-4"
                            onclick="return confirm('Yakin ingin approve KRS ini?')">
                            Approve KRS
                        </button>
                    </form>

                    <form action="{{ route('dosen.krs.reject', $krs->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger px-4"
                            onclick="return confirm('Yakin ingin reject KRS ini?')">
                            Reject KRS
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-info rounded-4 border-0 shadow-sm mb-0">
                KRS ini sudah diproses dosen dan statusnya <strong>{{ ucfirst($krs->status) }}</strong>.
            </div>
        @endif

    </div>
</div>
@endsection