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

                        <form class="row g-3" action="/keterangan/update_keterangan_user/<?= $keterangan['id_keterangan']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $keterangan['nama']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $keterangan['tempat_lahir']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?= $keterangan['tgl_lahir']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Negara</label>
                                <input type="text" class="form-control" name="negara" value="<?= $keterangan['negara']; ?>" readonly></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                        <option value="<?= $keterangan['agama']; ?>"><?= $keterangan['agama']; ?></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Prostestan">Kristen Prostestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budhha">Budhha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $keterangan['pekerjaan']; ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= $keterangan['alamat']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Surat Bukti Diri (No.KTP)</label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= $keterangan['no_ktp']; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <select class="form-control" id="keperluan" name="keperluan">
                                        <option value="<?= $keterangan['keperluan']; ?>"><?= $keterangan['keperluan']; ?></option>
                                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                        <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                                        <option value="Surat Keterangan Satu Nama">Surat Keterangan Satu Nama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <label class="form-label">Keterangan Lain-Lain</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $keterangan['keterangan']; ?>">
                            </div>
                            <div class="col-7">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $keterangan['pengantar_rt']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary">Edit</button>
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