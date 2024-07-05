<?php

include '../include/include.php';

if(isset($_GET['s']) && $_GET['s'] === 'pembeli') hapuspembeli($_GET['id']);









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