@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="bg-white rounded-4 shadow p-4" style="max-width: 900px; margin:auto;">
        <h2 class="fw-bold mb-4">Tambah KRS Detail</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('krsdetail.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">KRS</label>
                <select name="kode_krs" class="form-control">
                    <option value="">-- Pilih KRS --</option>
                    @foreach($krs as $item)
                        <option value="{{ $item->id }}" {{ old('kode_krs') == $item->id ? 'selected' : '' }}>
                            {{ $item->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kode_kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $item)
                        <option value="{{ $item->id }}" {{ old('kode_kelas') == $item->id ? 'selected' : '' }}>
                            {{ $item->kode_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="declined" {{ old('status') == 'declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('krsdetail.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection