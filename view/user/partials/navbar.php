<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$cartCount = 0;
if (isset($_SESSION['user'])) {
    require_once '../../database/connection.php';
    require_once '../../model/Cart.php';

    $cartModel = new Cart($pdo);
    $cartItems = $cartModel->getCartByUserId($_SESSION['user']['id']);
    $cartCount = count($cartItems);
}
?>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            <img src="/tugas_akhir/assets/logo.png" alt="Gridova Logo" width="145" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-lg-center gap-2">

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'product') ? 'active' : '' ?>" href="katalog.php">Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'testimony') ? 'active' : '' ?>" href="testimony.php">Testimony</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'contact') ? 'active' : '' ?>" href="contact.php">Contact us</a>
                </li>


                <!-- CART ICON -->
                <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item position-relative">
                            <a href="cart.php" class="nav-link">
                                <i class="bi bi-cart fs-5"></i>

                                    <span class="position-absolute top-0 start-100 translate-middle
                                        badge rounded-pill bg-danger">
                                        <?= $cartCount ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>

                            </a>
                        </li>
                <?php endif; ?>

                <!-- USER LOGIN -->
                <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                        data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-5"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="profile.php">
                                <i class="bi bi-person me-2"></i> <?= htmlspecialchars($_SESSION['user']['nama']) ?>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/tugas_akhir/controller/AuthController.php" method="POST">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                <!-- BELUM LOGIN -->
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm" href="../auth/login.php">
                        Login
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>