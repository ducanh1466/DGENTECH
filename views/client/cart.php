<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <h2 class="section-title mb-4"><i class="bi bi-cart3 me-2"></i>Giỏ hàng của bạn</h2>

        <div class="row g-4">
            <!-- Cart Table -->
            <div class="col-lg-8">
                <div class="cart-section">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            <!-- Cart items will be rendered by cart.js -->
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div>
                                        <i class="bi bi-cart-x" style="font-size:3rem;color:var(--text-muted)"></i>
                                        <p class="mt-2 text-muted">Giỏ hàng trống</p>
                                        <a href="<?= BASE_URL ?>?action=products" class="btn btn-accent mt-2">Tiếp tục mua sắm</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="<?= BASE_URL ?>?action=products" class="btn btn-outline-accent">
                        <i class="bi bi-arrow-left me-1"></i> Tiếp tục mua sắm
                    </a>
                    <button class="btn btn-outline-danger rounded-pill" onclick="if(confirm('Xóa tất cả sản phẩm?')) DGENCart.clearCart();">
                        <i class="bi bi-trash3 me-1"></i> Xóa tất cả
                    </button>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h5><i class="bi bi-receipt me-2"></i>Tóm tắt đơn hàng</h5>
                    <div class="summary-row">
                        <span>Tạm tính</span>
                        <span id="cartSubtotal">0₫</span>
                    </div>
                    <div class="summary-row">
                        <span>Phí vận chuyển</span>
                        <span id="cartShipping">0₫</span>
                    </div>
                    <div class="summary-row" style="font-size:0.8rem;color:var(--success);">
                        <span><i class="bi bi-info-circle"></i> Miễn phí ship đơn từ 2 triệu</span>
                    </div>
                    <div class="summary-total">
                        <span>Tổng cộng</span>
                        <span class="text-gradient" id="cartTotal">0₫</span>
                    </div>
                    <a href="<?= BASE_URL ?>?action=checkout" class="btn btn-accent w-100 mt-3">
                        <i class="bi bi-lock me-1"></i> Tiến hành thanh toán
                    </a>
                </div>

                <!-- Coupon -->
                <div class="cart-summary mt-3">
                    <h6 class="fw-bold mb-3"><i class="bi bi-ticket-perforated me-1"></i> Mã giảm giá</h6>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập mã giảm giá..." style="border:2px solid var(--border-color);border-radius:var(--radius-md) 0 0 var(--radius-md);background:var(--bg-primary);color:var(--text-primary);">
                        <button class="btn btn-accent" style="border-radius:0 var(--radius-md) var(--radius-md) 0;">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
