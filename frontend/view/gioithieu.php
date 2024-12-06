<style>
    /* Container Styling */


    header{
    position: sticky; /* Để menu dính vào đầu trang */
    top: 0; /* Vị trí dính */
    z-index: 1000; /* Đảm bảo menu ở trên cùng */
}
header.hidden{
    display: none;
}


  .top-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    padding: 10px 20px;

}

.logo {
    font-family: 'Cursive';
    font-size: 24px;
    font-weight: bold;
    color: #8B4513; 
    text-decoration: none;
    margin-left: 100px;
}

.search-container {
    display: flex;
    align-items: center;
    flex-grow: 1;
    justify-content: center;
  
}

.search-bar {
    padding: 5px 10px; 
    border: 1px solid #ccc;
 
}

.right-icons {
    display: flex;
    align-items: center;
    margin-left: 80px;
}
.right-icons img{
    width: 30px;
    height: 30px;
    margin-left: -170px;
}
.right-icons a {
    text-decoration: none;
    color: black;
    margin-left: 40px;
    position: relative;
}

.icon-user::before, .icon-heart::before, .icon-cart::before {
    content: '';
    display: inline-block;
    background-size: contain;
    width: 20px;
    height: 20px;
    vertical-align: middle;
}
.badge {
    position: absolute;
    top: -8px;
    right: -10px;
    background-color: #FF66B2;
    color: white;
    border-radius: 50%;
    padding: 3px 7px;
    font-size: 12px;
}

.navbar {
    background-color: #fff;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    margin-bottom: 20px;
}

.nav-links {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: center;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
    padding: 5px 10px;
    font-weight: 500;
}

.nav-links a:hover {
    color: #FF66B2;
}





.navbar {
    background-color: #fff;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px 0;
    
}
.navbar .menu-sp{
    display: none;
}

.nav-links {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: center;
}


.nav-links li {
    margin: 0 20px;
    position: relative;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
    padding: 10px 15px;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #FF66B2;
}

/* Submenu styling */
.has-submenu .submenu {
    display: none;
    position: absolute;
    top: 150%; 
    left: 0;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    min-width: 100px;
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid #eee;
    width: 400px;
    
}

.has-submenu:hover .submenu {
    display: block;
    list-style: none;
 
}
.submenu li {
    white-space: nowrap;
}

.submenu a {
    padding: 10px 20px;
    color: #333;
    font-size: 14px;
    transition: background-color 0.3s ease;
    display: block;
    
}

.submenu a:hover {
    background-color: #FF66B2;
    color: #fff;
}

.search-bar {
    width: 400px;
    padding: 5px 0; /* Khoảng cách từ text đến đường gạch dưới */
    border: none;
    border-bottom: 2px solid #ccc; /* Đường gạch dưới */
    outline: none;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.search-bar::placeholder {
    color: #ccc; /* Màu của placeholder */
    font-style: italic;
}

.search-bar:focus {
    border-bottom: 2px solid #FF66B2; /* Màu đường gạch dưới khi focus */
}

.search-icon {
    position: absolute;
    right: 510px; 
    top: 80px;
    transform: translateY(-50%);
    color: #ccc; /* Màu của icon */
    font-size: 20px; /* Kích thước icon */
    pointer-events: none; /* Để icon không bị click */
}

.search-container:hover .search-bar {
    border-bottom: 2px solid #FF66B2; /* Đổi màu gạch dưới khi hover */
}



.container {
    display: flex;
    margin: 20px auto;
    padding: 20px;
    gap: 20px;
}


.kt {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
}

.card {
    background-color: white;
    padding: 20px;
    width: 30%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 8px;
    overflow: hidden;
    justify-content: flex-start;
    position: relative; 
}
.card:hover{
    transform: scale(1);
}
.card:hover img{
    transform: scale(1.1);
}
.card img {
    max-width: 100%;
    margin: 0 auto; 
    transition: transform 1.2s ease;

}

.card h3 {
    font-size: 12px;
    color: #333;
    margin-top: 15px;
}

.info {
    display: flex;
    justify-content: center;
    margin: 10px 0;
    font-size: 10px;
    color: #777;
    gap: 14px;
}

.info .date, .info .category, .info .comments {
    display: block;
    margin-bottom: 5px;
}

.card p {
    font-size: 12px;
    color: #555;
    /* flex-grow: 1; */
}


.bt {
    background-color: #ff9f9f;
    border: none;
    border-radius: 4px;
    color: white;
    padding: 10px 20px;
    font-size: 0.9em;
    cursor: pointer;
    transition: background-color 0.3s;
    align-self: center;
    margin-top: 15px;
    text-decoration: none;
}

.bt:hover {
    background-color: white;
    border: 1px solid #ff9f9f;
    color: #ff9f9f;
}

/* Sidebar Styling */
.sidebar {
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sidebar-section {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
}

.sidebar-section h3 {
    font-size: 14px;
    color: #d35400;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.sidebar-section ul {
    list-style: none;
    padding: 0;
}

.sidebar-section ul li {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.sidebar-section ul li span {
    font-size: 14px;
    font-weight: bold;
    color: #ff9f9f;
    margin-right: 8px;
}

.sidebar-section ul li img {
    width: 30px;
    height: 30px;
    border-radius: 4px;
    margin-right: 8px;
}

.sidebar-section ul li a {
    text-decoration: none;
    color: #333;
    font-size: 12px;
}

.consult-section {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
}

.consult-section h3 {
    font-size: 14px;
    color: #d35400;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.consult-section img {
    width: 100%;
    border-radius: 8px;
}

</style>
<div class="container">
    
   <div class="kt">
   <?php if(isset($blog)){foreach($blog as $b){ ?>
    <div class="card">
        <img src="../public/user/img/<?=$b['image']?>" alt="Product 1">
        <h3><?=$b['title']?></h3>
        <div class="info">
            <span class="date"><?=$b['post_date']?></span>
            <span class="category">F1GEN</span>
            <span class="comments">3 Comments</span>
        </div>
        <p><?=$b['content']?></p>
        <a href="article.html" class="bt">Xem thêm</a>
    </div>
    <?php }} ?>
</div>
        
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Đừng bỏ lỡ Section -->
            <div class="sidebar-section">
                <h3>Đừng bỏ lỡ</h3>
                <?php if(isset($blog)){foreach($blog as $b){ ?>
                <ul>
                    <li><span><?=$b['blog_post_id']?></span><img src="../public/user/img/<?=$b['image']?>" alt="Product 1"><a href="#"><?=$b['title']?></a></li>
                </ul>
                <?php }} ?>
            </div>
            
            <!-- Danh mục blog Section -->
            <div class="sidebar-section">
                <h3>Danh mục blog</h3>
                <ul>
                    <li><a href="?page=home">Trang chủ</a></li>
                    <li><a href="?page=nhomsanpham&id=1">Nhóm sản phẩm</a></li>
                    <li><a href="?page=sphot">Sản phẩm hot</a></li>
                    <li><a href="?page=tintucnoibat">Tin tức nổi bật</a></li>
                    <li><a href="?page=gioithieu">Giới thiệu</a></li>
                    <li><a href="?page=lienhe">Liên hệ</a></li>
                </ul>
            </div>
            
            <!-- Bạn cần tư vấn? Section -->
        </div>
    </div>