<div class="content-wrapper">
  <section class="content-header">
    <h1>Beri Ulasan</h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-info"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-body">
        <h4><?= $produk->nama_produk ?></h4>
        <p><strong>Harga:</strong> Rp<?= number_format($produk->harga, 0, ',', '.') ?></p>

        <form action="<?= base_url('user/review/simpan') ?>" method="post">
          <input type="hidden" name="id_produk" value="<?= $produk->id ?>">

          <div class="form-group">
            <label for="rating">Rating (1 - 5)</label>
            <select name="rating" id="rating" class="form-control" required>
              <option value="">Pilih Rating</option>
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>" <?= ($review && $review->rating == $i) ? 'selected' : '' ?>><?= $i ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" id="komentar" rows="4" class="form-control" placeholder="Tulis ulasan Anda..."><?= $review->komentar ?? '' ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
          <a href="<?= base_url('user/produk/detail/' . $produk->id) ?>" class="btn btn-default">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
