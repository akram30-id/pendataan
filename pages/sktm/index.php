<?php include('../_partials/top.php') ?>

<?php
date_default_timezone_set('Asia/Jakarta');
include('data-index.php');
include('../../config/env.php');
?>

<h1 class="page-header">Surat Keterangan Tidak Mampu</h1>
<?php include('_partials/menu.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Warga</th>
            <th>NIK</th>
            <th>Tempat/Tgl. Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($res as $data) { ?>
            <td><?php echo $nomor++ ?>.</td>
            <td><?php echo $data['nama_warga'] ?></td>
            <td><?php echo $data['nik_warga'] ?></td>
            <td><?php echo $data['tempat_lahir_warga'] . ", " . date('j', strtotime($data['tanggal_lahir_warga'])) . " " . month(date('n', strtotime($data['tanggal_lahir_warga']))) . " " . date('Y', strtotime($data['tanggal_lahir_warga'])) ?></td>
            <td><?= $data['jenis_kelamin_warga'] == "L" ? "Laki-Laki" : "Perempuan"; ?></td>
            <td><?= $data['alamat_warga'] ?></td>
            <td><?= $data['ttd_kades'] == NULL ? "Belum Approve" : "Sudah Approve"; ?></td>
            <td><?= date('d', strtotime($data['created_at'])) . " " . month(date('n', strtotime($data['created_at']))) . " " . date('Y', strtotime($data['created_at'])) ?> Pukul <?= date('H:i:s', strtotime($data['created_at'])) ?></td>
            <td>
                <!-- Single button -->
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="cetak.php?id=<?php echo $data['id_sktm'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                        </li>
                        <?php if ($_SESSION['user']['status_user'] === 'Admin') { ?>
                            <li>
                                <a href="<?= base_url('pages/warga/show.php?id_warga=' . $data['id_warga']) ?>"><span class="glyphicon glyphicon-user"></span> Detail</a>
                            </li>
                            <?php if ($data['ttd_kades'] == NULL) { ?>
                                <li>
                                    <a href="#" onclick="approve(<?= $data['id_sktm'] ?>)"><span class="glyphicon glyphicon-ok"></span> Approve</a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>
                                <a href="#" onclick="hapus(<?= $data['id_sktm'] ?>)"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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
        const text = "Apakah Anda Yakin Ingin Approve Pengajuan SKTM Ini?"
        if (confirm(text)) {
            window.location.href = `approve.php?id=${id}`
        } else {
            alert('OK')
        }
    }

    function tambah(id, thnLahir) {
        const text = "Ingin Mengajukan SKTM Terbaru?"
        if (confirm(text)) {
            window.location.href = `store.php?id=${id}&thn=${thnLahir}`
        } else {
            alert('OK')
        }
    }
</script>

<?php include('../_partials/bottom.php') ?>