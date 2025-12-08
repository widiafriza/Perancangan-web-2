<?php
// Konfigurasi database
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'market';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // simpan persis sesuai input (plain text)

// Menggunakan prepared statement agar aman
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
    echo "Data berhasil disimpan!<br>";
    echo "<a href='form_users.html'>Tambah User Baru</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>