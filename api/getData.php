<?php

header("Access-Control-Allow-Origin: *");
/*reply data dalam JSON */

include('connection.php');
error_reporting(E_ALL ^ E_DEPRECATED);

$par = $_GET['par'];

if ($par == "dataAbsen") {
	$sql = "select * from presensi order by idabsen DESC";
	$query 	= mysqli_query($con, $sql);

	$data = array();
	while ($row = mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	echo json_encode($data);
} else if ($par == "dataLogin") {
	$username = $_GET["nis"];
	$password = $_GET["passiswa"];
	$sql = "select * from siswa where nis = '$username' and passiswa = '$password' order by idabsen DESC";
	$query 	= mysqli_query($con, $sql);

	$data = array();
	while ($row = mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	echo json_encode($data);
} else if ($par == "cariDataAbsen") {
	$nis = $_GET["nis"];
	$sql = "select * from presensi where nis = '$nis' order by idabsen DESC";
	$query 	= mysqli_query($con, $sql);

	$data = array();
	while ($row = mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	echo json_encode($data);
} else if ($par == 'mapel') {
	$kelas = $_GET["kelas"];
	$waktu = $_GET["waktu"];
	$sql = "SELECT * FROM mapel WHERE kelas = '$kelas' AND waktu LIKE '$waktu%'  ORDER BY idmapel ASC";
	$query 	= mysqli_query($con, $sql);

	$data = array();
	while ($row = mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	echo json_encode($data);
} else if ($par == 'presensiByUser') {
	$nis = $_GET["nis"];
	$tgl = $_GET["tgl"];
	$waktu = $_GET["waktu"];
	$sql = "SELECT absen.nis, absen.foto, absen.keterangan, mapel.pelajaran FROM absen, mapel WHERE absen.nis = '$nis' AND absen.tgl = '$tgl' AND absen.kdmapel = mapel.kode AND mapel.waktu LIKE '$waktu%' ORDER BY absen.idabsen ASC";
	$query 	= mysqli_query($con, $sql);

	$data = array();
	while ($row = mysqli_fetch_object($query)) {
		$data[] = $row;
	}
	echo json_encode($data);
} else {
}
