<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Produk <small>Manajemen Produk UMKM</small></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box">
      <div class="box-header with-border">
        <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary">
          <i class="fa fa-plus"></i> Tambah Produk
        </a>

        <!-- Filter kategori -->
        <div class="pull-right">
          <form action="<?= base_url('admin/produk') ?>" method="get" class="form-inline">
            <label>Filter Kategori:</label>
            <select name="kategori" class="form-control">
              <option value="">Semua</option>
              <?php foreach ($kategori_all as $k): ?>
                <option value="<?= $k->id ?>" <?= ($this->input->get('kategori') == $k->id) ? 'selected' : '' ?>>
                  <?= $k->nama_kategori ?>
                </option>
              <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-default">Tampilkan</button>
          </form>
        </div>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($produk as $p): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama_produk ?></td>
                <td>Rp<?= number_format($p->harga, 0, ',', '.') ?></td>
                <td><?= $p->stok ?></td>
                <td><?= (function_exists('word_limiter') ? word_limiter($p->deskripsi, 10) : $p->deskripsi) ?></td>
                <td>
                  <?php
                    $kategori = $this->db->select('nama_kategori')
                      ->from('tb_kategori')
                      ->join('tb_produk_kategori', 'tb_kategori.id = tb_produk_kategori.id_kategori')
                      ->where('tb_produk_kategori.id_produk', $p->id)
                      ->get()->result();

                    foreach ($kategori as $k) {
                      echo '<span class="label label-info" style="margin:1px 2px;">' . $k->nama_kategori . '</span>';
                    }
                  ?>
                </td>
                <td>
                  <?php if ($p->foto): ?>
                    <img src="<?= base_url('uploads/' . $p->foto) ?>" width="70" class="img-thumbnail">
                  <?php else: ?>
                    <em>Belum ada</em>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= base_url('admin/produk/edit/' . $p->id) ?>" class="btn btn-warning btn-sm">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                  <a href="<?= base_url('admin/produk/hapus/' . $p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                    <i class="fa fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
