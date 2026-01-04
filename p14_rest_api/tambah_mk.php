<?php
// Mencegah output sebelum JSON
ob_start();

// Header Keamanan & JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include "koneksi.php";

// 1. Pastikan metode yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "status" => false,
        "message" => "Metode tidak diizinkan! Gunakan POST."
    ]);
    exit;
}

// 2. Ambil data dari Postman (Body x-www-form-urlencoded)
$kode_mk = $_POST['kode_mk'] ?? '';
$nama_mk = $_POST['nama_mk'] ?? '';
$sks     = $_POST['sks'] ?? '';

// 3. Validasi: Jangan izinkan jika ada kolom yang kosong
if (empty($kode_mk) || empty($nama_mk) || empty($sks)) {
    echo json_encode([
        "status" => false,
        "message" => "Gagal! Semua kolom (kode_mk, nama_mk, sks) wajib diisi."
    ]);
    exit;
}

// 4. Proses Simpan ke Database
$query = "INSERT INTO mata_kuliah (kode_mk, nama_mk, sks) VALUES ('$kode_mk', '$nama_mk', '$sks')";

if (mysqli_query($conn, $query)) {
    echo json_encode([
        "status" => true,
        "message" => "Berhasil! Data mata kuliah telah tersimpan."
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal menyimpan: " . mysqli_error($conn)
    ]);
}
?>