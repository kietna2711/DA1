<form action="?page=addcate" method="post" enctype="multipart/form-data">
    <div class="table">
        <div class="title">
            <h1>Thêm sản phẩm mới</h1>
        </div>
        <div class="box-upload">
            <div class="upload-image">
                <p>Hình ảnh:</p>
                <img src="../public/admin/img/sanpham1.webp" alt="">
                <input type="file" name="image_url" required>
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Tên danh mục:</p>
                <input type="text" name="category_name" id="" placeholder="Nhập tên danh mục" required>
            </div>
            <div class="upload">
                <p>Mô tả:</p>
                <textarea name="description" id="" cols="40" rows="5" placeholder="Nhập nội dung" required></textarea>
            </div>
        </div>
        <input type="submit" value="Thêm danh mục">
    </div>
</form>
