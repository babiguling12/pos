<?php

include '../../include/include.php';


$query = "SELECT * FROM produk";
$result = (mysqli_query($conn, $query));

foreach ($result as $produk) {
    $data[] = array(
        'num' => 0,
        'kode_produk' => $produk['kode_produk'],
        'nama_produk' => $produk['nama_produk'],
        'satuan' => $produk['satuan'],
        'harga_jual' => $produk['harga_jual'],
        'action' => '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal" onclick="edit(' . "'" . $produk["kode_produk"] . "'" . ')"><i class="icon icon-l cil-pencil"></i></button> 
        <button class="btn btn-sm btn-danger" onclick="hapus("' . $produk['kode_produk'] . '")"><i class="icon icon-l cil-trash"></i></button>',
    );
}

echo json_encode($data);