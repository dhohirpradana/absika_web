<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="kode">Kode Mapel</label>
                        <input type="text" name="kode" class="form-control" id="kode" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pelajaran">Mata Pelajaran</label>
                        <input type="text" name="pelajaran" class="form-control" id="pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="Kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="waktu">Hari/jam</label>
                        <input type="text" name="waktu" class="form-control" id="waktu" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pengampu">Guru Pengampu</label>
                        <input type="text" name="pengampu" class="form-control" id="pengampu" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-rounded btn-danger">Reset</button>
                    <input type="submit" class="btn btn-rounded btn-primary" name="tambah" value="Simpan"></button>
                </div>
            </form>
            <?php
            if (@$_POST['tambah']) {
                $kode = $connection->conn->real_escape_string($_POST['kode']);
                $pelajaran = $connection->conn->real_escape_string($_POST['pelajaran']);
                $kelas = $connection->conn->real_escape_string($_POST['kelas']);
                $waktu = $connection->conn->real_escape_string($_POST['waktu']);
                $pengampu = $connection->conn->real_escape_string($_POST['pengampu']); {
                    $mapel->tambah($kode, $pelajaran, $kelas, $waktu, $pengampu);
                    header("location: ?page=mapel");
                }
            }
            ?>
        </div>
    </div>
</div>