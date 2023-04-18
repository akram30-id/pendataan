<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$nama = htmlspecialchars($_POST['nama']);
$nama = explode('-', $nama);
$idWarga = $nama[0];

$tgl_kematian = htmlspecialchars($_POST['tgl']);
$lokasi_pemakaman = htmlspecialchars($_POST['lokasi']);

$getWargaId = "SELECT warga.id_warga FROM warga WHERE id_warga='$idWarga'";

$hasil = mysqli_query($db, $getWargaId);

$idResident = [];

while ($row = mysqli_fetch_assoc($hasil)) {
    $idResident[] = $row;
}

if (count($idResident) > 0) {
    $id = $idResident[0]['id_warga'];

    $insert = "INSERT INTO mortalitas (id, id_warga, tgl_kematian, lokasi_pemakaman) VALUES (NULL, '$id', '$tgl_kematian', '$lokasi_pemakaman')";

    $insertResult = mysqli_query($db, $insert);

    if ($insertResult == true) {
        $update = "UPDATE warga SET warga.is_alive=0 WHERE id_warga=$id";

        $updateResult = mysqli_query($db, $update);

        if ($updateResult == true) {
            echo "<script>window.alert('Tambah Data Kematian Berhasil'); window.location.href='../mortalitas/'</script>";
        } else {
            echo "<script>window.alert('Tambah Data Kematian Gagal!'); window.location.href='create.php?tgl=" . $tgl_kematian . "&lokasi=" . $lokasi_pemakaman . "'</script>";
        }
    } else {
        echo "<script>window.alert('Tambah Data Kematian Gagal!'); window.location.href='create.php?tgl=" . $tgl_kematian . "&lokasi=" . $lokasi_pemakaman . "'</script>";
    }
} else {
    echo "<script>window.alert('Warga " . $nama[1] . " Tidak Ditemukan'); window.location.href='create.php?tgl=" . $tgl_kematian . "&lokasi=" . $lokasi_pemakaman . "'</script>";
}
