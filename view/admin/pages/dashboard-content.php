<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
require_once '../../database/connection.php';
require_once '../../model/Brand.php';
require_once '../../model/User.php';
$userModel = new User($pdo);
$users = $userModel->getAllUsers();
$userCount = count($users);

$brandModel = new Brand($pdo);
$brands = $brandModel->getAllBrands();
$brandCount = count($brands);
?>
<h4 class="mb-3">Dashboard</h4>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Produk</h6>
                <h3>128</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Brand</h6>
                <h3><?php echo $brandCount; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total User</h6>
                <h3><?php echo $userCount; ?></h3>
            </div>
        </div>
    </div>
</div>
