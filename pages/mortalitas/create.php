<?php

include('../_partials/top.php') ?>

<h1 class="page-header">Data Kematian</h1>

<?php

$lokasi = "";
$tgl = "";

if (isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
}

if (isset($_GET['lokasi'])) {
    $lokasi = $_GET['lokasi'];
}

?>

<form action="store.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Nama Warga</th>
            <td>:</td>
            <td>
                <input type="text" class="form-control" id="showParents" name="nama" required>
            </td>
        </tr>
        <tr>
            <th>Tanggal Kematian</th>
            <td>:</td>
            <td>
            <input type="date" class="form-control" name="tgl" value="<?= $tgl ?>" required>
            </td>
        </tr>
        <tr>
            <th>Lokasi Kematian</th>
            <td>:</td>
            <td>
                <textarea name="lokasi" class="form-control" required><?=  $lokasi ?></textarea>
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php $ajax = '../../assets/js/warga/warga-autocomplete.js' ?>

<?php include('../_partials/bottom.php') ?>