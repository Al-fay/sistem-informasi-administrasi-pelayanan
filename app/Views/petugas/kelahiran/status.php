<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <form action="/kelahiran/update_status/<?= $kelahiran['id_kelahiran']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Verifikasi Status Surat Kelahiran</label>
                                    <select class="form-control" id="status_kelahiran" name="status_kelahiran">
                                        <option selected disabled value="">-- Pilih Status Surat Kelahiran --</option>
                                        <option value="2" <?= $kelahiran['status_kelahiran'] == '2' ? 'selected' : ''; ?>>Terima - Surat Selesai Diproses</option>
                                        <option value="3" <?= $kelahiran['status_kelahiran'] == '3' ? 'selected' : ''; ?>>Tolak - File Yang Diupload Kurang Jelas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-outline-primary float-right">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<?= $this->endSection(); ?>