<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #0066cc;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Registrasi</h2>
    <form action="hasil.php" method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required>

        <input type="submit" name="submit" value="Daftar">
    </form>
</div>
</body>
</html>
