<?php

class AccountController
{
    public function index()
    {
        if (empty($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '?action=login');
            exit;
        }

        $user_id = $_SESSION['user']['user_id'];
        $userModel = new UserModel();
        $orderModel = new OrderModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = trim($_POST['fullname'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            // Simple update for demonstration
            // $userModel->updateProfile($user_id, $fullname, $phone);
            $_SESSION['user']['full_name'] = $fullname;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['success'] = "Cập nhật thông tin thành công!";
        }

        $user = $userModel->getUserById($user_id);
        $orders = $orderModel->getOrdersByUserId($user_id);

        $title = 'Tài khoản - DGENTECH';
        $view = 'client/account';
        require_once PATH_VIEW_MAIN;
    }
}
