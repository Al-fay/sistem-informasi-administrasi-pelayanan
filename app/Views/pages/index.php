<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="<?= base_url('web'); ?>/image/x-icon" href="<?= base_url('web'); ?>/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('web'); ?>/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Kedungwuni Barat</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pelayanan">Pelayanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class=" nav-item"><a class="nav-link" href="<?= base_url('auth'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Kelurahan Kedungwuni Barat</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Selamat Datang Di Sistem Informasi Administrasi Pelayanan Kelurahan Kedungwuni Barat</p>
                    <a class="btn btn-primary btn-xl" href="#tentang">Selengkapnya</a>
                </div>
            </div>
        </div>
    </header>
    <!-- tentang-->
    <section class="page-section bg-primary" id="tentang">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mt-0">Tentang</h1>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Sistem informasi administrasi pelayanan kelurahan Kedungwuni Barat merupakan sebuah aplikai yang berkaitan dengan administrasi pelayanan. Aplikasi berbasis web ini bermanfaat untuk mempermudah dan mempercepat masyarakat kelurahan Kedungwuni Barat dalam mengelola administrasi pelayanan</p>
                </div>
            </div>
        </div>
    </section>
    <!-- pelayanan-->
    <section class="page-section" id="pelayanan">
        <div class="container px-4 px-lg-5">
            <h1 class="text-center mt-0">Pelayanan</h1>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Kelahiran</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Kematian</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Pindah</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Datang</h3>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Keterangan</h3>
                        <p class="text-muted mb-0">Surat keterangan yang dapat diajukan antara lain surat keterangan kemiskinan, surat keterangan usaha, surat keterangan domisili, surat keterangan satu nama</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                        <h3 class="h4 mb-2">Surat Pengantar</h3>
                        <p class="text-muted mb-0">Surat pengantar yang dapat diajukan antara lain surat pengantar kehilangan polsek, surat pengantar kehilangan polres, surat pengantar SKCS polsek, surat pengantar SKCS polres</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="mb-4">Tata Cara Melakukan Administrasi Pelayanan</h1>
        </div>
        <div class="row justify-content-center ">
            <div class="col-6">
                <ul class="list-group list-group-flush">
                    <li>
                        <h5>Pemohon melakukan login terlebih dahulu, jika belum memiliki akun silahkan daftar terlebih dahulu dengan menekan tombol <a href="<?= base_url('auth/registrasi'); ?>">Daftar Akun Baru</a></h5>
                    </li>
                    <li>
                        <h5>Pilih Menu Surat Permohonan sesuai kebutuhan, misalnya akan mengajukan surat permohonan kelahiran maka klik menu surat kelahiran</h5>
                    </li>
                    <li>
                        <h5>Setelah itu klik tombol "tambah data"</h5>
                    </li>
                    <li>
                        <h5>Tombol "edit" digunakan untuk mengubah data surat permohonan</h5>
                    </li>
                    <li>
                        <h5>Tombol "detail" digunakan untuk melihat detail data surat permohonan</h5>
                    </li>
                    <li>
                        <h5>Tombol "unduh" digunakan untuk mengunduh surat permohonan</h5>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container px-4 px-lg-5 text-center">
            <br>
            <a class="btn btn-primary btn-xl" href="<?= base_url('auth'); ?>">Mulai</a>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="kontak">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="mt-0">Kontak</h1>
                    <hr class="divider" />
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 text-center">
                    <div class="card ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h2>E-Mail</h2>
                            </li>
                            <li class="list-group-item">
                                <h5>kelkedungwunibarat@gmail.com</h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3>No. Telepon</h3>
                            </li>
                            <li class="list-group-item">
                                <h5>(0285) 784985</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; <?= date('Y'); ?> - Kelurahan Kedungwuni Barat</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('web'); ?>/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>