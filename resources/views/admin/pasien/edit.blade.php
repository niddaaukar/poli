@extends('admin.layout.app')

@section('content')
    <h2 class="mb-4">Edit Pasien</h2>

    <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pasien->nama) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $pasien->alamat) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="no_ktp" class="form-label">No KTP</label>
                <input  type="text" name="no_ktp" id="no_ktp" class="form-control" value="{{ old('no_ktp', $pasien->no_ktp) }}"  required >
            </div>
            <div class="col-md-6 mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" id="no_hp"  class="form-control" value="{{ old('no_hp', $pasien->no_hp) }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input  type="password"  name="password"  id="password" class="form-control" autocomplete="new-password" >
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui Pasien</button>
        <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
