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
        $title = 'Thanh toán - DGENTECH';
        $view = 'client/checkout';
        require_once PATH_VIEW_MAIN;
    }
}
