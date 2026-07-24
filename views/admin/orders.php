<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success'];
    unset($_SESSION['success']); ?></div>
<?php endif; ?>

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
                <i class="bi bi-search position-absolute"
                    style="left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);"></i>
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
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Chưa có đơn hàng nào.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td class="fw-bold">#<?= $order['order_id'] ?></td>
                            <td>
                                <div class="fw-semibold"><?= htmlspecialchars($order['recipient_name']) ?></div>
                                <small class="text-muted"><?= htmlspecialchars($order['recipient_phone']) ?></small>
                            </td>
                            <td>...</td> <!-- Items count needs detail fetch -->
                            <td class="fw-bold"><?= number_format($order['total_amount'], 0, ',', '.') ?>₫</td>
                            <td>
                                <?php if (($order['payment_method'] ?? 'cod') === 'bank'): ?>
                                    <span class="badge bg-info text-dark"><i class="bi bi-bank"></i> Chuyển khoản</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><i class="bi bi-cash"></i> COD</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                $statusMap = [
                                    'pending' => 'Chờ xử lý',
                                    'confirmed' => 'Đã xác nhận',
                                    'shipping' => 'Đang giao',
                                    'completed' => 'Hoàn thành',
                                    'cancelled' => 'Đã hủy'
                                ];
                                $stText = $statusMap[$order['status']] ?? 'Không rõ';
                                ?>
                                <span class="status-badge <?= htmlspecialchars($order['status']) ?>"><?= $stText ?></span>
                            </td>
                            <td class="text-secondary"><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                            <td>
                                <div class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary"
                                        onclick="editOrderStatus(<?= $order['order_id'] ?>, '<?= $order['status'] ?>')"
                                        data-bs-toggle="modal" data-bs-target="#orderModal"><i class="bi bi-pencil"></i> Cập
                                        nhật</button>
                                    <a href="<?= BASE_URL ?>?action=admin-order-detail&id=<?= $order['order_id'] ?>"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i> Chi tiết
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Order Status Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật trạng thái đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="order_id" id="modalOrderId" value="">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select" name="status" id="modalOrderStatus"
                            style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                            <option value="pending">Chờ xử lý</option>
                            <option value="confirmed">Đã xác nhận</option>
                            <option value="shipping">Đang giao</option>
                            <option value="completed">Hoàn thành</option>
                            <option value="cancelled">Đã hủy</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill"
                        data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-accent">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editOrderStatus(id, status) {
        document.getElementById('modalOrderId').value = id;
        document.getElementById('modalOrderStatus').value = status;
    }
</script>