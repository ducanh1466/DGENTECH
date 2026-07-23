<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>

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
                <?php if (empty($users)): ?>
                    <tr><td colspan="8" class="text-center">Chưa có người dùng nào.</td></tr>
                <?php else: ?>
                    <?php foreach ($users as $i => $user): ?>
                    <tr>
                        <td class="fw-semibold"><?= $i + 1 ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:34px;height:34px;border-radius:50%;background:var(--accent-gradient);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:0.8rem;">
                                    <?= mb_substr(htmlspecialchars($user['full_name']), 0, 1) ?>
                                </div>
                                <span class="fw-semibold"><?= htmlspecialchars($user['full_name']) ?></span>
                            </div>
                        </td>
                        <td class="text-secondary"><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['phone'] ?? '') ?></td>
                        <td>
                            <?php if ($user['role'] == 1): ?>
                                <span class="badge bg-primary rounded-pill">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-secondary rounded-pill">Khách hàng</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-secondary"><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                        <td>
                            <span class="status-badge <?= $user['status'] == 1 ? 'active' : 'inactive' ?>">
                                <?= $user['status'] == 1 ? 'Hoạt động' : 'Vô hiệu' ?>
                            </span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <button class="btn btn-sm btn-outline-primary" onclick="editUser(<?= $user['user_id'] ?>, <?= $user['status'] ?>, <?= $user['role'] ?>)" data-bs-toggle="modal" data-bs-target="#userModal"><i class="bi bi-pencil"></i></button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <input type="hidden" name="action_type" id="userActionType" value="update_status">
                <input type="hidden" name="user_id" id="modalUserId" value="">
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Cập nhật</label>
                        <select class="form-select" id="updateTypeSelect" onchange="document.getElementById('userActionType').value = this.value; toggleUserInputs();" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                            <option value="update_status">Trạng thái</option>
                            <option value="update_role">Phân quyền</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="statusInputGroup">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select" name="status" id="modalUserStatus" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                            <option value="1">Hoạt động</option>
                            <option value="0">Vô hiệu</option>
                        </select>
                    </div>
                    
                    <div class="mb-3 d-none" id="roleInputGroup">
                        <label class="form-label fw-semibold">Vai trò</label>
                        <select class="form-select" name="role" id="modalUserRole" style="border:2px solid var(--border-color);border-radius:var(--radius-md);padding:10px 14px;background:var(--bg-primary);color:var(--text-primary);">
                            <option value="1">Admin</option>
                            <option value="0">Khách hàng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-accent">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editUser(id, status, role) {
    document.getElementById('modalUserId').value = id;
    document.getElementById('modalUserStatus').value = status;
    document.getElementById('modalUserRole').value = role;
    
    // Reset to status update by default when opening
    document.getElementById('updateTypeSelect').value = 'update_status';
    document.getElementById('userActionType').value = 'update_status';
    toggleUserInputs();
}

function toggleUserInputs() {
    const type = document.getElementById('updateTypeSelect').value;
    if (type === 'update_status') {
        document.getElementById('statusInputGroup').classList.remove('d-none');
        document.getElementById('roleInputGroup').classList.add('d-none');
    } else {
        document.getElementById('statusInputGroup').classList.add('d-none');
        document.getElementById('roleInputGroup').classList.remove('d-none');
    }
}
</script>
