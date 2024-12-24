@extends('components.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <h1>Edit Dokter</h1>
        
        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $dokter->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="new-password" >
            </div>
            <div class="form-group">
                <label for="id_poli">Poli</label>
                <select name="id_poli" class="form-control" required>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit</button>
            <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection
