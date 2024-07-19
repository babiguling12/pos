<?php
$query_produk = "SELECT COUNT(*) as total_produk FROM produk";
$result_produk = mysqli_fetch_assoc(mysqli_query($conn, $query_produk));
$total_produk = $result_produk['total_produk'];


$query_transaksi = "SELECT COUNT(*) as total_transaksi FROM membeli";
$result_transaksi = mysqli_fetch_assoc(mysqli_query($conn, $query_transaksi));
$total_transaksi = $result_transaksi['total_transaksi'];

$bulan = [date('Y-m-01'), date('Y-m-t')];
$query_bulanan = "SELECT SUM(total_harga) as total_pendapatan FROM beli_detail JOIN membeli ON beli_detail.id_transaksi = membeli.id_transaksi WHERE membeli.tgl_transaksi BETWEEN '$bulan[0]' AND '$bulan[1]'";
$result_bulanan = mysqli_fetch_assoc(mysqli_query($conn, $query_bulanan));
$pendapatan_bulanan = $result_bulanan['total_pendapatan'];
$pendapatan_bulanan = "Rp " . number_format($pendapatan_bulanan, 0, ',', '.');

$query_pendapatan = "SELECT SUM(total_harga) as total_pendapatan FROM beli_detail";
$result_pendapatan = mysqli_fetch_assoc(mysqli_query($conn, $query_pendapatan));
$total_pendapatan = $result_pendapatan['total_pendapatan'];
$total_pendapatan = "Rp " . number_format($total_pendapatan, 0, ',', '.');