<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../public/user/css/styles.css">
    <link rel="stylesheet" href="../public/user/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../public/user/css/reponsize.css">
    <link rel="stylesheet" href="../public/user/css/Notification.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    
    
    <div class="baner">
        <img id="img" src="../public/user/img/banner4.jpg" alt="" width="100%">
        <b class="left" onclick="prev()"><i class="fa-solid fa-circle-chevron-left"></i></b>
        <b class="right" onclick="next()"><i class="fa-solid fa-circle-chevron-right"></i></b>
    </div>


    <header>
        <div class="top-section">
            <a href="?page=home" class="logo"><img src="../public/user/img/Beauty_Clinic_with_woman_inside_logo_template-removebg-preview.png" alt="" width="200px" height="150px"></a>
            <div class="search-container">
                <input type="text" id="search-bar" placeholder="Bạn cần tìm gì ...?" class="search-bar">
                <i class="fa fa-search search-icon"></i>
                <a href="#" class="search-icon"><i class="icon-search"></i></a>
            </div>
            <div class="right-icons">
                <?php if(isset($_SESSION['user'])) { ?>
                    <!-- dang xuat -->
                    <a href="?page=logout"><img src="../public/user/img/logout.png" alt=""></a>
                    <?php } else { ?>
                    <!-- dang nhap -->
                    <a href="?page=loginpage"><img src="../public/user/img/user-removebg-preview.png" alt=""></a>
                    <?php }?>
                    <!--  -->
                <a href="?page=cart"><img src="../public/user/img/giohang-removebg-preview.png" alt="">
                <!-- <span>
                    <?php foreach($_SESSION['cart'] as $p){
                        $total+=$p['quantity'];
                    }
                    echo $total;
                    ?>
                </span></a> -->
            </div>
        </div>
        <nav class="navbar">
            <ul class="nav-links">
            <li><a href="?page=home">Trang chủ</a></li>
                <li class="has-submenu">
                    <a >Nhóm sản phẩm</a>
                    <ul class="submenu">
                    <?php if(isset($categories)){foreach($categories as $c){ ?>
                        <li><a href="?page=nhomsanpham&id=<?=$c['category_id']?>"><?=$c['category_name']?></a></li>
                        <?php }} ?>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a >Sản phẩm hot</a>
                    <ul class="submenu">
                        <li><a href="?page=trangchitiet&id=4">AGELESS Total Repair Crème</a></li>
                        <li><a href="?page=trangchitiet&id=3">AGELESS Total Retinol A Crème</a></li>
                        <li><a href="?page=trangchitiet&id=7">PREVENTION+ Ultra Sheer Spray SPF45+</a></li>
                        <li><a href="?page=trangchitiet&id=5">Image The MAX Stem Cell Crème</a></li>
                    </ul>
                </li>
                <li><a href="?page=tintucnoibat">Tin tức nổi bật</a></li>
                <li><a href="?page=gioithieu">Giới thiệu</a></li>
                <li><a href="?page=lienhe">Liên hệ</a></li>
            </ul>
            <img src="../public/user/img/3gach.png" alt="menu" class="menu-sp">
        </nav>
    </header>
    
