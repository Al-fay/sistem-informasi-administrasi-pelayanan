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

                        <form class="row g-3" action="/suratpengantar/add" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" autofocus value="<?= old('nama'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Negara</label>
                                <input type="text" class="form-control" name="negara" value="Indonesia" readonly></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                        <option selected disabled value="">-- Pilih Agama --</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Protestan</option>
                                        <option value="3">Katolik</option>
                                        <option value="4">Hindu</option>
                                        <option value="5">Buddha</option>
                                        <option value="6">Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= old('pekerjaan'); ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= old('alamat'); ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Surat Bukti Diri (No.KTP)</label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= old('no_ktp'); ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <select class="form-control" id="keperluan" name="keperluan">
                                        <option selected disabled value="">-- Pilih Jenis Surat Pengantar --</option>
                                        <option value="1">Surat Pengantar Kehilangan Polsek</option>
                                        <option value="2">Surat Pengantar Kehilangan Polres</option>
                                        <option value="3">Surat Pengantar SKCK Polsek</option>
                                        <option value="4">Surat Pengantar SKCK Polres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <label class="form-label">Keterangan Lain-Lain</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= old('keterangan'); ?>">
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