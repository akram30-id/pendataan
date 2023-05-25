<?php

session_start();
if (!isset($_SESSION['user'])) {
    // jika user belum login
    header('Location: ../login');
    exit();
}

include('../../config/koneksi.php');

$oldPassword = md5(htmlspecialchars($_POST['oldPassword']));
$newPassword = htmlspecialchars($_POST['newPassword']);
$confirmNewPassword = htmlspecialchars($_POST['confirmNewPassword']);

$nik = $_SESSION['user']['nik_user'];

$isOldPwdvalid = "SELECT * FROM warga WHERE nik_warga='$nik' AND password='$oldPassword'";

$hasil = mysqli_query($db, $isOldPwdvalid);

if ($hasil->num_rows > 0) {
    if ($newPassword == $confirmNewPassword) {
        $newPWD = md5($newPassword);

        $updatePassword = "UPDATE warga SET password='$newPWD' WHERE nik_warga=$nik";

        $hasil2 = mysqli_query($db, $updatePassword);

        if ($hasil2) {
            echo "<script>window.alert('Update Password Berhasil'); window.location.href='../changePWD/'</script>";
        } else {
            echo "<script>window.alert('GAGAL!'); window.location.href='../changePWD/'</script>";
        }
    } else {
        echo "<script>window.alert('Password Baru dan Konfirmasi Password Tidak Sama!'); window.location.href='../changePWD/'</script>";
    }
} else {
    echo "<script>window.alert('Password Lama Salah.'); window.location.href='../changePWD/'</script>";
}
