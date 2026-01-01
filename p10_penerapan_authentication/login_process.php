<?php
include "koneksi.php";

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, 
    "SELECT * FROM login 
     WHERE username='$username' AND password='$password'"
);

if (mysqli_num_rows($query) == 1) {

    // ===== ALERT LOGIN BERHASIL =====
    $status = "LOGIN_BERHASIL";
    include "send_alert.php";

    // Simpan username dalam cookies selama 1 jam
    setcookie("username", $username, time() + 3600, "/");

    header("Location: home_cookie.php");
    exit;

} else {

    // ===== ALERT LOGIN GAGAL =====
    $status = "LOGIN_GAGAL";
    include "send_alert.php";

    echo "Username atau password salah!";
}
?>


