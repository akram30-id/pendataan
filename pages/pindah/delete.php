<?php

include('../../config/koneksi.php');

$id = htmlspecialchars($_GET['id']);

try {
    $delete = "DELETE FROM pindah WHERE id_pindah=$id";

    $deleteResult = mysqli_query($db, $delete);

    if ($deleteResult) {
        echo "<script>window.alert('Hapus Surat Keterangan Pindah Berhasil'); window.location.href='../pindah/'</script>";
    } else {
        echo "<script>window.alert('Gagal!'); window.location.href='../pindah/'</script>";
    }
} catch (\Throwable $th) {
    echo "<script>console.info(" . $th . ")</script>";
}
