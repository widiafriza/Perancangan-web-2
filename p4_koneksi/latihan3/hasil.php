<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password == $konfirmasi) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<h2>Pendaftaran Berhasil!</h2>";
            echo "Username: $username <br>";
            echo "Email: $email <br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<h3>Password dan konfirmasi tidak cocok!</h3>";
    }
}
?>
