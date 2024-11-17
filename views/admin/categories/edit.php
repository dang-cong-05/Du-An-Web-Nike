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

<form action="<?= BASE_URL_ADMIN . '&action=categories-update&id=' . $category['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Tên Loại giày</label>
        <input type="text" class="form-control" name="category_name" value="<?=$category['category_name']?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="description" style="height: 150px;" value="<?=$category['description']?>" >
       
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>

    <a href="<?= BASE_URL_ADMIN . '&action=categories-index' ?>" class="btn btn-danger">Quay lại danh sách</a>
</form>