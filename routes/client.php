<?php

require_once PATH_ROOT . "controllers/client/Product_page.php";


$action = $_GET['action'] ?? '/';

match ($action) {

    // ''         => (new MainController)->index(), 

    "/" =>(new HomeController)->index(), // hiện giao diện trang chủ
    
    "product_page" =>(new Product_pageController)->index(),

    "contact"=>(new ContactController)->index(),

    "cart" =>(new CartController)->index(),
    
        

};

?>