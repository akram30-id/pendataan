<?php include('../_partials/top.php') ?>
<?php include('data-edit.php') ?>

<h1 class="page-header">Ubah Pengajuan Surat Pindah</h1>

<form action="update.php" method="post">
    <table class="table table-striped table-middle">
        <tr>
            <th>Alasan Pindah</th>
            <td>:</td>
            <td>
                <textarea name="alasan" class="form-control" rows="10" required><?= $res[0]['alasan'] ?></textarea>
                <input type="hidden" name="id_pindah" value="<?= $res[0]['id_pindah'] ?>">
                <input type="hidden" name="id_alamat_pindah" value="<?= $res[0]['id_alamat_pindah'] ?>">
            </td>
        </tr>

        <tr>
            <th>Alamat Pindah</th>
            <td>:</td>
            <td><textarea name="alamat" class="form-control" rows="10" required><?= $res[0]['alamat'] ?></textarea></td>
        </tr>

        <tr>
            <th>Desa / Kelurahan</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="desa" id="desa" value="<?= $res[0]['desa_kelurahan'] ?>" required></td>
        </tr>

        <tr>
            <th>Kecamatan</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kecamatan" id="kecamatan" value="<?= $res[0]['kecamatan'] ?>" required></td>
        </tr>

        <tr>
            <th>Kota / Kabupaten</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kota" id="kota" value="<?= $res[0]['kota_kabupaten'] ?>" required></td>
        </tr>

        <tr>
            <th>Provinsi</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="provinsi" id="provinsi" value="<?= $res[0]['provinsi'] ?>" required></td>
        </tr>

        <tr>
            <th>Kode Pos</th>
            <td>:</td>
            <td><input class="form-control" type="text" name="kodePos" id="kodePos" value="<?= $res[0]['kode_pos'] ?>" required></td>
        </tr>
    </table>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-floppy-save"></i> Simpan
    </button>
</form>

<?php include('../_partials/bottom.php') ?>