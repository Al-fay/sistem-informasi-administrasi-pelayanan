<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/petugas" class="brand-link">
                <span class="brand-text font-weight-light">Administrasi Pelayanan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php if (session()->get('role') == 'petugas') { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('/petugas'); ?>" class="nav-link">
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a class="nav-link">
                                    <p>LAMPID<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/kelahiran'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Kelahiran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/kematian'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Kematian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/pindah'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Pindah</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/datang'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Datang</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/keterangan'); ?>" class="nav-link">
                                    <p>Surat Keterangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/suratpengantar'); ?>" class="nav-link">
                                    <p>Surat Pengantar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url("auth/pengguna"); ?>" class="nav-link">
                                    <p>Daftar Pemohon</p>
                                </a>
                            </li>
                        <?php } elseif (session()->get('role') == 'lurah') { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('/laporan'); ?>" class="nav-link">
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a class="nav-link">
                                    <p>Laporan LAMPID<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/laporan/kelahiran'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Surat Kelahiran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/laporan/kematian'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Surat Kematian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/laporan/pindah'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Surat Pindah</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/laporan/datang'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Surat Datang</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url("laporan/keterangan"); ?>" class="nav-link">
                                    <p>Laporan Surat Keterangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/laporan/pengantar'); ?>" class="nav-link">
                                    <p>Laporan Surat Pengantar</p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('/pemohon'); ?>" class="nav-link">
                                    <p>Home</p>
                                </a>
                            </li>
                            <li class="nav-item menu-open">
                                <a class="nav-link">
                                    <p>LAMPID<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('/kelahiran'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Kelahiran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/kematian'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Kematian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/pindah'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Pindah</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('/datang'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Datang</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/keterangan'); ?>" class="nav-link">
                                    <p>Surat Keterangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('/suratpengantar'); ?>" class="nav-link">
                                    <p>Surat Pengantar</p>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                                <p>LogOut</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content'); ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- <div class="float-right d-none d-sm-inline">
                You'll Never Walk Alone
            </div> -->
            <!-- Default to the left -->
            <strong><a href="#">Muhammad Diva Alfahrizy</a> <?= date('Y'); ?>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LogOut?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url('adminlte'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte'); ?>/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>