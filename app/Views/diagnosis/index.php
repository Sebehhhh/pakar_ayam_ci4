<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<style>
    /* Position the tooltip container */
    .position-relative {
        position: relative;
    }

    .custom-tooltip {
        visibility: hidden;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        padding: 5px 10px;
        position: absolute;
        z-index: 1;
        bottom: 120%;
        /* Position above the button */
        left: 50%;
        transform: translateX(-50%);
        white-space: nowrap;
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
        /* Prevent tooltip from capturing mouse events */
    }

    .custom-tooltip::after {
        content: '';
        position: absolute;
        top: 100%;
        /* Arrow at the bottom of the tooltip */
        left: 50%;
        transform: translateX(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: #333 transparent transparent transparent;
    }

    .position-relative:hover .custom-tooltip {
        visibility: visible;
        opacity: 1;
    }
</style>

<!-- Content -->
<!-- <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Diagnosis</h3>

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
</div> -->

<!-- <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-2">Diagnosis</h3>

                      
                        <div class="pagination-buttons mx-2 my-2">
                            <?php foreach ($gejalaData as $index => $gejala) : ?>
                                <button type="button" class="btn btn-outline-primary pagination-btn" data-question="<?= $index; ?>">
                                    <?= $index + 1; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

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
</div> -->


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <h3 class="mt-2 mb-2 mx-4">Diagnosis</h3>

                        <!-- Pagination Buttons -->
                        <div class="pagination-buttons mx-4 my-3">
                            <div class="row gx-3">
                                <?php foreach ($gejalaData as $index => $gejala) : ?>
                                    <div class="col-1 mb-2 position-relative">
                                        <button type="button" class="btn btn-outline-primary pagination-btn w-100" data-question="<?= $index; ?>">
                                            <?= $index + 1; ?>
                                        </button>
                                        <div class="custom-tooltip">
                                            <?= htmlspecialchars($gejala['nama']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>



                        <form action="<?= base_url('/diagnosis/proses'); ?>" method="post" id="diagnosisForm">
                            <div class="questions-container mx-4 my-3">
                                <?php foreach ($gejalaData as $index => $gejala) : ?>
                                    <div class="question mb-4" id="question<?= $index; ?>" style="<?= $index > 0 ? 'display: none;' : ''; ?>">
                                        <p><?= $gejala['nama']; ?></p>
                                        <input type="hidden" name="kondisi[<?= $gejala['id']; ?>][gejala_id]" value="<?= $gejala['id']; ?>">
                                        <select class="form-select keyakinan-dropdown mb-2" name="kondisi[<?= $gejala['id']; ?>][bobot]">
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