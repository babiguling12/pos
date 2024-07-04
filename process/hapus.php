<?php

include '../include/include.php';

if(isset($_GET['s']) && $_GET['s'] === 'pelanggan') hapuspelanggan($_GET['id']);









// FUNCTION OON

function hapuspelanggan($id) {
    global $conn;

    $query  = "DELETE FROM pelanggan WHERE id_member = $id";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        header("Location: ../public/pelanggan.php");
    } else {
        header("Location: ../public/pelanggan.php?err=1");
    }
}