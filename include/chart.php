<?php
$query_produk = "SELECT COUNT(*) as total_produk FROM produk";
$result_produk = mysqli_query($conn, $query_produk);
$record_produk = mysqli_fetch_assoc($result_produk);
$total_produk = $record_produk['total_produk'];


$query_transaksi = "SELECT COUNT(*) as total_transaksi FROM membeli";
$result_transaksi = mysqli_query($conn, $query_transaksi);
$record_transaksi = mysqli_fetch_assoc($result_transaksi);
$total_transaksi = $record_transaksi['total_transaksi'];


$query_pembeli = "SELECT COUNT(*) as total_pembeli FROM pembeli";
$result_pembeli = mysqli_query($conn, $query_pembeli);
$record_pembeli = mysqli_fetch_assoc($result_pembeli);
$total_pembeli = $record_pembeli['total_pembeli'];

$query_pendapatan = "SELECT SUM(total_harga) as total_pendapatan FROM beli_detail";
$result_pendapatan = mysqli_query($conn, $query_pendapatan);
$record_pendapatan = mysqli_fetch_assoc($result_pendapatan);
$total_pendapatan = $record_pendapatan['total_pendapatan'];
$total_pendapatan = "Rp " . number_format($total_pendapatan, 0, ',', '.');