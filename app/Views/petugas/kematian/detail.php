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
                                    <img src="/pengantar/<?= $kematian['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>No.Surat</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['no_surat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($kematian['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['nama_meninggal']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Umur</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['umur']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kematian['jenis_kelamin'] == '1') {
                                                            echo 'Laki-Laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Meninggal</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['tempat_meninggal']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hari Kematian</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kematian['hari_meninggal2'] == '1') {
                                                            echo 'Senin';
                                                        } else if ($kematian['hari_meninggal2'] == '2') {
                                                            echo 'Selasa';
                                                        } else if ($kematian['hari_meninggal2'] == '3') {
                                                            echo 'Rabu';
                                                        } else if ($kematian['hari_meninggal2'] == '4') {
                                                            echo 'Kamis';
                                                        } else if ($kematian['hari_meninggal2'] == '5') {
                                                            echo 'Jumat';
                                                        } else if ($kematian['hari_meninggal2'] == '6') {
                                                            echo 'Sabtu';
                                                        } else {
                                                            echo 'Minggu';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($kematian['tgl_meninggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Sebab Meninggal</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['sebab_meninggal']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['nik']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>No. KK</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['no_kk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Kematian</th>
                                                    <td>:</td>
                                                    <td><?= $kematian['surat_kematian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kematian['status'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($kematian['status'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('kematian'); ?>">Kembali ke Halaman Kematian</a>
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