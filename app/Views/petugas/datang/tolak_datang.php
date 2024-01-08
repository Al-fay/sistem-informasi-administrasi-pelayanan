<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1><a href="<?= base_url('datang'); ?>"><i class="fa fa-arrow-left mr-2"></i></a><?= $title; ?></h1>
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
                            <a href="<?= base_url('datang/belum_diproses'); ?>" class="btn btn-outline-secondary mb-2">Belum Diverifikasi</a>
                            <a href="<?= base_url('datang/terima_surat'); ?>" class="btn btn-outline-success mb-2">Terima</a>
                            <a href="<?= base_url('datang/tolak_surat'); ?>" class="btn btn-outline-danger mb-2">Tolak</a>
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
                                    <th scope="col">Alamat Asal</th>
                                    <th scope="col">Alamat Sekarang</th>
                                    <th scope="col">Pengantar RT</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($datang as $key => $value) { ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i++; ?></th>
                                        <td><?= date('d-m-Y', strtotime($value->tanggal)) ?></td>
                                        <td><?= $value->kepala_keluarga; ?></td>
                                        <td><?= $value->alamat_asal ?></td>
                                        <td><?= $value->alamat_sekarang ?></td>
                                        <td><img src="<?= '/pengantar/' . $value->pengantar_rt ?>" width="100px"></td>
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
                                            <a class="btn btn-outline-danger my-1" href="<?= base_url('datang/upload/' . $value->id_datang); ?>"><i class="fa fa-upload"></i>&nbsp; Upload</a>
                                            <a class="btn btn-outline-secondary my-1" href="<?= base_url('datang/status/' . $value->id_datang); ?>"><i class="fa fa-check"></i>&nbsp; Verifikasi</a>

                                            <a class="btn btn-outline-success my-1" href="<?= base_url('datang/detail/' . $value->id_datang); ?>"><i class="fa fa-info"></i>&nbsp; Detail</a>
                                            <a class="btn btn-outline-warning my-1" href="<?= base_url('datang/edit_datang/' . $value->id_datang); ?>"><i class="fa fa-edit"></i>&nbsp; Edit</a>
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