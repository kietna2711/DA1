<?php
require_once('../frontend/model/m_database.php');

class DiscountModel {
    // Lấy tất cả danh mục
    public function getAllDiscount() {
        $sql = "SELECT * FROM discount_code";
        return database::getInstance()->getAll($sql);  // Lấy tất cả các danh mục từ database
    }
    public function addDiscount($data){
        // Đảm bảo mảng $params được khai báo đúng
        $sql = "INSERT INTO discount_code(code, discount_amount, start_date, expiration_date) VALUES (?, ?, ?, ?)";
        $params = array_values($data); // Lấy giá trị từ mảng dữ liệu gửi lên
        return database::getInstance()->execute($sql, $params);
    }
    public function getDiscountById($id){
        $sql="SELECT * FROM discount_code where discount_code_id=$id";
        return database::getInstance()->getOne($sql);
    }
    public function editDiscount($data){
        $sql="UPDATE discount_code SET code=?,discount_amount=?, start_date=?, expiration_date=? where discount_code_id=?";
        $params = array_values($data);
        return database::getInstance()->execute($sql, $params);
    }

    public function deleteDiscount($id){
        $sql="DELETE FROM `discount_code` WHERE discount_code_id= $id";
        return database::getInstance()->execute($sql);
    }

    public function getDiscountByCode($code){

        $sql="SELECT * FROM discount_code where code = '$code'";
        return database::getInstance()->getOne($sql);
    }
    public function getAllDiscounts() {
        $sql = "SELECT * FROM discount_code WHERE start_date <= NOW() AND expiration_date >= NOW()";
        return database::getInstance()->getAll($sql);
    }
}
?>
