<header class="main-header">
  <a href="<?= base_url('user/dashboard') ?>" class="logo">
    <span class="logo-mini"><b>U</b>K</span>
    <span class="logo-lg"><b>UMKM</b>App</span>
  </a>
  <nav class="navbar navbar-static-top">
    <span class="navbar-brand">User Dashboard</span>
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
      <li class="header">MENU</li>

      <!-- 🔔 Notifikasi -->
      <li>
        <a href="<?= base_url('user/dashboard/notifikasi') ?>">
          <i class="fa fa-bell"></i> <span>Notifikasi</span>
          <?php
            $CI =& get_instance(); // Supaya bisa dipanggil di view
            $CI->load->model('Notifikasi_model');
            $unread = $CI->Notifikasi_model->jumlah_belum_dibaca($CI->session->userdata('id_user'));
            if ($unread > 0): ?>
              <small class="label pull-right bg-red"><?= $unread ?></small>
          <?php endif; ?>
        </a>
      </li>

      <li><a href="<?= base_url('user/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?= base_url('user/profil') ?>"><i class="fa fa-user"></i> <span>Profil</span></a></li>
      <li><a href="<?= base_url('user/produk') ?>"><i class="fa fa-cube"></i> <span>Produk</span></a></li>
      <li><a href="<?= base_url('user/keranjang') ?>"><i class="fa fa-shopping-cart"></i> <span>Keranjang</span></a></li>
      <li><a href="<?= base_url('user/wishlist') ?>"><i class="fa fa-heart"></i> <span>Wishlist</span></a></li>
      <li><a href="<?= base_url('user/riwayat') ?>"><i class="fa fa-history"></i> <span>Riwayat Pesanan</span></a></li>
      <li><a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
</aside>
