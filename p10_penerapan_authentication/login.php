<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 360px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logo {
            width: 90px;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .input-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .input-group label {
            color: #444;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.2s;
        }

        .input-group input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 4px rgba(74,144,226,0.4);
        }

        .btn-login {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: #4a90e2;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #357ABD;
        }
    </style>
</head>

<body>

<div class="login-box">

    <!-- LOGO KAMPUS -->
    <img src="images/logo.jpg" class="logo" alt="Logo Kampus">

    <h2>LOGIN PHPMAILER</h2>

    <form action="login_process.php" method="post">
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="btn-login">Login</button>
    </form>
</div>

</body>
</html>
