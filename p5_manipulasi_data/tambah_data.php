<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <style>
        body { font-family: sans-serif; }
        .form-container { width: 450px; margin: 50px auto; border: 1px solid #000080; padding: 20px; background-color: #F0F0FF; }
        h2 { color: #000080; border-bottom: 2px solid #000080; padding-bottom: 5px;}
        table { width: 100%; }
        table td { padding: 8px 5px; }
        input[type="text"] { width: calc(100% - 10px); padding: 4px; box-sizing: border-box; border: 1px solid #7F9DB9; }
        input[type="submit"], input[type="reset"] { padding: 5px 15px; margin-right: 10px; border: 1px solid #000000; background-color: #E0E0E0; cursor: pointer; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Data</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td width="30%"><label for="nim">NIM*</label></td>
                <td><input type="text" id="nim" name="nim" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" id="alamat" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Cancel">
                </td>
            </tr>
        </table>
        <p>Ket: * Harus diisi</p>
    </form>
</div>

<?php
$table = "tambah_data"; 

if (isset($_POST['submit'])) {
    
    $nim    = $koneksi->real_escape_string($_POST['nim']);
    $nama   = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    
    if (!empty($nim)) {
        $sql = "INSERT INTO $table (nim, nama, alamat) VALUES (?, ?, ?)";
        
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $nim, $nama, $alamat); 

        if ($stmt->execute()) {
            echo "<script>alert('Data NIM: $nim Berhasil Disimpan!'); window.location.href='baca_data.php';</script>";
        } else {
            echo "<script>alert('Error: Data Gagal Disimpan! " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('NIM harus diisi!');</script>";
    }
}
$koneksi->close();
?>
</body>
</html>