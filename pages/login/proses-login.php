<?php
session_start();
include('../../config/koneksi.php');

// ambil data
$username_user = htmlspecialchars($_POST['username_user']);
$password_user = md5(htmlspecialchars($_POST['password_user']));

// periksa username dan password
$query = "SELECT * FROM user WHERE username_user = '$username_user' and password_user = '$password_user'";
$queryWarga = "SELECT * FROM warga WHERE nik_warga='$username_user' AND password='$password_user'";

$hasil = mysqli_query($db, $query);
$hasilWarga = mysqli_query($db, $queryWarga);

$data_user = mysqli_fetch_assoc($hasil);
$data_warga = mysqli_fetch_assoc($hasilWarga);

// cek
if ($data_user != null) {
  // jika user dan password cocok
  $_SESSION['user'] = $data_user;
  header('Location: ../dasbor');
} else if ($data_warga != null) {
  $_SESSION['user']['id_user'] = $data_warga['id_warga'];
  $_SESSION['user']['nama_user'] = $data_warga['nama_warga'];
  $_SESSION['user']['nik_user'] = $data_warga['nik_warga'];
  $_SESSION['user']['tgl_lahir_user'] = $data_warga['tanggal_lahir_warga'];
  $_SESSION['user']['status_user'] = 'Warga';
  header('Location: ../dasbor');
} else {
  // jika user dan password tidak cocok
  echo "<script>window.alert('Username atau password salah'); window.location.href='../login'</script>";
}
