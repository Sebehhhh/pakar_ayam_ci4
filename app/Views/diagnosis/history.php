<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">History Diagnosis</h3>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Penyakit</th>
                                        <th>Gejala</th>
                                        <th>Kemungkinan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($historyData as $index => $history) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $history['penyakit'] ?></td>
                                            <td><?= $history['gejala'] ?></td>
                                            <td><?= $history['nilai'] ?></td>
                                            <td><?= date('d F Y H:i', strtotime($history['tanggal'])) ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>