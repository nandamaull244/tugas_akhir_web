<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Product Management</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalProduct">Add
            Product</button>

    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Harga</th>
            <th>tersedia</th>
            <th>Stok</th>
            <th>deskripsi</th>
            <th>kategori</th>
            <th>brand</th>
            <th>gambar</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
require_once '../../database/connection.php';
require_once '../../model/Product.php';

$ProductModel = new Product($pdo);
$Products = $ProductModel->getAll();

foreach ($Products as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['nama_produk']) ?></td>
            <td><?= htmlspecialchars($u['harga']) ?></td>
            <td><?= htmlspecialchars($u['is_available']) ?></td>
            <td><?= htmlspecialchars($u['stok_produk']) ?></td>
            <td><?= htmlspecialchars($u['deskripsi']) ?></td>
            <td><?= htmlspecialchars($u['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($u['nama_brand']) ?></td>
            <td><img src="<?= $u['id_gambar'] ?>" alt="Gambar Produk" width="100"></td>
            <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editModalProduct">Edit</button>

                <form action="/tugas_akhir/controller/ProductController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Product?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<div class="modal fade" id="addModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/ProductController.php"
                    enctype="multipart/form-data">

                    <input type="hidden" name="action" value="create">
                    <div class="mb-3">
                        <label class="col-form-label">Nama produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    <div class="mb-3"></div>
                        <label class="col-form-label">Harga</label>
                        <input name="harga" type="number" class="form-control mt-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Stok Produk</label>
                        <input name="stok_produk" type="number" class="form-control mt-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Kategori</label>
                        <select name="id_kategori" class="form-control mt-2" required>
                            <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label">Brand</label>
                        <select name="id_brand" class="form-control mt-2" required>
                            <?php foreach ($brand as $b): ?>
                            <option value="<?= $b['id'] ?>"><?= $b['nama_brand'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control mt-2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Gambar</label>    
                        <input type="file" name="gambar" class="form-control mt-2">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>



            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/ProductController.php"
                    enctype="multipart/form-data">

                    <input type="hidden" name="action" value="create">

                    <input name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                    <input name="harga" type="number" class="form-control mt-2" required>
                    <input name="stok_produk" type="number" class="form-control mt-2" required>

                    <select name="id_kategori" class="form-control mt-2" required>
                        <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="id_brand" class="form-control mt-2" required>
                        <?php foreach ($brand as $b): ?>
                        <option value="<?= $b['id'] ?>"><?= $b['nama_brand'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <textarea name="deskripsi" class="form-control mt-2"></textarea>

                    <input type="file" name="gambar" class="form-control mt-2">

                    <button class="btn btn-primary mt-3">Simpan</button>
                </form>



            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.remove());
    }, 3000);
</script>