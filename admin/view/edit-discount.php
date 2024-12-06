<form action="?page=post-edit-discount&id=<?= $discount['discount_code_id']?>" method="post">
    <div class="table">
        <div class="title">
            <h1>Chỉnh sửa mã giảm giá</h1>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Mã giảm giá:</p>
                <input type="text" name="code" value="<?= $discount['code']?>" id="" placeholder="Nhập mã giảm giá" required>
            </div>
            <div class="upload">
                <p>Giảm giá(%):</p>
                <input type="number" value="<?= intval($discount['discount_amount']) ?>" name="discount_amount" placeholder="Vd: 18" required>
            </div>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Ngày bắt đầu:</p>
                <input type="date" name="start_date" value="<?= date('Y-m-d', strtotime($discount['start_date']))?>" required>
            </div>
            <div class="upload">
                <p>Ngày kết thúc:</p>
                <input type="date" name="expiration_date" value="<?= date('Y-m-d', strtotime($discount['expiration_date']))?>" required>
            </div>
        </div>
        <input type="submit" name="" value="Chỉnh sửa giảm giá" id="">
    </div>
    </main>
</form>