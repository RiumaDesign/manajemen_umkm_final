<div class="content-wrapper">
  <section class="content-header">
    <h1>Ulasan untuk: <?= $produk->nama_produk ?></h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <?php if (count($review_list) > 0): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama User</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($review_list as $r): ?>
                <tr>
                  <td><?= $r->nama ?></td>
                  <td>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                      <?= ($i <= $r->rating) ? '⭐' : '☆' ?>
                    <?php endfor; ?>
                  </td>
                  <td><?= $r->komentar ?></td>
                  <td><?= date('d M Y, H:i', strtotime($r->created_at)) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-info">Belum ada ulasan untuk produk ini.</div>
        <?php endif; ?>
        <a href="<?= base_url('user/produk/detail/' . $produk->id) ?>" class="btn btn-default">Kembali</a>
      </div>
    </div>
  </section>
</div>
