<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$id = htmlspecialchars($_POST['id']);
$tgl_kematian = htmlspecialchars($_POST['tgl']);
$lokasi_pemakaman = htmlspecialchars($_POST['lokasi']);

$updateMortalitas = "UPDATE mortalitas SET tgl_kematian='$tgl_kematian', lokasi_pemakaman='$lokasi_pemakaman' WHERE id=$id";

$hasil = mysqli_query($db, $updateMortalitas);

if ($hasil == true) {
    echo "<script>window.alert('Update Data Kematian Berhasil'); window.location.href='../mortalitas/'</script>";
} else {
    echo "<script>window.alert('Update Data Kematian Gagal!'); window.location.href='edit.php?id=" . $id . "'</script>";
}