<?php

include('../../config/koneksi.php');

// get data from db
$query = "SELECT warga.nama_warga, warga.id_warga FROM warga INNER JOIN kartu_keluarga ON kartu_keluarga.id_kepala_keluarga = warga.id_warga";

$hasil = mysqli_query($db, $query);

$data_kelahiran = array();

$data_parse = [];

while ($row = mysqli_fetch_assoc($hasil)) {
  // $data_kelahiran['success'] = TRUE;
  // $data_kelahiran['message'] = 'Data Found';
  // $data_kelahiran['data'] = $row['id_warga'];
  // $data_kelahiran['data'] = $row['nik_warga'];
  $data_kelahiran[] = $row;
}

foreach ($data_kelahiran as $data) {
  array_push($data_parse, $data['id_warga']. '-' . $data['nama_warga']);
}

header('Content-Type: Application/json');
echo json_encode($data_parse);
