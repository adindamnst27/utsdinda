<?php
// Pastikan ini adalah baris pertama!
session_start();

// Data login statis sesuai instruksi
$valid_user = 'admin';
$valid_pass = '1234';

// 1. INISIALISASI: Definisi variabel error di awal skrip
$error_message = ""; 

// Cek apakah formulir sudah disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses Cek Username dan Password
    if ($username === $valid_user && $password === $valid_pass) {
        // Jika Benar: Buat Sesi dan Arahkan ke Dashboard
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit(); // PENTING! Menghentikan eksekusi script setelah redirect
    } else {
        // Jika Salah: Set Pesan Error
        $error_message = "Username atau password salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login | POLGAN Mart</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class="login-container">
        <header class="header-utama">
            <h1>Login POLGAN Mart</h1>
        </header>

        <?php
        // 2. TAMPILKAN PESAN ERROR: Cek jika pesan error TIDAK KOSONG
        if (!empty($error_message)) {
            echo "<p style='color: red; text-align: center; font-weight: bold;'>$error_message</p>";
        }
        ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Login" class="btn-login">
        </form>
        
        <p style="text-align: center; margin-top: 15px;">© 2025 POLGAN MART</p>
    </div>
    
</body>
</html>