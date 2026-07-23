<div class="row g-4">
    <div class="col-lg-12">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="admin-form-card">
                        <h6 class="fw-bold mb-4"><i class="bi bi-box-seam me-2"></i>Thông tin sản phẩm</h6>

                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="product_name" value="<?= htmlspecialchars($product['product_name'] ?? '') ?>" placeholder="Nhập tên sản phẩm..." required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= $cat['category_id'] ?>" <?= (isset($product['category_id']) && $product['category_id'] == $cat['category_id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['category_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Thương hiệu</label>
                                <select class="form-select" name="brand_id">
                                    <option value="">-- Chọn thương hiệu --</option>
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?= $brand['brand_id'] ?>" <?= (isset($product['brand_id']) && $product['brand_id'] == $brand['brand_id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($brand['brand_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thời gian bảo hành (tháng)</label>
                            <input type="number" class="form-control" name="warranty_period" value="<?= htmlspecialchars($product['warranty_period'] ?? '') ?>" placeholder="12">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" name="description" rows="6" placeholder="Mô tả chi tiết sản phẩm..."><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Side settings -->
                <div class="col-lg-4">
                    <div class="admin-form-card mb-4">
                        <h6 class="fw-bold mb-3">Trạng thái</h6>
                        <select class="form-select" name="status">
                            <option value="active" <?= (isset($product['status']) && $product['status'] == 'active') ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="inactive" <?= (isset($product['status']) && $product['status'] == 'inactive') ? 'selected' : '' ?>>Ẩn</option>
                        </select>
                    </div>

                    <div class="admin-form-card mb-4">
                        <h6 class="fw-bold mb-3">Hình ảnh</h6>
                        <div class="upload-area">
                            <i class="bi bi-cloud-arrow-up d-block"></i>
                            <p>Kéo thả hình ảnh hoặc <strong class="text-accent">click để chọn</strong></p>
                        </div>
                        <input type="file" id="productImage" name="image" accept="image/*" class="d-none">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-check-lg me-1"></i> Lưu sản phẩm
                        </button>
                        <a href="<?= BASE_URL ?>?action=admin-products" class="btn btn-outline-secondary rounded-pill">
                            <i class="bi bi-x-lg me-1"></i> Hủy
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
