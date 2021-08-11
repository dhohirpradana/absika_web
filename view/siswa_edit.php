<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                        <label class="control-label" for="nis">Nis</label>
                        <input type="hidden" name="idsiswa" id="idsiswa">
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
                        <div style="padding-bottom: 7px ">
                            <img src="" width="70px" id="pict">
                        </div>
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="passiswa">Password</label>
                        <input type="text" name="passiswa" class="form-control" id="passiswa" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-rounded btn-primary" name="edit" value="Simpan"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/libs/js/main-js.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_siswa", function() {
        var idsiswa = $(this).data('idsiswa');
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');
        var kelas = $(this).data('kelas');
        var nohp = $(this).data('nohp');
        var alamat = $(this).data('alamat');
        var foto = $(this).data('foto');
        var passiswa = $(this).data('passiswa');
        $(" #modal-edit #idsiswa").val(idsiswa);
        $(" #modal-edit #nis").val(nis);
        $(" #modal-edit #nama").val(nama);
        $(" #modal-edit #kelas").val(kelas);
        $(" #modal-edit #nohp").val(nohp);
        $(" #modal-edit #alamat").val(alamat);
        $(" #modal-edit #pict").attr("src", "assets/img/siswa/" + foto);
        $(" #modal-edit #passiswa").val(passiswa);
    })

    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'model/proses_edit_siswa.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) {
                    $('.table').html(msg);
                }
            });
        }));
    })
</script>