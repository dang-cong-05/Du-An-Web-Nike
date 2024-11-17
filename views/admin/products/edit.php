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



<form action="<?= BASE_URL_ADMIN . '&action=products-update&id=' . $product['h_id']?>" method="post" enctype="multipart/form-data">

<div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInputGrid" name="product_name" value="<?= $product['h_product_name'] ?>" >
      <label for="floatingInputGrid">Tên Sản Phẩm</label>
    </div>
  </div>


  <div class="col-md">
    
    <div class="form-floating">
   
      <select class="form-select" id="category_id" name="category_id">

        <?php foreach ($categoryPluck as $id =>$name): ?>

        <option
        value="<?= $id ?>"
        <?= $id == $product['k_id'] ? 'selected': null ?> > <?= $name ?> 
      </option>

        <?php endforeach ?>
      </select>
      <label for="category_id">Loại sản phẩm</label>
    </div>
  </div>
  
  


</div>


<br>
<div class="mb-3">

<?php if (!empty($product['h_product_image'])): ?>
            <img src="<?= BASE_ASSETS_UPLOADS . $product['h_product_image'] ?>" width="200px">
        <?php endif ?>

  <label for="formFile" class="form-label">Ảnh sản phẩm</label>

  <input class="form-control" type="file" name="product_image" id="product_image">
</div>



<div class="row g-3">
  <div class="col">
  <label for="formFile" class="form-label">Giá</label>
    <input type="number" class="form-control" name="price" placeholder="Giá Bán"  value="<?=$product['h_price']  ?>"       aria-label="First name">
  </div>
  <div class="col">
  <label for="formFile" class="form-label">Hãng</label>
    <input type="text" class="form-control" value="<?= $product['h_brand'] ?>" name="brand" placeholder="Thương Hiệu" aria-label="Last name">
  </div>
</div>
<br>
<div class="row g-3">
  <div class="col">
  <label for="formFile" class="form-label">Model</label>
    <input type="text" class="form-control" value="<?= $product['h_model']?>" name="model" placeholder="Model" aria-label="First name">
  </div>
  <div class="col">
  <label for="formFile" class="form-label">Màu sắc</label>
    <input type="text" class="form-control" name="color" value="<?= $product['h_color'] ?>" placeholder="Màu sắc" aria-label="Last name">
  </div>
  <div class="col">
  <label for="formFile" class="form-label">Kích cỡ</label>
    <input type="text" class="form-control" name="size" placeholder="Kích cỡ " value="<?= $product['h_size'] ?>"  aria-label="Last name">
  </div>
</div>
<br>
<div class="row g-3">
  <div class="col">
  <label for="formFile" class="form-label">Chất liệu</label>
    <input type="text" class="form-control" value="<?= $product['h_material'] ?>" name="material" placeholder="Chất liệu" aria-label="Chất liệu">
  </div>
  <div class="col">
  <label for="formFile" class="form-label">Tồn kho</label>
    <input type="number" class="form-control" value="<?= $product['h_stock_quantity'] ?>" name="stock_quantity" placeholder="Tồn Kho" aria-label="Tồn Kho">
  </div>
</div>
<br>
<div class="col">
<label for="formFile" class="form-label">Mô tả</label>
    <input type="text" class="form-control" value="<?= $product['h_description'] ?>" style="height:100px;" name="description" placeholder="Mô tả" >
  </div>
<br>

<button type="submit" class="btn btn-primary">Thêm mới</button>
    <a href="<?= BASE_URL_ADMIN . '&action=products-index' ?>" class="btn btn-danger">Quay lại danh sách</a>

</form>