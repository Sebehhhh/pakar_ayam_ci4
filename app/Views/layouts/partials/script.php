<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani klik pada tombol logout
        document.getElementById('logoutButton').addEventListener('click', function(event) {
            event.preventDefault();

            // Tampilkan SweetAlert konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sesi ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect pengguna ke halaman logout jika pengguna mengonfirmasi logout
                    window.location.href = '<?= base_url('/logout'); ?>';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani klik pada tombol hapus
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var userId = this.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus data ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect pengguna ke halaman delete jika pengguna mengonfirmasi penghapusan
                        window.location.href = '<?= base_url('/user/delete/'); ?>' + userId;
                    }
                });
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle click event on edit button
        $('.edit-btn').click(function() {
            var userId = $(this).data('id'); // Get user ID from data-id attribute
            $('#editUserModal' + userId).modal('show'); // Show modal edit with corresponding ID
        });
    });
</script>