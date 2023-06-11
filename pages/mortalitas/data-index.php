<?php 
include('../../config/koneksi.php');

if ($_SESSION['user']['status_user'] == 'RT') {
    $rt = $_SESSION['user']['rt_user'];
    $rw = $_SESSION['user']['rw_user'];
    $dusun = $_SESSION['user']['dusun'];
  
    // ambil dari database
    $query = "SELECT * FROM mortalitas AS m INNER JOIN warga AS w ON m.id_warga=w.id_warga WHERE w.rt_warga='$rt' AND w.rw_warga='$rw' AND w.dusun='$dusun'";
  } else if ($_SESSION['user']['status_user'] == 'RW') {
    $rw = $_SESSION['user']['rw_user'];
    $dusun = $_SESSION['user']['dusun'];
  
    // ambil dari database
    $query = "SELECT * FROM mortalitas AS m INNER JOIN warga AS w ON m.id_warga=w.id_warga WHERE w.rw_warga='$rw' AND w.dusun='$dusun'";
  } else {
    // ambil dari database
    $query = "SELECT * FROM mortalitas AS m INNER JOIN warga AS w ON m.id_warga=w.id_warga";
  }

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}
