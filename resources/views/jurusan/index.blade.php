@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data Jurusan</h1>
                <p class="text-muted mb-0">Daftar data jurusan</p>
            </div>

            <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah Jurusan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurusan as $j)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $j->Kode_Jurusan }}</td>
                            <td>{{ $j->Nama_Jurusan }}</td>
                            <td>{{ $j->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="text-center text-muted">Belum ada data jurusan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection