

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
            <h6 class="m-0 font-weight-bold text-primary">Loại Sản Phẩm</h6>
            <a href="<?= BASE_URL_ADMIN . '&action=categories-create' ?>" class="btn btn-primary mb-3">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
          
            
                  <table class="table table-bordered" id=" dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th> #</th>
                            <th>Tên Loại Sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php foreach ($data as $category) :?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['category_name'] ?></td>
                                <td><?= $category['description'] ?></td>
                              
                               
                                <td>
                                <a href="<?= BASE_URL_ADMIN . '&action=categories-edit&id=' . $category['id'] ?>"
                                class="btn btn-success">Sửa</a>
                                   
                                    </form>
                                </td>
                                <td>
                                <a href="<?= BASE_URL_ADMIN . '&action=categories-delete&id=' . $category['id'] ?>"
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