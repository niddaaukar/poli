@extends('components.app')
@section('content')
<div class="container">
    <div class="card p-4">
        <h2 class="my-4">Tambah Poli</h2>
        <form action="{{ route('admin.poli.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_poli" class="form-label">Nama Poli</label>
                <input type="text" name="nama_poli" class="form-control" id="nama_poli" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
