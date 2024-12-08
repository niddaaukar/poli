@extends('frontend.layout.app')
@section('content')
<!-- Main Content -->
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-center">
                                <h4 class="fw-bold">Form Registrasi Pasien</h4>
                                <p>Lengkapi data berikut untuk registrasi</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <!-- Nama Pasien -->
                                    <div class="mb-3">
                                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap" required>
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3 position-relative">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" id="togglePassword">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                    <!-- No HP -->
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="081234567890" required>
                                    </div>
                                    <!-- No KTP -->
                                    <div class="mb-3">
                                        <label for="no_ktp" class="form-label">No KTP</label>
                                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor KTP" required>
                                    </div>
                                    <!-- Alamat -->
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3" required></textarea>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Registrasi</button>
                                    </div>
                                </form>
                            </div>
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

        togglePassword.addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    });
</script>
@endsection
