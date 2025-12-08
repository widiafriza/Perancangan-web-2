<?php
// Pastikan file koneksi.php sudah menggunakan MySQLi!
include('koneksi.php');

// --- 1. Pengecekan Keberadaan ID dan Sanitasi Input ---

// GANTI baris ini:
// $id_delete = (int)$_GET['del'];

// DENGAN pengecekan isset() untuk menghilangkan Warning
if (!isset($_GET['del']) || empty($_GET['del'])) {
    echo "Error: Parameter ID data (del) tidak ditemukan.<br/>";
    echo "<a href='tampil_foto.php'>Kembali ke Halaman Tampil</a>";
    exit(); // Hentikan proses jika ID tidak ada
}

// Jika ID ada, ambil dan pastikan nilainya adalah integer
$id_delete = (int)$_GET['del'];


// Direktori tempat file gambar disimpan
$direktori = 'gambar/'; 

// --- 2. SELECT: Ambil Nama File Gambar yang Akan Dihapus ---
// Query untuk memilih record berdasarkan ID
// ... (Sisa kode Anda yang sudah direvisi menggunakan mysqli_*)
$perintah_select = "SELECT Foto FROM namasiswa WHERE Id = $id_delete";
$query_select = mysqli_query($koneksi, $perintah_select);

// Cek apakah data ditemukan
if (mysqli_num_rows($query_select) > 0) {
    // ... (lanjutkan proses unlink dan DELETE)
    $data = mysqli_fetch_assoc($query_select);
    $nama_file_foto = $data['Foto'];
    
    // ... (lanjutkan unlink)
    $path_file = $direktori . $nama_file_foto;
    if (file_exists($path_file)) {
        unlink($path_file);
    }
    
    // ... (lanjutkan DELETE)
    $perintah_delete = "DELETE FROM namasiswa WHERE Id = $id_delete";
    $query_delete = mysqli_query($koneksi, $perintah_delete);

    if ($query_delete) {
        echo "Gambar dan data berhasil dihapus<br/>";
        echo "<a href='tampil_foto.php'>Kembali ke Halaman Tampil</a>";
    } else {
        echo "Gagal menghapus data dari database: " . mysqli_error($koneksi);
    }
    
} else {
    // Pesan error jika ID tidak ditemukan (ID 0 tidak akan masuk sini lagi jika pengecekan awal berhasil)
    echo "Error: Data dengan ID $id_delete tidak ditemukan.";
}
?>