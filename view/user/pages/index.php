<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- ISI HALAMAN -->
<section class="hero-section container mt-4">

    <div class="row g-3">

        <!-- LEFT: HERO CAROUSEL -->
        <div class="col-md-9">
            <div id="heroMainCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner hero-main">

                    <div class="carousel-item active">
                        <img src="/tugas_akhir/assets/hero-1.png" class="d-block w-100" alt="">
                    </div>

                    <div class="carousel-item">
                        <img src="/tugas_akhir/assets/hero-2.png" class="d-block w-100" alt="">
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT: ASIDE IMAGES (STACKED ON DESKTOP, ROW ON MOBILE) -->
        <div class="col-md-3 d-flex flex-md-column flex-row gap-3">

            <div class="aside-img overflow-hidden flex-fill">
                <img src="/tugas_akhir/assets/aside-1.png" class="w-100 h-100 object-fit-cover">
            </div>

            <div class="aside-img overflow-hidden flex-fill">
                <img src="/tugas_akhir/assets/aside-2.png" class="w-100 h-100 object-fit-cover">
            </div>

        </div>


    </div>

</section>
<!-- FEATURES SECTION -->
<div class="container my-4">

    <!-- DESKTOP VERSION (ROW) -->
    <div class="row g-3 d-none d-md-flex">
        <div class="col-md-3">
            <div class="feature-card">
                <img src="/tugas_akhir/assets/care.png" class="feature-icon">
                <div>
                    <h6 class="fw-bold m-0">GridovaCare</h6>
                    <small>1+2 Tambahan Garansi</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="feature-card">
                <img src="/tugas_akhir/assets/ganti.png" class="feature-icon">
                <div>
                    <h6 class="fw-bold m-0">5 Hari Rusak</h6>
                    <small>Tukar Baru</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="feature-card">
                <img src="/tugas_akhir/assets/card.png" class="feature-icon">
                <div>
                    <h6 class="fw-bold m-0">Cicilan 0%</h6>
                    <small>Hingga 12 Bulan</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="feature-card">
                <img src="/tugas_akhir/assets/diskon.png" class="feature-icon">
                <div>
                    <h6 class="fw-bold m-0">Diskon 4%</h6>
                    <small>Hingga 5 Juta</small>
                </div>
            </div>
        </div>
    </div>


    <!-- MOBILE VERSION (CAROUSEL) -->
    <div class="swiper d-md-none" id="feature-swiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="feature-card">
                    <img src="/tugas_akhir/assets/care.png" class="feature-icon">
                    <div>
                        <h6 class="fw-bold m-0">GridovaCare</h6>
                        <small>1+2 Tambahan Garansi</small>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="feature-card">
                    <img src="/tugas_akhir/assets/ganti.png" class="feature-icon">
                    <div>
                        <h6 class="fw-bold m-0">5 Hari Rusak</h6>
                        <small>Tukar Baru</small>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="feature-card">
                    <img src="/tugas_akhir/assets/card.png" class="feature-icon">
                    <div>
                        <h6 class="fw-bold m-0">Cicilan 0%</h6>
                        <small>Hingga 12 Bulan</small>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="feature-card">
                    <img src="/tugas_akhir/assets/diskon.png" class="feature-icon">
                    <div>
                        <h6 class="fw-bold m-0">Diskon 4%</h6>
                        <small>Hingga 5 Juta</small>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php
        require_once '../../database/connection.php';
        require_once '../../model/Product.php';

    $productModel = new Product($pdo);
    $products = $productModel->getAll();
    ?>

<!-- KATALOG SECTION -->
<div class="container my-5">
    <h4 class="title pb-2">Promo minggu ini</h4>

    <div class="row g-4">
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

<!-- BRANDS SECTION -->
<div class="container my-5">
    <h4 class="title-brand pb-4">Shop by Brands</h4>

    <div class="row g-3">

        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/iphone.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/apple.png" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/samsung.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/samsung.png" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/vivo.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/vivo.png" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/xiaomi.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/mi.png" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/poco.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/poco.jpeg" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/huawei.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/huawei.jpeg" class="img-fluid brand-image">
                </div>
            </a>
        </div>
        <div class="col-3 col-sm-4 col-md-3 col-lg-2">
            <a href="brand/oppo.html" class="text-decoration-none">
                <div class="brand-card">
                    <img src="/tugas_akhir/assets/oppo.png" class="img-fluid brand-image">
                </div>
            </a>
        </div>

    </div>
</div>

<section class="py-5 bg-light">
    <div class="container">

        <h4 class="title-review mb-4">Apa Kata Pelanggan</h4>

        <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-inner">

                <!-- ITEM 1 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2">★★★★★</div>
                                    <span class="text-muted small">3 bulan lalu</span>
                                </div>
                                <p>Saya beli laptop di sini dan pelayanannya sangat profesional. Recommended banget!
                                </p>
                                <h6 class="mt-3 fw-bold">Ramah Azzahra</h6>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-none d-md-block">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2">★★★★★</div>
                                    <span class="text-muted small">5 bulan lalu</span>
                                </div>
                                <p>Belanja di sini pelayanannya cepat, harga terjangkau, marketingnya ramah!</p>
                                <h6 class="mt-3 fw-bold">Hana Nabilah S</h6>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2">★★★★★</div>
                                    <span class="text-muted small">10 bulan lalu</span>
                                </div>
                                <p>Tempatnya luas, rapi, bersih, pelayanan sangat responsif. Terbaik!</p>
                                <h6 class="mt-3 fw-bold">Syifa Aulia Putri Mat’zen</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ITEM 2 (duplikasi untuk slide berikutnya) -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="text-warning mb-2">★★★★★</div>
                                <p>Produk lengkap, pelayanan memuaskan. Pasti balik lagi!</p>
                                <h6 class="mt-3 fw-bold">Andika Putra</h6>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-none d-md-block">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="text-warning mb-2">★★★★★</div>
                                <p>Staff ramah, penjelasan detail, sangat recommended.</p>
                                <h6 class="mt-3 fw-bold">Rina Amelia</h6>
                            </div>
                        </div>

                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="review-card p-4 shadow-sm rounded-4">
                                <div class="text-warning mb-2">★★★★★</div>
                                <p>Harga bersaing, barang bergaransi, pelayanan oke!</p>
                                <h6 class="mt-3 fw-bold">Budi Santoso</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- tombol next/prev -->
            <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
</section>