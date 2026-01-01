<?php
// Tiga baris ini akan menampilkan semua error PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// MySQLi Procedural
$conn = mysqli_connect("localhost", "root", "", "pagination");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Catatan: Tidak ada tag penutup ?> 