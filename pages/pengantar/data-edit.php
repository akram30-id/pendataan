<?php 

include('../../config/koneksi.php');

$id = $_GET['id'];

$getData = "SELECT keperluan FROM surat_pengantar WHERE surat_pengantar.id_pengantar=$id";

$req = mysqli_query($db, $getData);

$res = [];

while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>