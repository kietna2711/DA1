
<div class="grid-container">
        <!-- Ảnh lớn bên trái -->
        <div class="grid-item grid-item-1">
            <img src="../public/user/img/sp1.webp" alt="" >
        </div>
    
        <!-- Ảnh phía trên bên phải -->
        <div class="grid-item grid-item-2">
            <img src="../public/user/img/sp2.webp" alt="">
        </div>
    
        <!-- Hai ảnh phía dưới bên phải -->
        <div class="grid-item grid-item-3">
            <img src="../public/user/img/sp4.webp" alt="">
            <img src="../public/user/img/sp3.webp" alt="">
        </div>
    </div>
    <div class="th">
        <img src="../public/user/img/th.webp" alt="">
    </div>


 <div class="discount-section">
    <h3>Ưu đãi tháng nay</h3>
    <ul class="discount-list">
        <?php if (!empty($discounts)) ?>
            <?php foreach ($discounts as $discount): ?>
                <li>
                    <strong>Mã: </strong><?= $discount['code'] ?> 
                    <strong>Giảm: </strong><?= $discount['discount_amount'] ?>%
                    <a class="copy-discount" data-code="<?= $discount['code'] ?>">Sao chép</a>
                </li>
            <?php endforeach; ?>
    </ul>
</div>


    <div class="sp-banchay">
        <h1 class="header">Bán chạy trong tháng</h1>
        <div class="menunho">
        <?php if(isset($categories)){foreach($categories as $c){ ?>
                <a class="menu-item" href="?page=nhomsanpham&id=<?=$c['category_id']?>"><?=$c['category_name']?></a>
            <?php }} ?>
        </div>
    </div>


    <div class="notification" id="notification">
        <div class="notification-header">
          <span>Thông báo mới nhất</span>
          <button class="close-btn" id="close-btn">&times;</button>
        </div>
        <div class="notification-content">
          <ul>
            <li>> Hot trend</li>
            <li>> New Arrival</li>
          </ul>
          <p>- Cập nhật nhanh chóng các thông tin mới nhất đến với bạn</p>
        </div>
      </div>
      <div class="bell-icon" id="bell-icon">
        🔔
      </div>
      

<div class="th1">
<?php if (isset($nhomsanpham)) {
    $nhomsanpham = array_slice($nhomsanpham, 0, 8); // Lấy 8 sản phẩm đầu tiên
    foreach ($nhomsanpham as $p) {
        $giaGoc = 950000    ;
        $giaGiam = $p['price']; // Giá hiện tại từ mảng sản phẩm
        $phanTramGiam = round((($giaGoc - $giaGiam) / $giaGoc) * 100);
?>
    <div class="sanpham">
    <div class="sanpham1"><?= $phanTramGiam ?>%</div>
        <img src="../public/user/img/<?=$p['image1'] ?>" alt="" class="anh1hover">
        <img src="../public/user/img/<?=$p['image2'] ?>" alt="" class="anh2hover">
        <div class="hover-content">
            <a href="?page=trangchitiet&id=<?=$p['product_id'] ?>">
                <div class="xn">Xem nhanh</div>
            </a>
            <div class="sanpham1"><?= $phanTramGiam ?>%</div>
        </div>
        <div class="gt"><?=$p['name'] ?></div>
        <div class="gia">
        <span class="giamgia"><?= number_format($giaGoc) ?>₫</span>
        <span class="giamseo"><?= number_format($giaGiam) ?>₫</span>
        </div>
        <a href="?page=addcart&id=<?=$p['product_id'] ?>"><button data-id="123" class="add-to-cart">Thêm vào giỏ hàng</button></a>
    </div>
<?php
    }
} ?>

