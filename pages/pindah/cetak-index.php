<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

// ambil dari database
$query = "SELECT * FROM pindah INNER JOIN alamat_pindah ON pindah.id_alamat_pindah = alamat_pindah.id_alamat_pindah INNER JOIN warga ON pindah.id_warga=warga.id_warga";
$hasil = mysqli_query($db, $query);
$data = [];
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengajuan Surat Pindah WNI</title>

    <style>
        @media print {
            @page {
                size: landscape
            }
        }
    </style>
</head>

<body onload="window.print()">

    <!-- KOP SURAT     -->
    <table style="margin-left: auto; margin-right: 16px; width: 100%; margin-bottom: 32px;">
        <tr>
            <td rowspan="6" align="right" style="width: 15%; vertical-align: center;">
                <br>
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width: 60%;">
            </td>
            <td>
                <h2 style="text-align: center; margin-bottom: -16px;">PEMERINTAH KABUPATEN NIAS UTARA</h2>
            </td>
            <td rowspan="6" align="right" style="width: 15%;">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width: 50%; opacity: 0.0;">
            </td>
        </tr>
        <tr>
            <td>
                <h1 style="text-align: center; margin-bottom: -16px;">KECAMATAN LAHEWA TIMUR</h3>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style="text-align: center; margin-bottom: -16px;">DESA TETEHOSI SOROWI</h2>
            </td>
        </tr>
    </table>

    <hr style="margin-left: 32px; margin-right: 32px; border: 2px solid black; margin-bottom: 32px;">

    <h3 style="text-align: center;">Data Pengajuan Surat Pengantar</h3>
    <hr style="margin-left: 524px; margin-right: 524px; margin-top: -16px; border: 1px solid black; margin-bottom: 32px;">

    <div style="margin-left: 100px; margin-right: 100px;">
        <table border="1" style="margin-left: auto; margin-right: auto; width: 100%;">
            <thead>
                <th>NO</th>
                <th>NAMA WARGA</th>
                <th>NIK</th>
                <th>TUJUAN PINDAH</th>
                <th>ALASAN PINDAH</th>
                <th>WAKTU PENGAJUAN</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $pindah) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pindah['nama_warga'] ?></td>
                        <td><?= $pindah['nik_warga'] ?></td>
                        <td><?= $pindah['alamat'] . ", " . $pindah['desa_kelurahan'] . ", " . $pindah['kecamatan'] . ", " . $pindah['kota_kabupaten'] . ", " . $pindah['provinsi'] . ". " . $pindah['kode_pos'] ?></td>
                        <td><?= $pindah['alasan'] ?></td>
                        <td><?= date('d F Y', strtotime($pindah['created_at'])) ?> PUKUL <?= date('H:i:s', strtotime($pindah['created_at'])) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>