<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
      </div>
    <?php endif; ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Notifikasi</h3>
      </div>

      <div class="box-body">
        <?php if (!empty($notifikasi)): ?>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pesan</th>
                <th>Waktu</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($notifikasi as $n): ?>
                <tr class="<?= ($n->dibaca == 0) ? 'bg-warning' : '' ?>">
                  <td><?= $no++ ?></td>
                  <td><strong><?= $n->judul ?></strong></td>
                  <td><?= $n->pesan ?></td>
                  <td><?= date('d M Y H:i', strtotime($n->dibuat)) ?></td>
                  <td>
                    <?= ($n->dibaca == 0) ? '<span class="label label-warning">Belum Dibaca</span>' : '<span class="label label-success">Sudah Dibaca</span>' ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p class="text-muted">Tidak ada notifikasi saat ini.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
