@extends('admin.layout.app')
@section('content')
<div class="container">
    <h1>Edit Obat</h1>
    <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" id="nama_obat" value="{{ $obat->nama_obat }}" required>
        </div>
        <div class="mb-3">
            <label for="kemasan" class="form-label">Kemasan</label>
            <input type="text" name="kemasan" class="form-control" id="kemasan" value="{{ $obat->kemasan }}" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" value="{{ $obat->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
