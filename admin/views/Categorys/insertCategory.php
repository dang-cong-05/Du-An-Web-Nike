
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>


<div class="container-fluid">
    
    <div class="card shadow mb-4" style="margin-left: 20px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
        </div>
        <div class="card-body">
        
            <div class="table-responsive">
           
            
            <div class="row" style="padding: 20px;">
     
     <form class="row g-3" action="index?act=insertCategory"  method="post" enctype="multipart/form-data">

  <div class="col-12">
    <label for="inputAddress" class="form-label">Tên loại sản phẩm</label>
    <input type="text" class="form-control" id="inputAddress" name="category_name" placeholder="nhập tên loại sản phẩm">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label" >Ngày thêm mới</label>
    <input type="date" class="form-control" name="created_at" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Ngày sửa</label>
    <input type="date" class="form-control" name="updated_at" id="inputPassword4">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 10px; width: 620px; " name="description" ></textarea>
  <label for="floatingTextarea2">Mô tả</label>
  <br> 
  <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
</div>
  





</div>
</body>
</html>