<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Data Mahasiswa</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h2 { color: #000080; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .aksi a { text-decoration: none; padding: 3px 8px; border-radius: 3px; margin-right: 5px; }
        .edit { background-color: #4CAF50; color: white; }
        .hapus { background-color: #f44336; color: white; }
        .tambah { text-decoration: none; background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px;}
    </style>
</head>
<body>

<?php
// --- Bagian Logika Tampilan Pesan Status ---
if (isset($_GET['status'])) {
    $status = htmlspecialchars(urldecode($_GET['status']));
    
    // Tentukan warna berdasarkan isi pesan
    $warna = (strpos($status, 'Error') !== false || strpos($status, 'Gagal') !== false) ? 'red' : 'green';
    $background = ($warna == 'red') ? '#fdd' : '#d4edda';
    
    // Tampilkan pesan
    echo "<div style='padding: 10px; margin-bottom: 15px; border: 1px solid $warna; background-color: $background;'>$status</div>";
    
    // --- SOLUSI: Bersihkan parameter status dari URL menggunakan JavaScript ---
    // Ini mencegah pesan error muncul lagi saat halaman di-refresh.
    echo "<script>";
    echo "if (window.history.replaceState) {";
    echo "  let url = new URL(window.location.href);";
    echo "  url.searchParams.delete('status');";
    echo "  window.history.replaceState({}, document.title, url.toString());";
    echo "}";
    echo "</script>";
}
?>

<h2>Daftar Data Mahasiswa</h2>
<a href="tambah_data.php" class="tambah">➕ Tambah Data Baru</a>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $table = "tambah_data"; 
        $no = 1;

        // Query untuk mengambil semua data
        $sql = "SELECT nim, nama, alamat FROM $table ORDER BY nim ASC";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row["nim"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
                echo "<td class='aksi'>";
                
                // Link Edit (mengirim NIM)
                echo "<a href='edit_data.php?nim=" . htmlspecialchars($row["nim"]) . "' class='edit'>Edit</a>";
                
                // Link Hapus (mengirim NIM dengan konfirmasi)
                echo "<a href='hapus_data.php?nim=" . htmlspecialchars($row["nim"]) . "' class='hapus' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data NIM " . htmlspecialchars($row["nim"]) . "?');\">Hapus</a>"; 
                
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data mahasiswa ditemukan.</td></tr>";
        }
        
        // Tutup koneksi di akhir skrip
        $koneksi->close();
        ?>
    </tbody>
</table>

</body>
</html>