<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    // Client
    '/'                 => (new HomeController)->index(),
    'products'          => (new ProductController)->index(),
    'product-detail'    => (new ProductController)->detail(),
    'cart'              => (new CartController)->index(),
    'checkout'          => (new CartController)->checkout(),
    'login'             => (new AuthController)->login(),
    'register'          => (new AuthController)->register(),
    'logout'            => (new AuthController)->logout(),
    'account'           => (new AccountController)->index(),

    // Admin
    'admin'                 => (new AdminController)->dashboard(),
    'admin-products'        => (new AdminController)->products(),
    'admin-product-create'  => (new AdminController)->productForm(),
    'admin-product-edit'    => (new AdminController)->productForm(),
    'admin-categories'      => (new AdminController)->categories(),
    'admin-brands'          => (new AdminController)->brands(),
    'admin-orders'          => (new AdminController)->orders(),
    'admin-order-detail'    => (new AdminController)->orderDetail(),
    'admin-users'           => (new AdminController)->users(),

    default => (new HomeController)->index(),
};