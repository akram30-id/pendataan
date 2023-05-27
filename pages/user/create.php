<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data User</h1>
<?php include('_partials/menu.php') ?>

<form action="store.php" method="post">
  <h3>A. Data Pribadi</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Nama User</th>
      <td width="1%">:</td>
      <td><input type="text" class="form-control" name="nama_user" required></td>
    </tr>
    <tr>
      <th>Username</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="username_user" required></td>
    </tr>
    <tr>
      <th>Password</th>
      <td>:</td>
      <td><input type="password" class="form-control" name="password_user" required></td>
    </tr>
    <tr>
      <th>Keterangan</th>
      <td>:</td>
      <td><textarea class="form-control" name="keterangan_user"></textarea></td>
    </tr>
    <tr>
      <th>Status</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" id="select-role" name="status_user" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Admin">Admin</option>
          <option value="RT">RT</option>
          <option value="RW">RW</option>
        </select>
      </td>
    </tr>
  </table>

  <h3>B. Data Alamat</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Desa/Kelurahan</th>
      <td width="1%">:</td>
      <td><input type="text" class="form-control" name="desa_kelurahan_user" disabled value="Dusun II Desa Tetehosi Sorowi"></td>
    </tr>
    <tr>
      <th>Kecamatan</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="kecamatan_user" disabled value="Lahewa Timur"></td>
    </tr>
    <tr>
      <th>Kabupaten/Kota</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="kabupaten_kota_user" disabled value="Nias Utara"></td>
    </tr>
    <tr>
      <th>Provinsi</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="provinsi_user" disabled value="Sumatera Utara"></td>
    </tr>
    <tr>
      <th>Negara</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="negara_user" disabled value="Indonesia"></td>
    </tr>
    <tr>
      <th>RT</th>
      <td>:</td>
      <td>
        <select name="rt_user" class="form-control">
          <option value="001">001</option>
          <option value="002">002</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>RW</th>
      <td>:</td>
      <td>
        <select name="rw_user" class="form-control">
          <option value="001">001</option>
          <option value="002">002</option>
          <option value="003">003</option>
        </select>
      </td>
    </tr>
  </table>

  <button type="submit" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-floppy-save"></i> Simpan
  </button>
</form>

<?php include('../_partials/bottom.php') ?>