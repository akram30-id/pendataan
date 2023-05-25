<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$keperluan = htmlspecialchars($_POST['keperluan']);
$id_warga = htmlspecialchars($_POST['id_warga']);

$query = "INSERT INTO surat_pengantar (id_pengantar, id_warga, nomor_surat, keperluan, ttd_rt, ttd_rw) VALUES (NULL, '$id_warga', 'P/01/SP./" . date('j-s') .  date('m') . date('Y') . "', '$keperluan', NULL, NULL)";

$hasil = mysqli_query($db, $query);

if ($hasil === true) {
    echo "<script>window.alert('Surat Pengantar Berhasil Diajukan'); window.location.href='../pengantar/'</script>";
} else {
    echo "<script>window.alert('GAGAL'); window.location.href='../pengantar/create.php'</script>";
}