<?php
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

// Username & password hasil pertemuan sebelumnya
if($user == "admin" && $pass == "123") {
    $_SESSION['username'] = $user;
    header("Location: admin.php");
} else {
    echo "Login gagal!";
}
?>
