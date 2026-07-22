<div class="admin-table-card">
    <div class="card-header-custom">
        <h6><i class="bi bi-receipt me-2"></i>Quản lý đơn hàng</h6>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <select class="admin-filter-select" id="statusFilter">
                <option value="all">Tất cả trạng thái</option>
                <option value="pending">Chờ xử lý</option>
                <option value="confirmed">Đã xác nhận</option>
                <option value="shipping">Đang giao</option>
                <option value="completed">Hoàn thành</option>
                <option value="cancelled">Đã hủy</option>
            </select>
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);"></i>
                <input type="text" class="admin-search-input" id="adminTableSearch" placeholder="Tìm đơn hàng...">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Sản phẩm</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders = [
                    ['id' => 'DH156', 'customer' => 'Nguyễn Văn A', 'phone' => '0912345678', 'items' => 1, 'total' => 34990000, 'status' => 'pending', 'status_text' => 'Chờ xử lý', 'date' => '21/07/2026'],
                    ['id' => 'DH155', 'customer' => 'Trần Thị B', 'phone' => '0987654321', 'items' => 2, 'total' => 8490000, 'status' => 'confirmed', 'status_text' => 'Đã xác nhận', 'date' => '20/07/2026'],
                    ['id' => 'DH154', 'customer' => 'Lê Văn C', 'phone' => '0909123456', 'items' => 1, 'total' => 22990000, 'status' => 'shipping', 'status_text' => 'Đang giao', 'date' => '19/07/2026'],
                    ['id' => 'DH153', 'customer' => 'Phạm Thị D', 'phone' => '0933456789', 'items' => 1, 'total' => 6990000, 'status' => 'completed', 'status_text' => 'Hoàn thành', 'date' => '18/07/2026'],
                    ['id' => 'DH152', 'customer' => 'Hoàng Văn E', 'phone' => '0911222333', 'items' => 3, 'total' => 45990000, 'status' => 'completed', 'status_text' => 'Hoàn thành', 'date' => '17/07/2026'],
                    ['id' => 'DH151', 'customer' => 'Vũ Thị F', 'phone' => '0944555666', 'items' => 1, 'total' => 24990000, 'status' => 'cancelled', 'status_text' => 'Đã hủy', 'date' => '16/07/2026'],
                ];
                foreach ($orders as $order):
                ?>
                <tr>
                    <td class="fw-bold">#<?= $order['id'] ?></td>
                    <td>
                        <div class="fw-semibold"><?= $order['customer'] ?></div>
                        <small class="text-muted"><?= $order['phone'] ?></small>
                    </td>
                    <td><?= $order['items'] ?> sản phẩm</td>
                    <td class="fw-bold"><?= number_format($order['total'], 0, ',', '.') ?>₫</td>
                    <td><span class="status-badge <?= $order['status'] ?>"><?= $order['status_text'] ?></span></td>
                    <td class="text-secondary"><?= $order['date'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>?action=admin-order-detail&id=<?= $order['id'] ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> Chi tiết
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center p-3 border-top" style="border-color:var(--border-light)!important">
        <span class="text-muted" style="font-size:0.85rem;">Hiển thị 1-6 trên 156 đơn hàng</span>
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
