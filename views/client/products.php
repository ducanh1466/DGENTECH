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
                <form action="<?= BASE_URL ?>" method="GET" class="filter-sidebar">
                    <input type="hidden" name="action" value="products">
                    <?php if (!empty($_GET['keyword'])): ?>
                        <input type="hidden" name="keyword" value="<?= htmlspecialchars($_GET['keyword']) ?>">
                    <?php endif; ?>

                    <h5 class="fw-bold mb-3"><i class="bi bi-funnel me-1"></i> Bộ lọc</h5>

                    <!-- Category -->
                    <?php if (!empty($categoriesList)): ?>
                    <h6>Danh mục</h6>
                    <div class="mb-3">
                        <?php foreach ($categoriesList as $cat): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="<?= $cat['category_id'] ?>" id="cat_<?= $cat['category_id'] ?>" <?= (in_array($cat['category_id'], $categories)) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="cat_<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Brand -->
                    <?php if (!empty($brandsList)): ?>
                    <h6>Thương hiệu</h6>
                    <div class="mb-3">
                        <?php foreach ($brandsList as $brand): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="brands[]" value="<?= $brand['brand_id'] ?>" id="brand_<?= $brand['brand_id'] ?>" <?= (in_array($brand['brand_id'], $brands)) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="brand_<?= $brand['brand_id'] ?>"><?= htmlspecialchars($brand['brand_name']) ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Dynamic Attributes -->
                    <?php if (!empty($attributesList)): ?>
                        <?php foreach ($attributesList as $attr_id => $attr): ?>
                        <h6><?= htmlspecialchars($attr['attribute_name']) ?></h6>
                        <div class="mb-3">
                            <?php foreach ($attr['values'] as $val): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="attributes[]" value="<?= $val['attribute_value_id'] ?>" id="attr_<?= $val['attribute_value_id'] ?>" <?= (in_array($val['attribute_value_id'], $attributeValues)) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="attr_<?= $val['attribute_value_id'] ?>"><?= htmlspecialchars($val['attribute_value']) ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Price Range -->
                    <h6>Khoảng giá</h6>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" value="all" id="priceAll" checked>
                            <label class="form-check-label" for="priceAll">Tất cả</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" value="0-5000000" id="priceUnder5">
                            <label class="form-check-label" for="priceUnder5">Dưới 5 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" value="5000000-15000000" id="price5to15">
                            <label class="form-check-label" for="price5to15">5 - 15 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" value="15000000-30000000" id="price15to30">
                            <label class="form-check-label" for="price15to30">15 - 30 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceRange" value="30000000-999999999" id="priceAbove30">
                            <label class="form-check-label" for="priceAbove30">Trên 30 triệu</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-accent w-100"><i class="bi bi-search me-1"></i> Áp dụng</button>
                </form>
            </div>

            <!-- ========== PRODUCT GRID ========== -->
            <div class="col-lg-9">
                <!-- Sort Bar -->
                <div class="sort-bar d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span class="text-secondary" style="font-size:0.9rem;">
                        Hiển thị <strong><?= min($offset + 1, $totalProducts) ?> - <?= min($offset + $limit, $totalProducts) ?></strong> trên <strong><?= $totalProducts ?></strong> sản phẩm
                    </span>
                    <div class="d-flex align-items-center gap-2">
                        <label class="text-secondary" style="font-size:0.9rem;white-space:nowrap;">Sắp xếp:</label>
                        <select class="form-select form-select-sm" style="width:auto;" onchange="window.location.href=this.value;">
                            <?php
                            $queryParams = $_GET;
                            unset($queryParams['sort']);
                            $baseUrlSort = BASE_URL . '?' . http_build_query($queryParams) . '&sort=';
                            ?>
                            <option value="<?= $baseUrlSort ?>default" <?= $sort == 'default' ? 'selected' : '' ?>>Mới nhất</option>
                            <option value="<?= $baseUrlSort ?>price_asc" <?= $sort == 'price_asc' ? 'selected' : '' ?>>Giá thấp → cao</option>
                            <option value="<?= $baseUrlSort ?>price_desc" <?= $sort == 'price_desc' ? 'selected' : '' ?>>Giá cao → thấp</option>
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
                                        <span class="price-sale"><?= number_format($p['price'] ?? 0, 0, ',', '.') ?> VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                <nav class="mt-4 d-flex justify-content-center">
                    <ul class="pagination">
                        <?php
                        $queryParams = $_GET;
                        $prevPage = $page - 1;
                        if ($prevPage < 1) $prevPage = 1;
                        $queryParams['page'] = $prevPage;
                        $prevUrl = BASE_URL . '?' . http_build_query($queryParams);
                        ?>
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>"><a class="page-link" href="<?= $prevUrl ?>"><i class="bi bi-chevron-left"></i></a></li>
                        
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php 
                            $queryParams['page'] = $i;
                            $pageUrl = BASE_URL . '?' . http_build_query($queryParams);
                            ?>
                            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>"><a class="page-link" href="<?= $pageUrl ?>"><?= $i ?></a></li>
                        <?php endfor; ?>

                        <?php
                        $nextPage = $page + 1;
                        if ($nextPage > $totalPages) $nextPage = $totalPages;
                        $queryParams['page'] = $nextPage;
                        $nextUrl = BASE_URL . '?' . http_build_query($queryParams);
                        ?>
                        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>"><a class="page-link" href="<?= $nextUrl ?>"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
