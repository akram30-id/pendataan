<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Warga</h1>
<?php include('_partials/menu.php') ?>

<form action="store.php" method="post">
  <h3>A. Data Pribadi</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">NIK</th>
      <td width="1%">:</td>
      <td><input type="number" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" maxlength="16" class="form-control" name="nik_warga" required></td>
    </tr>
    <tr>
      <th>Nama Warga</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="nama_warga" required></td>
    </tr>
    <tr>
      <th>Tempat Lahir</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="tempat_lahir_warga" required></td>
    </tr>
    <tr>
      <th>Tanggal Lahir</th>
      <td>:</td>
      <td><input type="text" class="form-control datepicker" name="tanggal_lahir_warga" required></td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="jenis_kelamin_warga" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Kewarganegaraan</th>
      <td>:</td>
      <td><input type="text" placeholder="Contoh: Indonesia" class="form-control" name="negara_warga"></td>
    </tr>
  </table>

  <h3>B. Data Alamat</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Alamat KTP</th>
      <td width="1%">:</td>
      <td><textarea class="form-control" name="alamat_ktp_warga" required></textarea></td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>:</td>
      <td><textarea class="form-control" name="alamat_warga" required></textarea></td>
    </tr>
    <tr>
    <tr>
      <th>Dusun</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="dusun" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Dusun I">Dusun I</option>
          <option value="Dusun II">Dusun II</option>
          <option value="Dusun III">Dusun III</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Desa/Kelurahan</th>
      <td>:</td>
      <td><input type="text" class="form-control" value="Tetehosi Sorowi" name="desa_kelurahan_warga"></td>
    </tr>
    <tr>
      <th>Kecamatan</th>
      <td>:</td>
      <td><input type="text" class="form-control" value="Lahewa Timur" name="kecamatan_warga"></td>
    </tr>
    <tr>
      <th>Kabupaten/Kota</th>
      <td>:</td>
      <td><input type="text" class="form-control" value="Kabupaten Nias Utara" name="kabupaten_kota_warga"></td>
    </tr>
    <tr>
      <th>Provinsi</th>
      <td>:</td>
      <td><input type="text" class="form-control" value="Sumatera Utara" name="provinsi_warga"></td>
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

  <h3>C. Data Lain-lain</h3>
  <table class="table table-striped table-middle">
    <tr>
      <th width="20%">Agama</th>
      <td width="1%">:</td>
      <td>
        <select class="form-control selectlive" name="agama_warga" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katholik">Katholik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Pendidikan Terakhir</th>
      <td>:</td>
      <td>
        <select class="form-control selectlive" name="pendidikan_terakhir_warga" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Tidak Sekolah">Tidak Sekolah</option>
          <option value="Tidak Tamat SD">Tidak Tamat SD</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="D1">D1</option>
          <option value="D2">D2</option>
          <option value="D3">D3</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Pekerjaan</th>
      <td>:</td>
      <td><input type="text" class="form-control" name="pekerjaan_warga"></td>
    </tr>
    <tr>
      <th>Status Perkawinan</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="status_perkawinan_warga" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Kawin">Kawin</option>
          <option value="Tidak Kawin">Tidak Kawin</option>
        </select>
      </td>
    </tr>
    <tr>
      <th>Status Tinggal</th>
      <td>:</td>
      <td>
        <select class="form-control selectpicker" name="status_warga" required>
          <option value="" selected disabled>- pilih -</option>
          <option value="Tetap">Tetap</option>
          <option value="Kontrak">Kontrak</option>
        </select>
      </td>
    </tr>
  </table>

  <button type="submit" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-floppy-save"></i> Simpan
  </button>
</form>

<?php include('../_partials/bottom.php') ?>