
CREATE DATABASE IF NOT EXISTS `bookshopdb`;
USE `bookshopdb`;

#
# Table structure for table 'Authors'
#

DROP TABLE IF EXISTS `Authors`;

CREATE TABLE `Authors` (
  `AuthorID` INTEGER NOT NULL AUTO_INCREMENT, 
  `AuthorName` VARCHAR(200), 
  PRIMARY KEY (`AuthorID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Authors'
#

INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (1, 'Haruki Murakami');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (2, 'Malcolm Gladwell');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (3, 'Meg Jay');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (4, 'นายแพทย์จางเหวินหง');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (5, 'Charles Duhigg');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (6, 'Higashino Keigo');
INSERT INTO `Authors` (`AuthorID`, `AuthorName`) VALUES (7, 'Matthew Walker');
# 7 records


#
# Table structure for table 'Categories'
#

DROP TABLE IF EXISTS `Categories`;

CREATE TABLE `Categories` (
  `CategoryID` INTEGER NOT NULL AUTO_INCREMENT, 
  `CategoryName` VARCHAR(200), 
  PRIMARY KEY (`CategoryID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Categories'
#

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES (1, 'นิยาย');
INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES (2, 'จิตวิทยา/พัฒนาตนเอง');
INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES (3, 'อาหารและสุขภาพ');
# 3 records

#
# Table structure for table 'Publishers'
#

DROP TABLE IF EXISTS `Publishers`;

CREATE TABLE `Publishers` (
  `PublisherID` INTEGER NOT NULL AUTO_INCREMENT, 
  `PublisherName` VARCHAR(200), 
  PRIMARY KEY (`PublisherID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Publishers'
#

INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES (1, 'สำนักพิมพ์กำมะหยี่');
INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES (2, 'สำนักพิมพ์วีเลิร์น');
INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES (3, 'สำนักพิมพ์ Amarin Health');
INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES (4, 'น้ำพุสำนักพิมพ์');
INSERT INTO `Publishers` (`PublisherID`, `PublisherName`) VALUES (5, 'บุ๊คสเคป');
# 5 records



#
# Table structure for table 'Books'
#

DROP TABLE IF EXISTS `Books`;

CREATE TABLE `Books` (
  `BookId` INTEGER NOT NULL AUTO_INCREMENT, 
  `CategoryID` INTEGER NOT NULL DEFAULT 0, 
  `AuthorID` INTEGER NOT NULL DEFAULT 0, 
  `PublisherID` INTEGER NOT NULL DEFAULT 0, 
  `BookName` VARCHAR(200), 
  `BookDescription` VARCHAR(1000), 
  `BookPrice` INTEGER DEFAULT 0, 
  `BookStatus` TINYINT(1) DEFAULT 0, 
  `BookISBN` VARCHAR(255), 
  `BookNumPages` INTEGER DEFAULT 0, 
  INDEX (`AuthorID`), 
  INDEX (`CategoryID`), 
  PRIMARY KEY (`BookId`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Books'
#

INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (1, 2, 1, 1, 'ชายไร้สีกับปีแสวงบุญ', 'ทำไมคุณถึงถูกเพื่อนสี่คนตัดสัมพันธ์อย่างไม่เหลือเยื่อใย ต้องทำกันขนาดนั้นเชียวหรือ ฉันคิดว่าคุณน่าจะค้นหาสาเหตุของเรื่องนี้ให้กระจ่างชัดโดยตัวคุณเอง\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 297, 1, '9786165630023', 304);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (2, 1, 1, 1, 'คาฟกา วิฬาร์ นาคาตะ', 'หนังสือเล่มนี้มีปริศนาใส่รหัสมากมาย แต่ไม่มีวิธีถอดรหัสให้สิ่งที่มีให้คือ ปริศนาเหล่านี้หลายข้อผสมผสานกันและจากการมีปฏิสัมพันธ์กัน ความเป็นไปได้ในการถอดรหัสก็ก่อร่างขึ้นสำหรับผู้อ่านแต่ละคนรูปแบบของการถอดรหัสจะแตกต่างกันออกไป พูดอีกอย่างหนึ่งได้ว่าปริศนาทำหน้าที่เป็นส่วนหนึ่งของการถอดรหัสอธิบายยาก แต่เป็นนวนิยายประเภทหนึ่งที่ผมพยายามเขียน\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 477, 1, '9786167591995', 560);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (3, 1, 1, 1, 'เกร็ดความคิดบนก้าววิ่ง', 'หนังสือเล่มนี้พูดถึงการวิ่ง หาใช่สารนิพนธ์ว่าด้วยการฝึกให้ร่างกายแข็งแกร่ง ผมไม่พยายามจะสอนว่า \"ลุกขึ้นมาได้แล้ว ทุกคนเลย ออไปวิ่งทุกเช้าเพื่อสุขภาพสมบูรณ์แข็งแรง\" ไม่เลยครับ หนังสือเล่มนี้รวบรวมเกร็ดความคิดของผม ที่การวิ่งให้ความหมายต่อผมในฐานะมนุษย์คนหนึ่ง เป็นแต่เพียงหนังสือที่ผมวิเคราะห์ครุ่นคิดเรื่องที่อยู่ในหัว และคิดออกมาดังๆ\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 198, 1, '9786167591988', 183);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (4, 1, 1, 1, 'ราตรีมหัศจรรย์', 'ตอนที่ผมเขียนนวนิยายเรื่องนี้ ทำนองเพลง \'ไฟว์สป็อตอาฟเตอร์ดาร์ก\' ของเคอร์ทิส ฟุลเลอร์ เล่นวนอยู่ในหัวผม\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 207, 1, '9786167591971', 216);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (5, 1, 1, 1, 'การปรากฏตัวของหญิงสาวในคืนฝนตก', 'เรื่องราวของชายสามัญ ผู้ดูคล้ายประสบความสำเร็จในทุกสิ่ง เป็นเจ้าของบาร์แจ๊ซชั้นดี มีครอบครัวเล็กๆ น่ารัก พรักพร้อมเงินทองข้าวของนอกกาย หากในใจยังคงครวญหารักแรกในวัยเยาว์ จนกระทั่งวันหนึ่งหญิงสาวจากอดีตผู้นั้นย้อนกลับมา\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 211, 1, '9786167591834', 220);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (6, 2, 2, 2, 'สัมฤทธิ์พิศวง (OUTLIERS)', 'ทำไมบางคนถึงประสบความสำเร็จมากกว่าคนอื่น\r\nและจะเพิ่ม  โอกาสนั้น  ให้กับตัวคุณเองได้อย่างไร\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 240, 1, '9786162870132', 320);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (7, 2, 2, 2, 'กลยุทธ์จุดกระแส (THE TIPPING POINT)', 'เราจะทำความเข้าใจแนวคิดเรื่องจุดพลิกผันได้ก็ต่อเมื่อเราเปลี่ยนวิธีการมองโลก\r\nและจะเพิ่ม  โอกาสนั้น  ให้กับตัวคุณเองได้อย่างไร\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 216, 1, '9786162870231', 251);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (8, 2, 2, 2, 'คิดให้น้อยลงแล้วจะเห็นได้ลึกกว่า (Blink)', 'ทำไมบางคนถึงประสบความสำเร็จมากกว่าคนอื่น\r\nคุณจะมีมุมมองที่เฉียบคมที่สุดเมื่อทิ้งเหตุผลไปอย่างน้อยครึ่งหนึ่ง\r\n\r\nผมฟังเพลงของลิซต์ ชุด ‘ปีแสวงบุญ’ และเพลง เลอ มาล ดู เปอี ติดอยู่ในใจของผม ดังนั้นผมจึงอยากเขียนอะไรสักอย่างเกี่ยวกับเพลงนั้น', 240, 1, '9786162871405', 256);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (9, 2, 2, 2, 'เห็นในสิ่งที่คนอื่นไม่เห็น (What the Dog Saw)', 'แค่รู้ว่าจะมองอย่างไร...\r\n\r\nคุณก็จะพบว่าสิ่งที่อยู่ตรงหน้า อาจมี \'อะไร\' มากกว่าที่ตาเห็น', 350, 1, '9786162870149', 440);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (10, 2, 3, 2, 'ตลอดชีวิตจะดีหรือร้าย อยู่ที่ว่าคุณคิดอย่างไรในวัย 20', 'จากประสบการณ์การให้คำปรึกษาปัญหาชีวิตนานหลายสิบปี \r\n\r\nMeg Jay นักจิตวิทยาชื่อดังค้นพบว่า ช่วงชีวิตในวัย 20 ไม่เพียงเป็นวัยของการก่อร่างสร้างตัว แต่ยังเป็นวัยที่จะกำหนดชีวิตที่เหลือของคนเราด้วย ไม่ว่าจะเป็นเรื่องงาน ความรัก เงินทอง หรือครอบครัว', 228, 1, '9786162873416', 264);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (11, 3, 4, 3, 'คู่มือเอาตัวรอดจาก COVID-19', 'วิธีเอาตัว (ให้) รอด จากภัยที่มองไม่เห็น จากสงคราม ที่ไม่มีเปลวเพลิง...', 204, 0, '9786161834722', 56);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (12, 2, 5, 2, 'พลังแห่งความเคยชิน', 'ทำไมคนเราถึง “ทำ” หรือ “ไม่ทำ” บางสิ่งจนเป็นอัตโนมัติ', 280, 1, '9786162873539', 360);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (13, 1, 6, 4, 'ปาฏิหาริย์ร้านชำของคุณนามิยะ', 'ในความเงียบสงัดยามวิกาล หัวขโมยสามคนก่อเหตุและเข้าไปซ่อนตัวในร้านชำร้าง ทันใดนั้นก็มีจดหมายลึกลับสอดเข้ามาทางช่องประตู ใครบางคนเขียนเล่าปัญหาชีวิตและขอคำแนะนำจากเจ้าของร้านชำ หัวขโมยทั้งสามจึงนึกสนุกและสวมรอยเขียนตอบเอง', 280, 1, '9786162872600', 507);
INSERT INTO `Books` (`BookId`, `CategoryID`, `AuthorID`, `PublisherID`, `BookName`, `BookDescription`, `BookPrice`, `BookStatus`, `BookISBN`, `BookNumPages`) VALUES (14, 3, 7, 5, 'Why We Sleep : นอนเปลี่ยนชีวิต', '\"การนอนหลับ\" คือกลไกอัศจรรย์ที่ธรรมชาติรังสรรค์ให้มนุษย์ และเป็นหนึ่งในสามเสาหลักแห่งสุขภาพดี ควบคู่กับอาหารและการออกกำลังกาย ทว่าน้อยคนจะเข้าใจปริศนาเบื้องหลังการนอนหลับและการฝัน และมักมองข้ามกิจวัตรยามค่ำคืนอันแสนสำคัญ ซึ่งเป็นกุญแจสู่คุณภาพชีวิตและอายุขัยที่ยืนยาว', 395, 1, '9786168221303', 504);
# 14 records


