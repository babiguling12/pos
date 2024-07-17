<?php

include '../include/include.php';

if (isset($_POST['getTransaksiBulanIni'])) getTransaksiBulanIni();






function getTransaksiBulanIni()
{
    global $conn;

    $bulan = [date('Y-m-01'), date('Y-m-t')];

    $query = "SELECT tgl_transaksi FROM membeli WHERE tgl_transaksi BETWEEN '$bulan[0]' AND '$bulan[1]'";
    $result = mysqli_query($conn, $query);
    for ($i = 1; $i <= date('t'); $i++) {
        $data['bulanini'][$i] = 0;
    }
    foreach ($result as $res) {
        $tanggal = explode(' ', $res['tgl_transaksi']);
        $tanggal = explode('-', $tanggal[0]);
        $tanggal = (int)$tanggal[2];
        for ($i = 1; $i <= date('t'); $i++) {
            if ($tanggal === $i) {
                $data['bulanini'][$i]++;
            }
        }
    }

    $bulan = [date('Y-m-01', strtotime(' -1 months')), date('Y-m-t', strtotime(' -1 months'))];

    $query = "SELECT tgl_transaksi FROM membeli WHERE tgl_transaksi BETWEEN '$bulan[0]' AND '$bulan[1]'";
    $result = mysqli_query($conn, $query);
    for ($i = 1; $i <= date('t', strtotime(' -1 months')); $i++) {
        $data['bulanlalu'][$i] = 0;
    }
    foreach ($result as $res) {
        $tanggal = explode(' ', $res['tgl_transaksi']);
        $tanggal = explode('-', $tanggal[0]);
        $tanggal = (int)$tanggal[2];
        for ($i = 1; $i <= date('t', strtotime(' -1 months')); $i++) {
            if ($tanggal === $i) {
                $data['bulanlalu'][$i]++;
            }
        }
    }

    echo json_encode($data);
}
