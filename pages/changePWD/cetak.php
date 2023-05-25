<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

require_once("../../vendor/qrcode/qrlib.php");

$id = $_GET['id'];

// ambil dari database
$query = "SELECT * FROM sktm AS s INNER JOIN warga AS w ON s.id_warga=w.id_warga WHERE s.id_sktm='$id'";

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

    <h3 style="text-align: center;">SURAT KETERANGAN TIDAK MAMPU</h3>
    <hr style="margin-left: 524px; margin-right: 524px; margin-top: -16px; border: 1px solid black;">
    <p style="text-align: center; margin-bottom: 32px;">Nomor: <b><?= $data[0]['no_surat'] ?></b></p>

    <div style="margin-left: 64px; margin-right: 0px;">

    <p>Yang bertanda tangan dibawah ini, Kepala Desa Tetehosi Sorowi, Kecamatan Lahewa Timur Kabupaten Nias Utara, menerangkan bahwa:</p>

        <table style="margin-bottom: 24px;">
            <tr style="height: 32px;" style="margin-bottom: 32px;">
                <td style="width: 32px;">I.</td>
                <td>Nama</td>
                <td>: <?= $data[0]['nama_warga'] ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Tempat/Tanggal Lahir</td>
                <td>: <?= $data[0]['tempat_lahir_warga'] . ", " . date('j', strtotime($data[0]['tanggal_lahir_warga'])) . " " . month(date('n', strtotime($data[0]['tanggal_lahir_warga']))) . " " . date('Y', strtotime($data[0]['tanggal_lahir_warga'])) ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Jenis Kelamin</td>
                <td>: <?= $data[0]['jenis_kelamin_warga'] == "L" ? "Laki-Laki" : "Perempuan" ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Agama</td>
                <td>: <?= $data[0]['agama_warga'] ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Pekerjaan</td>
                <td>: <?= $data[0]['pekerjaan_warga'] ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Status Perkawinan</td>
                <td>: <?= $data[0]['status_perkawinan_warga'] ?></td>
            </tr>
            <tr style="height: 32px;">
                <td></td>
                <td>Alamat</td>
                <td>: <?= $data[0]['alamat_warga'] ?></td>
            </tr>
        </table>

        <table style="margin-bottom: 24px;">
            <tr>
                <td style="width: 32px; vertical-align: top !important;">II.</td>
                <td style="vertical-align: top !important;">Nama tersebut di atas benar pendunduk Desa Tetehosi Sorowi, Kecamatan Lahewa Timur, Kabupaten Nias Utara, dan saya nyatakan bahwa nama tersebut berasal dari  keluarga tidak mampu.</td>
            </tr>
        </table>

        <table style="margin-bottom: 48px;">
            <tr>
                <td style="width: 32px; vertical-align: top !important;">III.</td>
                <td style="vertical-align: top !important;">Demikian surat keterangan ini diperbuat dengan benar untuk dapat dipergunakan seperlunya.</td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 72px; margin-right: auto; margin-left: auto;">
            <tr>
                <td></td>
                <td align="right">
                    <span style="margin-right: 48px;">Nias, <?= date('d', strtotime($data[0]['created_at'])) ?> <?= month(date('n', strtotime($data[0]['created_at']))) ?> <?= date('Y', strtotime($data[0]['created_at'])) ?></span>
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