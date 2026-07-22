<?php

class AuthController
{
    public function login()
    {
        $title = 'Đăng nhập - DGENTECH';
        $view = 'client/login';
        require_once PATH_VIEW_MAIN;
    }

    public function register()
    {
        $title = 'Đăng ký - DGENTECH';
        $view = 'client/register';
        require_once PATH_VIEW_MAIN;
    }
}
