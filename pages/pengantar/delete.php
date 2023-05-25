<?php

include('../../config/koneksi.php');

$id = htmlspecialchars($_GET['id']);

try {
    $delete = "DELETE FROM surat_pengantar WHERE id_pengantar=$id";
    $deleteResult = mysqli_query($db, $delete);

    if ($deleteResult) {
        echo "<script>window.alert('Hapus Pengajuan Surat Pengantar Berhasil'); window.location.href='../pengantar/'</script>";
    } else {
        echo "<script>window.alert('Gagal!'); window.location.href='../pengantar/'</script>";
    }
} catch (\Throwable $th) {
    echo "<script>console.info(" . $th . ")</script>";
}
