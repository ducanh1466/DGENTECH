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
                    <?php
                    $products = [
                        ['id' => '1', 'name' => 'iPhone 16 Pro Max 256GB', 'category' => 'Điện thoại', 'price' => 34990000, 'original_price' => 36990000, 'badge' => 'sale', 'image' => 'https://placehold.co/400x400/4361ee/ffffff?text=iPhone+16'],
                        ['id' => '2', 'name' => 'MacBook Air M3 15 inch', 'category' => 'Laptop', 'price' => 32990000, 'original_price' => 37990000, 'badge' => 'sale', 'image' => 'https://placehold.co/400x400/7c3aed/ffffff?text=MacBook+M3'],
                        ['id' => '3', 'name' => 'Samsung Galaxy S25 Ultra', 'category' => 'Điện thoại', 'price' => 30990000, 'original_price' => 33990000, 'badge' => 'new', 'image' => 'https://placehold.co/400x400/059669/ffffff?text=Galaxy+S25'],
                        ['id' => '4', 'name' => 'iPad Pro M4 11 inch', 'category' => 'Tablet', 'price' => 28990000, 'original_price' => 31990000, 'badge' => 'new', 'image' => 'https://placehold.co/400x400/ec4899/ffffff?text=iPad+Pro'],
                        ['id' => '5', 'name' => 'AirPods Pro 3', 'category' => 'Phụ kiện', 'price' => 6990000, 'original_price' => 7490000, 'badge' => '', 'image' => 'https://placehold.co/400x400/f59e0b/ffffff?text=AirPods+3'],
                        ['id' => '6', 'name' => 'Dell XPS 16 9640', 'category' => 'Laptop', 'price' => 45990000, 'original_price' => 49990000, 'badge' => 'sale', 'image' => 'https://placehold.co/400x400/0891b2/ffffff?text=Dell+XPS'],
                        ['id' => '7', 'name' => 'Apple Watch Ultra 3', 'category' => 'Smartwatch', 'price' => 21990000, 'original_price' => 23990000, 'badge' => 'new', 'image' => 'https://placehold.co/400x400/dc2626/ffffff?text=Watch+Ultra'],
                        ['id' => '8', 'name' => 'Samsung Galaxy Tab S10', 'category' => 'Tablet', 'price' => 22990000, 'original_price' => 25990000, 'badge' => '', 'image' => 'https://placehold.co/400x400/6366f1/ffffff?text=Tab+S10'],
                        ['id' => '9', 'name' => 'ASUS ROG Zephyrus G14', 'category' => 'Laptop', 'price' => 38990000, 'original_price' => 42990000, 'badge' => 'sale', 'image' => 'https://placehold.co/400x400/1e293b/ffffff?text=ROG+G14'],
                        ['id' => '10', 'name' => 'Xiaomi 15 Ultra', 'category' => 'Điện thoại', 'price' => 24990000, 'original_price' => 27990000, 'badge' => 'new', 'image' => 'https://placehold.co/400x400/d946ef/ffffff?text=Xiaomi+15'],
                        ['id' => '11', 'name' => 'Sony WH-1000XM6', 'category' => 'Phụ kiện', 'price' => 8490000, 'original_price' => 9490000, 'badge' => '', 'image' => 'https://placehold.co/400x400/334155/ffffff?text=Sony+XM6'],
                        ['id' => '12', 'name' => 'Galaxy Watch 7 Classic', 'category' => 'Smartwatch', 'price' => 7990000, 'original_price' => 8990000, 'badge' => '', 'image' => 'https://placehold.co/400x400/0f766e/ffffff?text=Watch+7'],
                    ];

                    foreach ($products as $p):
                    ?>
                    <div class="col-6 col-md-4">
                        <div class="product-card">
                            <?php if ($p['badge'] === 'new'): ?>
                                <span class="badge-new"><i class="bi bi-stars"></i> Mới</span>
                            <?php elseif ($p['badge'] === 'sale'): ?>
                                <span class="badge-sale">-<?= round((1 - $p['price'] / $p['original_price']) * 100) ?>%</span>
                            <?php endif; ?>

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
                                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['id'] ?>" class="btn-icon">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="product-category"><?= $p['category'] ?></span>
                                <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $p['id'] ?>" class="product-name"><?= $p['name'] ?></a>
                                <div class="product-rating">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                                </div>
                                <div class="product-price-wrapper">
                                    <span class="price-sale"><?= number_format($p['price'], 0, ',', '.') ?>₫</span>
                                    <?php if ($p['original_price'] > $p['price']): ?>
                                    <span class="price-original"><?= number_format($p['original_price'], 0, ',', '.') ?>₫</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
