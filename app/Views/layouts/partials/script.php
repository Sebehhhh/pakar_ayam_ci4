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
        // Menangani klik pada tombol hapus role
        document.querySelectorAll('.delete-role-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var roleId = this.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus role ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman delete role jika pengguna mengonfirmasi penghapusan
                        window.location.href = '<?= base_url('/role/delete/'); ?>' + roleId;
                    }
                });
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani klik pada tombol hapus gejala
        document.querySelectorAll('.delete-gejala-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var gejalaId = this.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus gejala ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman delete gejala jika pengguna mengonfirmasi penghapusan
                        window.location.href = '<?= base_url('/gejala/delete/'); ?>' + gejalaId;
                    }
                });
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menangani klik pada tombol hapus penyakit
        document.querySelectorAll('.delete-penyakit-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var penyakitId = this.getAttribute('data-id');

                // Tampilkan SweetAlert konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus penyakit ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman delete penyakit jika pengguna mengonfirmasi penghapusan
                        window.location.href = '<?= base_url('/penyakit/delete/'); ?>' + penyakitId;
                    }
                });
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

<script>
    $(document).ready(function() {
        // Handle click event on edit role button
        $('.edit-role-btn').click(function() {
            var roleId = $(this).data('id'); // Get role ID from data-id attribute
            $('#editRoleModal' + roleId).modal('show'); // Show modal edit role with corresponding ID
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle click event on edit gejala button
        $('.edit-gejala-btn').click(function() {
            var gejalaId = $(this).data('id'); // Get gejala ID from data-id attribute
            $('#editGejalaModal' + gejalaId).modal('show'); // Show modal edit gejala with corresponding ID
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle click event on edit penyakit button
        $('.edit-penyakit-btn').click(function() {
            var penyakitId = $(this).data('id'); // Get penyakit ID from data-id attribute
            $('#editPenyakitModal' + penyakitId).modal('show'); // Show modal edit penyakit with corresponding ID
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle click event on show detail button
        $('.show-detail-btn').click(function() {
            var penyakitId = $(this).data('id'); // Get penyakit ID from data-id attribute
            $('#detailPenyakitModal' + penyakitId).modal('show'); // Show modal detail penyakit with corresponding ID
        });
    });
</script>