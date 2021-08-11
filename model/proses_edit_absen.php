<?php
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_absen.php";
$connection = new Database($host, $user, $pass, $database);
$absen = new absen($connection);


$idabsen = $_POST['idabsen'];
$nis = $connection->conn->real_escape_string($_POST['nis']);
$kdmapel = $connection->conn->real_escape_string($_POST['kdmapel']);
$tgl = $connection->conn->real_escape_string($_POST['tgl']);

$pict = $_FILES['foto']['name'];
$extensi = explode(".", $_FILES['foto']['name']);
$foto = "img-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['foto']['tmp_name'];

$latitude = $connection->conn->real_escape_string($_POST['latitude']);
$longitude = $connection->conn->real_escape_string($_POST['longitude']);
$keterangan = $connection->conn->real_escape_string($_POST['keterangan']);

if ($pict == '') {
    $absen->edit("UPDATE absen SET nis='$nis', kdmapel='$kdmapel', tgl='$tgl', latitude='$latitude', longitude='$longitude', keterangan='$keterangan' WHERE idabsen='$idabsen' ");
    echo "<script>window.location='?page=absen';</script>";
} else {
    $fotoawal = $absen->tampil($idabsen)->fetch_object()->foto;
    unlink("../assets/img/absen/" . $fotoawal);

    $upload = move_uploaded_file($sumber, "../assets/img/absen/" . $foto);
    if ($upload) {
        $absen->edit("UPDATE absen SET nis='$nis', kdmapel='$kdmapel', tgl='$tgl', foto='$foto', latitude='$latitude', longitude='$longitude', keterangan='$keterangan' WHERE idabsen='$idabsen' ");
        echo "<script>window.location='?page=absen';</script>";
    } else {
        echo "<script>alert('upload gambar gagal!')</script>";
    }
}
