<?php 
// Jika cookie tidak ada, paksa login
if (!isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: #f0f2f5; /* warna soft */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-box {
            width: 400px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 25px;
        }

        .btn-logout {
            display: inline-block;
            padding: 10px 20px;
            background: #d9534f; /* merah soft untuk logout */
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #c9302c;
        }
    </style>
</head>

<body>

<div class="home-box">

    <h2>Selamat Datang, <strong><?php echo $_COOKIE['username']; ?></strong> 👋</h2>

    <p>Anda berhasil login menggunakan sistem autentikasi cookies.</p>

    <a href="logout_cookie.php" class="btn-logout">Logout</a>
</div>

</body>
</html>

