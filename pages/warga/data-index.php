<?php
include('../../config/koneksi.php');


if ($_SESSION['user']['status_user'] == 'RT') {
  $rt = $_SESSION['user']['rt_user'];
  $rw = $_SESSION['user']['rw_user'];

  // ambil dari database
  $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga WHERE rt_warga='$rt' AND rw_warga='$rw'";
} else if ($_SESSION['user']['status_user'] == 'RW') {
  $rw = $_SESSION['user']['rw_user'];

  // ambil dari database
  $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga WHERE rw_warga='$rw'";
} else {
  // ambil dari database
  $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";
}

$hasil = mysqli_query($db, $query);

$data_warga = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_warga[] = $row;
}
