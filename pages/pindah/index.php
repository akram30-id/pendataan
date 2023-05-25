<?php include('../_partials/top.php') ?>

<h1 class="page-header">Surat Kepindahan WNI</h1>
<?php include('_partials/menu.php') ?>

<?php
include('data-index.php');
include('../../config/env.php');
?>

<?php if ($_SESSION['user']['status_user'] === 'Warga') ?>
<table class="table table-striped table-condensed table-hover" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Warga</th>
            <th>NIK</th>
            <th>Tujuan Pindah</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Tanggal Pengajuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($res as $data) { ?>
            <td><?php echo $nomor++ ?>.</td>
            <td><?php echo $data['nama_warga'] ?></td>
            <td><?php echo $data['nik_warga'] ?></td>
            <td><?= $data['alamat'] ?>, <?= $data['desa_kelurahan'] ?>, <?= $data['kecamatan'] ?>, <?= $data['kota_kabupaten'] ?>, <?= $data['provinsi'] ?>. <?= $data['kode_pos'] ?></td>
            <td><?= $data['alasan'] ?></td>
            <td><?= $data['ttd_kades'] == NULL ? "Belum Approve" : "Sudah Approve"; ?></td>
            <td><?= date('d F Y', strtotime($data['created_at'])) ?> Pukul <?= date('H:i:s', strtotime($data['created_at'])) ?></td>
            <td>
                <!-- Single button -->
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <?php if ($_SESSION['user']['status_user'] === 'Admin') { ?>
                            <li>
                                <a href="<?= base_url('pages/warga/show.php?id_warga=' . $data['id_warga']) ?>"><span class="glyphicon glyphicon-user"></span> Detail</a>
                            </li>
                            <?php if ($data['ttd_kades'] == NULL) { ?>
                                <li>
                                    <a href="#" onclick="approve(<?= $data['id_pindah'] ?>)"><span class="glyphicon glyphicon-ok"></span> Approve</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="cetak.php?id=<?php echo $data['id_pindah'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                            </li>
                        <?php } else { ?>
                            <?php if ($data['ttd_kades'] == NULL) { ?>
                                <li>
                                    <a href="edit.php?id=<?php echo $data['id_pindah'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="cetak.php?id=<?php echo $data['id_pindah'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                            </li>
                            <li>
                                <a href="#" onclick="hapus(<?= $data['id_pindah'] ?>)"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    function hapus(id) {
        const text = "Apakah Anda Yakin Ingin Menghapus Data Ini?"
        if (confirm(text)) {
            window.location.href = `delete.php?id=${id}`
        } else {
            alert('OK')
        }
    }

    function approve(id) {
        const text = "Apakah Anda Yakin Ingin Approve Pengajuan Surat Pindah Ini?"
        if (confirm(text)) {
            window.location.href = `approve.php?id=${id}`
        } else {
            alert('OK')
        }
    }
</script>

<?php include('../_partials/bottom.php') ?>