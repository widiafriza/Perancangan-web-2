<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 - Form Validasi PHP</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            color: #0d47a1;
            text-align: center;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .gender-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 8px;
            margin-bottom: 15px;
        }
        .gender-group label {
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        input[type=submit] {
            background-color: #1565c0;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            width: 100%;
            padding: 10px;
        }
        input[type=submit]:hover {
            background-color: #0d47a1;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>PHP Form Validation Example</h2>
    <form action="hasil.php" method="post">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Website:</label>
        <input type="text" name="website">

        <label>Komentar:</label>
        <textarea name="komentar" rows="3"></textarea>

        <label>Gender:</label>
        <div class="gender-group">
            <label><input type="radio" name="gender" value="Female" required> Female</label>
            <label><input type="radio" name="gender" value="Male"> Male</label>
            <label><input type="radio" name="gender" value="Other"> Other</label>
        </div>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
