    <!--detail produk-->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>

    <div class="container my-5">
        <div class="row">

            <!-- 🟦 SIDEBAR FILTER -->
            <div class="col-12 col-lg-3 mb-4">
                <div class="filter-box p-3">

                    <!-- Search -->
                    <div class="filter-item">
                        <button class="filter-btn" data-bs-toggle="collapse" data-bs-target="#searchFilter">
                            Search <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="collapse show" id="searchFilter">
                            <input type="text" class="form-control mt-3" placeholder="Cari produk...">
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="filter-item">
                        <button class="filter-btn" data-bs-toggle="collapse" data-bs-target="#categoryFilter">
                            Category <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="collapse" id="categoryFilter">
                            <ul class="list-group mt-3">Flagship
                                <li class="list-group-item">High End</li>
                                <li class="list-group-item">Midrange</li>
                                <li class="list-group-item">Entry Level</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="filter-item">
                        <button class="filter-btn" data-bs-toggle="collapse" data-bs-target="#brandFilter">
                            Brand <i class="bi bi-chevron-down"></i>
                        </button>
                        <div class="collapse" id="brandFilter">
                            <ul class="list-group mt-3">
                                <li class="list-group-item">Apple</li>
                                <li class="list-group-item">Samsung</li>
                                <li class="list-group-item">Xiaomi</li>
                                <li class="list-group-item">Oppo</li>
                                <li class="list-group-item">Vivo</li>
                                <li class="list-group-item">Huawei</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-item">
                        <button class="filter-btn" data-bs-toggle="collapse" data-bs-target="#priceFilter">
                            Price <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="collapse show" id="priceFilter">
                            <!-- Range Slider -->
                            <div class="mt-4">
                                <input type="range" class="form-range" min="0" max="50000000">
                                <input type="range" class="form-range" min="0" max="50000000">

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label class="form-label">Dari</label>
                                        <input type="text" class="form-control" value="0">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Sampai</label>
                                        <input type="text" class="form-control" value="99.999.000">
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Filter -->
                            <h6 class="mt-4">FILTER CEPAT</h6>
                            <button class="quick-filter">
                                < 2.500.000 </button> <button class="quick-filter"> 2.500.001 – 5.000.000
                            </button>
                            <button class="quick-filter"> 5.000.001 – 10.000.000 </button>
                            <button class="quick-filter"> 10.000.001 – 20.000.000 </button>
                            <button class="quick-filter"> 20.000.001 – 50.000.000 </button>
                        </div>
                    </div>

                    <button class="clear-btn">Clear All</button>
                </div>
            </div>
            <!-- PRODUK -->
<?php
        require_once '../../database/connection.php';
        require_once '../../model/Product.php';

    $productModel = new Product($pdo);
    $products = $productModel->getAll();
    ?>      
            <!-- PRODUCT CARD -->
            <div class="col-12 col-lg-9">
                <div class="row g-3">
        <?php
                            function rupiah($angka) {
                                return 'Rp ' . number_format($angka, 0, ',', '.');
                            }
                            ?>
        <?php foreach ($products as $p): ?>


        <div class="col-12 col-sm-6 col-lg-3">
            <a href="detail.php?id=<?= $p['id'] ?>" class="text-decoration-none">
                <div class="product-card">

                    <!-- IMAGE -->
                    <div class="image-box">
                        <?php if ($p['stok_produk'] > 0): ?>
                        <span class="badge-available">TERSEDIA</span>
                        <?php else: ?>
                        <span class="badge-sold">HABIS</span>
                        <?php endif; ?>

                        <span class="fav-btn"><i class="bi bi-heart"></i></span>

                        <div class="img-zoom-container">
                            <img src="<?= $p['gambar'] ?>" class="img-fluid product-image">
                        </div>
                    </div>

                    <div class="p-3">
                        <h6 class="product-title">
                            <?= htmlspecialchars($p['nama_produk']) ?>
                        </h6>


                        <p class="product-price">
                            <?= rupiah($p['harga']) ?>
                        </p>

                        <?php if ($p['stok_produk'] > 0): ?>
                        <form action="/tugas_akhir/controller/CartController.php" method="POST">
                            <input type="hidden" name="id_produk" value="<?= $p['id'] ?>">
                            <input type="hidden" name="qty" value="1">

                            <button class="btn btn-primary w-100 add-cart-btn">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>

                        <?php else: ?>
                        <button class="btn btn-danger w-100" disabled>
                            ✖ Sold Out
                        </button>
                        <?php endif; ?>
                    </div>

                </div>

            </a>
        </div>
        <?php endforeach; ?>

        
                </div>
            </div>
        </div>
    </div>
</div>