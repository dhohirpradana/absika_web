<?php
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_absen.php";
$connection = new Database($host, $user, $pass, $database);
$absen = new absen($connection);

$content =  '<style type="text/css">
                .tabel { border-collapse:collapse; }
                .tabel th { padding:8px 5px; background-color:#0ffa36; }
                .tabel td { padding:3px; }
                img { width:50px; }

            </style>';
$content .= '<page>
                <div style="padding:4mm; border:1px solid;" align="center" >
                    <span style="font-size:25px; "> DATA PRESENSI SISWA </span>
                    <br>
                    <span style="font-size:25px; "> SMAN 1 KARANGANYAR DEMAK </span>
                </div>
                <br>
                <div style ="padding:20px 0 10px 0; font-size:15px;">
                    Laporan Presensi siswa sesuai dengan data yang di inputkan siswa pada aplikasi presensi.!!
                </div>
                <br>
                <table border="1px" class="tabel" >
                    <tr align="center">
                        <th>NO.</th>
                        <th>Nomor Induk Siswa</th>
                        <th>Kode Mapel</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                    </tr>';
$no = 1;
if (@$_POST['cetak_absen']) {
    $tampil = $absen->tampil_tgl(@$_POST['kode_mapel'], @$_POST['tgl_aw'], @$_POST['tgl_ak']);
} else {
    $tampil = $absen->tampil();
}
while ($data = $tampil->fetch_object()) {
    $content .= '
                            <tr align="center">
                                <td>' . $no++ . '</td>
                                <td>' . $data->nis . '</td>
                                <td>' . $data->kdmapel . '</td>
                                <td>' . date('d F Y', strtotime($data->tgl)) . '</td>
                                <td><img src="../assets/img/absen/' . $data->foto . '"></td>
                                <td align="center">' . $data->keterangan . '</td>
                            </tr>
                        ';
}
$content .= '

                </table> 
            </page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Presensi Siswa.pdf');
