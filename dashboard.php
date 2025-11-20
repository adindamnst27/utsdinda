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
$user = $_SESSION['username'];

// START KODE PHP BARU UNTUK COMMIT 6: Definisi Array Produk

$produk = [
    [
        'Kode_barang' => 'PLG001',
        'Nama_barang' => 'Kopi Sachet',
        'Harga_barang' => 2000,
        'Stok' => 50
    ],
    [
        'Kode_barang' => 'PLG002',
        'Nama_barang' => 'Mie Instan Kuah',
        'Harga_barang' => 3500,
        'Stok' => 45
    ],
    [
        'Kode_barang' => 'PLG003',
        'Nama_barang' => 'Air Mineral 600ml',
        'Harga_barang' => 5000,
        'Stok' => 80
    ],
    [
        'Kode_barang' => 'PLG004',
        'Nama_barang' => 'Sabun Mandi Batang',
        'Harga_barang' => 4500,
        'Stok' => 30
    ],
    [
        'Kode_barang' => 'PLG005',
        'Nama_barang' => 'Susu Kotak Kecil',
        'Harga_barang' => 6000,
        'Stok' => 65
    ]
];

// END KODE PHP BARU UNTUK COMMIT 6

?>
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
    <tbody>
    <?php 
    // START KODE BARU/MODIFIKASI UNTUK COMMIT 7

    // 1. Inisialisasi Grand Total
    $grandtotal = 0; 

    // Menggunakan foreach untuk menampilkan setiap barang dalam tabel
    foreach ($produk as $item) { 
        // 2A. Hitung total harga per item 
        $total_item = $item['Harga_barang'] * $item['Stok'];
        
        // 2B. Akumulasi total ke variabel $grandtotal
        $grandtotal += $total_item; 
    ?>
    <tr>
        <td><?php echo $item['Kode_barang']; ?></td>
        <td><?php echo $item['Nama_barang']; ?></td>
        <td>Rp <?php echo number_format($item['Harga_barang'], 0, ',', '.'); ?></td>
        <td><?php echo $item['Stok']; ?></td>
        <td>Rp <?php echo number_format($total_item, 0, ',', '.'); ?></td>
    </tr>
    <?php 
    } 
    ?>
    </tbody>
    
    <tfoot>
        <tr>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right; font-weight: bold;">TOTAL BELANJA (Kotor):</td>
                <td style="font-weight: bold;">Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
            <td colspan="4" style="text-align:right; font-weight: bold;">TOTAL BELANJA (Sebelum Diskon):</td>
            <td style="font-weight: bold;">Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
        </tr>
    </tfoot>
    </table>
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