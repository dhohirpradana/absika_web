<?php
include "model/m_mapel.php";

$mapel = new mapel($connection);

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
                                </tr>
                            <?php } ?>
                            </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>