<?php
include('../../config/koneksi.php');

if (date('j') < date('t')) {
    $monthCurrently = 1;
} else {
    $monthCurrently = 0;
}

$queryAwalBlnWNALakiLaki = "SELECT dusun, COUNT(*) AS total FROM warga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') AND negara_warga != 'Indonesia' AND jenis_kelamin_warga = 'L' GROUP BY dusun;";

$queryAwalBlnWNAPerempuan = "SELECT dusun, COUNT(*) AS total FROM warga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') AND negara_warga != 'Indonesia' AND jenis_kelamin_warga = 'P' GROUP BY dusun;";

$queryAwalBlnWNILakiLaki = "SELECT dusun, COUNT(*) AS total FROM warga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') AND negara_warga = 'Indonesia' AND jenis_kelamin_warga = 'L' GROUP BY dusun;";

$queryAwalBlnWNIPerempuan = "SELECT dusun, COUNT(*) AS total FROM warga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') AND negara_warga = 'Indonesia' AND jenis_kelamin_warga = 'P' GROUP BY dusun;";

$queryJmlKKAwalBln = "SELECT dusun, COUNT(*) AS total FROM kartu_keluarga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') GROUP BY dusun;";

$queryJmlAnggotaKK = "SELECT dusun, COUNT(*) AS total FROM warga_has_kartu_keluarga INNER JOIN warga ON warga_has_kartu_keluarga.id_warga=warga.id_warga WHERE DATE_FORMAT(created_at, '%Y-%m-%d') <= DATE_FORMAT(NOW(), '%Y-%m-01') GROUP BY dusun;";

$queryWargaPendatangWNA = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia';";

$queryWargaPendatangWNI = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia';";

$queryWargaLahirWNA = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia';";

$queryWargaLahirWNI = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia';";

// DATA AWAL BULAN
$req = mysqli_query($db, $queryAwalBlnWNALakiLaki);
$req2 = mysqli_query($db, $queryAwalBlnWNAPerempuan);
$req3 = mysqli_query($db, $queryAwalBlnWNILakiLaki);
$req4 = mysqli_query($db, $queryAwalBlnWNIPerempuan);
$req5 = mysqli_query($db, $queryJmlKKAwalBln);
$req6 = mysqli_query($db, $queryJmlAnggotaKK);

$res = [];

$res[] = getWargaAwalBulan($req, 'awal_wna_L');

$res[] = getWargaAwalBulan($req2, 'awal_wna_P');

$res[] = getWargaAwalBulan($req3, 'awal_wni_L');

$res[] = getWargaAwalBulan($req4, 'awal_wni_P');

$res[] = getWargaAwalBulan($req5, 'awal_jml_kk');

$res[] = getWargaAwalBulan($req6, 'awal_jml_anggota_kk');

$res[] = setAwalJmlJiwa($res[4]['awal_jml_kk'], $res[5]['awal_jml_anggota_kk']);

function getWargaAwalBulan($req, String $arrayKey)
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

function setAwalJmlJiwa($awalJmlKK, $awalJmlAnggotaKK)
{
    $res = [];

    $res['awal_jml_jiwa']['Dusun I'] = intval($awalJmlKK['Dusun I']) + intval($awalJmlAnggotaKK['Dusun I']);
    $res['awal_jml_jiwa']['Dusun II'] = intval($awalJmlKK['Dusun II']) + intval($awalJmlAnggotaKK['Dusun II']);
    $res['awal_jml_jiwa']['Dusun III'] = intval($awalJmlKK['Dusun III']) + intval($awalJmlAnggotaKK['Dusun III']);

    return $res;
}