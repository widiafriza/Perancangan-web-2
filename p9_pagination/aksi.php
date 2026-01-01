<?php
include('koneksi.php');

// --- Logika CREATE (Menambah Data) ---
if (isset($_POST['tambah_data'])) {
    // Ambil data dan sanitasi
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    
    // Query INSERT
    $sql = "INSERT INTO user (firstname, lastname, username) 
            VALUES ('$firstname', '$lastname', '$username')"; // Dibuat lebih rapi
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=sukses_tambah");
        exit();
    } else {
        // Konsistensi error reporting: menyertakan Query yang gagal
        die("Data GAGAL Disimpan! Error MySQL: " . mysqli_error($conn) . 
            "<br>Query yang gagal: " . $sql);
    }
}

// --- Logika DELETE (Menghapus Data) ---
if (isset($_GET['delete_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    
    // Query DELETE
    $sql = "DELETE FROM user WHERE user_id = '$user_id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=sukses_hapus");
        exit();
    } else {
        // Konsistensi error reporting
        die("Data GAGAL Dihapus! Error MySQL: " . mysqli_error($conn) .
            "<br>Query yang gagal: " . $sql);
    }
}

// --- Logika UPDATE (Mengubah Data) ---
if (isset($_POST['update_data'])) {
    // Ambil data dari form
    $user_id   = mysqli_real_escape_string($conn, $_POST['user_id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    
    // Query UPDATE
    $sql = "UPDATE user SET
            firstname='$firstname',
            lastname='$lastname',
            username='$username'
            WHERE user_id='$user_id'"; // Dibuat lebih rapi
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=sukses_update");
        exit();
    } else {
        // Konsistensi error reporting
        die("Data GAGAL Diupdate! Error MySQL: " . mysqli_error($conn) .
            "<br>Query yang gagal: " . $sql);
    }
}
// Catatan: Tidak ada tag penutup ?>