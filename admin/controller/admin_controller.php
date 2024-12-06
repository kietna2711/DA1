<?php
   class CategoryController {
    private $categoryModel;
    private $transactionModel;
    private $orderModel;

    // Khởi tạo đối tượng
    public function __construct() {
        require_once('../frontend/model/m_category.php');
        require_once('../frontend/model/m_transaction.php');
        require_once('../frontend/model/m_orders.php');
        $this->categoryModel = new CategoryModel();
        $this->transactionModel = new TransactionModel();
        $this->orderModel = new OrderModel();
    }

    // Hiển thị danh mục
    public function renderCategory() {
        $categories = $this->categoryModel->getAllCate();
        require_once('../admin/view/v_category.php');
    }

    // Thêm mới danh mục
    public function renderAddCategory() {
        require_once('../admin/view/add-category.php');
    }

    public function addCategory($data) {
        $this->categoryModel->addCategory($data);
        header('Location: index.php?page=category');
    }

    // Sửa danh mục
    public function renderEditCate($id) {
        $category = $this->categoryModel->getCategoryById($id);
        require_once('../admin/view/edit-category.php');
    }    

    public function editCategory($data) {
        if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == UPLOAD_ERR_OK) {
            $data['image_url'] = $_FILES['image_url']['name'];
            move_uploaded_file($_FILES['image_url']['tmp_name'], "../public/user/img/" . $data['image_url']);
        } else {
            unset($data['image_url']); // Xóa trường image_url nếu không có ảnh được upload
        }
    
        if (empty($data['category_id'])) {
            die("Thiếu category_id.");
        }
    
        $this->categoryModel->editCategory($data);
        header('Location: index.php?page=category');
    }
    

    public function toggleCategoryVisibility($id, $hidden) {
        $this->categoryModel->toggleCategoryVisibility($id, $hidden);
    }
    public function getAllTransaction()
    {
        $transactions = $this->transactionModel->getAllTransaction();
        require_once('../admin/view/v_oder.php');
    }
   public function getTransactionDetail()
   {
       $id = isset($_GET['id_order']) ? $_GET['id_order'] : '';
       if (empty($id)) {
           header('Location: index.php?page=order');
       }
       $transaction = $this->transactionModel->getTransactionDetail($id);
       $orders = $this->orderModel->getOrderByTransaction($id);
       require_once('../admin/view/v_order_detail.php');
   }

   public function updateTransactionStatus()
   {
       $id = isset($_POST['transaction_id']) ? $_POST['transaction_id'] : '';
       $status = isset($_POST['status']) ? $_POST['status'] : '';
       if (empty($id)) {
           header('Location: index.php?page=order');
       }
       $this->transactionModel->updateStatus($id, $status);
       $transaction = $this->transactionModel->getTransactionDetail($id);
       $orders = $this->orderModel->getOrderByTransaction($id);
       require_once('../admin/view/v_order_detail.php');
   }
    
}

?>
