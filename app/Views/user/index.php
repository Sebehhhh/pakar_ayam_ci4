<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>john.doe@example.com</td>
                                    <td>User</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Doe</td>
                                    <td>jane.doe@example.com</td>
                                    <td>Admin</td>
                                </tr>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
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