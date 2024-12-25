@extends('frontend.layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/frontend/page-auth.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('img/login-register/login.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
        }
    </style>
@endpush


@section('content')
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2">Login</h4>
                        <p class="mb-4">Masukan Nomor Telephone dan Password dengan benar 👋</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Telephone</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" placeholder="Nomor Telephone" value="{{ old('no_hp') }}"
                                    required autofocus />
                                @error('no_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Masukan Password" aria-describedby="togglePassword" required />
                                    <span class="input-group-text cursor-pointer" id="togglePassword">
                                        <i class="fa-solid fa-eye-slash" id="togglePassword" styles="cursor: pointer;"> </i> 
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                        <p class="text-center">
                            <span>Belum memiliki akun?</span>
                            <a href="{{ route('register') }}">
                            <span>Registrasi disini</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection

