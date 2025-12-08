<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>LOGIN</h2>

<form action="login_process.php" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td> : <input type="text" name="username" required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td> : <input type="password" name="password" required></td>
        </tr>

        <tr>
            <td></td>
            <td><button type="submit">Login</button></td>
        </tr>
    </table>
</form>

</body>
</html>
