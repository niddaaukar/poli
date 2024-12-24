@extends('components.app')

@push('title')
    <title>Detail Riwayat Pasien - Poliklinik Udinus</title>
@endpush

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Detail Riwayat Pasien</h3>
        </div>
        <div class="card-body">
            <h5>Nama: {{ $pasien->first()->pasien->nama ?? 'Tidak diketahui' }}</h5>
            <h5>No. RM: {{ $pasien->first()->pasien->no_rm ?? 'Tidak diketahui' }}</h5>
            <h5>Total Kunjungan: {{ $pasien->count() }}</h5>

            <table class="table table-bordered table-hover mt-4">
                <thead class="bg-light">
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
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->format('d M Y') }}</td>
                        <td>{{ $riwayat->keluhan ?? 'Tidak diketahui' }}</td>
                        <td>{{ $riwayat->periksa->catatan ?? 'Tidak diketahui' }}</td>
                        <td>{{ $riwayat->periksa->biaya_periksa ?? 'Tidak diketahui' }}</td>
                        <td>
                        @if($riwayat->periksa && $riwayat->periksa->detailPeriksa->isNotEmpty())
                            @foreach ($riwayat->periksa->detailPeriksa as $detail)
                                {{$detail->obat->nama_obat}}
                            @endforeach
                        @else
                            <p>Tidak ada obat</p>
                        @endif
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('dokter.riwayat_pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
