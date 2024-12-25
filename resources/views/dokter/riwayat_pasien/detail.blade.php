@extends('components.app')

@push('title')
    <title>Detail Riwayat</title>
@endpush

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <!-- Header -->
        <div class="card-header bg-primary text-white text-center">
            <h3 class="card-title mb-0 text-white">Detail Riwayat Pasien</h3>
        </div>
        
        <!-- Body -->
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5><strong>Nama:</strong> NIDA AULIA KARIMA</h5>
                </div>
                <div class="col-md-4">
                    <h5><strong>No. RM:</strong> 202412-21</h5>
                </div>
                <div class="col-md-4">
                    <h5><strong>Total Kunjungan:</strong> 2</h5>
                </div>
            </div>
            <table id="data-table" class="table table-bordered table-hover table-responsive align-items-center align-middle w-100">
                <thead class="bg-light text-center">
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Periksa</th>
                        <th>Keluhan</th>
                        <th>Catatan</th>
                        <th>Biaya</th>
                        <th>Obat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $index => $riwayat)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->format('d M Y') }}</td>
                            <td>{{ $riwayat->keluhan ?? 'Tidak diketahui' }}</td>
                            <td>{{ $riwayat->periksa->catatan ?? 'Tidak diketahui' }}</td>
                            <td class="text-end">Rp {{ number_format($riwayat->periksa->biaya_periksa ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @if($riwayat->periksa && $riwayat->periksa->detailPeriksa->isNotEmpty())
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($riwayat->periksa->detailPeriksa as $detail)
                                            <li>{{ $detail->obat->nama_obat }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Tidak ada obat</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

@include('components.datatable')
