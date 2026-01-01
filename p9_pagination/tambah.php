<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <h2>Form Tambah Data User</h2>
    <hr>
    
    <form action="aksi.php" method="POST">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        
        <input type="submit" name="tambah_data" class="btn btn-primary" value="Simpan Data">
        <a href="index.php" class="btn btn-default">Kembali</a>
    </form>

</div>
</body>
</html>