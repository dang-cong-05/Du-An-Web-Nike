<?php 
    class AuthenController 
    {   
        private $auth;
        public function __construct()
        {
            $this->auth = new User;
        }
        
        public function register()
        {
            if(isset($_POST['signup'])&&isset($_POST['username'])&&isset($_POST['password'])){
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $email = trim($_POST['email']);
                
                $errors = [];
                
                if(empty($username)){
                    $errors['username'] = "Tên Tài Khoản không Được Để Trống";
                }
                if (empty($password)) {
                    $errors['password'] = "Mật khẩu không được để trống.";
                }
        
                if (empty($email)) {
                    $errors['email'] = "Email không được để trống.";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Email không hợp lệ.";
                }
               
                
                if (!empty($password)) {
                    if (strlen($password) < 8) {
                        $errors['password'] = "Mật khẩu phải có ít nhất 8 ký tự.";
                    }
                    if (!preg_match('/[A-Z]/', $password)) {
                        $errors['password'] = "Mật khẩu phải chứa ít nhất một chữ cái viết hoa.";
                    }
                    if (!preg_match('/[a-z]/', $password)) {
                        $errors['password'] = "Mật khẩu phải chứa ít nhất một chữ cái thường.";
                    }
                    if (!preg_match('/\d/', $password)) {
                        $errors['password'] = "Mật khẩu phải chứa ít nhất một chữ số.";
                    }
                    if (!preg_match('/[@$!%*?&]/', $password)) {
                        $errors['password'] = "Mật khẩu phải chứa ít nhất một ký tự đặc biệt (@$!%*?&).";
                    }
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo "<p style='color: red;'>$error</p>";
                        }
                        return;
                    }

                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $createdAt = date('Y-m-d H:i:s');
                    
                    $data = [
                        'name' => $username,
                        'password' => $hashedPassword,
                        'email' => $email,
                        'created_at'=>$createdAt,
                    ];
                    
                    try {
                        $this->auth->insert($data);
                        $_SESSION['message'] = 'Đăng ký thành công!';
                        header('Location: /');
                    } catch (PDOException $e) {
                        echo "<p style='color: red;'>Lỗi khi thêm dữ liệu: " . $e->getMessage() . "</p>";
                    }
                }
                
                return [];
            }            

        }

        public function signin()
        {
            
        }
    }
?>