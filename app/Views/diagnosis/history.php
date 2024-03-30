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
                                        <th>Kemungkinan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($historyData as $index => $history) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $history['penyakit'] ?></td>
                                            <td><?= $history['nilai'] ?></td>
                                            <td>
                                                <button class="btn btn-info show-detail-btn" data-toggle="modal" data-target="#detailModal<?= $index; ?>"><i class="bx bx-show"></i> Detail</button>
                                            </td>
                                        </tr>
                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="detailModal<?= $index; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $index; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel<?= $index; ?>">Detail Diagnosis</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="gejala<?= $index; ?>">Gejala</label>
                                                            <textarea class="form-control" id="gejala<?= $index; ?>" rows="4" readonly><?= $history['gejala'] ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal<?= $index; ?>">Tanggal</label>
                                                            <input type="text" class="form-control" id="tanggal<?= $index; ?>" value="<?= date('d F Y H:i', strtotime($history['tanggal'])) ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal Detail -->
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