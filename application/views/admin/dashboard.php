<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard Admin</h1>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
    <?php endif; ?>

    <div class="box box-primary">
      <div class="box-body">
        Selamat datang, <strong><?= $this->session->userdata('nama') ?></strong>!
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $total_user ?></h3>
            <p>Total User</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="<?= base_url('admin/user') ?>" class="small-box-footer">
            Lihat Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $total_produk ?></h3>
            <p>Total Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-cube"></i>
          </div>
          <a href="<?= base_url('admin/produk') ?>" class="small-box-footer">
            Lihat Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $total_kategori ?></h3>
            <p>Total Kategori</p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
          <a href="<?= base_url('admin/kategori') ?>" class="small-box-footer">
            Lihat Detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?= $total_pesanan ?></h3>
      <p>Total Pesanan</p>
    </div>
    <div class="icon">
      <i class="fa fa-shopping-bag"></i>
    </div>
    <a href="<?= base_url('admin/pesanan') ?>" class="small-box-footer">
      Lihat Detail <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

    </div>
  </section>
</div>
