<?php

include '../include/include.php';

if(isset($_GET['s']) && $_GET['s'] === 'pembeli') hapuspembeli($_GET['id']);

if(isset($_GET['s']) && $_GET['s'] === 'pengguna') hapuspengguna($_GET['id']);









// FUNCTION OON

function hapuspembeli($id) {
    global $conn;

    $query  = "DELETE FROM pembeli WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pembeli.php");
    } else {
        header("Location: ../public/pembeli.php?err=1");
    }
}

function hapuspengguna($id) {
    global $conn;

    $query  = "DELETE FROM pengguna WHERE id_pengguna = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pengguna.php");
    } else {
        header("Location: ../public/pengguna.php?err=1");
    }
}