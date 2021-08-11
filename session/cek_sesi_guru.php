<?php
if (!isset($_SESSION['id_guru'])) {
    session_destroy();
    echo "<script>alert('Maaf Anda Tidak Bisa Mengakses Halaman Ini !')</script>";
    echo "<script>window.location = 'index.php'</script>";
} else {
}
