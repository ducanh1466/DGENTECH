<?php

class CartController
{
    public function index()
    {
        $title = 'Giỏ hàng - DGENTECH';
        $view = 'client/cart';
        require_once PATH_VIEW_MAIN;
    }

    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = ($_POST['address'] ?? '') . ', ' . ($_POST['ward'] ?? '') . ', ' . ($_POST['district'] ?? '') . ', ' . ($_POST['city'] ?? '');
            $note = $_POST['note'] ?? '';
            $payment_method = $_POST['payment'] ?? 'cod';

            if ($payment_method === 'bank') {
                $customer_bank = $_POST['customer_bank'] ?? '';
                $customer_account = $_POST['customer_account'] ?? '';
                if (!empty($customer_bank) && !empty($customer_account)) {
                    $note .= "\n[TT chuyển khoản từ KH: Ngân hàng: $customer_bank - STK: $customer_account]";
                }
            }

            $cartData = $_POST['cart_data'] ?? '[]';

            $cartItems = json_decode($cartData, true);

            if (!empty($cartItems)) {
                $total_amount = 0;
                foreach ($cartItems as $item) {
                    $total_amount += ($item['price'] * $item['quantity']);
                }

                // Add shipping
                $shipping = $total_amount >= 2000000 ? 0 : 30000;
                $total_amount += $shipping;

                // Discount
                $discount_id = null;
                $discount_code = $_POST['discount_code'] ?? '';
                if (!empty($discount_code)) {
                    require_once PATH_MODEL . 'DiscountModel.php';
                    $discountModel = new DiscountModel();
                    $discount = $discountModel->getDiscountByCode($discount_code);
                    if ($discount) {
                        $discount_id = $discount['discount_id'];
                        $discountModel->increaseUsage($discount_id);
                        if ($discount['discount_type'] === 'percentage') {
                            $discountAmount = $total_amount * ($discount['discount_value'] / 100);
                            $total_amount -= $discountAmount;
                        } else {
                            $total_amount -= $discount['discount_value'];
                        }
                    }
                }

                $user_id = $_SESSION['user']['user_id'] ?? null; // Allow guest checkout (user_id = null)

                $orderModel = new OrderModel();
                $order_id = $orderModel->insertOrder($user_id, $discount_id, $total_amount, 'pending', $fullname, $phone, $address, $note, $payment_method);

                if ($order_id) {
                    $orderDetailModel = new OrderDetailModel();
                    foreach ($cartItems as $item) {
                        $orderDetailModel->insertOrderDetail($order_id, $item['id'], null, $item['quantity'], $item['price']);
                    }

                    // Update user profile with this new address
                    if ($user_id) {
                        $userModel = new UserModel();
                        $user = $userModel->getUserById($user_id);
                        if ($user) {
                            $userModel->updateUser($user_id, $fullname, $phone, $address, $user['status'], $user['role']);
                            $_SESSION['user']['full_name'] = $fullname;
                            $_SESSION['user']['phone'] = $phone;
                            $_SESSION['user']['address'] = $address;
                        }
                    }

                    // Clear cart in frontend using session to signal JS
                    $_SESSION['clear_cart'] = true;
                    $_SESSION['success'] = "Đặt hàng thành công! Mã đơn hàng của bạn là #$order_id";
                    header('Location: ' . BASE_URL . '?action=order-success&id=' . $order_id);
                    exit;
                }
            }
        }

        $title = 'Thanh toán - DGENTECH';
        $view = 'client/checkout';
        require_once PATH_VIEW_MAIN;
    }

    public function checkDiscount()
    {
        header('Content-Type: application/json');
        $code = $_POST['code'] ?? '';

        if (empty($code)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập mã giảm giá']);
            exit;
        }

        require_once PATH_MODEL . 'DiscountModel.php';
        $discountModel = new DiscountModel();
        $discount = $discountModel->getDiscountByCode($code);

        if ($discount) {
            echo json_encode([
                'success' => true,
                'discount' => [
                    'type' => $discount['discount_type'],
                    'value' => (float) $discount['discount_value'],
                    'max_discount_amount' => $discount['max_discount_amount']
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Mã giảm giá không hợp lệ, đã hết hạn hoặc hết lượt sử dụng.']);
        }
        exit;
    }

    public function orderSuccess()
    {
        $id = $_GET['id'] ?? 0;
        $orderModel = new OrderModel();
        $order = $orderModel->getOrderById($id);

        if (!$order) {
            header('Location: ' . BASE_URL);
            exit;
        }

        $title = 'Đặt hàng thành công - DGENTECH';
        $view = 'client/order_success';
        require_once PATH_VIEW_MAIN;
    }
}
