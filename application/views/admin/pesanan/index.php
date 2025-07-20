<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>
  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan') ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>User</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Ubah Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach ($pesanan as $p): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $p->id_user ?></td>
          <td><?= date('d-m-Y H:i', strtotime($p->created_at)) ?></td>
          <td><strong><?= $p->status ?></strong></td>
          <td>
            <form action="<?= base_url('admin/pesanan/ubah_status/'.$p->id) ?>" method="post" class="form-inline">
              <select name="status" class="form-control input-sm">
                <option <?= $p->status == 'Dipesan' ? 'selected' : '' ?>>Dipesan</option>
                <option <?= $p->status == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                <option <?= $p->status == 'Dikirim' ? 'selected' : '' ?>>Dikirim</option>
                <option <?= $p->status == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
            <!-- Tombol Detail -->
            <a href="<?= base_url('admin/pesanan/detail/'.$p->id) ?>" class="btn btn-info btn-sm" style="margin-top:5px;">Detail</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>
