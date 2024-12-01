<?php 
if (isset($_POST['logout'])) {
    // Hủy session
    session_destroy();
    // Chuyển hướng về trang client
    header("Location: index.php?action=/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .left {
        background: #343A43;
        width: auto;
        float: left;
        padding-left: 40px;

        width: 20%;
        height: 3000px;
    }

    .right {
        padding: 50px;
        width: 80%;
        float: right;
    }

    nav ul li a:hover {
        color: white;

    }

    nav ul li a,
    b,
    h2 {

        display: flex;
        text-align: justify;
        color: white;
        text-decoration: none;

        font-size: 25px;

    }

    nav ul li b:hover {
        color: white;
    }

    a {
        text-decoration: none;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    </style>

</head>

<body>
    <div class="left">
        <a href="?mode=admin">
            <h2>Admin</h2>
        </a>
        <nav>

            <ul class="navbar-nav">


                <hr class="sidebar-divider ">

            <li>
                <a href="<?= BASE_URL_ADMIN ?>">Dashboard</a>
            </li>
            <hr class="sidebar-divider ">
            <li>
                <a  href="<?= BASE_URL_ADMIN . '&action=users-index' ?>">Quản lý User</a>
            </li>
            <hr class="sidebar-divider ">
            <li>
                 <a href="<?= BASE_URL_ADMIN . '&action=slidershow-index' ?>">Quản lý Giao Diện</a>
            </li>
            <hr class="sidebar-divider ">
            <li >
                <a href="<?= BASE_URL_ADMIN . '&action=products-index' ?>"> Sản phẩm</a>
            </li>
            <hr class="sidebar-divider "> 
            <li>
                <a href="<?= BASE_URL_ADMIN . '&action=categories-index' ?>"> Loại Sản Phẩm</a>
            </li>
            <hr class="sidebar-divider ">
            <li>
                <a href="<?= BASE_URL_ADMIN . '&action=orders-index' ?>"> Quản lí đơn hàng</a>
            </li>
         
      </li>


            </ul>
        </nav>
    </div>

    <div class="right">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Admin Dashboard' ?></h1>
        <form method="POST">
            <button type="submit" name="logout">Thoát</button>
        </form>
        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_ADMIN . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>