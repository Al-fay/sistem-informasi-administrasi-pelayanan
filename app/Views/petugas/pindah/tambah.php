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

                        <form class="row g-3" action="/pindah/add" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="col-6">
                                <label class="form-label">No. KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" autofocus value="<?= old('no_kk'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= old('nik'); ?>">
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
                                <label class="form-label">Jenis Permohonan</label>
                                <input type="text" class="form-control" name="jenis_permohonan" value="Surat Keterangan Pindah" readonly></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= old('pekerjaan'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Asal</label>
                                <input type="text" class="form-control" name="alamat_asal" style="height: 100px;" value="<?= old('alamat_asal'); ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Pindah</label>
                                <input type="text" class="form-control" name="alamat_pindah" style="height: 100px;" value="<?= old('alamat_pindah'); ?>"></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Klasifikasi Perpindahan</label>
                                    <select class="form-control" id="klasifikasi_perpindahan" name="klasifikasi_perpindahan">
                                        <option selected disabled value="">-- Pilih Klasifikasi Perpindahan --</option>
                                        <option value="1">Dalam Satu Desa/Kelurahan</option>
                                        <option value="2">Antar Desa/Kelurahan</option>
                                        <option value="3">Antar Kecamatan</option>
                                        <option value="4">Antar Kabupaten Dalam Satu Provinsi</option>
                                        <option value="5">Antar Provinsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <select class="form-control" id="alasan_pindah" name="alasan_pindah">
                                        <option selected disabled value="">-- Pilih Alasan Pindah --</option>
                                        <option value="1">Pekerjaan</option>
                                        <option value="2">Pendidikan</option>
                                        <option value="3">Keamanan</option>
                                        <option value="4">Kesehatan</option>
                                        <option value="5">Perumahan</option>
                                        <option value="6">Keluarga</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kepindahan</label>
                                    <select class="form-control" id="jenis_kepindahan" name="jenis_kepindahan">
                                        <option selected disabled value="">-- Pilih Jenis Kepindahan --</option>
                                        <option value="1">Kepala Keluarga</option>
                                        <option value="2">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
                                        <option value="3">Kepala Keluarga dan Sebagian Anggota Keluarga</option>
                                        <option value="4">Anggota Keluarga</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Anggota Keluarga Tidak Pindah</label>
                                    <select class="form-control" id="anggotakeluarga_tidakpindah" name="anggotakeluarga_tidakpindah">
                                        <option selected disabled value="">-- Pilih Anggota Keluarga Tidak Pindah --</option>
                                        <option value="1">Numpang Kartu Keluarga</option>
                                        <option value="2">Membuat Kartu Keluarga Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Anggota Keluarga Pindah</label>
                                    <select class="form-control" id="anggotakeluarga_pindah" name="anggotakeluarga_pindah">
                                        <option selected disabled value="">-- Pilih Anggota Keluarga Pindah --</option>
                                        <option value="1">Numpang Kartu Keluarga</option>
                                        <option value="2">Membuat Kartu Keluarga Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Daftar Anggota Keluarga Yang Pindah</label>
                                <input type="text" class="form-control" name="daftarpindah" style="height: 100px;" value="<?= old('daftarpindah'); ?>"></input>
                            </div>
                            <div class="col-4">
                                <label for="kk">KK</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="kk" name="kk" value="<?= old('kk'); ?>">
                                        <label class="custom-file-label" for="kk">Pilih File</label>
                                    </div>
                                </div>
                                <span>File harus Berformat .PDF</span>
                            </div>
                            <div class="col-4">
                                <label for="foto">Foto Kepala Keluarga/Yang Pindah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" value="<?= old('foto'); ?>">
                                        <label class="custom-file-label" for="foto">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
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