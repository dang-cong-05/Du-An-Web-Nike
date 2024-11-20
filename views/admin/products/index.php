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
            <h6 class="m-0 font-weight-bold text-primary">Các Sản Phẩm</h6>
            <a href="<?= BASE_URL_ADMIN . '&action=products-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
          
            
                  <table class="table table-bordered" id=" dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Tên Sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Hãng</th>
                            <th>Model</th>
                            <th>Màu sắc</th>
                            <th>Kích cỡ</th>
                            <th>Chất liệu</th>
                            <th>Tồn kho</th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                     </thead>
                     <tbody>
                       <?php foreach ($data as $product) :?>
                            <tr>
                                <td><?= $product['h_id']?></td>

                                <td><?= $product['h_product_name'] ?></td>

                                <td>
                                  <?php if(!empty($product['h_product_image'])) :?>  
                                    <img src="<?= BASE_ASSETS_UPLOADS . $product['h_product_image'] ?>" alt="" width="200px">
                                    <?php endif; ?>
                                </td>
                               
                                <td><?= $product['k_category_name'] ?></td>
                                <td><?= $product['h_description'] ?></td>

                                <td><?= $product['h_price'] ?> đ</td>
                                <td><?= $product['h_brand']?></td>
                                <td><?= $product['h_model']?></td>
                                <td><?= $product['h_color']?></td>
                                <td><?= $product['h_size']?></td>
                                <td><?= $product['h_material']?></td>
                                <td><?= $product['h_stock_quantity']?></td>
                              
                              
                               
                                <td>
                                <a href="<?= BASE_URL_ADMIN . '&action=products-edit&id=' . $product['h_id'] ?>"
                                class="btn btn-success">Sửa</a>
                                   
                                    </form>
                                </td>
                                <td>
                                <a href="<?= BASE_URL_ADMIN . '&action=products-delete&id=' . $product['h_id'] ?>"
                                 onclick="return confirm('Có chắc xóa không?')"
                                  class="btn btn-danger">Xóa</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

    </div>
</div>
</div>