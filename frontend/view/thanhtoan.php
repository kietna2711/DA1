
<link rel="stylesheet" href="../public/user/css/thanhtoan.css">
<form action="?page=payment" method="POST">
<div class="container">
    <!-- Left Section: Shipping Information -->
    <?php $user = isset($_SESSION['user']) ? $_SESSION['user'] : []; ?>
    <div class="left-section">
        <div class="breadcrumb">
            <a href="#">Giỏ hàng</a> > <span>Thông tin giao hàng</span>
        </div>
        <h2>Thông tin giao hàng</h2>

            <label for="name">Họ và tên</label>
            <input type="text" name="name" id="name" value="<?= isset($user['name']) ? $user['name'] : '' ?>" placeholder="Nhập họ và tên" required>

            <div class="contact-group">
                <input type="email" name="email" id="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>" placeholder="Email" required>
                <input type="text" name="phone" id="phone" value="<?= isset($user['phone']) ? $user['phone'] : '' ?>" placeholder="Số điện thoại" required>
            </div>

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" value="<?= isset($user['address']) ? $user['address'] : '' ?>"  placeholder="Nhập địa chỉ" required>

            <div class="address-group">
                <select id="province" name="province" required>
                    <option>Chọn tỉnh / thành</option>
                </select>
                <select id="district" name="district" required>
                    <option>Chọn quận / huyện</option>
                </select>
                <select id="ward" name="ward" required>
                    <option>Chọn phường / xã</option>
                </select>
            </div>

            <h3>Phương thức vận chuyển</h3>
            <div class="shipping-method">
                <img src="./../public/user/img/Remove-bg.ai_1731231198757.png" alt="Shipping Icon">
                <p>Vui lòng chọn tỉnh / thành để có danh sách phương thức vận chuyển.</p>
            </div>

            <h3>Phương thức thanh toán</h3>
            <div class="payment-method">
                <input type="radio" id="cod" name="payment" checked>
                <label for="cod">Thanh toán khi giao hàng (COD)</label>
            </div>
            <div class="cart-complete-section">
                <a href="?page=cart" class="cart-link">Giỏ hàng</a>
                <button type="submit" class="btn-complete-order">Hoàn tất đơn hàng</button>
            </div>
    </div>

    <!-- Right Section: Order Summary -->
    <div class="order-summary">
        <h3>Giỏ hàng</h3>
        <?php $total_item = $total = 0; ?>
        <?php foreach($_SESSION['cart'] as $p){ ?>
            <div class="order-item">
                <img src="../public/user/img/<?=$p['image1']?>" alt="Product Image">
                <span class="order-item-name">
                    <p><?=$p['name']?></p>
                    <p><?=$p['quantity']?> x <?= number_format($p['price'])?> đ</p>
                </span>
                <?php $total_item = $p['quantity'] * $p['price']; $total = $total + $total_item; ?>
                <span class="order-item-price"><?= number_format($total_item)?> đ</span>
            </div>
        <?php } ?>
        <?php
            if(isset($_SESSION['discount'])) {
                $discount = $_SESSION['discount'];
                $discount_amount = isset($_SESSION['discount']['discount_amount']) ? intval($_SESSION['discount']['discount_amount']) : 0;
                $discount_code = isset($_SESSION['discount']['code']) ? $_SESSION['discount']['code'] : '';

            }
        ?>
        <?php if(isset($discount_code)) : ?>
            <p>Mã giảm giá : <?= $discount_code ?> (<?= $discount_amount ?> %)  <a href="?page=remove-discount" style="margin-left: 20px">Xóa</a></p>
        <?php endif; ?>
        <div class="discount-section">
            <input type="text" placeholder="Mã giảm giá" value="" class="discount_code">
            <button type="button" class="apply_discount_code">Sử dụng</button>
        </div>
        <?php if(empty($user)) : ?>
        <div class="loyalty-login-section">
            <span>Chương trình khách hàng thân thiết</span>
            <a href="?page=loginpage"><button class="login-button">Đăng nhập</button></a>
        </div>
        <?php endif; ?>

        <div class="summary-section">
            <div>
                <span>Tạm tính</span>
                <span><?= number_format($total) ?>₫</span>
            </div>
            <div>
                <span>Phí vận chuyển</span>
                <span>-</span>
            </div>
        </div>
        <?php
            if (isset($discount_amount)) {
                // Tính số tiền giảm
                $so_tien_giam = $total * ($discount_amount / 100);

                // Tính số tiền còn lại
                $so_tien_con_lai = $total - $so_tien_giam;
                // Số tiền hiển thị
                $total = isset($so_tien_con_lai) ? $so_tien_con_lai : $total;
            }
            
        ?>
        <div class="total">
            <input type="hidden" value="<?= $total ?>" name="total" >
            Thanh toán : <?= number_format($total) ?>₫
        </div>
    </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
   const locations = {
    "provinces": [
        {
            "name": "Hà Nội",
            "districts": [
                {
                    "name": "Quận Ba Đình",
                    "wards": ["Phường Phúc Xá", "Phường Trúc Bạch", "Phường Vĩnh Phúc"]
                },
                {
                    "name": "Quận Hoàn Kiếm",
                    "wards": ["Phường Chương Dương", "Phường Cửa Đông", "Phường Đồng Xuân"]
                }
            ]
        },
        {
            "name": "TP Hồ Chí Minh",
            "districts": [
                {
                    "name": "Quận 1",
                    "wards": ["Phường Bến Nghé", "Phường Bến Thành", "Phường Cầu Kho"]
                },
                {
                    "name": "Quận 2",
                    "wards": ["Phường An Lợi Đông", "Phường An Phú", "Phường Bình Khánh"]
                }
            ]
        },
        {
            "name": "Đà Nẵng",
            "districts": [
                {
                    "name": "Quận Hải Châu",
                    "wards": ["Phường Thạch Thang", "Phường Thuận Phước", "Phường Nam Dương"]
                },
                {
                    "name": "Quận Thanh Khê",
                    "wards": ["Phường An Khê", "Phường Chính Gián", "Phường Thạc Gián"]
                }
            ]
        },
    ]
};
const shippingFees = {
    "Quận 1": 30000,
    "Quận 2": 35000,
    "Quận 3": 30000,
    "Quận 4": 30000,
    "Quận 5": 32000,
    "Quận 6": 32000,
    "Quận 7": 35000,
    "Quận 8": 35000,
    "Quận 9": 40000,
    "Quận 10": 30000,
    "Quận 11": 30000,
    "Quận 12": 40000,
    "Quận Bình Tân": 40000,
    "Quận Bình Thạnh": 30000,
    "Quận Gò Vấp": 35000,
    "Quận Phú Nhuận": 30000,
    "Quận Tân Bình": 30000,
    "Quận Tân Phú": 35000,
    "Quận Thủ Đức": 40000,
    "Huyện Bình Chánh": 45000,
    "Huyện Cần Giờ": 60000,
    "Huyện Củ Chi": 50000,
    "Huyện Hóc Môn": 45000,
    "Huyện Nhà Bè": 40000
};



    const provinceSelect = document.getElementById('province');
    const districtSelect = document.getElementById('district');
    const wardSelect = document.getElementById('ward');

    function populateProvinces() {
        locations.provinces.forEach(province => {
            const option = document.createElement('option');
            option.value = province.name;
            option.textContent = province.name;
            provinceSelect.appendChild(option);
        });
    }
    function calculateShippingFee() {
    const selectedDistrict = districtSelect.value;
    const shippingFee = shippingFees[selectedDistrict] || 0;

    document.querySelector('.summary-section').innerHTML = `
        <div>
            <span>Tạm tính</span>
            <span>${Number(<?= $total ?>).toLocaleString()}₫</span>
        </div>
        <div>
            <span>Phí vận chuyển</span>
            <span>${shippingFee.toLocaleString()}₫</span>
        </div>
    `;

    const totalPayment = <?= $total ?> + shippingFee;
    document.querySelector('.total').innerHTML = `Thanh toán : ${totalPayment.toLocaleString()}₫`;

    document.querySelector('input[name="total"]').value = totalPayment;
}

