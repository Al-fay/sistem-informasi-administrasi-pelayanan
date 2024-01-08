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

                        <form class="row g-3" action="/kelahiran/update_kelahiran_user/<?= $kelahiran_user['id_kelahiran']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama Anak</label>
                                <input type="text" class="form-control" name=" nama_anak" id="nama_anak" value="<?= $kelahiran_user['nama_anak']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?= $kelahiran_user['nama_ayah']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $kelahiran_user['nama_ibu']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_kelahiran" value="<?= $kelahiran_user['tgl_kelahiran']; ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= $kelahiran_user['alamat']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hari Lahir</label>
                                    <select class="form-control" id="hari_kelahiran" name="hari_kelahiran">
                                        <option value="<?= $kelahiran_user['hari_kelahiran']; ?>"><?= $kelahiran_user['hari_kelahiran']; ?></option>
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
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_kelahiran" value="<?= $kelahiran_user['tempat_kelahiran']; ?>">
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="<?= $kelahiran_user['jenis_kelamin']; ?>"><?= $kelahiran_user['jenis_kelamin']; ?></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-7">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $kelahiran_user['pengantar_rt']; ?></label>
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