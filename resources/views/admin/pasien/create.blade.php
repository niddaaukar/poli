@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Pasien Baru</h2>

        <form action="{{ route('admin.pasien.store') }}" method="POST">
            @csrf

            <!-- Nama Field -->
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <!-- Alamat Field -->
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>

            <!-- No KTP Field -->
            <div class="form-group mb-3">
                <label for="no_ktp">No KTP</label>
                <input type="text" name="no_ktp" id="no_ktp" class="form-control" required>
            </div>

            <!-- No HP Field -->
            <div class="form-group mb-3">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>

            <!-- Password Field -->
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password"  required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Daftar Pasien</button>
        </form>
    </div>
@endsection
