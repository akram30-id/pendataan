<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Surat Pengantar</h1>
<?php include('_partials/menu.php') ?>

<?php
if ($_SESSION['user']['status_user'] === 'Warga' || $_SESSION['user']['status_user'] === 'Admin') {
  include('data-index.php');
}

if ($_SESSION['user']['status_user'] === 'RT') {
  include('data-index-rt.php');
}

if ($_SESSION['user']['status_user'] === 'RW') {
  include('data-index-rw.php');
}

?>

<?php if ($_SESSION['user']['status_user'] === 'Warga') ?>
<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Warga</th>
      <th>Keperluan</th>
      <th>TTD RT</th>
      <th>TTD RW</th>
      <th>Tanggal Pengajuan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($res as $data) : ?>

      <tr>
        <td><?php echo $nomor++ ?>.</td>
        <td><?php echo $data['nama_warga'] ?></td>
        <td><?= $data['keperluan'] ?></td>
        <td><?= $data['ttd_rt'] == NULL ? "Belum" : "Sudah"; ?></td>
        <td><?= $data['ttd_rw'] == NULL ? "Belum" : "Sudah"; ?></td>
        <td><?= date('d F Y', strtotime($data['created_at'])) ?> Pukul <?= date('H:i:s', strtotime($data['created_at'])) ?></td>
        <td>
          <!-- Single button -->
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <?php if ($_SESSION['user']['status_user'] !== 'Warga') { ?>
                <?php if ($_SESSION['user']['status_user'] === 'RT') {
                  if ($data['ttd_rt'] === NULL) { ?>
                    <li>
                      <a href="#" onclick="approve(<?= $data['id_pengantar'] ?>, 'RT', <?= $data['rt_warga'] ?>, <?= $data['rw_warga'] ?>)"><span class="glyphicon glyphicon-ok"></span> Approve</a>
                    </li>
                <?php }
                } ?>
                <?php if ($_SESSION['user']['status_user'] === 'RW') {
                  if ($data['ttd_rw'] === NULL) { ?>
                    <li>
                      <a href="#" onclick="approve(<?= $data['id_pengantar'] ?>, 'RW', <?= $data['rt_warga'] ?>, <?= $data['rw_warga'] ?>)"><span class="glyphicon glyphicon-ok"></span> Approve</a>
                    </li>
                <?php }
                } ?>
                <li>
                  <a href="cetak.php?id=<?php echo $data['id_pengantar'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </li>
              <?php } else { ?>
                <li>
                  <a href="edit.php?id=<?php echo $data['id_pengantar'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </li>
                <li>
                  <a href="cetak.php?id=<?php echo $data['id_pengantar'] ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </li>
                <li>
                  <a href="#" onclick="hapus(<?= $data['id_pengantar'] ?>)"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
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

  function approve(id, role, rt, rw) {
    const text = "Apakah Anda Yakin Ingin Approve Pengajuan Surat Pengantar Ini?"
    if (confirm(text)) {
      window.location.href = `approve.php?id=${id}&role=${role}&rt=${rt}&rw=${rw}`
    } else {
      alert('OK')
    }
  }
</script>

<?php include('../_partials/bottom.php') ?>