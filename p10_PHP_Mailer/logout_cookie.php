<?php
// Hapus cookie dengan cara memberi waktu kadaluarsa yang sudah lewat
setcookie("username", "", time() - 3600, "/");

header("Location: login.php");
exit;
?>
