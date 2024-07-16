<?php

include '../include/include.php';

if(isset($_POST['pembeli'])) hapuspembeli($_POST['pembeli']);

if(isset($_GET['s']) && $_GET['s'] === 'pengguna') hapuspengguna($_GET['id']);









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