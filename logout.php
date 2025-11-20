<?php
// 1. Memulai sesi yang aktif
session_start();

// 2. Menghapus semua variabel sesi
// Ini menghapus semua data yang tersimpan di $_SESSION
session_unset();

// 3. Menghancurkan sesi
// Ini benar-benar menghapus file sesi di server
session_destroy();

// 4. Mengarahkan pengguna kembali ke halaman login (index.php)
header("Location: index.php");
exit(); 
?>