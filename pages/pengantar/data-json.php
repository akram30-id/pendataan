<?php

include('../../config/koneksi.php');

// get data from db
$query = "SELECT warga.nama_warga, warga.id_warga FROM warga WHERE warga.is_alive=1";

$hasil = mysqli_query($db, $query);

$data_kelahiran = array();

$data_parse = [];

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kelahiran[] = $row;
}

foreach ($data_kelahiran as $data) {
  array_push($data_parse, $data['id_warga']. '-' . $data['nama_warga']);
}

header('Content-Type: Application/json');
echo json_encode($data_parse);
