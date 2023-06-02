<?php
include('../../config/koneksi.php');

if (date('j') < date('t')) {
    $monthCurrently = 1;
} else {
    $monthCurrently = 0;
}

$queryWargaPendatangWNALakiLaki = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia' AND jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaPendatangWNAPerempuan = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia' AND jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaPendatangWNILakiLaki = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia' AND jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaPendatangWNIPerempuan = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Pendatang' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia' AND jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaLahirWNALakiLaki = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia' AND jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaLahirWNAPerempuan = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga!='Indonesia' AND jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaLahirWNILakiLaki = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia' AND jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaLahirWNIPerempuan = "SELECT dusun, COUNT(*) AS total FROM `warga` WHERE status_inputan='Lahir' AND MONTH(created_at) = MONTH(CURRENT_DATE()) - $monthCurrently AND negara_warga='Indonesia' AND jenis_kelamin_warga='P' GROUP BY warga.dusun;";

// DATA PERTAMBAHAN PENDUDUK
$req7 = mysqli_query($db, $queryWargaPendatangWNALakiLaki);
$req8 = mysqli_query($db, $queryWargaPendatangWNAPerempuan);

$req9 = mysqli_query($db, $queryWargaPendatangWNILakiLaki);
$req10 = mysqli_query($db, $queryWargaPendatangWNIPerempuan);

$req11 = mysqli_query($db, $queryWargaLahirWNALakiLaki);
$req12 = mysqli_query($db, $queryWargaLahirWNAPerempuan);

$req13 = mysqli_query($db, $queryWargaLahirWNILakiLaki);
$req14 = mysqli_query($db, $queryWargaLahirWNIPerempuan);

$res[] = getPertambahanWarga($req7, 'warga_pendatang_wna_L');
$res[] = getPertambahanWarga($req8, 'warga_pendatang_wna_P');

$res[] = getPertambahanWarga($req9, 'warga_pendatang_wni_L');
$res[] = getPertambahanWarga($req10, 'warga_pendatang_wni_P');

$res[] = getPertambahanWarga($req11, 'warga_lahir_wna_L');
$res[] = getPertambahanWarga($req12, 'warga_lahir_wna_P');

$res[] = getPertambahanWarga($req13, 'warga_lahir_wni_L');
$res[] = getPertambahanWarga($req14, 'warga_lahir_wni_P');

function getPertambahanWarga($req, String $arrayKey)
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