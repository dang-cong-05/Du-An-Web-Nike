<?php
require_once PATH_ROOT . "controllers/client/Product_page.php";
require_once PATH_ROOT . "controllers/client/Product_detail.php";

$action = $_GET['action'] ?? '/';

match ($action) {
    // ''         => (new MainController)->index(), 

    "/" =>(new HomeController)->index(), // hiện giao diện trang chủ
    
    "product_page" =>(new Product_pageController)->index(),

    "contact"=>(new ContactController)->index(),

    "cart" =>(new CartController)->index(),
    
    "search" =>(new Product_pageController)->searchProduct(),

    "product_detail" => (new Product_pageController)->product_detail(), // chi tiết sản phẩm


};

?>