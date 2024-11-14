<?php 
 define('BASE_URL','http://localhost/Website_Nike/admin/');
 define('PATH_ROOT',    __DIR__ . '/../');

 define('DB_HOST','localhost');
 define('DB_PORT','3306');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','dn1_webshoes_nike');
 
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=utf8", DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;

}catch (PDOException $e){
    echo "Lỗi kết nối CSDL:" .$e ->getMessage();
}

 ?>