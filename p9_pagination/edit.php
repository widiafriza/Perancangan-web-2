<?php
include('koneksi.php');

// 1. Ambil ID dari URL dan sanitasi
if (!isset($_GET['id'])) {
    die("Error: User ID tidak ditemukan.");
}
$user_id = mysqli_real_escape_string($conn, $_GET['id']);

// 2. Query untuk mengambil data lama
$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");

// Cek jika query gagal dieksekusi
if (!$query) {
    die("Query Error: " . mysqli_error($conn));
}

$data = mysqli_fetch_array($query);

// Cek jika data tidak ditemukan
if (!$data) {
    die("Data dengan ID tersebut tidak ditemukan.");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Data User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <h2>Form Edit Data User (ID: <?php echo $data['user_id']; ?>)</h2>
    <hr>
    
    <form action="aksi.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
        
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo $data['firstname']; ?>" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required>
        </div>
        
        <input type="submit" name="update_data" class="btn btn-primary" value="Update Data">
        <a href="index.php" class="btn btn-default">Batal</a>
    </form>

</div>
</body>
</html>