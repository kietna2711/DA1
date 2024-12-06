<?php
require_once('../frontend/model/m_database.php');

class TransactionModel
{
    public function getAllTransaction() {
        $sql = "SELECT * FROM transaction";
        return database::getInstance()->getAll($sql);  // Lấy tất cả các danh mục từ database
    }

    public function addTransaction($data){
        // Đảm bảo mảng $params được khai báo đúng
        $sql = "INSERT INTO transaction(user_id, name, phone, address, total, discount_code, discount_amount, status, province, district, ward, payment, shipping_method, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array_values($data); // Lấy giá trị từ mảng dữ liệu gửi lên
        return database::getInstance()->executeGetId($sql, $params);
    }

    public function getTransactionDetail($id)
    {
        $sql="SELECT * FROM transaction where id=$id";
        return database::getInstance()->getOne($sql);
    }

    public function updateStatus($id, $status)
    {
        $sql="UPDATE transaction SET status=? where id=?";
        $params = array_values([$status, $id]);
        return database::getInstance()->execute($sql, $params);
    }
}