<?php
// Pengaturan Koneksi Database
$server = "localhost"; 
$user = "root";        // GANTI dengan username database Anda
$pass = "";            // GANTI dengan password database Anda
$database = "db_p5";   

// Membuat Koneksi menggunakan mysqli
$koneksi = new mysqli($server, $user, $pass, $database);

// Cek Koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
// Variabel $koneksi siap digunakan.
?>