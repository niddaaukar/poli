@extends('admin.layout.app')

@section('content')
    <h2 class="mb-4">Edit Pasien</h2>
    @include('components.alert')
    <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pasien->nama) }}" required>
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $pasien->alamat) }}" required>
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="no_ktp" class="form-label">No KTP</label>
                <input  type="text" name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" value="{{ old('no_ktp', $pasien->no_ktp) }}"  required >
                @error('no_ktp')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" id="no_hp"  class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $pasien->no_hp) }}" required>
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- No RM Field -->
        <div class="mb-3">
                <label for="no_rm">No RM</label>
                <input type="text" name="no_rm" id="no_rm" class="form-control @error('no_rm') is-invalid @enderror" value="{{ old('no_rm', $pasien->no_rm) }}" readonly required>
                @error('no_rm')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input  type="password"  name="password"  id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" >
            @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui Pasien</button>
        <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
