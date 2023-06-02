<?php
include('../../config/koneksi.php');

if (date('j') < date('t')) {
    $monthCurrently = 1;
} else {
    $monthCurrently = 0;
}

$res[]['akhir_wna_L'] = [
    'Dusun I' => (intval($res[0]['awal_wna_L']['Dusun I']) + intval($res[7]['warga_pendatang_wna_L']['Dusun I']) + intval($res[11]['warga_lahir_wna_L']['Dusun I'])) - (intval($res[15]['warga_meninggal_wna_L']['Dusun I']) + intval($res[19]['warga_pindah_wna_L']['Dusun I'])),
    'Dusun II' => (intval($res[0]['awal_wna_L']['Dusun II']) + intval($res[7]['warga_pendatang_wna_L']['Dusun II']) + intval($res[11]['warga_lahir_wna_L']['Dusun II'])) - (intval($res[15]['warga_meninggal_wna_L']['Dusun II']) + intval($res[19]['warga_pindah_wna_L']['Dusun II'])),
    'Dusun III' => (intval($res[0]['awal_wna_L']['Dusun III']) + intval($res[7]['warga_pendatang_wna_L']['Dusun III']) + intval($res[11]['warga_lahir_wna_L']['Dusun III'])) - (intval($res[15]['warga_meninggal_wna_L']['Dusun III']) + intval($res[19]['warga_pindah_wna_L']['Dusun III'])),
];

$res[]['akhir_wna_P'] = [
    'Dusun I' => (intval($res[1]['awal_wna_P']['Dusun I']) + intval($res[8]['warga_pendatang_wna_P']['Dusun I']) + intval($res[12]['warga_lahir_wna_P']['Dusun I'])) - (intval($res[16]['warga_meninggal_wna_P']['Dusun I']) + intval($res[20]['warga_pindah_wna_P']['Dusun I'])),
    'Dusun II' => (intval($res[1]['awal_wna_P']['Dusun II']) + intval($res[8]['warga_pendatang_wna_P']['Dusun II']) + intval($res[12]['warga_lahir_wna_P']['Dusun II'])) - (intval($res[16]['warga_meninggal_wna_P']['Dusun II']) + intval($res[20]['warga_pindah_wna_P']['Dusun II'])),
    'Dusun III' => (intval($res[1]['awal_wna_P']['Dusun III']) + intval($res[8]['warga_pendatang_wna_P']['Dusun III']) + intval($res[12]['warga_lahir_wna_P']['Dusun III'])) - (intval($res[16]['warga_meninggal_wna_P']['Dusun III']) + intval($res[20]['warga_pindah_wna_P']['Dusun III'])),
];

$res[]['akhir_wni_L'] = [
    'Dusun I' => (intval($res[2]['awal_wni_L']['Dusun I']) + intval($res[9]['warga_pendatang_wni_L']['Dusun I']) + intval($res[13]['warga_lahir_wni_L']['Dusun I'])) - (intval($res[17]['warga_meninggal_wni_L']['Dusun I']) + intval($res[21]['warga_pindah_wni_L']['Dusun I'])),
    'Dusun II' => (intval($res[2]['awal_wni_L']['Dusun II']) + intval($res[9]['warga_pendatang_wni_L']['Dusun II']) + intval($res[13]['warga_lahir_wni_L']['Dusun II'])) - (intval($res[17]['warga_meninggal_wni_L']['Dusun II']) + intval($res[21]['warga_pindah_wni_L']['Dusun II'])),
    'Dusun III' => (intval($res[2]['awal_wni_L']['Dusun III']) + intval($res[9]['warga_pendatang_wni_L']['Dusun III']) + intval($res[13]['warga_lahir_wni_L']['Dusun III'])) - (intval($res[17]['warga_meninggal_wni_L']['Dusun III']) + intval($res[21]['warga_pindah_wni_L']['Dusun III'])),
];

$res[]['akhir_wni_P'] = [
    'Dusun I' => (intval($res[3]['awal_wni_P']['Dusun I']) + intval($res[10]['warga_pendatang_wni_P']['Dusun I']) + intval($res[14]['warga_lahir_wni_P']['Dusun I'])) - (intval($res[18]['warga_meninggal_wni_P']['Dusun I']) + intval($res[22]['warga_pindah_wni_P']['Dusun I'])),
    'Dusun II' => (intval($res[3]['awal_wni_P']['Dusun II']) + intval($res[10]['warga_pendatang_wni_P']['Dusun II']) + intval($res[14]['warga_lahir_wni_P']['Dusun II'])) - (intval($res[18]['warga_meninggal_wni_P']['Dusun II']) + intval($res[22]['warga_pindah_wni_P']['Dusun II'])),
    'Dusun III' => (intval($res[3]['awal_wni_P']['Dusun III']) + intval($res[10]['warga_pendatang_wni_P']['Dusun III']) + intval($res[14]['warga_lahir_wni_P']['Dusun III'])) - (intval($res[18]['warga_meninggal_wni_P']['Dusun III']) + intval($res[22]['warga_pindah_wni_P']['Dusun III'])),
];

$queryJmlKKAkhir = "SELECT warga.dusun, COUNT(*) AS total FROM `kartu_keluarga` INNER JOIN warga ON kartu_keluarga.id_kepala_keluarga=warga.id_warga WHERE MONTH(kartu_keluarga.created_at) <= MONTH(LAST_DAY(CURRENT_DATE())) - $monthCurrently GROUP BY warga.dusun;";

$queryJmlAnggotaKKAkhir = "SELECT warga.dusun, COUNT(*) AS total FROM warga_has_kartu_keluarga INNER JOIN warga ON warga_has_kartu_keluarga.id_warga=warga.id_warga WHERE MONTH(warga.created_at) <= MONTH(LAST_DAY(CURRENT_DATE())) - $monthCurrently GROUP BY warga.dusun;";

$res[] = dataAkhirWarga(mysqli_query($db, $queryJmlKKAkhir), 'akhir_jml_kk');
$res[] = dataAkhirWarga(mysqli_query($db, $queryJmlAnggotaKKAkhir), 'akhir_jml_anggota_kk');
$res[] = setAkhirJmlJiwa($res[27]['akhir_jml_kk'], $res[28]['akhir_jml_anggota_kk']);

function dataAkhirWarga($req, String $arrayKey)
{
    $res = [];

    while ($row = mysqli_fetch_assoc($req)) {
        $res[$arrayKey][$row['dusun']] = intval($row['total']);
    }

    if (!isset($res[$arrayKey]['Dusun I'])) {
        $res[$arrayKey]['Dusun I'] = 0;
    }

    if (!isset($res[$arrayKey]['Dusun II'])) {
        $res[$arrayKey]['Dusun II'] = 0;
    }

    if (!isset($res[$arrayKey]['Dusun III'])) {
        $res[$arrayKey]['Dusun III'] = 0;
    }

    return $res;
}

function setAkhirJmlJiwa($akhirJmlKK, $akhirJmlAnggotaKK)
{
    $res = [];

    $res['akhir_jml_jiwa']['Dusun I'] = intval($akhirJmlKK['Dusun I']) + intval($akhirJmlAnggotaKK['Dusun I']);
    $res['akhir_jml_jiwa']['Dusun II'] = intval($akhirJmlKK['Dusun II']) + intval($akhirJmlAnggotaKK['Dusun II']);
    $res['akhir_jml_jiwa']['Dusun III'] = intval($akhirJmlKK['Dusun III']) + intval($akhirJmlAnggotaKK['Dusun III']);

    return $res;
}
