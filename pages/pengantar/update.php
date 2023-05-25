<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$id_pengantar = htmlspecialchars($_POST['id_pengantar']);
$keperluan = htmlspecialchars($_POST['keperluan']);

$updatePengantar = "UPDATE surat_pengantar SET keperluan='$keperluan' WHERE id_pengantar=$id_pengantar";

$hasil = mysqli_query($db, $updatePengantar);

if ($hasil == true) {
    echo "<script>window.alert('Update Surat Pengantar Berhasil'); window.location.href='../pengantar/'</script>";
} else {
    echo "<script>window.alert('GAGAL!'); window.location.href='edit.php?id=" . $id_pengantar . "'</script>";
}