districtSelect.addEventListener('change', calculateShippingFee);
document.addEventListener('DOMContentLoaded', calculateShippingFee);


    function populateDistricts() {
        districtSelect.innerHTML = '<option>Chọn quận / huyện</option>';
        wardSelect.innerHTML = '<option>Chọn phường / xã</option>';
        const selectedProvince = locations.provinces.find(prov => prov.name === provinceSelect.value);
        if (selectedProvince) {
            selectedProvince.districts.forEach(district => {
                const option = document.createElement('option');
                option.value = district.name;
                option.textContent = district.name;
                districtSelect.appendChild(option);
            });
        }
    }

    function populateWards() {
        wardSelect.innerHTML = '<option>Chọn phường / xã</option>';
        const selectedProvince = locations.provinces.find(prov => prov.name === provinceSelect.value);
        const selectedDistrict = selectedProvince ? selectedProvince.districts.find(dist => dist.name === districtSelect.value) : null;
        if (selectedDistrict) {
            selectedDistrict.wards.forEach(ward => {
                const option = document.createElement('option');
                option.value = ward;
                option.textContent = ward;
                wardSelect.appendChild(option);
            });
        }
    }

    provinceSelect.addEventListener('change', populateDistricts);
    districtSelect.addEventListener('change', populateWards);

    populateProvinces();
    $(function () {
        $('.apply_discount_code').click(function () {
            var discount_code = $('.discount_code').val();

            const url = window.location.href;
            const indexOfQuestionMark = url.indexOf('?');
            const baseURL = url.substring(0, indexOfQuestionMark);
            var link = baseURL + "?page=discount&discount_code=" + discount_code;
            window.location.href = link;
        })
    })
