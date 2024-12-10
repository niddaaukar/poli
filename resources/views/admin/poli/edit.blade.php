@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Poli</h2>
    <form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_poli" class="form-label">Nama Poli</label>
            <input type="text" name="nama_poli" class="form-control" id="nama_poli" value="{{ $poli->nama_poli }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan">{{ $poli->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
