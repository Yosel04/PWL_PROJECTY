@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data KRS Detail</h1>
                <p class="text-muted mb-0">Daftar data KRS detail</p>
            </div>

            <a href="{{ route('krsdetail.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah KRS Detail
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Kode KRS</th>
                        <th>Kode Kelas</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($krsdetail as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_krs }}</td>
                            <td>{{ $item->kode_kelas }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="text-center">
                                <form action="{{ route('krsdetail.destroy', $item->id) }}" method="POST" class="d-inline">
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
                            <td colspan="5" class="text-center text-muted">Belum ada data KRS detail.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection