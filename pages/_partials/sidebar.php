<?php
function is_active($page)
{
  $uri = "$_SERVER[REQUEST_URI]";
  if (strpos($uri, $page)) {
    echo 'active';
  }
}
?>

<ul class="nav nav-sidebar">
  <li class="<?php is_active('dasbor'); ?>">
    <a href="../dasbor"><i class="glyphicon glyphicon-home"></i> Dasbor</a>
  </li>
</ul>

<ul class="nav nav-sidebar">
  <?php if ($_SESSION['user']['status_user'] === 'Admin') { ?>
    <li class="<?php is_active('warga'); ?>">
      <a href="../warga"><i class="glyphicon glyphicon-book"></i> Data Warga</a>
    </li>
    <li class="<?php is_active('kartu-keluarga'); ?>">
      <a href="../kartu-keluarga"><i class="glyphicon glyphicon-inbox"></i> Data Kartu Keluarga</a>
    </li>
    <!-- <li class="<?php is_active('mutasi'); ?>">
      <a href="../mutasi"><i class="glyphicon glyphicon-export"></i> Data Mutasi</a>
    </li> -->
    <li class="<?php is_active('mortalitas'); ?>">
      <a href="../mortalitas"><i class="glyphicon glyphicon-remove"></i> Data Mortalitas</a>
    </li>

    <li class="<?php is_active('rekap'); ?>">
      <a href="../rekap"><i class="glyphicon glyphicon-print"></i> Rekapitulasi Data</a>
    </li>

    <hr>

    <li class="<?php is_active('pengantar'); ?>">
      <a href="../pengantar"><i class="glyphicon glyphicon-envelope"></i> Surat Pengantar</a>
    </li>
    <li class="<?php is_active('pindah'); ?>">
      <a href="../pindah"><i class="glyphicon glyphicon-export"></i> Surat Keterangan Pindah</a>
    </li>
    <li class="<?php is_active('sktm'); ?>">
      <a href="../sktm"><i class="glyphicon glyphicon-heart"></i> SKTM</a>
    </li>
  <?php } ?>

  <?php if ($_SESSION['user']['status_user'] === 'Warga') { ?>
    <li class="<?php is_active('pengantar'); ?>">
      <a href="../pengantar"><i class="glyphicon glyphicon-envelope"></i> Surat Pengantar</a>
    </li>
    <li class="<?php is_active('pindah'); ?>">
      <a href="../pindah"><i class="glyphicon glyphicon-export"></i> Surat Keterangan Pindah</a>
    </li>
    <li class="<?php is_active('sktm'); ?>">
      <a href="../sktm"><i class="glyphicon glyphicon-heart"></i> SKTM</a>
    </li>
    <li class="<?php is_active('changePWD'); ?>">
      <a href="../changePWD"><i class="glyphicon glyphicon-user"></i> Ganti Password</a>
    </li>
  <?php } ?>

  <?php if ($_SESSION['user']['status_user'] === 'RT' || $_SESSION['user']['status_user'] === 'RW') { ?>
    <li class="<?php is_active('warga'); ?>">
      <a href="../warga"><i class="glyphicon glyphicon-book"></i> Data Warga</a>
    </li>
    <li class="<?php is_active('kartu-keluarga'); ?>">
      <a href="../kartu-keluarga"><i class="glyphicon glyphicon-inbox"></i> Data Kartu Keluarga</a>
    </li>
    <li class="<?php is_active('mutasi'); ?>">
      <a href="../mutasi"><i class="glyphicon glyphicon-export"></i> Data Mutasi</a>
    </li>
    <li class="<?php is_active('mortalitas'); ?>">
      <a href="../mortalitas"><i class="glyphicon glyphicon-remove"></i> Data Mortalitas</a>
    </li>
    <li class="<?php is_active('pengantar'); ?>">
      <a href="../pengantar"><i class="glyphicon glyphicon-envelope"></i> Surat Pengantar</a>
    </li>
  <?php } ?>
</ul>

<?php if ($_SESSION['user']['status_user'] == 'Admin') : ?>
  <ul class="nav nav-sidebar">
    <li class="<?php is_active('user'); ?>">
      <a href="../user"><i class="glyphicon glyphicon-user"></i> User</a>
    </li>
  </ul>
<?php endif; ?>