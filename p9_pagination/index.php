<?php include('pagination.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pagination & CRUD PHP</title>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div style="height: 20px;"></div>

<?php
// Cek jika ada parameter status di URL
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $message = '';
    $alert_class = '';

    if ($status == 'sukses_tambah') {
        $message = 'Data berhasil ditambahkan.';
        $alert_class = 'alert-success';
    } elseif ($status == 'sukses_update') {
        $message = 'Data berhasil diubah.';
        $alert_class = 'alert-warning';
    } elseif ($status == 'sukses_hapus') {
        $message = 'Data berhasil dihapus.';
        $alert_class = 'alert-danger';
    } elseif ($status == 'gagal') {
        $message = 'Terjadi kesalahan saat memproses data.';
        $alert_class = 'alert-danger';
    }

    if (!empty($message)) {
        // Menampilkan kotak notifikasi Bootstrap
        echo '<div class="alert ' . $alert_class . ' alert-dismissible" role="alert">';
        // Tombol close untuk alert
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo $message;
        echo '</div>';
    }
}
?>
<a href="tambah.php" class="btn btn-success" style="margin-bottom: 15px;">+ Tambah Data Baru</a>

<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8">

<table width="100%" class="table table-striped table-bordered table-hover">

<thead>
<th>User ID</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
<th>Aksi</th> </thead>

<tbody>
<?php
// Loop untuk menampilkan data
while($crow = mysqli_fetch_array($nquery)){
?>
<tr>
<td><?php echo $crow['user_id']; ?></td> 

<td><?php echo $crow['firstname']; ?></td>

<td><?php echo $crow['lastname']; ?></td>

<td><?php echo $crow['username']; ?></td>

<td>
    <a href="edit.php?id=<?php echo $crow['user_id']; ?>" class="btn btn-warning btn-xs">Edit</a>
    <a href="aksi.php?delete_id=<?php echo $crow['user_id']; ?>" 
       onclick="return confirm('Yakin ingin menghapus data ini?')" 
       class="btn btn-danger btn-xs">Delete</a>
</td>

</tr>
<?php
}
?>
</tbody>
</table>
<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</div>
<div class="col-lg-2">
</div>
</div>
</div>
</body>
</html>