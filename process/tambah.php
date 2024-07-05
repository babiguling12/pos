<?php

include '../include/include.php';

if(isset($_POST['tambahpembeli'])) tambahpembeli($_POST);










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