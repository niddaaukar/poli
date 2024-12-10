@extends('admin.layout.app')

@section('content')
<div class="container">
    <h1>Tambah Dokter</h1>
    
    <form action="{{ route('admin.dokter.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                 @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" required>
            @error('alamat')
                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                 @enderror
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" required>
            @error('no_hp')
                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                 @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('no_hp') is-invalid @enderror" autocomplete="new-password" required>
            @error('password')
                                     <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                 @enderror
        </div>
        <div class="form-group">
            <label for="id_poli">Poli</label>
            <select name="id_poli" class="form-control" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
