<?php
session_start();

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "coba");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password cocok
$query = mysqli_query($conn, 
    "SELECT * FROM login 
     WHERE username='$username' AND password='$password'"
);

if (mysqli_num_rows($query) == 1) {

    // Data ditemukan → buat session
    $_SESSION['username'] = $username;

    // Pindah ke halaman utama
    header("Location: home.php");
    exit;

} else {

    // Jika salah
    echo "Username atau password salah!";
}

mysqli_close($conn);
?>
