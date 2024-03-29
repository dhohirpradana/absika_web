<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';
error_reporting(E_ALL ^ E_DEPRECATED);
if ($_FILES['foto']) {
    $nis = $_POST['nis'];
    $kdmapel = $_POST['kdmapel'];
    $tgl = $_POST['tgl'];
    $keterangan = $_POST['keterangan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $jam = $_POST['jam'];
    $presensiJam = strtotime($jam);
    $mapelTime = $_POST['mapel_time'];
    $mapelJam = strtotime(
        substr_replace(substr($mapelTime, -11, 5), ':', 2, -2)
    );

    $foto_name = $_FILES['foto']['name'];
    $foto_tmp_name = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    $upload_dir = 'img/absen/';

    if ($error > 0) {
        $response = [
            'status' => 'error',
            'error' => true,
            'message' => 'Error uploading the file!',
        ];
    } else {
        $diff = $mapelJam - $presensiJam;
        if ($diff < -900) {
            echo $diff;
        } elseif ($diff > 0) {
            echo $diff;
        } else {
            $random_name = rand(1000, 1000000) . '-' . microtime(true) . '.jpg';
            $upload_name = $upload_dir . strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);

            if (move_uploaded_file($foto_tmp_name, $upload_name)) {
                $insertAbsen = "INSERT INTO absen(nis, kdmapel, tgl, foto, latitude, longitude, keterangan)
				VALUES ('$nis', '$kdmapel', '$tgl', '$upload_name', '$latitude', '$longitude', '$keterangan')";
                mysqli_query($con, $insertAbsen);
                echo $result = mysqli_affected_rows($con);
            } else {
                $response = [
                    'status' => 'error',
                    'error' => true,
                    'message' => 'Error uploading the file!',
                ];
            }
        }
    }
} else {
    $response = [
        'status' => 'error',
        'error' => true,
        'message' => 'No file was sent!',
    ];
}
