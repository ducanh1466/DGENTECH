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
                <!-- Gallery -->
                <div class="col-lg-5">
                    <div class="product-gallery mb-3">
                        <div class="main-image">
                            <img src="<?= !empty($product['image']) ? htmlspecialchars($product['image']) : 'https://placehold.co/600x600/4361ee/ffffff?text=' . urlencode($product['product_name']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" id="mainProductImage">
                        </div>
                    </div>
                    <!-- Thông số nổi bật -->
                    <div class="fpt-specs-row">
                        <div class="fpt-spec-item">
                            <i class="bi bi-memory"></i>
                            <div>
                                <span>RAM</span>
                                <strong><?= htmlspecialchars(!empty($product['ram']) ? $product['ram'] : 'N/A') ?></strong>
                            </div>
                        </div>
                        <div class="fpt-spec-item">
                            <i class="bi bi-phone"></i>
                            <div>
                                <span>Màn hình</span>
                                <strong><?= htmlspecialchars(!empty($product['screen']) ? $product['screen'] : 'N/A') ?></strong>
                            </div>
                        </div>
                        <div class="fpt-spec-item">
                            <i class="bi bi-arrow-repeat"></i>
                            <div>
                                <span>Tần số quét</span>
                                <strong><?= htmlspecialchars(!empty($product['refresh_rate']) ? $product['refresh_rate'] : 'N/A') ?></strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <!-- Info -->
                <div class="col-lg-7">
                    <div class="product-detail-info">
                        <h1 class="product-title mb-1" style="font-size: 1.4rem;"><?= htmlspecialchars($product['product_name']) ?></h1>
                        <div class="product-rating-detail mb-3 d-flex align-items-center">
                            <span class="text-muted me-3" style="font-size: 0.85rem;">No.<?= str_pad($product['product_id'], 8, '0', STR_PAD_LEFT) ?></span>
                            <span class="text-warning"><i class="bi bi-star-fill"></i> 5</span>
                            <span class="text-muted ms-1" style="font-size: 0.85rem;">(128 đánh giá)</span>
                            <span class="text-muted mx-2">|</span>
                            <a href="#specsPanel" class="text-accent text-decoration-none" style="font-size: 0.85rem;" onclick="document.getElementById('specs-tab').click();"><i class="bi bi-info-circle"></i> Thông số</a>
                        </div>

                        <?php 
                        $displayPrice = $product['price'] ?? 0;
                        ?>
                        <div class="fpt-price-box">
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-end mb-1">
                                        <div class="fpt-price-main"><?= number_format($displayPrice, 0, ',', '.') ?>₫</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fpt-tradein-banner">
                            <span>Thu cũ - Giảm thêm đến <strong>3.000.000đ</strong></span>
                            <a href="#">Định giá ngay <i class="bi bi-chevron-right"></i></a>
                        </div>

                        <?php if (!empty($variants)): ?>
                        <div class="mb-4">
                            <label class="fw-bold mb-2 d-block text-muted" style="font-size:0.9rem;">Tùy chọn phiên bản</label>
                            <div class="d-flex gap-2 flex-wrap">
                                <?php foreach ($variants as $idx => $v): ?>
                                    <button class="variant-btn fpt-style <?= $idx === 0 ? 'active' : '' ?>"
                                        data-name="<?= htmlspecialchars($v['variant_name']) ?>"
                                        data-stock="<?= isset($v['stock']) ? (int)$v['stock'] : 0 ?>">
                                        <?= htmlspecialchars($v['variant_name']) ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                            <div id="variantStockInfo" class="mt-2 text-danger fw-bold" style="font-size: 0.9rem; display: none;">
                                <i class="bi bi-exclamation-circle"></i> Hết hàng
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Promotions -->
                        <div class="fpt-promo-box">
                            <div class="fpt-promo-title">
                                <span>Ưu đãi được hưởng:</span>
                                <div>
                                    <span class="promo-val"><?= number_format($displayPrice, 0, ',', '.') ?>₫</span>
                                </div>
                            </div>
                            <ul class="fpt-promo-list">
                                <li><i class="bi bi-check-circle-fill"></i> Giảm ngay 500.000đ áp dụng đến cuối tháng</li>
                                <li><i class="bi bi-check-circle-fill"></i> Tặng thêm đến 2.5 triệu khi mua kèm phụ kiện</li>
                                <li><i class="bi bi-check-circle-fill"></i> Trả góp 0% qua thẻ tín dụng</li>
                            </ul>
                        </div>

                        <div class="mb-4 d-none">
                            <input type="number" id="detailQty" value="1">
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-outline-danger flex-grow-1 py-3" style="font-size: 1rem; font-weight: 700;" id="addToCartDetail"
                                data-id="<?= $product['product_id'] ?>" data-name="<?= htmlspecialchars($product['product_name']) ?>" data-price="<?= $displayPrice ?>"
                                data-image="<?= !empty($product['image']) ? htmlspecialchars($product['image']) : 'https://placehold.co/400x400/4361ee/ffffff?text=' . urlencode($product['product_name']) ?>" data-category="<?= htmlspecialchars($product['category_name']) ?>">
                                <i class="bi bi-cart-plus me-1"></i> Thêm vào giỏ
                            </button>
                            <a href="<?= BASE_URL ?>?action=cart" class="btn btn-danger flex-grow-1 py-3 text-center" style="font-size: 1.1rem; font-weight: 700; text-decoration: none; color: #fff;" id="buyNowBtnDetail">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const variantBtns = document.querySelectorAll('.variant-btn.fpt-style');
                    const addToCartBtn = document.getElementById('addToCartDetail');
                    const buyNowBtn = document.getElementById('buyNowBtnDetail');
                    const stockInfo = document.getElementById('variantStockInfo');

                    variantBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            variantBtns.forEach(b => b.classList.remove('active'));
                            this.classList.add('active');

                            const variantName = this.getAttribute('data-name');
                            const stock = parseInt(this.getAttribute('data-stock'));
                            
                            const baseName = "<?= addslashes($product['product_name']) ?>";
                            addToCartBtn.setAttribute('data-name', baseName + ' (' + variantName + ')');
                            
                            // Check stock
                            if (stock <= 0) {
                                addToCartBtn.disabled = true;
                                buyNowBtn.style.pointerEvents = 'none';
                                buyNowBtn.classList.add('disabled');
                                stockInfo.style.display = 'block';
                                stockInfo.innerHTML = '<i class="bi bi-exclamation-circle"></i> Hết hàng';
                            } else {
                                addToCartBtn.disabled = false;
                                buyNowBtn.style.pointerEvents = 'auto';
                                buyNowBtn.classList.remove('disabled');
                                stockInfo.style.display = 'block';
                                stockInfo.className = 'mt-2 text-success fw-bold';
                                stockInfo.innerHTML = '<i class="bi bi-check-circle"></i> Còn ' + stock + ' sản phẩm';
                            }
                            
                            // Also update sticky bar
                            const stickyVariant = document.getElementById('stickyVariantName');
                            if(stickyVariant) stickyVariant.textContent = 'Phân loại: ' + variantName;
                        });
                    });

                    if(variantBtns.length > 0) {
                        variantBtns[0].click();
                    }
                });
                </script>
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
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviewsPanel" type="button" role="tab">Đánh giá</button>
                </li>
            </ul>
            <div class="tab-content" id="productTabsContent">
                <div class="tab-pane fade show active p-3" id="descPanel" role="tabpanel">
                    <h5><?= htmlspecialchars($product['product_name']) ?></h5>
                    <p><?= nl2br(htmlspecialchars($product['description'] ?? 'Sản phẩm này chưa có bài viết mô tả chi tiết.')) ?></p>
                </div>
                <div class="tab-pane fade p-3" id="specsPanel" role="tabpanel">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%">Thương hiệu</th>
                                <td><?= htmlspecialchars($product['brand_name'] ?? 'Đang cập nhật') ?></td>
                            </tr>
                            <tr>
                                <th>RAM</th>
                                <td><?= htmlspecialchars(!empty($product['ram']) ? $product['ram'] : 'Đang cập nhật') ?></td>
                            </tr>
                            <tr>
                                <th>Màn hình</th>
                                <td><?= htmlspecialchars(!empty($product['screen']) ? $product['screen'] : 'Đang cập nhật') ?></td>
                            </tr>
                            <tr>
                                <th>Tần số quét</th>
                                <td><?= htmlspecialchars(!empty($product['refresh_rate']) ? $product['refresh_rate'] : 'Đang cập nhật') ?></td>
                            </tr>
                            <tr>
                                <th>Bảo hành</th>
                                <td><?= htmlspecialchars($product['warranty_period'] ?? '12') ?> tháng</td>
                            </tr>
                        </tbody>
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
                if (empty($relatedProducts)):
                    echo '<p class="text-center w-100">Không có sản phẩm liên quan.</p>';
                else:
                foreach ($relatedProducts as $p):
                ?>
                <div class="col-6 col-md-3">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>">
                                <img src="<?= !empty($p['image']) ? htmlspecialchars($p['image']) : 'https://placehold.co/400x400/059669/ffffff?text=' . urlencode($p['product_name']) ?>" alt="<?= htmlspecialchars($p['product_name']) ?>">
                            </a>
                            <div class="product-actions-overlay">
                                <button class="btn-icon btn-add-to-cart"
                                    data-id="<?= $p['product_id'] ?>" data-name="<?= htmlspecialchars($p['product_name']) ?>" data-price="<?= $p['price'] ?? 0 ?>"
                                    data-image="<?= !empty($p['image']) ? htmlspecialchars($p['image']) : 'https://placehold.co/400x400/059669/ffffff?text=' . urlencode($p['product_name']) ?>" data-category="<?= htmlspecialchars($p['category_name']) ?>">
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

