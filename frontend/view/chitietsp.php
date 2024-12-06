<div class="tong">
    <div class="product-container">
        <div class="flash-sale">
            <img src="../public/user/img/sale.gif" alt="Sale Icon"> <span id="flashSaleTimer">Loading...</span>
            <a href="danhmuc.html">Xem toàn bộ sản phẩm flash-sale</a>
        </div>
        <div class="sanphamchinh">
            <div class="sanpham2">
                    <img id="anhtong" src="../public/user/img/<?=$product['image1']?>" alt="Main Product Image">
                    <div class="sanphamphu">
                        <img src="../public/user/img/<?=$product['image1']?>" alt="Thumbnail 1" onclick="changeImage('../public/user/img/<?=$product['image1']?>')">
                        <img src="../public/user/img/<?=$product['image2']?>" alt="Thumbnail 2" onclick="changeImage('../public/user/img/<?=$product['image2']?>')">
                    </div>
            </div>
            <div class="gioithieu">
                <h1 class="gioithieu1"><?=$product['name']?></h1>
                <div class="thuonghieu">
                    <div class="th">
                        <ul>
                            <li><strong>Mã sản phẩm:</strong> </li>
                            <li><strong>Thương hiệu:</strong> </li>
                        </ul>
                    </div>
                    <div class="th">
                        <ul>
                            <li><strong>Barcode:</strong></li>
                            <li><strong>Dòng sản phẩm:</strong> </li>
                        </ul>
                    </div>
                </div>
                <!---->
                <span class="price-sale">Giá : <?= number_format($product['price'])?> đ</span>
                <div class="size">
                    <p>Mô tả: <?=$product['description']?></p>
                </div>
                <form action="?page=addcart" method="POST">
                    <input type="hidden" name="id" value="<?=$product['product_id']?>">
                    <div class="quantity-wrapper">
                        <p>Số Lượng</p>
                        <input name="quantity" type="number" value="1" min="1" class="styled-input">
                    </div>
                    <div class="muathem">
                        Mua thêm <span>500,000</span> để được miễn phí giao hàng trên toàn quốc
                    </div>
                    <div class="add-to-cart-section">
                        <div class="other-actions">
                            <button type="submit" class="btn btn-success">Mua Hàng</button>
                            <!-- <button type="submit" class="btn btn-secondary">Liên hệ</button> -->
<!--                            <div class="button contact">-->
<!--                                <p>LIÊN HỆ</p>-->
<!--                                <span>Chúng tôi luôn bên bạn 24/7</span>-->
<!--                            </div>-->
                        </div>
                    </div>
                </form>

            </div>
        </div>
<br> <br> <br>
        <!-- Sản phẩm liên quan -->
<div class="product-section">
    <h2>Sản phẩm liên quan</h2>
    <div class="product-list">
    <?php foreach (array_slice($relateProduct, 0, 4) as $p) { ?>
            <a href="?page=trangchitiet&id=<?=$p['product_id']?>">
                <div class="sanpham">
                <a href="?page=trangchitiet&id=<?=$p['product_id']?>">
                            
                            </a>
                    <div class="sanpham1">14%</div>
                    <img src="../public/user/img/<?=$p['image1']?>" alt="" class="anh1hover">
                    <img src="../public/user/img/<?=$p['image2']?>" alt="" class="anh2hover">
                    <div class="hover-content">
                        <a href="?page=trangchitiet&id=<?=$p['product_id']?>">
                            <div class="xn">Xem nhanh</div>
                        </a>
                        <div class="sanpham1">14%</div>
                    </div>
                    <div class="gt"><?=$p['name']?></div>
                    <div class="gia">
                        <span class="giamgia">1,500,000₫</span>
                        <span class="giamseo"><?= number_format($p['price'], 0, ',', '.') ?>₫</span>
                    </div>
                    <form action="?page=addcart" method="POST">
                        <input type="hidden" name="id" value="<?=$p['product_id']?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </a>
        <?php } ?>
    </div>
</div>

<!-- Sản phẩm đã xem -->
<h2>Sản phẩm đã xem</h2>
<div class="product-list">
    <?php
    if (isset($_SESSION['recentlyViewed']) && count($_SESSION['recentlyViewed']) > 0) {
        $recentProducts = $this->productModel->getProductsByIds($_SESSION['recentlyViewed']);
        foreach (array_slice($recentProducts, 0, 4) as $p) { ?>
            <a href="?page=chitietsp&id=<?=$p['product_id']?>">
                <div class="sanpham">
                <a href="?page=trangchitiet&id=<?=$p['product_id']?>">
                            
                        </a>
                    <div class="sanpham1">14%</div>
                    <img src="../public/user/img/<?=$p['image1']?>" alt="" class="anh1hover">
                    <img src="../public/user/img/<?=$p['image2']?>" alt="" class="anh2hover">
                    <div class="hover-content">
                        <a href="?page=trangchitiet&id=<?=$p['product_id']?>">
                            <div class="xn">Xem nhanh</div>
                        </a>
                        <div class="sanpham1">14%</div>
                    </div>
                    <div class="gt"><?=$p['name']?></div>
                    <div class="gia">
                        <span class="giamgia">1,5000,000đ</span>
                        <span class="giamseo"><?= number_format($p['price'], 0, ',', '.') ?>₫</span>
                    </div>
                    <form action="?page=addcart" method="POST">
                        <input type="hidden" name="id" value="<?=$p['product_id']?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </a>
        <?php }
    } else {
        echo "<p>Không có sản phẩm đã xem.</p>";
    }
    ?>
</div>

          
</div>

<script>
    function changeImage(src) {
        document.getElementById('anhtong').src = src;
    }

    function changeQuantity(amount) {
        let quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value);
        let newQuantity = currentQuantity + amount;
        if (newQuantity >= 1) {
            quantityInput.value = newQuantity;
        }
    }
</script>
