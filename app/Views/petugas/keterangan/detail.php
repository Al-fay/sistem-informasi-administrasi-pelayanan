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
                                    <img src="/pengantar/<?= $keterangan['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>No.Surat</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['no_surat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($keterangan['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['tempat_lahir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($keterangan['tgl_lahir'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Negara</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['negara']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Agama</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($keterangan['agama'] == '1') {
                                                            echo 'Islam';
                                                        } else if ($keterangan['agama'] == '2') {
                                                            echo 'Prostestan';
                                                        } else if ($keterangan['agama'] == '3') {
                                                            echo 'Katolik';
                                                        } else if ($keterangan['agama'] == '4') {
                                                            echo 'Hindu';
                                                        } else if ($keterangan['agama'] == '5') {
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
                                                    <td><?= $keterangan['pekerjaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Bukti Diri</th>
                                                    <td>:</td>
                                                    <td>No.KTP. <?= $keterangan['no_ktp']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Keperluan</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($keterangan['keperluan'] == '1') {
                                                            echo 'Surat Keterangan Tidak Mampu';
                                                        } else if ($keterangan['keperluan'] == '2') {
                                                            echo 'Surat Keterangan Usaha';
                                                        } else if ($keterangan['keperluan'] == '3') {
                                                            echo 'Surat Keterangan Domisili';
                                                        } else {
                                                            echo 'Surat Keterangan Satu Nama';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Keterangan Lain-Lain</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['keterangan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Keterangan</th>
                                                    <td>:</td>
                                                    <td><?= $keterangan['surat_keterangan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($keterangan['status'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($keterangan['status'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('keterangan'); ?>">Kembali ke Halaman Surat Keterangan</a>
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