<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        // Tạo đường dẫn đích
        $targetFolder = PATH_ASSETS_UPLOADS . $folder;
        if (!is_dir($targetFolder)) {
            mkdir($targetFolder, 0755, true);
        }

        // Tên file với timestamp
        $targetFile = $folder . '/' . time() . '-' . basename($file["name"]);

        // Kiểm tra lỗi file trước khi upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Lỗi upload file: ' . $file['error']);
        }

        // Di chuyển file
        if (move_uploaded_file($file["tmp_name"], PATH_ASSETS_UPLOADS . $targetFile)) {
            return $targetFile;
        }

        // Nếu thất bại, ném lỗi
        throw new Exception('Upload file không thành công!');
    }
}

if(!function_exists('middleware_auth_check')){
    function middleware_auth_check($action,$arrRouteNeedAuth){
        if($action == 'register'){
            if(!empty($_SESSION['user'])){
                header('Location:' . BASE_URL);
                exit();
            }
        }
        elseif (empty($_SESSION['user']) && in_array($action,$arrRouteNeedAuth)){
            header('Location: ' .BASE_URL .'?action=register');
            exit();
        }
    }
}
// if(!function_exists('middleware_auth_check')){
//     function get_str_keys($data){
//         $keys = array_keys($data);
//         $keystenten = array_map(function ($key){
//             return "`$key`";
//         },$keys);
//         return implode(',', $keystenten);
    
    
//     }

// }
// if(!function_exists('middleware_auth_check')){

// }

