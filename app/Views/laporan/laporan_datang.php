<?= $this->extend('layout/template') ?>

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

                        <?= form_open('laporan/cetak_datang', ['target' => '_blank']); ?>
                        <div class="col-4">
                            <label class="form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tglawal" id="tglawal" required>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tglakhir" id="tglakhir" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-print"></i>&ensp; Cetak</button>
                        </div>
                        </form>

                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<?= $this->endSection(); ?>