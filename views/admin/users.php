<div class="admin-table-card">
    <div class="card-header-custom">
        <h6><i class="bi bi-people me-2"></i>Quản lý người dùng</h6>
        <div class="d-flex gap-2 align-items-center flex-wrap">
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);"></i>
                <input type="text" class="admin-search-input" id="adminTableSearch" placeholder="Tìm người dùng...">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Vai trò</th>
                    <th>Ngày đăng ký</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = [
                    ['id' => 1, 'name' => 'Admin', 'email' => 'admin@dgentech.vn', 'phone' => '0900000001', 'role' => 'Admin', 'date' => '01/01/2026', 'status' => 'active'],
                    ['id' => 2, 'name' => 'Nguyễn Văn A', 'email' => 'nguyenvana@gmail.com', 'phone' => '0912345678', 'role' => 'Khách hàng', 'date' => '15/03/2026', 'status' => 'active'],
                    ['id' => 3, 'name' => 'Trần Thị B', 'email' => 'tranthib@gmail.com', 'phone' => '0987654321', 'role' => 'Khách hàng', 'date' => '20/04/2026', 'status' => 'active'],
                    ['id' => 4, 'name' => 'Lê Văn C', 'email' => 'levanc@gmail.com', 'phone' => '0909123456', 'role' => 'Khách hàng', 'date' => '05/05/2026', 'status' => 'active'],
                    ['id' => 5, 'name' => 'Phạm Thị D', 'email' => 'phamthid@gmail.com', 'phone' => '0933456789', 'role' => 'Khách hàng', 'date' => '10/06/2026', 'status' => 'inactive'],
                    ['id' => 6, 'name' => 'Hoàng Văn E', 'email' => 'hoangvane@gmail.com', 'phone' => '0911222333', 'role' => 'Khách hàng', 'date' => '12/07/2026', 'status' => 'active'],
                ];
                foreach ($users as $i => $user):
                ?>
                <tr>
                    <td class="fw-semibold"><?= $i + 1 ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:34px;height:34px;border-radius:50%;background:var(--accent-gradient);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.8rem;">
                                <?= mb_substr($user['name'], 0, 1) ?>
                            </div>
                            <span class="fw-semibold"><?= $user['name'] ?></span>
                        </div>
                    </td>
                    <td class="text-secondary"><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td>
                        <?php if ($user['role'] === 'Admin'): ?>
                            <span class="badge bg-primary rounded-pill">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-secondary rounded-pill">Khách hàng</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-secondary"><?= $user['date'] ?></td>
                    <td><span class="status-badge <?= $user['status'] ?>"><?= $user['status'] === 'active' ? 'Hoạt động' : 'Vô hiệu' ?></span></td>
                    <td>
                        <div class="table-actions">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete-confirm"><i class="bi bi-trash3"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center p-3 border-top" style="border-color:var(--border-light)!important">
        <span class="text-muted" style="font-size:0.85rem;">Hiển thị 1-6 trên 1,289 người dùng</span>
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
