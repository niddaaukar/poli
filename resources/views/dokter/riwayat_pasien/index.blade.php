@extends('components.app')
@push('title')
    <title>Riwayat Pasien</title>
@endpush
@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-center">
            <h3 class="card-title text-white m-0">Riwayat Pasien</h3>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                <table id="data-table" class="table table-hover table-responsive align-items-center align-middle w-100">
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
                </div>
        </div>
    </div>
</div>
@endsection
@include('components.datatable')