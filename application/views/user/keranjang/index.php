<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="box">
      <div class="box-body">
        <form action="<?= base_url('user/keranjang/checkout') ?>" method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              $stok_aman = true;

              foreach ($keranjang as $item):
                $subtotal = $item->harga * $item->jumlah;
                $total += $subtotal;

                // Ambil stok saat ini (asumsikan sudah join di controller atau bisa dilakukan query di sini)
                $stok_produk = $this->db->get_where('tb_produk', ['id' => $item->id_produk])->row();
                $stok_valid = $stok_produk && $stok_produk->stok >= $item->jumlah;
                if (!$stok_valid) $stok_aman = false;
              ?>
                <tr>
                  <td><?= $item->nama_produk ?>
                    <?php if (!$stok_valid): ?>
                      <span class="label label-danger">Stok tidak cukup</span>
                    <?php endif; ?>
                  </td>
                  <td>Rp<?= number_format($item->harga, 0, ',', '.') ?></td>
                  <td><?= $item->jumlah ?></td>
                  <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                  <td>
                    <a href="<?= base_url('user/keranjang/hapus/' . $item->id_keranjang) ?>" class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>

              <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td>
              </tr>
            </tbody>
          </table>

          <?php if (!empty($keranjang)): ?>
            <?php if ($stok_aman): ?>
              <button type="submit" class="btn btn-primary">Checkout Sekarang</button>
            <?php else: ?>
              <div class="alert alert-warning">
                Beberapa produk memiliki stok tidak mencukupi. Silakan sesuaikan jumlah atau hapus produk tersebut sebelum melanjutkan checkout.
              </div>
            <?php endif; ?>
          <?php else: ?>
            <p class="text-muted">Keranjang masih kosong.</p>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </section>
</div>
