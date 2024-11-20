<?php

class HomeController
{
    private $category;

    public function __construct() {
        $this->category = new Category();
    }
    public function index() 
    {
        $view = 'home';
        require_once PATH_VIEW_CLIENT_MAIN;
    }
    
    
}