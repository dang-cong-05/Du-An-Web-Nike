<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'> {$_SESSION['msg']} </div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">

        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>

                <li> <?= $value ?> </li>

            <?php endforeach; ?>
        </ul>

    </div>

    <?php unset($_SESSION['errors']); ?>

<?php endif; ?>
<form method="POST" action="index.php?action=orders-update&id=<?= $order['orders_id'] ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="product_name">Tên Sản Phẩm:</label>
        <input type="text"  class="form-control" name="product_name" id="product_name" value="<?= htmlspecialchars($order['orders_product_name']) ?>">
    </div>
    <div>
        <label for="total_amount">Tổng Tiền:</label>
        <input type="number"  class="form-control" name="total_amount" id="total_amount" value="<?= $order['orders_total_amount'] ?>">
    </div>
    <div>
        <label for="status">Trạng Thái:</label>
        <select name="status"  class="form-select" id="status">
            <option value="Pending" <?= $order['order_status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Shipped" <?= $order['order_status'] === 'Shipped' ? 'selected' : '' ?>>Shipped</option>
            <option value="Delivered" <?= $order['order_status'] === 'Delivered' ? 'selected' : '' ?>>Delivered</option>
            <option value="Cancelled" <?= $order['order_status'] === 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    <a href="<?= BASE_URL_ADMIN . '&action=orders-index' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>
