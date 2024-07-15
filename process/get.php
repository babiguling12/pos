<?php

include '../include/include.php';

if(isset($_POST['getPembeliById'])) getPembeliById($_POST);


function getPembeliById() {
    global $conn;

    $id = $_POST['getPembeliById'];
    $query = "SELECT * FROM pembeli WHERE id_member = $id";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    echo json_encode($result);
}    