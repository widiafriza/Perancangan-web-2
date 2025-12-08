<!DOCTYPE html>
<html>
<head>
    <title>Registration Form - English Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: white;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
            margin-top: 15px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
<form method="POST" action="simpan_data.php">
    <h2>REGISTRATION FORM<br>ENGLISH COURSE</h2>

    <label>Full Name:</label>
    <input type="text" name="fullname" required>

    <label>Address:</label>
    <textarea name="address" rows="2"></textarea>

    <label>Postal Code:</label>
    <input type="text" name="postalcode">

    <label>Telephone Number:</label>
    <input type="text" name="phone">

    <label>Place/Date of Birth:</label>
    <input type="text" name="birth">

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female

    <label>Religion:</label>
    <input type="radio" name="religion" value="Muslim"> Muslim
    <input type="radio" name="religion" value="Christian"> Christian
    <input type="radio" name="religion" value="Hinduism"> Hinduism
    <input type="radio" name="religion" value="Buddhism"> Buddhism

    <label>Attended School at:</label>
    <input type="text" name="school">

    <button type="submit" class="submit-btn">Submit</button>
</form>
</div>

</body>
</html>
