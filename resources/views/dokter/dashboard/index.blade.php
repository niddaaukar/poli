@extends('components.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- Card Selamat Datang -->
    <div class="col-md-12 mb-4">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Selamat Datang Dokter Poli {{ Auth::user()->nama }} 🎉</h5>
              <p class="mb-4">Selamat bertugas dan <span class="fw-bold">Semangat</span> dalam mengelola poliklinik UDINUS</p>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" 
                data-app-dark-img="{{ asset('img/illustrations/man-with-laptop-dark.png') }}" 
                data-app-light-img="{{ asset('img/illustrations/man-with-laptop-light.png') }}" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Statistik Card -->
  <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
    <!-- Jumlah Dokter -->
    <div class="col">
      <div class="card h-100 text-center">
        <div class="card-body p-2">
          <div class="avatar mx-auto mb-3">
          <div style="display: inline-block; background-color: #e0f7fe; border-radius: 10px; padding: 15px;">
            <i class="fa-solid fa-user-doctor" style="font-size: 20x; color: #00bcd4;"></i>
          </div>
          </div>
          <h6 class="fw-bold mb-2">Jumlah Dokter</h6>
          <h4 class="text-primary"> {{ $jumlah_dokter }}</h4>
        </div>
      </div>
    </div>
    <!-- Jumlah Pasien -->
    <div class="col">
      <div class="card h-100 text-center">
        <div class="card-body p-2">
          <div class="avatar mx-auto mb-3">
          <div style="display: inline-block; background-color: #D3F1DF; border-radius: 10px; padding: 15px;">
            <i class="fa-solid fa-users" style="font-size: 20x; color: #5CB338;"></i>
          </div>
          </div>
          <h6 class="fw-bold mb-2">Jumlah Pasien</h6>
          <h4 class="text-primary">{{ $jumlah_pasien }}</h4>
        </div>
      </div>
    </div>
    <!-- Jumlah Obat -->
    <div class="col">
      <div class="card h-100 text-center">
        <div class="card-body p-2">
          <div class="avatar mx-auto mb-3">
          <div style="display: inline-block; background-color: #FFE2E2; border-radius: 10px; padding: 15px;">
            <i class="fa-solid fa-pills" style="font-size: 20x; color: #FB4141;"></i>
          </div>
          </div>
          <h6 class="fw-bold mb-2">Jumlah Obat</h6>
          <h4 class="text-primary">{{ $jumlah_obat }}</h4>
        </div>
      </div>
    </div>
    <!-- Jumlah Poli -->
    <div class="col">
      <div class="card h-100 text-center">
        <div class="card-body p-2">
          <div class="avatar mx-auto mb-3">
          <div style="display: inline-block; background-color: #FEF3E2; border-radius: 10px; padding: 15px;">
            <i class="fa-solid fa-hospital" style="font-size: 20x; color: #FF8000;"></i>
          </div>
          </div>
          <h6 class="fw-bold mb-2">Jumlah Poli</h6>
          <h4 class="text-primary">{{ $jumlah_poli }}</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabel Data Pasien -->
  <div class="row">
    <div class="col-md-12">
      <div class="card p-3">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No RM</th>
              <th>Nama</th>
              <th>No KTP</th>
              <th>No HP</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pasiens as $pasien)
            <tr>
              <td>{{ $pasien->pasien->no_rm }}</td>
              <td>{{ $pasien->pasien->nama }}</td>
              <td>{{ $pasien->pasien->no_ktp }}</td>
              <td>{{ $pasien->pasien->no_hp }}</td>
              <td>{{ $pasien->pasien->alamat }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">  Belum Memiliki Pasien Terbaru </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
