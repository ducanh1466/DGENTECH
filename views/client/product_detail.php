<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>?action=products">Sản phẩm</a></li>
                <li class="breadcrumb-item active"><?= htmlspecialchars($product['product_name']) ?></li>
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
                            <img src="https://placehold.co/600x600/4361ee/ffffff?text=<?= urlencode($product['product_name']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" id="mainProductImage">
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-7">
                    <div class="product-detail-info">
                        <span class="badge rounded-pill bg-primary mb-2"><?= htmlspecialchars($product['category_name']) ?></span>
                        <h1 class="product-title"><?= htmlspecialchars($product['product_name']) ?></h1>
                        <div class="product-rating-detail mb-2">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                            <span class="text-muted ms-1">(128 đánh giá)</span>
                            <span class="text-muted mx-2">|</span>
                            <span class="text-success"><i class="bi bi-check-circle"></i> <?= $product['status'] == 'active' ? 'Còn hàng' : 'Hết hàng' ?></span>
                        </div>

                        <?php 
                        $displayPrice = 0;
                        if (!empty($variants)) {
                            $displayPrice = $variants[0]['price'];
                        }
                        ?>
                        <div class="product-price-detail"><?= number_format($displayPrice, 0, ',', '.') ?>₫</div>

                        <p class="product-desc-short">
                            <?= nl2br(htmlspecialchars($product['description'] ?? 'Chưa có mô tả.')) ?>
                        </p>

                        <?php if (!empty($variants)): ?>
                        <div class="mb-3">
                            <label class="fw-bold mb-2 d-block" style="font-size:0.9rem;">Tùy chọn:</label>
                            <div class="d-flex gap-2">
                                <?php foreach ($variants as $idx => $v): ?>
                                    <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 <?= $idx === 0 ? 'active' : '' ?>">
                                        <?= htmlspecialchars($v['variant_name']) ?> - <?= number_format($v['price'], 0, ',', '.') ?>₫
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="mb-4">
                            <label class="fw-bold mb-2 d-block" style="font-size:0.9rem;">Số lượng:</label>
                            <div class="quantity-selector">
                                <button class="qty-minus">−</button>
                                <input type="number" class="qty-input" id="detailQty" value="1" min="1">
                                <button class="qty-plus">+</button>
                            </div>
                        </div>

                        <div class="d-flex gap-3 flex-wrap">
                            <button class="btn btn-accent btn-lg" id="addToCartDetail"
                                data-id="<?= $product['product_id'] ?>" data-name="<?= htmlspecialchars($product['product_name']) ?>" data-price="<?= $displayPrice ?>"
                                data-image="https://placehold.co/400x400/4361ee/ffffff?text=<?= urlencode($product['product_name']) ?>" data-category="<?= htmlspecialchars($product['category_name']) ?>">
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
                                    <i class="bi bi-shield-check text-accent"></i> Bảo hành <?= htmlspecialchars($product['warranty_period'] ?? '12') ?> tháng
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-arrow-repeat text-accent"></i> Đổi trả 30 ngày
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2 text-secondary" style="font-size:0.85rem;">
                                    <i class="bi bi-credit-card text-accent"></i> Hỗ trợ trả góp
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
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviewsPanel" type="button" role="tab">Đánh giá</button>
                </li>
            </ul>
            <div class="tab-content" id="productTabsContent">
                <div class="tab-pane fade show active p-3" id="descPanel" role="tabpanel">
                    <h5><?= htmlspecialchars($product['product_name']) ?></h5>
                    <p><?= nl2br(htmlspecialchars($product['description'] ?? 'Sản phẩm này chưa có bài viết mô tả chi tiết.')) ?></p>
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
                if (empty($relatedProducts)):
                    echo '<p class="text-center w-100">Không có sản phẩm liên quan.</p>';
                else:
                foreach ($relatedProducts as $p):
                ?>
                <div class="col-6 col-md-3">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>">
                                <img src="https://placehold.co/400x400/059669/ffffff?text=<?= urlencode($p['product_name']) ?>" alt="<?= htmlspecialchars($p['product_name']) ?>">
                            </a>
                            <div class="product-actions-overlay">
                                <button class="btn-icon btn-add-to-cart"
                                    data-id="<?= $p['product_id'] ?>" data-name="<?= htmlspecialchars($p['product_name']) ?>" data-price="<?= $p['price'] ?? 0 ?>"
                                    data-image="https://placehold.co/400x400/059669/ffffff?text=<?= urlencode($p['product_name']) ?>" data-category="<?= htmlspecialchars($p['category_name']) ?>">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category"><?= htmlspecialchars($p['category_name']) ?></span>
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="product-name"><?= htmlspecialchars($p['product_name']) ?></a>
                            <div class="product-price-wrapper">
                                <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?>₫</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</section>
