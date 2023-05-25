<?php 
include('../../config/koneksi.php');

$idUser = $_SESSION['user']['id_user'];

if ($idUser !== '1') {
    $query = "SELECT * FROM surat_pengantar AS sp INNER JOIN warga AS w ON sp.id_warga=w.id_warga WHERE sp.id_warga=$idUser";
} else {
    $query = "SELECT * FROM surat_pengantar AS sp INNER JOIN warga AS w ON sp.id_warga=w.id_warga";
}

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}
