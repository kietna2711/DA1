<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng</title>
</head>
<body>
    <h1>Lịch sử đơn hàng</h1>

    <?php if (empty($orders)): ?>
        <p>Bạn chưa đặt đơn hàng nào.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['transaction_id']) ?></td>
                        <td><?= htmlspecialchars($order['product_name']) ?></td>
                        <td><?= htmlspecialchars($order['qty']) ?></td>
                        <td><?= number_format($order['price'], 0, ',', '.') ?>₫</td>
                        <td><?= number_format($order['qty'] * $order['price'], 0, ',', '.') ?>₫</td>
                        <td><?= htmlspecialchars($order['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
