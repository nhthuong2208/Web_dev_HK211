DROP SCHEMA IF EXISTS `Web_DB`;
CREATE SCHEMA `Web_DB`;
USE `Web_DB`;

CREATE TABLE `PRODUCT`(
  `ID` BIGINT PRIMARY KEY NOT NULL,-- 4 số 
  `NAME` VARCHAR(100),
  `PRICE` INT,
  `IMG_URL` VARCHAR(250),
  `NUMBER` INT,
  `DECS` TEXT,
  `CATEGORY` VARCHAR(100),
  `TOP_PRODUCT` INT
);

CREATE TABLE `SUB_IMG_URL` (
    `ID` INT PRIMARY KEY,
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
CREATE TABLE `COMMENT_NEWS`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `CID` BIGINT NOT NULL,
    `UID` BIGINT NOT NULL,
    `CONTENT` TEXT,
    `TIME` DATE,
    FOREIGN KEY (`CID`) REFERENCES `ACCOUNT`(`ID`) 
);
CREATE TABLE `NEWS`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `CID` BIGINT,
    `KEY` VARCHAR(50),
    `TIME` DATE,
    `TITLE` VARCHAR(70),
    `CONTENT` TEXT,
    `IMG_URL` VARCHAR(50),
    `SHORT_CONTENT` VARCHAR(300),
    FOREIGN KEY (`CID`) REFERENCES `COMMENT_NEWS`(`ID`) 
);
CREATE TABLE `cycle`( 
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
    `CONTENT` TEXT
);
CREATE TABLE `ORDER_COMBO`(
    `ID` INT PRIMARY KEY AUTO_INCREMENT,
    `UID` BIGINT,
    `CBID` INT NOT NULL,
    `TIME` DATE,
    `CYCLE` INT,
    `SIZE` VARCHAR(10),
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
(1, "Shirt 1", 150000, "./Views/images/shirt_1.jpg", 20, "test", "Shirt", 1),
(2, "Shirt 2", 150000, "./Views/images/shirt_2.jpg", 20, "test", "Shirt", 0),
(3, "Bambi Print Mini Backpack", 150000, "https://media.coolmate.me/uploads/September2021/a56_51.jpg", 20, "test", "Trousers", 1),
(4, "Bucket Hat", 150000, "https://media.coolmate.me/uploads/August2021/4-0_98.jpg", 20, "Nếu bạn đã sở hữu những chiếc mũ lưỡi trai thuần nam tính hoặc những dáng mũ fedora lịch lãm, kiểu dáng mũ cao bồi cách điệu bụi bặm, và đang muốn tìm cho mình một chiếc mũ mang đến vẻ trẻ trung, năng động thì Bucket Hat chính là câu trả lời của bạn đây. Care & Share ra mắt phiên bản mũ Bucket Hat cùng với nhiều thiết kế ấn tượng nhưng không hề mất đi vẻ nam tính, đơn giản của bạn khi mang chiếc mũ này nhé!", "Accessories", 1);

-- account
INSERT INTO `account`(`account`.`CMND`, `account`.`FNAME`, `account`.`PHONE`, `account`.`ADDRESS`, `account`.`USERNAME`, `account`.`PWD`, `account`.`RANK`)VALUES
("312451293", "Phạm Minh Hiếu", "0973409127", "tx Gò Công, Tiền Giang", "hieu.phamgc", "helloworld", 100);

-- comment
INSERT INTO `comment`(`comment`.`PID`, `comment`.`UID`, `comment`.`STAR`, `comment`.`CONTENT`, `comment`.`TIME`) VALUES
(1, 1, 5, "test", "2021-10-20");

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
INSERT INTO `cart`(`cart`.`UID`, `cart`.`TIME`) VALUES(1, "2021/11/24");
-- product_in_cart
INSERT INTO `product_in_cart` (`product_in_cart`.`PID`, `product_in_cart`.`OID`) VALUES
(1, 1),
(2, 1),
(3, 1);

INSERT INTO `comment_news`(`comment_news`.`ID`, `comment_news`.`CID`, `comment_news`.`CONTENT`, `comment_news`.`TIME`) VALUES
(1, 1, "Bài viết tuyệt vời!", "2021-10-20");


INSERT INTO `news`(`news`.`ID`, `news`.`CID`, `news`.`KEY`, `news`.`TIME`, `news`.`TITLE`, `news`.`CONTENT`, `news`.`IMG_URL`, `news`.`SHORT_CONTENT`) VALUES
(1, 1, "Localbrand", "2021/02/20", "Phá tan sự nhàm chán bằng loạt kiểu phối đồ Streetwear Style", "Street Style chính là một cụm từ khá quen thuộc. Nhưng bạn có thực sự hiểu rõ được ý nghĩa là thật sự của Street Style là gì? Và xu hướng của thời trang này tại Việt Nam chưa? Hôm nay, Chipi sẽ chia sẻ giúp bạn hiểu rõ hơn về phong cách thời trang này, cùng tham khảo nhé!

 
Street Style hay còn gọi là phong cách thời trang đường phố, cũng giống như tên gọi của nó. Đây chính là phong cách thời trang không phải phát triển từ những bộ sưu tập của nhà thiết kế mà từ đường phố.

Hiện nay bạn có thể dễ dàng thấy được Street Style ở bất cứ đâu trong giới trẻ trên đường phố. Chắc chắn phong cách thời trang này sẽ được giới trẻ ưa chuộng trong năm nay. Không giống như những phong cách thời trang khác, Street Style giống một cốc sinh tố hỗn hợp của rất nhiều phong cách khác nhau.

Khó có thể chỉ ra được đặc điểm cụ thể của một Street Style. Bởi lẽ chúng được kết hợp từ khá nhiều phong cách khác nhau, nó dựa trên những gu thẩm mỹ của mỗi người. Vô cùng biến hoá và năng động với nhiều thiết kế trang phục khác nhau. Cùng với đó là phụ kiện đi kèm khá đa dạng và phong phú. 

Chính bởi sự ngẫu hứng và năng động này mà Street Style đã trở thành một nguồn cảm hứng bất tận dành cho giới trẻ hiện nay. Đem tới sự tự do thoải mái trong việc chọn lựa những bộ trang phục thể hiện cá tính của mình. 

Đặc điểm của Street Style này được thực hiện bởi chính xu hướng quần áo mà những người này chọn mặc. Nếu như bạn nhìn vào những thế hệ trong quá khứ, sẽ dễ dàng thấy rằng mỗi một thế hệ sẽ có phong cách thời trang độc đáo của riêng mình.

Trong đó một đặc điểm nổi bật của Street Style là sự ảnh hưởng bởi phong cách Hiphop. Ngày nay Hiphop đã phát triển mạnh và trở thành ngành công nghiệp giải trí có trị giá hàng tỷ đô la. Phong cách thời trang đường phố Hiphop đã bắt đầu từ những người Mỹ gốc Phi, sau đó nó chuyển sang ngành công nghiệp âm nhạc. Đây cũng là phong cách được những người nổi tiếng hay vận động viên dùng.

Từ sàn diễn thời trang cao cấp như Lanvin, Versace, cho đến Lookbook của cách thương hiệu bình dân Zara, Free People, Topshop đều lăng xê những thiết kế mang đậm chất Bohemian. Chính vì vậy xu hướng Street Style từ phong cách Bohemian sẽ lên ngôi trong năm nay. 

Phong cách này đem tới cho người mặc sự bay bổng, phóng khoáng, hoang dại. Đồng thời còn tập trung khai thác chất liệu như lông thú, lông vũ, da, da lộn, ren, voan và những loại vải với hoa văn sặc sỡ. item chủ chốt của Boho Street Style bao gồm có chân váy da lộn, quần jean lưng cao rách, cùng với đôi giày cao gót sandal, túi xách, áo Jacket da thú và phụ kiện tua rua.

Preppy là một phong cách mang hơi hướng công sở, văn phòng và trường học. Bắt đầu từ mùa Xuân-Hè năm trước và nó đã dần trở thành một trào lưu mạnh mẽ, khá phổ biến trong phong cách ăn mặc của giới trẻ ngày nay. Điểm cộng của phong cách thời trang đường phố này là đem tới cho người mặc sự gọn gàng, thanh lịch, lịch sự. Preppy Style phù hợp với rất nhiều hoàn cảnh khác nhau.

Item đặc trưng của phong cách thời trang này là chiếc áo sơ mi trắng, xanh bầu trời, và sọc hay áo Sweater sọc hai màu cùng với giày Oxford, Sneaker trắng, quần Chinos và áo sơ mi cổ trụ. 

Mạnh mẽ, lạ mắt, bí ẩn, năng động, mang đậm dấu ấn của đường phố chính là Streetgoth. Phong cách thời trang này tập trung khai thác tại bảng màu trung tính như xám, trắng, đen cùng vài sắc màu như xanh rêu, màu nude. 

Ninja Goth chính là một biến thể khác của phong cách Street Goth. Phong cách thời trang này phát triển mạnh mẽ tại những nơi có nền văn hóa đường phố cùng với nghệ thuật Hiphop phát triển.

Tại Việt Nam, đã xuất hiện một cộng đồng mang tên là Vietnam Street Style Group, họ rất chuộng phong cách thời trang đường phố này. Những tín đồ của Street Style này rất ưa chuộng đôi giày Boots hầm hố và Sneaker.

Ít là nhiều chính là phương châm chính của phong cách Minimalism. Street Style này đã đem tới một cú hích lớn trong ngành thời trang. Bởi nó đã phá vỡ rất nhiều quy tắc từ trước đâu. Đầu tiên, nó đã phá đi ranh giới của size quần áo với những thiết kế có phom dáng Oversize, phồng. 


Bảng màu của phong cách này gồm những tone màu trung tính như trắng, đen, xám, beige, xanh rêu, xanh navy và tất cả chúng đều rất dàng mix với nhau. Chính vì thế mà giới trẻ đã không đắn đo khi mix quần áo với nhau theo phong cách đường phố này. Điểm nhấn của Minimalism chính là kiểu dáng dễ mặc, chất liệu tốt và dễ dàng ứng biến với mọi hoàn cảnh khác nhau. 

Kimono Shirt, Kimono Jacket cùng với họa tiết hoa anh đào, sóng biển, Hello Kitty, núi Phú Sĩ, tóc búi cao cùng với những gam màu nhẹ nhàng, trầm. Tất cả đã tạo nên được một cơn sốt cho giới trẻ yêu thích xu hướng Street Style trong năm nay.

Hy vọng những chia sẻ vừa rồi sẽ giúp bạn hiểu rõ hơn về ý nghĩa của Street Style. Cùng với đó là những xu hướng Street Style đang khiến giới trẻ Việt “mê mệt”. Bạn chọn lựa xu hướng nào, đừng ngại thử ngay nhé!", "./Views/images/news_4.png", "Gợi ý những set đồ street style cực chất từ các local brand giúp các bạn thay vì mua riêng…"),
(2, 1, "Localbrand", "2021/07/01", "BST SS21 Nonnative brand phân lớp theo mùa cao điểm", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix & match theo phong cách quân đội và các mặt hàng chủ lực thông thường. Cụ thể BST sẽ được bật mí qua bài viết sau đây.

Công thức thiết kế nổi bật từ Nonnative brand
Phương pháp thiết kế đặc trưng của Nonnative brand thể hiện trong từng BST. Mang đến sự tiếp cận thông minh đối với thiết kế hàng may mặc hướng đến sự đơn giản tinh tế thay vì thời trang dạo phố lấy biểu tượng làm trung tâm.

Nonnative brand đơn giản nhưng độc đáo
Giám đốc sáng tạo Takayuki Fujii đã không giám sát Nonnative brand kể từ khi thành lập, nhưng dưới tầm nhìn của ông, thương hiệu đã phát triển thành một thế lực đáng nể trong thời trang Nhật Bản; Mùa xuân / mùa hè năm 2021, “South” là mùa thứ 39 của thương hiệu, chắt lọc những nét đặc trưng của hãng thành một dòng sản phẩm đơn giản

Nguồn cảm hứng trong thiết kế từ Nonnative brand
Với BST trước từ Nonnative brand “Winter & Spring”, “South” được tự do sử dụng phong cách mùa hè và mùa thu, lấy cảm hứng từ New Zealand. Nguồn cảm hứng New Zealand cũng xuất hiện nhờ đồ họa lấy cảm hứng từ hãng thu âm cổ điển, những chiếc áo phông và áo len chui đầu thoải mái.

Màu đất và tông màu xanh nước biển lấy cảm hứng từ bầu trời đêm trong vắt tạo nên sự đa dạng cho nhiều loại áo khoác dã chiến, áo khoác dạ, áo khoác dạ và áo len của quân đội hay họa tiết đậm có nguồn gốc từ Liberty London.

Các loại vải kỹ thuật tiên tiến, bao gồm GORE-TEX INFINIUM, Pliantex và polyester tăng độ bóng dễ nhận biết. Một số loại giày bao gồm từ giày thể thao vải chống thấm nước đến giày bốt da của Ý, tất cả đều lý tưởng để xếp chồng những đường cắt ống quần Dweller mới hoặc hoàn thiện outfit với quần short và tất rộng.", "./Views/images/news_3.jpg", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix…"),
(3, 1, "Retro", "2021/04/01", "Giày Ananas chiến binh thầm lặng", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần đây.

Chúng ta cùng đi tìm hiểu về xuất xứ của thương hiệu giày nổi tiếng này, xem nó có phải là thương hiệu chuẩn Local Brand Việt Nam hay không?

Cái tên Ananas
Ananas là một thương hiệu có đăng kí tại Việt Nam, và đồng thời cũng có nhà máy sản xuất trực tiếp trong nước. Mặc dù là một thương hiệu đã tồn tại từ 2012 nhưng Ananas chỉ mới được biết đến gần đây bằng chính những nỗ lực cố gắng vươn lên không ngừng nghỉ của mình khi liên tục cho ra mắt những sản phẩm bắt nhịp xu hướng và sáng tạo hơn..

Không chỉ có vậy, thương hiệu này còn được các bạn trẻ lựa chọn mua sắm vì các sản phẩm đều sở hữu mức giá mềm, phù hợp với mọi tầng lớp cũng như các hoạt động.

Mặc dù là một thương hiệu mới, nhưng tính cho đến thời điểm hiện tại, Ananas  Việt Nam đã sở hữu rất nhiều store tại TP. HCM. Thương hiệu giày thời trang này vẫn đang tiếp tục mở rộng và phát triển chuỗi cửa hàng trên toàn quốc, để đông đảo người tiêu dùng có thể biết đến sản phẩm của thương hiệu này.

Giày Sneaker Ananas
Một trong những dòng sản phẩm nổi bật của Ananas phải kể đến dòng Sneaker đang hot hit trên thị trường hiện nay. Những đôi giày Sneaker dây buộc khá linh hoạt, thuận tiện cho người sử dụng. Ngoài ra, đế giày được thiết kế không dày như những sản phẩm của thương hiệu khác, khiến cho bạn cảm thấy gọn nhẹ hơn. Lớp lót giày cũng được thiết kế êm ái, đem lại cho bạn cảm giác thoải mái khi sử dụng sản phẩm.


Không chỉ có vậy, những đôi giày Sneaker được thiết kế đa dạng về mẫu mã cũng như màu sắc mà còn sở hữu mức giá khá hấp dẫn. Vì vậy, bạn sẽ không phải chi quá nhiều tiền cho niềm đam mê giày sneaker của mình, khi sắm cho mình một đôi hiệu Ananas đâu nhé!","./Views/images/news_5.jpg", "Giày Ananas là một trong những local brand về giày đang được giới trẻ quan tâm trong thời gian gần…"),
(4, 1, "Localbrand", "2021/07/01", "BST SS21 Nonnative brand phân lớp theo mùa cao điểm", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix & match theo phong cách quân đội và các mặt hàng chủ lực thông thường. Cụ thể BST sẽ được bật mí qua bài viết sau đây.

Công thức thiết kế nổi bật từ Nonnative brand
Phương pháp thiết kế đặc trưng của Nonnative brand thể hiện trong từng BST. Mang đến sự tiếp cận thông minh đối với thiết kế hàng may mặc hướng đến sự đơn giản tinh tế thay vì thời trang dạo phố lấy biểu tượng làm trung tâm.

Nonnative brand đơn giản nhưng độc đáo
Giám đốc sáng tạo Takayuki Fujii đã không giám sát Nonnative brand kể từ khi thành lập, nhưng dưới tầm nhìn của ông, thương hiệu đã phát triển thành một thế lực đáng nể trong thời trang Nhật Bản; Mùa xuân / mùa hè năm 2021, “South” là mùa thứ 39 của thương hiệu, chắt lọc những nét đặc trưng của hãng thành một dòng sản phẩm đơn giản

Nguồn cảm hứng trong thiết kế từ Nonnative brand
Với BST trước từ Nonnative brand “Winter & Spring”, “South” được tự do sử dụng phong cách mùa hè và mùa thu, lấy cảm hứng từ New Zealand. Nguồn cảm hứng New Zealand cũng xuất hiện nhờ đồ họa lấy cảm hứng từ hãng thu âm cổ điển, những chiếc áo phông và áo len chui đầu thoải mái.

Màu đất và tông màu xanh nước biển lấy cảm hứng từ bầu trời đêm trong vắt tạo nên sự đa dạng cho nhiều loại áo khoác dã chiến, áo khoác dạ, áo khoác dạ và áo len của quân đội hay họa tiết đậm có nguồn gốc từ Liberty London.

Các loại vải kỹ thuật tiên tiến, bao gồm GORE-TEX INFINIUM, Pliantex và polyester tăng độ bóng dễ nhận biết. Một số loại giày bao gồm từ giày thể thao vải chống thấm nước đến giày bốt da của Ý, tất cả đều lý tưởng để xếp chồng những đường cắt ống quần Dweller mới hoặc hoàn thiện outfit với quần short và tất rộng.", "./Views/images/news_3.jpg", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix…"),
(5, 1, "Localbrand", "2021/07/01", "BST SS21 Nonnative brand phân lớp theo mùa cao điểm", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix & match theo phong cách quân đội và các mặt hàng chủ lực thông thường. Cụ thể BST sẽ được bật mí qua bài viết sau đây.

Công thức thiết kế nổi bật từ Nonnative brand
Phương pháp thiết kế đặc trưng của Nonnative brand thể hiện trong từng BST. Mang đến sự tiếp cận thông minh đối với thiết kế hàng may mặc hướng đến sự đơn giản tinh tế thay vì thời trang dạo phố lấy biểu tượng làm trung tâm.

Nonnative brand đơn giản nhưng độc đáo
Giám đốc sáng tạo Takayuki Fujii đã không giám sát Nonnative brand kể từ khi thành lập, nhưng dưới tầm nhìn của ông, thương hiệu đã phát triển thành một thế lực đáng nể trong thời trang Nhật Bản; Mùa xuân / mùa hè năm 2021, “South” là mùa thứ 39 của thương hiệu, chắt lọc những nét đặc trưng của hãng thành một dòng sản phẩm đơn giản

Nguồn cảm hứng trong thiết kế từ Nonnative brand
Với BST trước từ Nonnative brand “Winter & Spring”, “South” được tự do sử dụng phong cách mùa hè và mùa thu, lấy cảm hứng từ New Zealand. Nguồn cảm hứng New Zealand cũng xuất hiện nhờ đồ họa lấy cảm hứng từ hãng thu âm cổ điển, những chiếc áo phông và áo len chui đầu thoải mái.

Màu đất và tông màu xanh nước biển lấy cảm hứng từ bầu trời đêm trong vắt tạo nên sự đa dạng cho nhiều loại áo khoác dã chiến, áo khoác dạ, áo khoác dạ và áo len của quân đội hay họa tiết đậm có nguồn gốc từ Liberty London.

Các loại vải kỹ thuật tiên tiến, bao gồm GORE-TEX INFINIUM, Pliantex và polyester tăng độ bóng dễ nhận biết. Một số loại giày bao gồm từ giày thể thao vải chống thấm nước đến giày bốt da của Ý, tất cả đều lý tưởng để xếp chồng những đường cắt ống quần Dweller mới hoặc hoàn thiện outfit với quần short và tất rộng.", "./Views/images/news_3.jpg", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix…"),
(6, 1, "Localbrand", "2021/07/01", "BST SS21 Nonnative brand phân lớp theo mùa cao điểm", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix & match theo phong cách quân đội và các mặt hàng chủ lực thông thường. Cụ thể BST sẽ được bật mí qua bài viết sau đây.

Công thức thiết kế nổi bật từ Nonnative brand
Phương pháp thiết kế đặc trưng của Nonnative brand thể hiện trong từng BST. Mang đến sự tiếp cận thông minh đối với thiết kế hàng may mặc hướng đến sự đơn giản tinh tế thay vì thời trang dạo phố lấy biểu tượng làm trung tâm.

Nonnative brand đơn giản nhưng độc đáo
Giám đốc sáng tạo Takayuki Fujii đã không giám sát Nonnative brand kể từ khi thành lập, nhưng dưới tầm nhìn của ông, thương hiệu đã phát triển thành một thế lực đáng nể trong thời trang Nhật Bản; Mùa xuân / mùa hè năm 2021, “South” là mùa thứ 39 của thương hiệu, chắt lọc những nét đặc trưng của hãng thành một dòng sản phẩm đơn giản

Nguồn cảm hứng trong thiết kế từ Nonnative brand
Với BST trước từ Nonnative brand “Winter & Spring”, “South” được tự do sử dụng phong cách mùa hè và mùa thu, lấy cảm hứng từ New Zealand. Nguồn cảm hứng New Zealand cũng xuất hiện nhờ đồ họa lấy cảm hứng từ hãng thu âm cổ điển, những chiếc áo phông và áo len chui đầu thoải mái.

Màu đất và tông màu xanh nước biển lấy cảm hứng từ bầu trời đêm trong vắt tạo nên sự đa dạng cho nhiều loại áo khoác dã chiến, áo khoác dạ, áo khoác dạ và áo len của quân đội hay họa tiết đậm có nguồn gốc từ Liberty London.

Các loại vải kỹ thuật tiên tiến, bao gồm GORE-TEX INFINIUM, Pliantex và polyester tăng độ bóng dễ nhận biết. Một số loại giày bao gồm từ giày thể thao vải chống thấm nước đến giày bốt da của Ý, tất cả đều lý tưởng để xếp chồng những đường cắt ống quần Dweller mới hoặc hoàn thiện outfit với quần short và tất rộng.", "./Views/images/news_3.jpg", "BST SS21 từ Nonnative brand sử dụng những gam màu cơ bản cùng thiết kế đơn giản dễ dàng mix…");
