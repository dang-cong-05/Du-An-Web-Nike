<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class='alert $class'> {$_SESSION['msg']} </div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Các Đơn Hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
          
            
                  <table class="table table-bordered" id=" dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách Hàng</th>
                            <th>Email</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Đặt</th>
                            <th>Action</th>
                           
                        </tr>
                     </thead>
    </div>
</div>
<tbody>
<?php foreach ($data as $order): ?>
<tr>
    <td><?= $order['orders_id'] ?></td>
    <td><?= $order['users_name'] ?></td>
    <td><?= $order['users_email'] ?></td>
    <td><?= $order['orders_product_name'] ?></td>
    <td><?= number_format($order['orders_total_amount'], 0, ',', '.') ?> VND</td>
    <td><?= $order['order_status'] ?></td>
    <td><?= $order['order_created_at'] ?></td>
    <td>
        <a href="<?= BASE_URL_ADMIN . '&action=orders-edit&id=' . $order['orders_id'] ?>" class="btn btn-success">Sửa</a>
        <a href="<?= BASE_URL_ADMIN . '&action=orders-delete&id=' . $order['orders_id'] ?>" onclick="return confirm('Xóa đơn hàng này?')"class="btn btn-danger">Xóa</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
