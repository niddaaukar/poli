@extends('admin.layout.app')
@section('content')
<div class="container">
    <h1>Daftar Obat</h1>
    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
            <tr>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                <td>
                <div class="d-flex align-items-center">
    <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-2">
        <i class="fas fa-edit me-1"></i>Edit
    </a>
    <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" class="delete-form mb-0">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
            <i class="fas fa-trash-alt me-1"></i>Hapus
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