<!DOCTYPE html>
<html lang="vi" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="DGENTECH - Cửa hàng đồ điện tử chính hãng. Laptop, điện thoại, tablet, phụ kiện công nghệ giá tốt nhất.">

    <title><?= $title ?? 'DGENTECH - Cửa hàng điện tử' ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= BASE_CSS ?>style.css?v=<?= time() ?>" rel="stylesheet">
</head>

<body>


    <!-- ========== MAIN NAVBAR ========== -->
    <nav class="main-navbar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-3">
                <!-- Brand -->
                <a href="<?= BASE_URL ?>" class="navbar-brand-custom d-flex align-items-center">
                    <img src="<?= BASE_URL ?>assets/uploads/logo.jpg" alt="DGENTECH Logo" style="height: 55px; object-fit: contain; transform: scale(1.2); transform-origin: left center;">
                </a>

                <!-- Search Box -->
                <div class="search-box" id="searchBoxContainer">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." id="mainSearchInput">
                </div>

                <!-- Actions -->
                <div class="navbar-actions d-flex align-items-center gap-2">
                    <!-- Mobile Search Toggle -->
                    <button class="btn-icon d-md-none" id="searchToggle" aria-label="Tìm kiếm">
                        <i class="bi bi-search"></i>
                    </button>

                    <!-- Theme Toggle -->
                    <button class="theme-toggle" aria-label="Chuyển đổi giao diện" id="themeToggleNav">
                        <i class="bi bi-moon-fill icon-moon"></i>
                        <i class="bi bi-sun-fill icon-sun"></i>
                    </button>

                    <!-- Cart -->
                    <a href="<?= BASE_URL ?>?action=cart" class="btn-icon" aria-label="Giỏ hàng">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge" style="display:none;">0</span>
                    </a>

                    <!-- User -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="dropdown">
                            <a href="#" class="btn-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
                                style="text-decoration: none;">
                                <i class="bi bi-person-check-fill text-accent"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php if ($_SESSION['user']['role'] == 1): ?>
                                    <li><a class="dropdown-item" href="<?= BASE_URL ?>?action=admin">Quản trị Admin</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?= BASE_URL ?>?action=account">Tài khoản của tôi</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>?action=logout">Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>?action=login" class="btn-icon" aria-label="Tài khoản">
                            <i class="bi bi-person"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- ========== CATEGORY NAV ========== -->
    <nav class="category-nav d-none d-lg-block">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($action ?? '/') === '/' ? 'active' : '' ?>" href="<?= BASE_URL ?>">
                        <i class="bi bi-house-door me-1"></i> Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?action=products&category=laptop">
                        <i class="bi bi-laptop me-1"></i> Laptop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?action=products&category=phone">
                        <i class="bi bi-phone me-1"></i> Điện thoại
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?action=products&category=tablet">
                        <i class="bi bi-tablet me-1"></i> Tablet
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?action=products&category=accessories">
                        <i class="bi bi-headphones me-1"></i> Phụ kiện
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>?action=products&category=smartwatch">
                        <i class="bi bi-smartwatch me-1"></i> Smartwatch
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="<?= BASE_URL ?>?action=products&sale=1">
                        <i class="bi bi-fire me-1"></i> Khuyến mãi
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ========== MAIN CONTENT ========== -->
    <main>
        <?php
        if (isset($view)) {
            require_once PATH_VIEW . $view . '.php';
        }
        ?>
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                <!-- Brand & About -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-3"><i class="bi bi-cpu"></i> DGENTECH</div>
                    <p class="mb-3" style="font-size:0.9rem;">
                        Cửa hàng công nghệ uy tín hàng đầu Việt Nam. Chuyên cung cấp laptop, điện thoại, tablet và phụ
                        kiện chính hãng với giá tốt nhất.
                    </p>
                    <div class="footer-social d-flex gap-2">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Youtube"><i class="bi bi-youtube"></i></a>
                        <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Liên kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                        <li><a href="<?= BASE_URL ?>?action=products">Sản phẩm</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>

                <!-- Customer Support -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Hỗ trợ</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Phương thức thanh toán</a></li>
                        <li><a href="#">Giao hàng</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-4 col-md-6">
                    <h5>Đăng ký nhận tin</h5>
                    <p style="font-size:0.9rem;">Nhận thông tin khuyến mãi và sản phẩm mới nhất từ DGENTECH.</p>
                    <form class="footer-newsletter d-flex gap-2 mt-3">
                        <input type="email" class="form-control" placeholder="Email của bạn...">
                        <button type="submit" class="btn btn-accent" style="white-space:nowrap;">Đăng ký</button>
                    </form>
                    <div class="mt-3" style="font-size:0.85rem;">
                        <p class="mb-1"><i class="bi bi-geo-alt me-1"></i> 123 Nguyễn Văn Linh, Q.7, TP.HCM</p>
                        <p class="mb-1"><i class="bi bi-telephone me-1"></i> 1900 8888</p>
                        <p class="mb-0"><i class="bi bi-envelope me-1"></i> support@dgentech.vn</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container text-center">
                © <?= date('Y') ?> DGENTECH. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop" aria-label="Lên đầu trang">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
    <script src="<?= BASE_JS ?>main.js"></script>
    <script src="<?= BASE_JS ?>cart.js"></script>

    <script>
        // Auto-dismiss alerts after 2 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                });
            }, 2000);
        });
    </script>
</body>

</html>