<?php
// Pastikan file koneksi.php sudah menggunakan MySQLi!
include('koneksi.php');

// 1. Perintah SQL: Menggunakan nama kolom huruf kecil (id, nama, foto)
$perintah = "SELECT id, nama, foto FROM namasiswa ORDER BY id DESC"; 

// 2. Eksekusi Query
$query = mysqli_query($koneksi, $perintah);

// Cek apakah query berhasil dieksekusi
if (!$query) {
    die("Query Gagal: " . mysqli_error($koneksi));
}

?>

<html>
<head>
<title>Halaman Tampil Foto</title>
<link rel="stylesheet" href="style.css"> </head>
<body>

<div class="data-table-container"> <h2>MENAMPILKAN FOTO / <a href="input_foto.php" style="font-size: 0.8em; color: #28a745; text-decoration: none;">TAMBAH DATA</a></h2>

    <table class="data-table"> <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="30%">NAMA</th>
                <th width="20%">FOTO</th>
                <th width="10%">DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1; // Untuk nomor urut
        while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?php echo $no++;?></td> 
            <td><?php echo $data['nama'];?></td>
            <td align="center">
                <img src="gambar/<?php echo $data['foto'];?>" class="foto-tabel" height="150" alt="Foto <?php echo $data['nama']; ?>">
            </td>
            <td><a href="delete.php?del=<?php echo $data['id']?>">DELETE</a></td>
        </tr>
        <?php 
        } 
        ?>
        </tbody>
    </table>
</div>

</body>
</html>