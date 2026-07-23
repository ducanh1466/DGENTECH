<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <div class="account-header">
                        <div class="account-avatar"><i class="bi bi-person-fill"></i></div>
                        <h6 class="mb-0 mt-1" style="color:#fff;"><?= htmlspecialchars($user['full_name']) ?></h6>
                        <small style="opacity:0.8;"><?= htmlspecialchars($user['email']) ?></small>
                    </div>
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="#profile" data-bs-toggle="tab">
                            <i class="bi bi-person"></i> Thông tin cá nhân
                        </a>
                        <a class="nav-link" href="#orders" data-bs-toggle="tab">
                            <i class="bi bi-receipt"></i> Đơn hàng của tôi
                        </a>
                        <a class="nav-link" href="#password" data-bs-toggle="tab">
                            <i class="bi bi-key"></i> Đổi mật khẩu
                        </a>
                        <a class="nav-link text-danger" href="<?= BASE_URL ?>?action=logout">
                            <i class="bi bi-box-arrow-right"></i> Đăng xuất
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="account-content">
                            <h5 class="fw-bold mb-4"><i class="bi bi-person-gear me-2"></i>Thông tin cá nhân</h5>
                            <form method="POST" action="">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Họ và tên</label>
                                        <input type="text" class="form-control" name="fullname" value="<?= htmlspecialchars($user['full_name']) ?>" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" readonly style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-secondary);color:var(--text-secondary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Số điện thoại</label>
                                        <input type="tel" class="form-control" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Vai trò</label>
                                        <input type="text" class="form-control" value="<?= $user['role'] == 'admin' ? 'Quản trị viên' : 'Khách hàng' ?>" readonly style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-secondary);color:var(--text-secondary);">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-accent"><i class="bi bi-check-lg me-1"></i> Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <div class="account-content">
                            <h5 class="fw-bold mb-4"><i class="bi bi-receipt me-2"></i>Đơn hàng của tôi</h5>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead style="background:var(--bg-secondary);">
                                        <tr>
                                            <th>Mã đơn</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($orders)): ?>
                                            <tr><td colspan="4" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td></tr>
                                        <?php else: foreach ($orders as $order): ?>
                                            <tr>
                                                <td class="fw-semibold">#<?= $order['order_id'] ?></td>
                                                <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                                                <td class="fw-bold"><?= number_format($order['total_amount'], 0, ',', '.') ?>₫</td>
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
                                            </tr>
                                        <?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="password">
                        <div class="account-content">
                            <h5 class="fw-bold mb-4"><i class="bi bi-key me-2"></i>Đổi mật khẩu</h5>
                            <form style="max-width:400px;">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control" required style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Mật khẩu mới</label>
                                    <input type="password" class="form-control" required style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control" required style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                </div>
                                <button type="submit" class="btn btn-accent"><i class="bi bi-check-lg me-1"></i> Đổi mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (isset($_SESSION['clear_cart'])): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof DGENCart !== 'undefined') {
        DGENCart.clearCart();
    }
});
</script>
<?php unset($_SESSION['clear_cart']); endif; ?>
