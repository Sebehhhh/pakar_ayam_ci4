<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">

                        <h3 class="mt-2 mb-2 mx-2">Management Users</h3>
                        <!-- Add User Button -->
                        <a href="<?= base_url('user/create') ?>" class="btn btn-primary mb-3 mt-3 mx-3">Add</a>
                        <!-- /Add User Button -->

                        <table class="table table-hover">
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
                                <?php $n = 1;
                                foreach ($userData as $user) : ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['role_name']; ?></td>
                                        <td>
                                            <a href="<?= base_url('user/edit/' . $user['id']); ?>" class="btn btn-warning"><i class="bx bx-pencil"></i></a>
                                            <button class="btn btn-danger delete-btn" data-id="<?= $user['id']; ?>"><i class="bx bx-trash"></i></button>
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