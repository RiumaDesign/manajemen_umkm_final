<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <form method="get" class="form-inline">
      <select name="bulan" class="form-control">
        <?php for ($m = 1; $m <= 12; $m++): ?>
          <option value="<?= $m ?>" <?= ($bulan == $m) ? 'selected' : '' ?>>
            <?= date('F', mktime(0, 0, 0, $m, 10)) ?>
          </option>
        <?php endfor; ?>
      </select>
      <select name="tahun" class="form-control">
        <?php for ($y = 2022; $y <= date('Y'); $y++): ?>
          <option value="<?= $y ?>" <?= ($tahun == $y) ? 'selected' : '' ?>><?= $y ?></option>
        <?php endfor; ?>
      </select>
      <select name="status" class="form-control">
        <option <?= $status == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
        <option <?= $status == 'Dikirim' ? 'selected' : '' ?>>Dikirim</option>
      </select>
      <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <hr>

    <?php
    // Group total penjualan per produk
    $produk_totals = [];
    foreach ($laporan as $row) {
      if (!isset($produk_totals[$row->nama_produk])) {
        $produk_totals[$row->nama_produk] = 0;
      }
      $produk_totals[$row->nama_produk] += $row->subtotal;
    }
    ?>

    <canvas id="penjualanChart" height="100"></canvas>

    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($laporan as $row): ?>
        <tr>
          <td><?= $row->nama_produk ?></td>
          <td>Rp<?= number_format($row->harga) ?></td>
          <td><?= $row->jumlah ?></td>
          <td>Rp<?= number_format($row->subtotal) ?></td>
          <td><?= date('d-m-Y', strtotime($row->created_at)) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('penjualanChart').getContext('2d');
const chart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_keys($produk_totals)) ?>,
    datasets: [{
      label: 'Total Penjualan per Produk',
      data: <?= json_encode(array_values($produk_totals)) ?>,
      backgroundColor: 'rgba(54, 162, 235, 0.7)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: true
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: 'Total Penjualan (Rp)'
        }
      },
      x: {
        title: {
          display: true,
          text: 'Nama Produk'
        }
      }
    }
  }
});
</script>
