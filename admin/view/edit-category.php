<form action="?page=editcate&id=<?=$category['category_id']?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="category_id" value="<?=$category['category_id']?>">
    <div class="table">
        <div class="title">
            <h1>Sửa danh mục</h1>
        </div>
        <div class="box-upload">
            <div class="upload-image">
                <p>Hình ảnh:</p>
                <input type="file" name="image_url">
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Tên danh mục:</p>
                <input type="text" name="category_name" value="<?=$category['category_name']?>" required>
            </div>
            <div class="upload">
                <p>Mô tả:</p>
                <textarea name="description" cols="40" rows="5" required><?=$category['description']?></textarea>
            </div>
            
        </div>
        <input type="submit" value="Cập nhật danh mục">
    </div>
</form>
