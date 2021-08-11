<?php
include "model/m_guru.php";

$guru = new guru($connection);

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
                <h5 class="card-header">Tabel Daftar Guru</h5>

                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle"></i> Tambah Daftar Guru</button>
                <br>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="tabel_guru">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NiP</th>
                                    <th>Nama</th>
                                    <th>Pangkat</th>
                                    <th>Nomor hp</th>
                                    <th>Foto</th>
                                    <th>Password</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $no = 1;
                                $tampil = $guru->tampil();
                                while ($data = $tampil->fetch_object()) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ . "."; ?></td>
                                        <td><?php echo $data->nip; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><?php echo $data->pangkat; ?></td>
                                        <td><?php echo $data->nohp; ?></td>
                                        <td align="center">
                                            <img src="assets/img/guru/<?php echo $data->foto; ?>" width="70px">
                                        </td>
                                        <td><?php echo $data->pasguru; ?></td>
                                        <td align="center">
                                            <a id="edit_guru" data-toggle="modal" data-target="#edit" data-idguru="<?php echo $data->idguru; ?>" data-nip="<?php echo $data->nip; ?>" data-nama="<?php echo $data->nama; ?>" data-pangkat="<?php echo $data->pangkat; ?>" data-nohp="<?php echo $data->nohp; ?>" data-foto="<?php echo $data->foto; ?>" data-pasguru="<?php echo $data->pasguru; ?>">
                                                <button class="btn btn-rounded btn-info btn-xs"><i class="far fa-edit"></i>Edit</button></a>

                                            <a href="?page=guru&act=delet&id=<?php echo $data->idguru; ?> " onclick="return confirm ('apa anda ingin menghapus data ini ? ')">
                                                <button class="btn btn-rounded btn-danger btn-xs"><i class="far fa-trash-alt"></i>Hapus</button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tfoot>
                        </table>
                    </div>

                </div>

                <?php
                include "guru_tambah.php";
                include "guru_edit.php";
                ?>
            </div>
        </div>
    </div>
<?php
} else if (@$_GET['act'] == 'delet') {
    $fotoawal = $guru->tampil($_GET['id'])->fetch_object()->foto;
    unlink("assets/img/guru/" . $fotoawal);

    $guru->hapus($_GET['id']);
    header("location: ?page=guru");
}
?>