<?php
$host = "localhost";
$user = "root"; // user default XAMPP
$pass = "";     // kosong jika belum diubah
$db   = "db_mahasiswa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
