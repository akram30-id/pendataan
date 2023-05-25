<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');
include('../../vendor/qrcode/qrlib.php');

$id_warga = htmlspecialchars($_POST['id_warga']);
$alamat = htmlspecialchars($_POST['alamat']);
$desa = htmlspecialchars($_POST['desa']);
$kecamatan = htmlspecialchars($_POST['kecamatan']);
$kota = htmlspecialchars($_POST['kota']);
$provinsi = htmlspecialchars($_POST['provinsi']);
$kodePos = htmlspecialchars($_POST['kodePos']);
$alasan = htmlspecialchars($_POST['alasan']);

$query = "INSERT INTO alamat_pindah (id_alamat_pindah, alamat, desa_kelurahan, kecamatan, kota_kabupaten, provinsi, kode_pos) VALUES (NULL, '$alamat', '$desa', '$kecamatan', '$kota', '$provinsi', '$kodePos');";

$hasil = mysqli_query($db, $query);

if ($hasil === true) {
    $idAlamatPindah = mysqli_insert_id($db);

    if ($_SESSION['user']['status_user'] == 'Admin') {
        $kadesEncrypted = md5('$finger!_KADES-TETEHOSI-SOROWI_!print$');

        $storage = '../../assets/img/fingerprint/kades/';

        if (!file_exists($storage)) {
            mkdir($storage);
        }

        QRcode::png($kadesEncrypted, $storage . $kadesEncrypted . ".png", QR_ECLEVEL_L, 10, 5);

        $query2 = "INSERT INTO pindah (id_pindah, id_warga, id_alamat_pindah, alasan, ttd_kades) VALUES (NULL, '$id_warga', '$idAlamatPindah', '$alasan', '$kadesEncrypted')";
    } else {
        $query2 = "INSERT INTO pindah (id_pindah, id_warga, id_alamat_pindah, alasan, ttd_kades) VALUES (NULL, '$id_warga', '$idAlamatPindah', '$alasan', NULL)";
    }

    $hasil2 = mysqli_query($db, $query2);

    if ($hasil2) {
        echo "<script>window.alert('Surat Keterangan Pindah Berhasil Dibuat'); window.location.href='../pindah/'</script>";
    } else {
        echo "<script>window.alert('GAGAL. QUERY 2 FAILED'); window.location.href='../pindah/create.php'</script>";
    }
} else {
    echo "<script>window.alert('GAGAL. QUERY 1 FAILED'); window.location.href='../pindah/create.php'</script>";
}
