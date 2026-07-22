<?php

class ProductController
{
    public function index()
    {
        $title = 'Sản phẩm - DGENTECH';
        $view = 'client/products';
        require_once PATH_VIEW_MAIN;
    }

    public function detail()
    {
        $title = 'Chi tiết sản phẩm - DGENTECH';
        $view = 'client/product_detail';
        require_once PATH_VIEW_MAIN;
    }
}
