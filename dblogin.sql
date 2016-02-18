/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : dblogin

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-02-18 11:24:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Fajar Bukhaeri', 'fajarbukhaeri08@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2016-02-15 16:16:40');
INSERT INTO `users` VALUES ('2', 'Irpan Budiana', 'irpan.budiana@gmail.com', '$2y$10$bSizXjMB1t/fB1uPmWQkv.nGO7aA41xmb0t98ESZ3tN1W8GVM/ZWK', '2016-02-17 10:18:26');
