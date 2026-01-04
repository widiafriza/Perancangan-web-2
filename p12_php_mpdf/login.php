<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 380px;
            padding: 30px 35px;
        }

        h2 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #1e3d59;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .btn {
            background-color: #1565c0;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #0d47a1;
        }

        .back-link {
            text-align: center;
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #1565c0;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Login Admin</h2>

    <form method="post" action="cek_login.php">

        <label>Username :</label>
        <input type="text" name="username" required>

        <label>Password :</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn">Login</button>
    </form>

    <a class="back-link" href="registrasi.php">← Kembali ke Registrasi</a>
</div>

</body>
</html>

