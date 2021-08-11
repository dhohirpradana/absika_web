<div id="cetakpdf" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cetak PDF Data Presensi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="./report/export_pdf_absen.php" method="post" target="_blank">
                    <table>

                        <tr>
                            <td>
                                <div class="form-group">Kode Mata Pelajaran</div>
                            </td>
                            <td align="center" width="5%">
                                <div class="form-group">:</div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="kode_mapel" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">Dari Tanggal</div>
                            </td>
                            <td align="center" width="5%">
                                <div class="form-group">:</div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_aw" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">Dari Tanggal</div>
                            </td>
                            <td align="center" width="5%">
                                <div class="form-group">:</div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="tgl_ak" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="cetak_absen" class="btn btn-rounded btn-success" class="fas fa-file-pdf" value="Cetak Periode">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>

            <div class="modal-footer">
                <a href="./report/export_pdf_absen.php" target="_blank" class="btn btn-rounded btn-primary"><i class="fas fa-file-pdf"></i> Cetak Semua Data</a>

            </div>
        </div>
    </div>
</div>