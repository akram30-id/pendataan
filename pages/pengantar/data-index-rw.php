<?php 
include('../../config/koneksi.php');

if (isset($_SESSION['user']['rw_user'])) {
    $rw = $_SESSION['user']['rw_user'];
}

$query = "SELECT * FROM surat_pengantar AS sp INNER JOIN warga AS w ON sp.id_warga=w.id_warga WHERE w.rw_warga='$rw'";

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>