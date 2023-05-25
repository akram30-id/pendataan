<?php

include('../_partials/top.php');
include('data-edit.php');

?>

<h1 class="page-header">Edit Pengajuan Surat Pengantar</h1>

<form action="update.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Keperluan</th>
            <td>:</td>
            <td>
                <textarea name="keperluan" class="form-control" rows="10" required><?= $res[0]['keperluan'] ?></textarea>
                <input type="hidden" name="id_pengantar" value="<?= $_GET['id'] ?>">
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>


<?php include('../_partials/bottom.php') ?>