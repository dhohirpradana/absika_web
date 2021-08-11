<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Presensi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nis">Nomor Induk Siswa</label>
                        <input type="number" name="nis" class="form-control" id="nis" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kdmapel">Kode Mata Pelajaran</label>
                        <input type="text" name="kdmapel" class="form-control" id="kdmapel" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tgl">Tanggal</label>
                        <input type="date" name="tgl" class="form-control" id="tgl" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="latitude">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="longitude">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-rounded btn-danger">Reset</button>
                    <input type="submit" class="btn btn-rounded btn-primary" name="tambah" value="Simpan"></button>
                </div>
            </form>
            <?php
            if (@$_POST['tambah']) {
                $nis = $connection->conn->real_escape_string($_POST['nis']);
                $kdmapel = $connection->conn->real_escape_string($_POST['kdmapel']);
                $tgl = $connection->conn->real_escape_string($_POST['tgl']);

                $extensi = explode(".", $_FILES['foto']['name']);
                $foto = "img-" . round(microtime(true)) . "." . end($extensi);
                $sumber = $_FILES['foto']['tmp_name'];
                $upload = move_uploaded_file($sumber, "assets/img/absen/" . $foto);

                $latitude = $connection->conn->real_escape_string($_POST['latitude']);
                $longitude = $connection->conn->real_escape_string($_POST['longitude']);
                $keterangan = $connection->conn->real_escape_string($_POST['keterangan']);

                if ($upload) {
                    $absen->tambah($nis, $kdmapel, $tgl, $foto, $latitude, $longitude, $keterangan);
                    header("location: ?page=absen");
                } else {
                    echo "<script>alert('upload gambar gagal!')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>