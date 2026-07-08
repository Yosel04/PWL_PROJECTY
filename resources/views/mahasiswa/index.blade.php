@extends('layouts.app')

@section('content')
<div class="container page-container py-2">
    <div class="content-card p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div>
                <h1 class="page-title">KRS Mahasiswa</h1>
                <p class="page-subtitle">
                    Daftar KRS milik {{ $mahasiswa->Fullname }}
                </p>
            </div>

            <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-primary px-4 py-2">
                + Daftar KRS
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-4 border-0 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-wrap">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Total SKS</th>
                            <th>Jumlah Kelas</th>
                            <th class="text-center" style="width: 130px;">Aksi</th>
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
                                        <span class="badge-status status-pending">Pending</span>
                                    @elseif($item->status == 'approved')
                                        <span class="badge-status status-approved">Approved</span>
                                    @elseif($item->status == 'declined')
                                        <span class="badge-status status-declined">Declined</span>
                                    @else
                                        <span class="badge-status status-default">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->total_sks }}</td>
                                <td>{{ $item->details->count() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('mahasiswa.krs.show', $item->id) }}" class="btn btn-info btn-sm text-white px-3">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-state">
                                    Belum ada pengajuan KRS.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection