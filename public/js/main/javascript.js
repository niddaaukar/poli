// Fungsi untuk menangani submit form dengan konfirmasi
function confirmDelete(form) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

function togglePassword(element) {
    const $input = $(element).closest(".input-group").find("input");
    const $icon = $(element).find("i");

    if ($input.attr("type") === "password") {
        $input.attr("type", "text");
        $icon.removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
        $input.attr("type", "password");
        $icon.removeClass("fa-eye").addClass("fa-eye-slash");
    }
}
