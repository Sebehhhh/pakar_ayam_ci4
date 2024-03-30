<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h1 class="mt-2 mb-2 mx-2"><b>Hasil Diagnosis</b></h1>
                        <div id="accordion">
                            <?php foreach ($result as $index => $hasil) : ?>
                                <div class="card mb-3">
                                    <div class="card-header" id="heading<?= $index ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                                                #<?= $index + 1 ?> <?= $hasil['penyakit']; ?>
                                            </button>

                                        </h2>
                                    </div>
                                    <div id="collapse<?= $index ?>" class="collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $index ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                                    <img src="<?= base_url('uploads/penyakit/' . $hasil['gambar']); ?>" class="card-img rounded mx-auto d-block" style="width: 300px; height: 300px; object-fit: cover;" alt="<?= $hasil['penyakit']; ?>">
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="card-subtitle mb-2 text-muted">Kemungkinan: <?= $hasil['kemungkinan']; ?></h6>
                                                    <p class="card-text">Gejala: <?= implode(', ', array_column($hasil['gejala'], 'nama_gejala')); ?></p>
                                                    <p class="card-text">Detail: <?= $hasil['detail']; ?></p>
                                                    <p class="card-text">Saran: <?= $hasil['saran']; ?></p>
                                                    <!-- Tampilkan riwayat permintaan diagnosa -->
                                                    <h6 class="card-subtitle mb-2 text-muted">Riwayat Permintaan Diagnosa:</h6>
                                                    <p class="card-text">
                                                        <?php foreach ($hasil['request_data']['kondisi'] as $gejala) : ?>
                                                            <?= $gejala['nama_gejala']; ?> (Bobot: <?= $gejala['bobot']; ?>),
                                                        <?php endforeach; ?>
                                                        Threshold: <?= $hasil['request_data']['threshold']; ?>
                                                    </p>
                                                </div>
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
</div>
<!-- / Content -->
<?= $this->endSection() ?>