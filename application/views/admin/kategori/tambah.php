<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Kategori <small>Form input data kategori</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Kategori</h3>
      </div>

      <form action="<?= base_url('admin/kategori/simpan') ?>" method="post">
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
          </div>
        </div>
        <div class="box-footer">
          <a href="<?= base_url('admin/kategori') ?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('admin/templates/footer'); ?>
