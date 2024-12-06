<?php
require_once('../frontend/model/m_database.php');

class CategoryModel {
    // Lấy tất cả danh mục, hoặc chỉ lấy danh mục không bị ẩn
    public function getAllCate($showHidden = false) {
        $sql = $showHidden ? "SELECT * FROM category" : "SELECT * FROM category WHERE is_hidden = 0";
        return database::getInstance()->getAll($sql);
    }

    public function addCategory($data) {
        $sql = "INSERT INTO category(category_name, description, image_url) VALUES (?, ?, ?)";
        $params = array_values($data);
        return database::getInstance()->execute($sql, $params);
    }

    public function getCategoryById($id) {
        $sql = "SELECT * FROM category WHERE category_id = ?";
        return database::getInstance()->getOne($sql, [$id]); // Pass $id as an array
    }

    public function editCategory($data) {
        if (!empty($data['image_url'])) {
            $sql = "UPDATE category SET category_name = ?, description = ?, image_url = ? WHERE category_id = ?";
            $params = [
                $data['category_name'],
                $data['description'],
                $data['image_url'],
                $data['category_id']
            ];
        } else {
            $sql = "UPDATE category SET category_name = ?, description = ? WHERE category_id = ?";
            $params = [
                $data['category_name'],
                $data['description'],
                $data['category_id']
            ];
        }
        return database::getInstance()->execute($sql, $params);
    }
    

    public function toggleCategoryVisibility($id, $hidden) {
        $sql = "UPDATE category SET is_hidden = ? WHERE category_id = ?";
        return database::getInstance()->execute($sql, [$hidden, $id]);
    }
}
?>
