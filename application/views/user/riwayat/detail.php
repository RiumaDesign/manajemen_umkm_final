<div class="content-wrapper">
  <section class="content-header">
    <h1>Detail Pesanan</h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <p><strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($pesanan->created_at)) ?></p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            foreach ($detail as $d):
              $subtotal = $d->jumlah * $d->harga;
              $total += $subtotal;
            ?>
            <tr>
              <td>
                <?php if ($d->foto): ?>
                  <img src="<?= base_url('uploads/' . $d->foto) ?>" width="50"><br>
                <?php endif; ?>
                <?= $d->nama_produk ?>
              </td>
              <td><?= $d->jumlah ?></td>
              <td>Rp<?= number_format($d->harga, 0, ',', '.') ?></td>
              <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3">Total</th>
              <th>Rp<?= number_format($total, 0, ',', '.') ?></th>
            </tr>
          </tfoot>
        </table>
        <a href="<?= base_url('user/riwayat') ?>" class="btn btn-default">Kembali</a>
      </div>
    </div>
  </section>
</div>
