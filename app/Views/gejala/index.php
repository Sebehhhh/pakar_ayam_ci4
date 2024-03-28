<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Management Gejala</h3>
                        <!-- Add Gejala Button -->
                        <button type="button" class="btn btn-primary mb-3 mt-3 mx-3" data-toggle="modal" data-target="#addGejalaModal">Add</button>
                        <!-- /Add Gejala Button -->
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
                                    foreach ($gejalaData as $gejala) : ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $gejala['nama']; ?></td>
                                            <td>
                                                <button class="btn btn-warning edit-gejala-btn" data-id="<?= $gejala['id']; ?>"><i class="bx bx-pencil"></i></button>
                                                <button class="btn btn-danger delete-gejala-btn" data-id="<?= $gejala['id']; ?>"><i class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Edit Gejala Modal -->
                                        <div class="modal fade" id="editGejalaModal<?= $gejala['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editGejalaModalLabel<?= $gejala['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editGejalaModalLabel<?= $gejala['id']; ?>">Edit Gejala</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('gejala/update/' . $gejala['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama" value="<?= $gejala['nama']; ?>" required>
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
                                        <!-- /Edit Gejala Modal -->
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

<!-- Add Gejala Modal -->
<div class="modal fade" id="addGejalaModal" tabindex="-1" role="dialog" aria-labelledby="addGejalaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGejalaModalLabel">Add Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('gejala/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter nama" required>
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
<!-- /Add Gejala Modal -->
<?= $this->endSection() ?>