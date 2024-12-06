<?php
   class UserController {

    private $UserModel;

    // Khởi tạo đối tượng
    public function __construct() {
        require_once('../frontend/model/m_user.php');
        $this->userModel = new UserModel();
    }

    // trang danh mucj
    public function renderUser() {
        $user = $this->userModel->getAllUser();
        require_once('../admin/view/v_user.php');
    }
    public function deleteUser($id) {
        $result = $this->userModel->deleteUserById($id);
    
        if ($result) {
            header('Location: ?page=user&success=1');
        } else {
            header('Location: ?page=user&error=1');
        }
        exit();
    }
    
  

    

    
    
}

?>
