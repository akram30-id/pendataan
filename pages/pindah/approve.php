<?php

include('../../config/koneksi.php');
include('../../vendor/qrcode/qrlib.php');

$idPindah = $_GET['id'];

$kadesEncrypted = md5('$finger!_KADES-TETEHOSI-SOROWI_!print$');

$query = "UPDATE pindah SET ttd_kades='$kadesEncrypted' WHERE id_pindah='$idPindah'";

try {
    $storage = '../../assets/img/fingerprint/kades/';

    if (!file_exists($storage)) {
        mkdir($storage);
    }

    QRcode::png($kadesEncrypted, $storage . $kadesEncrypted . ".png", QR_ECLEVEL_L, 10, 5);

    $request = mysqli_query($db, $query);

    if ($request) {
        echo "<script>window.alert('Surat Keterangan Pindah Diapprove'); window.location.href='../pindah/'</script>";
    } else {
        echo "<script>window.alert('Ada kesalahan); window.location.href='../pindah/'</script>";
    }
} catch (\Throwable $th) {
    echo "<script>console.info(" . strval($th) . ");</script>";
}
