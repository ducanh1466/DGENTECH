<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-blue"><i class="bi bi-receipt"></i></div>
            <div class="stat-value">156</div>
            <div class="stat-label">Tổng đơn hàng</div>
            <span class="stat-trend up"><i class="bi bi-arrow-up"></i> 12.5%</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-green"><i class="bi bi-currency-dollar"></i></div>
            <div class="stat-value">2.4 tỷ</div>
            <div class="stat-label">Doanh thu</div>
            <span class="stat-trend up"><i class="bi bi-arrow-up"></i> 8.3%</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-orange"><i class="bi bi-box-seam"></i></div>
            <div class="stat-value">324</div>
            <div class="stat-label">Sản phẩm</div>
            <span class="stat-trend up"><i class="bi bi-arrow-up"></i> 3.2%</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-red"><i class="bi bi-people"></i></div>
            <div class="stat-value">1,289</div>
            <div class="stat-label">Người dùng</div>
            <span class="stat-trend down"><i class="bi bi-arrow-down"></i> 2.1%</span>
        </div>
    </div>
</div>

<!-- Chart + Recent Orders -->
<div class="row g-4">
    <!-- Chart -->
    <div class="col-lg-8">
        <div class="chart-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Đơn hàng theo tháng</h6>
                <select class="form-select form-select-sm" style="width:auto;border:1px solid var(--border-color);background:var(--bg-primary);color:var(--text-primary);">
                    <option>2026</option>
                    <option>2025</option>
                </select>
            </div>
            <div class="chart-placeholder">
                <div class="text-center">
                    <i class="bi bi-bar-chart-line" style="font-size:2.5rem;display:block;margin-bottom:8px;"></i>
                    Biểu đồ sẽ hiển thị khi tích hợp Chart.js
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="col-lg-4">
        <div class="admin-table-card">
            <div class="card-header-custom">
                <h6>Đơn hàng gần đây</h6>
                <a href="<?= BASE_URL ?>?action=admin-orders" class="text-accent" style="font-size:0.85rem;">Xem tất cả</a>
            </div>

            <div class="p-3">
                <!-- Order Item -->
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color:var(--border-light)!important">
                    <div>
                        <div class="fw-semibold" style="font-size:0.9rem;">#DH156</div>
                        <small class="text-muted">Nguyễn Văn A</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold" style="font-size:0.9rem;">34.990.000₫</div>
                        <span class="status-badge pending" style="font-size:0.7rem;padding:2px 8px;">Chờ xử lý</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color:var(--border-light)!important">
                    <div>
                        <div class="fw-semibold" style="font-size:0.9rem;">#DH155</div>
                        <small class="text-muted">Trần Thị B</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold" style="font-size:0.9rem;">8.490.000₫</div>
                        <span class="status-badge confirmed" style="font-size:0.7rem;padding:2px 8px;">Đã xác nhận</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color:var(--border-light)!important">
                    <div>
                        <div class="fw-semibold" style="font-size:0.9rem;">#DH154</div>
                        <small class="text-muted">Lê Văn C</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold" style="font-size:0.9rem;">22.990.000₫</div>
                        <span class="status-badge shipping" style="font-size:0.7rem;padding:2px 8px;">Đang giao</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color:var(--border-light)!important">
                    <div>
                        <div class="fw-semibold" style="font-size:0.9rem;">#DH153</div>
                        <small class="text-muted">Phạm Thị D</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold" style="font-size:0.9rem;">6.990.000₫</div>
                        <span class="status-badge completed" style="font-size:0.7rem;padding:2px 8px;">Hoàn thành</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div>
                        <div class="fw-semibold" style="font-size:0.9rem;">#DH152</div>
                        <small class="text-muted">Hoàng Văn E</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold" style="font-size:0.9rem;">45.990.000₫</div>
                        <span class="status-badge completed" style="font-size:0.7rem;padding:2px 8px;">Hoàn thành</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
