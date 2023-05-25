<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$id_pindah = htmlspecialchars($_POST['id_pindah']);
$id_alamat_pindah = htmlspecialchars($_POST['id_alamat_pindah']);
$alasan = htmlspecialchars($_POST['alasan']);
$alamat = htmlspecialchars($_POST['alamat']);
$desa = htmlspecialchars($_POST['desa']);
$kecamatan = htmlspecialchars($_POST['kecamatan']);
$kota = htmlspecialchars($_POST['kota']);
$provinsi = htmlspecialchars($_POST['provinsi']);
$kodePos = htmlspecialchars($_POST['kodePos']);

$updateAlamatPindah = "UPDATE alamat_pindah SET alamat='$alamat', desa_kelurahan='$desa', kecamatan='$kecamatan', kota_kabupaten='$kota', provinsi='$provinsi', kode_pos='$kodePos' WHERE id_alamat_pindah=$id_alamat_pindah";

$hasil = mysqli_query($db, $updateAlamatPindah);

if ($hasil == true) {
    $updatePindah = "UPDATE pindah SET alasan='$alasan' WHERE id_pindah=$id_pindah";

    $hasil2 = mysqli_query($db, $updatePindah);

    if ($hasil2) {
        echo "<script>window.alert('Update Surat Pindah Berhasil'); window.location.href='../pindah/'</script>";
    } else {
        echo "<script>window.alert('GAGAL! QUERY 1 FAILED.'); window.location.href='edit.php?id=" . $id_pindah . "'</script>";
    }
} else {
    echo "<script>window.alert('GAGAL! QUERY 2 FAILED.'); window.location.href='edit.php?id=" . $id_pindah . "'</script>";
}
