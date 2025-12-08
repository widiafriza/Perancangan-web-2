<?php
include "koneksi.php";

$fullname  = $_POST['fullname'];
$address   = $_POST['address'];
$postalcode= $_POST['postalcode'];
$phone     = $_POST['phone'];
$birth     = $_POST['birth'];
$gender    = $_POST['gender'];
$religion  = $_POST['religion'];
$school    = $_POST['school'];

$sql = "INSERT INTO registration (fullname, address, postalcode, phone, birth, gender, religion, school)
        VALUES ('$fullname', '$address', '$postalcode', '$phone', '$birth', '$gender', '$religion', '$school')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Data berhasil disimpan!</h3>";
    echo "<p><b>Full Name:</b> $fullname<br>";
    echo "<b>Address:</b> $address<br>";
    echo "<b>Postal Code:</b> $postalcode<br>";
    echo "<b>Phone:</b> $phone<br>";
    echo "<b>Place/Date of Birth:</b> $birth<br>";
    echo "<b>Gender:</b> $gender<br>";
    echo "<b>Religion:</b> $religion<br>";
    echo "<b>School:</b> $school</p>";
} else {
    echo "Gagal menyimpan: " . mysqli_error($conn);
}
?>
