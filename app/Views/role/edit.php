<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">

                        <!-- Edit Role Form -->
                        <form action="<?= base_url('role/update/' . $role['id']) ?>" method="post" class="mb-4 mx-3 mt-3">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="role" name="role" value="<?= $role['role'] ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <p class="mt-2"><i class="bx bx-info-circle"></i> <small>Tanda (<span class="text-danger">*</span></label>) Wajib Diisi!</small></p>
                        </form>
                        <!-- /Edit Role Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<?= $this->endSection() ?>