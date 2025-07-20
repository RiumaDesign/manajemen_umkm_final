<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">

    <!-- ✅ FORM TAMBAH KE KERANJANG -->
    <?php if (!$stok_habis): ?>
      <form action="<?= base_url('user/keranjang/tambah') ?>" method="post" style="margin-bottom: 15px;">
        <input type="hidden" name="id_produk" value="<?= $produk->id ?>">
        <input type="number" name="jumlah" value="1" min="1" max="<?= $produk->stok ?>" class="form-control" style="width:80px; display:inline-block" required>
        <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
        <button type="button" class="btn btn-warning" id="add-wishlist-btn" data-id="<?= $produk->id ?>">Tambah ke Wishlist</button>
      </form>
    <?php else: ?>
      <div class="alert alert-danger">
        <strong>Stok Habis:</strong> Produk ini saat ini tidak tersedia.
      </div>
      <button class="btn btn-secondary" disabled>Tambah ke Keranjang</button>
      <button type="button" class="btn btn-warning" id="add-wishlist-btn" data-id="<?= $produk->id ?>">Tambah ke Wishlist</button>
    <?php endif; ?>

    <!-- BOX DETAIL -->
    <div class="box box-primary">
      <div class="box-body">
        <?php if ($produk): ?>
          <div class="row">
            <div class="col-md-4">
              <?php if ($produk->foto): ?>
                <img src="<?= base_url('uploads/' . $produk->foto) ?>" class="img-responsive img-thumbnail">
              <?php else: ?>
                <em>Foto tidak tersedia</em>
              <?php endif; ?>
            </div>
            <div class="col-md-8">
              <h3><?= $produk->nama_produk ?></h3>
              
              <!-- ⭐ RATING RATA-RATA -->
              <?php if (isset($produk->avg_rating)): ?>
                <p>
                  <strong>Rating:</strong>
                  <?php
                  $avg = round($produk->avg_rating);
                  for ($i = 1; $i <= 5; $i++) {
                    echo ($i <= $avg) ? '⭐' : '☆';
                  }
                  ?>
                  <small>(<?= number_format($produk->avg_rating, 1) ?>/5)</small>
                </p>
              <?php endif; ?>

              <p><strong>Harga:</strong> Rp<?= number_format($produk->harga, 0, ',', '.') ?></p>
              <p><strong>Stok:</strong> <?= $produk->stok ?> item</p>
              <p><strong>Deskripsi:</strong> <?= $produk->deskripsi ?></p>
              <p><strong>Kategori:</strong>
                <?php foreach ($kategori as $k): ?>
                  <span class="label label-info"><?= $k->nama_kategori ?></span>
                <?php endforeach; ?>
              </p>

              <a href="<?= base_url('user/produk') ?>" class="btn btn-default">Kembali</a>
              <a href="<?= base_url('user/review/lihat/' . $produk->id) ?>" class="btn btn-info">Lihat Review</a>

              <?php if ($pernah_beli): ?>
                <a href="<?= base_url('user/review/form/' . $produk->id) ?>" class="btn btn-success">Tulis Review</a>
              <?php endif; ?>
            </div>
          </div>
        <?php else: ?>
          <div class="alert alert-warning">Produk tidak ditemukan.</div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- AJAX Tambah Wishlist -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#add-wishlist-btn').click(function() {
    const id_produk = $(this).data('id');
    $.post("<?= base_url('user/wishlist/tambah_ajax') ?>", { id_produk: id_produk }, function(response) {
      if (response.status === 'success') {
        $('#add-wishlist-btn').html("❤️ Sudah di Wishlist").removeClass("btn-warning").addClass("btn-danger");
      } else if (response.status === 'duplicate') {
        alert("⚠️ Produk sudah ada di wishlist.");
      } else {
        alert("❌ Gagal menambahkan ke wishlist.");
      }
    }, 'json');
  });
</script>
