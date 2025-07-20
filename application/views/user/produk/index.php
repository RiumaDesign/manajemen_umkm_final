<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <form action="<?= base_url('user/produk') ?>" method="get" class="form-inline pull-right">
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

      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($produk as $p): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td width="80">
                  <?php if ($p->foto): ?>
                    <img src="<?= base_url('uploads/' . $p->foto) ?>" width="70">
                  <?php else: ?>
                    <em>Belum ada</em>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= base_url('user/produk/detail/' . $p->id) ?>">
                    <?= $p->nama_produk ?>
                  </a><br>
                  <?php if (!empty($p->avg_rating)): ?>
                    <?php
                      $avg = round($p->avg_rating);
                      for ($i = 1; $i <= 5; $i++) {
                        echo ($i <= $avg) ? '⭐' : '☆';
                      }
                    ?>
                    <br><small><?= number_format($p->avg_rating, 1) ?>/5 dari <?= $p->total_review ?> ulasan</small>
                  <?php else: ?>
                    <small class="text-muted">Belum ada ulasan</small>
                  <?php endif; ?>
                </td>
                <td>Rp<?= number_format($p->harga, 0, ',', '.') ?></td>
                <td>
                  <?php if ($p->stok > 0): ?>
                    <?= $p->stok ?>
                  <?php else: ?>
                    <span class="label label-danger">Habis</span>
                  <?php endif; ?>
                </td>
                <td><?= word_limiter($p->deskripsi, 15) ?></td>
                <td>
                  <!-- Tombol Wishlist -->
                  <button 
                    type="button" 
                    class="btn btn-xs btn-default wishlist-btn" 
                    data-id="<?= $p->id ?>" 
                    data-added="false">
                    🤍 Wishlist
                  </button>

                  <!-- Form Tambah ke Keranjang -->
                  <?php if ($p->stok > 0): ?>
                    <form action="<?= base_url('user/keranjang/tambah') ?>" method="post" style="margin-top:5px;">
                      <input type="hidden" name="id_produk" value="<?= $p->id ?>">
                      <input type="number" name="jumlah" value="1" min="1" max="<?= $p->stok ?>" class="form-control input-sm" style="width: 60px; display:inline-block" required>
                      <button type="submit" class="btn btn-xs btn-success">+ Keranjang</button>
                    </form>
                  <?php else: ?>
                    <div class="text-muted" style="margin-top:5px;">Stok kosong</div>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- AJAX Wishlist Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $('.wishlist-btn').click(function(){
    const btn = $(this);
    const id_produk = btn.data('id');

    if (btn.data('added') === true) {
      alert("✅ Produk sudah ada di wishlist.");
      return;
    }

    $.post("<?= base_url('user/wishlist/tambah_ajax') ?>", {id_produk: id_produk}, function(response){
      if (response.status === 'success' || response.status === 'duplicate') {
        btn.html("❤️ Sudah di Wishlist");
        btn.removeClass("btn-default").addClass("btn-danger");
        btn.data('added', true);
      } else {
        alert("❌ Gagal menambahkan ke wishlist.");
      }
    }, 'json');
  });
});
</script>
