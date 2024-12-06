<form action="?page=post-add-discount" method="post">
    <div class="table">
        <div class="title">
            <h1>Thêm mã giảm giá</h1>
        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Mã giảm giá:</p>
                <input type="text" name="code" id="" placeholder="Nhập mã giảm giá" required>
            </div>
            <div class="upload">
                <p>Giảm giá(%):</p>
                <input type="number" name="discount_amount" max="100" placeholder="Vd: 18" required>
            </div>

        </div>
        <div class="box-upload">
            <div class="upload">
                <p>Ngày bắt đầu:</p>
                <input type="date" name="start_date" id="" required>
            </div>
            <div class="upload">
                <p>Ngày kết thúc:</p>
                <input type="date" name="expiration_date" id="" required>
            </div>
        </div>
        <input type="submit" name="" value="Thêm mã giảm giá" id="">
    </div>
    </main>
</form>