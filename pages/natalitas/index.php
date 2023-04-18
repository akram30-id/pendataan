<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kelahiran</h1>
<?php include('_partials/menu.php') ?>

<?php
include('data.php');

?>

<button style="margin-bottom: 16px;">Tambah</button>
<table class="table table-striped table-condensed table-hover" id="datatable">
    <thead>
        <th>No</th>
        <th>NIK</th>
        <th>Orang Tua</th>
        <th>Nama Anak</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Kelahiran</th>
        <th>###</th>
    </thead>
    <tbody>
        <?php
        foreach ($data_kelahiran as $key) {
            $no = 1;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $key['nik_warga'] ?></td>
                <td><?= $key['nama_warga'] ?></td>
                <td><?= $key['nama'] ?></td>
                <td><?= $key['jenis_kelamin'] ?></td>
                <td><?= date('d F Y', strtotime($key['tgl_kelahiran'])) ?></td>
                <td>
                    <!-- Single button -->
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="show.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>"><i class="glyphicon glyphicon-sunglasses"></i> Detail</a>
                            </li>
                            <li>
                                <a href="cetak-show.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                            </li>
                            <?php if ($_SESSION['user']['status_user'] != 'RW') : ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="delete.php?id_mutasi=<?php echo $mutasi['id_mutasi'] ?>" onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="glyphicon glyphicon-trash"></i> Hapus
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('../_partials/bottom.php') ?>