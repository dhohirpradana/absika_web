<?php
class guru
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM guru";
        if ($id != null) {
            $sql .= " where idguru = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    // tidak return karena proses

    public function tambah($nip, $nama, $pangkat, $nohp, $foto, $pasguru)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO guru values ('', '$nip', '$nama', '$pangkat', '$nohp', '$foto', '$pasguru')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM guru WHERE idguru = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
