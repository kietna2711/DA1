<div class="table">
    <div class="title">
        <h1>Quản lý sản phẩm</h1>
        <a href="?page=showaddproduct"><i class="fa-solid fa-plus"></i>Thêm mới</a>
    </div>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng sản phẩm</th>
                <th>Đã bán</th>
                <th>Danh mục</th>
                <th>Hot</th>
                <th>Ẩn</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($products as $key => $value) { ?>
            <tr>
                <td><?=$key + 1?></td>
                <td><?=$value['name']?></td>
                <td>
                    <?php if (!empty($value['image1'])): ?>
                        <img src="../public/user/img/<?=$value['image1']?>" alt="Product Image">
                    <?php endif; ?>
                    <?php if (!empty($value['image2'])): ?>
                        <img src="../public/user/img/<?=$value['image2']?>" alt="Product Image">
                    <?php endif; ?>
                </td>
                <td><?=number_format($value['price'], 0, ',', '.')?> VND</td> <!-- Hiển thị giá sản phẩm -->
                <td><?=$value['description']?></td>
                <td><?=$value['quantity']?></td> <!-- Hiển thị số lượng sản phẩm -->
                <td><?=$value['sold']?></td> <!-- Hiển thị số lượng đã bán -->
                <td><?=$value['category_id']?></td>
                <td><?=$value['hot']?></td> <!-- Hiển thị trạng thái hot -->
                <td>
                    <input type="checkbox" 
                        onchange="toggleProductVisibility(<?=$value['product_id']?>)" 
                        <?= $value['is_hidden'] ? 'checked' : '' ?> >
                </td>

                <td>
                    <a href="?page=showeditproduct&id=<?=$value['product_id']?>">
                        <button class="btn-i">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function toggleProductVisibility(productId) {
        fetch(`index.php?page=toggleVisibilityProduct&id=${productId}`, {
            method: 'GET'
        })
        .then(response => response.text())
        .then(data => {
            alert("Trạng thái sản phẩm đã được thay đổi!");
            console.log(data); // Kiểm tra dữ liệu phản hồi từ server
        })
        .catch(err => {
            console.error("Lỗi khi thay đổi trạng thái sản phẩm:", err);
        });
    }
</script>

