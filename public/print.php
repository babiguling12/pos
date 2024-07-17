<?php
include '../include/include.php';
$id_transaksi = isset($_GET['id']) ? (int)$_GET['id'] : 26;

$result = mysqli_query($conn, "SELECT membeli.tgl_transaksi, membeli.id_pengguna, beli_detail.kode_produk, beli_detail.jumlah_uang, beli_detail.qty, beli_detail.total_harga  FROM `membeli` INNER JOIN `beli_detail` ON `membeli`.`id_transaksi` = `beli_detail`.`id_transaksi` WHERE `membeli`.`id_transaksi` = $id_transaksi");
$data = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 0) {
    echo 'no data';
    exit;
}

$kasir = $data['id_pengguna'];
$kasir = mysqli_fetch_assoc(mysqli_query($conn, "SELECT user_name FROM pengguna WHERE id_pengguna = $kasir"));

$qty = explode(',', $data['qty']);

$produk = explode(',', $data['kode_produk']);
for ($i = 0; $i < count($produk); $i++) {
    $produk[$i] = "'" . $produk[$i] . "'";
}
$produk = mysqli_fetch_all(mysqli_query($conn, "SELECT nama_produk, harga_jual FROM produk WHERE kode_produk IN (" . implode(',', $produk) . ")"), MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print</title>
</head>

<body>
    <div style="width: 400px; margin: auto" id="print">
        <center>
            <h4>NAMATOKO</h4>
        </center>
        <br><br>
        <table width="100%">
            <tr>
                <td><?= date('d.m.y H:i', strtotime($data['tgl_transaksi'])) ?></td>
                <td align="right"><?= $kasir['user_name'] ?></td>
            </tr>
        </table>
        <hr style="border-top: 1px dashed">
        <table width="100%">
            <?php $i = 0; foreach ($produk as $p) : ?>
            <tr>
                <td><?= $p['nama_produk'] ?></td>
                <td><?= $qty[$i] ?></td>
                <td align="right"><?= number_format(($qty[$i++] * $p['harga_jual']), 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div style="width: 50%; margin-left: auto;">

            <hr style="border-top: 1px dashed;">

            <table width="100%">
                <tr>
                    <td width="110" align="right">HARGA JUAL :</td>
                    <td align="right"><?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                </tr>
            </table>

            <hr style="border-top: 1px dashed;">

            <table width="100%">
                <tr>
                    <td width="110" align="right">TOTAL :</td>
                    <td align="right"><?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td width="110" align="right">TUNAI :</td>
                    <td align="right"><?= number_format($data['jumlah_uang'], 0, ',', '.') ?></td>
                </tr>
            </table>

            <?php if($data['jumlah_uang'] - $data['total_harga'] != 0) { ?>
            <table width="100%">
                <tr>
                    <td width="110" align="right">KEMBALI :</td>
                    <td align="right"><?= number_format($data['jumlah_uang'] - $data['total_harga'], 0, ',', '.') ?></td>
                </tr>
            </table>
            <?php } ?>

        </div>

        <br><br>

        <center>
            === TERIMA KASIH ===
        </center>

    </div>


    <script>
        window.print()
    </script>

</body>

</html>