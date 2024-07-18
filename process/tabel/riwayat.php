<?php

include '../../include/include.php';


$query = "SELECT 
            membeli.tgl_transaksi, 
            pembeli.nama_member, 
            beli_detail.kode_produk, 
            produk.nama_produk, 
            beli_detail.jumlah_uang, 
            beli_detail.qty, 
            beli_detail.total_harga,
            beli_detail.id_detail
          FROM 
            membeli
          JOIN 
            pembeli ON membeli.id_member = pembeli.id_member
          JOIN 
            beli_detail ON membeli.id_transaksi = beli_detail.id_transaksi
          JOIN 
            produk ON beli_detail.kode_produk = produk.kode_produk
          ORDER BY 
            membeli.tgl_transaksi DESC";
        

$result = (mysqli_query($conn, $query));

$qty = explode(',', $result['qty']);

$produk = explode(',', $result['kode_produk']);
for ($i = 0; $i < count($produk); $i++) {
    $produk[$i] = "'" . $produk[$i] . "'";
}
$produk = mysqli_fetch_all(mysqli_query($conn, "SELECT nama_produk, harga_jual FROM produk WHERE kode_produk IN (" . implode(',', $produk) . ")"), MYSQLI_ASSOC);

foreach ($result as $riwayat) {
    $data[] = array(
        'num' => 0,
        'tgl_transaksi' => $riwayat['tgl_transaksi'],
        'nama_member' => $riwayat['nama_member'],
        'kode_produk' => $riwayat['kode_produk'],
        'nama_produk' => $riwayat['nama_produk'],
        'jumlah_uang' => $riwayat['jumlah_uang'],
        'qty' => $riwayat['qty'],
        'total_harga' => $riwayat['total_harga'],
        'action' => ' <button class="btn btn-sm btn-danger" onclick="hapus("' . $riwayat['id_detail'] . '")"><i class="icon icon-l cil-trash"></i></button>',
    );
}

echo json_encode($data);