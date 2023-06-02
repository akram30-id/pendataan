<?php
include('../../config/koneksi.php');

if (date('j') < date('t')) {
    $monthCurrently = 1;
} else {
    $monthCurrently = 0;
}

$queryWargaMeninggalWNALakiLaki = "SELECT dusun, COUNT(*) AS total FROM `mortalitas` INNER JOIN warga ON mortalitas.id_warga=warga.id_warga WHERE MONTH(tgl_kematian)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga!='Indonesia' AND warga.jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaMeninggalWNAPerempuan = "SELECT dusun, COUNT(*) AS total FROM `mortalitas` INNER JOIN warga ON mortalitas.id_warga=warga.id_warga WHERE MONTH(tgl_kematian)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga!='Indonesia' AND warga.jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaMeninggalWNILakiLaki = "SELECT dusun, COUNT(*) AS total FROM `mortalitas` INNER JOIN warga ON mortalitas.id_warga=warga.id_warga WHERE MONTH(tgl_kematian)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga='Indonesia' AND warga.jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaMeninggalWNIPerempuan = "SELECT dusun, COUNT(*) AS total FROM `mortalitas` INNER JOIN warga ON mortalitas.id_warga=warga.id_warga WHERE MONTH(tgl_kematian)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga='Indonesia' AND warga.jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaPindahWNALakiLaki = "SELECT dusun, COUNT(*) AS total FROM `pindah` INNER JOIN warga ON pindah.id_warga=warga.id_warga WHERE MONTH(pindah.created_at)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga!='Indonesia' AND warga.jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaPindahWNAPerempuan = "SELECT dusun, COUNT(*) AS total FROM `pindah` INNER JOIN warga ON pindah.id_warga=warga.id_warga WHERE MONTH(pindah.created_at)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga!='Indonesia' AND warga.jenis_kelamin_warga='P' GROUP BY warga.dusun;";

$queryWargaPindahWNILakiLaki = "SELECT dusun, COUNT(*) AS total FROM `pindah` INNER JOIN warga ON pindah.id_warga=warga.id_warga WHERE MONTH(pindah.created_at)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga='Indonesia' AND warga.jenis_kelamin_warga='L' GROUP BY warga.dusun;";

$queryWargaPindahWNIPerempuan = "SELECT dusun, COUNT(*) AS total FROM `pindah` INNER JOIN warga ON pindah.id_warga=warga.id_warga WHERE MONTH(pindah.created_at)=MONTH(CURRENT_DATE()) - $monthCurrently AND warga.negara_warga='Indonesia' AND warga.jenis_kelamin_warga='P' GROUP BY warga.dusun;";

// DATA PENGURANGAN PENDUDUK
$req15 = mysqli_query($db, $queryWargaMeninggalWNALakiLaki);
$req16 = mysqli_query($db, $queryWargaMeninggalWNAPerempuan);

$req17 = mysqli_query($db, $queryWargaMeninggalWNILakiLaki);
$req18 = mysqli_query($db, $queryWargaMeninggalWNIPerempuan);

$req19 = mysqli_query($db, $queryWargaPindahWNALakiLaki);
$req20 = mysqli_query($db, $queryWargaPindahWNAPerempuan);

$req21 = mysqli_query($db, $queryWargaPindahWNILakiLaki);
$req22 = mysqli_query($db, $queryWargaPindahWNIPerempuan);

$res[] = getPenguranganWarga($req15, 'warga_meninggal_wna_L');
$res[] = getPenguranganWarga($req16, 'warga_meninggal_wna_P');

$res[] = getPenguranganWarga($req17, 'warga_meninggal_wni_L');
$res[] = getPenguranganWarga($req18, 'warga_meninggal_wni_P');

$res[] = getPenguranganWarga($req19, 'warga_pindah_wna_L');
$res[] = getPenguranganWarga($req20, 'warga_pindah_wna_P');

$res[] = getPenguranganWarga($req21, 'warga_pindah_wni_L');
$res[] = getPenguranganWarga($req22, 'warga_pindah_wni_P');


function getPenguranganWarga($req, String $arrayKey)
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
