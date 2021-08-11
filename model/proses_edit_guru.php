<?php
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_guru.php";
$connection = new Database($host, $user, $pass, $database);
$guru = new guru($connection);


$idguru = $_POST['idguru'];
$nip = $connection->conn->real_escape_string($_POST['nip']);
$nama = $connection->conn->real_escape_string($_POST['nama']);
$pangkat = $connection->conn->real_escape_string($_POST['pangkat']);
$nohp = $connection->conn->real_escape_string($_POST['nohp']);

$pict = $_FILES['foto']['name'];
$extensi = explode(".", $_FILES['foto']['name']);
$foto = "img-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['foto']['tmp_name'];

$pasguru = $connection->conn->real_escape_string($_POST['pasguru']);

if ($pict == '') {
    $guru->edit("UPDATE guru SET nip='$nip', nama='$nama', pangkat='$pangkat', nohp='$nohp', pasguru='$pasguru' WHERE idguru='$idguru' ");
    echo "<script>window.location='?page=guru';</script>";
} else {
    $fotoawal = $guru->tampil($idguru)->fetch_object()->foto;
    unlink("../assets/img/guru/" . $fotoawal);

    $upload = move_uploaded_file($sumber, "../assets/img/guru/" . $foto);
    if ($upload) {
        $guru->edit("UPDATE guru SET nip='$nip', nama='$nama', pangkat='$pangkat', nohp='$nohp', foto='$foto', pasguru='$pasguru' WHERE idguru='$idguru' ");
        echo "<script>window.location='?page=guru';</script>";
    } else {
        echo "<script>alert('upload gambar gagal!')</script>";
    }
}
