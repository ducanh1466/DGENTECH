<?php

class AdminController
{
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
        $title = 'Quản lý sản phẩm - DGENTECH Admin';
        $pageTitle = 'Sản phẩm';
        $action = 'admin-products';
        $view = 'admin/products';
        require_once PATH_VIEW_ADMIN;
    }

    public function productForm()
    {
        $title = 'Thêm/Sửa sản phẩm - DGENTECH Admin';
        $pageTitle = 'Thêm sản phẩm';
        $action = 'admin-product-create';
        $view = 'admin/product_form';
        require_once PATH_VIEW_ADMIN;
    }

    public function categories()
    {
        $title = 'Quản lý danh mục - DGENTECH Admin';
        $pageTitle = 'Danh mục';
        $action = 'admin-categories';
        $view = 'admin/categories';
        require_once PATH_VIEW_ADMIN;
    }

    public function orders()
    {
        $title = 'Quản lý đơn hàng - DGENTECH Admin';
        $pageTitle = 'Đơn hàng';
        $action = 'admin-orders';
        $view = 'admin/orders';
        require_once PATH_VIEW_ADMIN;
    }

    public function orderDetail()
    {
        $title = 'Chi tiết đơn hàng - DGENTECH Admin';
        $pageTitle = 'Chi tiết đơn hàng';
        $action = 'admin-order-detail';
        $view = 'admin/order_detail';
        require_once PATH_VIEW_ADMIN;
    }

    public function users()
    {
        $title = 'Quản lý người dùng - DGENTECH Admin';
        $pageTitle = 'Người dùng';
        $action = 'admin-users';
        $view = 'admin/users';
        require_once PATH_VIEW_ADMIN;
    }
}
