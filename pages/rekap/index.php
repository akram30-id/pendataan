<?php include('../_partials/top.php') ?>

<?php
date_default_timezone_set('Asia/Jakarta');
include('data-index.php');
include('../../config/env.php');

if (date('j') < date('t')) {
    $periode = month(date('n') - 2);
} else {
    $periode = month(date('n') - 1);
}

?>

<h1 class="page-header">Rekapitulasi Data Warga Periode <?= $periode ?></h1>
<?php include('_partials/menu.php') ?>

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th style="text-align: center; vertical-align: middle;" rowspan="4">No. Urut</th>
            <th style="text-align: center; vertical-align: middle;" rowspan="4">Nama Dusun</th>
            <th style="text-align: center; vertical-align: middle;" colspan="7">Jumlah Penduduk Awal Bulan</th>
            <th style="text-align: center; vertical-align: middle;" colspan="8">Tambahan Bulan Ini</th>
            <th style="text-align: center; vertical-align: middle;" colspan="8">Pengurangan Bulan Ini</th>
            <th style="text-align: center; vertical-align: middle;" colspan="7">Jumlah Penduduk Akhir Bulan</th>
            <th style="text-align: center; vertical-align: middle;" rowspan="4">Ket</th>
        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML KK</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML ANGG KELUARGA</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML JIWA</td>

            <td style="text-align: center; vertical-align: middle;" colspan="4">Lahir</td>
            <td style="text-align: center; vertical-align: middle;" colspan="4">Datang</td>

            <td style="text-align: center; vertical-align: middle;" colspan="4">Meninggal</td>
            <td style="text-align: center; vertical-align: middle;" colspan="4">Pindah</td>

            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML KK</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML ANGGOTA</td>
            <td style="text-align: center; vertical-align: middle;" rowspan="3">JML JIWA</td>

        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>

            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>

            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNA</td>
            <td style="text-align: center; vertical-align: middle;" colspan="2">WNI</td>

            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
        </tr>
        <tr>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;"></td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>

            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td style="text-align: center; vertical-align: middle;">L</td>
            <td style="text-align: center; vertical-align: middle;">P</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <!-- DUSUN I -->
        <tr>
            <td style="text-align: center; vertical-align: middle;">1</td>
            <td style="text-align: center; vertical-align: middle;">Dusun I</td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun I'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun I'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun I'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun I'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun I'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun I'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun I'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun I'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun I'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun I'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun I'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun I'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun I'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun I'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun I'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun I'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun I'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun I'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun I'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun I'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun I'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun I'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun I'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun I'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun I'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun I'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun I'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun I'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun I'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun I'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun I']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>

        <!-- DUSUN II -->
        <tr>
            <td style="text-align: center; vertical-align: middle;">2</td>
            <td style="text-align: center; vertical-align: middle;">Dusun II</td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun II'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun II'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun II'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun II'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun II'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun II'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun II'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun II'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun II'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun II'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun II'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun II'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun II'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun II'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun II'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun II'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun II'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun II'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun II'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun II'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun II'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun II'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun II'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun II'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun II'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun II'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun II'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun II'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun II'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun II'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun II']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>

        <!-- DUSUN II -->
        <tr>
            <td style="text-align: center; vertical-align: middle;">3</td>
            <td style="text-align: center; vertical-align: middle;">Dusun III</td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[0]['awal_wna_L']['Dusun III'] == 0 ? "-" : $res[0]['awal_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[1]['awal_wna_P']['Dusun III'] == 0 ? "-" : $res[1]['awal_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[2]['awal_wni_L']['Dusun III'] == 0 ? "-" : $res[2]['awal_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[3]['awal_wni_P']['Dusun III'] == 0 ? "-" : $res[3]['awal_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[4]['awal_jml_kk']['Dusun III'] == 0 ? "-" : $res[4]['awal_jml_kk']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[5]['awal_jml_anggota_kk']['Dusun III'] == 0 ? "-" : $res[5]['awal_jml_anggota_kk']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[6]['awal_jml_jiwa']['Dusun III'] == 0 ? "-" : $res[6]['awal_jml_jiwa']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[11]['warga_lahir_wna_L']['Dusun III'] == 0 ? "-" : $res[11]['warga_lahir_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[12]['warga_lahir_wna_P']['Dusun III'] == 0 ? "-" : $res[12]['warga_lahir_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[13]['warga_lahir_wni_L']['Dusun III'] == 0 ? "-" : $res[13]['warga_lahir_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[14]['warga_lahir_wni_P']['Dusun III'] == 0 ? "-" : $res[14]['warga_lahir_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[7]['warga_pendatang_wna_L']['Dusun III'] == 0 ? "-" : $res[7]['warga_pendatang_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[8]['warga_pendatang_wna_P']['Dusun III'] == 0 ? "-" : $res[8]['warga_pendatang_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[9]['warga_pendatang_wni_L']['Dusun III'] == 0 ? "-" : $res[9]['warga_pendatang_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[10]['warga_pendatang_wni_P']['Dusun III'] == 0 ? "-" : $res[10]['warga_pendatang_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[15]['warga_meninggal_wna_L']['Dusun III'] == 0 ? "-" : $res[15]['warga_meninggal_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[16]['warga_meninggal_wna_P']['Dusun III'] == 0 ? "-" : $res[16]['warga_meninggal_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[17]['warga_meninggal_wni_L']['Dusun III'] == 0 ? "-" : $res[17]['warga_meninggal_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[18]['warga_meninggal_wni_P']['Dusun III'] == 0 ? "-" : $res[18]['warga_meninggal_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[19]['warga_pindah_wna_L']['Dusun III'] == 0 ? "-" : $res[19]['warga_pindah_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[20]['warga_pindah_wna_P']['Dusun III'] == 0 ? "-" : $res[20]['warga_pindah_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[21]['warga_pindah_wni_L']['Dusun III'] == 0 ? "-" : $res[21]['warga_pindah_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[22]['warga_pindah_wni_P']['Dusun III'] == 0 ? "-" : $res[22]['warga_pindah_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[23]['akhir_wna_L']['Dusun III'] == 0 ? "-" : $res[23]['akhir_wna_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[24]['akhir_wna_P']['Dusun III'] == 0 ? "-" : $res[24]['akhir_wna_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[25]['akhir_wni_L']['Dusun III'] == 0 ? "-" : $res[25]['akhir_wni_L']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[26]['akhir_wni_P']['Dusun III'] == 0 ? "-" : $res[26]['akhir_wni_P']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[27]['akhir_jml_kk']['Dusun III'] == 0 ? "-" : $res[27]['akhir_jml_kk']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[28]['akhir_jml_anggota_kk']['Dusun III'] == 0 ? "-" : $res[28]['akhir_jml_anggota_kk']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                <?= $res[29]['akhir_jml_jiwa']['Dusun III'] == 0 ? "-" : $res[29]['akhir_jml_jiwa']['Dusun III']  ?>
            </td>
            <td style="text-align: center; vertical-align: middle;">
                -</td>
        </tr>
    </tbody>
</table>

<script>
    function hapus(id) {
        const text = "Apakah Anda Yakin Ingin Menghapus Data Ini?"
        if (confirm(text)) {
            window.location.href = `delete.php?id=${id}`
        } else {
            alert('OK')
        }
    }

    function approve(id) {
        const text = "Apakah Anda Yakin Ingin Approve Pengajuan SKTM Ini?"
        if (confirm(text)) {
            window.location.href = `approve.php?id=${id}`
        } else {
            alert('OK')
        }
    }

    function tambah(id, thnLahir) {
        const text = "Ingin Mengajukan SKTM Terbaru?"
        if (confirm(text)) {
            window.location.href = `store.php?id=${id}&thn=${thnLahir}`
        } else {
            alert('OK')
        }
    }
</script>

<?php include('../_partials/bottom.php') ?>