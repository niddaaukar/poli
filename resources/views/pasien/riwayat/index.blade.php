@extends('components.app')
@include('frontend.components.navbar-homepage')
@push('title')
    <title>Riwayat Pemeriksaan - Poliklinik Udinus</title>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/vendor/select2/select2-bootstrap-5-theme.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .content-container {
            margin-top: 100px;
        }

        #riwayat-pasien {
            padding-top: 95px;
            position: relative;
            z-index: 1;
        }
    </style>
@endpush

@section('content')
    <!-- Riwayat Pasien -->
    <section id="riwayat-pasien">
        <div class="container-fluid py-4">
            @include('components.alert')
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('homepage') }}" >Kembali</a>
                    </li>
                  </ul>
            <div class="row">
                <!-- Daftar Poli -->
                <div class="col-md-3 mb-4">
                    <div class="card"> 
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Daftar Poli</h3>
                    </div>
                        <form action="{{ route('pasien.daftar_poli') }}" method="POST">
                            @csrf
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="poli" class="col-form-label">Poli <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <select class="form-select @error('poli') is-invalid @enderror" name="poli" id="poli" required>
                                            <option value="" disabled selected>Pilih Poli</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                        @error('poli')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="tgl_periksa" class="col-form-label">Tanggal Periksa <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="date" 
                                        class="form-control @error('tgl_periksa') is-invalid @enderror" 
                                        name="tgl_periksa" 
                                        id="tgl_periksa" 
                                        min="{{ now()->addDays(1)->format('Y-m-d') }}" 
                                        max="{{ now()->addDays(30)->format('Y-m-d') }}" 
                                        required>
                                    @error('tgl_periksa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="jadwal" class="col-form-label">Jadwal <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <select class="form-select @error('jadwal') is-invalid @enderror" name="jadwal" id="jadwal" required>
                                            <option value="" disabled selected>Pilih Jadwal</option>
                                        </select>
                                        @error('jadwal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-group row border-bottom pb-4 mx-1">
                                <label for="keluhan" class="col-form-label">Keluhan <span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <textarea class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" rows="3" required></textarea>
                                    @error('keluhan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mx-1">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                                </div>
                            </div>                            
                        </form>                        
                    </div>
                </div>
                <!-- Riwayat Pasien -->
                <div class="col-md-9 mb-4">
                    <div class="card">
                       <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Riwayat Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">   
                            <table class="table table-striped" id="data-table" class="table table-hover table-responsive align-items-center align-middle w-100"> 
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Poli</th>
                                            <th scope="col">Antrian</th>
                                            <th scope="col">Tanggal Periksa</th>
                                            <th scope="col">Jadwal</th>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayats as $riwayat)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPeriksa->dokter->poli->nama_poli }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge bg-warning badge-lg">{{ $riwayat->no_antrian }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPeriksa->hari }} 
                                                    ({{ \Carbon\Carbon::parse($riwayat->jadwalPeriksa->jam_mulai)->format('H:i') }} - 
                                                    {{ \Carbon\Carbon::parse($riwayat->jadwalPeriksa->jam_selesai)->format('H:i') }})
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $riwayat->jadwalPeriksa->dokter->nama }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                                        @if ($riwayat->periksa)
                                                            <span class="badge bg-success">Sudah Diperiksa</span>
                                                        @else
                                                            <span class="badge bg-danger">Belum Diperiksa</span>
                                                        @endif
                                                        <a href="{{ route('pasien.riwayat.detail', $riwayat->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-2">
                                                        <i class="fas fa-edit me-1"></i>
                                                        Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('components.datatable')
@push('scripts')
    <script src="{{ asset('js/vendor/select2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/flatpickr.js') }}"></script>
    <script src="{{ asset('js/vendor/flatpickr-id.js') }}"></script>
    <script>
        $('#tgl_periksa').on('change', function () {
            const selectedDate = new Date($(this).val()); // Tanggal yang dipilih
            const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const selectedDay = dayNames[selectedDate.getDay()]; // Ambil nama hari dari tanggal
            
            const poliId = $('#poli').val(); // ID Poli yang dipilih
            const jadwalSelect = $('#jadwal');
            jadwalSelect.html('<option value="" disabled selected>Loading...</option>');

            if (poliId && selectedDay) {
                $.get(`/pasien/get-jadwal/${poliId}/${selectedDay}`)
                    .done(function (data) {
                        jadwalSelect.html('<option value="" disabled selected>Pilih Jadwal</option>');
                        data.forEach(function (jadwal) {
                            const option = $('<option></option>')
                                .val(jadwal.id)
                                .text(`${jadwal.hari} (${jadwal.jam_mulai} - ${jadwal.jam_selesai}) - ${jadwal.dokter.nama}`);
                            jadwalSelect.append(option);
                        });
                    })
                    .fail(function (error) {
                        console.error('Error fetching jadwal:', error);
                        jadwalSelect.html('<option value="" disabled selected>Error loading data</option>');
                    });
            } else {
                jadwalSelect.html('<option value="" disabled selected>Pilih Poli dan Tanggal terlebih dahulu</option>');
            }
        });


        // Inisialisasi Select2
        $('#jadwal').select2({
            placeholder: "Pilih Jadwal", 
            allowClear: true,
            width: '100%', 
            theme: 'bootstrap-5'
        });

        $('#poli').select2({
            placeholder: "Pilih Poli", 
            allowClear: true,
            width: '100%', 
            theme: 'bootstrap-5'
        });

    </script>
    <script>
        flatpickr('#tgl_periksa', {
            dateFormat: "Y-m-d",
            minDate: new Date().fp_incr(1),
            maxDate: new Date().fp_incr(30),
            locale: "id",
            disable: ['today'],
        });
    </script>
@endpush
