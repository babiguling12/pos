<?php

include '../include/include.php';

if(isset($_POST['editpelanggan'])) editpelanggan($_POST);









// FUNCTION OON

function editpelanggan($data) {
    global $conn;
    $id     = htmlspecialchars($data['idmember']);
    $nama   = htmlspecialchars($data['namamember']);
    $nik    = htmlspecialchars($data['nik']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor  = htmlspecialchars($data['nohp']);

    $query  = "UPDATE pelanggan SET nama_member = '$nama', nik = '$nik', alamat = '$alamat', nohp = '$nomor' WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pelanggan.php");
    } else {
        header("Location: ../public/pelanggan.php?err=1");
    }
}