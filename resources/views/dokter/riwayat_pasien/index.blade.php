@extends('components.app')

@push('title')
    <title>Riwayat Pasien - Poliklinik Udinus</title>
@endpush

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Riwayat Pasien</h3>
        </div>
        <div class="card-body">
            @if($pasiens->isEmpty())
                <div class="alert alert-warning text-center">
                    <strong>Belum ada riwayat pasien.</strong>
                </div>
            @else
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Pasien</th>
                            <th>No. RM</th>
                            <th>Tanggal Periksa Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $index => $pasien)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pasien->pasien->nama ?? 'Tidak diketahui' }}</td>
                            <td>{{ $pasien->pasien->no_rm ?? 'Tidak diketahui' }}</td>
                            <td>{{ \Carbon\Carbon::parse($pasien->tgl_periksa)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('dokter.riwayat_pasien.detail', $pasien->pasien->id) }}" 
                                   class="btn btn-info btn-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer text-muted text-center">
            <small>Poliklinik Udinus - Sistem Informasi</small>
        </div>
    </div>
</div>
@endsection
