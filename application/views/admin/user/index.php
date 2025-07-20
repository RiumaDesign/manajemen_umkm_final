<div class="content-wrapper">
  <section class="content-header">
    <h1>Data User <small>Kelola akun pengguna</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary btn-sm">
          <i class="fa fa-plus"></i> Tambah User
        </a>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Level</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($user as $u): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $u->nama ?></td>
                <td><?= $u->username ?></td>
                <td><?= $u->level ?></td>
                <td><?= $u->login ?></td>
                <td>
                  <a href="<?= base_url('admin/user/edit/' . $u->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                  <a href="<?= base_url('admin/user/hapus/' . $u->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
