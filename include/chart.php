<?php
$query_produk = "SELECT COUNT(*) as total_produk FROM produk";
$result_produk = mysqli_fetch_assoc(mysqli_query($conn, $query_produk));
$total_produk = $result_produk['total_produk'];


$query_transaksi = "SELECT COUNT(*) as total_transaksi FROM membeli";
$result_transaksi = mysqli_fetch_assoc(mysqli_query($conn, $query_transaksi));
$total_transaksi = $result_transaksi['total_transaksi'];


$query_pembeli = "SELECT COUNT(*) as total_pembeli FROM pembeli";
$result_pembeli = mysqli_fetch_assoc(mysqli_query($conn, $query_pembeli));
$total_pembeli = $result_pembeli['total_pembeli'];

$query_pendapatan = "SELECT SUM(total_harga) as total_pendapatan FROM beli_detail";
$result_pendapatan = mysqli_fetch_assoc(mysqli_query($conn, $query_pendapatan));
$total_pendapatan = $result_pendapatan['total_pendapatan'];
$total_pendapatan = "Rp " . number_format($total_pendapatan, 0, ',', '.');