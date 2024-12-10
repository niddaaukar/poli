@extends('admin.layout.app')

@section('content')
<div class="container">
    <h1>Daftar Dokter</h1>
    <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped table-bordered"> 
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Poli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>{{ $dokter->poli->nama ?? 'Tidak ada' }}</td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-2">
                            <i class="fas fa-edit me-1"></i>
                             Edit
                        </a>
                        <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" class="delete-form mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                <i class="fas fa-trash-alt me-1"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
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