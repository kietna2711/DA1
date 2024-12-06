<?php
class DiscountController {
    private $discountModel;

    // Khởi tạo đối tượng
    public function __construct() {
        require_once('../frontend/model/m_discount.php');
        $this->discountModel = new DiscountModel();
    }

    // Hiển thị giảm giá
    public function renderDiscount() {
        $discounts = $this->discountModel->getAllDiscount();
        require_once('../admin/view/v_discount-code.php');
    }

    // Thêm mới giảm giá
    public function renderAddDiscount() {
        require_once('../admin/view/add-discount.php');
    }

    public function addDiscount($data) {
        $this->discountModel->addDiscount($data);
        header('Location: index.php?page=discount');
    }

    // Sửa giảm giá
    public function renderEditDiscount($id) {
        $discount = $this->discountModel->getDiscountById($id);
        require_once('../admin/view/edit-discount.php');
    }

    public function editDiscount($data) {

        $this->discountModel->editDiscount($data);
        header('Location: index.php?page=discount');
    }

    public function deleteDiscount($id) {

        $this->discountModel->deleteDiscount($id);
        header('Location: index.php?page=discount');
    }
}

?>
