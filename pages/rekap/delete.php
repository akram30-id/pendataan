<?php

include('../../config/koneksi.php');

$id = htmlspecialchars($_GET['id']);

try {
    $delete = "DELETE FROM sktm WHERE id_sktm=$id";

    $deleteResult = mysqli_query($db, $delete);

    if ($deleteResult) {
        echo "<script>window.alert('Hapus SKTM Berhasil'); window.location.href='../sktm/'</script>";
    } else {
        echo "<script>window.alert('Gagal!'); window.location.href='../sktm/'</script>";
    }
} catch (\Throwable $th) {
    echo "<script>console.info(" . $th . ")</script>";
}
