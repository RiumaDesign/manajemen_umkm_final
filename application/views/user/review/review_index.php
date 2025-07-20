<h2>Review untuk: <?= $produk['nama_produk']; ?></h2>

<h3>Tulis Ulasan</h3>
<form action="<?= site_url('user/review/tambah/' . $produk['id']); ?>" method="post">
    <label for="rating">Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" required><br><br>

    <label for="komentar">Komentar:</label><br>
    <textarea name="komentar" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Kirim Review">
</form>

<hr>

<h3>Daftar Review</h3>
<?php foreach ($reviews as $review): ?>
    <p><strong><?= $review['nama']; ?></strong> (<?= $review['rating']; ?>/5)</p>
    <p><?= $review['komentar']; ?></p>
    <hr>
<?php endforeach; ?>
