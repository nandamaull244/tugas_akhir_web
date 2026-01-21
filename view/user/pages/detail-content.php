<?php
require_once '../../database/connection.php';
require_once '../../model/Product.php';

if (!isset($_GET['id'])) {
    die('Produk tidak ditemukan');
}

$productModel = new Product($pdo);
$product = $productModel->find($_GET['id']);

if (!$product) {
    die('Produk tidak ditemukan');
}

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<div class="container py-5">
    <div class="row g-4">

        <!-- LEFT IMAGE -->
        <div class="col-lg-5">
            <div class="zoom-container border rounded p-3">
                <img src="<?= $product['gambar'] ?>" class="img-fluid w-100 rounded zoom-image">
            </div>
        </div>

        <!-- RIGHT DETAIL -->
        <div class="col-lg-7">

            <h3 class="fw-bold">
                <?= htmlspecialchars($product['nama_produk']) ?>
            </h3>

            <!-- RATING (STATIS BOLEH) -->
            <div class="d-flex align-items-center mb-2">
                <span class="text-warning fs-5">★ ★ ★ ★ ★</span>
                <span class="ms-2 text-muted">(0 review produk)</span>
            </div>

            <!-- STOCK -->
            <?php if ($product['stok_produk'] > 0): ?>
            <p class="text-success fw-semibold">✔ In Stock</p>
            <?php else: ?>
            <p class="text-danger fw-semibold">✖ Habis</p>
            <?php endif; ?>

            <!-- PRICE -->
            <h4 class="fw-bold mb-4">
                <?= rupiah($product['harga']) ?>
            </h4>

            <!-- ACTION -->
            <div class="d-flex align-items-center gap-2 mb-4">
                <?php if ($product['stok_produk'] > 0): ?>
                <form action="/tugas_akhir/controller/CartController.php" method="POST">
                    <input type="hidden" name="id_produk" value="<?= $product['id'] ?>">

                    <div class="input-group mb-3" style="width: 130px;">
                        <button type="button" class="btn btn-outline-secondary btn-minus">-</button>

                        <input type="number" name="qty" class="form-control text-center qty-input" value="1" min="1"
                            max="<?= $product['stok_produk'] ?>">

                        <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                    </div>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>

                <?php else: ?>
                <button class="btn btn-secondary px-4" disabled>Stok Habis</button>
                <?php endif; ?>

                <button class="btn btn-outline-dark">❤</button>
            </div>

            <!-- TABS -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#desc">
                        Deskripsi
                    </button>
                </li>
            </ul>

            <div class="tab-content p-3 border rounded-bottom">
                <div class="tab-pane fade show active" id="desc">
                    <?= nl2br(htmlspecialchars($product['deskripsi'])) ?>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-plus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.parentElement.querySelector('.qty-input');
            const max = parseInt(input.max);
            let value = parseInt(input.value);

            if (value < max) input.value = value + 1;
        });
    });

    document.querySelectorAll('.btn-minus').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.parentElement.querySelector('.qty-input');
            let value = parseInt(input.value);

            if (value > 1) input.value = value - 1;
        });
    });
});
</script>
