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

                        <form class="row g-3" action="/pindah/update_pindah_user/<?= $pindah['id_pindah']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <!-- <div class="col-8">
                                <label class="form-label">No Surat Kelahiran</label>
                                <input type="text" class="form-control" name="id_kelahiran" id="id_kelahiran" readonly>
                            </div> -->
                            <div class="col-6">
                                <label class="form-label">No. KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?= $pindah['no_kk']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $pindah['nama']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $pindah['nik']; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option <?= $pindah['jenis_kelamin']; ?>><?= $pindah['jenis_kelamin']; ?></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Jenis Permohonan</label>
                                <input type="text" class="form-control" name="jenis_permohonan" value="<?= $pindah['jenis_permohonan']; ?>" readonly></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $pindah['pekerjaan']; ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Asal</label>
                                <input type="text" class="form-control" name="alamat_asal" style="height: 100px;" value="<?= $pindah['alamat_asal']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Alamat Pindah</label>
                                <input type="text" class="form-control" name="alamat_pindah" style="height: 100px;" value="<?= $pindah['alamat_pindah']; ?>"></input>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Klasifikasi Perpindahan</label>
                                    <select class="form-control" id="klasifikasi_perpindahan" name="klasifikasi_perpindahan">
                                        <option value="<?= $pindah['klasifikasi_perpindahan']; ?>"><?= $pindah['klasifikasi_perpindahan']; ?></option>
                                        <option value="Dalam Satu Desa/Kelurahan">Dalam Satu Desa/Kelurahan</option>
                                        <option value="Antar Desa/Kelurahan">Antar Desa/Kelurahan</option>
                                        <option value="Antar Kecamatan">Antar Kecamatan</option>
                                        <option value="Antar Kabupaten Dalam Satu Provinsi">Antar Kabupaten Dalam Satu Provinsi</option>
                                        <option value="Antar Provinsi">Antar Provinsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <select class="form-control" id="alasan_pindah" name="alasan_pindah">
                                        <option value="<?= $pindah['alasan_pindah']; ?>"><?= $pindah['alasan_pindah']; ?></option>
                                        <option value="Pekerjaan">Pekerjaan</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Perumahan">Perumahan</option>
                                        <option value="Keluarga">Keluarga</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Jenis Kepindahan</label>
                                    <select class="form-control" id="jenis_kepindahan" name="jenis_kepindahan">
                                        <option value="<?= $pindah['jenis_kepindahan']; ?>"><?= $pindah['jenis_kepindahan']; ?></option>
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Kepala Keluarga dan Seluruh Anggota Keluarga">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
                                        <option value="Kepala Keluarga dan Sebagian Anggota Keluarga">Kepala Keluarga dan Sebagian Anggota Keluarga</option>
                                        <option value="Anggota Keluarga">Anggota Keluarga</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Anggota Keluarga Tidak Pindah</label>
                                    <select class="form-control" id="anggotakeluarga_tidakpindah" name="anggotakeluarga_tidakpindah">
                                        <option value="<?= $pindah['anggotakeluarga_tidakpindah']; ?>"><?= $pindah['anggotakeluarga_tidakpindah']; ?></option>
                                        <option value="Numpang Kartu Keluarga">Numpang Kartu Keluarga</option>
                                        <option value="Membuat Kartu Keluarga Baru">Membuat Kartu Keluarga Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Anggota Keluarga Pindah</label>
                                    <select class="form-control" id="anggotakeluarga_pindah" name="anggotakeluarga_pindah">
                                        <option value="<?= $pindah['anggotakeluarga_pindah']; ?>"><?= $pindah['anggotakeluarga_pindah']; ?></option>
                                        <option value="Numpang Kartu Keluarga">Numpang Kartu Keluarga</option>
                                        <option value="Membuat Kartu Keluarga Baru">Membuat Kartu Keluarga Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Daftar Anggota Keluarga Yang Pindah</label>
                                <input type="text" class="form-control" name="daftarpindah" style="height: 100px;" value="<?= $pindah['daftarpindah']; ?>"></input>
                            </div>
                            <div class="col-4">
                                <label for="kk">KK</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="kk" name="kk">
                                        <label class="custom-file-label" for="kk"><?= $pindah['kk']; ?></label>
                                    </div>
                                </div>
                                <span>File harus Berformat .PDF</span>
                            </div>
                            <div class="col-4">
                                <label for="foto">Foto Kepala Keluarga/Yang Pindah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="foto"><?= $pindah['foto']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="pengantar_rt">Pengantar RT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pengantar_rt" name="pengantar_rt">
                                        <label class="custom-file-label" for="pengantar_rt"><?= $pindah['pengantar_rt']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
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