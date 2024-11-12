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
    <h2>DANH SÁCH Loại sản phẩm</h2>

    
    <div class="container-fluid">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
            </div>
            <div class="card-body">
           <a href="index?act=insertCategory"><button  type="button" class="btn btn-primary">ADD</button></a> 
                <div class="table-responsive">
                
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Loại Sản Phẩm</th>
                                <th>Mô tả</th>
                                <th>Ngày Tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($category as $cate) :?>
                                <tr>
                                    
                                    <td><?= $cate['id'] ?>  </td>
                                    <td><?= $cate['category_name']?></td>
                                    <td><?= $cate['description'] ?></td>
                                    <td><?= $cate['created_at']?></td>
                                    <td><?= $cate['updated_at']?></td>
                              


                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="edit_id" value="">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn muốn có Loại sản phẩm này không!!!')" href="index.php?act=deleteCategori&id=<?=$cate['id'] ?>">
                                       
                                            
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                      
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                         
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


</body>
</html>