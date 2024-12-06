<?php
    class ProductController {
     
        private $productModel;
        private $categoryModel;
        private $discountModel;

        // Khoi tao
        public function __construct() { // Fixed constructor name
            require_once('../frontend/model/m_product.php');
            require_once('../frontend/model/m_category.php');
            require_once('../frontend/model/m_discount.php');
            $this->productModel = new ProductModel();
            $this->categoryModel = new CategoryModel(); // Fixed property assignment
            $this->discountModel = new DiscountModel(); // Khởi tạo mô hình giảm giá
        }

        // tạo trang chủ
        public function trangchu($id) {
            if($id){
                $nhomsanpham = $this->productModel->getHotDanhmuc($id);
            }else{
                $nhomsanpham = $this->productModel->getAllProduct();
            }
            $sanphamhot = $this->productModel->getHotProduct(); 
            $blog = $this->productModel->getAllBlog(); 
            $categories =$this->categoryModel->getAllCate();
            $discounts = $this->discountModel->getAllDiscounts(); 
            // print_r($categories); // Debug output
            include_once "view/header.php";
            include_once "view/home.php";
            include_once "view/footer.php";
        }

        // tạo trang sản phẩm
       // Giả sử phương thức `nhomsanpham` trong Controller của bạn
public function nhomsanpham($id) {
    $search = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ query string

    // Nếu có từ khóa tìm kiếm, tìm sản phẩm theo từ khóa
    if ($search) {
        $nhomsanpham = $this->productModel->searchProducts($search); // Tìm kiếm trong model
    } else {
        $nhomsanpham = $id ? $this->productModel->getHotDanhmuc($id) : $this->productModel->getAllProduct();
    }

    $categories = $this->categoryModel->getAllCate();
    
    // Trả về view với dữ liệu tìm kiếm
    include_once "view/menu.php";
    include_once "view/nhomsanpham.php";
    include_once "view/footer.php";
}

        

        public function tintucnoibat() {
            include_once "view/menu.php";
            include_once "view/tintucnoibat.php";
            include_once "view/footer.php";
        }

        public function gioithieu() {

            $blog = $this->productModel->getAllBLog();

            include_once "view/menugioithieu.php";
            include_once "view/gioithieu.php";
            include_once "view/footer.php";
        }

        public function lienhe() {
            include_once "view/cartmenu.php";
            include_once "view/lienhe.php";
            include_once "view/footer.php";
        }
        
        public function thanhtoan() {
            include_once "view/menu.php";
            include_once "view/thanhtoan.php";
            include_once "view/footer.php";
        }
        // tạo trang chi tiết
        public function renderDetail($id) {
            // Lấy thông tin sản phẩm
            $product = $this->productModel->GetProductById($id);
            $relateProduct = $this->productModel->GetRelateProduct($id);
        
            // Bắt đầu session
        
            // Nếu chưa có mảng 'recentlyViewed' thì khởi tạo
            if (!isset($_SESSION['recentlyViewed'])) {
                $_SESSION['recentlyViewed'] = [];
            }
        
            // Kiểm tra nếu sản phẩm chưa có trong danh sách đã xem thì thêm vào
            if (!in_array($id, $_SESSION['recentlyViewed'])) {
                $_SESSION['recentlyViewed'][] = $id;
            }
        
            // Giới hạn danh sách sản phẩm đã xem tối đa 5 sản phẩm
            $_SESSION['recentlyViewed'] = array_slice($_SESSION['recentlyViewed'], -5);
        
            include_once "view/menu.php";
            include_once "view/chitietsp.php";
            // include_once "view/footer.php";
        }
        
 
       
        
    }
?>
