<?php 
include('../../config/koneksi.php');

if (isset($_SESSION['user']['rt_user'])) {
    $rt = $_SESSION['user']['rt_user'];
    $dusun = $_SESSION['user']['dusun'];
}

if (isset($_SESSION['user']['rw_user'])) {
    $rw = $_SESSION['user']['rw_user'];
    $dusun = $_SESSION['user']['dusun'];
}

$query = "SELECT * FROM surat_pengantar AS sp INNER JOIN warga AS w ON sp.id_warga=w.id_warga WHERE w.rt_warga='$rt' AND w.rw_warga='$rw' AND w.dusun='$dusun'";

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>