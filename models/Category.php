<?php 

class Category extends BaseModel
{
    protected $table = 'categories';
    public function getAll()
    {
        return $this->select(); // Giả sử `select()` là phương thức lấy tất cả dữ liệu từ bảng
    }
}