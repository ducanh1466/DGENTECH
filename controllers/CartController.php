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

                $user_id = $_SESSION['user']['user_id'] ?? null; // Allow guest checkout (user_id = null)
                
                $orderModel = new OrderModel();
                $order_id = $orderModel->insertOrder($user_id, null, $total_amount, 'pending', $fullname, $phone, $address, $note);
                
                if ($order_id) {
                    $orderDetailModel = new OrderDetailModel();
                    foreach ($cartItems as $item) {
                        $orderDetailModel->insertOrderDetail($order_id, $item['id'], null, $item['quantity'], $item['price']);
                    }
                    
                    // Clear cart in frontend using session to signal JS
                    $_SESSION['clear_cart'] = true;
                    $_SESSION['success'] = "Đặt hàng thành công! Mã đơn hàng của bạn là #$order_id";
                    header('Location: ' . BASE_URL . '?action=account');
                    exit;
                }
            }
        }

        $title = 'Thanh toán - DGENTECH';
        $view = 'client/checkout';
        require_once PATH_VIEW_MAIN;
    }
}
