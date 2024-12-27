@extends('components.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Buat Jadwal Baru</h2>
        @include('components.alert')
        <form action="{{ route('dokter.jadwal_periksa.store') }}" method="POST">
            @csrf
            <input type="hidden" name=id_dokter value="{{ $dokter->id }}" >
            <!-- Hari Field -->
            <div class="form-group mb-3">
                <label for="hari">Hari</label>
                <select name="hari" class="form-control" required>
                    <option value="" disabled selected>Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <!-- Jam Mulai Field -->
            <div class="form-group mb-3">
                <label for="jam_mulai">Tanggal Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" required>
                @error('jam_mulai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Jam Selesai Field -->
            <div class="form-group mb-3">
                <label for="jam_selesai">Tanggal Mulai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" required>
                @error('jam_selesai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
