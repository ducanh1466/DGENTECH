<div class="admin-table-card">
    <div class="card-header-custom">
        <h6><i class="bi bi-tags me-2"></i>Quản lý danh mục</h6>
        <button class="btn btn-accent btn-sm" data-bs-toggle="modal" data-bs-target="#categoryModal">
            <i class="bi bi-plus-lg me-1"></i> Thêm danh mục
        </button>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Số sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $categories = [
                    ['id' => 1, 'name' => 'Laptop', 'desc' => 'Laptop gaming, văn phòng, đồ họa', 'count' => 120, 'status' => 'active'],
                    ['id' => 2, 'name' => 'Điện thoại', 'desc' => 'Smartphone các thương hiệu', 'count' => 85, 'status' => 'active'],
                    ['id' => 3, 'name' => 'Tablet', 'desc' => 'Máy tính bảng iPad, Samsung, Xiaomi', 'count' => 40, 'status' => 'active'],
                    ['id' => 4, 'name' => 'Smartwatch', 'desc' => 'Đồng hồ thông minh', 'count' => 30, 'status' => 'active'],
                    ['id' => 5, 'name' => 'Phụ kiện', 'desc' => 'Tai nghe, sạc, ốp lưng, cáp', 'count' => 200, 'status' => 'active'],
                    ['id' => 6, 'name' => 'PC & Màn hình', 'desc' => 'PC gaming, màn hình máy tính', 'count' => 60, 'status' => 'inactive'],
                ];
                foreach ($categories as $i => $cat):
                ?>
                <tr>
                    <td class="fw-semibold"><?= $i + 1 ?></td>
                    <td class="fw-semibold"><?= $cat['name'] ?></td>
                    <td class="text-secondary"><?= $cat['desc'] ?></td>
                    <td><span class="badge bg-light text-dark rounded-pill"><?= $cat['count'] ?></span></td>
                    <td><span class="status-badge <?= $cat['status'] ?>"><?= $cat['status'] === 'active' ? 'Hiển thị' : 'Ẩn' ?></span></td>
                    <td>
                        <div class="table-actions">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#categoryModal"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-confirm"><i class="bi bi-trash3"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm / Sửa danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục..." required
                            style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Mô tả danh mục..."
                            style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select" name="status"
                            style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                            <option value="active">Hiển thị</option>
                            <option value="inactive">Ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-accent">Lưu danh mục</button>
                </div>
            </form>
        </div>
    </div>
</div>
