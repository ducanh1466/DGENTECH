<?php

class AdminController
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    public function dashboard()
    {
        $title = 'Dashboard - DGENTECH Admin';
        $pageTitle = 'Dashboard';
        $action = 'admin';
        $view = 'admin/dashboard';
        require_once PATH_VIEW_ADMIN;
    }

    public function products()
    {
        $productModel = new ProductModel();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_type = $_POST['action_type'] ?? '';
            if ($action_type === 'delete') {
                $id = $_POST['product_id'] ?? 0;
                $productModel->deleteProduct($id);
                $_SESSION['success'] = 'Xóa sản phẩm thành công!';
            }
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }

        $products = $productModel->getAllProducts();

        $title = 'Quản lý sản phẩm - DGENTECH Admin';
        $pageTitle = 'Sản phẩm';
        $action = 'admin-products';
        $view = 'admin/products';
        require_once PATH_VIEW_ADMIN;
    }

    public function productForm()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $brandModel = new BrandModel();

        $id = $_GET['id'] ?? 0;
        $product = null;

        if ($id) {
            $product = $productModel->getProductById($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_id = $_POST['category_id'] ?? null;
            $product_name = $_POST['product_name'] ?? '';
            $brand_id = $_POST['brand_id'] ?? null;
            $warranty_period = $_POST['warranty_period'] ?? null;
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'active';

            if ($id) {
                // Update
                $productModel->updateProduct($id, $category_id, $product_name, $brand_id, $warranty_period, $description, $status);
                $_SESSION['success'] = 'Cập nhật sản phẩm thành công!';
            } else {
                // Create
                $productModel->insertProduct($category_id, $product_name, $brand_id, $warranty_period, $description, $status);
                $_SESSION['success'] = 'Thêm sản phẩm thành công!';
            }
            
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }

        $categories = $categoryModel->getAllCategories();
        $brands = $brandModel->getAllBrands();

        $title = ($id ? 'Sửa' : 'Thêm') . ' sản phẩm - DGENTECH Admin';
        $pageTitle = ($id ? 'Sửa' : 'Thêm') . ' sản phẩm';
        $action = $id ? 'admin-product-edit' : 'admin-product-create';
        $view = 'admin/product_form';
        require_once PATH_VIEW_ADMIN;
    }

    public function categories()
    {
        $categoryModel = new CategoryModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_type = $_POST['action_type'] ?? 'create';
            
            if ($action_type === 'create') {
                $name = $_POST['name'] ?? '';
                $description = $_POST['description'] ?? '';
                $categoryModel->insertCategory($name, $description);
                $_SESSION['success'] = 'Thêm danh mục thành công!';
            } elseif ($action_type === 'update') {
                $id = $_POST['category_id'] ?? 0;
                $name = $_POST['name'] ?? '';
                $description = $_POST['description'] ?? '';
                $categoryModel->updateCategory($id, $name, $description);
                $_SESSION['success'] = 'Cập nhật danh mục thành công!';
            } elseif ($action_type === 'delete') {
                $id = $_POST['category_id'] ?? 0;
                $categoryModel->deleteCategory($id);
                $_SESSION['success'] = 'Xóa danh mục thành công!';
            }
            
            header('Location: ' . BASE_URL . '?action=admin-categories');
            exit;
        }

        $categories = $categoryModel->getAllCategories();

        $title = 'Quản lý danh mục - DGENTECH Admin';
        $pageTitle = 'Danh mục';
        $action = 'admin-categories';
        $view = 'admin/categories';
        require_once PATH_VIEW_ADMIN;
    }

    public function brands()
    {
        $brandModel = new BrandModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_type = $_POST['action_type'] ?? 'create';
            
            if ($action_type === 'create') {
                $name = $_POST['name'] ?? '';
                $description = $_POST['description'] ?? '';
                $status = $_POST['status'] ?? 1;
                $brandModel->insertBrand($name, $description, $status);
                $_SESSION['success'] = 'Thêm thương hiệu thành công!';
            } elseif ($action_type === 'update') {
                $id = $_POST['brand_id'] ?? 0;
                $name = $_POST['name'] ?? '';
                $description = $_POST['description'] ?? '';
                $status = $_POST['status'] ?? 1;
                $brandModel->updateBrand($id, $name, $description, $status);
                $_SESSION['success'] = 'Cập nhật thương hiệu thành công!';
            } elseif ($action_type === 'delete') {
                $id = $_POST['brand_id'] ?? 0;
                $brandModel->deleteBrand($id);
                $_SESSION['success'] = 'Xóa thương hiệu thành công!';
            }
            
            header('Location: ' . BASE_URL . '?action=admin-brands');
            exit;
        }

        $brands = $brandModel->getAllBrands();

        $title = 'Quản lý thương hiệu - DGENTECH Admin';
        $pageTitle = 'Thương hiệu';
        $action = 'admin-brands';
        $view = 'admin/brands';
        require_once PATH_VIEW_ADMIN;
    }

    public function orders()
    {
        $orderModel = new OrderModel();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order_id = $_POST['order_id'] ?? 0;
            $status = $_POST['status'] ?? 'pending';
            
            $orderModel->updateOrderStatus($order_id, $status);
            $_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công!';
            header('Location: ' . BASE_URL . '?action=admin-orders');
            exit;
        }

        $orders = $orderModel->getAllOrders();

        $title = 'Quản lý đơn hàng - DGENTECH Admin';
        $pageTitle = 'Đơn hàng';
        $action = 'admin-orders';
        $view = 'admin/orders';
        require_once PATH_VIEW_ADMIN;
    }

    public function orderDetail()
    {
        $orderModel = new OrderModel();
        $id = $_GET['id'] ?? 0;
        
        $order = $orderModel->getOrderById($id);
        if (!$order) {
            header('Location: ' . BASE_URL . '?action=admin-orders');
            exit;
        }

        // We would also fetch order details here once OrderModel supports it.
        $orderDetails = []; // Placeholder

        $title = 'Chi tiết đơn hàng - DGENTECH Admin';
        $pageTitle = 'Chi tiết đơn hàng';
        $action = 'admin-order-detail';
        $view = 'admin/order_detail';
        require_once PATH_VIEW_ADMIN;
    }

    public function users()
    {
        $userModel = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_type = $_POST['action_type'] ?? '';
            $user_id = $_POST['user_id'] ?? 0;
            
            if ($action_type === 'update_status') {
                $status = $_POST['status'] ?? 0;
                $user = $userModel->getUserById($user_id);
                if ($user) {
                    $userModel->updateUser($user_id, $user['full_name'], $user['phone'], $user['address'], $status, $user['role']);
                    $_SESSION['success'] = 'Cập nhật trạng thái thành công!';
                }
            } elseif ($action_type === 'update_role') {
                $role = $_POST['role'] ?? 0;
                $user = $userModel->getUserById($user_id);
                if ($user) {
                    $userModel->updateUser($user_id, $user['full_name'], $user['phone'], $user['address'], $user['status'], $role);
                    $_SESSION['success'] = 'Cập nhật phân quyền thành công!';
                }
            }
            
            header('Location: ' . BASE_URL . '?action=admin-users');
            exit;
        }

        $users = $userModel->getAllUsers();

        $title = 'Quản lý người dùng - DGENTECH Admin';
        $pageTitle = 'Người dùng';
        $action = 'admin-users';
        $view = 'admin/users';
        require_once PATH_VIEW_ADMIN;
    }
}
