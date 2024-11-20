<?php

class Product_pageController
{   

    private $product;

    public function __construct() {
        $this->product = new Product();
    }
    public function index() 
    {
        $view = 'product_page';
        $data = $this->product->getTop16Latest();
        require_once PATH_VIEW_CLIENT_MAIN;
    }
}