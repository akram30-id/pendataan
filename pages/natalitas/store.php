<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$orgtua = htmlspecialchars($_POST['orang_tua']);
$orgtua = explode('-', $orgtua);
$idOrtu = $orgtua[0];

$nama_anak = htmlspecialchars($_POST['nama_anak']);
$jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);

$getParentsId = "SELECT kartu_keluarga.id_kepala_keluarga FROM kartu_keluarga WHERE id_kepala_keluarga='$idOrtu'";

$hasil = mysqli_query($db, $getParentsId);

$idParent = [];

while ($row = mysqli_fetch_assoc($hasil)) {
    $idParent[] = $row;
}

if (count($idParent) > 0) {
    $id = $idParent[0]['id_kepala_keluarga'];

    $insert = "INSERT INTO kelahiran (id, id_warga, nama, jenis_kelamin, tgl_kelahiran) VALUES (NULL, '$id', '$nama_anak', '$jenis_kelamin', '$tgl_lahir')";

    $insertResult = mysqli_query($db, $insert);

    if ($insertResult == true) {
        echo "<script>window.alert('Tambah warga berhasil'); window.location.href='../natalitas/'</script>";
    } else {
        echo "<script>window.alert('Tambah warga gagal!'); window.location.href='create.php'</script>";
    }
} else {
    echo "<script>window.alert('Orang Tua Tidak Ditemukan'); window.location.href='create.php?anak=" . $nama_anak. "&jk=" . $jenis_kelamin . "&tgl=" . $tgl_lahir . "'</script>";
}
