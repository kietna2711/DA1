<div class="table">
    <div class="title">
        <h1 style="text-align: center">Chi tiết đơn hàng</h1>
    </div>
    <div>

        <table id="userTable">
            <tr>
                <td>
                    Họ tên : <?php echo $transaction['name'] ?>
                </td>
                <td>
                    Số điện thoại : <?php echo $transaction['phone'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ : <?php
                    if(!empty($transaction['province'])) {
                        echo $transaction['province'];
                    }

                    if(!empty($transaction['province'])) {
                        echo '-' . $transaction['district'];
                    }

                    if(!empty($transaction['province'])) {
                        echo '-' . $transaction['ward'];
                    }
                    ?>
                </td>
                <td>
                    Địa chỉ cụ thể : <?php echo $transaction['address'] ?>
                </td>
            </tr>
            <?php if (!empty($transaction['discount_code'])) : ?>
            <tr>
                <td>Mã giảm giá : <?php echo $transaction['discount_code'] ?></td>
                <td>Phần trăm giảm : <?php echo $transaction['discount_amount'] ?> %</td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>Tổng tiền : <?php echo number_format($transaction['total']) ?></td>
                <td>Trạng thái :
                    <?php
                        if ($transaction['status'] == 1) {
                            echo "Đã giao";
                        } else if ($transaction['status'] == 3) {
                            echo "Đã xác nhận";
                        } else {
                            echo "Chờ xác nhận";
                        }
                    ?>
                </td>
            </tr>
        </table>
    </div>

    <table id="userTable">
        <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $key => $order) : ?>

            <tr>
                <td style="vertical-align: middle"><?= $key + 1 ?></td>
                <td style="vertical-align: middle"><?= $order['product_name'] ?></td>
                <td style="vertical-align: middle"><?= $order['qty'] ?></td>
                <td style="vertical-align: middle"><?= number_format($order['price']) ?> đ</td>
                <td style="vertical-align: middle">
                    <?= number_format($order['qty'] * $order['price']) ?> đ
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form action="?page=transaction-status" method="POST">
        <div>
            <div class="box-upload">
                <div class="upload">
                    <p>Cập nhật trạng thái</p>
                    <select name="status" id="">
                        <option value="2">Chờ xác nhận</option>
                        <option value="3">Đã xác nhận</option>
                        <option value="1">Đã giao</option>
                    </select>
                    <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                </div>
            </div>
            <input type="submit" value="Cập nhật">
        </div>
    </form>
</div>
</main>