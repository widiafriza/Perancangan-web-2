<?php
// Jika cookie tidak ada, paksa login
if (!isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
</head>
<body>

<h2>Login anda : <?php echo $_COOKIE['username']; ?></h2>
<p>Ini di halaman utama (versi cookies)</p>

<a href="logout_cookie.php">Logout</a>

</body>
</html>
