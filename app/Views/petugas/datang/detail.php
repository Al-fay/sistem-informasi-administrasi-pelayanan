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
                                    <img src="/pengantar/<?= $datang['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($datang['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $datang['kepala_keluarga']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>:</td>
                                                    <td><?= $datang['tempat_lahir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($datang['tgl_lahir'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($datang['jenis_kelamin'] == '1') {
                                                            echo 'Laki-Laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status Perkawinan</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($datang['status_perkawinan'] == '1') {
                                                            echo 'Belum Kawin';
                                                        } else if ($datang['status_perkawinan'] == '2') {
                                                            echo 'Kawin';
                                                        } else if ($datang['status_perkawinan'] == '3') {
                                                            echo 'Cerai Hidup';
                                                        } else {
                                                            echo 'Cerai Mati';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Asal</th>
                                                    <td>:</td>
                                                    <td><?= $datang['alamat_asal']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Sekarang</th>
                                                    <td>:</td>
                                                    <td><?= $datang['alamat_sekarang']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Telepon</th>
                                                    <td>:</td>
                                                    <td><?= $datang['telepon']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Datang Anggota Keluarga Yang Diganti</th>
                                                    <td>:</td>
                                                    <td><?= $datang['data_anggotakeluarga']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Datang</th>
                                                    <td>:</td>
                                                    <td><?= $datang['surat_datang']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($datang['status'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($datang['status'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('datang'); ?>">Kembali ke Halaman Datang</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <iframe src="<?= base_url('kk/' . $datang['kk']); ?>" frameborder="0" width="100%"></iframe>
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