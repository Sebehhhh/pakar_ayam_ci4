<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">

                        <!-- Add User Button -->
                        <a href="<?= base_url('user/create') ?>" class="btn btn-primary mb-3 mt-3 mx-3">Add</a>
                        <!-- /Add User Button -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $index => $user) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-warning">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </a>
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