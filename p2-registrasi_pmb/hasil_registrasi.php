<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Registrasi Mahasiswa</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 480px;
            padding: 30px 40px;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        p {
            font-size: 15px;
            margin: 8px 0;
            color: #333;
        }

        span {
            font-weight: 600;
            color: #1565c0;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 25px;
            background-color: #1565c0;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            background-color: #0d47a1;
        }

        footer {
            text-align: center;
            margin-top: 15px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Data Registrasi Mahasiswa</h1>

        <?php
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $tgl = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];

        echo "<p><strong>Nama Lengkap:</strong> <span>$nama</span></p>";
        echo "<p><strong>NIM:</strong> <span>$nim</span></p>";
        echo "<p><strong>Jenis Kelamin:</strong> <span>$jk</span></p>";
        echo "<p><strong>Program Studi:</strong> <span>$prodi</span></p>";
        echo "<p><strong>Tanggal Lahir:</strong> <span>$tgl</span></p>";
        echo "<p><strong>Alamat:</strong> <span>$alamat</span></p>";
        echo "<p><strong>Email:</strong> <span>$email</span></p>";
        echo "<p><strong>No. HP:</strong> <span>$nohp</span></p>";
        ?>

        <a href="registrasi.php">Kembali ke Form</a>

        <footer>
            © 2025 Sistem PMB Politeknik Purbaya
        </footer>
    </div>
</body>
</html>
