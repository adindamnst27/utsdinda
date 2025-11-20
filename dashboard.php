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
    </table> 
        
        <br>
        
        <?php
        // START KODE COMMIT 9: Logika Diskon Belanja (PHP)
        $diskon_persen = 0;
        $keterangan_diskon = "";

        // 1. Menerapkan Logika Diskon
        if ($grandtotal < 50000) {
            $diskon_persen = 0.05; // 5%
            $keterangan_diskon = "5% (Belanja di bawah Rp 50.000)";
        } elseif ($grandtotal >= 50000 && $grandtotal <= 100000) {
            $diskon_persen = 0.10; // 10%
            $keterangan_diskon = "10% (Belanja antara Rp 50.000 - Rp 100.000)";
        } else { // $grandtotal > 100000
            $diskon_persen = 0.15; // 15%
            $keterangan_diskon = "15% (Belanja di atas Rp 100.000)";
        }

        // 2. Menghitung Potongan Diskon dan Total Akhir
        $jumlah_diskon = $grandtotal * $diskon_persen;
        $total_akhir = $grandtotal - $jumlah_diskon;
        // END KODE COMMIT 9 (PHP)
        ?>

        <table border="1" cellpadding="10" cellspacing="0" style="width: 50%;">
            <tr>
                <td style="font-weight: bold;">Diskon Belanja</td>
                <td><?php echo $keterangan_diskon; ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Potongan Diskon</td>
                <td style="color: red;">Rp <?php echo number_format($jumlah_diskon, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">TOTAL AKHIR YANG HARUS DIBAYAR</td>
                <td style="font-weight: bold; background-color: #ccffcc;">Rp <?php echo number_format($total_akhir, 0, ',', '.'); ?></td>
            </tr>
        </table>
        <p>
            <a href="logout.php" class="btn-logout">Logout</a>
        </p>
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