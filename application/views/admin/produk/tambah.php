<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Produk</h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Produk</h3>
      </div>

      <form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required min="0">
          </div>

          <div class="form-group">
            <label>Stok Produk</label>
            <input type="number" name="stok" class="form-control" min="0" value="0" required>
            <small class="text-muted">Nilai minimal 0. Tidak boleh negatif.</small>
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tulis deskripsi produk..."></textarea>
          </div>

          <div class="form-group">
            <label>Foto Produk</label>
            <input type="file" name="foto" class="form-control">
            <small class="text-muted">Tipe yang diizinkan: jpg, jpeg, png, webp</small>
          </div>

          <div class="form-group">
            <label>Kategori Produk</label><br>
            <?php foreach ($kategori as $k): ?>
              <label class="checkbox-inline">
                <input type="checkbox" name="kategori[]" value="<?= $k->id ?>"> <?= $k->nama_kategori ?>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('admin/produk') ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </section>
</div>
