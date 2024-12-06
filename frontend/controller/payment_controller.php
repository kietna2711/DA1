<?php

class PaymentController {

    private $transactionModel;
    private $ordersModel;
    private $discountModel;

    public function __construct()
    {
        require_once('../frontend/model/m_transaction.php');
        require_once('../frontend/model/m_orders.php');
        require_once('../frontend/model/m_discount.php');
        


        $this->transactionModel = new TransactionModel();
        $this->ordersModel = new OrderModel();
        $this->discountModel = new DiscountModel();
    }

    // Load dữ liệu payment
    public function loadPayment()
    {
        include_once "view/thanhtoanmenu.php";
        include_once "view/thanhtoan.php";
    }
    // Thực hiện lưu thông tin thanh toán
    public function postPayment()
    {
        $data = [];
        $data['user_id'] = isset($_SESSION['user']) ? $_SESSION['user']['user_id'] : null;
        $data['name'] = $_POST['name'] ?? '';
        $data['phone'] = $_POST['phone'] ?? '';
        $data['address'] = $_POST['address'] ?? '';
        $data['total'] = $_POST['total'] ?? '';
        $data['discount_code'] = isset($_SESSION['discount']) ? $_SESSION['discount']['code'] : null;
        $data['discount_amount'] = isset($_SESSION['discount']) ? $_SESSION['discount']['discount_amount'] : null;
        $data['status'] = 2;
        $data['province'] = $_POST['province'] ?? '';
        $data['district'] = $_POST['district'] ?? '';
        $data['ward'] = $_POST['ward'] ?? '';
        $data['payment'] = $_POST['payment'] ?? '';
        $data['shipping_method'] = null;
        $data['created_at'] = date('Y-m-d H:i');

        try {
            $transaction = $this->transactionModel->addTransaction($data);

            foreach($_SESSION['cart'] as $cart)
            {
                $data = [
                    "transaction_id" => $transaction,
                    "product_id" => $cart['product_id'],
                    "qty" => $cart['quantity'],
                    "price" => $cart['price'],
                ];

                $this->ordersModel->addOrder($data);
            }
            $_SESSION['message_alert'] = "Đặt hàng thành công";
            unset($_SESSION['cart']);
            unset($_SESSION['discount']);
        } catch (\Exception $exception) {
            $_SESSION['message_alert'] = "Đã xảy ra lỗi không thể đặt hàng";
        }
        header("location:?page=home");
    }
    // Áp dụng mã giảm giá
    public function getDiscountCode()
    {
        $code = $_GET['discount_code'];
        $discount = $this->discountModel->getDiscountByCode($code);

        if($this->is_time_within_range($discount['start_date'], $discount['expiration_date'])) {
            $_SESSION['discount'] = $discount;
        } else {
            $_SESSION['message_alert'] = "Mã giảm giá không hợp lệ";
        }
        include_once "view/thanhtoanmenu.php";
        include_once "view/thanhtoan.php";
    }

    // kiêm tra mã giảm giá có hợp lệ hay không
    function is_time_within_range($start_date, $end_date) {
        // Chuyển đổi các chuỗi ngày thành timestamp nếu cần
        if (is_string($start_date)) {
            $start_timestamp = strtotime($start_date);
        } else {
            $start_timestamp = $start_date;
        }

        if (is_string($end_date)) {
            $end_timestamp = strtotime($end_date);
        } else {
            $end_timestamp = $end_date;
        }

        // Lấy timestamp hiện tại
        $current_timestamp = time();

        // Kiểm tra xem thời gian hiện tại có nằm trong khoảng không
        return ($current_timestamp >= $start_timestamp && $current_timestamp <= $end_timestamp);
    }

    public function removeDiscountCode()
    {
        unset($_SESSION['discount']);
        include_once "view/thanhtoanmenu.php";
        include_once "view/thanhtoan.php";
    }
  
    


}
?>