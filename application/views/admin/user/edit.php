<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit User <small>Form ubah akun pengguna</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-body">
        <form action="<?= base_url('admin/user/update/' . $user->id) ?>" method="post">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>" required>
          </div>

            <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $user->email ?>" required>
          </div>

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
          </div>

          <div class="form-group">
            <label>Password <small>(Kosongkan jika tidak diubah)</small></label>
            <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control" required>
              <option value="Admin" <?= $user->level == 'Admin' ? 'selected' : '' ?>>Admin</option>
              <option value="User" <?= $user->level == 'User' ? 'selected' : '' ?>>User</option>
            </select>
          </div>

          <div class="form-group">
            <label>Status Login</label>
            <select name="login" class="form-control" required>
              <option value="Ya" <?= $user->login == 'Ya' ? 'selected' : '' ?>>Ya</option>
              <option value="Tidak" <?= $user->login == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
            </select>
          </div>

          <a href="<?= base_url('admin/user') ?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </section>
</div>
