<?php
class siswa
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil($id = null)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM siswa";
        if ($id != null) {
            $sql .= " where idsiswa = $id";
        }
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    // tidak return karena proses

    public function tambah($nis, $nama, $kelas, $nohp, $alamat, $foto, $passiswa)
    {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO siswa values ('', '$nis', '$nama', '$kelas', '$nohp', '$alamat', '$foto', '$passiswa')") or die($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die($db->error);
    }

    public function hapus($id)
    {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM siswa WHERE idsiswa = '$id'") or die($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
