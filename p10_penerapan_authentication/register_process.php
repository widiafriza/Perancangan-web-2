<?php
include "koneksi.php";

// Ambil data dari form
$username   = $_POST['username'];
$password   = $_POST['password'];
$repassword = $_POST['repassword'];
$gender     = $_POST['gender'];

// Cek password
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

// Simpan data
$query = mysqli_query($conn, 
    "INSERT INTO login (username, password, gender) 
     VALUES ('$username', '$password', '$gender')"
);

if ($query) {
    echo "User berhasil terdaftar";
} else {
    echo "Gagal mendaftar: " . mysqli_error($conn);
}
?>
