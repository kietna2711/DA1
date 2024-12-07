<div class="danhsach1">
        <div class="filter-sidebar">
            <div class="filter-group">
                <h3>Thương hiệu sản phẩm</h3>
                <input type="checkbox" name="brand" value="image"> IMAGE
            </div>
            <div class="filter-group">
                <h3>Loại sản phẩm</h3>
                <label><input type="checkbox" name="type" value="chong-nang-body"> Chống Nắng Body</label><br>
                <label><input type="checkbox" name="type" value="kem-duong-body"> Kem Dưỡng Body</label><br>
                <label><input type="checkbox" name="type" value="Mat-na"> Mặt Nạ</label><br>
                <label><input type="checkbox" name="type" value="kem-duong-Da-Mat"> Kem Dưỡng Da Mặt</label><br>
                <label><input type="checkbox" name="type" value="Tay-Da-Chet-body"> Tẩy Da Chết Body</label><br>
                <label><input type="checkbox" name="type" value="Serum"> Serum</label><br>
                <hr>
            </div>
            
            <div class="filter-group">
    <h3>Giá sản phẩm</h3>
    <form method="GET" action="">
        <label>
            <input type="radio" name="price_range" value="under_1000000" 
                   <?= isset($_GET['price_range']) && $_GET['price_range'] === 'under_1000000' ? 'checked' : '' ?>>
            Dưới 1,000,000₫
        </label><br>
        <label>
            <input type="radio" name="price_range" value="1_3_million" 
                   <?= isset($_GET['price_range']) && $_GET['price_range'] === '1_3_million' ? 'checked' : '' ?>>
            Từ 1,000,000₫ - 3,000,000₫
        </label><br>
        <label>
            <input type="radio" name="price_range" value="3_5_million" 
                   <?= isset($_GET['price_range']) && $_GET['price_range'] === '3_5_million' ? 'checked' : '' ?>>
            Từ 3,000,000₫ - 5,000,000₫
        </label><br>
        <label>
            <input type="radio" name="price_range" value="5_10_million" 
                   <?= isset($_GET['price_range']) && $_GET['price_range'] === '5_10_million' ? 'checked' : '' ?>>
            Từ 5,000,000₫ - 10,000,000₫
        </label><br>
        <label>
            <input type="radio" name="price_range" value="above_10_million" 
                   <?= isset($_GET['price_range']) && $_GET['price_range'] === 'above_10_million' ? 'checked' : '' ?>>
            Trên 10,000,000₫
        </label><br>
        <button type="submit">Lọc</button>
    </form>
</div>
        
        </div>
        <div class="product-container">
            <div class="sort-options">
                <span>Sắp xếp theo:</span>
                <select name="sort" id="sort">
                    <option >Mặc định</option>
                    <option >A -> Z</option>
                    <option >Z -> A</option>
                    <option >Giá Tăng Dần</option>
                    <option >Giá Giảm Dần</option>
                    <option >Hàng Cữ Nhất</option>
                    <option >Hàng Mới Nhất</option>
                </select>
            </div>
        </div>
        <div class="th1">
    <?php
    // Cấu hình phân trang
    $itemsPerPage = 8; // Số sản phẩm mỗi trang
    $totalItems = isset($nhomsanpham) ? count($nhomsanpham) : 0; // Tổng số sản phẩm
    $currentPage = isset($_GET['trang']) ? max(1, intval($_GET['trang'])) : 1; // Trang hiện tại
    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang

    // Lấy danh sách sản phẩm của trang hiện tại
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $productsToShow = array_slice($nhomsanpham, $startIndex, $itemsPerPage);

    // Hiển thị danh sách sản phẩm
    if (!empty($productsToShow)) {
        foreach ($productsToShow as $p) {
            ?>
            <div class="sanpham">
                <!-- <div class="sanpham1">14%</div> -->
                <img src="../public/user/img/<?= $p['image1'] ?>" alt="" class="anh1hover">
                <img src="../public/user/img/<?= $p['image2'] ?>" alt="" class="anh2hover">
                <div class="hover-content">
                    <a href="?page=trangchitiet&id=<?= $p['product_id'] ?>">
                        <div class="xn">Xem nhanh</div>
                    </a>
                </div>
                <div class="gt"><?= $p['name'] ?></div>
                <div class="gia">
                    <span class="giamgia">1,500,000₫</span>
                    <span class="giamseo"><?= $p['price'] ?></span>
                </div>
                <a href="?page=trangchitiet&id=<?= $p['product_id'] ?>">
                <a href="?page=addcart&id=<?=$p['product_id'] ?>"><button class="add-to-cart">Thêm vào giỏ hàng</button></a>
                </a>
            </div>
            <?php
        }
    } else {
        echo "<p>Không có sản phẩm nào để hiển thị!</p>";
    }
    ?>
</div>
    <!-- Hiển thị phân trang -->
    <div class="pagination">
        <?php if ($totalPages > 1): ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php
                $link = "?";
                foreach ($_GET as $key => $value) {
                    if ($key !== "trang") {
                        $link .= htmlspecialchars($key) . "=" . htmlspecialchars($value) . "&";
                    }
                }
                $link .= "trang=" . $i;
                ?>
                <a href="<?= $link ?>" class="<?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
