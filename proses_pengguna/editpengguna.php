<?php

include '../include/include.php';

if(isset($_POST['editpengguna'])) editpengguna($_POST);









// FUNCTION OON

function editpengguna($data) {
    global $conn;
    $id     = htmlspecialchars($data['id_pengguna']);
    $username   = htmlspecialchars($data['username']);
    $password   = htmlspecialchars($data['password']);
    $nama = htmlspecialchars($data['nama_pengguna']);
    $jabatan  = htmlspecialchars($data['jabatan']);
    $nohp  = htmlspecialchars($data['nohp_pengguna']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query  = "UPDATE pembeli SET user_name = '$username', password = '$password', nama_pengguna = '$nama', jabatan = '$jabatan', nohp_pengguna = '$nohp' WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pengguna.php");
    } else {
        header("Location: ../public/pengguna.php?err=1");
    }
}