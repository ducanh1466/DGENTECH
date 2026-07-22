<?php

class HomeController
{
    public function index() 
    {
        $title = 'DGENTECH - Cửa hàng điện tử';
        $view = 'client/home';
        require_once PATH_VIEW_MAIN;
    }
}