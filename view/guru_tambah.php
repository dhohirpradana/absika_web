<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nip">Nip</label>
                        <input type="number" name="nip" class="form-control" id="nip" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pangkat">Pangkat</label>
                        <input type="text" name="pangkat" class="form-control" id="pangkat" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nohp">Nomor Hp</label>
                        <input type="number" name="nohp" class="form-control" id="nohp" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pasguru">Password</label>
                        <input type="text" name="pasguru" class="form-control" id="pasguru" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-rounded btn-danger">Reset</button>
                    <input type="submit" class="btn btn-rounded btn-primary" name="tambah" value="Simpan"></button>
                </div>
            </form>
            <?php
            if (@$_POST['tambah']) {
                $nip = $connection->conn->real_escape_string($_POST['nip']);
                $nama = $connection->conn->real_escape_string($_POST['nama']);
                $pangkat = $connection->conn->real_escape_string($_POST['pangkat']);
                $nohp = $connection->conn->real_escape_string($_POST['nohp']);

                $extensi = explode(".", $_FILES['foto']['name']);
                $foto = "img-" . round(microtime(true)) . "." . end($extensi);
                $sumber = $_FILES['foto']['tmp_name'];
                $upload = move_uploaded_file($sumber, "assets/img/guru/" . $foto);

                $pasguru = $connection->conn->real_escape_string($_POST['pasguru']);

                if ($upload) {
                    $guru->tambah($nip, $nama, $pangkat, $nohp, $foto, $pasguru);
                    header("location: ?page=guru");
                } else {
                    echo "<script>alert('upload gambar gagal!')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>