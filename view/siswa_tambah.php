<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="nis">Nis</label>
                        <input type="number" name="nis" class="form-control" id="nis" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="nohp">Nomor Hp</label>
                        <input type="number" name="nohp" class="form-control" id="nohp" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="passiswa">Password</label>
                        <input type="text" name="passiswa" class="form-control" id="passiswa" required>
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
                $nama = $connection->conn->real_escape_string($_POST['nama']);
                $kelas = $connection->conn->real_escape_string($_POST['kelas']);
                $nohp = $connection->conn->real_escape_string($_POST['nohp']);
                $alamat = $connection->conn->real_escape_string($_POST['alamat']);

                $extensi = explode(".", $_FILES['foto']['name']);
                $foto = "img-" . round(microtime(true)) . "." . end($extensi);
                $sumber = $_FILES['foto']['tmp_name'];
                $upload = move_uploaded_file($sumber, "assets/img/siswa/" . $foto);

                $passiswa = $connection->conn->real_escape_string($_POST['passiswa']);

                if ($upload) {
                    $siswa->tambah($nis, $nama, $kelas, $nohp, $alamat, $foto, $passiswa);
                    header("location: ?page=siswa");
                } else {
                    echo "<script>alert('upload gambar gagal!')</script>";
                }
            }
            ?>
        </div>
    </div>
</div>