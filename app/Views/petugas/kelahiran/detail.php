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
                                    <img src="/pengantar/<?= $kelahiran['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>No.Surat</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['no_surat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($kelahiran['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Anak</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['nama_anak']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Ayah</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['nama_ayah']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Ibu</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['nama_ibu']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kelahiran['jenis_kelamin'] == '1') {
                                                            echo 'Laki-Laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Hari Lahir</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kelahiran['hari_kelahiran2'] == '1') {
                                                            echo 'Senin';
                                                        } else if ($kelahiran['hari_kelahiran2'] == '2') {
                                                            echo 'Selasa';
                                                        } else if ($kelahiran['hari_kelahiran2'] == '3') {
                                                            echo 'Rabu';
                                                        } else if ($kelahiran['hari_kelahiran2'] == '4') {
                                                            echo 'Kamis';
                                                        } else if ($kelahiran['hari_kelahiran2'] == '5') {
                                                            echo 'Jumat';
                                                        } else if ($kelahiran['hari_kelahiran2'] == '6') {
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
                                                    <td><?= date('d-m-Y', strtotime($kelahiran['tgl_kelahiran'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['tempat_kelahiran']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Kelahiran</th>
                                                    <td>:</td>
                                                    <td><?= $kelahiran['surat_kelahiran']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($kelahiran['status_kelahiran'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($kelahiran['status_kelahiran'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('kelahiran'); ?>">Kembali ke Halaman Kelahiran</a>
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