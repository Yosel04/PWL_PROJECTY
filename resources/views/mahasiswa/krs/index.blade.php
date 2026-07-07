@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">KRS Mahasiswa</h1>
                <p class="text-muted mb-0">
                    Daftar KRS milik {{ $mahasiswa->Fullname }}
                </p>
            </div>

            <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-primary rounded-3">
                + Daftar KRS
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-3">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Total SKS</th>
                        <th>Jumlah Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($krsList as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tahun_ajaran }}</td>
                            <td class="text-capitalize">{{ $item->semester }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($item->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($item->status == 'declined')
                                    <span class="badge bg-danger">Declined</span>
                                @else
                                    <span class="badge bg-secondary">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->total_sks }}</td>
                            <td>{{ $item->details->count() }}</td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.krs.show', $item->id) }}" class="btn btn-info btn-sm text-white">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada pengajuan KRS.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection