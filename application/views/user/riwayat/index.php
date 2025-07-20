<div class="content-wrapper">
  <section class="content-header">
    <h1>Riwayat Pesanan</h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Total Item</th>
              <th>Aksi</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($riwayat as $r): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d M Y H:i', strtotime($r->created_at)) ?></td>
                <td><?= $r->total_item ?> item (<?= $r->total_produk ?> jenis)</td>
                <td>
                  <a href="<?= base_url('user/riwayat/detail/' . $r->id) ?>" class="btn btn-info btn-sm">Detail</a>
                </td>
                <td><?= $r->status ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
