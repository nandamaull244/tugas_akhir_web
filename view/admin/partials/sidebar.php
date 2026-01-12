<div class="sidebar" id="sidebar">
    <h5 class="text-center text-white py-3 mb-2">Gridova Admin</h5>

    <ul class="nav flex-column px-2 gap-1">
        <li>
            <a href="dashboard.php" class="nav-link px-3 py-2 rounded <?= ($page=='dashboard')?'active':'' ?>">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="users.php" class="nav-link px-3 py-2 rounded <?= ($page=='user')?'active':'' ?>">
                <i class="bi bi-people me-2"></i> Users
            </a>
        </li>
        <li>
            <a href="products.php" class="nav-link px-3 py-2 rounded <?= ($page=='products')?'active':'' ?>">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>
        <li>
            <a href="category.php" class="nav-link px-3 py-2 rounded <?= ($page=='category')?'active':'' ?>">
                <i class="bi bi-folder me-2"></i> Category
            </a>
        </li>
        <li>
            <a href="brand.php" class="nav-link px-3 py-2 rounded <?= ($page=='brand')?'active':'' ?>">
                <i class="bi bi-phone me-2"></i> Brand
            </a>
        </li>


        <li class="mt-3">
            <form action="/tugas_akhir/controller/AuthController.php" method="POST">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>