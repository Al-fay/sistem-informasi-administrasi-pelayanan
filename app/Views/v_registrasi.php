<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h5 class="login-box-msg">Daftar Akun Baru</h5>

                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <?php echo form_open('auth/add_pemohon') ?>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Nama Pemohon" id="nama_pemohon" name="nama_pemohon" value="<?= old('nama_pemohon'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <select class="form-control" id="jns_kelamin" name="jns_kelamin">
                        <option disabled selected value="">-- Pilih Jenis Kelamin --</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Alamat" id="alamat_pemohon" name="alamat_pemohon" value="<?= old('alamat_pemohon'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir_pemohon" name="tempat_lahir_pemohon" value="<?= old('tempat_lahir_pemohon'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hospital"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="date" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir_pemohon" name="tgl_lahir_pemohon" value="<?= old('tgl_lahir_pemohon'); ?>">
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="No.Telepon" id="no_telepon" name="no_telepon" value="<?= old('no_telepon'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-address-book"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="NIK" id="nik_pemohon" name="nik_pemohon" value="<?= old('nik_pemohon'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hashtag"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= old('username'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?= old('password'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                    </div>
                </div>
                <?php echo form_close() ?>

                <div class="mt-3">
                    <p>
                        <a href="<?= base_url('auth/') ?>">Sudah Mempunyai Akun?, Silahkan Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>