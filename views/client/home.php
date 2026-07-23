<!-- ========== HERO CAROUSEL ========== -->
<section class="hero-section mt-3">
    <div class="container">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner" style="border-radius: var(--radius-lg); overflow: hidden;">
                <div class="carousel-item active">
                    <div class="hero-slide hero-slide-1">
                        <div class="hero-content">
                            <h1>Khuyến Mãi Mùa Hè<br>Giảm đến 40%</h1>
                            <p>Cơ hội sở hữu laptop, điện thoại flagship với giá cực sốc. Số lượng có hạn!</p>
                            <a href="<?= BASE_URL ?>?action=products&sale=1" class="btn-hero">Mua ngay <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-slide hero-slide-2">
                        <div class="hero-content">
                            <h1>iPhone 16 Pro Max<br>Trả góp 0%</h1>
                            <p>Thiết kế titan, camera 48MP, chip A18 Pro mạnh mẽ. Thu cũ đổi mới tiết kiệm thêm 3 triệu.</p>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=1" class="btn-hero">Khám phá <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-slide hero-slide-3">
                        <div class="hero-content">
                            <h1>MacBook Air M3<br>Mỏng nhẹ, mạnh mẽ</h1>
                            <p>Hiệu năng vượt trội với chip M3. Pin cả ngày. Quà tặng trị giá 2 triệu đồng.</p>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=2" class="btn-hero">Tìm hiểu <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- ========== CATEGORIES ========== -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title text-center">Danh mục sản phẩm</h2>
            <p class="section-subtitle">Khám phá các sản phẩm công nghệ hàng đầu</p>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=laptop" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-laptop"></i></div>
                        <h6>Laptop</h6>
                        <small>120+ sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=phone" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-phone"></i></div>
                        <h6>Điện thoại</h6>
                        <small>85+ sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=tablet" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-tablet"></i></div>
                        <h6>Tablet</h6>
                        <small>40+ sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=smartwatch" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-smartwatch"></i></div>
                        <h6>Smartwatch</h6>
                        <small>30+ sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=accessories" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-headphones"></i></div>
                        <h6>Phụ kiện</h6>
                        <small>200+ sản phẩm</small>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?= BASE_URL ?>?action=products&category=pc" class="text-decoration-none">
                    <div class="category-card animate-on-scroll">
                        <div class="cat-icon"><i class="bi bi-pc-display"></i></div>
                        <h6>PC & Màn hình</h6>
                        <small>60+ sản phẩm</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========== NEW PRODUCTS ========== -->
<section class="py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="section-title">Sản phẩm mới</h2>
                <p class="section-subtitle mb-0">Những sản phẩm mới nhất vừa ra mắt</p>
            </div>
            <a href="<?= BASE_URL ?>?action=products" class="btn btn-outline-accent d-none d-md-inline-block">
                Xem tất cả <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="row g-3">
            <?php
            if (empty($newProducts)):
                echo '<p class="text-center w-100">Hiện chưa có sản phẩm nào.</p>';
            else:
            foreach ($newProducts as $p):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card animate-on-scroll">
                    <!-- badge omitted for now -->
                    <div class="product-img-wrapper">
                        <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>">
                            <img src="https://placehold.co/400x400/e2e8f0/64748b?text=<?= urlencode($p['product_name']) ?>" alt="<?= htmlspecialchars($p['product_name']) ?>">
                        </a>
                        <div class="product-actions-overlay">
                            <button class="btn-icon btn-add-to-cart" data-bs-toggle="tooltip" title="Thêm vào giỏ"
                                data-id="<?= $p['product_id'] ?>" data-name="<?= htmlspecialchars($p['product_name']) ?>" data-price="<?= $p['price'] ?? 0 ?>"
                                data-image="https://placehold.co/400x400/e2e8f0/64748b?text=<?= urlencode($p['product_name']) ?>" data-category="<?= htmlspecialchars($p['category_name']) ?>">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="btn-icon" data-bs-toggle="tooltip" title="Xem chi tiết">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category"><?= htmlspecialchars($p['category_name']) ?></span>
                        <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="product-name"><?= htmlspecialchars($p['product_name']) ?></a>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                            <span class="text-muted ms-1" style="font-size:0.75rem;">(128)</span>
                        </div>
                        <div class="product-price-wrapper">
                            <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?>₫</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <div class="text-center mt-3 d-md-none">
            <a href="<?= BASE_URL ?>?action=products" class="btn btn-outline-accent">Xem tất cả <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ========== PROMO BANNER ========== -->
