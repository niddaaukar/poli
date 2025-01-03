@extends('components.app')
@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Pasien</h2>
        <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>
        <!-- Membungkus tabel dengan div card untuk latar belakang -->
        <div class="card p-3"> <!-- card dengan padding 3 -->
            <!-- Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>No KTP</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->no_rm }}</td>
                            <td>{{ $pasien->nama }}</td>
                            <td>{{ $pasien->no_ktp }}</td>
                            <td>{{ $pasien->no_hp }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-2">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" class="delete-form mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('components.datatable')
@push('scripts')
    <script>
        // Menangani submit form dengan kelas 'delete-form'
        $(document).on('submit', '.delete-form', function(event) {
            event.preventDefault();
            var form = this;  // Menyimpan form yang sedang disubmit
            confirmDelete(form);  // Memanggil fungsi konfirmasi hapus
        });
    </script>
@endpush
