<?php

// --- Pengecekan Awal: Pastikan Form Sudah Dikirim ---
// Hanya jalankan kode di bawah jika tombol submit 'kirim' sudah ditekan
if (isset($_POST['kirim'])) {

    // 1. Koneksi ke Database
    // Pastikan file koneksi.php sudah menggunakan MySQLi!
    include('koneksi.php');

    // 2. Validasi Nama dan Sanitasi Input
    
    // Cek apakah 'nama' ada dan tidak kosong
    if (!isset($_POST['nama']) || empty($_POST['nama'])) {
        echo "Nama masih kosong<br/><a href='input_foto.php'>Kembali</a>";
        exit(); // Berhenti di sini
    }
    
    // Ambil dan bersihkan input nama
    $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama']);

    // 3. Menyiapkan Variabel File Upload
    $file_nama = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];

    // Direktori tempat file akan disimpan
    $direktori = 'gambar/';
    // Batas ukuran (3 MB = 3000000 bytes)
    $batas_ukuran = 3000000;

    // Mendapatkan ekstensi file
    $ektensi = strtolower(pathinfo($file_nama, PATHINFO_EXTENSION));
    // Ekstensi yang diperbolehkan
    $valid_ektensi = array('jpeg', 'jpg', 'png', 'gif');

    // Membuat nama file baru yang unik
    $gambar_unik = rand(1000, 1000000) . "." . $ektensi;

    // --- 4. Mulai Validasi Gambar ---

    // A. Cek Ekstensi Gambar
    if (in_array($ektensi, $valid_ektensi)) {

        // B. Cek Ukuran Gambar
        if ($ukuran <= $batas_ukuran) {
            
            // C. Proses Penyimpanan File dan Data ---
            
            // Pindahkan file fisik
            if (move_uploaded_file($tmp_dir, $direktori . $gambar_unik)) {
                
                // Simpan data ke database
                $perintah_sql = "INSERT INTO namasiswa (Nama, Foto) VALUES ('$nama_siswa', '$gambar_unik')";
                
                $query = mysqli_query($koneksi, $perintah_sql);
                
                // Validasi Query
                if (!$query) {
                    echo "Gagal menyimpan data ke database: " . mysqli_error($koneksi);
                } else {
                    echo "Berhasil disimpan<br/>";
                    echo "Nama: $nama_siswa <br/>";
                    echo "" . "<img src='$direktori$gambar_unik' height='200'>";
                    echo "<br/>berhasil disimpan";
                    echo "<br><a href='tampil_foto.php'>Lihat Halaman Berikutnya</a>";
                }
            } else {
                echo "Gagal memindahkan file ke direktori server (Cek izin folder 'gambar').<br/><a href='input_foto.php'>Kembali</a>";
            }
            
        } else {
            echo "Gambar kegedean (Maksimal 3 MB).<br/><a href='input_foto.php'>Kembali</a>";
        }

    } else {
        echo "Ekstensi gambar yang di-upload tidak sesuai (Hanya diperbolehkan JPG, JPEG, PNG, GIF).<br/><a href='input_foto.php'>Kembali</a>";
    }

} else {
    // Pesan jika proses.php diakses tanpa menekan tombol submit
    echo "Akses ditolak. Silakan <a href='input_foto.php'>Kembali</a> dan isi form.";
}
?>