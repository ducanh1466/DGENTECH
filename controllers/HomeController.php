<?php

class HomeController
{
    public function index() 
    {
        $productModel = new ProductModel();
        $newProducts = $productModel->getLatestProducts(8);
        $hotProducts = $productModel->getLatestProducts(4); // Or a getHotProducts method later

        $title = 'DGENTECH - Cửa hàng điện tử';
        $view = 'client/home';
        require_once PATH_VIEW_MAIN;
    }
}