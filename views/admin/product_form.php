<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-form-card">
            <h6 class="fw-bold mb-4"><i class="bi bi-box-seam me-2"></i>Thông tin sản phẩm</h6>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm..." required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Danh mục <span class="text-danger">*</span></label>
                        <select class="form-select" name="category_id" required>
                            <option value="">-- Chọn danh mục --</option>
                            <option>Laptop</option>
                            <option>Điện thoại</option>
                            <option>Tablet</option>
                            <option>Smartwatch</option>
                            <option>Phụ kiện</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Thương hiệu</label>
                        <input type="text" class="form-control" name="brand" placeholder="Apple, Samsung, Dell...">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Giá gốc (₫) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="original_price" placeholder="0" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Giá bán (₫) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="sale_price" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" name="short_desc" rows="3" placeholder="Mô tả ngắn về sản phẩm..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả chi tiết</label>
                    <textarea class="form-control" name="description" rows="6" placeholder="Mô tả chi tiết sản phẩm..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Hình ảnh sản phẩm</label>
                    <div class="upload-area">
                        <i class="bi bi-cloud-arrow-up d-block"></i>
                        <p>Kéo thả hình ảnh hoặc <strong class="text-accent">click để chọn</strong></p>
                        <small class="text-muted">PNG, JPG, WEBP — tối đa 5MB</small>
                    </div>
                    <input type="file" id="productImage" name="image" accept="image/*" class="d-none">
                    <div class="upload-preview"></div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-accent">
                        <i class="bi bi-check-lg me-1"></i> Lưu sản phẩm
                    </button>
                    <a href="<?= BASE_URL ?>?action=admin-products" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-x-lg me-1"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Side settings -->
    <div class="col-lg-4">
        <div class="admin-form-card mb-4">
            <h6 class="fw-bold mb-3">Trạng thái</h6>
            <select class="form-select" name="status">
                <option value="active">Hiển thị</option>
                <option value="inactive">Ẩn</option>
            </select>
        </div>

        <div class="admin-form-card mb-4">
            <h6 class="fw-bold mb-3">Số lượng tồn kho</h6>
            <input type="number" class="form-control" name="stock" placeholder="0" value="100">
        </div>

        <div class="admin-form-card">
            <h6 class="fw-bold mb-3">Tags</h6>
            <input type="text" class="form-control" name="tags" placeholder="Mới, Hot, Sale...">
            <small class="text-muted">Phân cách bằng dấu phẩy</small>
        </div>
    </div>
</div>
