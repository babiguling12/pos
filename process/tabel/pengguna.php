<?php

include '../../include/include.php';


$query = "SELECT * FROM pengguna";
$result = (mysqli_query($conn, $query));

foreach ($result as $pengguna) {
    $data[] = array(
        'num' => 0,
        'nama_pengguna' => $pengguna['nama_pengguna'],
        'jabatan' => $pengguna['jabatan'],
        'nohp_pengguna' => $pengguna['nohp_pengguna'],
        'action' => '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal" onclick="edit( ' . $pengguna['id_pengguna'] . ' )"><i class="icon icon-l cil-pencil"></i></button> 
        <button class="btn btn-sm btn-danger" onclick="hapus(' . $pengguna['id_pengguna'] . ')"><i class="icon icon-l cil-trash"></i></button>',
    );
}

echo json_encode($data);