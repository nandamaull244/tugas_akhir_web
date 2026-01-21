<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<<?php if (isset($_SESSION['success'])): ?>
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
        <h4>Category Management</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModalCategory">Add
            Category</button>

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
require_once '../../model/Category.php';

$CategoryModel = new Category($pdo);
$Categorys = $CategoryModel->getAllCategories();

foreach ($Categorys as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['nama_kategori']) ?></td>
            <td>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editModalCategory">Edit</button>

                <form action="/tugas_akhir/controller/CategoryController.php" method="POST" class="d-inline">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Category?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<div class="modal fade" id="addModalCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/CategoryController.php">
                    <input type="hidden" name="action" value="create">

                    <div class="mb-3">
                        <label class="col-form-label">Nama</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
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
<div class="modal fade" id="editModalCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/tugas_akhir/controller/CategoryController.php">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id"
                        value="<?php echo isset($u['id']) ? htmlspecialchars($u['id']) : ''; ?>">
                    <div class="mb-3">
                        <label class="col-form-label">Nama</label>
                        <input type="text" name="nama_kategori" class="form-control"
                            <?php echo isset($u['nama_kategori']) ? 'value="' . htmlspecialchars($u['nama_kategori']) . '"' : ''; ?>>
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