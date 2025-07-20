<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <h4>Informasi Pemesan</h4>
        <p>
          <strong>Nama:</strong> <?= $pesanan->nama_user ?> <br>
          <strong>Email:</strong> <?= $pesanan->email ?> <br>
          <strong>Status:</strong> <?= $pesanan->status ?> <br>
          <strong>Tanggal:</strong> <?= $pesanan->created_at ?>
        </p>

        <hr>

        <h4>Daftar Produk</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0; foreach ($detail as $d): 
              $subtotal = $d->harga * $d->jumlah;
              $total += $subtotal;
            ?>
            <tr>
              <td><img src="<?= base_url('uploads/' . $d->foto) ?>" width="70"></td>
              <td><?= $d->nama_produk ?></td>
              <td>Rp<?= number_format($d->harga, 0, ',', '.') ?></td>
              <td><?= $d->jumlah ?></td>
              <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="4" align="right"><strong>Total</strong></td>
              <td><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td>
            </tr>
          </tbody>
        </table>

        <br><br>
        <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-default">Kembali</a>
      </div>
    </div>
  </section>
</div>
