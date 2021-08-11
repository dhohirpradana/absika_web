<?php
include "model/m_mapel.php";

$mapel = new mapel($connection);

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
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tabel Mata Pelajaran</h5>
                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle"></i> Tambah Daftar Mapel</button>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="tabel_mapel">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Kode Mapel</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Hari/Jam</th>
                                    <th>Guru Pengampu</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $no = 1;
                                $tampil = $mapel->tampil();
                                while ($data = $tampil->fetch_object()) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ . "."; ?></td>
                                        <td><?php echo $data->kode; ?></td>
                                        <td><?php echo $data->pelajaran; ?></td>
                                        <td><?php echo $data->kelas; ?></td>
                                        <td><?php echo $data->waktu; ?></td>
                                        <td><?php echo $data->pengampu; ?></td>

                                        <td align="center">
                                            <a id="edit_mapel" data-toggle="modal" data-target="#edit" data-idmapel="<?php echo $data->idmapel; ?>" data-kode="<?php echo $data->kode; ?>" data-pelajaran="<?php echo $data->pelajaran; ?>" data-kelas="<?php echo $data->kelas; ?>" data-waktu="<?php echo $data->waktu; ?>" data-pengampu="<?php echo $data->pengampu; ?>">
                                                <button class="btn btn-rounded btn-info btn-xs"><i class="far fa-edit"></i>Edit</button></a>

                                            <a href="?page=mapel&act=delet&id=<?php echo $data->idmapel; ?> " onclick="return confirm ('apa anda ingin menghapus data ini ? ')">
                                                <button class="btn btn-rounded btn-danger btn-xs"><i class="far fa-trash-alt"></i>Hapus</button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tfoot>
                        </table>
                    </div>

                </div>

                <?php
                include "mapel_tambah.php";
                include "mapel_edit.php";
                ?>

            </div>
        </div>
    </div>
<?php
} else if (@$_GET['act'] == 'delet') {

    $mapel->hapus($_GET['id']);
    header("location: ?page=mapel");
}
?>