<section class="py-4">
    <div class="container">
        <div class="promo-banner animate-on-scroll">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2>🔥 Flash Sale cuối tuần</h2>
                    <p class="mb-lg-0">Giảm thêm 10% cho tất cả phụ kiện khi mua kèm điện thoại hoặc laptop. Áp dụng đến hết Chủ nhật!</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="<?= BASE_URL ?>?action=products&sale=1" class="btn-hero">Mua ngay <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== BEST SELLERS ========== -->
<section class="py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="section-title">Sản phẩm bán chạy</h2>
                <p class="section-subtitle mb-0">Top sản phẩm được khách hàng yêu thích nhất</p>
            </div>
            <a href="<?= BASE_URL ?>?action=products" class="btn btn-outline-accent d-none d-md-inline-block">
                Xem tất cả <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="row g-3">
            <?php
            if (empty($hotProducts)):
                echo '<p class="text-center w-100">Hiện chưa có sản phẩm nào.</p>';
            else:
            foreach ($hotProducts as $p):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card animate-on-scroll">
                    <span class="badge-hot"><i class="bi bi-fire"></i> Hot</span>
                    <div class="product-img-wrapper">
                        <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>">
                            <img src="https://placehold.co/400x400/1e293b/ffffff?text=<?= urlencode($p['product_name']) ?>" alt="<?= htmlspecialchars($p['product_name']) ?>">
                        </a>
                        <div class="product-actions-overlay">
                            <button class="btn-icon btn-add-to-cart" data-bs-toggle="tooltip" title="Thêm vào giỏ"
                                data-id="<?= $p['product_id'] ?>" data-name="<?= htmlspecialchars($p['product_name']) ?>" data-price="<?= $p['price'] ?? 0 ?>"
                                data-image="https://placehold.co/400x400/1e293b/ffffff?text=<?= urlencode($p['product_name']) ?>" data-category="<?= htmlspecialchars($p['category_name']) ?>">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="btn-icon" data-bs-toggle="tooltip" title="Xem chi tiết">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category"><?= htmlspecialchars($p['category_name']) ?></span>
                        <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="product-name"><?= htmlspecialchars($p['product_name']) ?></a>
                        <div class="product-rating">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span class="text-muted ms-1" style="font-size:0.75rem;">(256)</span>
                        </div>
                        <div class="product-price-wrapper">
                            <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?>₫</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- ========== WHY CHOOSE US ========== -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title text-center">Tại sao chọn DGENTECH?</h2>
            <p class="section-subtitle">Cam kết mang đến trải nghiệm mua sắm tốt nhất</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon"><i class="bi bi-truck"></i></div>
                    <h5>Giao hàng nhanh</h5>
                    <p>Giao hàng trong 2h nội thành. Miễn phí ship đơn từ 2 triệu.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                    <h5>Bảo hành chính hãng</h5>
                    <p>100% sản phẩm chính hãng. Bảo hành tại trung tâm ủy quyền.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon"><i class="bi bi-arrow-repeat"></i></div>
                    <h5>Đổi trả 30 ngày</h5>
                    <p>Đổi trả miễn phí trong 30 ngày nếu sản phẩm lỗi từ nhà sản xuất.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon"><i class="bi bi-headset"></i></div>
                    <h5>Hỗ trợ 24/7</h5>
                    <p>Đội ngũ tư vấn chuyên nghiệp sẵn sàng hỗ trợ bạn mọi lúc.</p>
                </div>
            </div>
        </div>
    </div>
</section>
