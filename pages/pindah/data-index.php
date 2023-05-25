<?php
include('../../config/koneksi.php');

if (isset($_SESSION['user']['nik_user'])) {
    $nik = $_SESSION['user']['nik_user'];

    $query = "SELECT * FROM pindah AS p INNER JOIN alamat_pindah AS ap ON p.id_alamat_pindah=ap.id_alamat_pindah INNER JOIN warga AS w ON p.id_warga=w.id_warga WHERE w.nik_warga='$nik'";
} else {
    $query = "SELECT * FROM pindah AS p INNER JOIN alamat_pindah AS ap ON p.id_alamat_pindah=ap.id_alamat_pindah INNER JOIN warga AS w ON p.id_warga=w.id_warga";
}

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}
