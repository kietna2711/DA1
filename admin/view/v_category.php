
        <div class="table">
            <div class="title">
                <h1>Quản lý danh mục</h1>
                <a href="?page=showaddcate"><i class="fa-solid fa-plus"></i>Thêm mới</a>
            </div>
            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh danh mục</th>
                        <th>Mô tả</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Ẩn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $key=>$value) { ?>
                    <tr>    
                        <td><?=$key+1?></td>
                        <td><?=$value['category_name']?></td>
                        <td>
                            <img src="../public/user/img/<?=$value['image_url']?>" alt="">
                        </td>
                        <td><?=$value['description']?></td>
                        <td>120</td>
                        <td>
                        <input type="checkbox" 
                            id="hidden-<?=$value['category_id']?>" 
                            onchange="toggleVisibility(<?=$value['category_id']?>)" 
                            <?= $value['is_hidden'] ? 'checked' : '' ?> />
                        </td>

                        <td>
                            <a href="?page=showeditcate&id=<?=$value['category_id']?>">
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
    </main>
    <script>
   function toggleVisibility(categoryId) {
    const checkbox = document.getElementById(`hidden-${categoryId}`);
    const isHidden = checkbox.checked ? 1 : 0; // 1 là ẩn, 0 là hiện
    
    // Gửi yêu cầu tới server để cập nhật trạng thái ẩn/hiện
    fetch(`index.php?page=toggleVisibility&id=${categoryId}&hidden=${isHidden}`, {
        method: 'GET',
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Hiển thị phản hồi từ server (có thể là thông báo thành công)
        alert("Trạng thái danh mục đã được cập nhật!");
    })
    .catch(err => {
        console.error("Lỗi khi thay đổi trạng thái danh mục:", err);
        alert("Đã xảy ra lỗi khi cập nhật trạng thái danh mục!");
    });
}

</script>
