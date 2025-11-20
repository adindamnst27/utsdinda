<?php
// 1. Memulai Sesi
session_start();

// 2. Cek Proteksi Sesi: Jika pengguna belum login, arahkan kembali ke index.php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Ambil nama pengguna dari sesi
$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Polgan Mart</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <header class="header-utama">
        <h1>POLGAN MART</h1>
        <p>Selamat datang, *<?php echo htmlspecialchars($user); ?>*</p>
    </header>

    <main>
        <h2>Halaman Dashboard</h2>
        
        <section class="content-penjualan">
            <p>Siap untuk menampilkan daftar barang...</p>
        </section>

        <p>
            <a href="logout.php" class="btn-logout">Logout</a>
        </p>
    </main>

</body>
</html>