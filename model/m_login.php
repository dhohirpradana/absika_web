<?php
class login
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }
    public function tampil_guru($username, $password)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM guru WHERE nip = '" . $username . "' AND pasguru = '" . $password . "'";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tampil_admin($username, $password)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM admin WHERE username = '" . $username . "' AND pasadmin = '" . $password . "'";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }

    public function tampil_siswa($username, $password)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM siswa WHERE nis = '" . $username . "' AND passiswa = '" . $password . "'";
        $query = $db->query($sql) or die($db->error);
        return $query;
    }
}
