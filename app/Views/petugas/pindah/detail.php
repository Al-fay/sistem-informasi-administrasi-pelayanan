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
                                    <img src="/pengantar/<?= $pindah['pengantar_rt']; ?>" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Tanggal Surat</th>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($pindah['tanggal'])) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>No. KK</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['kk']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['nik']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['jenis_kelamin'] == '1') {
                                                            echo 'Laki-Laki';
                                                        } else {
                                                            echo 'Perempuan';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Permohonan</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['jenis_permohonan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Pekerjaan</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['pekerjaan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Asal</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['alamat_asal']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Pindah</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['alamat_pindah']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Klasifikasi Perpindahan</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['klasifikasi_perpindahan'] == '1') {
                                                            echo 'Dalam Satu Desa/Kelurahan';
                                                        } else if ($pindah['klasifikasi_perpindahan'] == '2') {
                                                            echo 'Antar Desa/Kelurahan';
                                                        } else if ($pindah['klasifikasi_perpindahan'] == '3') {
                                                            echo 'Antar Kecamatan';
                                                        } else if ($pindah['klasifikasi_perpindahan'] == '4') {
                                                            echo 'Antar Kabupaten Dalam Satu Provinsi';
                                                        } else {
                                                            echo 'Antar Provinsi';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Alasan Pindah</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['alasan_pindah'] == '1') {
                                                            echo 'Pekerjaan';
                                                        } else if ($pindah['alasan_pindah'] == '2') {
                                                            echo 'Pendidikan';
                                                        } else if ($pindah['alasan_pindah'] == '3') {
                                                            echo 'Keamanan';
                                                        } else if ($pindah['alasan_pindah'] == '4') {
                                                            echo 'Kesehatan';
                                                        } else if ($pindah['alasan_pindah'] == '5') {
                                                            echo 'Perumahan';
                                                        } else {
                                                            echo 'Keluarga';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kepindahan</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['jenis_kepindahan'] == '1') {
                                                            echo 'Kepala Keluarga';
                                                        } else if ($pindah['jenis_kepindahan'] == '2') {
                                                            echo 'Kepala Keluarga dan Seluruh Anggota Keluarga';
                                                        } else if ($pindah['jenis_kepindahan'] == '3') {
                                                            echo 'Kepala Keluarga dan Sebagian Anggota Keluarga';
                                                        } else {
                                                            echo 'Anggota Keluarga';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Anggota Keluarga Tidak Pindah</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['anggotakeluarga_tidakpindah'] == '1') {
                                                            echo 'Numpang Kartu Keluarga';
                                                        } else {
                                                            echo 'Membuat Kartu Keluarga Baru';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Anggota Keluarga Pindah</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['anggotakeluarga_pindah'] == '1') {
                                                            echo 'Numpang Kartu Keluarga';
                                                        } else {
                                                            echo 'Membuat Kartu Keluarga Baru';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Daftar Anggota Keluarga Yang Pindah</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['daftarpindah']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Surat Pindah</th>
                                                    <td>:</td>
                                                    <td><?= $pindah['surat_pindah']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if ($pindah['status'] == '1') {
                                                            echo 'Surat Masih Diproses';
                                                        } elseif ($pindah['status'] == '2') {
                                                            echo 'Terima - Surat Selesai Diproses';
                                                        } else {
                                                            echo 'Tolak - File Yang Diupload Kurang Jelas';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto</th>
                                                    <td>:</td>
                                                    <td><img src="/foto/<?= $pindah['foto']; ?>" width="100px"></td>
                                                </tr>
                                        </table>
                                        <a href="<?= base_url('pindah'); ?>">Kembali ke Halaman pindah</a>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <iframe src="<?= base_url('kk/' . $pindah['kk']); ?>" frameborder="0" width="100%"></iframe>
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