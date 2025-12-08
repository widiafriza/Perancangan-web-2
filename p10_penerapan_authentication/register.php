<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran User</title>
</head>
<body>

<h2>Pendaftaran User</h2>

<form action="register_process.php" method="post">
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
            <td>Re-type Password</td>
            <td> : <input type="password" name="repassword" required></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                : <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
                <input type="radio" name="gender" value="Perempuan" required> Perempuan
            </td>
        </tr>

        <tr>
            <td></td>
            <td><button type="submit">Sign Up</button></td>
        </tr>
    </table>
</form>

</body>
</html>
