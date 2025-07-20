<header class="main-header">
  <a href="<?= base_url('admin/dashboard') ?>" class="logo">
    <span class="logo-mini"><b>U</b>M</span>
    <span class="logo-lg"><b>UMKM</b>App</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
  </nav>
</header>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('nama') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVIGASI</li>

      <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?= base_url('admin/laporan') ?>"><i class="fa fa-bar-chart"></i> <span>Laporan</span></a></li>


      <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-users"></i> <span>User</span></a></li>

      <li><a href="<?= base_url('admin/produk') ?>"><i class="fa fa-cubes"></i> <span>Produk</span></a></li>

      <li><a href="<?= base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> <span>Kategori</span></a></li>

      <li class="<?= $this->uri->segment(2) == 'pesanan' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/pesanan') ?>"><i class="fa fa-truck"></i> <span>Pesanan</span></a>
      </li>
      <li><a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
</aside>
