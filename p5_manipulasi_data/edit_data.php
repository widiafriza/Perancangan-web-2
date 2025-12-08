<?php
include 'koneksi.php'; 

$table = "tambah_data"; 
$nim_lama = '';
$nama_lama = '';
$alamat_lama = '';
$pesan_status = '';

// --- BAGIAN 1: Mengambil Data Lama ---
if (isset($_GET['nim'])) {
    $nim_yang_diedit = $koneksi->real_escape_string($_GET['nim']);

    $sql_select = "SELECT nim, nama, alamat FROM $table WHERE nim = ?";
    
    $stmt_select = $koneksi->prepare($sql_select);
    $stmt_select->bind_param("s", $nim_yang_diedit);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $nim_lama = $data['nim'];
        $nama_lama = $data['nama'];
        $alamat_lama = $data['alamat'];
    } else {
        $pesan_status = "<p style='color: red;'>Error: Data tidak ditemukan!</p>";
    }
    $stmt_select->close();
}


// --- BAGIAN 2: Memproses UPDATE Data ---
if (isset($_POST['submit_edit'])) {
    
    $nim_baru = $koneksi->real_escape_string($_POST['nim_baru']);
    $nama_baru = $koneksi->real_escape_string($_POST['nama_baru']);
    $alamat_baru = $koneksi->real_escape_string($_POST['alamat_baru']);
    $nim_acuan = $koneksi->real_escape_string($_POST['nim_acuan']); // NIM lama

    $sql_update = "UPDATE $table SET nama = ?, alamat = ? WHERE nim = ?";
    
    $stmt_update = $koneksi->prepare($sql_update);
    $stmt_update->bind_param("sss", $nama_baru, $alamat_baru, $nim_acuan);

    if ($stmt_update->execute()) {
        $pesan_status = "<p style='color: green;'>✅ Data NIM $nim_acuan Berhasil Diperbarui!</p>";
        // Update variabel lama agar form langsung menampilkan data baru
        $nama_lama = $nama_baru;
        $alamat_lama = $alamat_baru;
    } else {
        $pesan_status = "<p style='color: red;'>❌ Error saat memperbarui data: " . $stmt_update->error . "</p>";
    }

    $stmt_update->close();
}
$koneksi->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <style>
        body { font-family: sans-serif; }
        .form-container { width: 450px; margin: 50px auto; border: 1px solid #000080; padding: 20px; background-color: #F0F0FF; }
        h2 { color: #000080; border-bottom: 2px solid #000080; padding-bottom: 5px;}
        table { width: 100%; }
        table td { padding: 8px 5px; }
        input[type="text"] { width: calc(100% - 10px); padding: 4px; box-sizing: border-box; border: 1px solid #7F9DB9; }
        input[type="submit"], input[type="button"] { padding: 5px 15px; margin-right: 10px; border: 1px solid #000000; background-color: #E0E0E0; cursor: pointer; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Data</h2>
    
    <?php echo $pesan_status; // Tampilkan pesan status ?>

    <form action="" method="post">
        <table>
            <tr>
                <td width="30%"><label for="nim_baru">NIM*</label></td>
                <td>
                    <input type="text" id="nim_baru" name="nim_baru" value="<?php echo htmlspecialchars($nim_lama); ?>" readonly>
                    <input type="hidden" name="nim_acuan" value="<?php echo htmlspecialchars($nim_lama); ?>">
                </td>
            </tr>
            <tr>
                <td><label for="nama_baru">Nama</label></td>
                <td>
                    <input type="text" id="nama_baru" name="nama_baru" value="<?php echo htmlspecialchars($nama_lama); ?>">
                </td>
            </tr>
            <tr>
                <td><label for="alamat_baru">Alamat</label></td>
                <td>
                    <input type="text" id="alamat_baru" name="alamat_baru" value="<?php echo htmlspecialchars($alamat_lama); ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit_edit" value="Submit">
                    <input type="button" value="Cancel" onclick="window.history.back()"> 
                </td>
            </tr>
        </table>
        <p>Ket: * Harus diisi</p>
    </form>
</div>

</body>
</html>