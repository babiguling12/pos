<?php
include '../include/database.php';

function produkByID() {
    global $conn;
    $data = (mysqli_query($conn, "SELECT * FROM produk"));
    return $data;
}