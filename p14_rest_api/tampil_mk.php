<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include "koneksi.php";

// Query ambil semua data
$query = "SELECT * FROM mata_kuliah ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    $data_matakuliah = [];
    
    // Ambil semua baris data menjadi array
    while ($row = mysqli_fetch_assoc($result)) {
        $data_matakuliah[] = $row;
    }

    echo json_encode([
        "status" => true,
        "message" => "Data berhasil ditarik.",
        "jumlah_data" => count($data_matakuliah),
        "data" => $data_matakuliah
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal mengambil data: " . mysqli_error($conn)
    ]);
}
?>
