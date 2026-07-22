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
                        <h6 class="mb-0 mt-1" style="color:#fff;">Nguyễn Văn A</h6>
                        <small style="opacity:0.8;">user@dgentech.vn</small>
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
                        <a class="nav-link text-danger" href="<?= BASE_URL ?>?action=login">
                            <i class="bi bi-box-arrow-right"></i> Đăng xuất
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="account-content">
                            <h5 class="fw-bold mb-4"><i class="bi bi-person-gear me-2"></i>Thông tin cá nhân</h5>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Họ và tên</label>
                                        <input type="text" class="form-control" value="Nguyễn Văn A" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" value="user@dgentech.vn" readonly style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-secondary);color:var(--text-secondary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Số điện thoại</label>
                                        <input type="tel" class="form-control" value="0912 345 678" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ngày sinh</label>
                                        <input type="date" class="form-control" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Địa chỉ</label>
                                        <input type="text" class="form-control" placeholder="Nhập địa chỉ..." style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-semibold">#DH001</td>
                                            <td>20/07/2026</td>
                                            <td class="fw-bold">34.990.000₫</td>
                                            <td><span class="status-badge shipping">Đang giao</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-accent rounded-pill">Chi tiết</a></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">#DH002</td>
                                            <td>15/07/2026</td>
                                            <td class="fw-bold">8.490.000₫</td>
                                            <td><span class="status-badge completed">Hoàn thành</span></td>
                                            <td><a href="#" class="btn btn-sm btn-outline-accent rounded-pill">Chi tiết</a></td>
                                        </tr>
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
