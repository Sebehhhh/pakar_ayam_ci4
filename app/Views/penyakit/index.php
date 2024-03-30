<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Management Penyakit</h3>
                        <!-- Add Penyakit Button -->
                        <button type="button" class="btn btn-primary mb-3 mt-3 mx-3" data-toggle="modal" data-target="#addPenyakitModal">Add</button>
                        <!-- /Add Penyakit Button -->
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1;
                                    foreach ($penyakitData as $penyakit) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $penyakit['nama']; ?></td>
                                            <td>
                                                <button class="btn btn-info show-detail-btn" data-id="<?= $penyakit['id']; ?>"><i class="bx bx-show"></i> </button>
                                                <button class="btn btn-warning edit-penyakit-btn" data-id="<?= $penyakit['id']; ?>"><i class="bx bx-pencil"></i></button>
                                                <button class="btn btn-danger delete-penyakit-btn" data-id="<?= $penyakit['id']; ?>"><i class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Detail Penyakit Modal -->
                                        <div class="modal fade" id="detailPenyakitModal<?= $penyakit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPenyakitModalLabel<?= $penyakit['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailPenyakitModalLabel<?= $penyakit['id']; ?>">Detail Penyakit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" class="form-control" id="nama" value="<?= $penyakit['nama']; ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="detail">Detail</label>
                                                                <textarea class="form-control" id="detail" rows="8" disabled><?= $penyakit['detail']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="saran">Saran</label>
                                                                <textarea class="form-control" id="saran" rows="8" disabled><?= $penyakit['saran']; ?></textarea>
                                                            </div>
                                                            <label for="gambar">Gambar</label>
                                                            <div class="form-group">
                                                                <img src="<?= base_url('/uploads/penyakit/' . $penyakit['gambar']); ?>" height="200px" width="200px" alt="Gambar Penyakit">
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Edit Penyakit Modal -->
                                        <div class="modal fade" id="editPenyakitModal<?= $penyakit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPenyakitModalLabel<?= $penyakit['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editPenyakitModalLabel<?= $penyakit['id']; ?>">Edit Penyakit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('penyakit/update/' . $penyakit['id']); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama" value="<?= $penyakit['nama']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="detail">Detail</label><span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="detail" required rows="8"><?= $penyakit['detail']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="saran">Saran</label><span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="saran" required rows="8"><?= $penyakit['saran']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gambar">Gambar</label>
                                                                <input type="file" class="form-control" name="gambar"">
                                                            </div>

                                                            <label for=" gambar">Gambar</label>
                                                                <div class="form-group">
                                                                    <img src="<?= base_url('/uploads/penyakit/' . $penyakit['gambar']); ?>" height="200px" width="200px" alt="Gambar Penyakit">
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
                                            <!-- /Edit Penyakit Modal -->
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

<!-- Add Penyakit Modal -->
<div class="modal fade" id="addPenyakitModal" tabindex="-1" role="dialog" aria-labelledby="addPenyakitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenyakitModalLabel">Add Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('penyakit/store'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter nama" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="detail" placeholder="Enter detail" required rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saran">Saran <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="saran" placeholder="Enter saran" required rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Enter nama gambar">
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
<!-- /Add Penyakit Modal -->
<?= $this->endSection() ?>