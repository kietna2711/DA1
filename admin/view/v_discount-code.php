<div class="table">
    <div class="title">
        <h1>Quản lý mã giảm giá</h1>
        <a href="?page=add-discount"><i class="fa-solid fa-plus"></i>Thêm mới</a>
    </div>
    <table id="userTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã giảm giá</th>
            <th>Giảm giá (%)</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($discounts as $key => $discount) : ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $discount['code'] ?></td>
                <td><?php echo intval($discount['discount_amount']) ?></td>
                <td><?php echo date('Y-m-d', strtotime($discount['start_date'])) ?></td>
                <td><?php echo date('Y-m-d', strtotime($discount['expiration_date'])) ?></td>
                <td>
                    <a href="?page=edit-discount&id=<?= $discount['discount_code_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="?page=delete-discount&id=<?= $discount['discount_code_id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>