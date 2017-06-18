/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50173
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 50173
 File Encoding         : utf-8

 Date: 06/15/2017 18:36:57 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `order_guards_state`
-- ----------------------------
DROP TABLE IF EXISTS `order_guards_state`;
CREATE TABLE `order_guards_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_state` int(11) NOT NULL,
  `end_state` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `param` varchar(1000) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
