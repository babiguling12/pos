<?php

include '../include/include.php';

if(isset($_POST['tambahpengguna'])) tambahpengguna($_POST);










// FUNCTION OON

function tambahpengguna($data) {
    global $conn;
    $username = htmlspecialchars($data['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nama = htmlspecialchars($data['nama']);
    $jabatan  = htmlspecialchars($data['jabatan']);
    $nohp = htmlspecialchars($data['nohp_user']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query  = "INSERT INTO pembeli VALUES (NULL, '$username', '$password', '$nama', '$jabatan', '$nohp)";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pengguna.php");
    } else {
        header("Location: ../public/pengguna.php?err=1");
    }
}