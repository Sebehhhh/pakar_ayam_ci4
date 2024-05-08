<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h1 class="display-4 mb-3">Selamat Datang di Sistem Pakar Diagnosis Penyakit Ayam</h1>
                            <p class="lead mb-4">Kami menyediakan layanan diagnosa penyakit ayam menggunakan metode Certainty Factor untuk membantu Anda dalam menentukan kemungkinan penyakit pada ayam Anda.</p>
                            <p class="lead mb-4">Metode Certainty Factor adalah salah satu pendekatan yang digunakan dalam sistem pakar untuk mengatasi ketidakpastian dalam diagnosis. Dengan menggabungkan informasi dari gejala yang diamati dan pengetahuan yang dimiliki, sistem dapat memberikan perkiraan kemungkinan penyakit dengan tingkat keyakinan tertentu.</p>
                            <p class="lead mb-4">Kami berharap sistem kami dapat membantu Anda dalam merawat ayam Anda dengan memberikan informasi yang akurat dan berguna. Silakan mulai diagnosa dengan memasukkan gejala yang diamati pada ayam Anda.</p>
                        </div>
                    </div>
                    <!-- <p><?= session('access_token'); ?></p> -->
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="<?= base_url('assets/img/illustrations/man-with-laptop-light.png'); ?>" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- / Content -->
<?= $this->endSection() ?>