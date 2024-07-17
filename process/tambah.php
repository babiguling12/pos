<?php

include '../include/include.php';


if(isset($_POST['pembeli'])) tambahpembeli($_POST);

if(isset($_POST['pengguna'])) tambahpengguna($_POST);

if(isset($_POST['produk'])) tambahproduk($_POST);

if(isset($_POST['transaksi'])) tambahtransaksi($_POST);







// FUNCTION OON

function tambahpembeli($data) {
    global $conn;
    $nama   = htmlspecialchars($data['namamember']);
    $nik    = htmlspecialchars($data['nik']);
    $alamat = htmlspecialchars($data['alamat']);
    $nomor  = htmlspecialchars($data['nohp']);

    $query  = "INSERT INTO pembeli VALUES (NULL, '$nama', '$nik', '$alamat', '$nomor')";
    
    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}

function tambahpengguna($data) {
    global $conn;

    $username = htmlspecialchars($data['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nama = htmlspecialchars($data['nama_pengguna']);
    $jabatan  = htmlspecialchars($data['jabatan']);
    $nohp = htmlspecialchars($data['nohp_pengguna']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query  = "INSERT INTO pengguna VALUES (NULL, '$username', '$password', '$nama', '$jabatan', '$nohp')";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}

function tambahproduk($data) {
    global $conn;

    $kodeproduk = htmlspecialchars($data['kode_produk']);
    $namaproduk = htmlspecialchars($data['nama_produk']);
    $satuan = htmlspecialchars($data['satuan']);
    $hargajual  = htmlspecialchars($data['harga_jual']);
    

    $query  = "INSERT INTO produk VALUES ('$kodeproduk', '$namaproduk', '$satuan', '$hargajual')";

    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode('success');
    }
}


function tambahtransaksi($data) {
    global $conn;
    $username = $_SESSION['username'];

    $qty = implode(',', $data['qty']);
    $barcode = implode(',', $data['barcode']);
    $data['idpembeli'] ? $idpembeli = $data['idpembeli'] : $idpembeli = 0;
    $idpengguna = implode('', mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_pengguna FROM pengguna WHERE user_name = '$username'")));
    $jumlahuang = $data['jumlahuang'];
    $total = $data['total'];


    $query = "INSERT INTO membeli VALUES (NULL, CURRENT_TIMESTAMP, $idpengguna, $idpembeli)";
    mysqli_query($conn, $query);
    $idtransaksi = mysqli_insert_id($conn);

    $query = "INSERT INTO beli_detail VALUES (NULL, $idtransaksi, '$barcode', $jumlahuang, '$qty', $total)";
    mysqli_query($conn, $query);

    if(!mysqli_errno($conn)) {
        echo json_encode($idtransaksi);
    }
}