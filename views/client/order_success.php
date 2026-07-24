<section class="py-5 text-center">
    <div class="container" style="max-width: 600px;">
        <div class="mb-4">
            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
        </div>
        <h2 class="mb-3">Đặt hàng thành công!</h2>
        <p class="text-muted mb-4">Cảm ơn bạn đã mua hàng tại DGENTECH. Mã đơn hàng của bạn là
            <strong>#<?= $order['order_id'] ?></strong></p>

        <?php if ($order['payment_method'] === 'bank'): ?>
            <div class="card shadow-sm border-0 mb-4 p-4 text-start">
                <h5 class="text-center mb-3">Hướng dẫn chuyển khoản</h5>
                <p class="text-center text-muted small">Vui lòng quét mã QR dưới đây để thanh toán. Đơn hàng sẽ được xử lý
                    sau khi nhận được thanh toán.</p>

                <div class="text-center my-4">
                    <!-- Dynamic VietQR URL using amount and order ID -->
                    <!-- Format: https://img.vietqr.io/image/<BANK_ID>-<ACCOUNT_NO>-<TEMPLATE>.png?amount=<AMOUNT>&addInfo=<DESCRIPTION>&accountName=<ACCOUNT_NAME> -->
                    <!-- We will use a demo account here (e.g. MB Bank, 0987654321, DGENTECH) -->
                    <img src="https://img.vietqr.io/image/MB-0987654321-compact2.png?amount=<?= $order['total_amount'] ?>&addInfo=Thanh toan don hang <?= $order['order_id'] ?>&accountName=DGENTECH"
                        alt="QR Thanh toán" class="img-fluid rounded border p-2" style="max-width: 300px;">
                </div>

                <div class="bg-light p-3 rounded">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">Ngân hàng: <strong>MB Bank</strong></li>
                        <li class="mb-2">Số tài khoản: <strong>0987654321</strong></li>
                        <li class="mb-2">Chủ tài khoản: <strong>DGENTECH</strong></li>
                        <li class="mb-2">Số tiền: <strong
                                class="text-accent"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</strong></li>
                        <li>Nội dung CK: <strong>Thanh toan don hang <?= $order['order_id'] ?></strong></li>
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info border-0 shadow-sm text-start">
                <i class="bi bi-info-circle me-2"></i> Bạn đã chọn phương thức <strong>Thanh toán khi nhận hàng
                    (COD)</strong>. Vui lòng chuẩn bị sẵn số tiền
                <strong><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</strong> để thanh toán cho nhân viên giao
                hàng.
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="<?= BASE_URL ?>" class="btn btn-outline-primary rounded-pill px-4">Tiếp tục mua sắm</a>
            <a href="<?= BASE_URL ?>?action=account" class="btn btn-accent rounded-pill px-4">Theo dõi đơn hàng</a>
        </div>
    </div>
</section>