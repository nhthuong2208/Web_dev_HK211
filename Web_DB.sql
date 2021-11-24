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
CREATE TABLE `PRODUCT_IN_CART`(
  `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
  `PID` BIGINT NOT NULL,
  `QUANTITY` INT DEFAULT 0,
  `SIZE` VARCHAR(5) DEFAULT "L",
    FOREIGN KEY (`PID`) REFERENCES `PRODUCT`(`ID`)
);
CREATE TABLE `CART`(
    `ID` BIGINT PRIMARY KEY AUTO_INCREMENT,
    `UID` BIGINT NOT NULL,
    `OID` BIGINT NOT NULL,
    `TIME` DATE,
    FOREIGN KEY (`OID`) REFERENCES `PRODUCT_IN_CART`(`ID`) ,
    FOREIGN KEY (`UID`) REFERENCES `ACCOUNT`(`ID`) 
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
    `KEY` VARCHAR(50),
    `TIME` DATE,
    `TITLE` VARCHAR(50),
    `CONTENT` TEXT,
    `CID` BIGINT NULL,
    `IMG_URL` VARCHAR(50),
    `SHORT_CONTENT` VARCHAR(300),
    FOREIGN KEY (`CID`) REFERENCES `COMMENT`(`ID`) 
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
(1, "Shirt 1", 150000, "https://mcdn2.coolmate.me/uploads/November2021/1-0_copyu.jpg", 20, "Và chiếc áo Polo Cotton Compact Prime-Everyday ra mắt chính là sự cải tiến Coolmate muốn dành cho bạn, bởi đó là sự kết hợp giữa độ vừa vặn trong form dánh như một chiếc áo thun và sự thoải mái đến từ chất liệu Cotton Compact chất lượng cao, chiếc áo Polo Cotton Compact Prime-Everyday chính là chiếc áo cho câu trả lời của những chàng trai muốn tối ưu thời gian trong mỗi buổi sáng bởi sự tiện lợi và \"sẵn sàng để mặc\". ", "Shirt", 1),
(2, "Shirt 2", 150000, "https://mcdn2.coolmate.me/uploads/November2021/monster4_56.jpg", 20, "Sự đặc biệt từ Áo nam Classic Sweatshirt chính là nằm ở phần thiết kế mới và kiểu dệt, Coolmate đã dành rất nhiều thời gian từ chọn vải nhưng không tìm được loại vải phù hợp: nếu ấm thì sẽ dễ bị xù lông, nếu ấm và không xù thì chiếc áo bạn mặc sẽ nặng và khó chịu vô cùng,... chúng tôi đã bắt tay vào chọn những sợi vải 90% Cotton đem đến cho khách hàng 1 chiếc áo Cotton mềm mại vừa đủ mà vẫn giữ ấm còn không gây bí khi mặc.", "Shirt", 0),
(3, "Bambi Print Mini Backpack", 150000, "https://mcdn2.coolmate.me/uploads/November2021/IMG_68181.jpg", 20, "Quần Jogger nam chính là chiếc quần hội tụ các đặc điểm vô cùng nổi bật để đem đến cho khách hàng những trải nghiệm tốt nhất đến với người mặc. Quần All Week Jogger nổi bật với cách dệt kiểu Interlock là một mặt vải phẳng, trơn. Các vòng lặp trong kiểu dệt này có tác dụng làm tăng diện tích tiếp xúc với chất lỏng và hút nước nhanh hơn. Do đó loại vải này giúp người mặc cảm thấy thông thoáng, giảm nhiệt, giữ da luôn khô thoáng.", "Trousers", 1),
(4, "Bucket Hat", 150000, "https://mcdn2.coolmate.me/uploads/November2021/b6_73.jpg", 20, "Nếu bạn đã sở hữu những chiếc mũ lưỡi trai thuần nam tính hoặc những dáng mũ fedora lịch lãm, kiểu dáng mũ cao bồi cách điệu bụi bặm, và đang muốn tìm cho mình một chiếc mũ mang đến vẻ trẻ trung, năng động thì Bucket Hat chính là câu trả lời của bạn đây. Care & Share ra mắt phiên bản mũ Bucket Hat cùng với nhiều thiết kế ấn tượng nhưng không hề mất đi vẻ nam tính, đơn giản của bạn khi mang chiếc mũ này nhé!", "Accessories", 1);

-- account
INSERT INTO `account`(`account`.`CMND`, `account`.`FNAME`, `account`.`PHONE`, `account`.`ADDRESS`, `account`.`USERNAME`, `account`.`PWD`, `account`.`RANK`)VALUES
("312451293", "Phạm Minh Hiếu", "0973409127", "tx Gò Công, Tiền Giang", "hieu.phamgc", "helloworld", 100),
("312451746", "Nguyễn Hoài Thương", "0869125690", "tx Gò Công, Tiền Giang", "nhthuong", "helloworld", 100);

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