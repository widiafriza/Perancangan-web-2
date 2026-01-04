<?php
include "koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM pendaftaran") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            padding: 40px;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #1565c0;
            color: white;
            padding: 10px;
            font-size: 14px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 13px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #1565c0;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #0d47a1;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Mahasiswa Terdaftar</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_lengkap'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['program_studi'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['status_pendaftaran'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <a class="btn" href="login.php">Login Admin</a>
</div>

</body>
</html>
