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

<form action="<?= BASE_URL_ADMIN . '&action=products-store'?>" method="post" enctype="multipart/form-data">

<div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInputGrid" name="product_name" >
      <label for="floatingInputGrid">Tên Sản Phẩm</label>
    </div>
  </div>
  <div class="col-md">
    <div class="form-floating">
      
      <select class="form-select" id="category_id" name="category_id">

       
        <?php foreach ($categoryPluck as $id =>$name): ?>
        <option value="<?= $id ?>"> <?= $name ?>  </option>
        <?php endforeach ?>
      </select>
      <label for="floatingSelectGrid">Loại sản phẩm</label>
    </div>
  </div>
</div>


<br>
<div class="mb-3">
  <label for="formFile" class="form-label">Ảnh sản phẩm</label>
  <input class="form-control" type="file" name="product_image" id="formFile">
</div>

<div class="row g-3">
  <div class="col">
    <input type="number" class="form-control" name="price" placeholder="Giá Bán" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="brand" placeholder="Thương Hiệu" aria-label="Last name">
  </div>
</div>
<br>
<div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" name="model" placeholder="Model" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="color" placeholder="Màu sắc" aria-label="Last name">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="size" placeholder="Kích cỡ " aria-label="Last name">
  </div>
</div>
<br>
<div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" name="material" placeholder="Chất liệu" aria-label="Chất liệu">
  </div>
  <div class="col">
    <input type="number" class="form-control" name="stock_quantity" placeholder="Tồn Kho" aria-label="Tồn Kho">
  </div>
</div>
<br>
<div class="form-floating">
  <textarea class="form-control"  name="description" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Mô tả</label>
</div>
<br>

<button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="<?= BASE_URL_ADMIN . '&action=products-index' ?>" class="btn btn-danger">Quay lại danh sách</a>

</form>