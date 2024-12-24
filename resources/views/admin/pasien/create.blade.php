@extends('components.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Pasien Baru</h2>
        @include('components.alert')
        <!-- Wrapper dengan border putih dan desain sesuai dengan contoh -->
        <div class="form-wrapper p-4" style="border: 2px solid #dee2e6; border-radius: 8px; background-color: #ffffff;">
            <form action="{{ route('admin.pasien.store') }}" method="POST">
                @csrf

                <!-- Nama Field -->
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Alamat Field -->
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="form-control @error('alamat') is-invalid @enderror" required>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- No KTP Field -->
                <div class="form-group mb-3">
                    <label for="no_ktp">No KTP</label>
                    <input type="text" name="no_ktp" id="no_ktp"
                        class="form-control @error('no_ktp') is-invalid @enderror" required>
                    @error('no_ktp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- No HP Field -->
                <div class="form-group mb-3">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror" required>
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- No RM Field -->
                <div class="form-group mb-3">
                    <label for="no_rm">No RM</label>
                    <input type="text" name="no_rm" id="no_rm"
                        class="form-control @error('no_rm') is-invalid @enderror" value="{{ $no_rm }}" readonly
                        required>
                    @error('no_rm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
