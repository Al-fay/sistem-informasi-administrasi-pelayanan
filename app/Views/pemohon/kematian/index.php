<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-8">
                <h1 class="m-0"><?= $title; ?></h1>
            </div>
            <div class="col-4">
                <a href="<?= base_url('kematian/tambah_kematian') ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
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
                                    <th scope="col">Tanggal Meninggal</th>
                                    <th scope="col">Pengantar RT</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kematian as $key => $value) { ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i++; ?></th>
                                        <td><?= date('d-m-Y', strtotime($value->tanggal)) ?></td>
                                        <td><?= $value->nama_meninggal; ?></td>
                                        <td><?= $value->alamat ?></td>
                                        <td><?= date('d-m-Y', strtotime($value->tgl_meninggal)) ?></td>
                                        <td><img src="<?= 'pengantar/' . $value->pengantar_rt ?>" width="100px"></td>
                                        <td><?= $value->status ?></td>
                                        <td>
                                            <a class="btn btn-outline-danger" href="#"><i class="fa fa-file-download"></i>&nbsp; Unduh</a>

                                            <a class="btn btn-outline-success" href="<?= base_url('kematian/detail/' . $value->id_meninggal); ?>"><i class="fa fa-info"></i>&nbsp; Detail</a>

                                            <a class="btn btn-outline-warning" href="<?= base_url('kematian/edit_kematian/' . $value->id_meninggal); ?>"><i class="fa fa-edit"></i>&nbsp; Edit</a>
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