<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah User <small>Form tambah akun pengguna</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-body">
        <form action="<?= base_url('admin/user/simpan') ?>" method="post">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
  <label>Email</label>
  <input type="email" name="email" class="form-control" required>
</div>

          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control" required>
              <option value="">-- Pilih Level --</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>

          <div class="form-group">
            <label>Status Login</label>
            <select name="login" class="form-control" required>
              <option value="Ya">Ya</option>
              <option value="Tidak">Tidak</option>
            </select>
          </div>

          <a href="<?= base_url('admin/user') ?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('admin/templates/footer'); ?>
