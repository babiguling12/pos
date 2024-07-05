<?php

include '../include/include.php';

if(isset($_POST['tambahpembeli'])) tambahpembeli($_POST);

if(isset($_POST['tambahpengguna'])) tambahpengguna($_POST);









// FUNCTION OON

function tambahpembeli($data) {
    global $conn;
    $nama   = htmlspecialchars($data['namamember']);
    $nik    = htmlspecialchars($data['nik']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor  = htmlspecialchars($data['nohp']);

    $query  = "INSERT INTO pembeli VALUES (NULL, '$nama', '$nik', '$alamat', '$nomor')";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pembeli.php");
    } else {
        header("Location: ../public/pembeli.php?err=1");
    }
}

function tambahpengguna($data) {
    global $conn;

    $username = htmlspecialchars($data['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nama = htmlspecialchars($data['nama_pengguna']);
    $jabatan  = htmlspecialchars($data['jabatan']);
    $nohp = htmlspecialchars($data['nohp_pengguna']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query  = "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$jabatan', '$nohp')";

    $username   = htmlspecialchars($data['user_name']);
    $password        = htmlspecialchars($data['password']);
    $nama       = htmlspecialchars($data['nama_pengguna']);
    $jabatan     = htmlspecialchars($data['jabatan']);
    $nomor      = htmlspecialchars($data['nohp_pengguna']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query  = "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$jabatan', '$nomor')";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pengguna.php");
    } else {
        header("Location: ../public/pengguna.php?err=1");
    }
}