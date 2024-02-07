<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">

                        <h3 class="mt-2 mb-2 mx-2">Management Roles</h3>
                        <!-- Add Role Button -->
                        <a href="<?= base_url('role/create') ?>" class="btn btn-primary mb-3 mt-3 mx-3">Add</a>
                        <!-- /Add Role Button -->

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($roles as $index => $role) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $role['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('role/edit/' . $role['id']) ?>" class="btn btn-warning">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger delete-role" data-id="<?= $role['id'] ?>">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
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
<!-- / Content -->

<?= $this->endSection() ?>