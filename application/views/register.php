<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register User - UMKM</title>
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <style>
    .register-box {
      margin-top: 60px;
    }
  </style>
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="register-logo">
    <b>UMKM</b> Register
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Daftar sebagai User</p>

    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('home/register_aksi') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="konfirmasi" id="konfirmasi" class="form-control" placeholder="Konfirmasi Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" onclick="togglePassword()"> Show Password
        </label>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block btn-flat">Daftar</button>
        </div>
      </div>
    </form>

    <div class="text-center mt-3">
      <a href="<?= base_url('home') ?>">Sudah punya akun? Login</a>
    </div>
  </div>
</div>

<script>
function togglePassword() {
  var pw = document.getElementById("password");
  var konf = document.getElementById("konfirmasi");
  pw.type = pw.type === "password" ? "text" : "password";
  konf.type = konf.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
