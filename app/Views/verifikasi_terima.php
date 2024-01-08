<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1><a href="<?= base_url('auth/pengguna'); ?>"><i class="fa fa-arrow-left mr-2"></i></a><?= $title; ?></h1>
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
                            <a href="<?= base_url('auth/belum_verifikasi'); ?>" class="btn btn-outline-secondary mb-2">Belum Diverifikasi</a>
                            <a href="<?= base_url('auth/terima_verifikasi'); ?>" class="btn btn-outline-success mb-2">Terima</a>
                            <a href="<?= base_url('auth/tolak_verifikasi'); ?>" class="btn btn-outline-danger mb-2">Tolak</a>
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
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Nama Pemohon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No.Telepon</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengguna as $key => $value) { ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i++; ?></th>
                                        <td><?= date('d-m-Y', strtotime($value->tgl_daftar)) ?></td>
                                        <td><?= $value->nama_pemohon; ?></td>
                                        <td><?= $value->alamat_pemohon; ?></td>
                                        <td><?= $value->no_telepon; ?></td>
                                        <td><?= $value->username; ?></td>
                                        <td><?= $value->password; ?></td>
                                        <td>
                                            <?php
                                            if ($value->status_akun == '1') {
                                                echo 'Masih Diproses';
                                            } elseif ($value->status_akun == '2') {
                                                echo 'Terima';
                                            } else {
                                                echo 'Tolak';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-secondary mt-1" href="<?= base_url('auth/status/' . $value->id_pemohon); ?>"><i class="fa fa-check"></i>&nbsp; Verifikasi</a>
                                            <a class="btn btn-outline-warning mt-1" href="<?= base_url('auth/edit_pengguna/' . $value->id_pemohon) ?>"><i class="fa fa-edit"></i>Edit</a>
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


<?= $this->endSection(); ?>