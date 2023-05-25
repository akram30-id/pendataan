<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

require_once("../../vendor/qrcode/qrlib.php");

$id = $_GET['id'];

// ambil dari database
$query = "SELECT * FROM pindah AS p INNER JOIN alamat_pindah AS ap ON p.id_alamat_pindah=ap.id_alamat_pindah INNER JOIN warga AS w ON p.id_warga=w.id_warga WHERE p.id_pindah='$id'";

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
    <title>Cetak Pengajuan Surat Keterangan Pindah</title>
</head>

<body onload="window.print()">

    <!-- KOP SURAT -->
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

    <h3 style="text-align: center;">SURAT KETERANGAN PINDAH</h3>
    <hr style="margin-left: 524px; margin-right: 524px; margin-top: -16px; border: 1px solid black;">
    <p style="text-align: center; margin-bottom: 32px;"><b>No. <?= $data[0]['id_pindah'] ?>/SK-PINDAH/<?= date('d-n-Y', strtotime($data[0]['created_at'])) ?></b></p>

    <div style="margin-left: 64px; margin-right: 0px;">

        <table style="margin-bottom: 24px;">
            <tr>
                <td>
                    <h3><b>DATA DAERAH ASAL</b></h3>
                </td>
            </tr>
            <tr style="line-height: 32px;">
                <td>NIK</td>
                <td>:</td>
                <td><?= $data[0]['nik_warga'] ?></td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data[0]['nama_warga'] ?></td>
            </tr>

            <?php $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] ?>

            <tr style="line-height: 32px;">
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data[0]['alamat_warga'] ?></td>
            </tr>
        </table>

        <h3 style="margin-top: 32px;"><b>DATA DAERAH TUJUAN PINDAH</b></h3>
        <table style="margin-bottom: 64px;">
            <tr style="line-height: 32px; margin-right: -32px;">
                <td style="width: 20%;">Alasan Pindah</td>
                <td>: <?= $data[0]['alasan'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Alamat Tujuan Pindah</td>
                <td>: <?= $data[0]['alamat'] ?></td>
            </tr>
            <tr style="line-height: 32px; margin-left: 8px;">
                <td></td>
                <td>
                    a. Desa / Kelurahan: <?= $data[0]['desa_kelurahan'] ?>
                </td>
                <td>
                    c. Kota / Kabupaten: <?= $data[0]['kota_kabupaten'] ?>
                </td>
            </tr>
            <tr style="line-height: 32px; margin-left: 8px;">
                <td></td>
                <td>
                    b. Kecamatan: <?= $data[0]['kecamatan'] ?>
                </td>
                <td>
                    d. Provinsi: <?= $data[0]['provinsi'] ?>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 72px; margin-right: auto; margin-left: auto;">
            <tr>
                <td></td>
                <td align="right">
                    <span style="margin-right: 48px;">Nias, <?= date('d', strtotime($data[0]['created_at'])) ?> <?= $month[date('n', strtotime($data[0]['created_at']))] ?> <?= date('Y', strtotime($data[0]['created_at'])) ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="right"><span style="margin-right: 64px; margin-bottom: 48px;">Kepala Desa</span></td>
            </tr>
            <tr>
                <td>
                </td>

                <td align="right">
                    <?php if ($data[0]['ttd_kades'] == NULL) { ?>
                        <br><br><br><br>
                    <?php } else { ?>
                        <img style="width: 100px; margin-right: 48px;" src="<?= base_url('assets/img/fingerprint/kades/' . $data[0]['ttd_kades']) ?>.png" alt="">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="right"><span style="margin-right: 8px; margin-top: 32px;">APRILUDIN ZALUKHU</span></td>
            </tr>
        </table>
    </div>
</body>

</html>