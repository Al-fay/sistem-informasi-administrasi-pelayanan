<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-8">
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

                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/pengantar/<?= $pengantar['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>No.Surat</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['no_surat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($pengantar['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['tempat_lahir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($pengantar['tgl_lahir'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Negara</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['negara']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Agama</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pengantar['agama'] == '1') {
                                                            echo 'Islam';
                                                        } else if ($pengantar['agama'] == '2') {
                                                            echo 'Prostestan';
                                                        } else if ($pengantar['agama'] == '3') {
                                                            echo 'Katolik';
                                                        } else if ($pengantar['agama'] == '4') {
                                                            echo 'Hindu';
                                                        } else if ($pengantar['agama'] == '5') {
                                                            echo 'Buddha';
                                                        } else {
                                                            echo 'Khonghucu';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Pekerjaan</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['pekerjaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Bukti Diri</th>
                                                    <td>:</td>
                                                    <td>No.KTP <?= $pengantar['no_ktp']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Keperluan</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pengantar['keperluan'] == '1') {
                                                            echo 'Surat Pengantar Kehilangan Polsek';
                                                        } else if ($pengantar['keperluan'] == '2') {
                                                            echo 'Surat Pengantar Kehilangan Polres';
                                                        } else if ($pengantar['keperluan'] == '3') {
                                                            echo 'Surat Pengantar SKCK Polsek';
                                                        } else {
                                                            echo 'Surat Pengantar SKCK Polres';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Keterangan Lain-Lain</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['keterangan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Pengantar</th>
                                                    <td>:</td>
                                                    <td><?= $pengantar['surat_pengantar']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pengantar['status'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($pengantar['status'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('suratpengantar'); ?>">Kembali ke Halaman Surat Pengantar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<?= $this->endSection(); ?>