<?php

class AdminController
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], [1, 2])) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    public function dashboard()
    {
        if ($_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }
        
        $orderModel = new OrderModel();
        $productModel = new ProductModel();
        $userModel = new UserModel();

        // 1. Get total orders
        $totalOrders = $orderModel->countTotalOrders();

        // 2. Get total revenue (only completed orders)
        $revenue = $orderModel->getTotalRevenue();

        // 3. Get total products
        $totalProducts = $productModel->countProductsFiltered('', [], [], [], 0, 0);

        // 4. Get total users
        $totalUsers = $userModel->countTotalUsers();

        // 5. Get recent orders
        $recentOrders = $orderModel->getRecentOrders(5);

        // 6. Get chart data (revenue and orders per month for selected year)
        $selectedYear = $_GET['year'] ?? date('Y');
        $availableYears = $orderModel->getAvailableYears();
        $monthlyStats = $orderModel->getMonthlyRevenue($selectedYear);
        
        $revenueData = array_fill(0, 12, 0);
        $orderData = array_fill(0, 12, 0);
        
        foreach ($monthlyStats as $stat) {
            $monthIndex = $stat['month'] - 1;
            $revenueData[$monthIndex] = (float)$stat['revenue'];
            $orderData[$monthIndex] = (int)$stat['orders'];
        }
        
        $chartData = json_encode([
            'revenue' => $revenueData,
            'orders' => $orderData
        ]);

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
            $variants = $productModel->getVariantsByProductId($id);
        } else {
            $variants = [];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : null;
            $product_name = trim($_POST['product_name'] ?? '');
            $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;
            $warranty_period = !empty($_POST['warranty_period']) ? $_POST['warranty_period'] : null;
            $description = trim($_POST['description'] ?? '');
            $status = $_POST['status'] ?? 'active';
            $price_raw = $_POST['price'] ?? '0';
            $price = (int) str_replace(['.', ','], '', $price_raw);
            $stock = (int) ($_POST['stock'] ?? 0);

            // Validations
            if (empty($product_name)) {
                $_SESSION['error'] = 'Tên sản phẩm không được để trống!';
                header('Location: ' . BASE_URL . '?action=' . ($id ? 'admin-product-edit&id=' . $id : 'admin-product-create'));
                exit;
            }
            if (mb_strlen($product_name) > 255) {
                $_SESSION['error'] = 'Tên sản phẩm không vượt quá 255 ký tự!';
                header('Location: ' . BASE_URL . '?action=' . ($id ? 'admin-product-edit&id=' . $id : 'admin-product-create'));
                exit;
            }
            if ($price < 0) {
                $_SESSION['error'] = 'Giá sản phẩm phải là số dương!';
                header('Location: ' . BASE_URL . '?action=' . ($id ? 'admin-product-edit&id=' . $id : 'admin-product-create'));
                exit;
            }
            if ($stock < 0) {
                $_SESSION['error'] = 'Số lượng tồn kho không được là số âm!';
                header('Location: ' . BASE_URL . '?action=' . ($id ? 'admin-product-edit&id=' . $id : 'admin-product-create'));
                exit;
            }

            // Handle file upload
            $image_path = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
                $file_info = pathinfo($_FILES['image']['name']);
                $extension = strtolower($file_info['extension'] ?? '');
                
                if (!in_array($extension, $allowed_extensions)) {
                    $_SESSION['error'] = 'Định dạng ảnh không hợp lệ (chỉ hỗ trợ JPG, PNG, WEBP, GIF)!';
                    header('Location: ' . BASE_URL . '?action=' . ($id ? 'admin-product-edit&id=' . $id : 'admin-product-create'));
                    exit;
                }

                $upload_dir = 'uploads/products/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                $file_name = time() . '_' . basename($_FILES['image']['name']);
                $target_file = $upload_dir . $file_name;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image_path = BASE_URL . $target_file;
                }
            }

            if ($id) {
                // Update
                $productModel->updateProduct($id, $category_id, $product_name, $brand_id, $warranty_period, $description, $status);
                // Also update primary image if uploaded
                if ($image_path) {
                    $productModel->deleteProductImages($id);
                    $productModel->insertProductImage($id, $image_path, 1, 1);
                }
                $_SESSION['success'] = 'Cập nhật sản phẩm thành công!';
            } else {
                // Create
                $id = $productModel->insertProduct($category_id, $product_name, $brand_id, $warranty_period, $description, $status);
                if ($image_path) {
                    $productModel->insertProductImage($id, $image_path, 1, 1);
                }
                $_SESSION['success'] = 'Thêm sản phẩm thành công!';
            }

            // Process variants
            $variant_names = $_POST['variant_name'] ?? [];
            $variant_ids = $_POST['variant_id'] ?? [];
            $variant_prices = $_POST['variant_price'] ?? [];
            $variant_stocks = $_POST['variant_stock'] ?? [];

            if ($id) {
                // Update mode
                $submitted_ids = [];
                if (!empty($variant_names) && is_array($variant_names)) {
                    for ($i = 0; $i < count($variant_names); $i++) {
                        $v_name = trim($variant_names[$i]);
                        $v_id = $variant_ids[$i] ?? '';
                        $v_price = (isset($variant_prices[$i]) && $variant_prices[$i] !== '') ? (int)$variant_prices[$i] : $price;
                        $v_stock = (isset($variant_stocks[$i]) && $variant_stocks[$i] !== '') ? (int)$variant_stocks[$i] : $stock;

                        if ($v_name !== '') {
                            if (!empty($v_id)) {
                                $productModel->updateVariant($v_id, $v_name, $v_price, $v_stock);
                                $submitted_ids[] = $v_id;
                            } else {
                                $new_id = $productModel->insertVariant($id, $v_name, $v_price, $v_stock);
                                $submitted_ids[] = $new_id;
                            }
                        }
                    }
                }
                $productModel->deleteUnusedVariants($id, $submitted_ids);
            } else {
                // Create mode
                if (!empty($variant_names) && is_array($variant_names)) {
                    for ($i = 0; $i < count($variant_names); $i++) {
                        $v_name = trim($variant_names[$i]);
                        $v_price = (isset($variant_prices[$i]) && $variant_prices[$i] !== '') ? (int)$variant_prices[$i] : $price;
                        $v_stock = (isset($variant_stocks[$i]) && $variant_stocks[$i] !== '') ? (int)$variant_stocks[$i] : $stock;
                        if ($v_name !== '') {
                            $productModel->insertVariant($id, $v_name, $v_price, $v_stock);
                        }
                    }
                }
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
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');

                if (empty($name)) {
                    $_SESSION['error'] = 'Tên danh mục không được để trống!';
                } elseif (mb_strlen($name) > 255) {
                    $_SESSION['error'] = 'Tên danh mục không được vượt quá 255 ký tự!';
                } else {
                    $categoryModel->insertCategory($name, $description);
                    $_SESSION['success'] = 'Thêm danh mục thành công!';
                }
            } elseif ($action_type === 'update') {
                $id = $_POST['category_id'] ?? 0;
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');

                if (empty($name)) {
                    $_SESSION['error'] = 'Tên danh mục không được để trống!';
                } elseif (mb_strlen($name) > 255) {
                    $_SESSION['error'] = 'Tên danh mục không được vượt quá 255 ký tự!';
                } else {
                    $categoryModel->updateCategory($id, $name, $description);
                    $_SESSION['success'] = 'Cập nhật danh mục thành công!';
                }
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
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');
                $status = $_POST['status'] ?? 1;

                if (empty($name)) {
                    $_SESSION['error'] = 'Tên thương hiệu không được để trống!';
                } elseif (mb_strlen($name) > 255) {
                    $_SESSION['error'] = 'Tên thương hiệu không được vượt quá 255 ký tự!';
                } else {
                    $brandModel->insertBrand($name, $description, $status);
                    $_SESSION['success'] = 'Thêm thương hiệu thành công!';
                }
            } elseif ($action_type === 'update') {
                $id = $_POST['brand_id'] ?? 0;
                $name = trim($_POST['name'] ?? '');
                $description = trim($_POST['description'] ?? '');
                $status = $_POST['status'] ?? 1;

                if (empty($name)) {
                    $_SESSION['error'] = 'Tên thương hiệu không được để trống!';
                } elseif (mb_strlen($name) > 255) {
                    $_SESSION['error'] = 'Tên thương hiệu không được vượt quá 255 ký tự!';
                } else {
                    $brandModel->updateBrand($id, $name, $description, $status);
                    $_SESSION['success'] = 'Cập nhật thương hiệu thành công!';
                }
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
        if ($_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }
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
        if ($_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }
        $orderModel = new OrderModel();
        $id = $_GET['id'] ?? 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'] ?? 'pending';
            $orderModel->updateOrderStatus($id, $status);
            header("Location: " . BASE_URL . "?action=admin-order-detail&id=" . $id);
            exit;
        }

        $order = $orderModel->getOrderById($id);
        if (!$order) {
            header('Location: ' . BASE_URL . '?action=admin-orders');
            exit;
        }

        require_once PATH_ROOT . 'models/OrderDetailModel.php';
        $orderDetailModel = new OrderDetailModel();
        $orderDetails = $orderDetailModel->getDetailsByOrderId($id);

        $title = 'Chi tiết đơn hàng - DGENTECH Admin';
        $pageTitle = 'Chi tiết đơn hàng';
        $action = 'admin-order-detail';
        $view = 'admin/order_detail';
        require_once PATH_VIEW_ADMIN;
    }

    public function users()
    {
        if ($_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }
        $userModel = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action_type = $_POST['action_type'] ?? '';
            $user_id = $_POST['user_id'] ?? 0;

            if ($action_type === 'update_user') {
                $status = $_POST['status'] ?? 0;
                $role = $_POST['role'] ?? 0;
                $full_name = trim($_POST['full_name'] ?? '');
                $phone = trim($_POST['phone'] ?? '');
                $address = trim($_POST['address'] ?? '');
                $password = $_POST['new_password'] ?? '';

                if (empty($full_name)) {
                    $_SESSION['error'] = 'Họ tên không được để trống!';
                } elseif (mb_strlen($full_name) > 50) {
                    $_SESSION['error'] = 'Họ tên không được vượt quá 50 ký tự!';
                } elseif (!preg_match('/^[0-9]{10,11}$/', $phone)) {
                    $_SESSION['error'] = 'Số điện thoại không hợp lệ (phải gồm 10-11 chữ số)!';
                } elseif (!empty($password) && mb_strlen($password) < 6) {
                    $_SESSION['error'] = 'Mật khẩu mới phải dài ít nhất 6 ký tự!';
                } else {
                    $user = $userModel->getUserById($user_id);
                    if ($user) {
                        $userModel->updateUser($user_id, $full_name, $phone, $address, $status, $role);
                        if (!empty($password)) {
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $userModel->updatePassword($user_id, $hashed_password);
                        }
                        $_SESSION['success'] = 'Cập nhật người dùng thành công!';
                    }
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

    public function userForm()
    {
        if ($_SESSION['user']['role'] != 1) {
            header('Location: ' . BASE_URL . '?action=admin-products');
            exit;
        }

        $userModel = new UserModel();
        $id = $_GET['id'] ?? 0;
        
        if (!$id) {
            // Only editing is supported right now, redirect back if no ID
            header('Location: ' . BASE_URL . '?action=admin-users');
            exit;
        }

        $user = $userModel->getUserById($id);
        if (!$user) {
            header('Location: ' . BASE_URL . '?action=admin-users');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'] ?? 0;
            $role = $_POST['role'] ?? 0;
            $full_name = $_POST['full_name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $password = $_POST['new_password'] ?? '';

            $userModel->updateUser($id, $full_name, $phone, $address, $status, $role);
            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $userModel->updatePassword($id, $hashed_password);
            }
            $_SESSION['success'] = 'Cập nhật người dùng thành công!';
            header('Location: ' . BASE_URL . '?action=admin-users');
            exit;
        }

        $title = 'Sửa người dùng - DGENTECH Admin';
        $pageTitle = 'Sửa người dùng';
        $action = 'admin-user-edit';
        $view = 'admin/user_form';
        require_once PATH_VIEW_ADMIN;
    }
}
