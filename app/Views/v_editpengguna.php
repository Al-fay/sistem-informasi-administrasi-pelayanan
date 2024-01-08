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

                        <form class="row g-3" action="/auth/update/<?= $pemohon['id_pemohon']; ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama Pemohon</label>
                                <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon" value="<?= $pemohon['nama_pemohon']; ?>" autofocus>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jns_kelamin" name="jns_kelamin">
                                        <option value="<?= $pemohon['jns_kelamin']; ?>">-- Pilih Jenis Kelamin --</option>
                                        <option value="1" <?= $pemohon['jns_kelamin'] == '1' ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="2" <?= $pemohon['jns_kelamin'] == '2' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat_pemohon" style="height: 100px;" value="<?= $pemohon['alamat_pemohon']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir_pemohon" id="tempat_lahir_pemohon" value="<?= $pemohon['tempat_lahir_pemohon']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir_pemohon" id="tgl_lahir_pemohon" value="<?= $pemohon['tgl_lahir_pemohon']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="<?= $pemohon['no_telepon']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik_pemohon" id="nik_pemohon" value="<?= $pemohon['nik_pemohon']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $pemohon['username']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" value="<?= $pemohon['password']; ?>">
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-outline-primary float-right">Edit</button>
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