<?php 

include('../../config/koneksi.php');

$id = $_GET['id'];

$getData = "SELECT m.tgl_kematian, m.lokasi_pemakaman, w.nama_warga FROM mortalitas AS m INNER JOIN warga AS w ON m.id_warga = w.id_warga WHERE m.id=$id";

$req = mysqli_query($db, $getData);

$res = [];

while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>