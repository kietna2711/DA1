-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2024 lúc 12:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_post_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_post`
--

INSERT INTO `blog_post` (`blog_post_id`, `image`, `title`, `content`, `post_date`) VALUES
(1, 'blog4.jpg', 'Sữa tắm Heshi Perfect Bright Body - Cho Làn Da Thư Giãn Tuyệt Đối', 'Làm đẹp là đặc quyền của mọi người, bất kể nam hay nữ. Thời đại 4.0, khiến mọi người bận rộn với guồng quay của cuộc sống. Khoảng khắc thư giãn sau một ngày dài làm việc căng thẳng là vô cùng cận thiết để con người cảm thấy thoải mái và lấy lại năng lượng để chuẩn bị cho ngày làm việc tiếp theo. Để phù hợp hơn với nhịp sống và nhu cầu thiết thực này các sản phẩm làm đẹp, làm sạch cũng dần thay đổi và tích hợp thêm nhiều chức năng hơn nhằm đáp ứng mong muốn của người tiêu dùng.Ngày nay, hầu hết mọi người sẽ cảm thấy tắm không sạch hay thiếu thiếu cái gì đó nếu chỉ tắm bằng nước thường vì thế mà mỗi người đều sỡ hữu cho mình một loại sữa tắm phù hợp trong hành trình chăm sóc cơ thể hàng ngày. \n\nSữa tắm là bí kíp chăm sóc da có từ xa xưa, mang lại những công dụng tuyệt vời đối với cơ thể. Trước đây, con người đã biết tận dụng xà bông kết hợp với sữa dê – dưỡng chất thiên nhiên để tạo ra sản phẩm làm mịn da. Ngày nay, sữa tắm được biến tấu đa dạng với bảng thành phần và tính năng khác nhau. Hiện nay, có rất nhiều loại sữa tắm đến từ nhiều thương hiệu khác nhau với đa dạng công dụng như: dưỡng ẩm, dưỡng trắng cho da,… Vì vậy, điều này khiến bạn băn khoăn không biết chọn loại nào tốt cho làn da và nhu cầu sử dụng của bản thân. Hãy để, Bachvietshop đề cử cho bạn một em sữa tắm Heshi Perfect Bright Body dưới đây, chắc chắn sẽ làm các bạn hài lòng và có thêm một sự lựa chọn nhé!\n', '2024-11-22 08:21:08'),
(2, 'blog1.jpg', 'DƯỠNG ẨM ĐÚNG CÁCH CHO DA', '“Dưỡng ẩm cho da” là cụm từ rất phổ biến. Nếu bạn gõ cụm từ “làm thế nào để dưỡng ẩm” cho ra đến 56 triệu kết quả. Điều này chứng tỏ có rất nhiều người vẫn còn lúng túng và mơ hồ về dưỡng ẩm. Đây là lý do Vitabox quyết định làm một series bài viết về dưỡng ẩm để giúp các bạn hiểu thêm về vấn đề này.\r\n\r\nMục đích của bài viết là giúp bạn dưỡng ẩm cho da một cách hiệu quả và an toàn nhất. Các thông tin trong bài cũng giúp bạn tỉnh táo hơn trước một rừng những sản phẩm dưỡng ẩm. Xuyên suốt nội dung của bài viết, một số hình ảnh sản phẩm có bán tại Vitabox có thể được dùng để minh hoạ. Điều này không ngụ ý là đây là những sản phẩm tốt nhất cho bạn. Thay vào đó, hãy luôn tìm hiểu kỹ thông tin sản phẩm và chọn cho mình những sản phẩm phù hợp nhất.', '2024-11-22 09:44:03'),
(3, 'blog3.jpg', 'PHƯƠNG PHÁP SẢN XUẤT TINH DẦU', 'Các phương pháp sản xuất tinh dầu được hiểu là cách chiết tách tinh dầu ra khỏi thực vật dưới dạng có thể sử dụng ngay. Có một số phương pháp sản xuất tinh dầu. Mỗi cách đều có lợi ích riêng, phụ thuộc vào nguyên liệu và các loại hợp chất bạn muốn có trong tinh dầu. Nhà sản xuất có thể sử dụng một hoặc nhiều phương pháp chiết xuất cho các loại cây cỏ khác nhau.', '2024-11-22 09:44:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_hidden` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `image_url`, `is_hidden`) VALUES
(1, 'Kem dưỡng da Mặt', 'Giúp chống oxy hóa và ngăn ngừa thương tổn của da và cung cấp độ ẩm và chống mất nước của da.\r\n', 'sanpham1.webp', 0),
(2, 'Serum', 'Sữa tắm là một người bạn đồng hành không thể thiếu trong công cuộc chăm sóc cơ thể hàng ngày của các nàng. Sở hữu làn da mềm mịn, đắm chìm và thư giãn với lớp bọt mịn xốp và mùi hương quyến rũ của sữa tắm', 'logo.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `discount_code_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`discount_code_id`, `code`, `discount_amount`, `start_date`, `expiration_date`) VALUES
(1, 'MAGIAMGIA11', 10.00, '2024-11-12 00:00:00', '2024-11-26 00:00:00'),
(3, '3534534534', 10.00, '2024-11-29 00:00:00', '2024-12-10 00:00:00'),
(4, 'GIAMTHANG12', 50.00, '2024-11-30 00:00:00', '2024-12-07 00:00:00'),
(5, 'GIAMGIABL', 10.00, '2024-11-28 00:00:00', '2024-12-06 00:00:00'),
(6, 'fcxzcxz', 50.00, '2024-11-14 00:00:00', '2024-12-27 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` float(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`) VALUES
(1, 5, 5, 1, 720000.00),
(2, 5, 4, 2, 700000.00),
(3, 6, 5, 1, 720000.00),
(4, 6, 4, 2, 700000.00),
(5, 7, 3, 3, 650000.00),
(6, 7, 8, 3, 850000.00),
(7, 8, 8, 2, 850000.00),
(8, 8, 6, 2, 750000.00),
(9, 9, 7, 1, 800000.00),
(10, 10, 8, 2, 850000.00),
(11, 11, 2, 1, 500000.00),
(12, 12, 3, 5, 650000.00),
(13, 12, 7, 1, 800000.00),
(14, 13, 7, 3, 800000.00),
(15, 13, 2, 4, 500000.00),
(16, 13, 3, 2, 650000.00),
(17, 14, 3, 3, 650000.00),
(18, 14, 4, 3, 700000.00),
(19, 15, 2, 2, 500000.00),
(20, 15, 4, 2, 700000.00),
(21, 16, 2, 3, 500000.00),
(22, 16, 3, 1, 650000.00),
(23, 16, 4, 3, 700000.00),
(24, 16, 8, 1, 850000.00),
(25, 17, 3, 1, 650000.00),
(26, 19, 4, 3, 700000.00),
(27, 20, 3, 1, 650000.00),
(28, 21, 2, 1, 500000.00),
(29, 22, 2, 1, 500000.00),
(30, 23, 3, 1, 650000.00),
(31, 24, 2, 1, 500000.00),
(32, 25, 2, 1, 500000.00),
(33, 26, 2, 1, 500000.00),
(34, 27, 2, 1, 500000.00),
(35, 28, 2, 1, 500000.00),
(36, 29, 2, 1, 500000.00),
(37, 30, 2, 1, 500000.00),
(38, 31, 2, 2, 500000.00),
(39, 32, 2, 1, 500000.00),
(40, 33, 2, 1, 500000.00),
(41, 33, 3, 1, 650000.00),
(42, 34, 2, 1, 500000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `hot` int(4) NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `image1`, `image2`, `quantity`, `sold`, `category_id`, `hot`, `is_hidden`) VALUES
(2, 'Kem Chống Nắng Toàn Thân Dạng Xịt Image PREVENTION+ Ultra Sheer Spray SPF45+', 500000.00, '• Giúp chống nắng tốt nhất, chống tia UVA/UVB\n• Giúp cung cấp độ ẩm và chống mất nước của da\n• Giúp chống oxy hóa và ngăn ngừa thương tổn của da', 'sanpham1_1.webp', 'sanpham1_2.webp', 100, 0, 1, 1, 0),
(3, 'Kem Dưỡng Body Trẻ Hóa Da Toàn Thân Image BODY SPA Rejuvenating Body Lotion', 650000.00, 'Kem dưỡng thể siêu dưỡng ẩm Image Body Spa Rejuvenating Body Lotion với sự pha trộn độc đáo giữa peptide, axit glycolic và retinol giúp tẩy tế bào chết, làm trẻ hóa kết cấu da, ngăn ngừa các dấu hiệu lão hóa.', 'sanpham2_1.webp', 'sanpham2_2.webp', 100, 10, 1, 1, 0),
(4, 'Kem Dưỡng Da Mặt Chống Lão Hóa Image AGELESS Total Repair Crème', 700000.00, 'Kem chống lão hóa, phục hồi da IMAGE AGELESS Total Repair Crème giữ nước cho bề mặt da mềm mịn, căng bóng, kích thích tăng sinh collagen, mờ nếp nhăn và săn chắc da.', 'sanpham3_1.webp', 'sanpham3_2.webp', 100, 50, 1, 1, 0),
(5, 'Kem Dưỡng Da Mặt Phục Hồi Da Image Irescue Post Treatment Recovery Balm', 720000.00, 'Kem dưỡng da mặt phục hồi da Image I RESCUE Post Treatment Recovery Balm giúp bảo vệ, nuôi dưỡng làn da thương tổn. Hạn chế sự mất nước, cảm giác khó chịu, mẩn đỏ hoặc kích ứng, chống oxy hóa.', 'sanpham4_1.webp', 'sanpham4_2.webp', 100, 12, 2, 1, 0),
(6, 'Kem Dưỡng Da Mặt Phục Hồi Và Chống Lão Hóa Image MD Restoring Youth Repair Crème', 750000.00, 'Kem dưỡng phục hồi da Image MD Restoring Youth Repair Creme giúp bề mặt da căng mịn, săn chắc; cấu trúc da bên trong khỏe khoắn, hạn chế hư tổn, lão hóa.', 'sanpham5_1.webp', 'sanpham5_2.webp', 100, 3, 2, 1, 0),
(7, 'Kem Dưỡng Da Mặt Trẻ Hóa Da Image AGELESS Total Retinol A Crème', 800000.00, 'Kem trắng da chống lão hóa IMAGE AGLESS Total Retinol A Crème chứa retinol nồng độ cao và các polypeptide đã được Cục FDA kiểm nghiệm, chứng nhận an toàn giúp sửa chữa làn da hư tổn do mụn, lão hóa.', 'sanpham6_1.webp', 'sanpham6_2.webp', 100, 4, 2, 1, 0),
(8, 'Kem Dưỡng Da Mặt Trẻ Hóa Da Image The MAX Stem Cell Crème', 850000.00, 'Kem chống lão hóa IMAGE the MAX Stem Cell Crème chiết xuất tế bào gốc từ táo, hoa nhung tuyết, peptide…giúp dưỡng ẩm, phục hồi DNA, làm sáng da và mờ nếp nhăn.', 'sanpham7_1.webp', 'sanpham7_2.webp', 100, 0, 2, 1, 0),
(9, 'Mặt Nạ Phục Hồi Da IMAGE MD Restoring Post Treatment Masque', 900000.00, 'IMAGE Skincare cho ra đời dòng mặt nạ phục hồi da IMAGE MD Restoring Post Treatment Masque siêu lành tính. Chứa các thành phần tinh khiết, dịu nhẹ giúp xoa dịu các triệu chứng khó chịu trên da. Làm dịu mát tức thì cho làn da đỏ rát, châm chích. Nuôi dưỡng và phục hồi làn da nhanh chóng.', 'sanpham8_1.webp', 'sanpham8_2.webp', 100, 0, 1, 1, 0),
(10, 'Kem Dưỡng Olay Luminous Sáng Da Mờ Thâm Nám Ban Đêm 50g\r\nLuminous Light Perfecting Night Cream', 102400.00, 'kk', 'sk11.jpg', 'sk12.jpg', 0, 100, 1, 0, 0),
(11, 'Kem Dưỡng Obagi Retinol 1.0% Trẻ Hóa Da, Ngừa Mụn 28g\r\nRetinol 1.0 Cream', 109350.00, 'ff', 'sk10.jpg', 'sk9.jpg', 0, 0, 1, 0, 0),
(14, 'Serum Làm Trắng Sáng Da Image Iluma Intense Brightening Serum', 1285000.00, 'đang cập nhật', 'sp1_1.webp', 'sp1_2.webp', 1, 1, 2, 0, 0),
(15, 'Serum Trẻ Hoá Da Chống Lão Hóa Image MD Restoring Youth Serum', 3321000.00, 'Serum Trẻ Hoá Da Chống Lão Hóa Image MD Restoring Youth Serum', 'sp2_2.webp', 'sp2_3.webp', 1, 1, 2, 0, 0),
(16, 'Nước tẩy trang', 100000.00, '11', 'sk1.jpg', 'sk2.jpg', 1, 1, 1, 0, 0),
(17, 'Kem dương da mặt', 100000.00, 'fff', 'sk15.jpg', 'sk16.jpg', 1, 1, 1, 0, 0),
(18, 'Kem làm trăng da của BEN TRE', 99999999.99, '0', 'sk13.jpg', 'sk13.jpg', 1, 1, 1, 0, 0),
(19, 'Olay', 100002.00, 'ff', 'sk11.jpg', 'sk12.jpg', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `name`, `phone`, `address`, `total`, `discount_code`, `discount_amount`, `status`, `province`, `district`, `ward`, `payment`, `shipping_method`, `created_at`) VALUES
(5, 1, 'Kiệt Nguyễn', '345345345', 'sdfsdfsdf', 2120000, NULL, NULL, 1, 'Đà Nẵng', 'Quận Hải Châu', 'Phường Thuận Phước', 'on', NULL, '2024-11-28 19:44:00'),
(6, 1, 'Kiệt Nguyễn', '0928817228', 'Hà Nội', 2120000, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Thành', 'on', NULL, '2024-11-28 19:45:00'),
(7, 2, 'kietna', '0359020898', 'sdfsdfsdf', 4500000, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Chọn phường / xã', 'on', NULL, '2024-11-28 19:52:00'),
(8, 1, 'Kiệt Nguyễn', '0359020898', 'Hà Nội', 3200000, NULL, NULL, 1, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Thành', 'on', NULL, '2024-11-28 20:05:00'),
(9, 2, 'kietna', '0359020898', 'Hà nội', 400000, '0', 50, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Thành', 'on', NULL, '2024-11-30 02:37:00'),
(10, 2, 'kietna', '0359020898', 'dfsdfsdf', 850000, 'GIAMTHANG12', 50, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Thành', 'on', NULL, '2024-11-30 02:40:00'),
(11, 2, 'kietna', '0928817228', 'Hà nội', 450000, 'GIAMGIABL', 10, 1, 'Đà Nẵng', 'Quận Hải Châu', 'Phường Thuận Phước', 'on', NULL, '2024-11-30 04:35:00'),
(12, 14, 'Nguyễn Văn A', '0983776985', 'sadasdasdasdasd', 3645000, 'MAGIAMGIA11', 10, 3, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Thành', 'on', NULL, '2024-11-30 05:37:00'),
(13, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 5700000, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 2', 'Phường An Phú', 'on', NULL, '2024-11-30 09:06:00'),
(14, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 4050000, NULL, NULL, 3, '26', '251', '9070', 'on', NULL, '2024-11-30 09:11:00'),
(15, 2, 'kietnafaf', '0905393475', 'đường ngô bệ', 2400000, NULL, NULL, 2, '79', '766', '27007', 'on', NULL, '2024-11-30 10:57:00'),
(16, 9, 'vankiet166', '0905393475', 'đường Tây Thạnh', 5100000, NULL, NULL, 2, '79', '785', '27637', 'on', NULL, '2024-11-30 11:14:00'),
(17, 1, 'Kiệt Nguyễn', '0372509194', 'hcm', 650000, NULL, NULL, 2, 'Chọn tỉnh / thành', 'Chọn quận / huyện', 'Chọn phường / xã', 'on', NULL, '2024-12-03 06:46:00'),
(18, 1, 'Kiệt Nguyễn', '0372509194', 'hcm', 650000, NULL, NULL, 2, 'Chọn tỉnh / thành', 'Chọn quận / huyện', 'Chọn phường / xã', 'on', NULL, '2024-12-03 06:48:00'),
(19, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, 'GIAMTHANG12', 50, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-04 19:07:00'),
(20, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, '3534534534', 10, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-04 19:38:00'),
(21, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-04 19:42:00'),
(22, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-04 19:44:00'),
(23, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-04 20:20:00'),
(24, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 08:44:00'),
(25, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 08:52:00'),
(26, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 08:54:00'),
(27, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 08:56:00'),
(28, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 08:59:00'),
(29, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 09:10:00'),
(30, NULL, 'Nguyễn Văn Kiệt', '0905393475', 'ffff', 0, NULL, NULL, 1, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 09:14:00'),
(31, 38, 'vankiet16666', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 09:21:00'),
(32, 38, 'vankiet16666', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 09:22:00'),
(33, 38, 'vankiet16666', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 2', 'Phường An Lợi Đông', 'on', NULL, '2024-12-05 09:51:00'),
(34, 38, 'vankiet16666', '0905393475', 'đường Tây Thạnh', 0, NULL, NULL, 2, 'TP Hồ Chí Minh', 'Quận 1', 'Phường Bến Nghé', 'on', NULL, '2024-12-05 10:59:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `vaitro` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `phone`, `address`, `vaitro`) VALUES
(1, 'kiet@gmail.com', '123', 'Kiệt Nguyễn', '', 'hcm', 0),
(2, 'kietanh27112005@gmail.com', '2711', 'kietna', '0905393475', 'hcm', 1),
(37, 'kiet166@gmail.com', '123', 'kietnvps41026', NULL, NULL, 0),
(38, 'kietnvps41026@gmail.com', '123', 'vankiet16666', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_post_id`);

--
-- Chỉ mục cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`discount_code_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `discount_code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
