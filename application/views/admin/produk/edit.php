<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Produk</h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit Produk</h3>
      </div>

      <form action="<?= base_url('admin/produk/update/' . $produk->id) ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="<?= isset($produk->nama_produk) ? $produk->nama_produk : '' ?>" required>
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= isset($produk->harga) ? $produk->harga : '' ?>" required min="0">
          </div>

          <div class="form-group">
            <label>Stok Produk</label>
            <input type="number" name="stok" class="form-control" value="<?= isset($produk->stok) ? $produk->stok : 0 ?>" required min="0">
            <small class="text-muted">Nilai minimal 0. Tidak boleh negatif.</small>
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"><?= isset($produk->deskripsi) ? $produk->deskripsi : '' ?></textarea>
          </div>

          <div class="form-group">
            <label>Foto Produk</label>
            <input type="file" name="foto" class="form-control">
            <?php if (!empty($produk->foto)): ?>
              <p>Foto saat ini:</p>
              <img src="<?= base_url('uploads/' . $produk->foto) ?>" width="120" class="img-thumbnail">
            <?php endif; ?>
          </div>

          <div class="form-group">
            <label>Kategori Produk</label><br>
            <?php foreach ($kategori as $k): ?>
              <label class="checkbox-inline">
                <input type="checkbox" name="kategori[]" value="<?= $k->id ?>" <?= in_array($k->id, $produk_kategori) ? 'checked' : '' ?>>
                <?= $k->nama_kategori ?>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= base_url('admin/produk') ?>" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </section>
</div>
