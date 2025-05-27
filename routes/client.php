<?php

require_once PATH_ROOT . "controllers/client/Product_page.php";
require_once PATH_ROOT . "controllers/client/Product_detail.php";
require_once PATH_ROOT . "controllers/client/OrderController.php";


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
    

    "search" =>(new Product_pageController)->searchProduct(),

    "product_detail" => (new Product_pageController)->product_detail(), // chi tiết sản phẩm


    "cart-add"=>(new CartController)->cartAdd($_GET['productId']),
    "cart-List"=>(new CartController)->cartList(),
    "cart-inc" =>(new CartController)->cartInc($_GET['productId']),
    "cart-dec" =>(new CartController)->cartDec($_GET['productId']),
    "cart-delete" =>(new CartController)->cartDelete($_GET['productId']),

  
   "order"=>(new Order_Controller)->index(), // Trang hiển thị đặt hàng
    "order-save"=>(new Order_Controller)->create(), // Xử lý lưu đơn hàng
    "order-success"=>(new Order_Controller)->success(), // Trang xác nhận đặt hàng thành công




};

?>