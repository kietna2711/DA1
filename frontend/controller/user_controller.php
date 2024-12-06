<?php
    class UserController {

        private $userModel;

        // Khoi tao
        public function __construct() {
            require_once('../frontend/model/m_user.php');
            $this->userModel = new UserModel();
        }

        // Render login page
        public function renderLogin() {
            require_once('../frontend/view/login.php');
        }

        // Handle login
        public function login($data) {
            $user = $this->userModel->getUser($data);

            if ($user) {
                // Login successful
                $_SESSION['user'] = $user;
                if ($user['vaitro'] == 1) {
                    header('location: ../admin/index.php');
                } else {
                    header('location: index.php');
                }
            } else {
                // Login failed, set session error message and redirect to login page
                $_SESSION['login_error'] = "Đăng nhập thất bại, xin mời nhập lại";
                header('location: index.php?page=logout'); // Redirect to login page
            }
        }

        // Handle registration
        public function register($data) {
            // Validate inputs
            if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
                header('location: index.php?page=logout');
                return;
            }

            // Prepare user data
            $userData = [
                'email' => $data['email'],
                'password' => $data['password'],
                'name' => $data['name'],
            ];

            // Call the addUser method
            $result = $this->userModel->addUser($userData);

            // Check the result
            if ($result === "EMAIL_EXISTS") {
                $_SESSION['singup_error'] = "Email đã tồn tại. Vui lòng chọn email khác.";
                header('location: index.php?page=logout'); // Redirect to login page
                return;
            } elseif ($result) {
                $_SESSION['singup_thanhcong'] = "Đăng ký thành công.";
                header('location: index.php?page=logout');
            } else {
                $_SESSION['singup_thaibai'] = "Đăng ký thất bại, xin thử lại.";
                header('location: index.php?page=logout');
            }
        }

        // Handle logout
        public function logout(){
            unset($_SESSION['user']);
            require_once('../frontend/view/login.php');
        }

    }
?>
