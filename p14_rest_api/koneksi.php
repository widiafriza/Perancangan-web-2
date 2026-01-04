<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pens_api";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die(json_encode(["status" => false, "message" => "Koneksi gagal"]));
}
?>