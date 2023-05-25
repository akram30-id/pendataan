<?php 

include('../../config/koneksi.php');

$id = $_GET['id'];

$getData = "SELECT * FROM pindah INNER JOIN alamat_pindah ON pindah.id_alamat_pindah=alamat_pindah.id_alamat_pindah WHERE id_pindah='$id'";

$req = mysqli_query($db, $getData);

$res = [];

while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>