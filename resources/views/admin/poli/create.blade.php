@extends('admin.layout.app')

@section('content')
<div class="container">
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
    </form>
</div>
@endsection
