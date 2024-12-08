@extends('frontend.layout.app')

@section('content')
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <!-- Login Form Section -->
                    <div class="col-md-6 mx-auto">
                        <div class="card shadow">
                            <div class="card-header text-start">
                                <h4 class="fw-bold">Login</h4>
                                <p class="mb-0">Masukkan No HP dan Password Anda!</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <!-- No HP Input -->
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" id="no_hp" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            placeholder="Masukkan No HP Anda" required>
                                        @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Password Input -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan Password Anda" required>
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </button>
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Image Section -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a?q=80&w=600&fit=crop"
                                alt="OtoRent" class="img-fluid rounded shadow">
                            <h4 class="mt-3 fw-bold text-primary">OtoRent</h4>
                            <p class="text-muted">Solusi Praktis dan Menyenangkan untuk Setiap Perjalanan Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>
@endsection
