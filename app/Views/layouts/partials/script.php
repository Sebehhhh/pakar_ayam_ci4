<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menggunakan event delegation untuk menangani klik pada tombol delete
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-user')) {
                const userId = event.target.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi penghapusan, kirim permintaan penghapusan dengan metode POST
                        fetch('<?= base_url('user/delete/') ?>' + userId, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: JSON.stringify({}) // Tidak perlu menyertakan data dalam body untuk permintaan POST
                        }).then(response => {
                            // Periksa kode status respons
                            if (response.status === 200) {
                                // Tampilkan pesan sukses jika pengguna berhasil dihapus
                                Swal.fire('Berhasil', 'Data Pengguna Telah Dihapus', 'success');
                                // Refresh halaman setelah beberapa waktu
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            } else {
                                // Tampilkan pesan kesalahan jika terjadi kesalahan saat menghapus pengguna
                                Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus pengguna', 'error');
                            }
                        });
                    }
                });
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menggunakan event delegation untuk menangani klik pada tombol delete role
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-role')) {
                const roleId = event.target.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengonfirmasi penghapusan, kirim permintaan penghapusan dengan metode POST
                        fetch('<?= base_url('role/delete/') ?>' + roleId, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: JSON.stringify({}) // Tidak perlu menyertakan data dalam body untuk permintaan POST
                        }).then(response => {
                            // Periksa kode status respons
                            if (response.status === 200) {
                                // Tampilkan pesan sukses jika role berhasil dihapus
                                Swal.fire('Berhasil', 'Role Telah Dihapus', 'success');
                                // Refresh halaman setelah beberapa waktu
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            } else {
                                // Tampilkan pesan kesalahan jika terjadi kesalahan saat menghapus role
                                Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus role', 'error');
                            }
                        });
                    }
                });
            }
        });
    });
</script>

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