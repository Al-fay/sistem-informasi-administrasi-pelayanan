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
            <div class="col-12">
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

                        <form class="row g-3" action="/kematian/add" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_meninggal" id="nama_meninggal" autofocus value="<?= old('nama_meninggal'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Umur</label>
                                <input type="text" class="form-control" name="umur" id="umur" value="<?= old('umur'); ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= old('alamat'); ?>"></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tempat Meninggal</label>
                                    <input type="text" class="form-control" name="tempat_meninggal" id="tempat_meninggal" value="<?= old('tempat_meninggal'); ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Meninggal</label>
                                <input type="date" class="form-control" name="tgl_meninggal" id="tgl_meninggal" value="<?= old('tgl_meninggal'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sebab Meninggal</label>
                                <input type="text" class="form-control" name="sebab_meninggal" id="sebab_meninggal" value="<?= old('sebab_meninggal'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= old('nik'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">No. KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= old('no_kk'); ?>">
                            </div>
                            <div class="col-7">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt" value="<?= old('pengantar_rt'); ?>">
                                        <label class="custom-file-label" for="pengantar_rt">Pilih File</label>
                                    </div>
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