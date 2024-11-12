<?php 

class CategoryController{

    public function listcatogeri(){
        $category = (new category)->renderCategory();
        view("categorys/ListCategory",['category'=>$category]);
    }

    public function add(){
        view("Categorys/ListCategory");
    }
    public function view(){
        view("Categorys/insertCategory");
    }

    public function deleteCategory() {
        $id = $_GET['id'];
        (new category)->deleteCategory($id); 
        die;
        include("location:index?ctl=Category");
    }

    public function insertCategory(){
        $data = $_POST;
        (new category())->insertCategory($data);
        header("location:index.php?act=insertCategory");
        exit;
    }


    
}

?>