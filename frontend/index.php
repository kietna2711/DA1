<?php
session_start();

// Xử lý các page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page) {
    case 'home':
        $id = isset($_GET['id']) ? $_GET['id'] : null; 
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->trangchu($id);
        break;

    case 'nhomsanpham':
        $id = isset($_GET['id']) ? $_GET['id'] : null; // Retrieve the category ID
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->nhomsanpham($id); // Pass the ID to the method
        break;

    // case 'sphot':
    //     require_once('../frontend/controller/pro_controller.php');
    //     $productcontroller = new ProductController();
    //     $productcontroller->sanphamhot();
    //     break;

    case 'tintucnoibat':
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->tintucnoibat();
        break;

    case 'gioithieu':
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->gioithieu();
        break;

    case 'lienhe':
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->lienhe();
        break;

    case 'trangchitiet':
        $id = $_GET['id'];
        require_once('../frontend/controller/pro_controller.php');
        $productcontroller = new ProductController();
        $productcontroller->renderDetail($id);
        break;

        case"addcart":
            $id=isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
            $quantity= isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            require_once('../frontend/controller/cart_controller.php');
            $cartController = new  CartController();
            $cartController->addCart($id, $quantity);
        break;
        case"updatecart":

            $id= $_GET['id'];
            $quantity= $_GET['quantity'];

            require_once('../frontend/controller/cart_controller.php');
            $cartController = new  CartController();
            $cartController->updateCart($id, $quantity);
            break;
        case"deletecart":

            $id= $_GET['id'];
            require_once('../frontend/controller/cart_controller.php');
            $cartController = new  CartController();
            $cartController->deleteCart($id);
            break;
        case"cart":
            require_once('../frontend/controller/cart_controller.php');
            $cartController = new  CartController();
            $cartController->renderCart();
            break;
    case 'updateQuantity':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['product_id'] ?? null;
        $quantity = $data['quantity'] ?? null;

        require_once('../frontend/controller/cart_controller.php');
        $cartController = new CartController();
        $cartController->updateQuantity($id, $quantity);
        break;
// đ
    case "loginpage":
        require_once('../frontend/controller/user_controller.php');
        $userController = new UserController();
        $userController->renderLogin();
        break;

    case "login":
        $data = $_POST;
        require_once('../frontend/controller/user_controller.php');
        $userController = new UserController();
        if (isset($data['sign_in'])) {
            $userController->login($data);
        } elseif (isset($data['sign_up'])) {
            $userController->register($data);
        }
        break;

    case "logout":
        require_once('../frontend/controller/user_controller.php');
        $userController = new UserController();
        $userController->logout();
        break;

        case"thanhtoan":
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                $_SESSION['message_alert'] = "Không có sản phẩm trong giỏ hàng";
                header("location:?page=home");
            }
            require_once('../frontend/controller/payment_controller.php');
            $paymentController = new PaymentController();
            $paymentController->loadPayment();
            break;
        case "payment":
            require_once('../frontend/controller/payment_controller.php');
            $paymentController = new PaymentController();
            $paymentController->postPayment();
            break;

        case "discount":
            require_once('../frontend/controller/payment_controller.php');
            $paymentController = new PaymentController();
            $paymentController->getDiscountCode();
            break;
        case "remove-discount":
            require_once('../frontend/controller/payment_controller.php');
            $paymentController = new PaymentController();
            $paymentController->removeDiscountCode();
            break;
        
    default:
        echo "Không tồn tại trang này.";
        break;
}
?>
