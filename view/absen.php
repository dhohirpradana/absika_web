<?php
include "model/m_absen.php";

$absen = new absen($connection);

if (@$_GET['act'] == '') {
?>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Presensi Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tabel Daftar Presensi</h5>

                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle"></i> Tambah Daftar Presensi</button>
                <br>
                <div>
                    <a href="./report/export_excel_absen.php" target="_blank">
                        <button type="button" class="btn btn-rounded btn-info"><i class="fas fa-file-excel"></i> Export Excel</button>
                    </a>
                    <button type="button" class="btn btn-rounded btn-info" data-toggle="modal" data-target="#cetakpdf"><i class="fas fa-file-pdf"></i> Cetak PDF</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="tabel_absen">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nomor Induk Siswa</th>
                                    <th>Kode Mapel</th>
                                    <th>Tanggal</th>
                                    <th>Foto</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $no = 1;
                                $tampil = $absen->tampil();
                                while ($data = $tampil->fetch_object()) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ . "."; ?></td>
                                        <td><?php echo $data->nis; ?></td>
                                        <td><?php echo $data->kdmapel; ?></td>
                                        <td><?php echo date('d F Y', strtotime($data->tgl)); ?></td>
                                        <td align="center"><img src="api/<?php echo $data->foto; ?>" width="70px"></td>
                                        <td><a href="https://www.latlong.net/c/?lat=<?php echo $data->latitude; ?>&long=<?php echo $data->longitude; ?>" class="btn btn-rounded btn-success btn-xs" target="_blank">Cek Lokasi</a></td>
                                        <td><?php echo $data->keterangan; ?></td>
                                        <td align="center">
                                            <a id="edit_absen" data-toggle="modal" data-target="#edit" data-idabsen="<?php echo $data->idabsen; ?>" data-nis="<?php echo $data->nis; ?>" data-kdmapel="<?php echo $data->kdmapel; ?>" data-tgl="<?php echo $data->tgl; ?>" data-foto="<?php echo $data->foto; ?>" data-latitude="<?php echo $data->latitude; ?>" data-longitude="<?php echo $data->longitude; ?>" data-keterangan="<?php echo $data->keterangan; ?>">
                                                <button class="btn btn-rounded btn-info btn-xs"><i class="far fa-edit"></i>Edit</button></a>

                                            <a href="?page=absen&act=delet&id=<?php echo $data->idabsen; ?> " onclick="return confirm ('apa anda ingin menghapus data ini ? ')">
                                                <button class="btn btn-rounded btn-danger btn-xs"><i class="far fa-trash-alt"></i>Hapus</button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                include "absen_tambah.php";
                include "absen_edit.php";
                include "absen_cetak_pdf.php";
                ?>
            </div>
        </div>
    </div>
<?php
} else if (@$_GET['act'] == 'delet') {
    $fotoawal = $absen->tampil($_GET['id'])->fetch_object()->foto;
    unlink("assets/img/absen/" . $fotoawal);

    $absen->hapus($_GET['id']);
    header("location: ?page=absen");
}
?>