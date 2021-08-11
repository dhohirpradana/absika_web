<?php
class absen
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * from absen";
        if ($id != null) {
            $sql .= " where idabsen = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tampil_tgl($kode, $tgl1, $tgl2)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * from absen where tgl between '$tgl1' and '$tgl2' AND kdmapel ='$kode' ";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    // tidak return karena proses

    public function tambah($nis, $kdmapel, $tgl, $foto, $latitude, $longitude, $keterangan)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO absen values ('', '$nis', '$kdmapel', '$tgl', '$foto', '$latitude', '$longitude', '$keterangan')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM absen WHERE idabsen = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
