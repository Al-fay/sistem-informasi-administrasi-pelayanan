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

                        <form action="/auth/update_status/<?= $pemohon['id_pemohon']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Status Pemohon</label>
                                    <select class="form-control" id="status_akun" name="status_akun">
                                        <option selected disabled value="">-- Pilih Status Akun --</option>
                                        <option value="2" <?= $pemohon['status_akun'] == '2' ? 'selected' : ''; ?>>Terima</option>
                                        <option value="3" <?= $pemohon['status_akun'] == '3' ? 'selected' : ''; ?>>Tolak</option>
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