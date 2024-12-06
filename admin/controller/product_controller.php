<?php
   class ProductController {

    private $ProductModel;

    // Khởi tạo đối tượng
    public function __construct() {
        require_once('../frontend/model/m_products.php');
        $this->productModel = new ProductModel();
    }

    // trang danh mucj
    public function renderProduct() {
        $products = $this->productModel->getAllProduct();
        // print_r($products);
        require_once('../admin/view/v_product.php');
    }

    // Thêm mới danh mục
    public function renderAddProduct() {
        require_once('../admin/view/add-product.php');
    }

    public function addProduct($data) {
        // Validate and handle file uploads
        $category_id = $_POST['category_id'] ?? null;

        if (!$category_id) {
            echo "Category ID is missing.";
            return;
        }
        
        // Prepare the data array
        $productData = [
            'category_id' => $category_id,
            'price' => $_POST['price'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'hot' => $_POST['hot'],
            'quantity' => $_POST['quantity'],
            'sold' => $_POST['sold'],
            'image1' => $_FILES['image1']['name'],
            'image2' => $_FILES['image2']['name']
        ];
        
    
        // Add product
        $this->productModel->addProduct($productData);
        header('Location: index.php?page=product');
    }
    

    // Sửa danh mục
    public function renderEditProduct($id) {
        // Lấy thông tin sản phẩm theo ID
        $product = $this->productModel->getProductById($id);
        require_once('../admin/view/edit-product.php');
    }

    public function editProduct($data) {
        // print_r($data);
        // die();
        // Lấy ID sản phẩm từ form
        $productId = $data['product_id'];
        $category_id = $data['category_id'];
        $price = $data['price'];
        $name = $data['name'];
        $description = $data['description'];
        $hot = $data['hot'];
        
        // Xử lý upload hình ảnh, kiểm tra nếu có file mới
        $image1 = $data['image1'] ?? null; // Hình ảnh 1
        $image2 = $data['image2'] ?? null; // Hình ảnh 2
    
        // Kiểm tra nếu có hình ảnh mới được upload
        if (!empty($_FILES['image1']['name'])) {
            $image1 = $_FILES['image1']['name'];
            move_uploaded_file($_FILES['image1']['tmp_name'], "../public/user/img/" . $image1);
        } else {
            $image1 = $data['image1']; // Nếu không upload file mới, dùng ảnh cũ
        }
        
        if (!empty($_FILES['image2']['name'])) {
            $image2 = $_FILES['image2']['name'];
            move_uploaded_file($_FILES['image2']['tmp_name'], "../public/user/img/" . $image2);
        } else {
            $image2 = $data['image2'];
        }
        
    
        // Chuẩn bị dữ liệu để cập nhật
        $productData = [
            'product_id' => $productId,
            'category_id' => $category_id,
            'price' => $price,
            'name' => $name,
            'description' => $description,
            'hot' => $hot,
            'image1' => $image1,
            'image2' => $image2
        ];
        // print_r($_FILES);
        // die();
        // Gọi model để cập nhật sản phẩm
        $this->productModel->editProduct($productData);
        header('Location: index.php?page=product');
    }
    

    // Chuyển đổi trạng thái ẩn/hiện
    public function toggleVisibilityProduct($id) {
        // Gọi phương thức model để chuyển đổi trạng thái
        $this->productModel->toggleProductVisibility($id);
        
        // Sau khi thay đổi trạng thái, chuyển hướng về trang danh sách sản phẩm
        header('Location: index.php?page=product');
        exit();
    }
    
    
    
}

?>