<!-- Sticky Bottom Bar -->
<?php 
$displayPrice = $product['price'] ?? 0;
?>
<div class="fpt-sticky-bottom" id="fptStickyBar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <img src="<?= !empty($product['image']) ? htmlspecialchars($product['image']) : 'https://placehold.co/100x100/4361ee/ffffff?text=' . urlencode($product['product_name']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" class="fpt-sticky-thumb d-none d-md-block">
                <div>
                    <h6 class="fpt-sticky-title mb-0"><?= htmlspecialchars($product['product_name']) ?></h6>
                    <p class="fpt-sticky-variant mb-0" id="stickyVariantName">Phân loại: Mặc định</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4">
                <div class="text-end d-none d-md-block">
                    <div class="fpt-sticky-price"><?= number_format($displayPrice, 0, ',', '.') ?>₫</div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-danger px-3 rounded-pill" onclick="document.getElementById('addToCartDetail').click()"><i class="bi bi-cart-plus"></i></button>
                    <a href="<?= BASE_URL ?>?action=cart" class="btn btn-danger px-4 rounded-pill" style="font-weight:600; text-decoration: none; color: #fff;">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stickyBar = document.getElementById('fptStickyBar');
    const addToCartBtn = document.getElementById('addToCartDetail');
    
    // Show sticky bar on scroll past add to cart button
    window.addEventListener('scroll', function() {
        if (!addToCartBtn) return;
        const rect = addToCartBtn.getBoundingClientRect();
        if (rect.bottom < 0) {
            stickyBar.classList.add('show');
        } else {
            stickyBar.classList.remove('show');
        }
    });
});
</script>
