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

                        <form class="row g-3" action="/kelahiran/update_kelahiran/<?= $kelahiran['id_kelahiran']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">Nama Anak</label>
                                <input type="text" class="form-control" name=" nama_anak" id="nama_anak" value="<?= $kelahiran['nama_anak']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?= $kelahiran['nama_ayah']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="<?= $kelahiran['nama_ibu']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_kelahiran" value="<?= $kelahiran['tgl_kelahiran']; ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" style="height: 100px;" value="<?= $kelahiran['alamat']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_kelahiran" value="<?= $kelahiran['tempat_kelahiran']; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1" <?= $kelahiran['jenis_kelamin'] == '1' ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="2" <?= $kelahiran['jenis_kelamin'] == '2' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-7">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $kelahiran['pengantar_rt']; ?></label>
                                    </div>
                                </div>
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