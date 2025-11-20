<?php
// Mulai session di awal skrip
session_start();

// Cek apakah user sudah login, jika ya, arahkan ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Data pengguna yang valid (Gunakan konsep array)
$users = [
    'admin' => 'admin123',  // Username 'admin', Password 'admin123'
    'polgan' => 'polgan123', // Username 'polgan', Password 'polgan123'
    'sales' => 'sales123'    // Tambahan user lain
];

$error = '';

// Cek jika form telah disubmit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $error = "Username dan password harus diisi!";
    } else {
        // Cek apakah username ada di array $users
        if (array_key_exists($username, $users)) {
            // Cek apakah password cocok
            if ($users[$username] === $password) {
                // Login Berhasil
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                // Password salah
                $error = "Username atau password salah!";
            }
        } else {
            // Username tidak ditemukan
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLGAN MART - Login</title>
    <style>
        /* CSS Sederhana untuk tampilan */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 300px; text-align: center; }
        h2 { color: #007bff; margin-bottom: 20px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 5px; }
        .error { background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 15px; }
        .footer { font-size: 12px; color: #aaa; margin-top: 10px; }
        .cancel { background-color: #6c757d; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>POLGAN MART</h2>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <button type="button" class="cancel" onclick="alert('Fitur batal belum diimplementasikan.')">Batal</button>
        </form>

        <p class="footer">© 2025 POLGAN MART</p>
    </div>
</body>
</html>