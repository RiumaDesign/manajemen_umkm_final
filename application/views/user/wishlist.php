<div class="content-wrapper">
  <section class="content-header">
    <h1>Wishlist Saya</h1>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-body">
        <?php if (!empty($wishlist)): ?>
          <table class="table table-bordered table-striped" id="wishlistTable">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($wishlist as $item): ?>
                <tr id="row-<?= $item->id ?>">
                  <td width="80">
                    <img src="<?= base_url('uploads/' . $item->foto) ?>" width="70" class="img-thumbnail">
                  </td>
                  <td><?= $item->nama_produk ?></td>
                  <td>Rp<?= number_format($item->harga, 0, ',', '.') ?></td>
                  <td>
                    <button type="button" class="btn btn-danger btn-sm hapus-btn" data-id="<?= $item->id ?>">
                      Hapus
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-info">
            Wishlist masih kosong. Silakan tambahkan produk dari halaman produk.
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- jQuery & AJAX Wishlist Deletion -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  $('.hapus-btn').click(function(){
    let id = $(this).data('id');
    if (confirm('Hapus produk ini dari wishlist?')) {
      $.post("<?= base_url('user/wishlist/hapus_ajax') ?>", {id: id}, function(response){
        if (response.status === 'deleted') {
          $('#row-' + id).fadeOut();
        }
      }, 'json');
    }
  });
});
</script>
