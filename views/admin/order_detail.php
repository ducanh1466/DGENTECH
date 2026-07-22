<div class="row g-4">
    <!-- Order Info -->
    <div class="col-lg-4">
        <div class="order-info-card mb-4">
            <h6><i class="bi bi-info-circle me-2"></i>Thông tin đơn hàng</h6>
            <div class="info-row"><span class="label">Mã đơn</span><span class="value">#DH156</span></div>
            <div class="info-row"><span class="label">Ngày đặt</span><span class="value">21/07/2026</span></div>
            <div class="info-row"><span class="label">Trạng thái</span><span class="status-badge pending">Chờ xử lý</span></div>
            <div class="info-row"><span class="label">Thanh toán</span><span class="value">COD</span></div>
        </div>

        <div class="order-info-card mb-4">
            <h6><i class="bi bi-person me-2"></i>Thông tin khách hàng</h6>
            <div class="info-row"><span class="label">Họ tên</span><span class="value">Nguyễn Văn A</span></div>
            <div class="info-row"><span class="label">SĐT</span><span class="value">0912 345 678</span></div>
            <div class="info-row"><span class="label">Email</span><span class="value">nguyenvana@gmail.com</span></div>
        </div>

        <div class="order-info-card mb-4">
            <h6><i class="bi bi-geo-alt me-2"></i>Địa chỉ giao hàng</h6>
            <p class="mb-0" style="font-size:0.9rem;color:var(--text-secondary);">
                123 Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh
            </p>
        </div>

        <div class="order-info-card">
            <h6><i class="bi bi-arrow-repeat me-2"></i>Cập nhật trạng thái</h6>
            <form method="POST" action="">
                <select class="form-select mb-3" name="status"
                    style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px;background:var(--bg-primary);color:var(--text-primary);">
                    <option value="pending" selected>Chờ xử lý</option>
                    <option value="confirmed">Đã xác nhận</option>
                    <option value="shipping">Đang giao hàng</option>
                    <option value="completed">Hoàn thành</option>
                    <option value="cancelled">Hủy đơn</option>
                </select>
                <button type="submit" class="btn btn-accent w-100">
                    <i class="bi bi-check-lg me-1"></i> Cập nhật
                </button>
            </form>
        </div>
    </div>

    <!-- Order Items -->
    <div class="col-lg-8">
        <div class="admin-table-card mb-4">
            <div class="card-header-custom">
                <h6>Sản phẩm trong đơn hàng</h6>
            </div>
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="https://placehold.co/50x50/4361ee/ffffff?text=IP16" class="product-thumb" alt="">
                                    <div>
                                        <div class="fw-semibold">iPhone 16 Pro Max 256GB</div>
                                        <small class="text-muted">Titan Tự nhiên</small>
                                    </div>
                                </div>
                            </td>
                            <td>34.990.000₫</td>
                            <td>1</td>
                            <td class="fw-bold">34.990.000₫</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="order-info-card">
            <h6><i class="bi bi-calculator me-2"></i>Tổng kết đơn hàng</h6>
            <div class="info-row"><span class="label">Tạm tính</span><span class="value">34.990.000₫</span></div>
            <div class="info-row"><span class="label">Phí vận chuyển</span><span class="value text-success">Miễn phí</span></div>
            <div class="info-row"><span class="label">Giảm giá</span><span class="value">0₫</span></div>
            <hr>
            <div class="info-row" style="font-size:1.1rem;">
                <span class="label fw-bold">Tổng thanh toán</span>
                <span class="value fw-bold" style="color:var(--danger);">34.990.000₫</span>
            </div>
        </div>

        <div class="mt-3">
            <a href="<?= BASE_URL ?>?action=admin-orders" class="btn btn-outline-accent">
                <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách
            </a>
        </div>
    </div>
</div>
