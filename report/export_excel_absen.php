<?php
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_absen.php";
$connection = new Database($host, $user, $pass, $database);
$absen = new absen($connection);

$fileName = "excel_absen-(" . date('d-m-Y') . ").xls";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
?>

<table border="1px">
    <tr>
        <th>No.</th>
        <th>Nomor Induk Siswa</th>
        <th>Kode Mapel</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
    </tr>
    <?php
    $no = 1;
    $tampil = $absen->tampil();
    while ($data = $tampil->fetch_object()) {
        echo "<tr align=center>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $data->nis . "</td>";
        echo "<td>" . $data->kdmapel . "</td>";
        echo "<td>" . $data->tgl . "</td>";
        echo "<td>" . $data->keterangan . "</td>";
        echo "</tr>";
    }
    ?>
</table>