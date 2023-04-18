<?php 

include('../../config/koneksi.php');

// get data from db
$query = "SELECT * FROM kelahiran AS k INNER JOIN warga AS w ON k.id_warga=w.id_warga";

$hasil = mysqli_query($db, $query);

$data_kelahiran = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kelahiran[] = $row;
}