</script>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer-master/src/Exception.php';
require '../vendor/PHPMailer-master/src/PHPMailer.php';
require '../vendor/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
$orderDetails = '';
foreach ($_SESSION['cart'] as $item) {
    $itemTotal = $item['quantity'] * $item['price'];
    $orderDetails .= "
        <tr>
            <td>{$item['name']}</td>
            <td>{$item['quantity']}</td>
            <td>" . number_format($item['price']) . "₫</td>
            <td>" . number_format($itemTotal) . "₫</td>
        </tr>
    ";
}

// Tính tổng tiền và các chi phí khác
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['quantity'] * $item['price'];
}

// Nếu có giảm giá
if (isset($_SESSION['discount']['discount_amount'])) {
    $discountAmount = $total * ($_SESSION['discount']['discount_amount'] / 100);
    $total -= $discountAmount;
} else {
    $discountAmount = 0;
}

// Nếu có phí vận chuyển
$shippingFee = isset($shippingFee) ? $shippingFee : 0;
$total += $shippingFee;
try {
    $mail->isSMTP();  // Chỉ định rằng PHPMailer sẽ sử dụng giao thức SMTP để gửi email
    $mail->Host = 'smtp.gmail.com';  // Máy chủ SMTP của Gmail
    $mail->SMTPAuth = true;  // Bật xác thực SMTP
    $mail->Username = 'nvk1662005@gmail.com';  // Tài khoản email Gmail của bạn
    $mail->Password = 'eobv qchw oqjk kbnk';  // Mật khẩu ứng dụng (không phải mật khẩu tài khoản Gmail chính)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Sử dụng mã hóa SSL
    $mail->Port = 465;  // Cổng SMTP, có thể dùng 465 cho SSL hoặc 587 cho TLS
      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nvk1662005@gmail.com', 'Shop');
    $mail->addAddress('kietnvps41026@gmail.com', 'Van Kiet');
    $mail->addAddress('khaihuynh089@gmail.com', 'Van Khai');
    $mail->addAddress('phamlcps41044@gmail.com', 'Pham Ne');       //Add a recipient
    // $mail->addAddress('ellen@example.com');  // thêm nhiều người nhận             //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = "
    <h1>Cảm ơn bạn đã đặt hàng tại Shop chúng tôi!</h1>
    <p>Thông tin khách hàng:</p>
    <ul>
        <li><strong>Họ và tên:</strong> " . (isset($_POST['name']) ? $_POST['name'] : '') . "</li>
        <li><strong>Email:</strong> " . (isset($_POST['email']) ? $_POST['email'] : '') . "</li>
        <li><strong>Số điện thoại:</strong> " . (isset($_POST['phone']) ? $_POST['phone'] : '') . "</li>
        <li><strong>Địa chỉ:</strong> " . (isset($_POST['address']) ? $_POST['address'] : '') . ", " . (isset($_POST['ward']) ? $_POST['ward'] : '') . ", " . (isset($_POST['district']) ? $_POST['district'] : '') . ", " . (isset($_POST['province']) ? $_POST['province'] : '') . "</li>
    </ul>
    <h2>Chi tiết đơn hàng:</h2>
    <table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>   
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            {$orderDetails}
        </tbody>
        <tfoot>
            <tr>
                <td colspan='3'><strong>Giảm giá:</strong></td>
                <td>" . number_format($discountAmount) . "₫</td>
            </tr>
            <tr>
                <td colspan='3'><strong>Phí vận chuyển:</strong></td>
                <td>" . number_format($shippingFee) . "₫</td>
            </tr>
            <tr>
                <td colspan='3'><strong>Tổng thanh toán:</strong></td>
                <td>" . number_format($total) . "₫</td>
            </tr>
        </tfoot>
    </table>
    <p>Một lần nữa, cảm ơn bạn đã mua sắm tại Shop chúng tôi!</p>
";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mail đã được g';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>


