<?php

include '../include/include.php';

if(isset($_POST['getPembeliById'])) getPembeliById($_POST['getPembeliById']);

if(isset($_POST['getPenggunaById'])) getPenggunaById($_POST['getPenggunaById']);

if(isset($_POST['getProdukById'])) getProdukById($_POST['getProdukById']);


function getPembeliById($id) {
    global $conn;

    $query = "SELECT * FROM pembeli WHERE id_member = $id";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    echo json_encode($result);
}

function getPenggunaById($id) {
    global $conn;

    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    echo json_encode($result);
}    

function getProdukById($id) {
    global $conn;

    $query = "SELECT * FROM produk WHERE kode_produk = '$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    echo json_encode($result);
}    