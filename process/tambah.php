<?php

include '../include/include.php';

if(isset($_POST['tambahpelanggan'])) tambahpelanggan($_POST);









// FUNCTION OON

function tambahpelanggan($data) {
    global $conn;
    $nama   = htmlspecialchars($data['namamember']);
    $nik    = htmlspecialchars($data['nik']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor  = htmlspecialchars($data['nohp']);

    $query  = "INSERT INTO pelanggan VALUES (NULL, '$nama', '$nik', '$alamat', '$nomor')";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pelanggan.php");
    } else {
        header("Location: ../public/pelanggan.php?err=1");
    }
}