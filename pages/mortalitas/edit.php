<?php

include('../_partials/top.php') ;
include('data-edit.php');

?>

<h1 class="page-header">Data Kematian</h1>

<?php

$id = $_GET['id'];

?>

<form action="update.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Nama Warga</th>
            <td>:</td>
            <td>
                <input type="text" class="form-control" id="showParents" name="nama" value="<?= $res[0]['nama_warga'] ?>" onclick="return false" disabled>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            </td>
        </tr>
        <tr>
            <th>Tanggal Kematian</th>
            <td>:</td>
            <td>
                <input type="date" class="form-control" name="tgl" value="<?= $res[0]['tgl_kematian'] ?>" required>
            </td>
        </tr>
        <tr>
            <th>Lokasi Kematian</th>
            <td>:</td>
            <td>
                <textarea name="lokasi" class="form-control" required><?= $res[0]['lokasi_pemakaman'] ?></textarea>
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php $ajax = '../../assets/js/warga/warga-autocomplete.js' ?>

<?php include('../_partials/bottom.php') ?>