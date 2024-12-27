@extends('components.app')

@push('title')
    <title>Profil Pasien</title>
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
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Managemen Akun </span>/ Profil Pasien</h4>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active bg-warning text-white" href="{{ route('homepage') }}">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </a>
                        </li>
                    </ul>
                    <!-- Ubah Profil -->
                    <div class="card mb-4">
                        <h5 class="card-header">Ubah Profil</h5>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ asset('img/avatar.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" />
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <form method="POST" action="{{ route('pasien.profil.update') }}" enctype="multipart/form-data" id="profileForm">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nama" class="col-form-label">Nama Pasien <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $pasien->nama) }}" required>
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-user me-1"></i>
                                            </span>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="no_hp" class="col-form-label">No HP <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}" required>
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-phone me-1"></i>
                                            </span>
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="no_ktp" class="col-form-label">No KTP <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" value="{{ old('no_ktp', $pasien->no_ktp) }}" required>
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-address-card me-1"></i>
                                            </span>
                                            @error('no_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="no_rm" class="col-form-label">No RM <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('no_rm') is-invalid @enderror" name="no_rm" id="no_rm" value="{{ old('no_rm', $pasien->no_rm) }}" readonly>
                                            <span class="input-group-text">
                                                <i class="fas fa-hospital"></i>
                                            </span>
                                            @error('no_rm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="alamat" class="col-form-label">Alamat <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-location-dot me-1"></i>
                                            </span>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Ubah Password -->
                    <div class="card">
                        <h5 class="card-header">Ubah Password</h5>
                        <div class="card-body">
                            <form action="{{ route('pasien.profil.update-password') }}" method="POST">
                                @csrf

                                <!-- Password Sekarang -->
                                <div class="form-group row pb-4 mx-1">
                                    <label for="password_sekarang" class="col-form-label">Password Sekarang <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="password" id="password_sekarang" name="password_sekarang" class="form-control @error('password_sekarang') is-invalid @enderror" placeholder="Masukan Password Sekarang" required autocomplete="current-password">
                                            <span class="input-group-text" onclick="togglePassword(this)" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash me-1"></i>
                                            </span>
                                            @error('password_sekarang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Baru -->
                                <div class="form-group row pb-4 mx-1">
                                    <label for="password_baru" class="col-form-label">Password Baru <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="password" id="password_baru" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror" placeholder="Masukan Password Baru" required autocomplete="new-password">
                                            <span class="input-group-text" onclick="togglePassword(this)" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash me-1"></i>
                                            </span>
                                            @error('password_baru')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="form-group row pb-4 mx-1">
                                    <label for="konfirmasi_password" class="col-form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control @error('konfirmasi_password') is-invalid @enderror" placeholder="Masukan Konfirmasi Password" required autocomplete="new-password">
                                            <span class="input-group-text" onclick="togglePassword(this)" style="cursor: pointer;">
                                                <i class="fa-solid fa-eye-slash me-1"></i>
                                            </span>
                                            @error('konfirmasi_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        function togglePassword(icon) {
            var input = icon.closest('div').querySelector('input');
            var type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            icon.querySelector('i').classList.toggle('fa-eye-slash');
            icon.querySelector('i').classList.toggle('fa-eye');
        }
    </script>
@endpush

@endsection
