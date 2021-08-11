<?php
ob_start();
session_start();
require_once('config/+koneksi.php');
require_once('model/database.php');
require_once('session/cek_sesi_guru.php');

$connection = new Database($host, $user, $pass, $database);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ABSEN SMANSKA</title>

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dataTables/datatables.css">
    <link rel="stylesheet" href="assets/dataTables/datatables.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">

</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="home.php">SMAN 1 KARANGANYAR</a>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    </ul>
                </div>
            </nav>
        </div>
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#"><i class="fas fa-home"></i>Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                <a class="nav-link" href="home_guru.php"><i class="fas fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=siswa"><i class="fab fa-fw fa-wpforms"></i>list Data Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=mapel"><i class="fas fa-book"></i>Mata Pelajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=absen"><i class="fas fa-id-card"></i>Presensi Siswa</a>
                            </li>
                            <li class="nav-divider">
                                <a class="nav-link" href="logout.php"><i class="fas fa-arrow-circle-left"></i>Logout</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <?php
                if (@$_GET['page'] == 'mapel') {
                    include "view/mapel_guru.php";
                } else 
                    if (@$_GET['page'] == 'siswa') {
                    include "view/siswa_guru.php";
                } else 
                    if (@$_GET['page'] == 'absen') {
                    include "view/absen_guru.php";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/dataTables/datatables.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel_absen').DataTable();
        });
        $(document).ready(function() {
            $('#tabel_guru').DataTable();
        });
        $(document).ready(function() {
            $('#tabel_mapel').DataTable();
        });
        $(document).ready(function() {
            $('#tabel_siswa').DataTable();
        });
    </script>
</body>

</html>