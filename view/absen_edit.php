<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Presensi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                        <label class="control-label" for="nis">Nomor Induk Siswa</label>
                        <input type="hidden" name="idabsen" id="idabsen">
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
                        <div style="padding-bottom: 7px ">
                            <img src="" width="70px" id="pict">
                        </div>
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="latitude">Latitude </label>
                        <input type="text" name="latitude" class="form-control" id="latitude" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="longitude">Longitude </label>
                        <input type="text" name="longitude" class="form-control" id="longitude" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="keterangan">Keterangan </label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan">
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
    $(document).on("click", "#edit_absen", function() {
        var idabsen = $(this).data('idabsen');
        var nis = $(this).data('nis');
        var kdmapel = $(this).data('kdmapel');
        var tgl = $(this).data('tgl');
        var foto = $(this).data('foto');
        var latitude = $(this).data('latitude');
        var longitude = $(this).data('longitude');
        var keterangan = $(this).data('keterangan');
        $(" #modal-edit #idabsen").val(idabsen);
        $(" #modal-edit #nis").val(nis);
        $(" #modal-edit #kdmapel").val(kdmapel);
        $(" #modal-edit #tgl").val(tgl);
        $(" #modal-edit #pict").attr("src", "assets/img/absen/" + foto);
        $(" #modal-edit #latitude").val(latitude);
        $(" #modal-edit #longitude").val(longitude);
        $(" #modal-edit #keterangan").val(keterangan);
    })

    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'model/proses_edit_absen.php',
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