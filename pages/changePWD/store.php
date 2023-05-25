<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');
include('../../vendor/qrcode/qrlib.php');

$id_warga = $_GET['id'];
$tahunLahir = $_GET['thn'];

$noSurat = '01/' . date('m') . '/' . date('Y') . '/TS/' . $tahunLahir;

$query = "INSERT INTO sktm (id_sktm, id_warga, no_surat) VALUES (NULL, '$id_warga', '$noSurat');";

$hasil = mysqli_query($db, $query);

if ($hasil) {

    echo "<script>window.alert('Surat Keterangan Keterangan Tidak Mampu Berhasil Dibuat'); window.location.href='../sktm/'</script>";
} else {
    echo "<script>window.alert('GAGAL. Ada Kesalahan.'); window.location.href='../sktm/'</script>";
}
