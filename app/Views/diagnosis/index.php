<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Diagnosis</h3>
                        <form action="<?= base_url('/diagnosis/proses'); ?>" method="post">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Gejala</th>
                                            <th>Keyakinan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n = 1;
                                        foreach ($gejalaData as $gejala) : ?>
                                            <tr>
                                                <td><?= $n++; ?></td>
                                                <td><?= $gejala['nama']; ?></td>
                                                <td>
                                                    <input type="hidden" name="kondisi[<?= $gejala['id']; ?>][gejala_id]" value="<?= $gejala['id']; ?>">
                                                    <select class="form-select keyakinan-dropdown" name="kondisi[<?= $gejala['id']; ?>][bobot]">
                                                        <option value="0.0">Tidak Tahu</option>
                                                        <option value="-1.0">Pasti Tidak</option>
                                                        <option value="-0.8">Hampir Pasti Tidak</option>
                                                        <option value="-0.6">Kemungkinan Besar Tidak</option>
                                                        <option value="-0.4">Mungkin Tidak</option>
                                                        <option value="0.4">Mungkin</option>
                                                        <option value="0.6">Kemungkinan Besar</option>
                                                        <option value="0.8">Hampir Pasti</option>
                                                        <option value="1.0">Pasti</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary mb-3 mt-3 mx-3" id="submitDiagnosis">Submit</button>
                            <!-- /Submit Button -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>