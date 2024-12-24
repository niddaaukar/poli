@extends('components.app')

@section('content')
<div class="container">
    <div class="card p-4">
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

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary ms-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
