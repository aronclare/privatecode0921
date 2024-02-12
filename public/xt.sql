/*
Navicat MySQL Data Transfer

Source Server         : users
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : xt

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2023-05-15 19:33:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bew_admin_sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `bew_admin_sys_menu`;
CREATE TABLE `bew_admin_sys_menu` (
  `smid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `parent_id` int(10) NOT NULL DEFAULT '0' COMMENT '上级菜单id',
  `label` varchar(255) NOT NULL COMMENT '菜单名称',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型 0分组 1tp代码 2超链接',
  `src` varchar(255) DEFAULT NULL COMMENT '跳转地址',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1开启 0关闭',
  PRIMARY KEY (`smid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of bew_admin_sys_menu
-- ----------------------------
INSERT INTO `bew_admin_sys_menu` VALUES ('1', '0', '项目核心', '0', null, '8', '1');
INSERT INTO `bew_admin_sys_menu` VALUES ('2', '1', '导航管理', '1', '/index.php/bews/bew/menuinfo', '1', '1');
INSERT INTO `bew_admin_sys_menu` VALUES ('10', '0', '系统配置', '0', null, '6', '1');

-- ----------------------------
-- Table structure for bew_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `bew_admin_user`;
CREATE TABLE `bew_admin_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `group_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属部门',
  `account` varchar(64) NOT NULL COMMENT '账户',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `name` varchar(30) DEFAULT NULL COMMENT '姓名',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态 1开启 0关闭',
  `time_add` int(10) unsigned NOT NULL COMMENT '添加时间',
  `time_last` int(10) unsigned NOT NULL COMMENT '登录时间',
  `times_login` int(10) unsigned NOT NULL COMMENT '登录次数',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of bew_admin_user
-- ----------------------------
INSERT INTO `bew_admin_user` VALUES ('1', '0', 'admin@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '12345566556', '1', '0', '1684138160', '7');

-- ----------------------------
-- Table structure for bew_admin_user_group
-- ----------------------------
DROP TABLE IF EXISTS `bew_admin_user_group`;
CREATE TABLE `bew_admin_user_group` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `group_name` varchar(50) NOT NULL COMMENT '部门名称',
  `status` tinyint(1) unsigned NOT NULL COMMENT '状态 1开启 0关闭',
  `time_add` int(10) unsigned NOT NULL COMMENT '添加时间',
  `rights` text COMMENT '权限',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Records of bew_admin_user_group
-- ----------------------------
