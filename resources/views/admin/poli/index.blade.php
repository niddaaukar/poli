@extends('admin.layout.app')
@section('content')
<div class="container">
    <h2 class="my-4">Daftar Poli</h2>
    <a href="{{ route('admin.poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>
    <table class="table table-striped table-bordered">
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
                    <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('admin.poli.destroy', $poli->id) }}" method="POST" class="delete-form" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>

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