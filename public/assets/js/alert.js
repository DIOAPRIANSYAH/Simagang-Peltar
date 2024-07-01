document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dipilih akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.action,
                        method: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Data berhasil dihapus!",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // Reload halaman atau redirect sesuai kebutuhan
                                location.reload();
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: "error",
                                title: "Terjadi kesalahan!",
                                text: "Tidak dapat menghapus data.",
                            });
                        }
                    });
                }
            });
        });
    });
});
