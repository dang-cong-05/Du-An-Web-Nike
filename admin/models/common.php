<?php
function connection() {
    $host = "localhost";
    $dbname ="dn1_webshoes_nike";
    $username ="root";
    $password = "";
    $port ="3306";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8", $username, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        return $conn;


    }catch(PDOException $e){
        echo "Lỗi kết nối CSDL:" .$e->getMessage();

    }


}

// hiện thị


// hàm dung để render view

function view($views, $data=[]){
    extract($data);
    include_once "views/$views.php";
}