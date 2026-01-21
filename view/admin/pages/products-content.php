<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../database/connection.php';
require_once '../../model/Product.php';
require_once '../../model/Category.php';
require_once '../../model/Brand.php';

$kategoriModel = new Category($pdo);
$kategori = $kategoriModel->getAllCategories();
$brandModel = new Brand($pdo);
$brand    = $brandModel->getAllBrands();

$ProductModel = new Product($pdo);
$Products = $ProductModel->getAll();
?>

<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= htmlspecialchars($_SESSION['success']) ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= htmlspecialchars($_SESSION['error']) ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="container mb-3">
    <div class="d-flex justify-content-between">
        <h4>Product Management</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalProduct">
            Add Product
        </button>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Tersedia</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Brand</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td><?= number_format($p['harga']) ?></td>
            <td><?= $p['is_available'] ? 'Ya' : 'Tidak' ?></td>
            <td><?= $p['stok_produk'] ?></td>
            <td><?= htmlspecialchars($p['deskripsi']) ?></td>
            <td><?= htmlspecialchars($p['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($p['nama_brand']) ?></td>
            <td>
                <?php if ($p['gambar']): ?>
                    <img src="<?= $p['gambar'] ?>" width="100">
                <?php endif; ?>
            </td>
            <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModalProduct"
                    data-id="<?= $p['id'] ?>" data-nama="<?= htmlspecialchars($p['nama_produk']) ?>"
                    data-harga="<?= $p['harga'] ?>" data-stok="<?= $p['stok_produk'] ?>"
                    data-deskripsi="<?= htmlspecialchars($p['deskripsi']) ?>" data-kategori="<?= $p['id_kategori'] ?>"
                    data-brand="<?= $p['id_brand'] ?>" data-gambar="<?= $p['gambar'] ?>">
                    Edit
                </button>

                <form action="/tugas_akhir/controller/ProductController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<div class="modal fade" id="addModalProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/tugas_akhir/controller/ProductController.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Tambah Produk</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="action" value="create">

                    <input name="nama_produk" class="form-control mb-2" placeholder="Nama Produk" required>
                    <input name="harga" type="number" class="form-control mb-2" placeholder="Harga" required>
                    <input name="stok_produk" type="number" class="form-control mb-2" placeholder="Stok" required>

                    <select name="id_kategori" class="form-control mb-2" required>
                        <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="id_brand" class="form-control mb-2" required>
                        <?php foreach ($brand as $b): ?>
                        <option value="<?= $b['id'] ?>"><?= $b['nama_brand'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>
                    <input type="file" name="gambar" class="form-control">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModalProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/tugas_akhir/controller/ProductController.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Edit Produk</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id">
                    <input type="hidden" name="old_image">

                    <input name="nama_produk" class="form-control mb-2" required>
                    <input name="harga" type="number" class="form-control mb-2" required>
                    <input name="stok_produk" type="number" class="form-control mb-2" required>

                    <select name="id_kategori" class="form-control mb-2">
                        <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="id_brand" class="form-control mb-2">
                        <?php foreach ($brand as $b): ?>
                        <option value="<?= $b['id'] ?>"><?= $b['nama_brand'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <textarea name="deskripsi" class="form-control mb-2"></textarea>
                    <input type="file" name="gambar" class="form-control">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('editModalProduct')
    .addEventListener('show.bs.modal', function (e) {
        const b = e.relatedTarget;
        const f = this.querySelector('form');

        f.id.value = b.dataset.id;
        f.nama_produk.value = b.dataset.nama;
        f.harga.value = b.dataset.harga;
        f.stok_produk.value = b.dataset.stok;
        f.deskripsi.value = b.dataset.deskripsi;
        f.id_kategori.value = b.dataset.kategori;
        f.id_brand.value = b.dataset.brand;
        f.old_image.value = b.dataset.gambar;
    });
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.remove());
    }, 3000);
</script>