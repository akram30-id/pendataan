<?php
require_once("../../config/koneksi.php");
require_once("../../config/env.php");

require_once("../../vendor/qrcode/qrlib.php");

// ambil dari database
require_once("data-index.php");

if (date('j') < date('t')) {
    $periode = month(date('n') - 2);
} else {
    $periode = month(date('n') - 1);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengajuan Data Rekapitulasi Warga Peride <?= $periode ?></title>

    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

        .tbl-content {
            border: 1px solid black;
            border-collapse: collapse;
            margin-bottom: 32px;
        }
    </style>
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

    <h3 style="text-align: center;">BUKU REKAPITULASI JUMLAH PENDUDUK DESA TETEHOSI SOROWI KECAMATAN LAHEWA TIMUR</h3>
    <h3 style="text-align: center; margin-bottom: 32px;">DESA TETEHOSI SOROWI TAHUN 2023</h3>

    <h3>BULAN: <?= strtoupper($periode) . " " . date('Y') ?></h3>
    <table class="tbl-content">
        <!-- HEAD -->
        <tr class="tbl-content">
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="4">No. Urut</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="4">Nama Dusun</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="7">Jumlah Penduduk Awal Bulan</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="8">Tambahan Bulan Ini</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="8">Pengurangan Bulan Ini</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="7">Jumlah Penduduk Akhir Bulan</th>
            <th class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="4">Ket</th>
        </tr>
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML KK</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML ANGG KELUARGA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML JIWA</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="4">Lahir</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="4">Datang</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="4">Meninggal</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="4">Pindah</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML KK</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML ANGGOTA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" rowspan="3">JML JIWA</td>

        </tr>
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
        </tr>
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;"></td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;"></td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;"></td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;"></td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>

            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">L</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">P</td>
            <td class="tbl-content"></td>
            <td class="tbl-content"></td>
            <td class="tbl-content"></td>
            <td class="tbl-content"></td>
        </tr>

        <!-- BODY -->
        <!-- DUSUN I -->
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">1</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">Dusun I</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun I'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun I'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun I'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun I'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun I'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun I'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun I'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun I'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun I'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun I'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun I'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun I'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun I'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun I'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun I'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun I'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun I'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun I'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun I'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun I'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun I'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun I'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun I'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun I'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun I'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun I'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun I'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun I'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun I'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun I'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun I']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>

        <!-- DUSUN II -->
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">2</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">Dusun II</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun II'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun II'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun II'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun II'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun II'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun II'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun II'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun II'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun II'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun II'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun II'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun II'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun II'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun II'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun II'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun II'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun II'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun II'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun II'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun II'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun II'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun II'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun II'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun II'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun II'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun II'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun II'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun II'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun II'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun II'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun II']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>

        <!-- DUSUN III -->
        <tr class="tbl-content">
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">3</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">Dusun III</td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun III'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun III'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun III'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun III'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun III'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun III'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun III'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun III'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun III'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun III'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun III'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun III'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun III'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun III'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun III'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun III'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun III'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun III'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun III'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun III'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun III'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun III'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun III'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun III'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun III'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun III'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun III'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun III'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun III'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun III'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun III']  ?>
            </td>
            <td class="tbl-content" style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom: 72px; margin-right: auto; margin-left: auto;">
        <tr>
            <td style="text-align: center;">MENGETAHUI,</td>
            <td style="text-align: center;" align="right">Tetehosi Sorowi, <?= date('d') ?> <?= month(date('n') - 1) ?> <?= date('Y') ?></td>
        </tr>
        <tr>
            <td style="text-align: center;">KEPALA DESA TETEHOSI SOROWI</td>
            <td style="text-align: center;" align="right">SEKRETARIS DESA TETEHOSI SOROWI</td>
        </tr>
        <tr>
            <td style="height: 72px;"></td>
            <td style="height: 72px;"></td>
        </tr>
        <tr>
            <td align="left" style="margin-left: 32px; text-align: center; font-weight: bold;"><span>APRILUDIN ZALUKHU</span></td>
            <td style="text-align: center; font-weight: bold;" align="right"><span>ALIM YUNUS ZALUKHU</span></td>
        </tr>
    </table>
</body>

</html>