<?php

include '../include/include.php';

$username = $_POST['username'];
$password = $_POST['password'];


$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE user_name = '$username'"));

if (isset($user['password'])) {
    $hashed_password = $user['password'];
    $verify = password_verify($password, $hashed_password);
    if ($verify) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: index.php");
        exit;
    } else {
        header("location: index.php");
    }
}