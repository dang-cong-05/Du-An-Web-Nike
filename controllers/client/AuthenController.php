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
                        $_SESSION['error']="Đăng ký Thất Bại";
                        header('Location: /');
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
                        $_SESSION['register_sucsess'] = 'Đăng ký thành công!';
                        header('Location: index.php?action=/');
                    } catch (PDOException $e) {
                        $errors['general'] = "Lỗi khi thêm dữ liệu: " . $e->getMessage();
                    }
                }
                
                return $errors ?? [];
            } 

        }

        public function signin()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
    
                $errors = [];
    
                if (empty($email)) {
                    $errors['email'] = "Email không được để trống.";
                }
                if (empty($password)) {
                    $errors['password'] = "Mật khẩu không được để trống.";
                }
    
                if (!empty($errors)) {
                    $_SESSION['login_errors'] = $errors;
                    header('Location: /');
                    exit();
                }
    
                // Kiểm tra đăng nhập
                $user = $this->auth->find('*', 'email = ?', [$email]);
                
                if ($user && password_verify($password, $user['password'])) {
                    // Đăng nhập thành công
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => htmlspecialchars($user['name']),
                        'role' => $user['role']
                    ];
                    // $_SESSION['login_success'] = 'Welcome, ' . htmlspecialchars($user['name']);
                    
            
                    // Phân quyền
                    if ($user['role'] === 'admin') {
                        header('Location: index.php?mode=admin'); // Trang dành riêng cho admin
                    } else {
                        header('Location: index.php'); // Trang dành cho user
                    }
                    exit();
                } else {
                    // Đăng nhập thất bại
                    $_SESSION['login_errors'] = ['general' => "Email hoặc mật khẩu không đúng."];
                    header('Location: /');
                    exit();
                }
    
                return $errors;
            }
        }

        public function logout(){
            session_destroy();  // hủy session trên máy chủ bao gồm cả session ID.

            header('Location: ' . BASE_URL);
            exit();
        }
    }
?>