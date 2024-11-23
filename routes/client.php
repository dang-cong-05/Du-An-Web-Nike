<?php

require_once PATH_ROOT . "controllers/client/Product_page.php";


$action = $_GET['action'] ?? '/';

match ($action) {

    // ''         => (new MainController)->index(), 

    "/" =>(new HomeController)->index(), // hiện giao diện trang chủ
    
    "register"=>(new AuthenController)->register(),

    "login"=>(new AuthenController)->signin(),

    "logout"=>(new AuthenController)->logout(),
    
    "product_page" =>(new Product_pageController)->index(),

    // "product_cart" =>(new CartController)->index(),

    "contact"=>(new ContactController)->index(),

    "cart" =>(new CartController)->index(),
    
        

};

?>