<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Total Item</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pesanan as $o): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= date('d-m-Y H:i', strtotime($o->created_at)) ?></td>
                <td><?= $o->total_item ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
