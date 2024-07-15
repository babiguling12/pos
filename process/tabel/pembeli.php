<?php

include '../../include/include.php';


$query = "SELECT * FROM pembeli";
$result = (mysqli_query($conn, $query));

foreach ($result as $pembeli) {
    $data[] = array(
        'num' => 0,
        'nama_member' => $pembeli['nama_member'],
        'nik' => $pembeli['nik'],
        'alamat' => $pembeli['alamat'],
        'nohp' => $pembeli['nohp'],
        'action' => '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal" onclick="edit( ' . $pembeli['id_member'] . ' )"><i class="icon icon-l cil-pencil"></i></button> 
        <button class="btn btn-sm btn-danger" onclick="hapus(' . $pembeli['id_member'] . ')"><i class="icon icon-l cil-trash"></i></button>',
    );
}

echo json_encode($data);