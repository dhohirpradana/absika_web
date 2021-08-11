<?php
include "model/m_siswa.php";

$siswa = new siswa($connection);

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
                <h5 class="card-header">Tabel Daftar Siswa</h5>

                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle"></i> Tambah Daftar Siswa</button>
                <br>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="tabel_siswa">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Nomor hp</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Password</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $no = 1;
                                $tampil = $siswa->tampil();
                                while ($data = $tampil->fetch_object()) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ . "."; ?></td>
                                        <td><?php echo $data->nis; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><?php echo $data->kelas; ?></td>
                                        <td><?php echo $data->nohp; ?></td>
                                        <td><?php echo $data->alamat; ?></td>
                                        <td align="center"><img src="assets/img/siswa/<?php echo $data->foto; ?>" width="70px"></td>
                                        <td><?php echo $data->passiswa; ?></td>
                                        <td align="center">
                                            <a id="edit_siswa" data-toggle="modal" data-target="#edit" data-idsiswa="<?php echo $data->idsiswa; ?>" data-nis="<?php echo $data->nis; ?>" data-nama="<?php echo $data->nama; ?>" data-kelas="<?php echo $data->kelas; ?>" data-nohp="<?php echo $data->nohp; ?>" data-alamat="<?php echo $data->alamat; ?>" data-foto="<?php echo $data->foto; ?>" data-passiswa="<?php echo $data->passiswa; ?>">
                                                <button class="btn btn-rounded btn-info btn-xs"><i class="far fa-edit"></i>Edit</button></a>

                                            <a href="?page=siswa&act=delet&id=<?php echo $data->idsiswa; ?> " onclick="return confirm ('apa anda ingin menghapus data ini ? ')">
                                                <button class="btn btn-rounded btn-danger btn-xs"><i class="far fa-trash-alt"></i>Hapus</button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                include "siswa_tambah.php";
                include "siswa_edit.php";
                ?>

            </div>
        </div>
    </div>
<?php
} else if (@$_GET['act'] == 'delet') {
    $fotoawal = $siswa->tampil($_GET['id'])->fetch_object()->foto;
    unlink("assets/img/siswa/" . $fotoawal);

    $siswa->hapus($_GET['id']);
    header("location: ?page=siswa");
}
?>