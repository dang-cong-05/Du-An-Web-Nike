<?php
class CartController
{

    public function index() 
    {
        $view = 'cart';
        require_once PATH_VIEW_CLIENT_MAIN;
    }
}