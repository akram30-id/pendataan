<?php 
include('../../config/koneksi.php');

$query = "SELECT * FROM mortalitas AS m INNER JOIN warga AS w ON m.id_warga=w.id_warga";

$req = mysqli_query($db, $query);

$res = [];
while ($row = mysqli_fetch_assoc($req)) {
    $res[] = $row;
}

?>