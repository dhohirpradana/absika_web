<?php
include "model/m_siswa.php";

$siswa = new siswa($connection);

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

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>