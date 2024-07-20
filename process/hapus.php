<?php

include '../include/include.php';

if(isset($_POST['pembeli'])) hapuspembeli($_POST['pembeli']);

if(isset($_POST['pengguna'])) hapuspengguna($_POST['pengguna']);

if(isset($_POST['produk'])) hapusproduk($_POST['produk']);

if(isset($_POST['riwayat'])) hapusriwayat($_POST['riwayat']);









// FUNCTION OON

function hapuspembeli($id) {
    global $conn;

    $query  = "DELETE FROM pembeli WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}

function hapuspengguna($id) {
    global $conn;

    $query  = "DELETE FROM pengguna WHERE id_pengguna = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}

function hapusproduk($id) {
    global $conn;

    $query  = "DELETE FROM produk WHERE kode_produk = '$id'";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}

function hapusriwayat($id) {
    global $conn;

    $query  = "DELETE FROM riwayat WHERE id_detail = $id";

    mysqli_query($conn, $query);

        if(!mysqli_errno($conn)) {
            echo json_encode('success');
        }
    }


