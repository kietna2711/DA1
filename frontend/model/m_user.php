<?php 
        require_once('../frontend/model/m_database.php');
        class UserModel{
            public function getUser($data) {
                $sql = "SELECT * FROM User WHERE email = :email AND password = :password";
                $params = [
                    ':email' => $data['email'],
                    ':password' => $data['password']
                ];
                return database::getInstance()->getOne($sql, $params);  // Truyền tham số vào phương thức getOne
            }
            
            
            public function addUser($data) {
                // print_r($data);
            
                // Check email existence
                $checkEmailSql = "SELECT * FROM User WHERE email = :email";
                $emailExists = database::getInstance()->getOne($checkEmailSql, [':email' => $data['email']]);
                
                if ($emailExists) {
                    return "EMAIL_EXISTS";
                }
            
                // Insert user into database
                $sql = "INSERT INTO User (email, password, name) VALUES (:email, :password, :name)";
                $params = [
                    ':email' => $data['email'],
                    ':password' => $data['password'],
                    ':name' => $data['name']
                ];
                return database::getInstance()->execute($sql, $params);
            }
            
            
            public function getAllUser(){
                $sql = "SELECT * FROM User";
                return database::getInstance()->getAll($sql);  // Lấy tất cả các user từ database
            }
            public function deleteUserById($id) {
                $sql = "DELETE FROM User WHERE user_id = :id";
                $params = [':id' => $id];
                return database::getInstance()->execute($sql, $params);
            }
            
            
                     
        }
?>