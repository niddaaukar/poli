@if (session('message'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '{{ session('alert-type') == 'success'
                    ? 'Berhasil!'
                    : (session('alert-type') == 'danger'
                        ? 'Terhapus!'
                        : (session('alert-type') == 'info'
                            ? 'Berhasil!'
                            : '')) }}',
                text: '{{ session('message') }}',
                icon: '{{ session('alert-type') }}',
                showConfirmButton: true,
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'custom-ok-button' 
                }
            });
        });
    </script>
    <style>
        .custom-ok-button {
            background-color: #1E9781;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-ok-button:hover {
            background-color: #1E9781;
        }
    </style>
@endif