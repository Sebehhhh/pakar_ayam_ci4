<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">

                        <!-- Add User Form -->
                        <form action="<?= base_url('user/store') ?>" method="post" class="mb-4 mx-3 mt-3">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Role<span class="text-danger">*</span></label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option value="">- Select Role -</option>
                                    <?php foreach ($rolesData as $role) : ?>
                                        <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <p class="mt-2"><i class="bx bx-info-circle"></i> <small>Tanda (<span class="text-danger">*</span></label>) Wajib Diisi!</small></p>
                        </form>
                        <!-- /Add User Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<?= $this->endSection() ?>