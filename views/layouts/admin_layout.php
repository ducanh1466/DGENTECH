<!DOCTYPE html>
<html lang="vi" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin - DGENTECH' ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= BASE_CSS ?>style.css" rel="stylesheet">
    <link href="<?= BASE_CSS ?>admin.css" rel="stylesheet">
</head>

<body>

    <div class="admin-wrapper">

        <!-- Sidebar Overlay (mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========== SIDEBAR ========== -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <a href="<?= BASE_URL ?>?action=admin" class="sidebar-brand">
                    <i class="bi bi-cpu"></i> DGENTECH <small>Admin</small>
                </a>
                <button class="sidebar-close" id="sidebarCloseBtn">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-label">Menu chính</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= ($action ?? '') === 'admin' ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin">
                            <i class="bi bi-grid-1x2-fill"></i> Dashboard
                        </a>
                    </li>
                </ul>

                <div class="nav-label">Quản lý</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($action ?? '', ['admin-products', 'admin-product-create', 'admin-product-edit']) ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin-products">
                            <i class="bi bi-box-seam"></i> Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($action ?? '') === 'admin-categories' ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin-categories">
                            <i class="bi bi-tags"></i> Danh mục
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($action ?? '') === 'admin-brands' ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin-brands">
                            <i class="bi bi-star"></i> Thương hiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= in_array($action ?? '', ['admin-orders', 'admin-order-detail']) ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin-orders">
                            <i class="bi bi-receipt"></i> Đơn hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($action ?? '') === 'admin-users' ? 'active' : '' ?>" href="<?= BASE_URL ?>?action=admin-users">
                            <i class="bi bi-people"></i> Người dùng
                        </a>
                    </li>
                </ul>

                <div class="nav-label">Hệ thống</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i> Cài đặt
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>">
                            <i class="bi bi-globe"></i> Xem website
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <div class="admin-user">
                    <div class="admin-avatar"><?= substr($_SESSION['user']['full_name'] ?? 'A', 0, 1) ?></div>
                    <div class="admin-info">
                        <span><?= $_SESSION['user']['full_name'] ?? 'Admin' ?></span>
                        <small><?= $_SESSION['user']['email'] ?? 'admin@dgentech.vn' ?></small>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ========== MAIN CONTENT ========== -->
        <div class="admin-main">
            <!-- Top Bar -->
            <header class="admin-topbar">
                <div class="topbar-left">
                    <button class="topbar-toggle" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div>
                        <h5><?= $pageTitle ?? 'Dashboard' ?></h5>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>?action=admin">Admin</a></li>
                                <li class="breadcrumb-item active"><?= $pageTitle ?? 'Dashboard' ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="topbar-right">
                    <button class="theme-toggle" aria-label="Chuyển đổi giao diện">
                        <i class="bi bi-moon-fill icon-moon"></i>
                        <i class="bi bi-sun-fill icon-sun"></i>
                    </button>
                    <a href="<?= BASE_URL ?>?action=logout" class="btn btn-sm btn-outline-danger rounded-pill">
                        <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất
                    </a>
                </div>
            </header>

            <!-- Content -->
            <div class="admin-content">
                <?php
                if (isset($view)) {
                    require_once PATH_VIEW . $view . '.php';
                }
                ?>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?= BASE_JS ?>main.js"></script>
    <script src="<?= BASE_JS ?>admin.js"></script>

</body>

</html>
