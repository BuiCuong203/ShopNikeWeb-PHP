-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th7 23, 2024 lúc 04:40 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Air Force 1'),
(2, 'Jordan'),
(3, 'Air Max'),
(4, 'Blazer'),
(5, 'Nike SB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `quantity`, `total`) VALUES
(13, 26, 4109000, 1, 4109000),
(14, 26, 4109000, 2, 8218000),
(16, 27, 3829000, 1, 3829000),
(17, 24, 1685000, 1, 1685000),
(17, 26, 4109000, 1, 4109000),
(18, 24, 1685000, 2, 3370000),
(18, 27, 3829000, 1, 3829000),
(18, 35, 1757000, 2, 3514000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(350) NOT NULL,
  `price` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `title`, `price`, `discount`, `image`, `description`) VALUES
(24, 1, 'Nike Air Force 1 LV8', 2809000, 1685000, 0x6169722d666f7263652d312d6c76382e706e67, 'Vẫn ngầu như ngày đầu ra mắt hơn 40 năm trước, đôi AF-1 là một biểu tượng cổ điển bạn có thể tin cậy. Đôi giày kỷ niệm này có logo Swoosh màu bạc óng ánh và các chi tiết kim loại sáng bóng, sẵn sàng giúp bạn đánh thức con rồng bên trong. Cấu trúc bền bỉ và đế giày bám chắc sẽ giúp bạn vững vàng qua từng giờ giải lao.'),
(26, 1, 'Nike Air Force 1 Low EVO', 4109000, 0, 0x6169722d666f7263652d312d6c6f772d65766f2e706e67, 'Thoải mái, bền bỉ và vượt thời gian - đó là lý do nó đứng số 1. Các chi tiết cắt mở để lộ logo Swoosh bằng vải cao cấp và các đơn vị Air toàn chiều dài trong đế ngoài, mang đến một góc nhìn mới về Air Force 1. Cấu trúc cổ điển từ những năm 80 kết hợp với các chi tiết táo bạo tạo nên phong cách ấn tượng dù bạn đang trên sân hay di chuyển.'),
(27, 1, 'Nike Air Force 1 Shadow', 3829000, 0, 0x6169722d666f7263652d312d736861646f772e706e67, 'Tất cả những gì bạn yêu thích về AF-1 - nhưng được nhân đôi! Nike Air Force 1 Shadow mang đến một nét mới mẻ cho biểu tượng bóng rổ này để làm nổi bật DNA đặc trưng của AF-1. Các lớp phủ bằng da sặc sỡ tạo thêm chiều sâu, trong khi thương hiệu được nhân đôi và đế giữa được phóng đại giúp đôi giày này có vẻ ngoài táo bạo.'),
(28, 2, 'Nike Air Jordan 1 Low SE Craft', 3519000, 0, 0x6169722d6a6f7264616e2d312d6c6f772d73652d63726166742e706e67, 'Mỗi phiên bản Craft được phát hành đều mang lại cảm giác thủ công cho dòng AJ1 và đôi giày thấp cổ này cũng không ngoại lệ. Các tông màu trung tính của cát kết hợp với nhau tạo nên những đôi giày hoàn hảo cho mọi trang phục. Chất liệu da lộn cao cấp thêm phần kết cấu, trong khi đế ngoài nhẹ nhàng có các đốm nhỏ mang đến cho diện mạo của bạn chi tiết tinh tế.'),
(29, 2, 'Nike Air Jordan 1 Mid SE Craft', 3959000, 0, 0x6169722d6a6f7264616e2d312d6d69642d73652d63726166742e706e67, 'Mỗi phiên bản Craft mà chúng tôi phát hành đều mang lại cảm giác thủ công cho dòng AJ1, và mẫu Mid này cũng không ngoại lệ. Các tông màu trung tính của cát kết hợp với nhau tạo nên những đôi giày hoàn hảo cho mọi trang phục. Chất liệu da lộn cao cấp thêm phần kết cấu, trong khi đế ngoài có các đốm nhỏ tinh tế làm nổi bật toàn bộ thiết kế.'),
(30, 2, 'Nike Air Jordan Legacy 312 Low', 4109000, 0, 0x6169722d6a6f7264616e2d6c65676163792d3331322d6c6f772e706e67, 'Ai mà không thích một sự kết hợp tuyệt vời? Lấy các yếu tố từ AJ1, AJ3 và Nike Air Alpha Force, đôi giày này kết hợp những điều tuyệt vời nhất. Các chi tiết mang tính biểu tượng (hãy xem họa tiết da voi và dây đeo giữa bàn chân) tôn vinh thời gian của MJ ở mã vùng 312 của Chicago. Với chất liệu cao cấp và đệm Nike Air, đây là sự khởi đầu của một di sản hoàn toàn mới.'),
(31, 2, 'Nike Air Jordan 1 Low', 2929000, 0, 0x6169722d6a6f7264616e2d312d6c6f772e706e67, 'Air Jordan 1 Low kết hợp vẻ ngoài mang tính biểu tượng của phiên bản gốc với kiểu dáng và cảm giác đã được điều chỉnh lại để mang đến sự nhẹ nhàng và thoải mái suốt cả ngày.'),
(32, 2, 'Nike Jordan Stay Loyal 3', 3369000, 0, 0x6a6f7264616e2d737461792d6c6f79616c2d332e706e67, 'Bạn phải biết mình đã đi đâu để biết mình sẽ đi đâu. Chúng tôi đã ghi nhớ điều đó khi tạo ra Stay Loyal 3, một đôi giày hiện đại được xây dựng dựa trên di sản của Air Jordan. Cả bên trong lẫn bên ngoài, chúng được tạo ra để mang lại sự đa năng, với vẻ ngoài tối giản, đệm êm ái như mây và các yếu tố thiết kế gợi nhớ đến AJ4. Nói cách khác, đây là phong cách với sức bền đã được chứng minh.'),
(33, 4, 'Nike Blazer Mid \'77', 2419000, 1693000, 0x626c617a65722d6d69642d37372d6f6c6465722e706e67, 'Nike Blazer Mid \'77 từng làm mưa làm gió trên các sân bóng rổ trong quá khứ. Ngày nay, nó là biểu tượng trong thế giới giày thể thao với kiểu dáng mid-top và thiết kế bền bỉ - dành cho mọi người chơi bóng ngoài sân. Phiên bản này tôn vinh lịch sử của chúng tôi với các chi tiết \'Nike Athletic Club\' mang phong cách từ đầu những năm 70.'),
(34, 4, 'Nike Blazer Mid \'77 SE', 2419000, 1451000, 0x626c617a65722d6d69642d37372d73652d6f6c6465722e706e67, 'Thêm một chút phong cách bóng rổ cổ điển vào diện mạo hàng ngày của bạn với phiên bản đặc biệt Nike Blazer Mid \'77 này. Phần trên bằng da mịn mang lại cảm giác cao cấp và dễ dàng thích nghi, trong khi lớp hoàn thiện đặc biệt ở đế giữa làm cho đôi giày trông như bạn vừa lấy từ trong sách lịch sử ra. Phong cách cổ điển kết hợp với vật liệu hiện đại giúp bạn có thể chạy, nhảy và di chuyển một cách thoải mái.'),
(35, 4, 'Nike Zoom Blazer Mid Pro GT', 2929000, 1757000, 0x7a6f6f6d2d626c617a65722d6d69642d70726f2d67742d736b6174652e706e67, 'Được thiết kế theo phong cách những năm 70. Được yêu thích trong thập niên 80. Trở thành kinh điển trong thập niên 90. Sẵn sàng cho tương lai. Zoom Blazer mang đến một thiết kế vượt thời gian, dễ dàng phối đồ. Phiên bản của Grant Taylor trên đôi giày Nike yêu thích của anh ấy tăng cường phong cách với các chi tiết lấy cảm hứng từ đua xe. Vậy nên, hãy tự tin khẳng định phong cách của riêng bạn.'),
(36, 4, 'Nike Blazer Low \'77 Vintage', 2499000, 0, 0x626c617a65722d6c6f772d37372d76696e746167652e706e67, ' Được ca ngợi trên đường phố nhờ sự đơn giản cổ điển và thoải mái, Nike Blazer Low \'77 Vintage trở lại với phong cách thấp cổ và vẻ ngoài bóng rổ di sản. Với các chi tiết da lộn mềm mại, thiết kế Swoosh cổ điển và cổ giày siêu êm ái, đây là món đồ không thể thiếu trong tủ đồ của bạn, sẵn sàng đồng hành cùng bạn mọi lúc mọi nơi.'),
(37, 5, 'Nike SB Zoom Blazer Mid Premium', 2649000, 0, 0x73622d7a6f6f6d2d626c617a65722d6d69642d736b6174652e6a7067, 'Được thiết kế theo phong cách của những năm 70. Được yêu thích trong thập niên 80. Trở thành kinh điển trong thập niên 90. Sẵn sàng cho tương lai. Phiên bản cao cấp này của Blazer Mid mang lại cho bạn một cách nhìn mới lạ về một đôi giày trượt ván ưa thích. Nó có chất liệu vải canvas bền chắc kết hợp với lớp mạng trái ngược, tạo ra một vẻ ngoài có chiều sâu nhưng vẫn dễ dàng phối đồ. Hãy tự tin, hoàn thiện trang phục của bạn.'),
(38, 5, 'Nike SB React Leo', 2779000, 1667000, 0x73622d72656163742d6c656f2d736b6174652e706e67, 'Sự sang trọng và tiện ích hòa quyện trong sự hợp tác không phân biệt giới tính này với Leo Baker. Được thiết kế để trượt ván một cách dễ dàng với độ chính xác cấp cao, những đôi giày này đã được nghiên cứu kỹ lưỡng để mang lại hiệu suất liên tục và kéo dài. Được thử nghiệm bởi Leo, thiết kế dành cho bạn.'),
(39, 5, 'Nike SB Force 58', 2189000, 1751000, 0x73622d666f7263652d35382d736b6174652e706e67, 'Sáng tạo mới nhất và tuyệt vời nhất đến từ đường phố, Force 58 mang lại cho bạn sự bền bỉ của đế cupsole kết hợp với sự linh hoạt của giày vulcanized. Được làm từ vải canvas và da lộn, và hoàn thiện với các lỗ trên đầu giày, toàn bộ diện mạo được thấm nhuần với DNA bóng rổ di sản.'),
(40, 5, 'Nike BRSB', 2499000, 0, 0x627273622d736b6174652e706e67, 'Một đôi giày quen thuộc được tái sinh trong Nike BRSB. Gần như mọi chi tiết, từ cách phối màu đến mẫu răng cưa trên đế, đều được lấy cảm hứng từ đôi giày Nike Cortez gốc. Tuy nhiên, vì đây là một đôi giày dành cho trượt ván, chúng tôi đã thêm những điểm đặc biệt vào những nơi cần thiết - như cao su từ đế giày bọc lên và qua phần gót và ngón chân để tăng độ bền. Nó cũng bọc hai bên, thêm một lớp bảo vệ cho các khu vực sử dụng nhiều, như vùng ollie.'),
(41, 5, 'Nike SB Zoom Nyjah 3', 2929000, 0, 0x73622d7a6f6f6d2d6e796a61682d332d736b6174652e706e67, 'Nhẹ nhàng. Dễ dàng. Chính xác. Nyjah 3 mang đến bản cập nhật tiếp theo của đôi giày trượt ván vô cùng đặc biệt như Nyjah. Đệm Zoom Air được kết hợp với đế ngoài hình ô mật ong, vừa bám đất mà lại nhẹ nhàng như lông vũ.'),
(42, 3, 'Nike Air Max Ishod', 3239000, 0, 0x6169722d6d61782d6973686f642e706e67, 'Thấm vào bên trong là những yếu tố được lấy từ những đôi giày bóng rổ kinh điển của thập niên 90, Air Max Ishod được xây dựng với tất cả sự bền bỉ bạn cần để trượt ván mạnh mẽ. Sự sáng tạo này dựa trên thiết kế Ishod gốc với lưới cập nhật, phần đế nén khí Nike Air (với công nghệ Max Air) được phơi ra và đế giày cupsole dễ dàng phát triển. Bây giờ hãy bước vào và trượt ván một cách tự tin như thể bạn thật sự muốn.'),
(43, 3, 'Nike Air Max Dn', 4409000, 0, 0x6169722d6d61782d646e2e706e67, 'Xin chào thế hệ mới của công nghệ Air. Air Max Dn có hệ thống đơn vị Air động học của chúng tôi với hai ống áp suất, tạo ra một cảm giác phản ứng mỗi bước đi. Điều này dẫn đến một thiết kế tương lai mà đủ thoải mái để mang từ ban ngày đến ban đêm. Hãy tiếp tục - Cảm nhận điều không thể tin được.'),
(44, 3, 'Nike Air Max 90 LV8', 4109000, 0, 0x6169722d6d61782d39302d6c76382e706e67, 'Đưa trang phục của bạn lên tầm cao mới với các đơn vị Max Air được xếp chồng lên nhau. Bạn không chỉ được sự đệm êm thêm, mà còn được chiều cao thêm để tạo ra nền tảng hoàn hảo. Các vật liệu được lớp chồng nhau thêm vào chất liệu và chiều sâu cho một diện mạo nâng cao mà bạn sẽ muốn lựa chọn lần nào cũng vậy.'),
(46, 3, 'Nike Air Max Excee', 2929000, 0, 0x6169722d6d61782d65786365652e706e67, 'Bắt kịp xu hướng với Nike Air Max Excee. Lấy cảm hứng từ Nike Air Max 90, những đôi giày này mang lại một phong cách hiện đại cho biểu tượng huyền thoại thông qua những màu sắc sặc sỡ, các đường thiết kế kéo dài và tỷ lệ biến dạng cho phong cách mà thách thức thời gian.'),
(71, 1, 'Nike Air Force 1 \'07 Next Nature', 3239000, 2249000, 0x6169722d666f7263652d312d30372d6e6578742d6e61747572652e706e67, 'Đôi giày bóng rổ nguyên bản này mang đến cho \'không khí trong lành\' một ý nghĩa hoàn toàn mới. Chất liệu vải thoáng mát, các chi tiết thêu và một bó màu sắc mùa xuân mang đến cảm giác mùa hè cho những gì bạn đã biết và yêu thích: đệm khí Nike Air, cấu trúc cổ điển và phong cách vượt thời gian.'),
(74, 3, 'Nike Air Max SC', 2779000, 0, 0x6169722d6d61782d73632e706e67, 'Với vẻ đẹp thể thao mang dấu ấn di sản và đệm Max Air, Air Max SC là cách hoàn hảo để hoàn thiện bất kỳ trang phục nào. Da mịn và vải thông thoáng tạo thêm chiều sâu và độ bền, trong khi các điểm nhấn sắc màu nổi bật vinh danh Ngày Air Max.'),
(75, 1, 'Nike Air Force 1 \'07 EasyOn', 3239000, 2000000, 0x6169722d666f7263652d312d30372e706e67, 'Nhanh hơn 1, 2, 3 - đôi giày bóng rổ nguyên bản giúp bạn sẵn sàng ngay lập tức. Phiên bản này của AF-1 được trang bị công nghệ Nike EasyOn cho trải nghiệm không cần dùng tay. Phần gót linh hoạt có thể gập lại khi bạn xỏ chân vào và sau đó bật trở lại vị trí ban đầu, giúp dễ dàng mang và tháo giày. Kết hợp với lớp da sạch sẽ và sắc nét, bạn có sự thoải mái tối đa. Vâng, đó là tất cả những gì bạn yêu thích và hơn thế nữa.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '0123456789', 'Hà Nội', '123456', 'admin'),
(2, 'Bùi Mạnh Cường', 'buimanhcuong@gmail.com', '0334940224', 'Nam Định', '123456', 'user'),
(4, 'Bùi Mạnh Cường', 'buimanhcuong2@gmail.com', '0926334219', 'Hà Nội', '123456', 'user'),
(5, 'Bui Manh Cuong', 'buimanhcuong3@gmail.com', '123456789', 'Triều khúc', '123456', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
