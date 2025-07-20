<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Kategori <small>Form ubah data kategori</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <form action="<?= base_url('admin/kategori/update/' . $kategori->id) ?>" method="post">
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" class="form-control" required>
          </div>
        </div>
        <div class="box-footer">
          <a href="<?= base_url('admin/kategori') ?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </section>
</div>

<?php $this->load->view('admin/templates/footer'); ?>
