<?php

class ProductController
{
    public function index()
    {
        $productModel = new ProductModel();
        require_once PATH_MODEL . 'CategoryModel.php';
        require_once PATH_MODEL . 'BrandModel.php';

        $categoryModel = new CategoryModel();
        $brandModel = new BrandModel();

        // Get filter options for sidebar
        $categoriesList = $categoryModel->getAllCategories();
        $brandsList = $brandModel->getAllBrands();
        $attributesList = $productModel->getAttributesForFilter();

        // Get filter params
        $keyword = $_GET['keyword'] ?? '';
        $categories = isset($_GET['categories']) ? (is_array($_GET['categories']) ? $_GET['categories'] : [$_GET['categories']]) : [];
        $brands = isset($_GET['brands']) ? (is_array($_GET['brands']) ? $_GET['brands'] : [$_GET['brands']]) : [];
        $attributeValues = isset($_GET['attributes']) ? (is_array($_GET['attributes']) ? $_GET['attributes'] : [$_GET['attributes']]) : [];
        $minPrice = isset($_GET['min_price']) ? (int) $_GET['min_price'] : 0;
        $maxPrice = isset($_GET['max_price']) ? (int) $_GET['max_price'] : 0;
        $sort = $_GET['sort'] ?? 'default';

        // Pagination
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        $limit = 12;
        $offset = ($page - 1) * $limit;

        $totalProducts = $productModel->countProductsFiltered($keyword, $categories, $brands, $attributeValues, $minPrice, $maxPrice);
        $totalPages = ceil($totalProducts / $limit);

        $products = $productModel->getProductsFiltered($keyword, $categories, $brands, $attributeValues, $minPrice, $maxPrice, $sort, $limit, $offset);

        $title = 'Sản phẩm - DGENTECH';
        $view = 'client/products';
        require_once PATH_VIEW_MAIN;
    }

    public function detail()
    {
        $id = $_GET['id'] ?? 0;
        $productModel = new ProductModel();
        require_once PATH_MODEL . 'ReviewModel.php';
        $reviewModel = new ReviewModel();

        $product = $productModel->getProductById($id);
        if (!$product) {
            header('Location: ' . BASE_URL . '?action=products');
            exit;
        }

        $variants = $productModel->getVariantsByProductId($id);
        // If there are no variants, we can either set a default or just pass empty array.

        $relatedProducts = $productModel->getProductsByCategory($product['category_id'], 4, $id);

        $productAttributes = $productModel->getProductAttributes($id);

        $reviews = $reviewModel->getReviewsByProductId($id);
        $canReview = false;
        if (isset($_SESSION['user'])) {
            $canReview = $reviewModel->canUserReview($_SESSION['user']['user_id'], $id);
        }

        $title = $product['product_name'] . ' - DGENTECH';
        $view = 'client/product_detail';
        require_once PATH_VIEW_MAIN;
    }

    public function submitReview()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user'])) {
                header('Location: ' . BASE_URL . '?action=login');
                exit;
            }

            $productId = $_POST['product_id'] ?? 0;
            $rating = $_POST['rating'] ?? 5;
            $comment = $_POST['comment'] ?? '';
            $userId = $_SESSION['user']['user_id'];

            require_once PATH_MODEL . 'ReviewModel.php';
            $reviewModel = new ReviewModel();

            if ($reviewModel->canUserReview($userId, $productId)) {
                $reviewModel->addReview($productId, $userId, $rating, $comment);
            }

            header('Location: ' . BASE_URL . '?action=product-detail&id=' . $productId . '#reviewsPanel');
            exit;
        }
    }
}
