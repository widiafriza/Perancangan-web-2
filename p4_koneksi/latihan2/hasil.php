<?php
include 'koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$website = $_POST['website'];
$komentar = $_POST['komentar'];
$gender = $_POST['gender'];

// Simpan ke database
$sql = "INSERT INTO form_data (nama, email, website, komentar, gender)
        VALUES ('$nama', '$email', '$website', '$komentar', '$gender')";
mysqli_query($conn, $sql);

// Tampilkan hasil input
echo "<h2>Hasil Input Form:</h2>";
echo "Nama: $nama<br>";
echo "Email: $email<br>";
echo "Website: $website<br>";
echo "Komentar: $komentar<br>";
echo "Gender: $gender<br>";
?>
