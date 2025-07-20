<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard User</h1>
  </section>

  <section class="content">
    <div class="alert alert-info">
      Halo, <strong><?= $this->session->userdata('nama') ?></strong>! Anda login sebagai <strong><?= $this->session->userdata('level') ?></strong>.
    </div>

    <div class="row">
      <!-- BOX PRODUK -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $total_produk ?></h3>
            <p>Total Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-cube"></i>
          </div>
          <a href="<?= base_url('user/produk') ?>" class="small-box-footer">
            Lihat Produk <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- BOX KERANJANG -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= $total_keranjang ?></h3>
            <p>Keranjang Saya</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="<?= base_url('user/keranjang') ?>" class="small-box-footer">
            Lihat Keranjang <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- BOX PESANAN -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $total_pesanan ?></h3>
            <p>Total Pesanan</p>
          </div>
          <div class="icon">
            <i class="fa fa-list"></i>
          </div>
          <a href="<?= base_url('user/riwayat') ?>" class="small-box-footer">
            Lihat Riwayat <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
