<?php

class ProductController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        
        $title = 'Sản phẩm - DGENTECH';
        $view = 'client/products';
        require_once PATH_VIEW_MAIN;
    }

    public function detail()
    {
        $id = $_GET['id'] ?? 0;
        $productModel = new ProductModel();
        
        $product = $productModel->getProductById($id);
        if (!$product) {
            header('Location: ' . BASE_URL . '?action=products');
            exit;
        }

        $variants = $productModel->getVariantsByProductId($id);
        // If there are no variants, we can either set a default or just pass empty array.
        
        $relatedProducts = $productModel->getProductsByCategory($product['category_id'], 4, $id);
        
        $title = $product['product_name'] . ' - DGENTECH';
        $view = 'client/product_detail';
        require_once PATH_VIEW_MAIN;
    }
}
