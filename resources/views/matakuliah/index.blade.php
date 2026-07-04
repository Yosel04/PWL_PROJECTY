@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data Mata Kuliah</h1>
                <p class="text-muted mb-0">Daftar data mata kuliah</p>
            </div>

            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah Mata Kuliah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Jurusan ID</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen ID</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matakuliah as $mk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mk->Jurusan_Id }}</td>
                            <td>{{ $mk->Kode_Mata_Kuliah }}</td>
                            <td>{{ $mk->Nama_Mata_Kuliah }}</td>
                            <td>{{ $mk->SKS }}</td>
                            <td>{{ $mk->Dosen_Id }}</td>
                            <td>{{ $mk->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
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
                            <td colspan="8" class="text-center text-muted">Belum ada data mata kuliah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection