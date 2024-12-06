<?php
    session_start();
    if(!isset($_SESSION['user']['vaitro']) || $_SESSION['user']['vaitro'] != 1) {
        header('location: ../frontend/index.php?page=loginpage');
        exit;
    }

    require_once('../admin/view/t_header.php');
    require_once('../admin/controller/admin_controller.php');
    require_once('../admin/controller/product_controller.php');
    require_once('../admin/controller/user_controller.php');
    require_once('../admin/controller/admin_discount_controller.php'); // Thêm yêu cầu ProductController

    $categorycontroller = new CategoryController();
    $productcontroller = new ProductController();
    $usercontroller = new UserController();
    $discountController = new DiscountController(); // Khởi tạo đối tượng ProductController

    $page = $_GET['page'] ?? 'home';
    switch ($page) {
        case 'home':
            require_once('../admin/view/v_home.php');
            break;
        case 'category':
            $categorycontroller->renderCategory();
            break;
        case 'showaddcate':
            $categorycontroller->renderAddCategory();
            break;
        case 'addcate':
            $data = $_POST;
            if (isset($_FILES['image_url'])) {
                $data['image_url'] = $_FILES['image_url']['name'];
                move_uploaded_file($_FILES['image_url']['tmp_name'], "../public/user/img/" . $_FILES['image_url']['name']);
            }
            $categorycontroller->addCategory($data);
            break;
        case "showeditcate":
            $id = $_GET['id'];
            $categorycontroller->renderEditCate($id);
            break;
        case "editcate":
            $data = $_POST;
            if (isset($_FILES['image_url'])) {
                $data['image_url'] = $_FILES['image_url']['name'];
                move_uploaded_file($_FILES['image_url']['tmp_name'], "../public/user/img/" . $_FILES['image_url']['name']);
            }
            $categorycontroller->editCategory($data);
            break;
            case 'toggleVisibility':
                if (isset($_GET['id']) && isset($_GET['hidden'])) {
                    $categoryId = $_GET['id'];
                    $hidden = $_GET['hidden'];
                    $categorycontroller->toggleCategoryVisibility($categoryId, $hidden);  // Gọi phương thức để thay đổi trạng thái
                    echo "Trạng thái danh mục đã được cập nhật.";  // Hoặc trả về thông báo thành công
                }
                break;
        // Sản phẩm
        case'product':
            $productcontroller->renderProduct();
            break;
        case'showaddproduct':
            $productcontroller->renderAddProduct();
            break;
        case'addproduct':
           $data=$_POST;
            $data['image1']=$_FILES['image1']['name'];
            $data['image2']=$_FILES['image2']['name'];
            // print_r($data);
            move_uploaded_file($_FILES['image1']['tmp_name'], "../public/user/img/" . $_FILES['image1']['name']);
            move_uploaded_file($_FILES['image2']['tmp_name'], "../public/user/img/" . $_FILES['image2']['name']);
            $productcontroller->addProduct($data);
            break;
        case "showeditproduct":
            $id = $_GET['id'];
            $productcontroller->renderEditProduct($id);
            break;
            case "editproduct":
                $data = $_POST;
            
                // Kiểm tra và xử lý upload hình ảnh
                if (isset($_FILES['image1']['name']) && isset($_FILES['image2']['name'])) {
                    $data['image1'] = $_FILES['image1']['name'];
                    $data['image2'] = $_FILES['image2']['name'];
                    
                    move_uploaded_file($_FILES['image1']['tmp_name'], "../public/user/img/" . $_FILES['image1']['name']);
                    move_uploaded_file($_FILES['image2']['tmp_name'], "../public/user/img/" . $_FILES['image2']['name']);
                }
            
                $productcontroller->editProduct($data); // Gọi hàm editProduct trong controller
                break;
            
            
            case 'toggleVisibility':
                if (isset($_GET['id']) && isset($_GET['hidden'])) {
                    $categoryId = $_GET['id'];
                    $hidden = $_GET['hidden'];
                    $categorycontroller->toggleCategoryVisibility($categoryId, $hidden);  // Gọi phương thức để thay đổi trạng thái
                    echo "Trạng thái danh mục đã được cập nhật.";  // Hoặc trả về thông báo thành công
                }
                break;
                case 'toggleVisibilityProduct':
                    if (isset($_GET['id'])) {
                        $productId = $_GET['id'];
                        $productcontroller->toggleVisibilityProduct($productId);
                    }
                    break;
                
            
        // user
        case'user':
            $usercontroller->renderUser();
            break;
        case 'deleteuser':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $usercontroller->deleteUser($id);
            }
            break;

            case "order":
                $categorycontroller->getAllTransaction();
                break;
            case "order-detail":
                $categorycontroller->getTransactionDetail();
                break;
            case "transaction-status" :
                $categorycontroller->updateTransactionStatus();
                break;
            case "discount":
                $discountController->renderDiscount();
                break;
            case "add-discount":
                $discountController->renderAddDiscount();
                break;
    
            case "post-add-discount":
                $param = $_POST;
                $discountController->addDiscount($param);
                break;
            case "edit-discount":
                $id = $_GET['id'];
                $discountController->renderEditDiscount($id);
                break;
    
            case "post-edit-discount":
                $id = $_GET['id'];
                $param = $_POST;
                $param['discount_code_id'] = $id;
                $discountController->editDiscount($param);
                break;
            case "delete-discount":
                $id = $_GET['id'];
    
                $discountController->deleteDiscount($id);
                break;
    }

    require_once('../admin/view/t_footer.php');
?>
