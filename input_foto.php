<!DOCTYPE html>
<html>
<head>
<title>Upload Gambar</title>
<link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="card-form">
    <h2>SIMPAN & TAMPIL GAMBAR</h2>
    
    <form method="post" action="proses.php" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="nama">Masukan Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Tuliskan nama file" required>
        </div>

        <div class="form-group">
            <label for="foto">Pilih Foto</label>
            <input type="file" name="foto" id="foto" required>
        </div>

        <div class="form-group">
            <input type="submit" name="kirim" id="kirim" value="SIMPAN">
        </div>

    </form>
</div>

</body>
</html>
