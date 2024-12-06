<form action="?page=editproduct&id=<?=$product['product_id']?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?=$product['product_id']?>"> <!-- ID sản phẩm -->
    <div class="table">
        <div class="title">
            <h1>Sửa sản phẩm</h1>
        </div>
        <div class="box-upload">
            <div class="upload-image">
                <p>Hình ảnh 1:</p>
                <img src="../public/user/img/<?=$product['image1']?>" alt="Hình ảnh 1">
                <input type="file" name="image1"> <!-- Cho phép người dùng chọn hình ảnh mới -->
                <p>Hình ảnh 2:</p>
                <img src="../public/user/img/<?=$product['image2']?>" alt="Hình ảnh 2">
                <input type="file" name="image2"> <!-- Cho phép người dùng chọn hình ảnh mới -->
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Tên sản phẩm:</p>
                <input type="text" name="name" value="<?=$product['name']?>" required>
            </div>
            <div class="upload">
                <p>Mô tả:</p>
                <textarea name="description" cols="40" rows="5" required><?=$product['description']?></textarea>
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Giá:</p>
                <input type="number" name="price" value="<?=$product['price']?>" required>
            </div>
            <div class="upload">
                <p>Danh mục:</p>
                <input type="text" name="category_id" value="<?=$product['category_id']?>" required>
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Hot:</p>
                <input type="text" name="hot" value="<?=$product['hot']?>" required>
            </div>
        </div>
        <input type="submit" value="Cập nhật sản phẩm">
    </div>
</form>
