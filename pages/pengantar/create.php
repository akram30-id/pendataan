<?php include('../_partials/top.php') ?>

<h1 class="page-header">Formulir Pengajuan Surat Pengantar</h1>

<form action="store.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Keperluan</th>
            <td>:</td>
            <td>
                <textarea name="keperluan" class="form-control" rows="10" required></textarea>
                <input type="hidden" name="id_warga" value="<?= $_SESSION['user']['id_user'] ?>">
            </td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php include('../_partials/bottom.php') ?>