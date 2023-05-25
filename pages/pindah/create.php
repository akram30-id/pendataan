<?php include('../_partials/top.php') ?>

<h1 class="page-header">Formulir Pengajuan Surat Pindah</h1>

<form action="store.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Alasan Pindah</th>
            <td>:</td>
            <td>
                <textarea name="alasan" class="form-control" rows="10" required></textarea>
                <?php if ($_SESSION['user']['status_user'] == 'Admin') { ?>
                    <?php if (isset($_GET['id_warga'])) { ?>
                        <input type="hidden" name="id_warga" value="<?= $_GET['id_warga'] ?>">
                    <?php } ?>
                <?php } else { ?>
                    <input type="hidden" name="id_warga" value="<?= $_SESSION['user']['id_user'] ?>">
                <?php } ?>
            </td>
        </tr>

        <tr>
            <th>Alamat Pindah</th>
            <td>:</td>
            <td><textarea name="alamat" class="form-control" rows="10" required></textarea></td>
        </tr>

        <tr>
            <th>Desa / Kelurahan</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="desa" id="desa" required></td>
        </tr>

        <tr>
            <th>Kecamatan</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kecamatan" id="kecamatan" required></td>
        </tr>

        <tr>
            <th>Kota / Kabupaten</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kota" id="kota" required></td>
        </tr>

        <tr>
            <th>Provinsi</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="provinsi" id="provinsi" required></td>
        </tr>

        <tr>
            <th>Kode Pos</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kodePos" id="kodePos" required></td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php include('../_partials/bottom.php') ?>