<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->get('role') == 'petugas') { ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-8">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>
                <div class="col-4">
                    <a href="<?= base_url('keterangan/tambah_keterangan') ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
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
                            <div class="col-12">
                                <a href="<?= base_url('keterangan/belum_diproses'); ?>" class="btn btn-outline-secondary mb-2">Belum Diverifikasi</a>
                                <a href="<?= base_url('keterangan/terima_surat'); ?>" class="btn btn-outline-success mb-2">Terima</a>
                                <a href="<?= base_url('keterangan/tolak_surat'); ?>" class="btn btn-outline-danger mb-2">Tolak</a>
                            </div>

                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Surat</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Keperluan</th>
                                        <th scope="col">Pengantar RT</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($keterangan as $key => $value) { ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td><?= date('d-m-Y', strtotime($value->tanggal)) ?></td>
                                            <td><?= $value->nama; ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td>
                                                <?php
                                                if ($value->keperluan == '1') {
                                                    echo 'Surat Keterangan Tidak Mampu';
                                                } else if ($value->keperluan == '2') {
                                                    echo 'Surat Keterangan Usaha';
                                                } else if ($value->keperluan == '3') {
                                                    echo 'Surat Keterangan Domisili';
                                                } else {
                                                    echo 'Surat Keterangan Satu Nama';
                                                }
                                                ?>
                                            </td>
                                            <td><img src="<?= 'pengantar/' . $value->pengantar_rt ?>" width="100px"></td>
                                            <td>
                                                <?php
                                                if ($value->status == '1') {
                                                    echo 'Surat Masih Diproses';
                                                } elseif ($value->status == '2') {
                                                    echo 'Terima - Surat Selesai Diproses';
                                                } else {
                                                    echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->surat_keterangan == '') {
                                                    echo '<button type="button" class="btn btn-outline-info my-1" disabled><i class=" fa fa-file-download"></i>&nbsp; Unduh</button>';
                                                } else {
                                                    echo '<a class="btn btn-outline-info my-1" href="' . base_url("keterangan/unduh/" . $value->id_keterangan) . '"><i class="fa fa-file-download"></i>&nbsp; Unduh</a>';
                                                }
                                                ?>
                                                <a class="btn btn-outline-danger my-1" href="<?= base_url('keterangan/upload/' . $value->id_keterangan); ?>"><i class="fa fa-upload"></i>&nbsp; Upload</a>
                                                <a class="btn btn-outline-secondary my-1" href="<?= base_url('keterangan/status/' . $value->id_keterangan); ?>"><i class="fa fa-check"></i>&nbsp; Verifikasi</a>
                                                <a class="btn btn-outline-success my-1" href="<?= base_url('keterangan/detail/' . $value->id_keterangan); ?>"><i class="fa fa-info"></i>&nbsp; Detail</a>
                                                <a class="btn btn-outline-warning my-1" href="<?= base_url('keterangan/edit_keterangan/' . $value->id_keterangan); ?>"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<?php } else { ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-8">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>
                <div class="col-4">
                    <a href="<?= base_url('keterangan/tambah_keterangan') ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
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

                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Surat</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Keperluan</th>
                                        <th scope="col">Pengantar RT</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($keterangan_user as $key => $value) { ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?= $i++; ?></th>
                                            <td><?= date('d-m-Y', strtotime($value->tanggal)) ?></td>
                                            <td><?= $value->nama; ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td>
                                                <?php
                                                if ($value->keperluan == '1') {
                                                    echo 'Surat Keterangan Tidak Mampu';
                                                } else if ($value->keperluan == '2') {
                                                    echo 'Surat Keterangan Usaha';
                                                } else if ($value->keperluan == '3') {
                                                    echo 'Surat Keterangan Domisili';
                                                } else {
                                                    echo 'Surat Keterangan Satu Nama';
                                                }
                                                ?>
                                            </td>
                                            <td><img src="<?= 'pengantar/' . $value->pengantar_rt ?>" width="100px"></td>
                                            <td>
                                                <?php
                                                if ($value->status == '1') {
                                                    echo 'Surat Masih Diproses';
                                                } elseif ($value->status == '2') {
                                                    echo 'Terima - Surat Selesai Diproses';
                                                } else {
                                                    echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($value->surat_keterangan == '') {
                                                    echo '<button type="button" class="btn btn-outline-danger my-1 btn-sm" disabled><i class=" fa fa-file-download"></i>&nbsp; Unduh</button>';
                                                } else {
                                                    echo '<a class="btn btn-outline-danger my-1 btn-sm" href="' . base_url("keterangan/unduh/" . $value->id_keterangan) . '"><i class="fa fa-file-download"></i>&nbsp; Unduh</a>';
                                                }
                                                ?>

                                                <a class="btn btn-outline-success my-1 btn-sm" href="<?= base_url('keterangan/detail/' . $value->id_keterangan); ?>"><i class="fa fa-info"></i>&nbsp; Detail</a>
                                                <a class="btn btn-outline-warning my-1 btn-sm" href="<?= base_url('keterangan/edit_keterangan/' . $value->id_keterangan); ?>"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<?php } ?>
<?= $this->endSection(); ?>