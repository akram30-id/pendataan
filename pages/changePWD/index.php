<?php include('../_partials/top.php') ?>

<?php
date_default_timezone_set('Asia/Jakarta');
include('data-index.php');
include('../../config/env.php');
?>

<h1 class="page-header">Ganti Password</h1>

<div class="row">
    <div class="col-md-8">
        <form action="update.php" method="POST">
            <div class="form-group">
                <label for="oldPassword">Password Lama</label>
                <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Password Lama" required>
            </div>
            <div class="form-group">
                <label for="newPassword">Password Baru</label>
                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Password Baru" required>
            </div>
            <div class="form-group">
                <label for="confirmNewPassword">Konfirmasi Password Baru</label>
                <input type="password" name="confirmNewPassword" class="form-control" id="confirmNewPassword" placeholder="Konfirmasi Password" required>
            </div>
            <div class="checkbox" style="margin-bottom: 32px;">
                <label>
                    <input type="checkbox" id="show"> Tampilkan Password
                </label>
            </div>
            <button type="submit" class="btn btn-default">Update Password</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('show').addEventListener('change', (event) => {
        if (event.currentTarget.checked) {
            document.getElementById('oldPassword').setAttribute('type', 'text')
            document.getElementById('newPassword').setAttribute('type', 'text')
            document.getElementById('confirmNewPassword').setAttribute('type', 'text')
        } else {
            document.getElementById('oldPassword').setAttribute('type', 'password')
            document.getElementById('newPassword').setAttribute('type', 'password')
            document.getElementById('confirmNewPassword').setAttribute('type', 'password')
        }
    })
</script>

<?php include('../_partials/bottom.php') ?>