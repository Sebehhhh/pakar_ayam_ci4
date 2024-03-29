<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Hasil Diagnosis</h3>
                        <?php foreach ($result as $hasil) : ?>
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('images/' . $hasil['gambar']); ?>" class="card-img" alt="<?= $hasil['penyakit']; ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $hasil['penyakit']; ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Kemungkinan: <?= $hasil['kemungkinan']; ?></h6>
                                            <p class="card-text">Gejala: <?= implode(', ', $hasil['gejala']); ?></p>
                                            <p class="card-text">Detail: <?= $hasil['detail']; ?></p>
                                            <p class="card-text">Saran: <?= $hasil['saran']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>