<?php

include('../_partials/top.php') ?>

<h1 class="page-header">Data Kelahiran</h1>

<?php
include('data.php');

$anak = "";
$jk = "";
$tgl = "";

if (isset($_GET['anak'])) {
    $anak = $_GET['anak'];
}

if (isset($_GET['jk'])) {
    $jk = $_GET['jk'];
}

if (isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
}

$optJK = ['Laki-Laki', 'Perempuan'];

?>

<form action="store.php" method="post">
    <h3>Data Anak</h3>
    <table class="table table-striped table-middle">
        <tr>
            <th>Orang Tua</th>
            <td>:</td>
            <td>
                <input type="text" class="form-control" id="showParents" name="orang_tua" required>
            </td>
        </tr>
        <tr>
            <th width="20%">Nama Anak</th>
            <td width="1%">:</td>
            <td>
                <input type="text" class="form-control" name="nama_anak" required value="<?= $anak ?>">
            </td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td>
                <select name="jenis_kelamin">
                    <?php foreach ($optJK as $jenis_kelamin) { ?>
                        <option value="<?= $jenis_kelamin ?>" <?php if ($jenis_kelamin == $jk) {
                                                                    echo 'selected="selected"';
                                                                } ?> required>
                            <?= $jenis_kelamin ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Tanggal Kelahiran</th>
            <td>:</td>
            <td>
                <input type="date" class="form-control" name="tgl_lahir" value="<?= $tgl ?>" required>
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php $ajax = '../../assets/js/warga/warga-autocomplete.js' ?>

<?php include('../_partials/bottom.php') ?>