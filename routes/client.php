<?php
// require_once PATH_ROOT . "controllers/client/Product_page.php";

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'cart' => (new CartController)->cart(), 
    'product_cart'=> (new Product_page)->shop()
};

?>