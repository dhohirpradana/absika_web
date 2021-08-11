<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Mapel</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                        <label class="control-label" for="kode">Kode Mapel</label>
                        <input type="hidden" name="idmapel" id="idmapel">
                        <input type="text" name="kode" class="form-control" id="kode" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pelajaran">Mata Pelajaran</label>
                        <input type="text" name="pelajaran" class="form-control" id="pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="kelas">Kelas</label>
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
                    <input type="submit" class="btn btn-rounded btn-primary" name="edit" value="Simpan"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/libs/js/main-js.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_mapel", function() {
        var idmapel = $(this).data('idmapel');
        var kode = $(this).data('kode');
        var pelajaran = $(this).data('pelajaran');
        var kelas = $(this).data('kelas');
        var waktu = $(this).data('waktu');
        var pengampu = $(this).data('pengampu');
        $(" #modal-edit #idmapel").val(idmapel);
        $(" #modal-edit #kode").val(kode);
        $(" #modal-edit #pelajaran").val(pelajaran);
        $(" #modal-edit #kelas").val(kelas);
        $(" #modal-edit #waktu").val(waktu);
        $(" #modal-edit #pengampu").val(pengampu);
    })

    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'model/proses_edit_mapel.php',
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