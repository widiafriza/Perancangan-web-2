<?php
session_start();

// Cek login
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// PAGINATION
$limit = 5; // jumlah data per halaman
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $limit;

// Hitung total data
$sql_total = "SELECT * FROM pendaftaran";
$query_total = mysqli_query($koneksi, $sql_total);

if (!$query_total) {
    die("Query error: " . mysqli_error($koneksi));
}

$total_data = mysqli_num_rows($query_total);
$total_halaman = ceil($total_data / $limit);

// Ambil data sesuai halaman
$result = mysqli_query(
    $koneksi,
    "SELECT * FROM pendaftaran LIMIT $mulai, $limit"
) or die(mysqli_error($koneksi));

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Administrasi</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 25px;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        .logout {
            display: inline-block;
            background-color: #c62828;
            color: white;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .logout:hover {
            background-color: #8e0000;
        }

        .table-container {
            max-width: 1200px;
            margin: auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: #1565c0;
            color: white;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            text-align: left;
        }

        tr:hover {
            background-color: #f0f4f8;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: bold;
            color: white;
        }
        .pending { background-color: #90a4ae; }
        .diterima { background-color: #2e7d32; }
        .ditolak { background-color: #c62828; }

        .btn-edit {
            background-color: #1565c0;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }
        .btn-edit:hover {
            background-color: #0d47a1;
        }

        /* Pagination */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            padding: 8px 12px;
            margin: 3px;
            text-decoration: none;
            color: #1565c0;
            border: 1px solid #1565c0;
            border-radius: 6px;
            transition: 0.3s;
        }

        .pagination a:hover {
            background-color: #1565c0;
            color: white;
        }

        .pagination .active {
            background-color: #1565c0;
            color: white;
            border: 1px solid #0d47a1;
        }
    </style>
</head>

<body>

<h1>Halaman Administrasi - Data Mahasiswa</h1>

<a class="logout" href="logout.php">Logout</a>
<a class="logout" style="background:#2e7d32" href="cetak_pdf.php" target="_blank">
    Cetak PDF
</a>


<div class="table-container">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
            <th>Tgl Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { 
            $status = strtolower($row['status_pendaftaran']);
            $badgeClass = $status == "diterima" ? "diterima" :
                          ($status == "ditolak" ? "ditolak" : "pending");
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_lengkap'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['program_studi'] ?></td>
            <td><?= $row['tanggal_lahir'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><span class="badge <?= $badgeClass ?>"><?= ucfirst($row['status_pendaftaran']) ?></span></td>
            <td><a class="btn-edit" href="edit_status.php?id=<?= $row['id'] ?>">Ubah</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- PAGINATION -->
<div class="pagination">
    <?php 
    for($x = 1; $x <= $total_halaman; $x++){
        if($x == $halaman){
            echo "<a class='active' href='?halaman=$x'>$x</a>";
        } else {
            echo "<a href='?halaman=$x'>$x</a>";
        }
    }
    ?>
</div>

</div>

</body>
</html>
