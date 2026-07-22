<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>?action=products">Sản phẩm</a></li>
                <li class="breadcrumb-item active">iPhone 16 Pro Max 256GB</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <!-- Product Detail -->
        <div class="product-detail-section mb-4">
            <div class="row g-4">
                <!-- Gallery -->
                <div class="col-lg-5">
                    <div class="product-gallery">
                        <div class="main-image">
                            <img src="https://placehold.co/600x600/4361ee/ffffff?text=iPhone+16+Pro+Max" alt="iPhone 16 Pro Max" id="mainProductImage">
                        </div>
                        <div class="thumb-list">
                            <div class="thumb-item active">
                                <img src="https://placehold.co/100x100/4361ee/ffffff?text=1" data-full="https://placehold.co/600x600/4361ee/ffffff?text=iPhone+16+Pro+Max" alt="Thumb 1">
                            </div>
                            <div class="thumb-item">
                                <img src="https://placehold.co/100x100/7c3aed/ffffff?text=2" data-full="https://placehold.co/600x600/7c3aed/ffffff?text=iPhone+16+Side" alt="Thumb 2">
                            </div>
                            <div class="thumb-item">
                                <img src="https://placehold.co/100x100/059669/ffffff?text=3" data-full="https://placehold.co/600x600/059669/ffffff?text=iPhone+16+Back" alt="Thumb 3">
                            </div>
                            <div class="thumb-item">
                                <img src="https://placehold.co/100x100/ec4899/ffffff?text=4" data-full="https://placehold.co/600x600/ec4899/ffffff?text=iPhone+16+Camera" alt="Thumb 4">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-7">
                    <div class="product-detail-info">
                        <span class="badge rounded-pill bg-primary mb-2">Điện thoại</span>
                        <h1 class="product-title">iPhone 16 Pro Max 256GB</h1>
                        <div class="product-rating-detail mb-2">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                            <span class="text-muted ms-1">(128 đánh giá)</span>
                            <span class="text-muted mx-2">|</span>
                            <span class="text-success"><i class="bi bi-check-circle"></i> Còn hàng</span>
                        </div>

                        <div class="product-price-detail">34.990.000₫</div>
                        <div class="product-price-original">36.990.000₫</div>

                        <p class="product-desc-short">
                            iPhone 16 Pro Max mang đến trải nghiệm đỉnh cao với chip A18 Pro mạnh mẽ nhất, camera 48MP với zoom quang học 5x, khung viền titan bền bỉ và pin cả ngày. Sở hữu ngay với ưu đãi trả góp 0%.
                        </p>

                        <div class="mb-3">
                            <label class="fw-bold mb-2 d-block" style="font-size:0.9rem;">Màu sắc:</label>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 active">Titan Tự nhiên</button>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Titan Đen</button>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Titan Trắng</button>
                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">Titan Sa mạc</button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold mb-2 d-block" style="font-size:0.9rem;">Số lượng:</label>
                            <div class="quantity-selector">
                                <button class="qty-minus">−</button>
                                <input type="number" class="qty-input" value="1" min="1">
                                <button class="qty-plus">+</button>
                            </div>
                        </div>

                        <div class="d-flex gap-3 flex-wrap">
                            <button class="btn btn-accent btn-lg" id="addToCartDetail"
                                data-id="1" data-name="iPhone 16 Pro Max 256GB" data-price="34990000"
                                data-image="https://placehold.co/400x400/4361ee/ffffff?text=iPhone+16" data-category="Điện thoại">
                                <i class="bi bi-cart-plus me-2"></i> Thêm vào giỏ hàng
                            </button>
                            <a href="<?= BASE_URL ?>?action=checkout" class="btn btn-lg btn-outline-accent">
                                <i class="bi bi-lightning-fill me-1"></i> Mua ngay
                            </a>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-truck text-accent"></i> Giao hàng miễn phí
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-shield-check text-accent"></i> Bảo hành 12 tháng
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-arrow-repeat text-accent"></i> Đổi trả 30 ngày
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-credit-card text-accent"></i> Trả góp 0%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs: Description / Specs / Reviews -->
        <div class="product-detail-section product-tabs mb-4">
            <ul class="nav nav-tabs mb-3" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#descPanel" type="button" role="tab">Mô tả</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specsPanel" type="button" role="tab">Thông số kỹ thuật</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviewsPanel" type="button" role="tab">Đánh giá (128)</button>
                </li>
            </ul>
            <div class="tab-content" id="productTabsContent">
                <div class="tab-pane fade show active p-3" id="descPanel" role="tabpanel">
                    <h5>iPhone 16 Pro Max — Đỉnh cao công nghệ</h5>
                    <p>iPhone 16 Pro Max là chiếc iPhone lớn nhất và mạnh mẽ nhất của Apple. Với chip A18 Pro mới, bạn sẽ có hiệu năng tuyệt vời cho mọi tác vụ từ chơi game đến chỉnh sửa video 4K.</p>
                    <p>Camera 48MP với hệ thống ống kính tetraprism cho khả năng zoom quang học 5x, chụp ảnh sắc nét ngay cả trong điều kiện thiếu sáng. Khung viền titan cao cấp, mặt lưng kính nhám sang trọng.</p>
                    <p>Pin lớn nhất từ trước đến nay trên iPhone, đủ sử dụng cả ngày dài. Sạc nhanh MagSafe và USB-C tiện lợi.</p>
                </div>
                <div class="tab-pane fade p-3" id="specsPanel" role="tabpanel">
                    <table class="spec-table">
                        <tr><td>Màn hình</td><td>6.9 inch Super Retina XDR OLED, 2868 x 1320</td></tr>
                        <tr><td>Chip xử lý</td><td>Apple A18 Pro</td></tr>
                        <tr><td>RAM</td><td>8 GB</td></tr>
                        <tr><td>Bộ nhớ</td><td>256 GB</td></tr>
                        <tr><td>Camera sau</td><td>48MP + 12MP + 12MP (zoom 5x)</td></tr>
                        <tr><td>Camera trước</td><td>12MP TrueDepth</td></tr>
                        <tr><td>Pin</td><td>4685 mAh, sạc nhanh 27W</td></tr>
                        <tr><td>Hệ điều hành</td><td>iOS 18</td></tr>
                        <tr><td>Kháng nước</td><td>IP68</td></tr>
                        <tr><td>Kết nối</td><td>5G, Wi-Fi 7, Bluetooth 5.3, NFC, USB-C 3</td></tr>
                        <tr><td>Trọng lượng</td><td>227g</td></tr>
                    </table>
                </div>
                <div class="tab-pane fade p-3" id="reviewsPanel" role="tabpanel">
                    <div class="text-center py-4">
                        <i class="bi bi-chat-square-text" style="font-size:2.5rem;color:var(--text-muted)"></i>
                        <p class="text-muted mt-2">Chức năng đánh giá sẽ được cập nhật sớm.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-4">
            <h3 class="section-title">Sản phẩm liên quan</h3>
            <div class="row g-3 mt-2">
                <?php
                $related = [
                    ['id' => '3', 'name' => 'Samsung Galaxy S25 Ultra', 'category' => 'Điện thoại', 'price' => 30990000, 'original_price' => 33990000, 'image' => 'https://placehold.co/400x400/059669/ffffff?text=Galaxy+S25'],
                    ['id' => '10', 'name' => 'Xiaomi 15 Ultra', 'category' => 'Điện thoại', 'price' => 24990000, 'original_price' => 27990000, 'image' => 'https://placehold.co/400x400/d946ef/ffffff?text=Xiaomi+15'],
                    ['id' => '5', 'name' => 'AirPods Pro 3', 'category' => 'Phụ kiện', 'price' => 6990000, 'original_price' => 7490000, 'image' => 'https://placehold.co/400x400/f59e0b/ffffff?text=AirPods+3'],
                    ['id' => '7', 'name' => 'Apple Watch Ultra 3', 'category' => 'Smartwatch', 'price' => 21990000, 'original_price' => 23990000, 'image' => 'https://placehold.co/400x400/dc2626/ffffff?text=Watch+Ultra'],
                ];
                foreach ($related as $p):
                ?>
                <div class="col-6 col-md-3">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['id'] ?>">
                                <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
                            </a>
                            <div class="product-actions-overlay">
                                <button class="btn-icon btn-add-to-cart"
                                    data-id="<?= $p['id'] ?>" data-name="<?= $p['name'] ?>" data-price="<?= $p['price'] ?>"
                                    data-image="<?= $p['image'] ?>" data-category="<?= $p['category'] ?>">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category"><?= $p['category'] ?></span>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['id'] ?>" class="product-name"><?= $p['name'] ?></a>
                            <div class="product-price-wrapper">
                                <span class="price-sale"><?= number_format($p['price'], 0, ',', '.') ?>₫</span>
                                <span class="price-original"><?= number_format($p['original_price'], 0, ',', '.') ?>₫</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
