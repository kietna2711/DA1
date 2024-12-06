<form action="?page=addproduct" class="table" method="post" enctype="multipart/form-data">
    <div class="title">
        <h1>Thêm sản phẩm mới</h1>
    </div>
    <div class="box-upload">
        <div class="upload-image">
            <p>Hình ảnh 1:</p>
            <input type="file" name="image1" required>
        </div>
        <div class="upload-image">
            <p>Hình ảnh 2:</p>
            <input type="file" name="image2" required>
        </div>
    </div>
    <div class="box-upload">
    <div class="upload">
    <p>Danh mục:</p>
    <input type="number" name="category_id" placeholder="Nhập ID danh mục" required>
</div>

        <div class="upload">
            <p>Giá:</p>
            <input type="number" name="price" placeholder="Nhập giá" required>
        </div>
    </div>
    <div class="box-upload">
        <div class="upload">
            <p>Tên sản phẩm:</p>
            <input type="text" name="name" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="upload">
            <p>Mô tả:</p>
            <textarea name="description" cols="40" rows="5" placeholder="Nhập nội dung"></textarea>
        </div>
    </div>
    <div class="box-upload">
        <div class="upload">
            <p>Hot Deal:</p>
            <input type="text" name="hot" placeholder="Nhập Hot Deal">
        </div>
        <div class="upload">
            <p>Số lượng:</p>
            <input type="number" name="quantity" placeholder="Nhập số lượng" required>
        </div>
    </div>
    <div class="box-upload">
        <div class="upload">
            <p>Đã bán:</p>
            <input type="number" name="sold" placeholder="Nhập số lượng đã bán" required>
        </div>
    </div>
    <input type="submit" value="Thêm sản phẩm">
</form>
