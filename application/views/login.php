<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login UMKM</title>
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <style>
    .login-box {
      margin-top: 80px;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>UMKM</b> Manajemen
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Masukkan username dan password</p>

    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('home/auth') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" onclick="togglePassword()"> Show Password
        </label>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
function togglePassword() {
  var x = document.getElementById("password");
  x.type = x.type === "password" ? "text" : "password";
}
</script>
</body>
</html>
