<?php
include('../../config/koneksi.php');

if (isset($_SESSION['user']['nik_user'])) {
    $nik = $_SESSION['user']['nik_user'];

    $query = "SELECT * FROM sktm AS s INNER JOIN warga AS w ON s.id_warga=w.id_warga WHERE w.nik_warga='$nik'";
} else {
    $query = "SELECT * FROM sktm AS s INNER JOIN warga AS w ON s.id_warga=w.id_warga";
}

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}