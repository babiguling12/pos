<?php

session_start();

include '../include/include.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM pengguna WHERE user_name = '$username'");

if (mysqli_num_rows($data) > 0) {
    $user = mysqli_fetch_assoc($data);
    $hashed_password = $user['password'];
    
    // Memverifikasi password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("Location: ../public/index.php");
        exit;
    } else {
        $_SESSION['error'] = "Username atau Password salah";
        header("Location: index.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Username atau Password salah";
    header("Location: index.php");
    exit;
}

