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
                        <button type="button" class="btn btn-primary mb-3 mt-3 mx-3" data-toggle="modal" data-target="#addRoleModal">Add</button>
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
                                <?php $n = 1;
                                foreach ($rolesData as $role) : ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $role['role']; ?></td>
                                        <td>
                                            <button class="btn btn-warning edit-role-btn" data-id="<?= $role['id']; ?>"><i class="bx bx-pencil"></i></button>
                                            <button class="btn btn-danger delete-role-btn" data-id="<?= $role['id']; ?>"><i class="bx bx-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- Edit Role Modal -->
                                    <div class="modal fade" id="editRoleModal<?= $role['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel<?= $role['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editRoleModalLabel<?= $role['id']; ?>">Edit Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('role/update/' . $role['id']); ?>" method="post">
                                                        <div class="form-group">
                                                            <label for="role">Role</label><span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="role" value="<?= $role['role']; ?>" required>
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
                                    <!-- /Edit Role Modal -->
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

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('role/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="role" placeholder="Enter role" required>
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
<!-- /Add Role Modal -->

<?= $this->endSection() ?>