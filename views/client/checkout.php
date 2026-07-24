<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="bi bi-house"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>?action=cart">Giỏ hàng</a></li>
                <li class="breadcrumb-item active">Thanh toán</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <h2 class="section-title mb-4"><i class="bi bi-credit-card me-2"></i>Thanh toán</h2>

        <form method="POST" action="">
            <div class="row g-4">
                <!-- Shipping Info -->
                <div class="col-lg-7">
                    <div class="checkout-form-section">
                        <h5><i class="bi bi-person-lines-fill me-2"></i>Thông tin giao hàng</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="fullname" placeholder="Nguyễn Văn A" value="<?= htmlspecialchars($_SESSION['user']['full_name'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="0912 345 678" value="<?= htmlspecialchars($_SESSION['user']['phone'] ?? '') ?>" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com" value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tỉnh / Thành phố <span class="text-danger">*</span></label>
                                <select class="form-control" name="city" id="citySelect" required>
                                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Quận / Huyện <span class="text-danger">*</span></label>
                                <select class="form-control" name="district" id="districtSelect" required>
                                    <option value="">-- Chọn Quận/Huyện --</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Phường / Xã <span class="text-danger">*</span></label>
                                <select class="form-control" name="ward" id="wardSelect" required>
                                    <option value="">-- Chọn Phường/Xã --</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Địa chỉ cụ thể <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" placeholder="Số nhà, tên đường..." required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" name="note" rows="3" placeholder="Ghi chú cho đơn hàng (thời gian giao, yêu cầu đặc biệt...)"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="checkout-form-section mt-4">
                        <h5><i class="bi bi-wallet2 me-2"></i>Phương thức thanh toán</h5>
                        <div class="d-flex flex-column gap-3">
                            <label class="payment-method active">
                                <input type="radio" name="payment" value="cod" checked class="form-check-input" onchange="toggleBankInfo()">
                                <i class="bi bi-cash-coin"></i>
                                <div>
                                    <strong>Thanh toán khi nhận hàng (COD)</strong>
                                    <small class="d-block text-muted">Thanh toán bằng tiền mặt khi nhận được hàng</small>
                                </div>
                            </label>
                            <label class="payment-method">
                                <input type="radio" name="payment" value="bank" class="form-check-input" onchange="toggleBankInfo()">
                                <i class="bi bi-bank"></i>
                                <div>
                                    <strong>Chuyển khoản ngân hàng</strong>
                                    <small class="d-block text-muted">Chuyển khoản qua tài khoản ngân hàng</small>
                                </div>
                            </label>

                            <!-- Extra fields for Bank Transfer -->
                            <div id="bankInfoFields" style="display: none; background: #f8f9fa; padding: 15px; border-radius: 8px; margin-top: 10px; border: 1px dashed #ccc;">
                                <p class="text-muted small mb-3">Vui lòng cung cấp thông tin tài khoản ngân hàng của bạn để chúng tôi dễ dàng đối soát giao dịch.</p>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Ngân hàng của bạn</label>
                                        <input type="text" class="form-control" name="customer_bank" id="customer_bank" placeholder="VD: Vietcombank, MB Bank...">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Số tài khoản</label>
                                        <input type="text" class="form-control" name="customer_account" id="customer_account" placeholder="Nhập số tài khoản của bạn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-5">
                    <div class="cart-summary">
                        <h5><i class="bi bi-bag-check me-2"></i>Đơn hàng của bạn</h5>

                        <div id="checkoutItems">
                            <!-- Rendered by JS -->
                        </div>

                        <hr>
                        <!-- Discount -->
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="font-size:0.9rem;">Mã giảm giá</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="discountInput" placeholder="Nhập mã...">
                                <button class="btn btn-outline-accent" type="button" id="btnApplyDiscount">Áp dụng</button>
                            </div>
                            <small id="discountMessage" class="d-block mt-1"></small>
                            <input type="hidden" name="discount_code" id="discountCodeHidden">
                        </div>

                        <hr>
                        <div class="summary-row">
                            <span>Tạm tính</span>
                            <span id="checkoutSubtotal">0₫</span>
                        </div>
                        <div class="summary-row text-success d-none" id="discountRow">
                            <span>Giảm giá</span>
                            <span id="checkoutDiscount">-0₫</span>
                        </div>
                        <div class="summary-row">
                            <span>Phí vận chuyển</span>
                            <span id="checkoutShipping">30.000₫</span>
                        </div>
                        <div class="summary-total">
                            <span>Tổng thanh toán</span>
                            <span class="text-gradient" style="font-size:1.3rem;" id="checkoutTotal">0₫</span>
                        </div>

                        <!-- Hidden input to pass cart data to server -->
                        <input type="hidden" name="cart_data" id="cartDataInput">

                        <button type="submit" class="btn btn-accent w-100 mt-3 py-3" style="font-size:1.05rem;" onclick="document.getElementById('cartDataInput').value = localStorage.getItem('dgentech-cart') || '[]'">
                            <i class="bi bi-check-circle me-1"></i> Đặt hàng
                        </button>

                        <p class="text-center text-muted mt-2" style="font-size:0.8rem;">
                            <i class="bi bi-shield-lock"></i> Thông tin của bạn được bảo mật tuyệt đối
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cart = DGENCart.getCart();
    const itemsContainer = document.getElementById('checkoutItems');
    const subtotalEl = document.getElementById('checkoutSubtotal');
    const shippingEl = document.getElementById('checkoutShipping');
    const totalEl = document.getElementById('checkoutTotal');

    if (cart.length === 0) {
        itemsContainer.innerHTML = '<p class="text-muted text-center py-3">Chưa có sản phẩm nào</p>';
        return;
    }

    let html = '';
    cart.forEach(function(item) {
        html += '<div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color:var(--border-light)!important">';
        html += '<div class="d-flex align-items-center gap-2">';
        html += '<img src="' + item.image + '" style="width:50px;height:50px;border-radius:var(--radius-sm);object-fit:cover;" alt="">';
        html += '<div><div class="fw-semibold" style="font-size:0.88rem;">' + item.name + '</div>';
        html += '<small class="text-muted">x' + item.quantity + '</small></div></div>';
        html += '<span class="fw-bold" style="font-size:0.9rem;">' + DGENCart.formatPrice(item.price * item.quantity) + '</span>';
        html += '</div>';
    });
    itemsContainer.innerHTML = html;

    const totalPrice = DGENCart.getTotalPrice();
    const shipping = totalPrice >= 2000000 ? 0 : 30000;
    subtotalEl.textContent = DGENCart.formatPrice(totalPrice);
    shippingEl.textContent = shipping === 0 ? 'Miễn phí' : DGENCart.formatPrice(shipping);
    
    let currentTotal = totalPrice + shipping;
    let discountAmount = 0;
    
    totalEl.textContent = DGENCart.formatPrice(currentTotal);

    // Apply Discount
    const btnApplyDiscount = document.getElementById('btnApplyDiscount');
    const discountInput = document.getElementById('discountInput');
    const discountMessage = document.getElementById('discountMessage');
    const discountCodeHidden = document.getElementById('discountCodeHidden');
    const discountRow = document.getElementById('discountRow');
    const checkoutDiscount = document.getElementById('checkoutDiscount');

    btnApplyDiscount.addEventListener('click', function() {
        const code = discountInput.value.trim();
        if (!code) {
            discountMessage.textContent = 'Vui lòng nhập mã';
            discountMessage.className = 'd-block mt-1 text-danger';
            return;
        }

        const formData = new FormData();
        formData.append('code', code);

        fetch('<?= BASE_URL ?>?action=check-discount', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                discountMessage.textContent = 'Áp dụng mã thành công!';
                discountMessage.className = 'd-block mt-1 text-success';
                discountCodeHidden.value = code;

                const discount = res.discount;
                if (discount.type === 'percentage') {
                    discountAmount = (totalPrice + shipping) * (discount.value / 100);
                    if (discount.max_discount_amount && discountAmount > discount.max_discount_amount) {
                        discountAmount = discount.max_discount_amount;
                    }
                } else {
                    discountAmount = discount.value;
                }

                discountRow.classList.remove('d-none');
                checkoutDiscount.textContent = '-' + DGENCart.formatPrice(discountAmount);
                
                currentTotal = (totalPrice + shipping) - discountAmount;
                if(currentTotal < 0) currentTotal = 0;
                totalEl.textContent = DGENCart.formatPrice(currentTotal);
                
                // Disable input after success
                discountInput.disabled = true;
                btnApplyDiscount.disabled = true;
            } else {
                discountMessage.textContent = res.message;
                discountMessage.className = 'd-block mt-1 text-danger';
                discountCodeHidden.value = '';
                discountRow.classList.add('d-none');
                
                currentTotal = totalPrice + shipping;
                totalEl.textContent = DGENCart.formatPrice(currentTotal);
            }
        })
        .catch(err => {
            console.error(err);
            discountMessage.textContent = 'Có lỗi xảy ra, vui lòng thử lại';
            discountMessage.className = 'd-block mt-1 text-danger';
        });
    });

    // Payment method selection
    document.querySelectorAll('.payment-method').forEach(function(method) {
        method.addEventListener('click', function() {
            document.querySelectorAll('.payment-method').forEach(function(m) { m.classList.remove('active'); });
            method.classList.add('active');
        });
    });

    // Dynamic Address Fetching
    const citySelect = document.getElementById('citySelect');
    const districtSelect = document.getElementById('districtSelect');
    const wardSelect = document.getElementById('wardSelect');

    fetch('https://provinces.open-api.vn/api/p/')
        .then(response => response.json())
        .then(data => {
            let html = '<option value="">-- Chọn Tỉnh/Thành phố --</option>';
            data.forEach(item => {
                html += `<option value="${item.name}" data-code="${item.code}">${item.name}</option>`;
            });
            citySelect.innerHTML = html;
        })
        .catch(error => console.error('Error fetching provinces:', error));

    citySelect.addEventListener('change', function() {
        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
        wardSelect.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
        const selectedOption = this.options[this.selectedIndex];
        const code = selectedOption ? selectedOption.getAttribute('data-code') : null;
        
        if (code) {
            fetch(`https://provinces.open-api.vn/api/p/${code}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    let html = '<option value="">-- Chọn Quận/Huyện --</option>';
                    if (data.districts) {
                        data.districts.forEach(item => {
                            html += `<option value="${item.name}" data-code="${item.code}">${item.name}</option>`;
                        });
                    }
                    districtSelect.innerHTML = html;
                })
                .catch(error => console.error('Error fetching districts:', error));
        }
    });

    districtSelect.addEventListener('change', function() {
        wardSelect.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
        const selectedOption = this.options[this.selectedIndex];
        const code = selectedOption ? selectedOption.getAttribute('data-code') : null;
        
        if (code) {
            fetch(`https://provinces.open-api.vn/api/d/${code}?depth=2`)
                .then(response => response.json())
                .then(data => {
                    let html = '<option value="">-- Chọn Phường/Xã --</option>';
                    if (data.wards) {
                        data.wards.forEach(item => {
                            html += `<option value="${item.name}">${item.name}</option>`;
                        });
                    }
                    wardSelect.innerHTML = html;
                })
                .catch(error => console.error('Error fetching wards:', error));
        }
    });
});
</script>
