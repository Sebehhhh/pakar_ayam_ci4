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
        // Handle click on delete basis pengetahuan button
        document.querySelectorAll('.delete-basis-pengetahuan-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var basisPengetahuanId = this.getAttribute('data-id');

                // Display SweetAlert confirmation
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus basis pengetahuan ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to delete basis pengetahuan page if user confirms deletion
                        window.location.href = '<?= base_url('/basisPengetahuan/delete/'); ?>' + basisPengetahuanId;
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
        // Handle click event on edit basis pengetahuan button
        $('.edit-basis-pengetahuan-btn').click(function() {
            var basisPengetahuanId = $(this).data('id'); // Get basis pengetahuan ID from data-id attribute
            $('#editBasisPengetahuanModal' + basisPengetahuanId).modal('show'); // Show modal edit basis pengetahuan with corresponding ID
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

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const questions = document.querySelectorAll(".question");
        let currentQuestionIndex = 0;

        function showQuestion(index) {
            questions.forEach((question, i) => {
                if (i === index) {
                    question.style.display = "block";
                } else {
                    question.style.display = "none";
                }
            });
        }

        document.querySelectorAll(".next-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) + 1;
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll(".prev-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) - 1;
                showQuestion(currentQuestionIndex);
            });
        });
    });
</script> -->

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const questions = document.querySelectorAll(".question");
        let currentQuestionIndex = 0;

        function showQuestion(index) {
            questions.forEach((question, i) => {
                question.style.display = i === index ? "block" : "none";
            });
            updatePaginationButtons(index);
        }

        function updatePaginationButtons(index) {
            document.querySelectorAll('.pagination-btn').forEach((btn, i) => {
                btn.classList.toggle('active', i === index);
            });
        }

        document.querySelectorAll(".next-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) + 1;
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll(".prev-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) - 1;
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll(".pagination-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question"));
                showQuestion(currentQuestionIndex);
            });
        });

        // Initially show the first question
        showQuestion(currentQuestionIndex);
    });
</script> -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const questions = document.querySelectorAll(".question");
        const paginationButtons = document.querySelectorAll(".pagination-btn");
        let currentQuestionIndex = 0;

        function showQuestion(index) {
            questions.forEach((question, i) => {
                question.style.display = i === index ? "block" : "none";
            });
            updatePaginationButtons(index);
        }

        function updatePaginationButtons(index) {
            paginationButtons.forEach((btn, i) => {
                btn.classList.toggle('active', i === index);
            });
        }

        function updateButtonColor() {
            questions.forEach((question, index) => {
                const select = question.querySelector('.keyakinan-dropdown');
                if (select.value !== "0.0") {
                    paginationButtons[index].classList.remove('btn-outline-primary');
                    paginationButtons[index].classList.add('btn-success');
                } else {
                    paginationButtons[index].classList.remove('btn-success');
                    paginationButtons[index].classList.add('btn-outline-primary');
                }
            });
        }

        document.querySelectorAll(".next-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) + 1;
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll(".prev-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question")) - 1;
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll(".pagination-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                currentQuestionIndex = parseInt(this.getAttribute("data-question"));
                showQuestion(currentQuestionIndex);
            });
        });

        document.querySelectorAll('.keyakinan-dropdown').forEach(select => {
            select.addEventListener('change', function() {
                updateButtonColor();
            });
        });

        // Initially show the first question and update button colors
        showQuestion(currentQuestionIndex);
        updateButtonColor();
    });
</script>