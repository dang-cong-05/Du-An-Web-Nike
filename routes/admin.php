<?php


$action = $_GET['action'] ?? '/';


// if (
//     empty($_SESSION['user'])
//     && !in_array($action, ['show-form-login', 'login'])
// ) {
//     header('Location: ' . BASE_URL_ADMIN . '&action=show-form-login');
//     exit();
// }


match ($action) {
    '/'         => (new DashboardController)->index(),

    // 'test-show' => (new TestController)->show(),


    // 'show-form-login'       => (new AuthenController)->showFormLogin(),
    // 'login'                 => (new AuthenController)->login(),
    // 'logout'                => (new AuthenController)->logout(),

      
    

    // CRUD Book
    'books-index'    => (new BookController)->index(),   // Hiển thị danh sách
    'books-show'     => (new BookController)->show(),    // Hiển thị chi tiết theo ID
    'books-create'   => (new BookController)->create(),  // Hiển thị form thêm mới
    'books-store'    => (new BookController)->store(),   // Lưu dữ liệu thêm mới
    'books-edit'     => (new BookController)->edit(),    // Hiển thị form cập nhật theo ID
    'books-update'   => (new BookController)->update(),  // Lưu dữ liệu cập nhật theo ID
    'books-delete'   => (new BookController)->delete(),  // Xóa dữ liệu theo ID

    "categories-index" =>(new CategoryController)->index(),
    "categories-create"=>(new CategoryController)->create(),
    "categories-store" =>(new CategoryController)->store(),
    "categories-edit"  =>(new CategoryController)->edit(),
    "categories-update"=>(new CategoryController)->update(),
    "categories-delete"=>(new CategoryController)->delete(), 


    "products-index" =>(new ProductController)->index(),
    "products-create" =>(new ProductController)->create(),
    "products-store" =>(new ProductController)->store(),
    "products-edit" =>(new ProductController)->edit(),
    "products-update" =>(new ProductController)->update(),
    "products-delete" =>(new ProductController)->delete(),

    "users-index"=>(new UserController)->index(),
    "users-create"=>(new UserController)->create(),
    "users-store"=>(new UserController)->store(),
    "users-show"=>(new UserController)->show(),
    "users-edit"=>(new UserController)->edit(),
    "users-update"=>(new UserController)->update(),
    "users-delete"=>(new UserController)->delete(),



    "slidershow-index" => (new SlidershowController)->index(),   // Hiển thị giao diện
    "slidershow-create" => (new SlidershowController)->create(), // Tạo giao diện
    "slidershow-store" => (new SlidershowController)->store(),   // Lưu giao diện mới
    "slidershow-edit" => (new SlidershowController)->edit(),     // Chỉnh sửa giao diện
    "slidershow-update" => (new SlidershowController)->update(), // Cập nhật giao diện
    "slidershow-delete" => (new SlidershowController)->delete(), // Xóa giao diện

};