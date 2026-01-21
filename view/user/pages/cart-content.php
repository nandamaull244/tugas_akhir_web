<?php
require_once '../../database/connection.php';
require_once '../../model/Cart.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../view/auth/login.php');
    exit;
}

$cartModel = new Cart($pdo);
$items = $cartModel->getByUser($_SESSION['user']['id']);
$total = $cartModel->getTotal($_SESSION['user']['id']);

function rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<!-- Cart Content -->
<div class="container my-5">
    <h2 class="mb-4">🛒 Keranjang Belanja</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead class="table-dark text-center">
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php if (empty($items)): ?>
                <tr>
                    <td colspan="5" class="text-center">Keranjang kosong</td>
                </tr>
            <?php endif; ?>

            <?php foreach ($items as $item): ?>
                <tr>
                    <td>
                        <strong><?= $item['nama_produk'] ?></strong><br>
                        <img src="<?= $item['gambar'] ?>" width="70">
                    </td>

                    <td class="text-center"><?= rupiah($item['harga']) ?></td>

                    <td class="text-center" style="width:140px;">
                        <form action="controller/CartController.php" method="POST" class="d-flex">
                            <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                            <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1"
                                   class="form-control text-center">
                            <button name="update_qty" class="btn btn-sm btn-primary ms-1">
                                ✔
                            </button>
                        </form>
                    </td>

                    <td class="text-center"><?= rupiah($item['subtotal']) ?></td>

                    <td class="text-center">
                        <form action="controller/CartController.php" method="POST">
                            <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                            <button name="delete" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <!-- SUMMARY -->
    <div class="row justify-content-end mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Ringkasan Belanja</h5>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Total</span>
                        <strong><?= rupiah($total) ?></strong>
                    </p>
                    <button class="btn btn-success w-100 mt-2">
                        Checkout Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>