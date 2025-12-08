<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

// Ambil variabel dari login_process.php
global $username, $status;

$mail = new PHPMailer(true);

try {
    // KONFIGURASI SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // EMAIL + APP PASSWORD
    $mail->Username = 'widiafriza432@gmail.com';
    $mail->Password = 'qybxawfqjgxkdtnk';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // PENGIRIM
    $mail->setFrom('widiafriza432@gmail.com', 'Sistem Login');

    // PENERIMA (TUGAS)
    $mail->addAddress('afrizawidi@gmail.com');

    // WAKTU
    $tanggal = date("Y-m-d");
    $waktu   = date("H:i:s");

    // SUBJECT sesuai format
    $mail->Subject = "ALERT_{$tanggal}_{$waktu}_{$status}";

    // BODY email
    $mail->Body = "
    ALERT LOGIN SISTEM

    Status Autentikasi : $status
    Username           : $username
    Tanggal            : $tanggal
    Waktu              : $waktu
    ";

    $mail->send();

} catch (Exception $e) {
    echo "Error pengiriman email: {$mail->ErrorInfo}";
}
?>
