<?php

include('../../config/koneksi.php');
include('../../vendor/qrcode/qrlib.php');

$idPengantar = $_GET['id'];
$role = $_GET['role'];
$rt = $_GET['rt'];
$rw = $_GET['rw'];

if ($role === 'RT') {
    $rtEncrypted = md5('$finger!_' . $rt . '_!print$');
    $query = "UPDATE surat_pengantar SET ttd_rt='$rtEncrypted' WHERE id_pengantar='$idPengantar'";

    try {
        $storage = '../../assets/img/fingerprint/rt/';

        if (!file_exists($storage)) {
            mkdir($storage);
        }

        QRcode::png($rtEncrypted, $storage . $rtEncrypted . ".png", QR_ECLEVEL_L, 10, 5);

        $request = mysqli_query($db, $query);

        if ($request) {
            echo "<script>window.alert('Update Surat Pengantar Diapprove'); window.location.href='../pengantar/'</script>";
        } else {
            echo "<script>window.alert('Ada kesalahan); window.location.href='../pengantar/'</script>";
        }
    } catch (\Throwable $th) {
        echo "<script>console.info(" . strval($th) . ");</script>";
    }
}

if ($role === 'RW') {
    $rtEncrypted = md5('$finger!_' . $rw . '_!print$');
    $query = "UPDATE surat_pengantar SET ttd_rw='$rtEncrypted' WHERE id_pengantar='$idPengantar'";

    try {
        $storage = '../../assets/img/fingerprint/rw/';

        if (!file_exists($storage)) {
            mkdir($storage);
        }

        QRcode::png($rtEncrypted, $storage . $rtEncrypted . ".png", QR_ECLEVEL_L, 10, 5);

        $request = mysqli_query($db, $query);

        if ($request) {
            echo "<script>window.alert('Update Surat Pengantar Diapprove'); window.location.href='../pengantar/'</script>";
        } else {
            echo "<script>window.alert('Ada kesalahan); window.location.href='../pengantar/'</script>";
        }
    } catch (\Throwable $th) {
        echo "<script>console.info(" . strval($th) . ");</script>";
    }
}
