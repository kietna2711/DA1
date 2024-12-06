<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="../public/admin/img/logo.png">
    <link rel="stylesheet" href="../public/admin/css/style1.css">
</head>
<body>
   <nav id="sidebar">
        <ul>
            <li>
                <img class="logo" src="./img/logo.jpg" alt="">
            </li>
            <li class="active">
                <a href="?page=home" class="active1">
                    <i class="fa-solid fa-house"></i>
                    <span>Trang chủ Admin</span>
                </a>
            </li>
            <li class="active">
                <a href="?page=user">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Quản lí Tài khoản</span>
                </a>
            </li>
            <li class="active">
                    <a href="?page=category">
                    <i class="fa-solid fa-list"></i>
                    <span>Quản lí danh mục</span>
                    </a>
                </button>
            </li>
            <li class="active">
                <a href="?page=product">
                    <i class="fa-solid fa-clipboard"></i>
                    <span>Quản lí sản phẩm</span>
                </a>
            </li>
            <li class="active">
                <a href="?page=order">
                    <i class="fa-solid fa-box"></i>
                    <span>Quản lí đơn hàng</span>
                </a>
            </li>
            <li class="active">
                <a href="?page=discount">
                <i class="fa-solid fa-tags"></i>
                    <span>Quản lí mã giảm giá</span>
                </a>
            </li>  
            <li class="active">
            <a href="../frontend/index.php?page=logout">
                <i class="fa-solid fa-right-from-bracket"></i> <!-- Icon đăng xuất -->
                <span>Đăng Xuất</span>
            </a>
            </li>

        </ul>
    </nav>
    <main>
        <div class="header">
            <input class="search" type="text" name="" id="" placeholder="Tìm kiếm">
            <div class="about-us">
                <p> Admin</p>    
                <img src="../public/admin/img/avata.jpg" alt="">
            </div>
        </div>