<div class="sidebar" id="sidebar">
    <h5 class="text-center text-white py-3 mb-2">Gridova Admin</h5>

    <ul class="nav flex-column px-2 gap-1">
        <li>
            <a href="../dashboard.php"
               class="nav-link px-3 py-2 rounded <?= ($page=='dashboard')?'active':'' ?>">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="../users.php"
               class="nav-link px-3 py-2 rounded <?= ($page=='users')?'active':'' ?>">
                <i class="bi bi-people me-2"></i> Users
            </a>
        </li>
        <li>
            <a href="../products.php"
               class="nav-link px-3 py-2 rounded <?= ($page=='products')?'active':'' ?>">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>


        <li class="mt-3">
            <a href="logout.php" class="nav-link px-3 py-2 rounded text-danger">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>
