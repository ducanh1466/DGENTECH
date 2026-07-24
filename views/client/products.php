<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row g-4">
            <!-- ========== SIDEBAR FILTER ========== -->
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h5 class="fw-bold mb-3"><i class="bi bi-funnel me-1"></i> Bộ lọc</h5>

                    <!-- Category -->
                    <h6>Danh mục</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="catLaptop">
                            <label class="form-check-label" for="catLaptop">Laptop</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="catPhone">
                            <label class="form-check-label" for="catPhone">Điện thoại</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="catTablet">
                            <label class="form-check-label" for="catTablet">Tablet</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="catWatch">
                            <label class="form-check-label" for="catWatch">Smartwatch</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="catAccessories">
                            <label class="form-check-label" for="catAccessories">Phụ kiện</label>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <h6>Khoảng giá</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" id="priceAll" checked>
                            <label class="form-check-label" for="priceAll">Tất cả</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" id="priceUnder5">
                            <label class="form-check-label" for="priceUnder5">Dưới 5 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" id="price5to15">
                            <label class="form-check-label" for="price5to15">5 - 15 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" id="price15to30">
                            <label class="form-check-label" for="price15to30">15 - 30 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" id="priceAbove30">
                            <label class="form-check-label" for="priceAbove30">Trên 30 triệu</label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <h6>Thương hiệu</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="brandApple">
                            <label class="form-check-label" for="brandApple">Apple</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="brandSamsung">
                            <label class="form-check-label" for="brandSamsung">Samsung</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="brandDell">
                            <label class="form-check-label" for="brandDell">Dell</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="brandAsus">
                            <label class="form-check-label" for="brandAsus">ASUS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="brandXiaomi">
                            <label class="form-check-label" for="brandXiaomi">Xiaomi</label>
                        </div>
                    </div>

                    <button class="btn btn-accent w-100"><i class="bi bi-search me-1"></i> Áp dụng</button>
                </div>
            </div>

            <!-- ========== PRODUCT GRID ========== -->
            <div class="col-lg-9">
                <!-- Sort Bar -->
                <div class="sort-bar d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span class="text-secondary" style="font-size:0.9rem;">
                        Hiển thị <strong>1 - 12</strong> trên <strong>48</strong> sản phẩm
                    </span>
                    <div class="d-flex align-items-center gap-2">
                        <label class="text-secondary" style="font-size:0.9rem;white-space:nowrap;">Sắp xếp:</label>
                        <select class="form-select form-select-sm" style="width:auto;">
                            <option>Mặc định</option>
                            <option>Giá thấp → cao</option>
                            <option>Giá cao → thấp</option>
                            <option>Mới nhất</option>
                            <option>Bán chạy nhất</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row g-3">
                    <?php if (empty($products)): ?>
                        <div class="col-12 text-center">
                            <p>Không tìm thấy sản phẩm nào.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($products as $p): ?>
                        <div class="col-6 col-md-4">
                            <div class="product-card">
                                <div class="product-img-wrapper">
                                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>">
                                        <img src="<?= !empty($p['image']) ? htmlspecialchars($p['image']) : 'https://placehold.co/400x400/e2e8f0/64748b?text=' . urlencode($p['product_name']) ?>" alt="<?= htmlspecialchars($p['product_name']) ?>">
                                    </a>
                                    <div class="product-actions-overlay">
                                        <button class="btn-icon btn-add-to-cart"
                                            data-id="<?= $p['product_id'] ?>" data-name="<?= htmlspecialchars($p['product_name']) ?>" data-price="<?= $p['price'] ?? 0 ?>"
                                            data-image="<?= !empty($p['image']) ? htmlspecialchars($p['image']) : 'https://placehold.co/400x400/e2e8f0/64748b?text=' . urlencode($p['product_name']) ?>" data-category="<?= htmlspecialchars($p['category_name'] ?? '') ?>">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                        <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="btn-icon">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="product-category"><?= htmlspecialchars($p['category_name'] ?? '') ?></span>
                                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['product_id'] ?>" class="product-name"><?= htmlspecialchars($p['product_name']) ?></a>
                                    <div class="product-rating">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                                    </div>
                                    <div class="product-price-wrapper">
                                        <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?>₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <nav class="mt-4 d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
