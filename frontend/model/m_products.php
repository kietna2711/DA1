<?php
    require_once('../frontend/model/m_database.php');

    class ProductModel {
        // Lấy tất cả sản phẩm
        public function getAllProduct() {
            $sql = "SELECT * FROM product WHERE is_hidden = 0"; // Lọc sản phẩm không ẩn
            return database::getInstance()->getAll($sql);  // Lấy tất cả các sản phẩm không ẩn từ database
        }
        
        public function addProduct($data) {
            $sql = "INSERT INTO product (category_id, price, name, description, hot, quantity, sold, image1, image2) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = array_values($data); 
            return database::getInstance()->execute($sql, $params);
        }
              
        public function getProductById($id){
            $sql="SELECT * FROM product where product_id=$id";
            return database::getInstance()->getOne($sql);
        }
      
        public function editProduct($data) {
            $sql = "UPDATE product SET 
                        name = ?, 
                        description = ?, 
                        price = ?, 
                        category_id = ?, 
                        hot = ?, 
                        image1 = IFNULL(?, image1),  -- Giữ ảnh cũ nếu không có ảnh mới
                        image2 = IFNULL(?, image2)   -- Giữ ảnh cũ nếu không có ảnh mới
                    WHERE product_id = ?";
            
            $params = [
                $data['name'], 
                $data['description'], 
                $data['price'], 
                $data['category_id'], 
                $data['hot'], 
                $data['image1'], // Có thể null
                $data['image2'], // Có thể null
                $data['product_id']
            ];
            return database::getInstance()->execute($sql, $params);
        }
        
        public function toggleProductVisibility($id) {
            $sql = "UPDATE product SET is_hidden = NOT is_hidden WHERE product_id = ?";
            return database::getInstance()->execute($sql, [$id]);
        }
        
        
        
    }   
?>
