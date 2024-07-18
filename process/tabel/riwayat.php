<?php

include '../../include/include.php';


$query = "SELECT 
            membeli.id_transaksi,
            membeli.tgl_transaksi, 
            pembeli.nama_member, 
            pengguna.nama_pengguna, 
            beli_detail.kode_produk, 
            beli_detail.jumlah_uang, 
            beli_detail.qty,
            beli_detail.total_harga
          FROM 
            membeli
          LEFT JOIN 
            pembeli ON membeli.id_member = pembeli.id_member
          INNER JOIN 
            pengguna ON membeli.id_pengguna = pengguna.id_pengguna
          INNER JOIN 
            beli_detail ON membeli.id_transaksi = beli_detail.id_transaksi
          ORDER BY 
            membeli.tgl_transaksi DESC";


$result = (mysqli_query($conn, $query));


foreach ($result as $riwayat) {
  $kode_produk = explode(',', $riwayat['kode_produk']);
  for ($i = 0; $i < count($kode_produk); $i++) {
    $kode_produk[$i] = "'" . $kode_produk[$i] . "'";
  }
  $query = "SELECT nama_produk FROM produk WHERE kode_produk IN (" . implode(',', $kode_produk) . ")";

  $nama_produk = mysqli_query($conn, $query);

  $qty = explode(",", $riwayat['qty']);

  $i = 0;
  $produk = [];
  foreach ($nama_produk as $np) {
    $produk[$i] = '<tr>
                  <td>' . $np['nama_produk'] . '</td>
                  <td align="right">(' . $qty[$i++] . ')</td>
                 </tr>';
  }

  $data[] = array(
    'num' => 0,
    'tgl_transaksi' => $riwayat['tgl_transaksi'],
    'nama_member' => $riwayat['nama_member'] == NULL ? 'Not Member' : $riwayat['nama_member'],
    'produk' => '<table width="100%">' . implode($produk) . '</table>',
    'jumlah_uang' => 'Rp ' . number_format($riwayat['jumlah_uang'], 0, ',', '.'),
    'total_harga' => 'Rp ' . number_format($riwayat['total_harga'], 0, ',', '.'),
    'kasir' => $riwayat['nama_pengguna'],
    'action' => '<button class="btn btn-sm btn-danger" onclick="hapus(' ."'". $riwayat['id_transaksi'] ."'". ')"><i class="icon icon-l cil-trash"></i></button>
                 <a class="btn btn-sm btn-info" href="print.php?id=' . $riwayat['id_transaksi'] . '""><i class="icon icon-l cil-print"></i></a>',
  );
}

echo json_encode($data);