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
                        <!-- <form action="<?= base_url('/diagnosis/proses'); ?>" method="post">
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
                                                        <option value="0.0">Tidak Diketahui</option>
                                                        <option value="-1.0">Sangat Tidak Mungkin</option>
                                                        <option value="-0.8">Sangat Kecil Kemungkinannya</option>
                                                        <option value="-0.6">Kemungkinan Kecil Tidak</option>
                                                        <option value="-0.4">Mungkin Tidak</option>
                                                        <option value="-0.2">Cenderung Tidak</option>
                                                        <option value="0.2">Cenderung Iya</option>
                                                        <option value="0.4">Mungkin Iya</option>
                                                        <option value="0.6">Kemungkinan Besar</option>
                                                        <option value="0.8">Sangat Mungkin</option>
                                                        <option value="1.0">Sangat Pasti</option>

                                                    </select>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3 mt-3 mx-3" id="submitDiagnosis">Submit</button>

                        </form> -->

                        <!-- <form action="<?= base_url('/diagnosis/proses'); ?>" method="post" id="diagnosisForm">
                            <?php foreach ($gejalaData as $index => $gejala) : ?>
                                <div class="question" id="question<?= $index; ?>" style="<?= $index > 0 ? 'display: none;' : ''; ?>">
                                    <p><?= $gejala['nama']; ?></p>
                                    <input type="hidden" name="kondisi[<?= $gejala['id']; ?>][gejala_id]" value="<?= $gejala['id']; ?>">
                                    <select class="form-select keyakinan-dropdown" name="kondisi[<?= $gejala['id']; ?>][bobot]">
                                        <option value="0.0">Tidak Diketahui</option>
                                        <option value="-1.0">Sangat Tidak Mungkin</option>
                                        <option value="-0.8">Sangat Kecil Kemungkinannya</option>
                                        <option value="-0.6">Kemungkinan Kecil Tidak</option>
                                        <option value="-0.4">Mungkin Tidak</option>
                                        <option value="-0.2">Cenderung Tidak</option>
                                        <option value="0.2">Cenderung Iya</option>
                                        <option value="0.4">Mungkin Iya</option>
                                        <option value="0.6">Kemungkinan Besar</option>
                                        <option value="0.8">Sangat Mungkin</option>
                                        <option value="1.0">Sangat Pasti</option>
                                    </select>
                                    <?php if ($index > 0) : ?>
                                        <button type="button" class="btn btn-secondary prev-btn" data-question="<?= $index; ?>">Previous</button>
                                    <?php endif; ?>
                                    <?php if ($index < count($gejalaData) - 1) : ?>
                                        <button type="button" class="btn btn-primary next-btn" data-question="<?= $index; ?>">Next</button>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </form> -->

                        <form action="<?= base_url('/diagnosis/proses'); ?>" method="post" id="diagnosisForm">
                            <div class="questions-container">
                                <?php foreach ($gejalaData as $index => $gejala) : ?>
                                    <div class="question" id="question<?= $index; ?>" style="<?= $index > 0 ? 'display: none;' : ''; ?>">
                                        <p><?= $gejala['nama']; ?></p>
                                        <input type="hidden" name="kondisi[<?= $gejala['id']; ?>][gejala_id]" value="<?= $gejala['id']; ?>">
                                        <select class="form-select keyakinan-dropdown" name="kondisi[<?= $gejala['id']; ?>][bobot]">
                                            <option value="0.0">Tidak Diketahui</option>
                                            <option value="-1.0">Sangat Tidak Mungkin</option>
                                            <option value="-0.8">Sangat Kecil Kemungkinannya</option>
                                            <option value="-0.6">Kemungkinan Kecil Tidak</option>
                                            <option value="-0.4">Mungkin Tidak</option>
                                            <option value="-0.2">Cenderung Tidak</option>
                                            <option value="0.2">Cenderung Iya</option>
                                            <option value="0.4">Mungkin Iya</option>
                                            <option value="0.6">Kemungkinan Besar</option>
                                            <option value="0.8">Sangat Mungkin</option>
                                            <option value="1.0">Sangat Pasti</option>
                                        </select>
                                        <div class="btns-container">
                                            <?php if ($index > 0) : ?>
                                                <button type="button" class="btn btn-secondary prev-btn" data-question="<?= $index; ?>">Previous</button>
                                            <?php endif; ?>
                                            <?php if ($index < count($gejalaData) - 1) : ?>
                                                <button type="button" class="btn btn-primary next-btn" data-question="<?= $index; ?>">Next</button>
                                            <?php else : ?>
                                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>