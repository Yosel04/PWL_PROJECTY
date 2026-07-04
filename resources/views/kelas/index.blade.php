@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="fw-bold mb-1">Data Kelas</h1>
                <p class="text-muted mb-0">Daftar data kelas</p>
            </div>

            <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-lg rounded-3">
                + Tambah Kelas
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background:#d9e8ff;">
                    <tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Ruang Kelas</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Jumlah Max</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->kode_kelas }}</td>
                            <td>{{ $k->dosen->Fullname ?? '-' }}</td>
                            <td>{{ $k->matakuliah->Nama_Mata_Kuliah ?? '-' }}</td>
                            <td>{{ $k->ruang_kelas }}</td>
                            <td>{{ ucfirst($k->hari) }}</td>
                            <td>{{ $k->jam }}</td>
                            <td>{{ $k->tahun_ajaran }}</td>
                            <td>{{ ucfirst($k->semester) }}</td>
                            <td>{{ $k->jumlah_max }}</td>
                            <td class="text-center">
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline">
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
                            <td colspan="11" class="text-center text-muted">Belum ada data kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection