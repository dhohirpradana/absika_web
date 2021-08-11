<?php
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');

include "../model/m_login.php";

$connection = new Database($host, $user, $pass, $database);
$login = new login($connection);

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$tampil = $login->tampil_guru($username, $password);

if ($data = $tampil->fetch_object()) {
    $_SESSION['id_guru'] = $data->idguru;
    $_SESSION['nama_guru'] = $data->nama;

    echo "<script>window.location = '../home_guru.php'</script>";
} else {
    $tampil = $login->tampil_siswa($username, $password);

    if ($data = $tampil->fetch_object()) {
        $_SESSION['id_siswa'] = $data->idsiswa;
        $_SESSION['nama_siswa'] = $data->nama;

        echo "<script>alert('siswa berhasil login')</script>";
    } else {
        $tampil = $login->tampil_admin($username, $password);

        if ($data = $tampil->fetch_object()) {
            $_SESSION['admin'] = $data->username;

            echo "<script>window.location = '../home.php'</script>";
        } else {
        }
    }
}
