<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Kategori <small>Manajemen Kategori Produk</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success">
        <?= htmlspecialchars($this->session->flashdata('pesan'), ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <div class="box">
      <div class="box-header with-border">
        <a href="<?= site_url('admin/kategori/tambah') ?>" class="btn btn-primary">
          <i class="fa fa-plus"></i> Tambah Kategori
        </a>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width: 5%;">#</th>
              <th>Nama Kategori</th>
              <th style="width: 20%;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($kategori)): ?>
              <?php $no = 1; foreach ($kategori as $k): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($k->nama_kategori, ENT_QUOTES, 'UTF-8') ?></td>
                  <td>
                    <a href="<?= site_url('admin/kategori/edit/' . $k->id) ?>" class="btn btn-warning btn-sm">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="<?= site_url('admin/kategori/hapus/' . $k->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">
                      <i class="fa fa-trash"></i> Hapus
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">Belum ada data kategori.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>