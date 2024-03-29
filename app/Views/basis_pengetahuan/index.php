<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Management Basis Pengetahuan</h3>
                        <!-- Add Basis Pengetahuan Button -->
                        <button type="button" class="btn btn-primary mb-3 mt-3 mx-3" data-toggle="modal" data-target="#addBasisPengetahuanModal">Add</button>
                        <!-- /Add Basis Pengetahuan Button -->
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Penyakit</th>
                                        <th>Gejala</th>
                                        <th>MB</th>
                                        <th>MD</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1;
                                    foreach ($basisPengetahuanData as $basisPengetahuan) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $basisPengetahuan['penyakit']['nama']; ?></td>
                                            <td><?= $basisPengetahuan['gejala']['nama']; ?></td>
                                            <td><?= $basisPengetahuan['mb']; ?></td>
                                            <td><?= $basisPengetahuan['md']; ?></td>
                                            <td>
                                                <button class="btn btn-warning edit-basis-pengetahuan-btn" data-id="<?= $basisPengetahuan['id']; ?>"><i class="bx bx-pencil"></i></button>
                                                <button class="btn btn-danger delete-basis-pengetahuan-btn" data-id="<?= $basisPengetahuan['id']; ?>"><i class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Edit Basis Pengetahuan Modal -->
                                        <div class="modal fade" id="editBasisPengetahuanModal<?= $basisPengetahuan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editBasisPengetahuanModalLabel<?= $basisPengetahuan['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editBasisPengetahuanModalLabel<?= $basisPengetahuan['id']; ?>">Edit Basis Pengetahuan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('basisPengetahuan/update/' . $basisPengetahuan['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="penyakit_id">Penyakit</label><span class="text-danger">*</span></label>
                                                                <select class="form-select" name="penyakit_id" required>
                                                                    <?php foreach ($penyakitData as $penyakit) : ?>
                                                                        <option value="<?= $penyakit['id']; ?>" <?= ($penyakit['id'] == $basisPengetahuan['penyakit']['id']) ? 'selected' : ''; ?>>
                                                                            <?= $penyakit['nama']; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gejala_id">Gejala</label><span class="text-danger">*</span></label>
                                                                <select class="form-select" name="gejala_id" required>
                                                                    <?php foreach ($gejalaData as $gejala) : ?>
                                                                        <option value="<?= $gejala['id']; ?>" <?= ($gejala['id'] == $basisPengetahuan['gejala']['id']) ? 'selected' : ''; ?>>
                                                                            <?= $gejala['nama']; ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mb">MB</label><span class="text-danger">*</span>(Contoh: 0.2)</label>
                                                                <input type="text" class="form-control" name="mb" value="<?= $basisPengetahuan['mb']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="md">MD</label><span class="text-danger">*</span>(Contoh: 0.2)</label>
                                                                <input type="text" class="form-control" name="md" value="<?= $basisPengetahuan['md']; ?>" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Basis Pengetahuan Modal -->
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

<!-- Add Basis Pengetahuan Modal -->
<div class="modal fade" id="addBasisPengetahuanModal" tabindex="-1" role="dialog" aria-labelledby="addBasisPengetahuanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBasisPengetahuanModalLabel">Add Basis Pengetahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('basisPengetahuan/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="penyakit_id">Penyakit <span class="text-danger">*</span></label>
                        <select class="form-select" name="penyakit_id" required>
                            <option value="">Pilih penyakit</option>
                            <?php foreach ($penyakitData as $penyakit) : ?>
                                <option value="<?= $penyakit['id']; ?>"><?= $penyakit['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala_id">Gejala <span class="text-danger">*</span></label>
                        <select class="form-select" name="gejala_id" required>
                            <option value="">Pilih gejala</option>
                            <?php foreach ($gejalaData as $gejala) : ?>
                                <option value="<?= $gejala['id']; ?>"><?= $gejala['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mb">MB <span class="text-danger">*</span>(Contoh: 0.2)</label>
                        <input type="text" class="form-control" name="mb" placeholder="Enter MB" required>
                    </div>
                    <div class="form-group">
                        <label for="md">MD <span class="text-danger">*</span>(Contoh: 0.2)</label>
                        <input type="text" class="form-control" name="md" placeholder="Enter MD" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Basis Pengetahuan Modal -->
<?= $this->endSection() ?>