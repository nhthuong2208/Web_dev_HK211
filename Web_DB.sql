DROP SCHEMA IF EXISTS `Web_DB`;
CREATE SCHEMA `Web_DB`;
USE `Web_DB`;

CREATE TABLE `PRODUCT`(
  `ID` BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,-- 4 số 
  `NAME` VARCHAR(100),
  `PRICE` INT,
  `IMG_URL` VARCHAR(250),
  `NUMBER` INT,
  `DECS` TEXT,
  `CATEGORY` VARCHAR(100),
  `TOP_PRODUCT` INT
);
CREATE TABLE `SUB_IMG_URL` (
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `PID` BIGINT NOT NULL,
    `IMG_URL` VARCHAR(250),
    FOREIGN KEY (`PID`) REFERENCES `PRODUCT`(`ID`)
);
CREATE TABLE `ACCOUNT` (
  `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
  `CMND` VARCHAR(10),
  `FNAME` VARCHAR(50),
  `PHONE` VARCHAR(10),
  `ADDRESS` TEXT,
  `USERNAME` VARCHAR(50),
  `PWD` VARCHAR(50),
  `IMG_URL`  VARCHAR(250),
  `RANK` INT
);
CREATE TABLE `CART`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `UID` BIGINT NOT NULL,
    `TIME` DATE,
    `STATE` tinyint DEFAULT 0,
    FOREIGN KEY (`UID`) REFERENCES `ACCOUNT`(`ID`) 
);
CREATE TABLE `PRODUCT_IN_CART`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `PID` BIGINT NOT NULL,
    `OID` BIGINT NOT NULL,
    `QUANTITY` INT DEFAULT 1,
    `SIZE` VARCHAR(5) DEFAULT "L",
    FOREIGN KEY (`PID`) REFERENCES `PRODUCT`(`ID`),
    FOREIGN KEY (`OID`) REFERENCES `CART`(`ID`)
);
CREATE TABLE `COMMENT`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `PID` BIGINT NOT NULL,
    `UID` BIGINT NOT NULL,
    `STAR` INT DEFAULT 5,
    `CONTENT` TEXT,
    `TIME` DATE,
    FOREIGN KEY (`UID`) REFERENCES `ACCOUNT`(`ID`) 
);
CREATE TABLE `NEWS`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `CID` BIGINT,
    `KEY` VARCHAR(50),
    `TIME` DATE,
    `TITLE` VARCHAR(70),
    `CONTENT` TEXT,
    `IMG_URL` VARCHAR(50),
    `SHORT_CONTENT` VARCHAR(300)
);
CREATE TABLE `COMMENT_NEWS`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `NID` BIGINT NOT NULL,
    `CID` BIGINT NOT NULL,
    `CONTENT` TEXT,
    `TIME` DATE,
    FOREIGN KEY (`CID`) REFERENCES `ACCOUNT`(`ID`),
    FOREIGN KEY (`NID`) REFERENCES `NEWS`(`ID`) 
);
CREATE TABLE `CYCLE`( 
    `ID` int PRIMARY KEY, 
    `CYCLE` VARCHAR(10) 
);
CREATE TABLE `COMBO`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `NAME` VARCHAR(50),
    `COST` INT DEFAULT 0
);
CREATE TABLE `PRODUCT_IN_COMBO`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `CBID` INT NOT NULL,
    `PID` BIGINT NOT NULL,
    FOREIGN KEY (`PID`) REFERENCES `PRODUCT`(`ID`),
    FOREIGN KEY (`CBID`) REFERENCES `COMBO`(`ID`)
);
CREATE TABLE `MESSAGE`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `FNAME` VARCHAR(100) NOT NULL,
    `EMAIL` VARCHAR(250),
    `PHONE` VARCHAR(10),
    `SUBJECT` VARCHAR(250),
    `CONTENT` TEXT,
    `CHECK` TINYINT DEFAULT 0
);
CREATE TABLE `ORDER_COMBO`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `UID` BIGINT,
    `CBID` INT NOT NULL,
    `TIME` DATE,
    `CYCLE` INT,
    `SIZE` VARCHAR(10),
    `STATE` tinyint DEFAULT 0,
    FOREIGN KEY (`CBID`) REFERENCES `COMBO`(`ID`),
    FOREIGN KEY (`UID`) REFERENCES `ACCOUNT`(`ID`),
    FOREIGN KEY (`CYCLE`) REFERENCES `cycle`(`ID`)
);
CREATE TABLE `BAN_ACCOUNT`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `CMND` VARCHAR(10)
);


-- product value
INSERT INTO `product`(`product`.`ID`, `product`.`NAME`, `product`.`PRICE`, `product`.`IMG_URL`, `product`.`NUMBER`, `product`.`DECS`, `product`.`CATEGORY`, `product`.`TOP_PRODUCT`) VALUES
(1, "Shirt 1", 150000, "https://mcdn2.coolmate.me/uploads/November2021/1-0_copyu.jpg", 20, "Và chiếc áo Polo Cotton Compact Prime-Everyday ra mắt chính là sự cải tiến Coolmate muốn dành cho bạn, bởi đó là sự kết hợp giữa độ vừa vặn trong form dánh như một chiếc áo thun và sự thoải mái đến từ chất liệu Cotton Compact chất lượng cao, chiếc áo Polo Cotton Compact Prime-Everyday chính là chiếc áo cho câu trả lời của những chàng trai muốn tối ưu thời gian trong mỗi buổi sáng bởi sự tiện lợi và \"sẵn sàng để mặc\". ", "Shirt", 1),
(2, "Shirt 2", 150000, "https://mcdn2.coolmate.me/uploads/November2021/monster4_56.jpg", 20, "Sự đặc biệt từ Áo nam Classic Sweatshirt chính là nằm ở phần thiết kế mới và kiểu dệt, Coolmate đã dành rất nhiều thời gian từ chọn vải nhưng không tìm được loại vải phù hợp: nếu ấm thì sẽ dễ bị xù lông, nếu ấm và không xù thì chiếc áo bạn mặc sẽ nặng và khó chịu vô cùng,... chúng tôi đã bắt tay vào chọn những sợi vải 90% Cotton đem đến cho khách hàng 1 chiếc áo Cotton mềm mại vừa đủ mà vẫn giữ ấm còn không gây bí khi mặc.", "Shirt", 0),
(3, "Bambi Print Mini Backpack", 150000, "https://mcdn2.coolmate.me/uploads/November2021/IMG_68181.jpg", 20, "Quần Jogger nam chính là chiếc quần hội tụ các đặc điểm vô cùng nổi bật để đem đến cho khách hàng những trải nghiệm tốt nhất đến với người mặc. Quần All Week Jogger nổi bật với cách dệt kiểu Interlock là một mặt vải phẳng, trơn. Các vòng lặp trong kiểu dệt này có tác dụng làm tăng diện tích tiếp xúc với chất lỏng và hút nước nhanh hơn. Do đó loại vải này giúp người mặc cảm thấy thông thoáng, giảm nhiệt, giữ da luôn khô thoáng.", "Trousers", 1),
(4, "Bucket Hat", 150000, "https://mcdn2.coolmate.me/uploads/November2021/b6_73.jpg", 20, "Nếu bạn đã sở hữu những chiếc mũ lưỡi trai thuần nam tính hoặc những dáng mũ fedora lịch lãm, kiểu dáng mũ cao bồi cách điệu bụi bặm, và đang muốn tìm cho mình một chiếc mũ mang đến vẻ trẻ trung, năng động thì Bucket Hat chính là câu trả lời của bạn đây. Care & Share ra mắt phiên bản mũ Bucket Hat cùng với nhiều thiết kế ấn tượng nhưng không hề mất đi vẻ nam tính, đơn giản của bạn khi mang chiếc mũ này nhé!", "Accessories", 1);

-- account
INSERT INTO `account`(`account`.`CMND`, `account`.`FNAME`, `account`.`PHONE`, `account`.`ADDRESS`, `account`.`USERNAME`, `account`.`PWD`, `account`.`IMG_URL`, `account`.`RANK`)VALUES
("312451293", "Phạm Minh Hiếu", "0973409127", "tx Gò Công, Tiền Giang", "hieu.phamgc", "helloworld", "./Views/images/profile.png", 100),
("312451746", "Nguyễn Hoài Thương", "0869125690", "tx Gò Công, Tiền Giang", "nhthuong", "helloworld", "./Views/images/profile.png", 100);

-- comment
INSERT INTO `comment`(`comment`.`PID`, `comment`.`UID`, `comment`.`STAR`, `comment`.`CONTENT`, `comment`.`TIME`) VALUES
(1, 1, 5, "test", "2021-10-20"),
(1, 1, 3, "abcd", "2021-10-30"),
(1, 1, 1, "Không thích :v", "2021-10-28"),
(1, 2, 5, "Toẹt dời", "2021-11-23"),
(2, 1, 3, "Hơi tệ tí nhe", "2021-11-11"),
(3, 1, 4, "Tạm ổn", "2021-11-20");

-- combo
INSERT INTO `combo` (`combo`.`ID`, `combo`.`NAME`, `combo`.`COST`)VALUES 
(1, "Combo 1", 299000);

-- product in combo
INSERT INTO `product_in_combo`(`product_in_combo`.`ID`, `product_in_combo`.`CBID`, `product_in_combo`.`PID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- cycle
INSERT INTO `cycle`(`cycle`.`ID`, `cycle`.`CYCLE`) VALUES
(1, "15 ngày"),
(2, "30 ngày"),
(3, "45 ngày");
-- cart
INSERT INTO `cart`(`cart`.`UID`, `cart`.`TIME`) VALUES
(1, "2021/11/24"),
(1, "2021/11/25"), 
(1, "2021/11/25");
-- product_in_cart
INSERT INTO `product_in_cart` (`product_in_cart`.`PID`, `product_in_cart`.`OID`) VALUES
(1, 1),
(2, 1),
(3, 1);
-- order combo
INSERT INTO `order_combo`(`order_combo`.`UID`, `order_combo`.`CBID`, `order_combo`.`TIME`, `order_combo`.`CYCLE`, `order_combo`.`SIZE`)
VALUES(1, 1, "2021/11/26", 1, "XXL");

-- sub_img_url
INSERT INTO `sub_img_url`(`sub_img_url`.`ID`, `sub_img_url`.`PID`, `sub_img_url`.`IMG_URL`) VALUES
(1, 1, "https://mcdn2.coolmate.me/uploads/November2021/1-2_17.jpg"),
(2, 1, "https://mcdn2.coolmate.me/uploads/November2021/1-3_16.jpg"),
(3, 1, "https://mcdn2.coolmate.me/uploads/November2021/IMG_4751.jpg"),
(4, 1, "https://mcdn2.coolmate.me/uploads/November2021/IMG_4758.jpg"),
(5, 2, "https://mcdn2.coolmate.me/uploads/November2021/monster3.jpg"),
(6, 2, "https://mcdn2.coolmate.me/uploads/November2021/monster2.jpg"),
(7, 2, "https://mcdn2.coolmate.me/uploads/November2021/monster1.jpg"),
(8, 2, "https://mcdn2.coolmate.me/uploads/November2021/single6_91.jpg"),
(9, 3, "https://mcdn2.coolmate.me/uploads/November2021/IMG_6823.jpg"),
(10, 3, "https://mcdn2.coolmate.me/uploads/November2021/IMG_6835.jpg"),
(11, 3, "https://mcdn2.coolmate.me/uploads/November2021/IMG_6833.jpg"),
(12, 3, "https://mcdn2.coolmate.me/uploads/November2021/den-3_copyu.jpg"),
(13, 4, "https://mcdn2.coolmate.me/uploads/November2021/cun4_51.jpg"),
(14, 4, "https://mcdn2.coolmate.me/uploads/November2021/cun5_14.jpg"),
(15, 4, "https://mcdn2.coolmate.me/uploads/November2021/b1.jpg"),
(16, 4, "https://mcdn2.coolmate.me/uploads/November2021/cun2_(1).jpg");

INSERT INTO `news`(`news`.`ID`, `news`.`CID`, `news`.`KEY`, `news`.`TIME`, `news`.`TITLE`, `news`.`CONTENT`, `news`.`IMG_URL`, `news`.`SHORT_CONTENT`) VALUES
(1, 1, "Localbrand", "2021/02/20", "Phá tan sự nhàm chán bằng loạt kiểu phối đồ Streetwear Style", "'Street Style chính là một cụm từ khá quen thuộc. Nhưng bạn có thực sự hiểu rõ được ý nghĩa là thật sự của Street Style là gì? Và xu hướng của thời trang này tại Việt Nam chưa? Hôm nay, Chipi sẽ chia sẻ giúp bạn hiểu rõ hơn về phong cách thời trang này, cùng tham khảo nhé!\n\n\nStreet Style hay còn gọi là phong cách thời trang đường phố, cũng giống như tên gọi của nó. Đây chính là phong cách thời trang không phải phát triển từ những bộ sưu tập của nhà thiết kế mà từ đường phố.\n\nHiện nay bạn có thể dễ dàng thấy được Street Style ở bất cứ đâu trong giới trẻ trên đường phố. Chắc chắn phong cách thời trang này sẽ được giới trẻ ưa chuộng trong năm nay. Không giống như những phong cách thời trang khác, Street Style giống một cốc sinh tố hỗn hợp của rất nhiều phong cách khác nhau.\n\nKhó có thể chỉ ra được đặc điểm cụ thể của một Street Style. Bởi lẽ chúng được kết hợp từ khá nhiều phong cách khác nhau, nó dựa trên những gu thẩm mỹ của mỗi người. Vô cùng biến hoá và năng động với nhiều thiết kế trang phục khác nhau. Cùng với đó là phụ kiện đi kèm khá đa dạng và phong phú. \n\nChính bởi sự ngẫu hứng và năng động này mà Street Style đã trở thành một nguồn cảm hứng bất tận dành cho giới trẻ hiện nay. Đem tới sự tự do thoải mái trong việc chọn lựa những bộ trang phục thể hiện cá tính của mình.", "./Views/images/news_4.png", "Gợi ý những set đồ street style cực chất từ các local brand giúp các bạn thay vì mua riêng…"),
(2, 1, "Localbrand", "2021/07/01", "BST SS21 Nonnative brand phân lớp theo mùa cao điểm", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix & match theo phong cách quân đội và các mặt hàng chủ lực thông thường. Cụ thể về bộ sưu tập sẽ được bật mí qua bài viết sau đây. \n\n\n <h6>Phương pháp thiết kế đặc trưng của Nonnative brand thể hiện trong từng BST</h6> \n Mang đến sự tiếp cận thông minh đối với thiết kế hàng may mặc hướng đến sự đơn giản tinh tế thay vì thời trang dạo phố lấy biểu tượng làm trung tâm.\n\n<h6>Nonnative brand đơn giản nhưng độc đáo</h6>\nGiám đốc sáng tạo Takayuki Fujii đã không giám sát Nonnative brand kể từ khi thành lập, nhưng dưới tầm nhìn của ông, thương hiệu đã phát triển thành một thế lực đáng nể trong thời trang Nhật Bản; Mùa xuân / mùa hè năm 2021, “South” là mùa thứ 39 của thương hiệu, chắt lọc những nét đặc trưng của hãng thành một dòng sản phẩm đơn giản \n\n <h6>Nguồn cảm hứng trong thiết kế từ Nonnative brand</h6>\nVới BST trước từ Nonnative brand “Winter & Spring”, “South” được tự do sử dụng phong cách mùa hè và mùa thu, lấy cảm hứng từ New Zealand. Nguồn cảm hứng New Zealand cũng xuất hiện nhờ đồ họa lấy cảm hứng từ hãng thu âm cổ điển, những chiếc áo phông và áo len chui đầu thoải mái.\n\nMàu đất và tông màu xanh nước biển lấy cảm hứng từ bầu trời đêm trong vắt tạo nên sự đa dạng cho nhiều loại áo khoác dã chiến, áo khoác dạ, áo khoác dạ và áo len của quân đội hay họa tiết đậm có nguồn gốc từ Liberty London.\n\nCác loại vải kỹ thuật tiên tiến, bao gồm GORE-TEX INFINIUM, Pliantex và polyester tăng độ bóng dễ nhận biết. Một số loại giày bao gồm từ giày thể thao vải chống thấm nước đến giày bốt da của Ý, tất cả đều lý tưởng để xếp chồng những đường cắt ống quần Dweller mới hoặc hoàn thiện outfit với quần short và tất rộng.", "./Views/images/news_3.jpg", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix…"),
(3, 1, "Retro", "2021/04/01", "Giày Ananas chiến binh thầm lặng", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần đây.Chúng ta cùng đi tìm hiểu về xuất xứ của thương hiệu giày nổi tiếng này, xem nó có phải là thương hiệu chuẩn Local Brand Việt Nam hay không?\n\n\n<h6>Cái tên Ananas</h6>\nAnanas là một thương hiệu có đăng kí tại Việt Nam, và đồng thời cũng có nhà máy sản xuất trực tiếp trong nước. Mặc dù là một thương hiệu đã tồn tại từ 2012 nhưng Ananas chỉ mới được biết đến gần đây bằng chính những nỗ lực cố gắng vươn lên không ngừng nghỉ của mình khi liên tục cho ra mắt những sản phẩm bắt nhịp xu hướng và sáng tạo hơn..\n\nKhông chỉ có vậy, thương hiệu này còn được các bạn trẻ lựa chọn mua sắm vì các sản phẩm đều sở hữu mức giá mềm, phù hợp với mọi tầng lớp cũng như các hoạt động.\n\nMặc dù là một thương hiệu mới, nhưng tính cho đến thời điểm hiện tại, Ananas  Việt Nam đã sở hữu rất nhiều store tại TP. HCM. Thương hiệu giày thời trang này vẫn đang tiếp tục mở rộng và phát triển chuỗi cửa hàng trên toàn quốc, để đông đảo người tiêu dùng có thể biết đến sản phẩm của thương hiệu này.\n\n<h6>Giày Sneaker Ananas</h6>\nMột trong những dòng sản phẩm nổi bật của Ananas phải kể đến dòng Sneaker đang hot hit trên thị trường hiện nay. Những đôi giày Sneaker dây buộc khá linh hoạt, thuận tiện cho người sử dụng. Ngoài ra, đế giày được thiết kế không dày như những sản phẩm của thương hiệu khác, khiến cho bạn cảm thấy gọn nhẹ hơn. Lớp lót giày cũng được thiết kế êm ái, đem lại cho bạn cảm giác thoải mái khi sử dụng sản phẩm.\n\nKhông chỉ có vậy, những đôi giày Sneaker được thiết kế đa dạng về mẫu mã cũng như màu sắc mà còn sở hữu mức giá khá hấp dẫn. Vì vậy, bạn sẽ không phải chi quá nhiều tiền cho niềm đam mê giày sneaker của mình, khi sắm cho mình một đôi hiệu Ananas đâu nhé!","./Views/images/news_5.jpg", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần…"),
(4, 1, "Retro", "2021/04/01", "Giày Ananas chiến binh thầm lặng", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần đây.Chúng ta cùng đi tìm hiểu về xuất xứ của thương hiệu giày nổi tiếng này, xem nó có phải là thương hiệu chuẩn Local Brand Việt Nam hay không?\n\n\n<h6>Cái tên Ananas</h6>\nAnanas là một thương hiệu có đăng kí tại Việt Nam, và đồng thời cũng có nhà máy sản xuất trực tiếp trong nước. Mặc dù là một thương hiệu đã tồn tại từ 2012 nhưng Ananas chỉ mới được biết đến gần đây bằng chính những nỗ lực cố gắng vươn lên không ngừng nghỉ của mình khi liên tục cho ra mắt những sản phẩm bắt nhịp xu hướng và sáng tạo hơn..\n\nKhông chỉ có vậy, thương hiệu này còn được các bạn trẻ lựa chọn mua sắm vì các sản phẩm đều sở hữu mức giá mềm, phù hợp với mọi tầng lớp cũng như các hoạt động.\n\nMặc dù là một thương hiệu mới, nhưng tính cho đến thời điểm hiện tại, Ananas  Việt Nam đã sở hữu rất nhiều store tại TP. HCM. Thương hiệu giày thời trang này vẫn đang tiếp tục mở rộng và phát triển chuỗi cửa hàng trên toàn quốc, để đông đảo người tiêu dùng có thể biết đến sản phẩm của thương hiệu này.\n\n<h6>Giày Sneaker Ananas</h6>\nMột trong những dòng sản phẩm nổi bật của Ananas phải kể đến dòng Sneaker đang hot hit trên thị trường hiện nay. Những đôi giày Sneaker dây buộc khá linh hoạt, thuận tiện cho người sử dụng. Ngoài ra, đế giày được thiết kế không dày như những sản phẩm của thương hiệu khác, khiến cho bạn cảm thấy gọn nhẹ hơn. Lớp lót giày cũng được thiết kế êm ái, đem lại cho bạn cảm giác thoải mái khi sử dụng sản phẩm.\n\nKhông chỉ có vậy, những đôi giày Sneaker được thiết kế đa dạng về mẫu mã cũng như màu sắc mà còn sở hữu mức giá khá hấp dẫn. Vì vậy, bạn sẽ không phải chi quá nhiều tiền cho niềm đam mê giày sneaker của mình, khi sắm cho mình một đôi hiệu Ananas đâu nhé!","./Views/images/news_5.jpg", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần…"),
(5, 1, "Coolmate", "2021/07/05", "Review của BP-Guide về trải nghiệm mua sắm tại Coolmate", 'Trên thị trường Việt Nam đã tồn tại rất nhiều website thời trang online uy tín dành cho nữ giới, tuy nhiên mảng thời trang nam dường như vẫn còn đang bỏ ngỏ. Nắm bắt được nhu cầu mua sắm thời trang online của phái mạnh, Coolmate đã ra đời để cung cấp cho cánh mày râu những sản phẩm chất lượng với một phong cách mua sắm tiện lợi và an tâm nhất. Mời bạn cùng Bp-guide theo dõi câu chuyện kinh doanh thú vị của doanh nghiệp này qua bài phỏng vấn dưới đây nhé! \n\n\n <h5 class="text-warning">"Cool" + "Mate" = người bạn Coolmate trẻ trung năng động</h5> \nThị trường thương mại điện tử Việt Nam không có quá nhiều lựa chọn chuyên sâu cho nam giới, điều đó đồng nghĩa với việc nam giới Việt Nam vẫn đang có những nhu cầu mong muốn được đáp ứng. Hiểu được tâm lý đó, thương hiệu Coolmate ra đời với mục đích đem đến cho khách hàng thêm một lựa chọn tuyệt vời để việc mua sắm những món đồ mặc thật tiện lợi và an tâm. Coolmate mong muốn mang lại cho khách hàng sự tự tin và thoải mái với những sản phẩm chất lượng và trải nghiệm mua sắm hài lòng.\n\n <div class=\"w-75 mx-auto mt-3 mb-5\"><img src="https://ds393qgzrxwzn.cloudfront.net/resize/m720x480/cat1/img/images/0/uL9IkDIY9V.jpg" class=\"rounded img-fluid\"> </div><h5 class="text-warning">Thương hiệu ra đời nhờ sự thấu hiểu tâm lý khách hàng</h5>\nBao giờ cũng vậy, những bước đầu tiên của hành trình kinh doanh luôn chất đầy sự khó khăn, vất vả. Tuy nhiên, bằng sự nỗ lực học hỏi và không ngừng tiến về phía trước cùng tinh thần đoàn kết, đồng lòng của đội ngũ nhân sự, Coolmate đã cố gắng hết sức để mang đến cho người tiêu dùng những sản phẩm tốt nhất cũng như tiếp tục kiên trì đưa doanh nghiệp vượt qua khoảng thời gian nhiều thử thách. Sự nghiêm túc và tận tâm với công việc của mình đã khiến Coolmate đạt được thành quả như ngày hôm nay với sự yêu mến, tin tưởng và nhiều phản hồi tích cực của khách hàng. Vậy nên chẳng có lý do gì mà chúng ta lại không nhiệt tình đón nhận những sản phẩm chất lượng của Coolmate đúng không nào?<div class=\"w-75 mx-auto mt-3 mb-5\"><img src="	https://mcdn.coolmate.me/image/February2021/DSC09632.jpg" class=\"rounded img-fluid\"> </div><h5 class="text-warning">Chất liệu vải độc đáo và quy trình sản xuất tiêu chuẩn của Coolmate</h5>\nQuy trình sản xuất của Coolmate sẽ đi từ sợi. Mặc dù biết rằng quần sịp chất liệu cotton sẽ khiến người mặc thoải mái, dễ chịu nhưng khi có thông tin về chất liệu bamboo, modal mát hơn, thấm hút mồ hôi tốt hơn... thì Coolmate sẽ đi tìm nhà cung cấp về sợi, về vải để đặt hàng loại vải đáp ứng được những tính năng mà khách hàng mong muốn, mặc như không mặc, mặc vào sẽ thoáng mát, không bị những vết hằn... Nói cách khác, Coolmate luôn lắng nghe mong muốn của khách hàng để từ đó tìm nguồn sợi và vải phù hợp. Sau đó, chính các thành viên của Coolmate sẽ là người mặc thử để trải nghiệm sản phẩm, đóng góp ý kiến để hoàn thiện sản phẩm mẫu trước khi đưa vào sản xuất đại trà. Chính vì vậy, hầu như mọi sản phẩm của Coolmate đều có sự hoàn thiện về chất lượng trước khi đến tay khách hàng.\n\nKhông chỉ tập trung vào việc phát triển kinh doanh, thương hiệu Coolmate còn mong muốn đóng góp cho xã hội bằng những hành động thiện nguyện vô cùng thiết thực, thể hiện cái tâm và tinh thần trách nhiệm của đội ngũ nhân sự đối với cộng đồng - đây quả thực là điều vô cùng đáng hoan nghênh và trân trọng.',"./Views/images/news_8.jpg", "Coolmate - Website mua sắm online của cánh mày râu thời hiện đại"),
(6, 1, "Sneaker", "2021/04/03", "Top 03 màu giày sneaker phối đồ cực đỉnh cho nam", " Trong những đôi giày thường xuyên xuất hiện trong các outfit của các chàng trai thì không thể nào không nhắc đến sneaker - đôi giày với sự thoải mái tuyệt đối cùng với sự dễ dàng trong phong cách phối đồ. Chính vì vậy mà trong bài viết này, Coolmate sẽ hướng dẫn các bạn top 05 màu giày sneaker cực đỉnh để phối đồ cho nam nhé. Chiến thôi nào! \n\n\n <h6>1. Màu đen cá tính </h6>\nMột gam màu giày sneaker được lựa chọn rất nhiều vì sự phổ biến cũng như không có dấu hiệu lỗi thời, màu đen luôn là sự lựa chọn hàng đầu của nam giới đối với bất kỳ outfit nào. Một chiếc quần jeans xanh kết hợp với áo thun trắng sẽ rất thích hợp với giày sneaker đen. Nếu bạn chưa biết thì một trong những lợi thế lớn nhất của màu giày sneaker đen đó là làm “nổi bần bật” những gam màu khác đấy. \n\nNgoài ra, bạn nên tận dụng sắc đen của sneaker để chọn những đôi giày cho mục đích tập luyện thể thao, đặc biệt là đối với môi trường có nhiều nước hoặc bùn đất vì đôi giày sẽ không bị lấm lem quá mức cũng như biến đổi màu sắc. Những trang phục đi kèm hợp lý sẽ là áo hoodie, áo khoác da, quần short và quần kaki. Bên cạnh đó, khéo léo phối hợp thêm những phụ kiện như đồng hồ, dây chuyền hay mũ lưỡi trai sẽ giúp tăng phần “ngầu lòi”.\n\n <h6>2. Màu trắng thuần khiết</h6>\nKhông cần phải bàn về màu trắng khi đây không chỉ là một phối màu giày sneaker rất được ưa chuộng mà còn là một màu sắc biểu tượng của ngành thời trang. Nếu lựa chọn những đôi giày sneaker có màu trắng, hãy lưu ý rằng outfit của bạn phải có một màu sắc nổi bật hoặc trái màu để tạo nên sự kết hợp hoàn hảo nhất chứ đừng chọn những chiếc áo hoặc quần màu trắng luôn nhé, nó sẽ khiến cho tổng thể bị chìm đấy. \n\nNgoài ra, màu giày sneaker này sẽ phù hợp với những phong cách công sở hoặc đi bộ nhẹ nhàng hơn là những lúc cần vận động nhiều vì màu trắng sẽ rất dễ bám màu và rất khó để tẩy rửa. Ngoài ra, tình hình thời tiết cũng góp một vai trò rất lớn đến quyết định sở hữu một đôi giày sneaker màu trắng, do đó hãy lưu ý vấn đề này để không chọn sai bạn nhé. \n\n<h6>3. Màu đỏ chất chơi </h6>\nNghe đến màu giày sneaker này là bạn đã cảm giác \'rực lửa\' rồi phải không nào? Đúng như vậy, một đôi sneaker màu đỏ sẽ giúp bạn trở nên cực kỳ nổi bật ở bất kỳ nơi nào bạn đến, tuy nhiên, làm thế nào để kết hợp một cách hài hoà bộ trang phục của bạn với màu sắc này? Rất đơn giản, hãy ghi nhớ nguyên tắc này nhé: \n\nVì màu đỏ rất thu hút sự chú ý, do đó mà hãy khéo léo diện những trang phục màu đen hoặc trắng để tôn lên sự hiện diện của đôi giày sneaker vì đây sẽ là điểm nhấn chính của bạn\n\nThường thì bạn sẽ thấy màu đỏ hay đi kèm màu xanh lá trong những dịp Giáng sinh, thế nhưng sự kết hợp này ở ngoài đời sẽ khiến người đối diện bạn cảm thấy rối mắt, vì vậy hãy hạn chế hoặc không nên diện những trang phục màu xanh lá để đi kèm với màu giày sneaker đỏ\n\nTốt nhất không nên sử dụng gam màu này trong môi trường công sở hoặc những nơi yêu cầu sự nghiêm túc vì màu giày sneaker này hoàn toàn không phù hợp\n\n<h5>Tổng kết</h5>\nTrên đây là top 05 màu giày sneaker để phối đồ cực đỉnh cho nam và những tips chọn giày sneaker tùy theo nhu cầu của các chàng trai. Hãy tham khảo kỹ tủ đồ của mình để chọn được một đôi giày phù hợp với bản thân nhất.","./Views/images/news_6.jpg", "Giày sneaker vốn đã không còn quá xa lạ với những tín đồ yêu mến thời trang. Thế nhưng bạn đã biết đến những màu giày sneaker phối màu cực đỉnh cho nam chưa?");


INSERT INTO `comment_news`(`comment_news`.`ID`, `comment_news`.`NID`, `comment_news`.`CID`, `comment_news`.`CONTENT`, `comment_news`.`TIME`) VALUES
(1, 1, 1, "Bài viết tuyệt vời!", "2021-10-20");

-- message
INSERT INTO `message` (`message`.`FNAME`, `message`.`EMAIL`, `message`.`PHONE`, `message`.`SUBJECT`, `message`.`CONTENT`) VALUES
("Phạm Minh Hiếu", "phamminhhieu1594@gmail.com", "0973409127", "last test", "Shop xịn nha bạn!!");