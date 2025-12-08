<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "coba");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$username   = $_POST['username'];
$password   = $_POST['password'];
$repassword = $_POST['repassword'];
$gender     = $_POST['gender'];

// Cek apakah password dan re-type sama
if ($password != $repassword) {
    echo "Password dan Re-type Password tidak sama!";
    exit; 
}

// Cek apakah username sudah ada
$check = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

if (mysqli_num_rows($check) > 0) {
    echo "Username sudah digunakan!";
    exit;
}

// Masukkan data ke tabel
$query = "INSERT INTO login (username, password, gender)
          VALUES ('$username', '$password', '$gender')";

if (mysqli_query($conn, $query)) {
    echo "User berhasil terdaftar";
} else {
    echo "Gagal mendaftar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
