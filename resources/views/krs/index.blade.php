@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data KRS</h1>
                <p class="text-muted mb-0">Daftar data KRS</p>
            </div>

            <a href="{{ route('krs.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah KRS
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Kode Mahasiswa</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Total SKS</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($krs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_mahasiswa }}</td>
                            <td>{{ $item->tahun_ajaran }}</td>
                            <td>{{ $item->semester }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->total_sks }}</td>
                            <td class="text-center">
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted">Belum ada data KRS.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection