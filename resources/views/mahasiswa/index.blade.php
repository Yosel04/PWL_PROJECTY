@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data Mahasiswa</h1>
                <p class="text-muted mb-0">Daftar data mahasiswa</p>
            </div>

            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>NISN</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->Fullname }}</td>
                            <td>{{ $m->NIM }}</td>
                            <td>{{ $m->NIDN }}</td>
                            <td>{{ $m->Tempat_Lahir }}</td>
                            <td>{{ $m->Tanggal_Lahir }}</td>
                            <td>{{ $m->Alamat }}</td>
                            <td>{{ $m->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection