@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data Dosen</h1>
                <p class="text-muted mb-0">Daftar data dosen</p>
            </div>

            <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah Dosen
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#cfe2ff;">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>NIDN</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Jurusan</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dosens as $index => $dosen)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dosen->Fullname }}</td>
                            <td>{{ $dosen->NIP }}</td>
                            <td>{{ $dosen->NIDN }}</td>
                            <td>{{ $dosen->Pendidikan_Terakhir }}</td>
                            <td>{{ $dosen->jurusan ? $dosen->jurusan->Nama_Jurusan : '-' }}</td>
                            <td>{{ $dosen->Tempat_Lahir }}</td>
                            <td>{{ $dosen->Tanggal_Lahir }}</td>
                            <td>{{ $dosen->Alamat }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                Belum ada data dosen
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection