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
        <h4>Brand Management</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalBrand">Add
            Brand</button>

    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
require_once '../../database/connection.php';
require_once '../../model/Brand.php';

$BrandModel = new Brand($pdo);
$Brands = $BrandModel->getAllBrands();

foreach ($Brands as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['nama_brand']) ?></td>
            <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editModalBrand">Edit</button>

                <form action="/tugas_akhir/controller/BrandController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Brand?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<div class="modal fade" id="addModalBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/BrandController.php">
                    <input type="hidden" name="action" value="create">

                    <div class="mb-3">
                        <label class="col-form-label">Nama</label>
                        <input type="text" name="nama_brand" class="form-control" required>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModalBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/BrandController.php">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id"
                        value="<?php echo isset($u['id']) ? htmlspecialchars($u['id']) : ''; ?>">
                    <div class="mb-3">
                        <label class="col-form-label">Nama</label>
                        <input type="text" name="nama_brand" class="form-control"
                            <?php echo isset($u['nama_brand']) ? 'value="' . htmlspecialchars($u['nama_brand']) . '"' : ''; ?>>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
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