    <?php 
        require_once('../frontend/model/m_database.php');
        class productModel{
            // lấy tấy cả sản phẩm
            public function getAllProduct(){
                $sql="SELECT * FROM product";
                return database::getInstance()->getAll($sql);
            }
            // laay blog
            public function getAllBLog(){
                $sql="SELECT * FROM blog_post";
                return database::getInstance()->getAll($sql);
            }   
            // lay san pham hot
            public function getHotProduct(){
                $sql = "SELECT * FROM product WHERE (hot = 1 OR hot = 2) AND is_hidden = 0"; // Thêm kiểm tra hot = 2
                return database::getInstance()->getAll($sql);
            }
            
            public function getNewProduct() {
                $sql = "SELECT * FROM product 
                        WHERE is_hidden = 0 
                        ORDER BY product_id DESC LIMIT 6"; // Lấy 8 sản phẩm mới nhất dựa trên product_id
                return database::getInstance()->getAll($sql);
            }
            
            
            public function getHotDanhmuc($id){
                $sql = "SELECT * FROM product WHERE category_id = $id AND is_hidden = 0"; // Thêm kiểm tra ẩn/hiện
                return database::getInstance()->getAll($sql);
            }
            // lay san pham theo id
            public function GetProductById($id){
                $sql="SELECT * FROM product where product_id=$id";
                return database::getInstance()->getOne($sql);
            }
            // lay sản phẩm liên quan
            public function getRelateProduct($id){
                $sql = "SELECT * FROM product WHERE category_id = (SELECT category_id FROM product WHERE product_id = $id) 
                        AND product_id != $id AND is_hidden = 0"; // Thêm kiểm tra ẩn/hiện
                return database::getInstance()->getAll($sql);
            }
            
            // lấy sản phẩm đã xem
            public function getProductsByIds($ids) {
                // Chuyển đổi các ID thành chuỗi số nguyên và nối lại với dấu phẩy
                $ids = implode(',', array_map('intval', $ids));  // Chuyển tất cả ID thành số nguyên
                $sql = "SELECT * FROM product WHERE product_id IN ($ids)";
                return database::getInstance()->getAll($sql);
            }
            
        }

    ?>