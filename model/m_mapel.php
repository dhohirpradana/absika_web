<?php
class mapel
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * from mapel";
        if ($id != null) {
            $sql .= " where idmapel = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    // tidak return karena proses

    public function tambah($kode, $pelajaran, $kelas, $waktu, $pengampu)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO mapel values ('', '$kode', '$pelajaran', '$kelas', '$waktu', '$pengampu')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM mapel WHERE idmapel = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
