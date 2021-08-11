<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                        <label class="control-label" for="nip">Nip</label>
                        <input type="hidden" name="idguru" id="idguru">
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
                        <div style="padding-bottom: 7px ">
                            <img src="" width="70px" id="pict">
                        </div>
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pasguru">Password</label>
                        <input type="text" name="pasguru" class="form-control" id="pasguru" required>
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
    $(document).on("click", "#edit_guru", function() {
        var idguru = $(this).data('idguru');
        var nip = $(this).data('nip');
        var nama = $(this).data('nama');
        var pangkat = $(this).data('pangkat');
        var nohp = $(this).data('nohp');
        var foto = $(this).data('foto');
        var pasguru = $(this).data('pasguru');
        $(" #modal-edit #idguru").val(idguru);
        $(" #modal-edit #nip").val(nip);
        $(" #modal-edit #nama").val(nama);
        $(" #modal-edit #pangkat").val(pangkat);
        $(" #modal-edit #nohp").val(nohp);
        $(" #modal-edit #pict").attr("src", "assets/img/guru/" + foto);
        $(" #modal-edit #pasguru").val(pasguru);
    })

    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
                url: 'model/proses_edit_guru.php',
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