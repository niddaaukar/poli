@extends('components.app')

@push('title')
    <title>Profil Dokter - Poliklinik Udinus</title>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/core/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/core/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/core/demo.css') }}" />
@endpush

@push('scripts')
    <script src="{{ asset('vendor/helpers.js') }}"></script>
@endpush

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan Akun /</span> Profil Dokter</h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dokter.profil.index') }}">Kembali</a>
                    </li>
                </ul>

                <!-- Profil Dokter -->
                <div class="card mb-4">
                    <h5 class="card-header">Ubah Profil</h5>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dokter.profil.edit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="nama" class="col-form-label">Nama<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $dokter->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="no_hp" class="col-form-label">No HP<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp', $dokter->no_hp) }}" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="alamat" class="col-form-label">Alamat<span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="id_poli" class="col-form-label">Poli<span class="text-danger">*</span></label>
                                    <select class="form-control @error('id_poli') is-invalid @enderror" name="id_poli" id="id_poli" required>
                                        <option value="" disabled selected>Pilih Poli</option>
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>{{ $poli->nama_poli}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_poli')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Ubah Password -->
                <div class="card">
                    <h5 class="card-header">Ubah Password</h5>
                    <div class="card-body">
                        <form action="{{ route('dokter.password.edit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Saat Ini<span class="text-danger">*</span></label>
                                <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru<span class="text-danger">*</span></label>
                                <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
