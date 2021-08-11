<?php
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_mapel.php";
$connection = new Database($host, $user, $pass, $database);
$mapel = new mapel($connection);


$idmapel = $_POST['idmapel'];
$kode = $connection->conn->real_escape_string($_POST['kode']);
$pelajaran = $connection->conn->real_escape_string($_POST['pelajaran']);
$kelas = $connection->conn->real_escape_string($_POST['kelas']);
$waktu = $connection->conn->real_escape_string($_POST['waktu']);
$pengampu = $connection->conn->real_escape_string($_POST['pengampu']); {
    $mapel->edit("UPDATE mapel SET kode='$kode', pelajaran='$pelajaran', kelas='$kelas', waktu='$waktu', pengampu='$pengampu' WHERE idmapel='$idmapel' ");
    echo "<script>window.location='?page=mapel';</script>";
}
