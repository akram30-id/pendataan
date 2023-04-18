<?php

include('../../config/koneksi.php');

$id = htmlspecialchars($_GET['id']);

try {
    $delete = "DELETE FROM mortalitas WHERE id_warga=$id";
    $deleteResult = mysqli_query($db, $delete);

    if ($deleteResult) {
        $update = "UPDATE warga SET is_alive=1 WHERE id_warga=$id";
        $updateResult = mysqli_query($db, $update);

        if ($updateResult) {
            echo "<script>window.alert('Hapus Data Kematian Berhasil'); window.location.href='../mortalitas/'</script>";
        } else {
            echo "<script>window.alert('Server Error!'); window.location.href='../mortalitas/'</script>";
        }
    } else {
        echo "<script>window.alert('Gagal!'); window.location.href='../mortalitas/'</script>";
    }
} catch (\Throwable $th) {
    echo "<script>console.info(" . $th . ")</script>";
}
