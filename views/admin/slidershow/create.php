<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
body {
    background-color: #f9f9f9; 
}

form {
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: 500;
    color: #333;
}

input.form-control {
    border-radius: 6px;
    border: 1px solid #ccc;
    padding: 10px;
}

button.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 6px; 
    padding: 10px 15px;
    font-size: 16px;
}
    </style>

</head>

<body>
<div class="container">
    <h1>Thêm mới Slidershow</h1>
    <form action="<?= BASE_URL_ADMIN . '&action=slidershow-create' ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Chọn hình ảnh:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>





    <!-- Hiển thị thông báo nếu có -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="message">
            <?php
            echo $_SESSION['msg']; // Hiển thị thông báo
            unset($_SESSION['msg']); // Xóa thông báo sau khi đã hiển thị
            ?>
        </div>
    <?php endif; ?>
</body>
</html>
