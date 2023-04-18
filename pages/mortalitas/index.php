<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Kematian</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-index.php') ?>

<table class="table table-striped table-condensed table-hover" id="datatable">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Warga</th>
      <th>Tanggal Meninggal</th>
      <th>Lokasi Pemakaman</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php foreach ($res as $data) : ?>

    <tr>
      <td><?php echo $nomor++ ?>.</td>
      <td><?php echo $data['nama_warga'] ?></td>
      <td><?php echo date('d F Y', strtotime($data['tgl_kematian'])) ?></td>
      <td><?php echo $data['lokasi_pemakaman'] ?></td>
      <td>
        <!-- Single button -->
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <span class="caret"></span>
          </button>
          <ul class="dropdown-menu pull-right" role="menu">
            <?php if ($_SESSION['user']['status_user'] != 'RW'): ?>
            <li>
              <a href="edit.php?id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </li>
            <li>
              <a href="#" onclick="hapus(<?= $data['id_warga'] ?>)"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
            </li>
            <?php endif; ?>
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
</script>

<?php include('../_partials/bottom.php') ?>
