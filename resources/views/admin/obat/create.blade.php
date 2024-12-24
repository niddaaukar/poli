@extends('components.app')
@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom">
            <h2 class="mb-0">Tambah Obat</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.obat.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_obat" class="form-label">Nama Obat</label>
                    <input type="text" name="nama_obat" class="form-control" id="nama_obat" required>
                </div>
                <div class="mb-3">
                    <label for="kemasan" class="form-label">Kemasan</label>
                    <input type="text" name="kemasan" class="form-control" id="kemasan" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