</div>
<div class="tgoiyt">
<div class="tgoiy">
    <div class="goiy">
        <h1>Gợi ý - Được xem nhiều</h1>
        <div class="xemnhiu">
            <div class="item">
                <img src="../public/user/img/st1.webp" alt="Sữa tắm">
                <p>Sữa tắm</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st2.webp" alt="Phấn trang điểm">
                <p>Phấn trang điểm</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st3.webp" alt="Son môi">
                <p>Son môi</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st4.webp" alt="Nước hoa nam">
                <p>Nước hoa nam</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st5.webp" alt="Nước hoa nữ">
                <p>Nước hoa nữ</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st6.webp" alt="Thực phẩm chức năng">
                <p>Thực phẩm chức năng</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st7.webp" alt="Dầu gội">
                <p>Dầu gội</p>
            </div>
            <div class="item">
                <img src="../public/user/img/st8.webp" alt="Dầu xả">
                <p>Dầu xả</p>
            </div>
        </div>
    </div>
</div>
</div>



<h1 class="header" style="text-align: center;" margin-top="15px;">Sản phẩm mới</h1>
<div class="whenin">

    <!-- Cột bên trái -->
    <div class="spgy">
        <img src="../public/user/img/bc1.webp" alt="Main Product">
        <div class="gtng">
            <h2>WHEN IN BEN TRE</h2>
            <p>NEW COLLECTION | WHEN IN BEN TRE</p>
            <p>Với hành trình khám phá không ngừng và niềm tự hào to lớn về Việt Nam, các NTK FORMAT đã tiếp tục <br> đặt chân đến mảnh đất Bến Tre bình dị và thân thương. BST WHEN IN BEN TRE tinh tế khai thác <br> hình ảnh rặng dừa cùng sống nước đặc trưng theo phong cách nghệ thuật <br>Toile de Jouy trên nền chất liệu lụa Latin đắt giá.</p>
        </div>
    </div>
<div class="sp">
<?php if(isset($sanphamhot)){foreach($sanphamhot as $p){ ?>
    <div class="sanpham">
        <div class="sanpham1">14%</div>
        <img src="../public/user/img/<?=$p['image1'] ?>" alt="" class="anh1hover">
        <img src="../public/user/img/<?=$p['image2'] ?>" alt="" class="anh2hover">
        <div class="hover-content">
        <a href="?page=trangchitiet&id=<?=$p['product_id'] ?>">    <div class="xn">Xem nhanh</div> </a>
            <div class="sanpham1">14%</div>
        </div>
        <a href="?page=trangchitiet&id=<?=$p['product_id'] ?>"><div class="gt"><?=$p['name'] ?></div></a>
        <div class="gia">
            <span class="giamseo"><?= number_format($p['price']) ?> đ</span>
        </div>
        <a href="?page=addcart&id=<?=$p['product_id'] ?>"><button class="add-to-cart">Thêm vào giỏ hàng</button></a>
    </div>
    <?php }} ?>
</div>
</div>







<div class="trangdiem">
    <img src="../public/user/img/tt.webp" alt="">
</div>



<div class="kt">
    <?php if (isset($blog)) : ?>
        <?php foreach ($blog as $b) : ?>
            <div class="card">
                <img src="../public/user/img/<?= htmlspecialchars($b['image']) ?>" alt="Blog">
                <h3><?= htmlspecialchars($b['title']) ?></h3>
                <div class="info">
                    <span class="date"><?= htmlspecialchars($b['post_date']) ?></span>
                    <span class="category">F1GEN</span>
                    <span class="comments">3 Comments</span>
                </div>
                <p><?= htmlspecialchars($b['content']) ?></p>
                <a href="" class="bt">Xem thêm</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyButtons = document.querySelectorAll('.copy-discount');

        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const code = this.getAttribute('data-code');
                navigator.clipboard.writeText(code).then(() => {
                    alert('Mã giảm giá "' + code + '" đã được sao chép vào clipboard!');
                }).catch(err => {
                    console.error('Không thể sao chép mã: ', err);
                });
            });
        });
    });
</script>




