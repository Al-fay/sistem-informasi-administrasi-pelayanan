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

                        <form class="row g-3" action="/datang/update_datang/<?= $datang['id_datang']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <!-- <div class="col-8">
                                <label class="form-label">No Surat Kelahiran</label>
                                <input type="text" class="form-control" name="id_kelahiran" id="id_kelahiran" readonly>
                            </div> -->
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="kepala_keluarga" id="kepala_keluarga" value="<?= $datang['kepala_keluarga']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $datang['tempat_lahir']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $datang['tgl_lahir']; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="1" <?= $datang['jenis_kelamin'] == '1' ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="2" <?= $datang['jenis_kelamin'] == '2' ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                                        <option value="">-- Pilih Status Perkawinan --</option>
                                        <option value="1" <?= $datang['status_perkawinan'] == '1' ? 'selected' : ''; ?>>Belum Kawin</option>
                                        <option value="2" <?= $datang['status_perkawinan'] == '2' ? 'selected' : ''; ?>>Kawin</option>
                                        <option value="3" <?= $datang['status_perkawinan'] == '3' ? 'selected' : ''; ?>>Cerai Hidup</option>
                                        <option value="4" <?= $datang['status_perkawinan'] == '4' ? 'selected' : ''; ?>>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="telepon" value="<?= $datang['telepon']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Asal</label>
                                <input type="text" class="form-control" name="alamat_asal" style="height: 100px;" value="<?= $datang['alamat_asal']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Sekarang</label>
                                <input type="text" class="form-control" name="alamat_sekarang" style="height: 100px;" value="<?= $datang['alamat_sekarang']; ?>"></input>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Data Anggota Keluarga Yang Diganti</label>
                                <input type="text" class="form-control" name="data_anggotakeluarga" style="height: 100px;" value="<?= $datang['data_anggotakeluarga']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label for="kk">KK</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="kk" name="kk">
                                        <label class="custom-file-label" for="kk"><?= $datang['kk']; ?></label>
                                    </div>
                                </div>
                                <span>File harus Berformat .PDF</span>
                            </div>
                            <div class="col-6">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $datang['pengantar_rt']; ?></label>
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