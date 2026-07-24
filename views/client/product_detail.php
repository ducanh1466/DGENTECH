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
                    <div class="product-gallery mb-3">
                        <div class="main-image">
                            <img src="<?= !empty($product['image']) ? htmlspecialchars($product['image']) : 'https://placehold.co/600x600/4361ee/ffffff?text=' . urlencode($product['product_name']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" id="mainProductImage">
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
                                        <div class="fpt-price-main" id="displayPriceMain"><?= number_format($displayPrice, 0, ',', '.') ?> VNĐ</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fpt-tradein-banner">
                            <span>Thu cũ - Giảm thêm đến <strong>3.000.000 VNĐ</strong></span>
                            <a href="#">Định giá ngay <i class="bi bi-chevron-right"></i></a>
                        </div>

                        <?php if (!empty($variants)): ?>
                        <div class="mb-4">
                            <label class="fw-bold mb-2 d-block text-muted" style="font-size:0.9rem;">Tùy chọn phiên bản</label>
                            <div class="d-flex gap-2 flex-wrap" id="variantContainer">
                                <?php foreach ($variants as $idx => $v): ?>
                                    <button class="variant-btn fpt-style <?= $idx === 0 ? 'active' : '' ?>"
                                        data-id="<?= $v['variant_id'] ?>"
                                        data-name="<?= htmlspecialchars($v['variant_name']) ?>"
                                        data-price="<?= isset($v['price']) && $v['price'] !== '' ? $v['price'] : $displayPrice ?>"
                                        data-stock="<?= isset($v['stock_quantity']) && $v['stock_quantity'] !== '' ? (int)$v['stock_quantity'] : 0 ?>">
                                        <?= htmlspecialchars($v['variant_name']) ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                            <div id="variantStockInfo" class="mt-2 text-danger fw-bold" style="font-size: 0.9rem; display: none;">
                                <i class="bi bi-exclamation-circle"></i> Hết hàng
                            </div>
                            <!-- Thuộc tính của biến thể (Màu sắc, kích cỡ...) -->
                            <div id="variantAttributesInfo" class="mt-2 text-muted" style="font-size: 0.9rem;">
                                <!-- Điền bằng JS -->
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Promotions -->
                        <div class="fpt-promo-box">
                            <div class="fpt-promo-title">
                                <span>Ưu đãi được hưởng:</span>
                                <div>
                                    <span class="promo-val"><?= number_format($displayPrice, 0, ',', '.') ?> VNĐ</span>
                                </div>
                            </div>
                            <ul class="fpt-promo-list">
                                <li><i class="bi bi-check-circle-fill"></i> Giảm ngay 500.000 VNĐ áp dụng đến cuối tháng</li>
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
                // Store variant attributes in a JS object
                const variantsData = <?= json_encode($variants ?? []) ?>;

                document.addEventListener('DOMContentLoaded', function() {
                    const variantBtns = document.querySelectorAll('.variant-btn.fpt-style');
                    const addToCartBtn = document.getElementById('addToCartDetail');
                    const buyNowBtn = document.getElementById('buyNowBtnDetail');
                    const stockInfo = document.getElementById('variantStockInfo');
                    const priceMain = document.getElementById('displayPriceMain');
                    const stickyPrice = document.getElementById('fptStickyPrice');
                    const attributesInfo = document.getElementById('variantAttributesInfo');

                    variantBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            variantBtns.forEach(b => b.classList.remove('active'));
                            this.classList.add('active');

                            const variantId = this.getAttribute('data-id');
                            const variantName = this.getAttribute('data-name');
                            let price = parseInt(this.getAttribute('data-price'));
                            if (isNaN(price)) {
                                price = <?= (int)$displayPrice ?>;
                            }
                            const stock = parseInt(this.getAttribute('data-stock')) || 0;
                            
                            const baseName = "<?= addslashes($product['product_name']) ?>";
                            addToCartBtn.setAttribute('data-name', baseName + ' (' + variantName + ')');
                            addToCartBtn.setAttribute('data-price', price);
                            
                            // Format price
                            const formattedPrice = new Intl.NumberFormat('vi-VN').format(price) + ' VNĐ';
                            if (priceMain) priceMain.textContent = formattedPrice;
                            if (stickyPrice) stickyPrice.textContent = formattedPrice;

                            // Update attributes display
                            if (attributesInfo) {
                                const variantData = variantsData.find(v => v.variant_id == variantId);
                                if (variantData && variantData.attributes && variantData.attributes.length > 0) {
                                    let attrHtml = '';
                                    variantData.attributes.forEach(attr => {
                                        attrHtml += `<span class="badge bg-secondary me-1">${attr.attribute_name}: ${attr.attribute_value}</span>`;
                                    });
                                    attributesInfo.innerHTML = attrHtml;
                                } else {
                                    attributesInfo.innerHTML = '';
                                }
                            }

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

        <!-- Grid Thông số kỹ thuật nổi bật (như FPT Shop) -->
        <div class="product-specs-grid row g-3 mb-5 mt-4">
            <div class="col-6 col-md-4">
                <div class="p-3 border rounded text-center bg-light h-100 d-flex flex-column justify-content-center">
                    <small class="text-muted d-block mb-1">Thương hiệu</small>
                    <span class="fw-bold"><?= htmlspecialchars($product['brand_name'] ?? 'Đang cập nhật') ?></span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="p-3 border rounded text-center bg-light h-100 d-flex flex-column justify-content-center">
                    <small class="text-muted d-block mb-1">Danh mục</small>
                    <span class="fw-bold"><?= htmlspecialchars($product['category_name'] ?? 'Đang cập nhật') ?></span>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="p-3 border rounded text-center bg-light h-100 d-flex flex-column justify-content-center">
                    <small class="text-muted d-block mb-1">Bảo hành</small>
                    <span class="fw-bold"><?= htmlspecialchars($product['warranty_period'] ?? '12') ?> tháng</span>
                </div>
            </div>
            <?php if (isset($productAttributes) && is_array($productAttributes) && count($productAttributes) > 0): ?>
                <?php foreach ($productAttributes as $attr): ?>
                <div class="col-6 col-md-4">
                    <div class="p-3 border rounded text-center bg-light h-100 d-flex flex-column justify-content-center">
                        <small class="text-muted d-block mb-1"><?= htmlspecialchars($attr['attribute_name']) ?></small>
                        <span class="fw-bold text-dark"><?= htmlspecialchars($attr['attribute_values']) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Vertical Sections: Description & Reviews -->
        <div class="product-detail-section mb-5">
            <div class="p-4 border rounded bg-white shadow-sm mb-5">
                <h4 class="mb-4 fw-bold">Mô tả sản phẩm</h4>
                <h5><?= htmlspecialchars($product['product_name']) ?></h5>
                <p class="mt-3" style="line-height: 1.8; font-size: 1.05rem;"><?= nl2br(htmlspecialchars($product['description'] ?? 'Sản phẩm này chưa có bài viết mô tả chi tiết.')) ?></p>
            </div>

            <div class="p-4 border rounded bg-white shadow-sm" id="reviewsPanel">
                <h4 class="mb-4 fw-bold">Đánh giá và bình luận</h4>
                <div class="p-3">
                    <?php if ($canReview): ?>
                        <div class="review-form-container mb-5 p-4 border rounded shadow-sm bg-light">
                            <h5 class="mb-3">Viết đánh giá của bạn</h5>
                            <form action="<?= BASE_URL ?>?action=submit-review" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Đánh giá sao:</label>
                                    <div class="rating-stars mb-2" style="font-size: 1.5rem; color: #ffc107; cursor: pointer;">
                                        <i class="bi bi-star-fill star-select" data-val="1"></i>
                                        <i class="bi bi-star-fill star-select" data-val="2"></i>
                                        <i class="bi bi-star-fill star-select" data-val="3"></i>
                                        <i class="bi bi-star-fill star-select" data-val="4"></i>
                                        <i class="bi bi-star-fill star-select" data-val="5"></i>
                                    </div>
                                    <input type="hidden" name="rating" id="ratingValue" value="5">
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label fw-bold">Nội dung đánh giá:</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="3" required placeholder="Chia sẻ cảm nhận của bạn về sản phẩm..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-accent">Gửi đánh giá</button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <h5 class="mb-4">Khách hàng đánh giá (<?= count($reviews ?? []) ?>)</h5>
                    <?php if (empty($reviews)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-chat-square-text" style="font-size:2.5rem;color:var(--text-muted)"></i>
                            <p class="text-muted mt-2">Chưa có đánh giá nào cho sản phẩm này.</p>
                        </div>
                    <?php else: ?>
                        <div class="reviews-list">
                            <?php foreach ($reviews as $rev): ?>
                                <div class="review-item mb-4 pb-3 border-bottom">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="<?= !empty($rev['avatar']) ? htmlspecialchars($rev['avatar']) : 'https://placehold.co/50x50/e2e8f0/64748b?text=' . urlencode(substr($rev['full_name'], 0, 1)) ?>" alt="Avatar" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0 fw-bold"><?= htmlspecialchars($rev['full_name']) ?></h6>
                                            <div class="text-warning" style="font-size: 0.85rem;">
                                                <?php for($i=1; $i<=5; $i++): ?>
                                                    <i class="bi <?= $i <= $rev['rating'] ? 'bi-star-fill' : 'bi-star' ?>"></i>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="ms-auto text-muted" style="font-size: 0.85rem;">
                                            <?= date('d/m/Y H:i', strtotime($rev['created_at'])) ?>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark"><?= nl2br(htmlspecialchars($rev['comment'])) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const stars = document.querySelectorAll('.star-select');
                        const ratingInput = document.getElementById('ratingValue');
                        
                        stars.forEach(star => {
                            star.addEventListener('click', function() {
                                const val = parseInt(this.getAttribute('data-val'));
                                ratingInput.value = val;
                                
                                stars.forEach((s, idx) => {
                                    if (idx < val) {
                                        s.classList.remove('bi-star');
                                        s.classList.add('bi-star-fill');
                                    } else {
                                        s.classList.remove('bi-star-fill');
                                        s.classList.add('bi-star');
                                    }
                                });
                            });
                        });
                    });
                </script>
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
                                <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?> VNĐ</span>
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
                    <div class="fpt-sticky-price" id="fptStickyPrice"><?= number_format($displayPrice, 0, ',', '.') ?> VNĐ</div>
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
