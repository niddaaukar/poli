@extends('components.app')
@include('frontend.components.navbar-homepage')
@push('title')
    <title>Detail Periksa - Poliklinik Udinus</title>
@endpush
@push('styles')
    <style>
        /* Section Styling */
        #detail-periksa {
            padding-top: 95px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .badge-info {
            background-color: #17a2b8;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
        }

        .data-label {
            font-weight: bold;
        }

        .border-bottom {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <!-- Detail Periksa -->
    <section id="detail-periksa">
        <div class="container py-4">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0" style="color: #fff;">Detail Periksa</h3>
                    <a href="{{ route('pasien.riwayat.index') }}" class="btn btn-warning shadow-sm text-white">
                        <i class="fa fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <!-- Data Pasien -->
                        <div class="col-md-6 mb-4">
                            <h5 class="mb-3">Data Pasien</h5>
                            <div class="mb-3 border-bottom">
                                <span class="data-label">Nama Pasien     :   </span> {{ $daftarpoli->pasien->nama }}
                            </div>
                            <div class="mb-3 border-bottom">
                                <span class="data-label">Tanggal Periksa :    </span> 
                                {{ \Carbon\Carbon::parse($daftarpoli->tgl_periksa)->isoFormat('D MMMM YYYY') }}
                            </div>
                            <div class="mb-3 border-bottom">
                                <span class="data-label">Keluhan   :    </span> {{ $daftarpoli->keluhan }}
                            </div>
                            <div class="mb-3 border-bottom">
                                <span class="data-label">Dokter    :    </span> {{ $daftarpoli->jadwalPeriksa->dokter->nama }}
                            </div>
                            <div class="mb-3 border-bottom">
                                <span class="data-label">Poli      :    </span> {{ $daftarpoli->jadwalPeriksa->dokter->poli->nama_poli }}
                            </div>
                        </div>

                        <!-- Data Periksa -->
                        <div class="col-md-6">
                            <h5 class="mb-3">Data Periksa</h5>
                            @if ($periksa)
                                <div class="mb-3 border-bottom">
                                    <span class="data-label">Catatan:</span> {{ $periksa->catatan }}
                                </div>
                                <div class="mb-3 border-bottom">
                                    <span class="data-label">Biaya Periksa:</span>
                                    <span class="badge badge-info">
                                        Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <span class="data-label">Obat:</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped text-center table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th>Nama Obat</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($obats as $obat)
                                                    @if (in_array($obat->id, $daftarObat))
                                                        <tr>
                                                            <td>{{ $obat->nama_obat }}</td>
                                                            <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <!-- Jika belum dilakukan pemeriksaan -->
                                <div class="text-center">
                                    <img src="{{ asset('img/belum-diperiksa.png') }}" alt="Belum Ada Pemeriksaan" class="img-fluid mb-3" style="max-width: 400px;">
                                    <!-- <p class="text-muted"><strong>Belum ada pemeriksaan yang dilakukan untuk pasien ini.</strong></p> -->
                                </div>
                            @endif
                        </div>
                    </div> <!-- Row End -->
                </div> <!-- Card Body End -->
            </div> <!-- Card End -->
        </div>
    </section>
@endsection
