<?php
include 'koneksi.php'; 

$table = "tambah_data"; 

if (isset($_GET['nim'])) {
    
    $nim_yang_dihapus = $koneksi->real_escape_string($_GET['nim']);

    $sql_delete = "DELETE FROM $table WHERE nim = ?";
    
    $stmt_delete = $koneksi->prepare($sql_delete);
    $stmt_delete->bind_param("s", $nim_yang_dihapus);

    if ($stmt_delete->execute()) {
        $pesan = "Data NIM " . htmlspecialchars($nim_yang_dihapus) . " berhasil dihapus!";
    } else {
        $pesan = "Error saat menghapus data: " . $stmt_delete->error;
    }

    $stmt_delete->close();
    
    // Redirect kembali ke halaman daftar data dengan membawa pesan status
    header("Location: baca_data.php?status=" . urlencode($pesan));
    exit();

} else {
    // Jika NIM tidak ditemukan
    header("Location: baca_data.php?status=" . urlencode("Error: NIM tidak ditemukan di URL."));
    exit();
}

$koneksi->close();
?>