@extends('components.app')
@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Poli</h2>
        <a href="{{ route('admin.poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>
        <div class="card p-3"> 
            <!-- Tabel Poli -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Poli</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($polis as $poli)
                        <tr>
                            <td>{{ $poli->id }}</td>
                            <td>{{ $poli->nama_poli }}</td>
                            <td>{{ $poli->keterangan }}</td>
                            <td>
                                <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.poli.destroy', $poli->id) }}" method="POST" class="delete-form" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
