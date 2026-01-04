<?php
session_start();

// Pastikan admin sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// Validasi ID dari URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']);

// Ambil data pendaftaran
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM pendaftaran WHERE id = $id"
);

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Proses update status
if (isset($_POST['update'])) {

    if (!isset($_POST['status_pendaftaran'])) {
        die("Status tidak valid!");
    }

    $status_baru = $_POST['status_pendaftaran'];

    $update = mysqli_query(
        $koneksi,
        "UPDATE pendaftaran 
         SET status_pendaftaran = '$status_baru'
         WHERE id = $id"
    );

    if (!$update) {
        die("Update gagal: " . mysqli_error($koneksi));
    }

    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Status Pendaftaran</title>

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
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            width: 400px;
            padding: 30px 35px;
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #1e3d59;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #1565c0;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #0d47a1;
        }

        .back {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #1565c0;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Edit Status Pendaftaran</h2>

    <form method="post">
        <label>Status Pendaftaran:</label>
        <select name="status_pendaftaran" required>
            <option value="Menunggu" <?= $data['status_pendaftaran'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option value="Diterima" <?= $data['status_pendaftaran'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
            <option value="Ditolak"  <?= $data['status_pendaftaran'] == 'Ditolak'  ? 'selected' : '' ?>>Ditolak</option>
        </select>

        <button type="submit" name="update" class="btn-submit">Simpan Perubahan</button>
    </form>

    <a class="back" href="admin.php">← Kembali ke Halaman Admin</a>
</div>

</body>
</html>
