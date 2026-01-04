<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap  = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $program_studi = $_POST['program_studi'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat        = $_POST['alamat'];
    $email         = $_POST['email'];
    $no_hp         = $_POST['no_hp'];

    $sql = "INSERT INTO pendaftaran (nama_lengkap, jenis_kelamin, program_studi, tanggal_lahir, alamat, email, no_hp)
            VALUES ('$nama_lengkap', '$jenis_kelamin', '$program_studi', '$tanggal_lahir', '$alamat', '$email', '$no_hp')";

    if (mysqli_query($conn, $sql)) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Hasil Registrasi</title>
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #e3f2fd;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    margin: 0;
                }
                .container {
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
                    width: 450px;
                    padding: 30px 40px;
                    text-align: center;
                }
                h2 {
                    color: #0d47a1;
                    margin-bottom: 20px;
                }
                p {
                    text-align: left;
                    color: #333;
                    margin: 5px 0;
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    background-color: #1565c0;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 6px;
                    text-decoration: none;
                    transition: 0.3s;
                }
                a:hover {
                    background-color: #0d47a1;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Pendaftaran Berhasil!</h2>
                <p><b>Nama Lengkap:</b> <?= $nama_lengkap ?></p>
                <p><b>Jenis Kelamin:</b> <?= $jenis_kelamin ?></p>
                <p><b>Program Studi:</b> <?= $program_studi ?></p>
                <p><b>Tanggal Lahir:</b> <?= $tanggal_lahir ?></p>
                <p><b>Alamat:</b> <?= $alamat ?></p>
                <p><b>Email:</b> <?= $email ?></p>
                <p><b>No. HP:</b> <?= $no_hp ?></p>
                <p><b>Status Pendaftaran:</b> <span style="color:#0d47a1;">Menunggu Verifikasi</span></p>
                <a href="registrasi.php">Kembali ke Form</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>