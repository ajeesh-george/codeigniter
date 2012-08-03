/*
Navicat MySQL Data Transfer

Source Server         : Linux Localhost
Source Server Version : 50084
Source Host           : ajeeshvm.cxcuk.local:3306
Source Database       : codeigniter

Target Server Type    : MYSQL
Target Server Version : 50084
File Encoding         : 65001

Date: 2012-08-03 16:02:41
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO categories VALUES ('1', 'shoes', 'Shoes for boys and girls.', '', 'active', '7');
INSERT INTO categories VALUES ('2', 'shirts', 'Shirts and blouses!', '', 'active', '7');
INSERT INTO categories VALUES ('3', 'pants', 'Stylish, durable pants for play or school.', '', 'active', '7');
INSERT INTO categories VALUES ('4', 'dresses', 'Pretty dresses for the apple of your eye.', '', 'inactive', '7');
INSERT INTO categories VALUES ('5', 'toys', 'Toys that are fun and mentally stimulating at the same time.', '', 'active', '8');
INSERT INTO categories VALUES ('6', 'games', 'Fun for the whole family.', '', 'active', '8');
INSERT INTO categories VALUES ('7', 'clothes', 'Clothes for school and play.', '', 'active', '0');
INSERT INTO categories VALUES ('8', 'fun', 'It\'s time to unwind!', '', 'active', '0');
INSERT INTO categories VALUES ('9', 'test', 'testing', 'Testing!!!!', 'inactive', '0');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `grouping` varchar(16) default NULL,
  `status` enum('active','inactive') NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` enum('true','false') NOT NULL,
  `price` float(4,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO products VALUES ('1', 'Game 1', 'This is a very good game.', 'What a product! You\'ll love the way your kids will play with this game all day long. It\'s terrific!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '3', 'true', '19.95');
INSERT INTO products VALUES ('2', 'Game 2', 'This is a very good game.', 'What a product! You\'ll love the way your kids will play with this game all day long. It\'s terrific!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '3', 'true', '19.95');
INSERT INTO products VALUES ('3', 'Game 3', 'This is a very good game.', 'What a product! You\'ll love the way your kids will play with this game all day long. It\'s terrific!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '1', 'true', '39.95');
INSERT INTO products VALUES ('4', 'Toy 1', 'This is a very good toy.', 'What a product! You\'ll love the way your kids will play with this game all day long. It\'s terrific!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '1', 'true', '9.95');
INSERT INTO products VALUES ('5', 'Toy 2', 'This is a very good toy.', 'What a product! You\'ll love the way your kids will play with this game all day long. It\'s terrific!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '6', 'false', '23.95');
INSERT INTO products VALUES ('6', 'Shoes 1', 'This is a very good pair of shoes.', 'These shoes will last forever!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '6', 'true', '23.95');
INSERT INTO products VALUES ('7', 'Shoes 2', 'This is a very good pair of shoes.', 'These shoes will last forever!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '1', 'false', '23.95');
INSERT INTO products VALUES ('8', 'Shirt 1', 'Nice shirt!', 'A stylish shirt for school!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '2', 'true', '23.95');
INSERT INTO products VALUES ('9', 'Shirt 2', 'Nice shirt!', 'A stylish shirt for school!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '2', 'false', '23.95');
INSERT INTO products VALUES ('10', 'Dress 1', 'Nice dress!', 'A stylish dress just in time for school!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '2', 'true', '33.95');
INSERT INTO products VALUES ('11', 'Dress 2', 'Nice dress!', 'A stylish dress just in time for school!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '2', 'true', '43.95');
INSERT INTO products VALUES ('12', 'Pants 1', 'Nice pair of pants!', 'A stylish pair of pants just in time for school!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'blob', 'active', '3', 'true', '33.95');
INSERT INTO products VALUES ('13', 'test123', 'test!!', 'test!!!!', 'assets/style/img/dummy-thumb.jpg', 'assets/style/img/dummy-main.jpg', 'xyz', 'active', '1', 'false', '10.95');
INSERT INTO products VALUES ('14', 'Long-sleeved t-shirt', 'Very comfy!', 'A great t-shirt for cold autumn days.', 'assets/style/img/dummy-thumb1.jpg', 'assets/style/img/dummy-main1.jpg', 'blah', 'active', '2', 'true', '29.95');
INSERT INTO products VALUES ('15', 'Shoes Testing', 'test', 'test', 'assets/style/img/dummy-thumb4.jpg', 'assets/style/img/dummy-main4.jpg', 'adfasdf', 'active', '1', 'true', '1.29');
INSERT INTO products VALUES ('16', 'afd', 'afd', 'adfds', '', '', 'aasdfd', 'active', '1', '', '5.99');
