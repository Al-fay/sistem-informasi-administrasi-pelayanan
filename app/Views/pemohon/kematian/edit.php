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

                        <form class="row g-3" action="/kematian/update_kematian_user/<?= $kematian_user['id_meninggal']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_meninggal" id="nama_meninggal" value="<?= $kematian_user['nama_meninggal']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Umur</label>
                                <input type="text" class="form-control" name="umur" id="umur" value="<?= $kematian_user['umur']; ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= $kematian_user['alamat']; ?>"> </input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="<?= $kematian_user['jenis_kelamin']; ?>"><?= $kematian_user['jenis_kelamin']; ?></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tempat Meninggal</label>
                                    <select class="form-control" id="tempat_meninggal" name="tempat_meninggal">
                                        <option value="<?= $kematian_user['tempat_meninggal']; ?>"><?= $kematian_user['tempat_meninggal']; ?></option>
                                        <option value="Rumah">Rumah</option>
                                        <option value="Rumah Sakit">Rumah Sakit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Meninggal</label>
                                <input type="date" class="form-control" name="tgl_meninggal" id="tgl_meninggal" value="<?= $kematian_user['tgl_meninggal']; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hari Kematian</label>
                                    <select class="form-control" id="hari_meninggal" name="hari_meninggal">
                                        <option value="<?= $kematian_user['hari_meninggal']; ?>"><?= $kematian_user['hari_meninggal']; ?></option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sebab Meninggal</label>
                                <input type="text" class="form-control" name="sebab_meninggal" id="sebab_meninggal" value="<?= $kematian_user['sebab_meninggal']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $kematian_user['nik']; ?>">
                            </div>
                            <div class="col-5">
                                <label class="form-label">No. KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= $kematian_user['no_kk']; ?>">
                            </div>
                            <div class="col-7">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $kematian_user['pengantar_rt']; ?></label>
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