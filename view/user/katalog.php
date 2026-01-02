<?php
$page = 'product';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gridova</title>
    <?php include 'partials/head.php'; ?>
</head>
<body>

<?php include 'partials/navbar.php'; ?>

<!-- ISI HALAMAN -->
    <!--detail produk-->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
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

            <!-- PRODUCT CARD -->
            <div class="col-12 col-lg-9">
                <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/iphone_16p.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/ip16pr.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">IPHONE 16 PRO MAX TITANIUM GOLD 512GB</h6>
                                    <p class="product-price">Rp 24.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/p17p.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/ip17pr.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">IPHONE 17 PRO MAX COSMIC ORANGE 1TB</h6>
                                    <p class="product-price">Rp 30.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/15t.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-sold">HABIS</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/15t.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">XIAOMI 15T GRAY 512GB OFFICIAL XIAOMI INDONESIA</h6>
                                    <p class="product-price">Rp 8.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-danger w-100 add-cart-btn">
                                        ✖ Sold Out
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/x300.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/x300.jpg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">VIVO X300 IRIS PURPLE 512GB</h6>
                                    <p class="product-price">Rp 14.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/x9pro.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/oppox9pro.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">OPPO FIND X9 PRO TITANIUM CHARCOAL 1TB</h6>
                                    <p class="product-price">Rp 19.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/x8pro.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/oppox8pro.png" class="img-fluid product-image" width="93%">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">OPPO FIND X8 PRO PEARL WHITE 1TB</h6>
                                    <p class="product-price">Rp 17.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/renot.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-sold">HABIS</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/note13pro.webp" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">REDMI NOTE 13 PRO PLUS 5G 256GB</h6>
                                    <p class="product-price">Rp 3.999.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-danger w-100 add-cart-btn">
                                        ✖ Habis
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/s24u.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/s24u.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">SAMSUNG S24 ULTRA TITANIUM BLACK 512GB</h6>
                                    <p class="product-price">Rp 15.499.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/zflip7.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/zflip7.png" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">SAMSUNG Z FLIP 7 BLUE SHADOW 512GB</h6>
                                    <p class="product-price">Rp 16.499.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/s25.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/s25.png" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">SAMSUNG GALAXY S25/S25+ SERIES NAVY 512GB-1TB</h6>
                                    <p class="product-price">Rp 12.499.000 - 16.499.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/pura.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/pur.webp" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">HUAWEI PURA 80 ULTRA PRESTIGE GOLD 1TB</h6>
                                    <p class="product-price">Rp 30.499.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="product/f7.html" class="text-decoration-none">
                            <div class="product-card">

                                <!-- IMAGE BOX -->
                                <div class="image-box">
                                    <span class="badge-available">TERSEDIA</span>
                                    <span class="fav-btn"><i class="bi bi-heart"></i></span>

                                    <div class="img-zoom-container">
                                        <img src="../../assets/f7.jpeg" class="img-fluid product-image">
                                    </div>
                                </div>

                                <div class="p-3">
                                    <h6 class="product-title">POCO F7 5G BLACK 512GB OFFICIAL </h6>
                                    <p class="product-price">Rp 6.527.000</p>

                                    <!-- ADD TO CART BUTTON -->
                                    <button class="btn btn-primary w-100 add-cart-btn">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </div>
                                <!-- 
                    <button class="btn btn-danger w-100 btn-sold">
                        ✖ Habis
                    </button> -->
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'partials/footer.php'; ?>

</body>
</html>
