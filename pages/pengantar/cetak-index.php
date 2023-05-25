<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

// ambil dari database
$query = "SELECT * FROM surat_pengantar INNER JOIN warga ON surat_pengantar.id_warga = warga.id_warga";
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
    <title>Cetak Pengajuan Surat Pengantar</title>

    <style>
        @media print {
            @page {
                size: landscape
            }
        }
    </style>
</head>

<body onload="window.print()">

    <table style="margin-left: auto; margin-right: auto; width: 100%;">
        <tr>
            <td rowspan="6" align="right" style="width: 15%;">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width: 50%;">
            </td>
            <td>
                <h3 style="text-align: center; margin-bottom: -16px;">PEMERINTAH KABUPATEN NIAS</h3>
            </td>
            <td rowspan="6" align="right" style="width: 15%;">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="" style="width: 50%; opacity: 0.0;">
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="text-align: center; margin-bottom: -16px;">KECAMATAN LAHEWA TIMUR</h3>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style="text-align: center; margin-bottom: -16px;">KELURAHAN TETEHOSI SOROWI</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p style="text-align: center;">RT 004 RW 002 Dusun II, Tetehosi Sorowi, Kec. Lahewa Tim., Kabupaten Nias Utara, Sumatera Utara 22851</p>
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
                <th>KEPERLUAN</th>
                <th>TANDA TANGAN</th>
                <th>WAKTU PENGAJUAN</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $pengantar) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pengantar['nama_warga'] ?></td>
                        <td><?= $pengantar['keperluan'] ?></td>
                        <td><?= $pengantar['ttd_rt'] == NULL && $pengantar['ttd_rt'] == NULL ? "BELUM LENGKAP" : "LENGKAP" ?></td>
                        <td><?= date('d F Y', strtotime($pengantar['created_at'])) ?> PUKUL <?= date('H:i:s', strtotime($pengantar['created_at'])) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>