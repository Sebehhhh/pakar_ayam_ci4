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
                        <button type="button" class="btn btn-primary mb-3 mt-3 mx-3" data-toggle="modal" data-target="#addUserModal">Add</button>
                        <!-- /Add User Button -->
                        <div class="table-responsive text-nowrap">
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
                                                <button class="btn btn-warning edit-btn" data-id="<?= $user['id']; ?>"><i class="bx bx-pencil"></i></button>
                                                <button class="btn btn-danger delete-btn" data-id="<?= $user['id']; ?>"><i class="bx bx-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Edit User Modal -->
                                        <div class="modal fade" id="editUserModal<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel<?= $user['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editUserModalLabel<?= $user['id']; ?>">Edit User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('user/update/' . $user['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="name">Name</label><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username</label><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" name="password" placeholder="********">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role">Role</label><span class="text-danger">*</span></label>
                                                                <select class="form-select" name="role_id" required>
                                                                    <?php foreach ($rolesData as $role) : ?>
                                                                        <option value="<?= $role['id']; ?>" <?= ($role['id'] == $user['role_id']) ? 'selected' : ''; ?>><?= $role['role']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
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
                                        <!-- /Edit User Modal -->

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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                    <input type="hidden" class="form-control" name="role_id" value="1">
                    <!-- <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select class="form-select" name="role_id" required>
                            <option value="">Select Role</option>
                            <?php foreach ($rolesData as $role) : ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add User Modal -->


<?= $this->endSection() ?>