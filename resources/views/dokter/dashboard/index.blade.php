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
              <p class="mb-4">Selamat bertugas dan <span class="fw-bold">Semangat</span> dalam mengelola poliklinik udinus</p>
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
    <div class="row gap-4">
  <!-- Jumlah Dokter -->
  <div class="col-md-2">
    <div class="card h-100 text-center">
      <div class="card-body p-2">
        <div class="avatar mx-auto mb-3">
          <img src="{{ asset('img/icons/chart-success.png') }}" alt="chart success" class="rounded" width="50" />
        </div>
        <h6 class="fw-bold mb-2">Jumlah Dokter</h6>
        <h4 class="text-primary"> {{ $jumlah_dokter }}</h4>
      </div>
    </div>
  </div>
  <!-- Jumlah Pasien -->
  <div class="col-md-2">
    <div class="card h-100 text-center">
      <div class="card-body p-2">
        <div class="avatar mx-auto mb-3">
          <img src="{{ asset('img/icons/wallet-info.png') }}" alt="wallet info" class="rounded" width="50" />
        </div>
        <h6 class="fw-bold mb-2">Jumlah Pasien</h6>
        <h4 class="text-primary">{{ $jumlah_pasien }}</h4>
      </div>
    </div>
  </div>
  <!-- Jumlah Obat -->
  <div class="col-md-2">
    <div class="card h-100 text-center">
      <div class="card-body p-2">
        <div class="avatar mx-auto mb-3">
          <img src="{{ asset('img/icons/medicine.png') }}" alt="medicine" class="rounded" width="50" />
        </div>
        <h6 class="fw-bold mb-2">Jumlah Obat</h6>
        <h4 class="text-primary">{{ $jumlah_obat }}</h4>
      </div>
    </div>
  </div>

  <!-- Jumlah Poli -->
  <div class="col-md-2">
    <div class="card h-100 text-center">
      <div class="card-body p-2">
        <div class="avatar mx-auto mb-3">
          <img src="{{ asset('img/icons/hospital.png') }}" alt="hospital" class="rounded" width="50" />
        </div>
        <h6 class="fw-bold mb-2">Jumlah Poli</h6>
        <h4 class="text-primary">{{ $jumlah_poli }}</h4>
      </div>
    </div>
  </div>
</div>
    <!-- Membungkus tabel dengan div card untuk latar belakang -->
        <div class="card p-3"> <!-- card dengan padding 3 -->
            <!-- Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>No KTP</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $pasien)
                        <tr>
                            <td>{{ $pasien->pasien->no_rm}}</td>
                            <td>{{ $pasien->pasien->nama }}</td>
                            <td>{{ $pasien->pasien->no_ktp }}</td>
                            <td>{{ $pasien->pasien->no_hp }}</td>
                            <td>{{ $pasien->pasien->alamat }}</td>
                            <td>
                        {{ $pasien->tgl_periksa ?? 'Tanggal tidak tersedia' }}
                    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  </div>
</div>

@endsection
