<?php

class AccountController
{
    public function index()
    {
        $title = 'Tài khoản - DGENTECH';
        $view = 'client/account';
        require_once PATH_VIEW_MAIN;
    }
}
