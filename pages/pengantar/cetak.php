<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

require_once("../../vendor/qrcode/qrlib.php");

$id = $_GET['id'];

// ambil dari database
$query = "SELECT * FROM surat_pengantar INNER JOIN warga ON surat_pengantar.id_warga = warga.id_warga WHERE surat_pengantar.id_pengantar='$id'";

$hasil = mysqli_query($db, $query);
$data = [];
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

$rt = $data[0]['rt_warga'];
$rw = $data[0]['rw_warga'];

// GET PAK RT NAME
$queryRT = "SELECT nama_user FROM user WHERE status_user='RT' AND rt_user='$rt' AND rw_user='$rw';";
$hasilRT = mysqli_query($db, $queryRT);

$dataRT = [];
while ($row = mysqli_fetch_assoc($hasilRT)) {
    $dataRT[] = $row;
}

// GET PAK RW NAME
$queryRW = "SELECT nama_user FROM user WHERE status_user='RW' AND rw_user='$rw';";
$hasilRW = mysqli_query($db, $queryRW);

$dataRW = [];
while ($row = mysqli_fetch_assoc($hasilRW)) {
    $dataRW[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengajuan Surat Pengantar</title>
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

    <h3 style="text-align: center;">SURAT KETERANGAN</h3>
    <hr style="margin-left: 524px; margin-right: 524px; margin-top: -16px; border: 1px solid black;">
    <p style="text-align: center; margin-bottom: 32px;"><b>No. <?= $data[0]['nomor_surat'] ?></b></p>

    <div style="margin-left: 64px; margin-right: 64px;">
        <p style="line-height: 32px;">Yang bertanda tangan di bawah ini, Ketua RT <?= $data[0]['rt_warga'] ?>, RW <?= $data[0]['rw_warga'] ?> Desa Tetehosi Sorowi, Kecamatan Lahea Timur, menerangkan dengan sebenarnya bahwa: <br>
        </p>

        <table style="margin-bottom: 64px;">
            <tr style="line-height: 32px;">
                <td>Nama</td>
                <td>:</td>
                <td><?= $data[0]['nama_warga'] ?></td>
            </tr>

            <?php $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] ?>

            <tr>
                <td>Tempat & Tanggal Lahir</td>
                <td>:</td>
                <td><?= $data[0]['tempat_lahir_warga'] ?>, <?= date('d', strtotime($data[0]['tanggal_lahir_warga'])) ?> <?= $month[date('n', strtotime($data[0]['tanggal_lahir_warga']))] ?> <?= date('Y', strtotime($data[0]['tanggal_lahir_warga'])) ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $data[0]['jenis_kelamin_warga'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Status Perkawinan</td>
                <td>:</td>
                <td><?= $data[0]['status_perkawinan_warga'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>No. KTP / NIK</td>
                <td>:</td>
                <td><?= $data[0]['nik_warga'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Agama</td>
                <td>:</td>
                <td><?= $data[0]['agama_warga'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $data[0]['pekerjaan_warga'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data[0]['alamat_warga'] ?></td>
            </tr>

            <tr style="line-height: 32px;">
                <td>Keperluan</td>
                <td>:</td>
                <td><?= $data[0]['keperluan'] ?></td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 72px; margin-right: auto; margin-left: auto;">
            <tr>
                <td>Mengetahui,</td>
                <td align="right">Nias, <?= date('d', strtotime($data[0]['created_at'])) ?> <?= $month[date('n', strtotime($data[0]['created_at']))] ?> <?= date('Y', strtotime($data[0]['created_at'])) ?></td>
            </tr>
            <tr>
                <td>Ketua RT <?= $data[0]['rt_warga'] ?></td>
                <td align="right">Ketua RW <?= $data[0]['rw_warga'] ?></td>
            </tr>
            <tr>
                <td>
                    <?php if ($data[0]['ttd_rt'] === NULL) { ?>
                        <br><br><br>
                    <?php } else { ?>
                        <img style="width: 100px;" src="<?= base_url('assets/img/fingerprint/rt/' . $data[0]['ttd_rt']) ?>.png" alt="">
                    <?php } ?>
                </td>

                <td align="right">
                    <?php if ($data[0]['ttd_rw'] === NULL) { ?>
                        <br><br><br>
                    <?php } else { ?>
                        <img style="width: 100px;" src="<?= base_url('assets/img/fingerprint/rw/' . $data[0]['ttd_rw']) ?>.png" alt="">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <?php if (isset($dataRT[0]['nama_user'])) { ?>
                    <td><span style="margin-left: 22px;"><?= $dataRT[0]['nama_user'] ?></span></td>
                <?php } else { ?>
                    <td><span style="margin-left: 0px;">Plt. Ketua RT <?= $data[0]['rt_warga'] ?></span></td>
                <?php } ?>

                <?php if (isset($dataRW[0]['nama_user'])) { ?>
                    <td align="right"><span style="margin-right: 16px;"><?= $dataRW[0]['nama_user'] ?></span></td>
                <?php } else { ?>
                    <td align="right"><span style="margin-left: 0px;">Plt. Ketua RW <?= $data[0]['rw_warga'] ?></span></td>
                <?php } ?>
            </tr>
        </table>
    </div>
</body>

</html>