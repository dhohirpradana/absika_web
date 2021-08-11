<?php
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_siswa.php";
$connection = new Database($host, $user, $pass, $database);
$siswa = new siswa($connection);


$idsiswa = $_POST['idsiswa'];
$nis = $connection->conn->real_escape_string($_POST['nis']);
$nama = $connection->conn->real_escape_string($_POST['nama']);
$kelas = $connection->conn->real_escape_string($_POST['kelas']);
$nohp = $connection->conn->real_escape_string($_POST['nohp']);
$alamat = $connection->conn->real_escape_string($_POST['alamat']);

$pict = $_FILES['foto']['name'];
$extensi = explode(".", $_FILES['foto']['name']);
$foto = "img-" . round(microtime(true)) . "." . end($extensi);
$sumber = $_FILES['foto']['tmp_name'];

$passiswa = $connection->conn->real_escape_string($_POST['passiswa']);

if ($pict == '') {
    $siswa->edit("UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', nohp='$nohp', alamat='$alamat', passiswa='$passiswa' WHERE idsiswa='$idsiswa' ");
    echo "<script>window.location='?page=siswa';</script>";
} else {
    $fotoawal = $siswa->tampil($idsiswa)->fetch_object()->foto;
    unlink("../assets/img/siswa/" . $fotoawal);

    $upload = move_uploaded_file($sumber, "../assets/img/siswa/" . $foto);
    if ($upload) {
        $siswa->edit("UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', nohp='$nohp', alamat='$alamat', foto='$foto', passiswa='$passiswa' WHERE idsiswa='$idsiswa' ");
        echo "<script>window.location='?page=siswa';</script>";
    } else {
        echo "<script>alert('upload gambar gagal!')</script>";
    }
}
