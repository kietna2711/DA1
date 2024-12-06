<div class="table">
            <div class="title">
                <h1>Quản lý đơn hàng</h1>
            </div>
            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giảm giá</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($transactions as $key => $transaction) : ?>

                    <tr>
                        <td style="vertical-align: middle"><?= $key + 1 ?></td>
                        <td style="vertical-align: middle"><?= $transaction['name'] ?></td>
                        <td style="vertical-align: middle"><?= $transaction['phone'] ?></td>
                        <td style="vertical-align: middle">
                            <p>
                                <?php
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
                            </p>
                            Địa chỉ : <?= $transaction['address'] ?>
                        </td>
                        <td style="vertical-align: middle">
                            <?php
                                if(!empty($transaction['discount_code'])) {
                                    echo $transaction['discount_code'] . '(' . $transaction['discount_amount'] . '%)';
                                }
                            ?>
                        </td>
                        <td style="vertical-align: middle"><?= number_format($transaction['total']) ?> đ</td>
                        <td style="vertical-align: middle">
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
                        <td style="vertical-align: middle"><?= $transaction['created_at'] ?></td>
                        <td style="vertical-align: middle">
                            <a href="?page=order-detail&id_order=<?= $transaction['id'] ?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>