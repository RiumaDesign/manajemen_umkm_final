<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-info"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Informasi Akun</h3>
      </div>
      <div class="box-body">
<table class="table">
  <tr><th>Nama</th><td><?= $user->nama ?></td></tr>
  <tr><th>Username</th><td><?= $user->username ?></td></tr>
  <tr><th>Email</th><td><?= $user->email ?></td></tr>
  <tr><th>Level</th><td><?= $user->level ?></td></tr>
  <tr><th>Status Login</th><td><?= $user->login ?></td></tr>
</table>
      </div>
    </div>

<hr>
<h4>Ubah Password</h4>
<form method="post" action="<?= base_url('user/profil/update_password') ?>">
  <div class="form-group">
    <label>Password Baru</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Konfirmasi Password</label>
    <input type="password" name="konfirmasi_password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-warning">Ubah Password</button>
</form>

    </div>
  </section>
</div>
