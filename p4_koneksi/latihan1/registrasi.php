<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa Baru</title>

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

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 450px;
            padding: 30px 40px;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #1e3d59;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #1565c0;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
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
    <div class="container">
        <h1>Form Registrasi Mahasiswa Baru</h1>

        <form action="hasil_registrasi.php" method="post">
            <label>Nama Lengkap :</label>
            <input type="text" name="nama_lengkap" required>

            <label>Jenis Kelamin :</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Program Studi :</label>
            <select name="program_studi" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
            </select>

            <label>Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" required>

            <label>Alamat :</label>
            <textarea name="alamat" rows="3" required></textarea>

            <label>Email :</label>
            <input type="email" name="email" required>

            <label>No. HP :</label>
            <input type="text" name="no_hp" required>

            <input type="submit" value="Daftar Sekarang">
        </form>

        <footer>
            © 2025 Sistem PMB Politeknik Purbaya
        </footer>
    </div>
</body>
</html>
