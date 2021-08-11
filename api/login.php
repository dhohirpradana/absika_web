<?php
header("Access-Control-Allow-Origin: *");
include('connection.php');
error_reporting(E_ALL ^ E_DEPRECATED);

$par = $_GET['par'];

if ($par == "login") {
    $rows = array();
    $nis = $_GET['nis'];
    $password = $_GET['passiswa'];

    $cariLogin = "select * from siswa where nis = '$nis' and passiswa = '$password'";
    $login = mysqli_query($con, $cariLogin);
    while ($r = mysqli_fetch_assoc($login)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
} else {
}
