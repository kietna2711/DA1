<?php 
        require_once('../frontend/model/m_database.php');
        class ThanhtoanModel{
            public function saveOrder($data) {
                $db = database::getInstance();
                $sql = "INSERT INTO orders (name, email, phone, address, province, district, ward, payment, created_at) 
                        VALUES (:name, :email, :phone, :address, :province, :district, :ward, :payment, NOW())";
                $params = [
                    ':name' => $data['name'],
                    ':email' => $data['email'],
                    ':phone' => $data['phone'],
                    ':address' => $data['address'],
                    ':province' => $data['province'],
                    ':district' => $data['district'],
                    ':ward' => $data['ward'],
                    ':payment' => $data['payment']
                ];
                return $db->execute($sql, $params);
            }
            public function getAllOrders() {
                $db = database::getInstance();
                $sql = "SELECT * FROM orders ORDER BY created_at DESC";
                return $db->getAll($sql);
            }
            
         
                     
        }
?>