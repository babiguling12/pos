<?php

include '../include/include.php';

if(isset($_POST['editpembeli'])) editpembeli($_POST);









// FUNCTION OON

function editpembeli($data) {
    global $conn;
    $id     = htmlspecialchars($data['idmember']);
    $nama   = htmlspecialchars($data['namamember']);
    $nik    = htmlspecialchars($data['nik']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor  = htmlspecialchars($data['nohp']);

    $query  = "UPDATE pembeli SET nama_member = '$nama', nik = '$nik', alamat = '$alamat', nohp = '$nomor' WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pembeli.php");
    } else {
        header("Location: ../public/pembeli.php?err=1");
    }
}