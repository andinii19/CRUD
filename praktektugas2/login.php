<?php
session_start(); // Mulai session

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result= mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: beranda.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Log-In</p>
            <div class="input-group"> <input type="text" name="username" placeholder="Username"></div>
            <div class="input-group"> <input type="password" name="password" placeholder="Password"></div>
            <div class="input-group"> <button type="submit" name="bttnLogin" class="btn">Login</button></div>
            <p class="login-register-text">Belum Mempunyai Akun? <a href="register.php">DAFTAR</a></p>
        </form>
    </div>
</body>
</html>

