<?php
    class CartController {
     
        private $productModel;

        // Khoi tao
        public function __construct() { // Fixed constructor name
            require_once('../frontend/model/m_product.php');
            $this->productModel = new ProductModel();
        }

        // tạo trang chủ
        public function addCart($id, $quantity = 1){
            $product = $this->productModel->GetProductById($id);
            $product['quantity'] = $quantity;

            // Kiểm tra nếu session giỏ hàng đã tồn tại
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = []; // Khởi tạo giỏ hàng nếu chưa tồn tại
            }
        
            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                $product['quantity']=$quantity;
                $_SESSION['cart'][$id] = $product; // Thêm sản phẩm mới
            }

            include_once "view/cartmenu.php";
            include_once "view/cart.php";
        }

        public function updateCart($id, $quantity){
            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
            include_once "view/cartmenu.php";
            include_once "view/cart.php";
        }

        public function deleteCart($id)
        {
            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng, sản phẩm cần xóa có trong giỏ hàng
            if (isset($_SESSION['cart'][$id])) {
                // Xóa phần tử khỏi mảng
                unset($_SESSION['cart'][$id]);
            }
            include_once "view/cartmenu.php";
            include_once "view/cart.php";
        }
        public function renderCart(){
            include_once "view/cartmenu.php";
            include_once "view/cart.php";
        }
        
    }
?>
