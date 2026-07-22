<div class="admin-table-card">
    <div class="card-header-custom">
        <h6><i class="bi bi-box-seam me-2"></i>Quản lý sản phẩm</h6>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);"></i>
                <input type="text" class="admin-search-input" id="adminTableSearch" placeholder="Tìm sản phẩm...">
            </div>
            <a href="<?= BASE_URL ?>?action=admin-product-create" class="btn btn-accent btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Thêm sản phẩm
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = [
                    ['id' => 1, 'name' => 'iPhone 16 Pro Max 256GB', 'category' => 'Điện thoại', 'price' => 34990000, 'status' => 'active', 'image' => 'https://placehold.co/60x60/4361ee/ffffff?text=IP16'],
                    ['id' => 2, 'name' => 'MacBook Air M3 15 inch', 'category' => 'Laptop', 'price' => 32990000, 'status' => 'active', 'image' => 'https://placehold.co/60x60/7c3aed/ffffff?text=MB'],
                    ['id' => 3, 'name' => 'Samsung Galaxy S25 Ultra', 'category' => 'Điện thoại', 'price' => 30990000, 'status' => 'active', 'image' => 'https://placehold.co/60x60/059669/ffffff?text=S25'],
                    ['id' => 4, 'name' => 'iPad Pro M4 11 inch', 'category' => 'Tablet', 'price' => 28990000, 'status' => 'active', 'image' => 'https://placehold.co/60x60/ec4899/ffffff?text=iPad'],
                    ['id' => 5, 'name' => 'AirPods Pro 3', 'category' => 'Phụ kiện', 'price' => 6990000, 'status' => 'inactive', 'image' => 'https://placehold.co/60x60/f59e0b/ffffff?text=AP3'],
                    ['id' => 6, 'name' => 'Dell XPS 16 9640', 'category' => 'Laptop', 'price' => 45990000, 'status' => 'active', 'image' => 'https://placehold.co/60x60/0891b2/ffffff?text=XPS'],
                ];
                foreach ($products as $i => $p):
                ?>
                <tr>
                    <td class="fw-semibold"><?= $i + 1 ?></td>
                    <td><img src="<?= $p['image'] ?>" class="product-thumb" alt=""></td>
                    <td>
                        <div class="fw-semibold"><?= $p['name'] ?></div>
                        <small class="text-muted">ID: #<?= $p['id'] ?></small>
                    </td>
                    <td><?= $p['category'] ?></td>
                    <td class="fw-bold"><?= number_format($p['price'], 0, ',', '.') ?>₫</td>
                    <td><span class="status-badge <?= $p['status'] ?>"><?= $p['status'] === 'active' ? 'Hiển thị' : 'Ẩn' ?></span></td>
                    <td>
                        <div class="table-actions">
                            <a href="<?= BASE_URL ?>?action=admin-product-edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <button class="btn btn-sm btn-outline-danger btn-delete-confirm"><i class="bi bi-trash3"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center p-3 border-top" style="border-color:var(--border-light)!important">
        <span class="text-muted" style="font-size:0.85rem;">Hiển thị 1-6 trên 324 sản phẩm</span>
        <nav>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>
</div>
