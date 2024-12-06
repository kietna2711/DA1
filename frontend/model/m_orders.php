<?php
require_once('../frontend/model/m_database.php');

class OrderModel {
    public function addOrder($data) {
        $sql = "INSERT INTO orders(transaction_id, product_id, qty, price) VALUES (?, ?, ?, ?)";
        $params = array_values($data); // Chuyển dữ liệu thành mảng giá trị
        return database::getInstance()->executeGetId($sql, $params);
    }

    public function getOrderByTransaction($id) {
        $sql = "SELECT orders.*, product.name as product_name 
                FROM orders 
                JOIN product ON product.product_id = orders.product_id  
                WHERE transaction_id = $id";
        return database::getInstance()->getAll($sql);
    }

    public function getOrdersByUserId($userId) {
        $sql = "SELECT o.*, p.name AS product_name 
                FROM orders o 
                JOIN product p ON o.product_id = p.product_id  -- Sửa lại đây
                WHERE o.user_id = :user_id
                ORDER BY o.created_at DESC";
        
        $params = [':user_id' => $userId]; // Đảm bảo bạn truyền giá trị đúng
        return database::getInstance()->getAll($sql, $params);
    }
    
    
    
}

?>
