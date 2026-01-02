<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../../../assets/logo.png" alt="Gridova Logo" width="145" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav gap-2">
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
            </ul>
        </div>
    </div>
</nav>
