<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 20px;
    }

    .breadcrumb {
        background-color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .breadcrumb a {
        color: #007bff;
        text-decoration: none;
        margin-right: 5px;
    }

    .breadcrumb span {
        color: #555;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .cart-table th, 
    .cart-table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #eee;
        font-size: 16px;
        }

    .cart-table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: 600;
    }

    .cart-table td {
        color: #555;
        font-size: 15px;
    }

    .product-info {
        display: flex;
        align-items: center;
        justify-content: start;
        text-align: left;
    }

    .product-image {
        width: 60px;
        height: 60px;
        margin-right: 15px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .product-name {
        font-size: 16px;
        color: #333;
        font-weight: 500;
    }

    .product-quantity-controls {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-btn {
        width: 32px;
        height: 32px;
        border: none;
        background-color: #e9ecef;
        color: #333;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.1s;
        border-radius: 5px;
    }

    .quantity-btn:hover {
        background-color: #dee2e6;
        transform: scale(1.05);
    }

    .quantity-input {
        width: 40px;
        text-align: center;
        border: none;
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin: 0 5px;
        background-color: #f8f9fa;
        border-radius: 4px;
    }

    .cart-total {
        text-align: right;
        padding: 20px;
        font-size: 18px;
        background-color: #fff;
        margin-top: 15px;
        border-radius: 8px;
        font-weight: bold;
        color: #333;
    }

    .checkout-btn {
        display: block;
        max-width: 200px;
        margin: 20px auto 0;
        padding: 15px;
        background-color: #ff5757;
        color: #fff;
        text-align: center;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
        text-decoration: none;
    }

    .checkout-btn:hover {
        background-color: #ff3f3f;
        transform: translateY(-2px);
    }

    .product-price,
    .product-total,
    #total-price {
        color: #ff3333;
        font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .cart-table th,
        .cart-table td {
            font-size: 14px;
            padding: 10px;
        }

        .product-image {
            width: 50px;
            height: 50px;
        }

        .quantity-btn {
            width: 28px;
            height: 28px;
            font-size: 16px;
        }

        .quantity-input {
            width: 35px;
            font-size: 14px;
        }

        .checkout-btn {
            max-width: 100%;
        }
    }
</style>

</head>
<body>
    <h1>Giỏ hàng</h1>
    <?php if(isset($_SESSION['cart'])) :?>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Thông tin sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
    
        <tbody id="cart-items">
            
            <?php $total_item = $total = 0; ?>
            <?php foreach($_SESSION['cart'] as $p){ ?>
            <tr>
                <td class="product-info">
                    <img src="../public/user/img/<?=$p['image1']?>" alt="Product Image" class="product-image">
                    <span class="product-name"><?=$p['name']?></span>
                </td>
                <td class="product-price"><?= number_format($p['price'])?> đ</td>
                <td class="product-quantity">
                    <div class="product-quantity-controls">
                        <button class="quantity-btn quantity-btn-minus">-</button>
                        <input type="hidden" class="id-input" value="<?= $p['product_id'] ?>">
                        <input type="text" class="quantity-input" value="<?=$p['quantity']?>" readonly>
                        <button class="quantity-btn quantity-btn-plus">+</button>
                    </div>
                </td>
                <?php $total_item = $p['quantity'] * $p['price']; $total = $total + $total_item; ?>
                <td class="product-total" id="product-total"> <?= number_format($total_item) ?>₫</td>
                <td><a class="btn-delete" href="?page=deletecart&id=<?= $p['product_id'] ?>">xóa</a></td>
            </tr>
            <?php } ?>
           
        </tbody>
    </table>
    <div class="cart-total">
        <span>Tổng tiền: </span><span id="total-price"><?= number_format($total) ?>₫</span>
    </div>
   <a href="?page=thanhtoan"> <button class="checkout-btn">Thanh toán</button></a>
   <?php endif;?>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        const pricePerUnit = 80000; // Giá của sản phẩm

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
                updateTotalPrice();
            }
        }

        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            quantity++;
            quantityInput.value = quantity;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            const quantity = parseInt(document.getElementById('quantity').value);
            var id = document.getElementById('id-input').value;
            const totalPrice = pricePerUnit * quantity;

            const url = window.location.href;
            const indexOfQuestionMark = url.indexOf('?');
            const baseURL = url.substring(0, indexOfQuestionMark);
            var link = baseURL + "?page=updatecart&id=" + id + "&quantity="+ quantity;
            window.location.href = link;

            document.getElementById('product-total').textContent = `${totalPrice.toLocaleString()}₫`;
            document.getElementById('total-price').textContent = `${totalPrice.toLocaleString()}₫`;
        }
        
        $(function () {
            //  trừ sản phẩm trong giỏ hàng
            $('.quantity-btn-minus').click(function () {
                var quantity = $(this).parent().find('.quantity-input').val();
                var id = $(this).parent().find('.id-input').val();

                if (parseInt(quantity) > 1) {
                    quantity--;
                    $(this).parent().find('.quantity-input').val(quantity);

                    const url = window.location.href;
                    const indexOfQuestionMark = url.indexOf('?');
                    const baseURL = url.substring(0, indexOfQuestionMark);
                    var link = baseURL + "?page=updatecart&id=" + id + "&quantity="+ quantity;
                    window.location.href = link;
                } else {
                    alert('Cần có ít nhất 1 sản phẩm')
                }
            })
            // thêm sản phẩm trong giỏ hàng
            $('.quantity-btn-plus').click(function () {
                var quantity = $(this).parent().find('.quantity-input').val();
                var id = $(this).parent().find('.id-input').val();

                quantity++;

                $(this).parent().find('.quantity-input').val(quantity);

                const url = window.location.href;
                const indexOfQuestionMark = url.indexOf('?');
                const baseURL = url.substring(0, indexOfQuestionMark);
                var link = baseURL + "?page=updatecart&id=" + id + "&quantity="+ quantity;
                window.location.href = link;
            })
        })
    </script>