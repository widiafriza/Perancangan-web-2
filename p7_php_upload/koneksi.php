<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "foto";

// 1. Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// 2. Cek Koneksi
if (mysqli_connect_errno()) {
    // Jika koneksi gagal, tampilkan pesan error
    echo "Gagal koneksi ke database: " . mysqli_connect_error();
    exit();
}

?>