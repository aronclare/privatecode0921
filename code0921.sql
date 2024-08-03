/*
Navicat MySQL Data Transfer

Source Server         : users
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : code0921

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2024-08-03 18:57:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for qing_ad
-- ----------------------------
DROP TABLE IF EXISTS `qing_ad`;
CREATE TABLE `qing_ad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `listorder` int(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `content` text,
  `seq` varchar(10) DEFAULT NULL COMMENT '排序',
  `created_at` varchar(50) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(50) DEFAULT NULL COMMENT '更新时间',
  `img_url` varchar(100) DEFAULT NULL COMMENT '图片地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_ad
-- ----------------------------
INSERT INTO `qing_ad` VALUES ('1', '1', '618免单来袭', '/public/upload/20200801/3f9d2a71a0e976eb8daf3208c983d9ac.jpg', 'https://baidu.com', '618免单来袭', '0', '1', null, '1', null, null, '/public/upload/20200801/3f9d2a71a0e976eb8daf3208c983d9ac.jpg');
INSERT INTO `qing_ad` VALUES ('2', '1', '1万份免单派发中', '/public/upload/20200801/968730140783b13d831cf1705efeadf7.jpg', '#', '1万份免单派发中', '0', '1', null, '2', null, null, '/public/upload/20200801/968730140783b13d831cf1705efeadf7.jpg');

-- ----------------------------
-- Table structure for qing_address
-- ----------------------------
DROP TABLE IF EXISTS `qing_address`;
CREATE TABLE `qing_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shou_name` varchar(10) DEFAULT NULL,
  `shou_address` varchar(50) DEFAULT NULL,
  `shou_mobile` varchar(11) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(5) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `district` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='收货地址表';

-- ----------------------------
-- Records of qing_address
-- ----------------------------
INSERT INTO `qing_address` VALUES ('1', 'ferfe', 'drd', 'fdfd', '0', '1', '河北省', '石家庄市', '长安区');
INSERT INTO `qing_address` VALUES ('2', 'fdfd', 'fdfd', 'fdfd', '1', '1', '内蒙古自治区', '呼和浩特市', '新城区');
INSERT INTO `qing_address` VALUES ('3', 'sfsfsf', 'sfdsfsfsf', '32554353535', '1', '44', '北京市', '北京市市辖区', '东城区');
INSERT INTO `qing_address` VALUES ('4', 'sfsfsf', 'sfdsfsfsf', '32554353535', '0', '44', '北京市', '北京市市辖区', '东城区');
INSERT INTO `qing_address` VALUES ('5', 'sfsfsf', 'sfdsfsfsf', '32554353535', '1', '30', '北京市', '北京市市辖区', '东城区');
INSERT INTO `qing_address` VALUES ('6', 'sfsfsf', 'sfdsfsfsf', '32554353535', '0', '30', '北京市', '北京市市辖区', '东城区');

-- ----------------------------
-- Table structure for qing_admin
-- ----------------------------
DROP TABLE IF EXISTS `qing_admin`;
CREATE TABLE `qing_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `group_id` int(2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1启用0禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='后台管理员';

-- ----------------------------
-- Records of qing_admin
-- ----------------------------
INSERT INTO `qing_admin` VALUES ('1', 'root_qing', '0d734ea736e18b582050e3b990636001', '1721640361', '1', '1');
INSERT INTO `qing_admin` VALUES ('2', 'goods_admin', '0d734ea736e18b582050e3b990636001', '1590197437', '2', '1');
INSERT INTO `qing_admin` VALUES ('4', 'order_admin', '0d734ea736e18b582050e3b990636001', '1597276611', '4', '1');
INSERT INTO `qing_admin` VALUES ('5', 'admin', '3b10490bad11d7fc64d7ab10c2d96919', '1716968847', '1', '1');

-- ----------------------------
-- Table structure for qing_ad_type
-- ----------------------------
DROP TABLE IF EXISTS `qing_ad_type`;
CREATE TABLE `qing_ad_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_ad_type
-- ----------------------------
INSERT INTO `qing_ad_type` VALUES ('1', '首页轮播图');
INSERT INTO `qing_ad_type` VALUES ('2', '首页广告位');

-- ----------------------------
-- Table structure for qing_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `qing_auth_group`;
CREATE TABLE `qing_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_auth_group
-- ----------------------------
INSERT INTO `qing_auth_group` VALUES ('1', '超级管理员', '1', '1,2,3,4,5,6,12,13,14,8,9,10,11,15,16');
INSERT INTO `qing_auth_group` VALUES ('2', '商品管理员', '1', '8,9,10,11,15,16');
INSERT INTO `qing_auth_group` VALUES ('4', '订单管理员', '1', '6,12,13,14,15,16');

-- ----------------------------
-- Table structure for qing_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `qing_auth_rule`;
CREATE TABLE `qing_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级规则id 0表示顶级规则',
  `listorder` int(10) NOT NULL DEFAULT '0',
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_auth_rule
-- ----------------------------
INSERT INTO `qing_auth_rule` VALUES ('1', 'Flink\\index', '友情链接列表', '1', '0', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('2', 'Flink\\add', '添加', '1', '1', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('3', 'Flink\\edit', '修改', '1', '1', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('4', 'Search/index', '搜索关键字列表', '1', '0', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('5', 'Search/add', '搜索添加', '1', '4', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('6', 'Order/index', '订单列表', '1', '0', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('7', 'Config/index', '系统管理', '0', '0', '0', 'ewtete');
INSERT INTO `qing_auth_rule` VALUES ('8', 'Goods/index', '商品列表', '1', '0', '1', '&#xe620');
INSERT INTO `qing_auth_rule` VALUES ('9', 'Goods/add', '商品添加', '1', '8', '1', '');
INSERT INTO `qing_auth_rule` VALUES ('10', 'Goods/edit', '商品修改', '1', '8', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('11', 'Goods/del', '商品删除', '1', '8', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('12', 'Order/add', '订单添加', '1', '6', '1', '');
INSERT INTO `qing_auth_rule` VALUES ('13', 'Order/edit', '订单修改', '1', '6', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('14', 'Order/del', '订单删除', '1', '6', '0', '');
INSERT INTO `qing_auth_rule` VALUES ('15', 'Index/index', '后台首页', '1', '0', '0', '&#xe616;');
INSERT INTO `qing_auth_rule` VALUES ('16', 'Index/welcome', '欢迎页面', '1', '15', '0', '');

-- ----------------------------
-- Table structure for qing_cart
-- ----------------------------
DROP TABLE IF EXISTS `qing_cart`;
CREATE TABLE `qing_cart` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品ID',
  `sku` varchar(30) NOT NULL DEFAULT '0' COMMENT '选择的商品属性ID，多个用,隔开',
  `user_id` mediumint(8) unsigned NOT NULL COMMENT '会员id',
  `amount` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：选中，0：未选中',
  PRIMARY KEY (`id`),
  KEY `member_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='购物车';

-- ----------------------------
-- Records of qing_cart
-- ----------------------------
INSERT INTO `qing_cart` VALUES ('26', '3', '2,6,24', '33', '2', '1');
INSERT INTO `qing_cart` VALUES ('28', '11', '26,14', '33', '1222222', '1');
INSERT INTO `qing_cart` VALUES ('48', '10', '7,14', '2', '5', '1');
INSERT INTO `qing_cart` VALUES ('47', '12', '27,28', '44', '1', '1');
INSERT INTO `qing_cart` VALUES ('46', '6', '3,6,23', '44', '2', '1');

-- ----------------------------
-- Table structure for qing_category
-- ----------------------------
DROP TABLE IF EXISTS `qing_category`;
CREATE TABLE `qing_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cate_name` varchar(30) NOT NULL COMMENT '栏目名称',
  `seo_title` varchar(150) NOT NULL COMMENT '栏目标题',
  `seo_keywords` varchar(150) NOT NULL COMMENT '关键词',
  `seo_description` varchar(255) NOT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：显示 0：隐藏',
  `thumb` varchar(150) DEFAULT NULL COMMENT '图片',
  `link` varchar(150) NOT NULL COMMENT '栏目外链',
  `listorder` smallint(6) NOT NULL DEFAULT '50' COMMENT '排序',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级id',
  `type_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_category
-- ----------------------------
INSERT INTO `qing_category` VALUES ('1', '女装 / 内衣', '', '', '', null, '1', '/public/upload/20200907/a9a2ebdfc574b7ba4f63111b725173a1.jpg', '', '1', '0', '2');
INSERT INTO `qing_category` VALUES ('2', '浪漫裙装', '', '', '', null, '0', null, '', '50', '1', '1');
INSERT INTO `qing_category` VALUES ('3', '美妆 / 护理', '', '', '', null, '1', '/public/upload/20200907/6720d04938b02fad0a8df2468a954b98.jpg', '', '3', '0', '0');
INSERT INTO `qing_category` VALUES ('4', '生活电器', '', '', '', null, '1', '/public/upload/20240321/832251423f378f40cbcfe1e9b3e5d1f2.jpg', '', '4', '0', '0');
INSERT INTO `qing_category` VALUES ('5', '护肤品', '', '', '', null, '1', '/public/upload/20200907/3dfe3c4b167f688385657d72d1321bc5.jpg', '', '50', '3', '0');
INSERT INTO `qing_category` VALUES ('6', '家居服', '', '', '', null, '1', '/public/upload/20200907/bf429889460c7a17b6521c201ef06b18.jpg', '', '50', '1', '0');
INSERT INTO `qing_category` VALUES ('7', '彩妆', '', '', '', null, '1', '/public/upload/20200907/59feb5c76f25fc55545541c381f6fb7f.jpg', '', '50', '3', '0');
INSERT INTO `qing_category` VALUES ('8', '洗衣机', '', '', '', null, '1', null, '', '50', '4', null);
INSERT INTO `qing_category` VALUES ('9', '电冰箱', '', '', '', null, '1', null, '', '50', '4', null);
INSERT INTO `qing_category` VALUES ('10', '家居 / 建材', '', '', '', null, '1', null, '', '50', '0', null);
INSERT INTO `qing_category` VALUES ('11', '母婴 / 玩具', '', '', '', null, '1', null, '', '50', '0', null);
INSERT INTO `qing_category` VALUES ('12', '图书 / 音像', '', '', '', null, '1', null, '', '30', '0', null);
INSERT INTO `qing_category` VALUES ('13', '零食 / 茶酒', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '5', '0', '0');
INSERT INTO `qing_category` VALUES ('14', '手机 / 数码', '', '', '', null, '1', '/public/upload/20200907/5feb28d16702eaf24bf85ebccc954d2d.jpg', '', '2', '0', '0');
INSERT INTO `qing_category` VALUES ('15', '腕表 / 首饰', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '6', '0', '0');
INSERT INTO `qing_category` VALUES ('16', '小米', '', '', '', null, '1', null, '', '50', '18', '1');
INSERT INTO `qing_category` VALUES ('17', '荣耀', '', '', '', null, '1', null, '', '50', '18', null);
INSERT INTO `qing_category` VALUES ('18', '热门手机', '', '', '', null, '1', null, '', '50', '14', '1');
INSERT INTO `qing_category` VALUES ('19', '电脑整机', '', '', '', null, '1', null, '', '50', '14', null);
INSERT INTO `qing_category` VALUES ('20', '笔记本', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('21', '平板电脑', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('22', '台式机', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('23', '一体机', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('24', '游戏本', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('25', 'iPad', '', '', '', null, '1', null, '', '50', '19', null);
INSERT INTO `qing_category` VALUES ('26', 'Iphone', '', '', '', null, '1', null, '', '50', '18', null);
INSERT INTO `qing_category` VALUES ('27', '魅族', '', '', '', null, '1', null, '', '50', '18', null);
INSERT INTO `qing_category` VALUES ('28', '华为', '', '', '', null, '1', null, '', '50', '18', null);
INSERT INTO `qing_category` VALUES ('29', 'OPPO', '', '', '', null, '1', null, '', '50', '18', null);
INSERT INTO `qing_category` VALUES ('30', '智能数码', '', '', '', null, '1', null, '', '50', '14', null);
INSERT INTO `qing_category` VALUES ('31', '智能设备', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('32', '智能手表', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('33', '智能手环', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('34', 'VR眼镜', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('35', '智能摄像', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('36', '智能健康', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('37', '智能机器人', '', '', '', null, '1', null, '', '50', '30', null);
INSERT INTO `qing_category` VALUES ('38', '硬件存储', '', '', '', null, '1', null, '', '50', '14', null);
INSERT INTO `qing_category` VALUES ('39', '显示器', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('40', '机械键盘', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('41', '固态硬盘', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('42', 'CPU', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('43', '显卡', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('44', '主板', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('45', '高速U盘', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('46', '路由器', '', '', '', null, '1', null, '', '50', '38', null);
INSERT INTO `qing_category` VALUES ('47', '摄影摄像', '', '', '', null, '1', null, '', '50', '14', null);
INSERT INTO `qing_category` VALUES ('48', '相机', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('49', '单反', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('50', '单电微单', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('51', '摄像机', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('52', '自拍神器', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('53', '拍立得', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('54', '镜头', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('55', '自拍杆', '', '', '', null, '1', null, '', '50', '47', null);
INSERT INTO `qing_category` VALUES ('56', '影音娱乐', '', '', '', null, '1', null, '', '50', '14', null);
INSERT INTO `qing_category` VALUES ('57', '耳机', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('58', '天猫魔盒', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('59', '数码影音', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('60', '家庭影院', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('61', '蓝牙耳机', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('62', '网络播放器', '', '', '', null, '1', null, '', '50', '56', null);
INSERT INTO `qing_category` VALUES ('63', '精选上装', '', '', '', null, '1', '/public/upload/20200907/12e2badae06d0be8dd1f6186c4142ea6.jpg', '', '50', '1', '2');
INSERT INTO `qing_category` VALUES ('64', '女士下装', '', '', '', null, '1', '/public/upload/20200907/bc7a1f58d4d737ffc2842f9483f2d7b0.jpg', '', '50', '1', '0');
INSERT INTO `qing_category` VALUES ('65', '特色女装', '', '', '', null, '1', '/public/upload/20200907/5b999d2f7a73e7616fe6f86e8b9eab4b.jpg', '', '50', '1', '0');
INSERT INTO `qing_category` VALUES ('66', '文胸塑身', '', '', '', null, '1', '/public/upload/20200907/049adc94a689a1ec4bccba90c43e719a.jpg', '', '50', '1', '0');
INSERT INTO `qing_category` VALUES ('67', '毛呢外套', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('68', '羽绒服', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('69', '棉服', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('70', '丝绒卫衣', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('71', '毛针织衫', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('72', '皮毛一体', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('73', '皮草', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('74', '毛衣', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '63', '2');
INSERT INTO `qing_category` VALUES ('75', '衬衫', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('76', '卫衣', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '63', '2');
INSERT INTO `qing_category` VALUES ('77', '针织衫', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('78', 'T恤', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('79', '短外套', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('80', '小西装', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('81', '风衣', '', '', '', null, '1', null, '', '50', '63', null);
INSERT INTO `qing_category` VALUES ('82', '连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('83', '半身裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('84', 'A字裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('85', '荷叶边裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('86', '大摆裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('87', '包臀裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('88', '百褶裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('89', '长袖', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('90', '连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('91', '棉麻连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('92', '牛仔裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('93', '蕾丝连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('94', '真丝连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('95', '印花连衣裙', '', '', '', null, '1', null, '', '50', '2', null);
INSERT INTO `qing_category` VALUES ('96', '春夏家居服', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '96', '0');
INSERT INTO `qing_category` VALUES ('97', '纯棉家居服111', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '97', '0');
INSERT INTO `qing_category` VALUES ('98', '莫代尔家居服', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('99', '真丝家居服', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('100', '春夏睡裙', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('101', '男士家居服', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('102', '情侣家居服', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('103', '性感睡裙', '', '', '', null, '1', null, '', '50', '6', null);
INSERT INTO `qing_category` VALUES ('104', '休闲裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('105', '阔腿裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('106', '牛仔裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('107', '打底裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('108', '开叉运动裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('109', '哈伦裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('110', '背带裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('111', '小脚裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('112', '西装裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('113', '短裤', '', '', '', null, '1', null, '', '50', '64', null);
INSERT INTO `qing_category` VALUES ('114', '时尚套装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('115', '休闲套装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('116', '日系女装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('117', '精选妈妈装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('118', '大码女装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('119', '职业套装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('120', '优雅旗袍', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('121', '精致礼服', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('122', '婚纱', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('123', '唐装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('124', '小码女装', '', '', '', null, '1', null, '', '50', '65', null);
INSERT INTO `qing_category` VALUES ('125', '光面文胸', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('126', '运动文胸', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('127', '美背文胸', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('128', '聚拢文胸', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('129', '大杯文胸', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('130', '轻薄塑身', '', '', '', null, '1', null, '', '50', '66', null);
INSERT INTO `qing_category` VALUES ('131', '家居服', '', '', '', '', '1', '/public/upload/20200907/6502a54382a96c2f370933c280a8456f.jpg', '', '50', '1', '1');
INSERT INTO `qing_category` VALUES ('132', '精选上衣', '', '', '', '', '1', '/public/upload/20200907/be5921de5ee20e4932305a8dabd8d7d8.jpg', '', '50', '1', '1');
INSERT INTO `qing_category` VALUES ('133', '家居服A', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '6', '2');
INSERT INTO `qing_category` VALUES ('134', '家居服B', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '6', '2');
INSERT INTO `qing_category` VALUES ('138', '进口零食', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('139', '休闲零食', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('140', '酒类', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('141', '茶叶1', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('142', '茶叶2', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('143', '', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '13', '1');
INSERT INTO `qing_category` VALUES ('144', '大牌乐器', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '12', '1');
INSERT INTO `qing_category` VALUES ('145', '儿童读书', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '12', '1');
INSERT INTO `qing_category` VALUES ('146', '儿童读物1', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '12', '1');
INSERT INTO `qing_category` VALUES ('148', '儿童读书2', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '12', '1');
INSERT INTO `qing_category` VALUES ('149', '儿童读书3', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '12', '1');
INSERT INTO `qing_category` VALUES ('150', '玩具', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '11', '1');
INSERT INTO `qing_category` VALUES ('151', '童装', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '11', '1');
INSERT INTO `qing_category` VALUES ('155', '电视机', '', '', '', null, '1', '/public/upload/20240321/da06f1d850ea005d1ca478eebc9623e7.jpg', '', '50', '4', '3');
INSERT INTO `qing_category` VALUES ('153', '婴儿服', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '11', '1');
INSERT INTO `qing_category` VALUES ('154', '奶粉', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '11', '1');
INSERT INTO `qing_category` VALUES ('156', '液晶电视机', '', '', '', null, '1', '/public/upload/20240321/137970f852c8c51cc2a1e08f353e14b4.jpg', '', '50', '155', '3');
INSERT INTO `qing_category` VALUES ('157', '灯饰照明', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '4', '0');
INSERT INTO `qing_category` VALUES ('158', '灯泡', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '157', '0');
INSERT INTO `qing_category` VALUES ('159', '办公文教', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '14', '0');
INSERT INTO `qing_category` VALUES ('160', '婴儿玩具', '', '', '', null, '1', '/public/static/index/images/thumb.jpg', '', '50', '150', '0');
INSERT INTO `qing_category` VALUES ('161', '等离子电视机', '', '', '', null, '1', '/public/upload/20240321/f964c6b6da81e0cc449374ed49b28ffa.jpg', '', '50', '155', '3');

-- ----------------------------
-- Table structure for qing_collect
-- ----------------------------
DROP TABLE IF EXISTS `qing_collect`;
CREATE TABLE `qing_collect` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='商品收藏';

-- ----------------------------
-- Records of qing_collect
-- ----------------------------
INSERT INTO `qing_collect` VALUES ('15', '1', '1596103600', '1');
INSERT INTO `qing_collect` VALUES ('16', '2', '1596103607', '1');
INSERT INTO `qing_collect` VALUES ('17', '5', '1596103627', '1');

-- ----------------------------
-- Table structure for qing_comment
-- ----------------------------
DROP TABLE IF EXISTS `qing_comment`;
CREATE TABLE `qing_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL DEFAULT '',
  `goods_id` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `star` tinyint(3) NOT NULL DEFAULT '3',
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_comment
-- ----------------------------
INSERT INTO `qing_comment` VALUES ('1', '1', '很棒的哦', '5', '1599182644', '5', '2');
INSERT INTO `qing_comment` VALUES ('2', '1', '还可以吧', '4', '1599182681', '4', '4');
INSERT INTO `qing_comment` VALUES ('3', '1', '还凑合吧', '5', '1599182705', '4', '6');
INSERT INTO `qing_comment` VALUES ('4', '1', '手感不错呢', '1', '1599182723', '5', '6');
INSERT INTO `qing_comment` VALUES ('6', '1', '好评', '4', '1599211817', '5', '10');
INSERT INTO `qing_comment` VALUES ('7', '1', '好评', '6', '1599212292', '5', '3');
INSERT INTO `qing_comment` VALUES ('15', '1', '好评', '4', '1599221031', '5', '13');
INSERT INTO `qing_comment` VALUES ('14', '1', '好评', '7', '1599221030', '5', '13');
INSERT INTO `qing_comment` VALUES ('13', '1', '好评', '5', '1599221028', '5', '12');
INSERT INTO `qing_comment` VALUES ('12', '1', '好评', '3', '1599221027', '5', '12');
INSERT INTO `qing_comment` VALUES ('16', '1', '好评', '8', '1599221571', '5', '11');

-- ----------------------------
-- Table structure for qing_config
-- ----------------------------
DROP TABLE IF EXISTS `qing_config`;
CREATE TABLE `qing_config` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  `cname` varchar(60) NOT NULL COMMENT '中文名称',
  `ename` varchar(60) NOT NULL COMMENT '英文名称',
  `value` text NOT NULL COMMENT '默认值',
  `values` varchar(255) NOT NULL COMMENT '可选值',
  `field_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：输入框 2：文本域  3：复选 4：下拉菜单 6：附件',
  `config_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：基本信息 2：联系方式 3：seo设置 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_config
-- ----------------------------
INSERT INTO `qing_config` VALUES ('1', '网站名称', 'webname', 'aaron电商系统开发', '', '1', '1');
INSERT INTO `qing_config` VALUES ('2', '网站域名', 'domain', 'http://www.dongpaiweb.cn', '', '1', '1');
INSERT INTO `qing_config` VALUES ('13', 'SEO关键字', 'index_keywords', '', '', '1', '1');
INSERT INTO `qing_config` VALUES ('4', '版权信息', 'copyright', '© 版权所有 德州动派网络科技有限公司 保留所有权利', '', '1', '1');
INSERT INTO `qing_config` VALUES ('5', '备案号', 'beian', '鲁ICP备18038664号-1', '', '1', '1');
INSERT INTO `qing_config` VALUES ('6', '统计代码', 'cnzz', '', '', '2', '1');
INSERT INTO `qing_config` VALUES ('7', '地址', 'address', '', '', '1', '2');
INSERT INTO `qing_config` VALUES ('8', '电话1', 'tel1', '17615342770', '', '1', '2');
INSERT INTO `qing_config` VALUES ('9', '电话2', 'tel2', '', '', '1', '2');
INSERT INTO `qing_config` VALUES ('10', 'QQ', 'qq', '', '', '1', '2');
INSERT INTO `qing_config` VALUES ('11', '邮箱', 'email', '', '', '1', '2');
INSERT INTO `qing_config` VALUES ('12', '传真', 'fax', '', '', '1', '2');
INSERT INTO `qing_config` VALUES ('14', 'SEO描述', 'seo_description', '', '', '1', '1');
INSERT INTO `qing_config` VALUES ('15', '签到赚钱积分', 'score', '2', '', '1', '1');
INSERT INTO `qing_config` VALUES ('16', '生日值每天领取数量', 'shengrizhi_number', '10', '', '1', '1');
INSERT INTO `qing_config` VALUES ('17', '积分兑换', 'jifen', '每次只能兑换5个', '', '1', '2');

-- ----------------------------
-- Table structure for qing_coupons
-- ----------------------------
DROP TABLE IF EXISTS `qing_coupons`;
CREATE TABLE `qing_coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `money2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time1` int(11) NOT NULL COMMENT '开始时间',
  `time2` int(11) NOT NULL COMMENT '结束时间',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(10) NOT NULL DEFAULT '1' COMMENT '优惠券数量',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='优惠券';

-- ----------------------------
-- Records of qing_coupons
-- ----------------------------
INSERT INTO `qing_coupons` VALUES ('2', '100', '10', '1588671659', '1620207661', '五一大促', '4', '1');
INSERT INTO `qing_coupons` VALUES ('3', '200', '20', '1595952000', '1715875200', '9月就业季', '2', '0');
INSERT INTO `qing_coupons` VALUES ('4', '50', '10', '1596111081', '1664626287', '新人优惠券', '0', '0');
INSERT INTO `qing_coupons` VALUES ('5', '100', '20', '1588498772', '1590116148', '5月就业季', '2', '1');
INSERT INTO `qing_coupons` VALUES ('6', '', '', '1696085930', '1696085930', '', '1', '1');
INSERT INTO `qing_coupons` VALUES ('7', '200', '30', '1699200000', '1703435196', '微软抵扣券', '2', '1');

-- ----------------------------
-- Table structure for qing_coupons_user
-- ----------------------------
DROP TABLE IF EXISTS `qing_coupons_user`;
CREATE TABLE `qing_coupons_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupons_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0未使用，1已使用',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='优惠券';

-- ----------------------------
-- Records of qing_coupons_user
-- ----------------------------
INSERT INTO `qing_coupons_user` VALUES ('4', '1', '4', '0');
INSERT INTO `qing_coupons_user` VALUES ('2', '1', '2', '1');
INSERT INTO `qing_coupons_user` VALUES ('5', '1', '5', '1');

-- ----------------------------
-- Table structure for qing_express
-- ----------------------------
DROP TABLE IF EXISTS `qing_express`;
CREATE TABLE `qing_express` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL COMMENT '快递公司代号',
  `name` varchar(20) NOT NULL COMMENT '快递公司名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='快递公司代号';

-- ----------------------------
-- Records of qing_express
-- ----------------------------
INSERT INTO `qing_express` VALUES ('1', 'BTWL', '百世快运');
INSERT INTO `qing_express` VALUES ('2', 'DBL', '德邦');
INSERT INTO `qing_express` VALUES ('3', 'EMS', 'EMS');
INSERT INTO `qing_express` VALUES ('4', 'HHTT', '天天快递');
INSERT INTO `qing_express` VALUES ('5', 'HTKY', '百世快递');
INSERT INTO `qing_express` VALUES ('6', 'JJKY', '佳吉快运');
INSERT INTO `qing_express` VALUES ('7', 'QFKD', '全峰快递');
INSERT INTO `qing_express` VALUES ('8', 'SF', '顺丰快递');
INSERT INTO `qing_express` VALUES ('9', 'STO', '申通快递');
INSERT INTO `qing_express` VALUES ('10', 'YD', '韵达快递');
INSERT INTO `qing_express` VALUES ('11', 'YTO', '圆通速递');
INSERT INTO `qing_express` VALUES ('12', 'YZPY', '邮政平邮/小包');
INSERT INTO `qing_express` VALUES ('13', 'ZTO', '中通速递');

-- ----------------------------
-- Table structure for qing_fapiao
-- ----------------------------
DROP TABLE IF EXISTS `qing_fapiao`;
CREATE TABLE `qing_fapiao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `money` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `beizhu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未开具,1已开具',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `out_trade_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='发票管理';

-- ----------------------------
-- Records of qing_fapiao
-- ----------------------------
INSERT INTO `qing_fapiao` VALUES ('1', '11', '111dsds', '1595671047', '200', 'fdfdf', '1', 'dsd@qq.com', '1', '8dad4cd7c1b9af64a6e421aa138d6813');
INSERT INTO `qing_fapiao` VALUES ('2', 'fdfdsfds', 'fdfdfds', '1595671276', '100', '文具', '1', 'dfdf@qq.com', '1', '8dad4cd7c1b9af64a6e421aa138d681d');

-- ----------------------------
-- Table structure for qing_fenyong
-- ----------------------------
DROP TABLE IF EXISTS `qing_fenyong`;
CREATE TABLE `qing_fenyong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of qing_fenyong
-- ----------------------------
INSERT INTO `qing_fenyong` VALUES ('1', 'YJ1582684960', '1');

-- ----------------------------
-- Table structure for qing_flink
-- ----------------------------
DROP TABLE IF EXISTS `qing_flink`;
CREATE TABLE `qing_flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='友情链接表';

-- ----------------------------
-- Records of qing_flink
-- ----------------------------
INSERT INTO `qing_flink` VALUES ('6', 'dd链接', 'www.bbaidu.com');

-- ----------------------------
-- Table structure for qing_goods
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods`;
CREATE TABLE `qing_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(200) NOT NULL,
  `goods_short_name` varchar(60) DEFAULT NULL,
  `goods_thumb` varchar(200) DEFAULT NULL,
  `goods_price` varchar(50) DEFAULT NULL,
  `goods_status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '上架1下架-1',
  `goods_cate_id` int(10) NOT NULL DEFAULT '0',
  `market_price` varchar(100) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `type_id` int(10) DEFAULT NULL,
  `isnew` int(5) NOT NULL DEFAULT '0',
  `isbest` int(5) NOT NULL DEFAULT '0',
  `ishot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热销',
  `goods_code` int(100) DEFAULT NULL,
  `listorder` int(10) DEFAULT '0',
  `cate_path` varchar(100) DEFAULT NULL COMMENT '分类路径',
  `xiaoliang` int(200) DEFAULT '0',
  `single_standard` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1统一规格，2多规格',
  `post_money` varchar(20) NOT NULL DEFAULT '0' COMMENT '邮费',
  `stock` int(20) NOT NULL DEFAULT '0' COMMENT '库存',
  `selnumber` int(11) NOT NULL DEFAULT '0' COMMENT '销量',
  `click` int(11) NOT NULL DEFAULT '1',
  `collects_count` varchar(50) DEFAULT NULL COMMENT '商品收藏数量',
  `cover_url` varchar(200) DEFAULT NULL COMMENT '商品图片地址',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of qing_goods
-- ----------------------------
INSERT INTO `qing_goods` VALUES ('1', '小米11', '享12期分期免息，赠小米129元双动圈耳机', '/public/upload/20200812/ee3efe2b59b4f924b27f3939c74348bc.jpg', '1600', '1', '16', '1800', '', '', '1597200669', '1', '0', '1', '1', null, '0', '14_18_16', '0', '2', '0', '0', '1', '89', null, null);
INSERT INTO `qing_goods` VALUES ('2', '小米22', ' 4500mAh+33W闪充', '/public/upload/20200625/cd4055e97782ef3b2d60fea5076c1572.jpg', '1600', '1', '16', '1800', '', '', '1600656761', '1', '0', '1', '1', null, '1', '14_18_16', '0', '2', '1', '0', '5', '17', null, null);
INSERT INTO `qing_goods` VALUES ('3', '华为111', '120Hz弹出全面屏', '/public/upload/20200625/d4df8f952223634d1fec851dd0522107.jpg', '0.01', '1', '28', '0.02', '', '', '1600656726', '1', '0', '1', '1', null, '2', '14_18_28', '0', '2', '0', '0', '0', '33', null, null);
INSERT INTO `qing_goods` VALUES ('4', '电视机11', '', '/public/upload/20200625/0759f34f3c05e3e800fe811f8d94c2e6.jpg', '5888', '1', '156', '8000', '', '', '1593080663', '3', '0', '1', '1', null, '0', '4_155_156', '0', '2', '0', '0', '12', '22', null, null);
INSERT INTO `qing_goods` VALUES ('5', '智睿LED灯泡 10只装', '', '/public/upload/20200625/b014f074c410cd1f72b2c05e5dc37d04.jpg', '99', '1', '158', '199', '', '', '1593080706', '0', '0', '1', '1', null, '1', '4_157_158', '0', '1', '0', '100', '2', '47', null, null);
INSERT INTO `qing_goods` VALUES ('6', '小米33', '「6GB+128GB到手价仅1399元；8GB+128GB到手价仅1599元；8GB+256GB到手价仅1799元」', '/public/upload/20200810/7c2921c04fda2943e8b4d41011ea99d1.jpg', '1900', '1', '16', '2100', '', '5000mAh长循环大电量 / 6.53\"超大护眼屏幕 / G25八核处理器 / 大音量扬声器 / 1300万 AI相机 / 人脸解锁 / 最高支持512GB存储扩展', '1597049554', '1', '0', '1', '1', null, '0', '14_18_16', '0', '2', '11', '0', '4', '65', null, null);
INSERT INTO `qing_goods` VALUES ('7', 'Redmi手环', '', '/public/upload/20200904/bc87fb6becf47e9afabfc0ee61a6c3bd.jpg', '99', '1', '33', '149', '', '1.08英寸大屏彩显 / 14天续航，快拆直插充电 / 腕上信息提醒，一目了然 / 科学算法，守护你的健康', '1599181773', '0', '0', '1', '1', null, '0', '14_30_33', '0', '1', '0', '0', '0', '21', null, null);
INSERT INTO `qing_goods` VALUES ('8', '小米户外蓝牙音箱', '', '/public/upload/20200904/d0aa10a258d17ec93e6bd03ea5d80719.jpg', '0.02', '1', '59', '199', '', '大音量 / 长续航 / 轻盈便携 / 360°环绕立体声 / IP55防尘防水 / 双麦克风降噪通话 / 蓝牙5.0 / type-c接口', '1600508382', '0', '0', '1', '1', null, '0', '14_56_59', '0', '1', '0', '0', '0', '11', null, null);
INSERT INTO `qing_goods` VALUES ('9', '2020鼠年卡通创意滴胶小老鼠可爱钥匙扣挂件钥匙链情侣网红包挂件', '', '/public/upload/20200919/324f03e92af57a6f1dbbec0e04f29870.jpg', '1', '1', '160', '6', '', '', '1600509569', '0', '0', '1', '1', null, '0', '11_150_160', '0', '1', '0', '0', '0', '48', null, null);
INSERT INTO `qing_goods` VALUES ('10', '洋气网红上衣春秋季2020新款秋装短款针织开衫粗线很仙的毛衣外套', '', '/public/upload/20200919/702a1b47fd2d89863efb072179c9d4d3.jpg', '2', '1', '74', '5', '', '', '1600510090', '2', '0', '1', '1', null, '0', '1_63_74', '0', '2', '0', '0', '0', '13', null, null);
INSERT INTO `qing_goods` VALUES ('11', 'MLB官方 男女卫衣复古老花系列长袖宽松运动休闲潮流圆领秋季MTM1', '', '/public/upload/20200919/3ab5ae38ba4b52b26bddb09f5d32c2ea.jpg', '1.5', '1', '76', '2', '', '', '1600659603', '2', '0', '1', '1', null, '0', '1_63_76', '0', '2', '0', '0', '0', '19', null, null);
INSERT INTO `qing_goods` VALUES ('12', '全面屏电视E43K', '全面屏设计，海量内容', '/public/upload/20200921/266ea6ccc529110760cb3b238b8528da.jpg', '1300', '1', '156', '1500', '', '', '1600657906', '3', '0', '1', '1', null, '0', '4_155_156', '0', '2', '0', '0', '0', '15', null, null);
INSERT INTO `qing_goods` VALUES ('13', '高腰打底裤女裤外穿春秋冬款紧身显瘦百搭小脚黑色铅笔魔术小黑裤', '高腰收腹版型显瘦/显腿长+定制不抽丝不起球', '/public/upload/20200921/0f857bc7876c24ab07aabb5589b8b716.jpg', '65', '1', '111', '88', '', '', '1600660630', '2', '0', '1', '1', null, '0', '1_64_111', '0', '2', '1', '0', '0', '59', null, null);

-- ----------------------------
-- Table structure for qing_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods_attr`;
CREATE TABLE `qing_goods_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `standard_value_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品属性表';

-- ----------------------------
-- Records of qing_goods_attr
-- ----------------------------
INSERT INTO `qing_goods_attr` VALUES ('1', '1', '2');
INSERT INTO `qing_goods_attr` VALUES ('2', '1', '6');
INSERT INTO `qing_goods_attr` VALUES ('3', '1', '10');
INSERT INTO `qing_goods_attr` VALUES ('4', '2', '5');
INSERT INTO `qing_goods_attr` VALUES ('5', '2', '3');
INSERT INTO `qing_goods_attr` VALUES ('6', '2', '10');
INSERT INTO `qing_goods_attr` VALUES ('7', '3', '11');
INSERT INTO `qing_goods_attr` VALUES ('8', '3', '16');

-- ----------------------------
-- Table structure for qing_goods_content
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods_content`;
CREATE TABLE `qing_goods_content` (
  `goods_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品详情表';

-- ----------------------------
-- Records of qing_goods_content
-- ----------------------------
INSERT INTO `qing_goods_content` VALUES ('1', '');
INSERT INTO `qing_goods_content` VALUES ('2', '');
INSERT INTO `qing_goods_content` VALUES ('3', '');
INSERT INTO `qing_goods_content` VALUES ('4', '');
INSERT INTO `qing_goods_content` VALUES ('5', '');
INSERT INTO `qing_goods_content` VALUES ('6', '<p>小米手机还不错的</p>');
INSERT INTO `qing_goods_content` VALUES ('7', '<p><img src=\"https://cdn.cnbj1.fds.api.mi-img.com/mi-mall/c9db39101d147cdf7a70b672cf0f1cf4.jpg\"/></p>');
INSERT INTO `qing_goods_content` VALUES ('8', '<p style=\"text-align: center;\"><img src=\"https://cdn.cnbj1.fds.api.mi-img.com/mi-mall/c46236720812ec59cf38fae1faddcdd1.jpg\"/></p>');
INSERT INTO `qing_goods_content` VALUES ('9', '');
INSERT INTO `qing_goods_content` VALUES ('10', '<p><img src=\"https://img.alicdn.com/imgextra/i3/1792580015/TB2pTmDairz11Bjy1XaXXbRrFXa_!!1792580015.jpg\"/></p><p><img src=\"https://img.alicdn.com/imgextra/i2/1792580015/TB2lEayaaLB11BjSspkXXcy9pXa_!!1792580015.jpg\"/></p>');
INSERT INTO `qing_goods_content` VALUES ('11', '<p style=\"text-align: center;\"><img src=\"https://img.alicdn.com/imgextra/i1/2201410209674/O1CN01LKNbm22LKk8kepzxG_!!2201410209674.jpg\"/></p>');
INSERT INTO `qing_goods_content` VALUES ('12', '<p style=\"text-align: center;\"><img src=\"https://cdn.cnbj1.fds.api.mi-img.com/mi-mall/e627ee5af6c036206496abc30102d994.jpg?w=1212&h=716\"/></p>');
INSERT INTO `qing_goods_content` VALUES ('13', '<p style=\"text-align: center;\"><img src=\"https://img.alicdn.com/imgextra/i2/3829438756/O1CN01GBJhCv2EYIXasjmuR_!!3829438756.jpg\"/></p>');

-- ----------------------------
-- Table structure for qing_goods_img
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods_img`;
CREATE TABLE `qing_goods_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品轮播图';

-- ----------------------------
-- Records of qing_goods_img
-- ----------------------------
INSERT INTO `qing_goods_img` VALUES ('20', '4', '/public/upload/20200625/0759f34f3c05e3e800fe811f8d94c2e6.jpg');
INSERT INTO `qing_goods_img` VALUES ('21', '4', '/public/upload/20200625/332d25febd2802c6d25646e490f904e6.jpg');
INSERT INTO `qing_goods_img` VALUES ('22', '4', '/public/upload/20200625/e2edfb80ef55f6b3d5e3f5143ec2f451.jpg');
INSERT INTO `qing_goods_img` VALUES ('23', '4', '/public/upload/20200625/77d3b56a29fea1d1e52644972bb649e1.jpg');
INSERT INTO `qing_goods_img` VALUES ('24', '4', '/public/upload/20200625/6e902f359bc7be76f32a6355dfac2746.jpg');
INSERT INTO `qing_goods_img` VALUES ('25', '5', '/public/upload/20200625/b014f074c410cd1f72b2c05e5dc37d04.jpg');
INSERT INTO `qing_goods_img` VALUES ('68', '6', '/public/upload/20200810/7c2921c04fda2943e8b4d41011ea99d1.jpg');
INSERT INTO `qing_goods_img` VALUES ('69', '6', '/public/upload/20200810/7e9ba4838998b81b1b8db30628ec0b7b.jpg');
INSERT INTO `qing_goods_img` VALUES ('70', '6', '/public/upload/20200810/6645cedc4b3209c22722f7296c310311.jpg');
INSERT INTO `qing_goods_img` VALUES ('71', '6', '/public/upload/20200810/9307a11a5f65ccda184792ff8ffc2834.jpg');
INSERT INTO `qing_goods_img` VALUES ('72', '1', '/public/upload/20200812/ee3efe2b59b4f924b27f3939c74348bc.jpg');
INSERT INTO `qing_goods_img` VALUES ('73', '1', '/public/upload/20200812/9814b9a180076f7e2b80498c2b8bd0ae.jpg');
INSERT INTO `qing_goods_img` VALUES ('74', '1', '/public/upload/20200812/9814b9a180076f7e2b80498c2b8bd0ae.jpg');
INSERT INTO `qing_goods_img` VALUES ('75', '1', '/public/upload/20200812/dd0fb4eec5422a2677406e96bb6fadfb.jpg');
INSERT INTO `qing_goods_img` VALUES ('76', '1', '/public/upload/20200812/392f31c3418bed3ce41d01470db4b7d3.jpg');
INSERT INTO `qing_goods_img` VALUES ('82', '7', '/public/upload/20200904/bc87fb6becf47e9afabfc0ee61a6c3bd.jpg');
INSERT INTO `qing_goods_img` VALUES ('88', '8', '/public/upload/20200904/d0aa10a258d17ec93e6bd03ea5d80719.jpg');
INSERT INTO `qing_goods_img` VALUES ('89', '8', '/public/upload/20200904/ad79ea14236173520b3b0fb00999f408.jpg');
INSERT INTO `qing_goods_img` VALUES ('90', '8', '/public/upload/20200904/627afb0553e9bde45664dd500c6c7c8c.jpg');
INSERT INTO `qing_goods_img` VALUES ('91', '8', '/public/upload/20200904/9feba4043dfd2d2bb27f78976a03ddb4.jpg');
INSERT INTO `qing_goods_img` VALUES ('92', '8', '/public/upload/20200904/4396635239cc67b0be30a98333a3c22c.jpg');
INSERT INTO `qing_goods_img` VALUES ('93', '9', '/public/upload/20200919/324f03e92af57a6f1dbbec0e04f29870.jpg');
INSERT INTO `qing_goods_img` VALUES ('94', '9', '/public/upload/20200919/db94d077adc4e9a9c9ba508f8eb72768.jpg');
INSERT INTO `qing_goods_img` VALUES ('95', '9', '/public/upload/20200919/b4fb57a344e0998d56e78f236ca4bd35.jpg');
INSERT INTO `qing_goods_img` VALUES ('100', '10', '/public/upload/20200919/702a1b47fd2d89863efb072179c9d4d3.jpg');
INSERT INTO `qing_goods_img` VALUES ('101', '10', '/public/upload/20200919/b45cfdc09b411bb3b00da4d845fd255a.jpg');
INSERT INTO `qing_goods_img` VALUES ('102', '10', '/public/upload/20200919/b9d032f681d267e796300dbcb780664b.jpg');
INSERT INTO `qing_goods_img` VALUES ('103', '10', '/public/upload/20200919/4bfa2441d7f54b36b89ed1fd4c91ab00.jpg');
INSERT INTO `qing_goods_img` VALUES ('106', '3', '/public/upload/20200625/d4df8f952223634d1fec851dd0522107.jpg');
INSERT INTO `qing_goods_img` VALUES ('107', '3', '/public/upload/20200625/ff665c01957af1b48ff7978132310e81.jpg');
INSERT INTO `qing_goods_img` VALUES ('108', '3', '/public/upload/20200625/0978b87433b960b2d2b54128b6d238da.jpg');
INSERT INTO `qing_goods_img` VALUES ('109', '3', '/public/upload/20200625/43d53215feaebb803e3e8f1ef5bae756.jpg');
INSERT INTO `qing_goods_img` VALUES ('110', '3', '/public/upload/20200625/ffb84865e7ca78eff20070d918af34ee.jpg');
INSERT INTO `qing_goods_img` VALUES ('111', '2', '/public/upload/20200625/cd4055e97782ef3b2d60fea5076c1572.jpg');
INSERT INTO `qing_goods_img` VALUES ('112', '2', '/public/upload/20200625/c2854a4d78f1f8433a4f266f477d8e64.jpg');
INSERT INTO `qing_goods_img` VALUES ('113', '2', '/public/upload/20200625/7f45b8c16aad5cc21627309114bb21ab.jpg');
INSERT INTO `qing_goods_img` VALUES ('114', '2', '/public/upload/20200625/ec97ef5110c2d4a29e26e354b187d76c.jpg');
INSERT INTO `qing_goods_img` VALUES ('115', '2', '/public/upload/20200625/ed8a71b4be046e840404804b3b71c5dd.jpg');
INSERT INTO `qing_goods_img` VALUES ('131', '12', '/public/upload/20200921/266ea6ccc529110760cb3b238b8528da.jpg');
INSERT INTO `qing_goods_img` VALUES ('132', '12', '/public/upload/20200921/ef79cb9bd8947a88c2dd775571ebb12e.jpg');
INSERT INTO `qing_goods_img` VALUES ('133', '12', '/public/upload/20200921/6c50423542b12e4968a54a93ebb9bd27.jpg');
INSERT INTO `qing_goods_img` VALUES ('134', '12', '/public/upload/20200921/4404ad5bac0cd8a39966d8cbff60f426.jpg');
INSERT INTO `qing_goods_img` VALUES ('135', '12', '/public/upload/20200921/40663991fce833735ee5a82852133fe9.jpg');
INSERT INTO `qing_goods_img` VALUES ('136', '11', '/public/upload/20200919/3ab5ae38ba4b52b26bddb09f5d32c2ea.jpg');
INSERT INTO `qing_goods_img` VALUES ('137', '11', '/public/upload/20200919/a97128f488f3868c0a3cc50f3f7f4205.jpg');
INSERT INTO `qing_goods_img` VALUES ('142', '13', '/public/upload/20200921/0f857bc7876c24ab07aabb5589b8b716.jpg');
INSERT INTO `qing_goods_img` VALUES ('143', '13', '/public/upload/20200921/0f857bc7876c24ab07aabb5589b8b716.jpg');
INSERT INTO `qing_goods_img` VALUES ('144', '13', '/public/upload/20200921/61816b80ac5b6e138e828f116c4749ec.jpg');
INSERT INTO `qing_goods_img` VALUES ('145', '13', '/public/upload/20200921/326f5f49115feaea20d390f222745df8.jpg');

-- ----------------------------
-- Table structure for qing_goods_standard
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods_standard`;
CREATE TABLE `qing_goods_standard` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '基本信息ID',
  `goods_price` varchar(100) DEFAULT NULL COMMENT '市场价',
  `market_price` varchar(100) DEFAULT '0' COMMENT '市场价格',
  `stock` int(10) DEFAULT NULL COMMENT '库存',
  `sku` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of qing_goods_standard
-- ----------------------------
INSERT INTO `qing_goods_standard` VALUES ('63', '1', '1800', '2000', '0', '2,10,23');
INSERT INTO `qing_goods_standard` VALUES ('82', '2', '1700', '1800', '0', '3,6,23');
INSERT INTO `qing_goods_standard` VALUES ('81', '2', '1700', '1800', '0', '3,5,23');
INSERT INTO `qing_goods_standard` VALUES ('77', '3', '0.01', '0.02', '0', '2,6,24');
INSERT INTO `qing_goods_standard` VALUES ('13', '4', '5888', '8000', '0', '11,16');
INSERT INTO `qing_goods_standard` VALUES ('80', '2', '1600', '1800', '0', '2,6,23');
INSERT INTO `qing_goods_standard` VALUES ('79', '2', '1600', '1800', '0', '2,5,23');
INSERT INTO `qing_goods_standard` VALUES ('59', '6', '2000', '2100', '0', '3,6,23');
INSERT INTO `qing_goods_standard` VALUES ('62', '1', '1800', '2000', '0', '2,6,23');
INSERT INTO `qing_goods_standard` VALUES ('61', '1', '1600', '1800', '0', '1,10,23');
INSERT INTO `qing_goods_standard` VALUES ('60', '1', '1600', '1800', '0', '1,6,23');
INSERT INTO `qing_goods_standard` VALUES ('58', '6', '2000', '2100', '0', '3,5,23');
INSERT INTO `qing_goods_standard` VALUES ('57', '6', '1900', '2100', '0', '2,6,23');
INSERT INTO `qing_goods_standard` VALUES ('56', '6', '1900', '2100', '0', '2,5,23');
INSERT INTO `qing_goods_standard` VALUES ('69', '10', '2', '5', '0', '7,14');
INSERT INTO `qing_goods_standard` VALUES ('70', '10', '2', '5', '0', '7,15');
INSERT INTO `qing_goods_standard` VALUES ('71', '10', '2', '5', '0', '8,14');
INSERT INTO `qing_goods_standard` VALUES ('72', '10', '2', '5', '0', '8,15');
INSERT INTO `qing_goods_standard` VALUES ('87', '11', '1.5', '2', '0', '26,14');
INSERT INTO `qing_goods_standard` VALUES ('86', '11', '1.5', '2', '0', '7,25');
INSERT INTO `qing_goods_standard` VALUES ('85', '11', '1.5', '2', '0', '7,14');
INSERT INTO `qing_goods_standard` VALUES ('78', '3', '0.01', '0.02', '0', '2,10,24');
INSERT INTO `qing_goods_standard` VALUES ('84', '12', '1300', '1500', '0', '27,28');
INSERT INTO `qing_goods_standard` VALUES ('88', '11', '1.5', '2', '0', '26,25');
INSERT INTO `qing_goods_standard` VALUES ('89', '13', '65', '88', '0', '7,30');
INSERT INTO `qing_goods_standard` VALUES ('90', '13', '65', '88', '0', '8,30');
INSERT INTO `qing_goods_standard` VALUES ('91', '13', '65', '88', '0', '29,30');

-- ----------------------------
-- Table structure for qing_goods_standard1
-- ----------------------------
DROP TABLE IF EXISTS `qing_goods_standard1`;
CREATE TABLE `qing_goods_standard1` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '基本信息ID',
  `goods_price` varchar(100) DEFAULT NULL COMMENT '市场价',
  `market_price` varchar(100) DEFAULT '0' COMMENT '市场价格',
  `stock` int(10) DEFAULT NULL COMMENT '库存',
  `sku` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of qing_goods_standard1
-- ----------------------------
INSERT INTO `qing_goods_standard1` VALUES ('19', '6', '2200', '2000', '0', '4,10');
INSERT INTO `qing_goods_standard1` VALUES ('18', '6', '2200', '2000', '0', '4,6');
INSERT INTO `qing_goods_standard1` VALUES ('17', '6', '2200', '2000', '0', '4,6');
INSERT INTO `qing_goods_standard1` VALUES ('16', '6', '2200', '2000', '0', '4_6');
INSERT INTO `qing_goods_standard1` VALUES ('15', '1', '1600', '1800', '0', '2,10');
INSERT INTO `qing_goods_standard1` VALUES ('14', '1', '1600', '1800', '0', '2,6');
INSERT INTO `qing_goods_standard1` VALUES ('7', '2', '1600', '2500', '0', '2,5');
INSERT INTO `qing_goods_standard1` VALUES ('8', '2', '1600', '2500', '0', '2,6');
INSERT INTO `qing_goods_standard1` VALUES ('9', '2', '2200', '2500', '0', '3,5');
INSERT INTO `qing_goods_standard1` VALUES ('10', '2', '2200', '2500', '0', '3,6');
INSERT INTO `qing_goods_standard1` VALUES ('11', '3', '1500', '1800', '0', '2,6,7');
INSERT INTO `qing_goods_standard1` VALUES ('12', '3', '1500', '1800', '0', '2,10');
INSERT INTO `qing_goods_standard1` VALUES ('13', '4', '5888', '8000', '0', '11,16');
INSERT INTO `qing_goods_standard1` VALUES ('22', '10', '10', '10', '0', '1,2,6');
INSERT INTO `qing_goods_standard1` VALUES ('23', '10', '10', '10', null, '1,3,6');
INSERT INTO `qing_goods_standard1` VALUES ('24', '11', '10', '10', null, '1,2,55');
INSERT INTO `qing_goods_standard1` VALUES ('25', '11', '10', '10', null, '2,4,5');

-- ----------------------------
-- Table structure for qing_merchant
-- ----------------------------
DROP TABLE IF EXISTS `qing_merchant`;
CREATE TABLE `qing_merchant` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `store_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `store_pic` varchar(150) DEFAULT NULL,
  `payment_code_pic` varchar(150) DEFAULT NULL,
  `store_type` varchar(20) DEFAULT NULL,
  `submit_ip` varchar(20) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `car_name` varchar(50) DEFAULT NULL,
  `car_number` varchar(20) DEFAULT NULL,
  `car_pic` varchar(150) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(4) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of qing_merchant
-- ----------------------------
INSERT INTO `qing_merchant` VALUES ('1', '2', '螺蛳粉总店', '北京市', '老王', '\\public\\upload/20240215\\3e571ad87c2f5a8a7eb5dbbde7ed1670.png', '\\public\\upload/20240215\\5450341b4b8d3c1f50675ea81e89ceda.png', '餐饮', '127.0.0.1', '本机', '奔驰A1', 'Q22557899', '\\public\\upload/20240215\\f63739f0b35a2c334498fb9d9ad079e0.png', '审核待确认中，身份信息不明。', '1', null, '1707967070', null);
INSERT INTO `qing_merchant` VALUES ('4', null, null, '浙江省义乌市', null, null, null, null, '127.0.0.1', null, '迈巴赫90', 'E50457BA', '/car.jpg', null, null, null, null, null);
INSERT INTO `qing_merchant` VALUES ('5', null, null, '湖南长沙市', null, null, null, null, '127.0.0.1', null, '宝马A3', 'E50457VN', '/car.jpg', null, '-1', null, null, null);
INSERT INTO `qing_merchant` VALUES ('6', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\230ba4abc60ae47af444c67632bdc68b.png', '\\public\\upload/20240215\\44c6bf41c16109806cc7373d7bdec76d.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973266', null, null);
INSERT INTO `qing_merchant` VALUES ('7', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\024e045373071544e1c9688927956e73.png', '\\public\\upload/20240215\\cd489684005e5a30107e65a15f8f748f.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973317', null, null);
INSERT INTO `qing_merchant` VALUES ('8', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\7180aa81aaa34803dfc922830ed0bb7c.png', '\\public\\upload/20240215\\76bab021842baa8cd761deedf0df4d94.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973319', null, null);
INSERT INTO `qing_merchant` VALUES ('9', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\e87a32d6e339d003fe995c2f83267e08.png', '\\public\\upload/20240215\\5dc3abb2cc71cb869d60c05a8f51f1fb.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973415', null, null);
INSERT INTO `qing_merchant` VALUES ('10', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\0139a0c0b2ae6ee93667a849eec2d771.png', '\\public\\upload/20240215\\539142e172e6ee958548a0a6c6c5ab06.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973650', null, null);
INSERT INTO `qing_merchant` VALUES ('11', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\507925932e24e54310cb3019e60b0832.png', '\\public\\upload/20240215\\8278b4b26e7b07179db60333e34754a5.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973653', null, null);
INSERT INTO `qing_merchant` VALUES ('12', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\7531d669668251465e7a7586c305be92.png', '\\public\\upload/20240215\\0cc8adadcc141bbab3d37af483832b90.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973654', null, null);
INSERT INTO `qing_merchant` VALUES ('13', '2', '橘子商铺', '北京城西', '老五111', '\\public\\upload/20240215\\1ba7cd5e41412f48d6289b6dd02809ed.png', '\\public\\upload/20240215\\d7d1ba0b4d1f850ac3540cc77374db95.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973656', null, '1707984992');
INSERT INTO `qing_merchant` VALUES ('14', '2', '橘子商铺', '北京城西', '老五', '\\public\\upload/20240215\\a35957bd8d1ec968e0305cf312349c10.png', '\\public\\upload/20240215\\e156f43b983345560d4a1d5966e9c58f.png', '农业', '127.0.0.1', null, null, null, null, null, null, '1707973957', null, null);
INSERT INTO `qing_merchant` VALUES ('15', '2', '橘子商铺', '河北省南昌市', '老五', '\\public\\upload/20240215\\c746160c27527a8c73bf14fb1cc0adf7.png', '\\public\\upload/20240215\\efee3f15b1ff6a863e822e21f607a706.png', '餐饮', '127.0.0.1', null, '奔驰A1', 'Q22557899', '\\public\\upload/20240215\\91a2533c25e3d30d6a4f7a57f5a32c07.png', null, null, '1707976072', '1707980410', null);
INSERT INTO `qing_merchant` VALUES ('16', '2', '998商铺', '河北省南昌市', '老五', '\\public\\upload/20240215\\06e3850eb3e1e2ad4b67bf28ff008aba.png', '\\public\\upload/20240215\\b08ce2848d05df3d68533cbe69abf87e.png', '餐饮', '127.0.0.1', null, null, null, null, null, null, '1707990066', null, null);
INSERT INTO `qing_merchant` VALUES ('17', '2', '99商铺1122', '河北省南昌市22', '老五22', '\\public\\upload/20240215\\7f9c19f3175d75d9883df735623e2f71.png', '\\public\\upload/20240215\\1b3279eb9a89fd00ceba61a8ef073970.png', '餐饮22', '127.0.0.1', null, null, null, null, null, null, '1707990090', null, null);

-- ----------------------------
-- Table structure for qing_message
-- ----------------------------
DROP TABLE IF EXISTS `qing_message`;
CREATE TABLE `qing_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(200) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `weixin` varchar(20) DEFAULT NULL,
  `dingdan` varchar(50) DEFAULT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_message
-- ----------------------------
INSERT INTO `qing_message` VALUES ('2', '还哦不错', '王大力', '13988598596', 'shijiazhuang@126.com', '河北省石家庄市裕华区和合大厦201', '1575511676');

-- ----------------------------
-- Table structure for qing_news
-- ----------------------------
DROP TABLE IF EXISTS `qing_news`;
CREATE TABLE `qing_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `time` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='新闻文章';

-- ----------------------------
-- Records of qing_news
-- ----------------------------
INSERT INTO `qing_news` VALUES ('2', '永远相信美好的事情即将发生', '\\public\\upload/20200504\\c88accb7e23efbc1d0e36d956b958c53.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20200504/1588583651379544.png\" title=\"1588583651379544.png\" alt=\"image.png\"/></p><p><br/></p><p>小米公司正式成立于2010年4月，是一家以手机、智能硬件和 IoT 平台为核心的互联网公司。创业仅7年时间，小米的年收入就突破了千亿元人民币。截止2018年，小米的业务遍及全球80多个国家和地区。&nbsp;&nbsp;</p><p>小米的使命是，始终坚持做“感动人心、价格厚道”的好产品，让全球每个人都能享受科技带来的美好生活。</p>', '1588562918', '小米的使命是，始终坚持做“感动人心、价格厚道”的好产品，让全球每个人都能享受科技带来的美好生活。');
INSERT INTO `qing_news` VALUES ('3', '感谢您关注小米', '\\public\\upload/20200504\\6b0b7e2c56044e7b9264576d8e5ea97e.jpg', '<p>目前，小米是全球第四大智能手机制造商，在30余个国家和地区的手机市场进入了前五名，特别是在印度，连续5个季度保持手机出货量第一。通过独特的“生态链模式”，小米投资、带动了更多志同道合的创业者，同时建成了连接超过1.3亿台智能设备的IoT平台。&nbsp;</p><p>2018年7月9日，小米成功在香港主板上市，成为了港交所首个同股不同权上市公司，创造了香港史上最大规模科技股IPO，以及当时历史上全球第三大科技股IPO。&nbsp;&nbsp;</p><p>感谢您关注小米，和我们并肩投身于创造商业效率新典范，用科技改善人类生活的壮丽事业。许商业以敦厚，许科技以温暖，许大众以幸福，我们的征途是星辰大海，请和我们一起，永远相信美好的事情即将发生。</p>', '1588562950', '感谢您关注小米，和我们并肩投身于创造商业效率新典范，用科技改善人类生活的壮丽事业。');
INSERT INTO `qing_news` VALUES ('4', '小米集团申请推迟召开发审委会议的公告', '\\public\\upload/20200504\\125ff34e05f1bc9c821392c0c3252b7f.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Heiti SC&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 19px; background-color: rgb(255, 255, 255);\">公司经过反复慎重研究，决定分步实施在香港和境内的上市计划，即先在香港上市之后，再择机通过发行CDR的方式在境内上市。为此，公司将向中国证券监督管理委员会发起申请，推迟召开发审委会议审核公司的CDR发行申请。特此公告</span></p>', '1588581991', '公司经过反复慎重研究，决定分步实施在香港和境内的上市计划，即先在香港上市之后，再择机通过发行CDR的方式在境内上市。');
INSERT INTO `qing_news` VALUES ('5', '111', '/public/upload/20200602/b90451409c0dab15d692869f5229552c.jpg', null, '1590483739', '');
INSERT INTO `qing_news` VALUES ('8', '说一说ThinkPHP6的空控制器', '/public/static/index/images/thumb.jpg', '<p>空控制器在ThinkPHP6的手册中只占据了一个很小很小的篇幅，以至于空控制器是什么，甚至这个词语，可能很多程序员并没有听过、没有用过，那么这次给大家用实际例子说一说ThinkPHP6的空控制器。</p><p>我们在ThinkPHP6的官方手册中搜索“空控制器”关键字，就可以找到空控制器的章节内容。我们先看看空控制器的官方定义：<br/></p><p>空控制器的概念是指当系统找不到指定的控制器名称的时候，系统会尝试定位当前应用下的空控制器( Error )</p><p>类，利用这个机制我们可以用来定制错误页面和进行URL的优化。</p><p>也就是说我们可以用空控制器来定制我们的错误页面。</p><p>手册中是以单应用举例，但是实际情况我们项目大部分都是多应用，所以接下来我们以多应用举例。</p><p>假设我们项目域名www.xiangmu.com，我们有index和demo两个应用，两个应用下分别有各自的index控制器和index方法。</p><p>1、找不到方法。</p><p>&nbsp; &nbsp; &nbsp; 如果我们在浏览器中随便输入<a href=\"http://www.xiangmu.com/index/index/a，这个地址会访问到index应用下index控制器中的a方法，但是我们a方法并不存在，如果能拒绝这种无效的请求呢？那我们本节的空控制器就登场了。\">www.xiangmu.com/index/index/a，这个地址会访问到index应用下index控制器中的a方法，但是我们a方法并不存在，如果能拒绝这种无效的请求呢？那我们本节的空控制器就登场了。</a> </p><p>我们在index控制中加入下面方法：<br/></p><p>只要访问index控制中找不到的方法，都会走到__call这里。那么既然已经走到了__call()，对于不存在的页面，我们是不是可以做个404.html，用call()去渲染这个模板呢。</p><p>2、找不到控制器。</p><p>上面是找不到方法，如果找不到控制器怎么办？我在浏览器中随便输入控制器，<a href=\"http://www.xiangmu.com/index/index/a%EF%BC%8C%E8%BF%99%E4%B8%AA%E5%9C%B0%E5%9D%80%E4%BC%9A%E8%AE%BF%E9%97%AE%E5%88%B0index%E5%BA%94%E7%94%A8%E4%B8%8Bindex%E6%8E%A7%E5%88%B6%E5%99%A8%E4%B8%AD%E7%9A%84a%E6%96%B9%E6%B3%95%EF%BC%8C%E4%BD%86%E6%98%AF%E6%88%91%E4%BB%ACa%E6%96%B9%E6%B3%95%E5%B9%B6%E4%B8%8D%E5%AD%98%E5%9C%A8%EF%BC%8C%E5%A6%82%E6%9E%9C%E8%83%BD%E6%8B%92%E7%BB%9D%E8%BF%99%E7%A7%8D%E6%97%A0%E6%95%88%E7%9A%84%E8%AF%B7%E6%B1%82%E5%91%A2%EF%BC%9F%E9%82%A3%E6%88%91%E4%BB%AC%E6%9C%AC%E8%8A%82%E7%9A%84%E7%A9%BA%E6%8E%A7%E5%88%B6%E5%99%A8%E5%B0%B1%E7%99%BB%E5%9C%BA%E4%BA%86%E3%80%82\" style=\"white-space: normal;\">www.xiangmu.com/index/a/a</a>，实际上我们没有a控制器也没有a方法，<a href=\"http://www.xiangmu.com/index/index/a%EF%BC%8C%E8%BF%99%E4%B8%AA%E5%9C%B0%E5%9D%80%E4%BC%9A%E8%AE%BF%E9%97%AE%E5%88%B0index%E5%BA%94%E7%94%A8%E4%B8%8Bindex%E6%8E%A7%E5%88%B6%E5%99%A8%E4%B8%AD%E7%9A%84a%E6%96%B9%E6%B3%95%EF%BC%8C%E4%BD%86%E6%98%AF%E6%88%91%E4%BB%ACa%E6%96%B9%E6%B3%95%E5%B9%B6%E4%B8%8D%E5%AD%98%E5%9C%A8%EF%BC%8C%E5%A6%82%E6%9E%9C%E8%83%BD%E6%8B%92%E7%BB%9D%E8%BF%99%E7%A7%8D%E6%97%A0%E6%95%88%E7%9A%84%E8%AF%B7%E6%B1%82%E5%91%A2%EF%BC%9F%E9%82%A3%E6%88%91%E4%BB%AC%E6%9C%AC%E8%8A%82%E7%9A%84%E7%A9%BA%E6%8E%A7%E5%88%B6%E5%99%A8%E5%B0%B1%E7%99%BB%E5%9C%BA%E4%BA%86%E3%80%82\" style=\"white-space: normal;\">如果能拒绝这种无效的请求呢？</a></p><p>那用下面的Error.php控制器就可以解决，加入当前访问的是index应用，我们就把Error.php放在index应用下。同理我们也可以设置404等错误页面哦。</p><p><br/></p><p><br/></p><p><br/></p>', '1591870366', '');

-- ----------------------------
-- Table structure for qing_notice
-- ----------------------------
DROP TABLE IF EXISTS `qing_notice`;
CREATE TABLE `qing_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为全体，1为某个',
  `title` varchar(100) NOT NULL,
  `content` text,
  `time` int(10) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='通知消息';

-- ----------------------------
-- Records of qing_notice
-- ----------------------------
INSERT INTO `qing_notice` VALUES ('1', '0', '刘同学回复了你的商品分类与商品sku问题，可能有你需要的答案。', '<p>刘同学回复了你的商品分类与商品sku问题，可能有你需要的答案。刘同学回复了你的商品分类与商品sku问题，可能有你需要的答案。</p>', '1575511676', null);
INSERT INTO `qing_notice` VALUES ('2', '0', '天下谁人不识君关注了你', '天下谁人不识君关注了你天下谁人不识君关注了你', '1575860919', null);
INSERT INTO `qing_notice` VALUES ('3', '0', '一大把破优惠券来袭！', 'fff', '1575860999', '');
INSERT INTO `qing_notice` VALUES ('4', '0', '你参与的问题被回复了，可能有新收获？', '<p><a target=\"_blank\" href=\"http://coding.imooc.com/learn/questiondetail/159290.html\" style=\"margin: 0px; padding: 0px 5px; outline: 0px; text-decoration-line: none; color: rgb(147, 153, 159); font-weight: 700; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">你参与的问题被回复了，可能有新收获？</a></p>', '1588646762', '0');
INSERT INTO `qing_notice` VALUES ('5', '1', '尊敬的用户，您有8张优惠券即将过期，机不可失，来选一门心仪的课程吧！', '<p><a target=\"_blank\" href=\"https://order.imooc.com/coupon\" style=\"margin: 0px; padding: 0px 5px; outline: 0px; text-decoration-line: none; color: rgb(147, 153, 159); font-weight: 700; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">尊敬的用户，您有8张优惠券即将过期，机不可失，来选一门心仪的课程吧！</a></p>', '1588647018', '1');
INSERT INTO `qing_notice` VALUES ('6', '1', '你的状态筛选性能问题问题，可能有你需要的答案。', '<p><a target=\"_blank\" href=\"http://coding.imooc.com/learn/questiondetail/167280.html\" style=\"margin: 0px; padding: 0px 5px; outline: 0px; text-decoration-line: none; color: rgb(147, 153, 159); font-weight: 700; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">你的状态筛选性能问题问题，可能有你需要的答案。</a></p>', '1588647789', '1');
INSERT INTO `qing_notice` VALUES ('7', '1', '你的状态筛选性能问题问题，可能有你需要的答案。', '<p><a target=\"_blank\" href=\"http://coding.imooc.com/learn/questiondetail/167280.html\" style=\"margin: 0px; padding: 0px 5px; outline: 0px; text-decoration-line: none; color: rgb(147, 153, 159); font-weight: 700; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">你的状态筛选性能问题问题，可能有你需要的答案。</a></p>', '1588647789', '2');
INSERT INTO `qing_notice` VALUES ('8', '1', '您的优惠券马上过期了，请尽快使用', '', '1589938762', '1,2,3');

-- ----------------------------
-- Table structure for qing_notice_read
-- ----------------------------
DROP TABLE IF EXISTS `qing_notice_read`;
CREATE TABLE `qing_notice_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `notice_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='通知消息已读表';

-- ----------------------------
-- Records of qing_notice_read
-- ----------------------------
INSERT INTO `qing_notice_read` VALUES ('1', '1', '2');
INSERT INTO `qing_notice_read` VALUES ('2', '1', '6');
INSERT INTO `qing_notice_read` VALUES ('3', '33', '4');
INSERT INTO `qing_notice_read` VALUES ('4', '33', '3');
INSERT INTO `qing_notice_read` VALUES ('5', '33', '2');
INSERT INTO `qing_notice_read` VALUES ('6', '33', '1');

-- ----------------------------
-- Table structure for qing_order
-- ----------------------------
DROP TABLE IF EXISTS `qing_order`;
CREATE TABLE `qing_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL COMMENT '会员id',
  `time` int(10) unsigned NOT NULL COMMENT '下单时间',
  `address_id` varchar(30) NOT NULL COMMENT '收货信息',
  `content` varchar(50) DEFAULT NULL COMMENT '订单备注',
  `total_price` varchar(100) NOT NULL COMMENT '定单总价',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0：待付款，1：支付完成，待发货，2：已完成，4：已发货未签收',
  `pay_method` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：微信支付，2：支付宝支付',
  `postcode` varchar(50) DEFAULT NULL COMMENT '快递单号',
  `express_code` varchar(10) DEFAULT NULL COMMENT '快递公司代号',
  `isfapiao` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1：已开发票 0：未开发票',
  `out_trade_no` varchar(100) NOT NULL COMMENT '订单号',
  `pay_time` int(11) DEFAULT NULL COMMENT '支付时间',
  `iscomment` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未评论 1已评论',
  PRIMARY KEY (`id`),
  UNIQUE KEY `out_trade_no` (`out_trade_no`),
  KEY `out_trade_no_2` (`out_trade_no`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='定单基本信息';

-- ----------------------------
-- Records of qing_order
-- ----------------------------
INSERT INTO `qing_order` VALUES ('2', '1', '1598427486', '2', '', '99', '2', '2', null, null, '0', '1dfc9cc646e5cc6b4734a6ad7ade3c79', null, '1');
INSERT INTO `qing_order` VALUES ('3', '1', '1598427511', '2', '', '3811', '2', '1', null, null, '0', 'aa30be8e6f38677635b40e778e272879', '1598514310', '1');
INSERT INTO `qing_order` VALUES ('4', '1', '1598514361', '2', '', '5888', '2', '1', null, null, '0', 'e90db5aa926d9c56e291d68ed7bf2ad1', null, '1');
INSERT INTO `qing_order` VALUES ('6', '1', '1599035542', '2', '', '1899', '2', '2', null, null, '0', '61f7f2bf2d2dc72a38a8ebe80e2fc974', null, '1');
INSERT INTO `qing_order` VALUES ('10', '1', '1599120914', '2', '', '5888', '2', '2', null, null, '0', 'ab0efb33ebc57be99ec0e4fca6ff01fa', null, '1');
INSERT INTO `qing_order` VALUES ('11', '1', '1599124518', '2', '', '169', '2', '1', null, null, '0', '1a1dd5c799de66c67736ca2d7a2e5305', null, '1');
INSERT INTO `qing_order` VALUES ('12', '1', '1599124514', '2', '', '1599', '2', '2', null, null, '0', '89f8f42719c5cddcc7be9a293323b08d', null, '1');
INSERT INTO `qing_order` VALUES ('13', '1', '1599124518', '2', '', '5987', '2', '1', null, null, '0', '0dbd748c6dc4c473edb8af998de21cb3', null, '1');
INSERT INTO `qing_order` VALUES ('17', '1', '1683006169', '2', '', '1.01', '0', '1', null, null, '0', 'c61d7ef29dac14f49bb284a961a1167e', null, '0');
INSERT INTO `qing_order` VALUES ('18', '44', '1711006839', '3', '', '0.01', '0', '1', null, null, '0', '96ec30348c95f256c4bc24d2c3f496bd', null, '0');
INSERT INTO `qing_order` VALUES ('19', '44', '1711007067', '3', '', '0.01', '0', '2', null, null, '0', '8d523e62ecf2ffbd725609ff5d5842d6', null, '0');
INSERT INTO `qing_order` VALUES ('20', '30', '1711007641', '5', '', '0.01', '0', '1', null, null, '0', '7a1894d34a641f8f83e36d9c33b1efa1', null, '0');
INSERT INTO `qing_order` VALUES ('21', '30', '1711007667', '5', '', '0.01', '0', '2', null, null, '0', 'b0d8416a3995d9bc303335035eeeb334', null, '0');
INSERT INTO `qing_order` VALUES ('22', '44', '1711007733', '3', '', '1701.01', '0', '2', null, null, '0', '8137a641fea70fa7c9200f92b48f834f', null, '0');
INSERT INTO `qing_order` VALUES ('23', '44', '1711007841', '3', '', '1800', '0', '1', null, null, '0', '8931ebc2cad15aa7dcd68a849fd88e60', null, '0');
INSERT INTO `qing_order` VALUES ('24', '44', '1711008182', '3', '', '0.01', '0', '1', null, null, '0', '1e3fc3a8bf2956573b8d047103a53448', null, '0');
INSERT INTO `qing_order` VALUES ('25', '44', '1711012045', '3', '', '0.06', '0', '1', null, null, '0', '5a8c9079fd2ba0688ef01f5b4dad4442', null, '0');
INSERT INTO `qing_order` VALUES ('26', '44', '1711013263', '3', '', '1300', '0', '1', null, null, '0', '8202823163be3f70240ae5081e59caf8', null, '0');
INSERT INTO `qing_order` VALUES ('27', '44', '1711013477', '3', '', '7287', '0', '1', null, null, '0', '9e9dae99731520177824dd7187370b7c', null, '0');
INSERT INTO `qing_order` VALUES ('28', '44', '1711098324', '1', '', '5888', '0', '1', null, null, '0', 'af6c81abae9ef00cd23895afda027dad', null, '0');
INSERT INTO `qing_order` VALUES ('29', '44', '1711443800', '3', '', '2241.02', '0', '1', null, null, '0', 'c16a2bc0f1aff69d5960c7a362ecbce4', null, '0');
INSERT INTO `qing_order` VALUES ('30', '44', '1711784134', '3', '', '2011', '0', '2', null, null, '0', '0dbd92203d6ff110cff99d255cd51c96', null, '0');

-- ----------------------------
-- Table structure for qing_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `qing_order_goods`;
CREATE TABLE `qing_order_goods` (
  `order_id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `goods_price` float NOT NULL,
  `sku` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_money` float NOT NULL DEFAULT '0' COMMENT '邮费',
  `iscomment` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未评论 1已评论',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='用户订单商品表';

-- ----------------------------
-- Records of qing_order_goods
-- ----------------------------
INSERT INTO `qing_order_goods` VALUES ('2', '5', '1', '99', '', '3', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('3', '6', '2', '1900', '64G,玫瑰粉,标准套餐', '4', '11', '1');
INSERT INTO `qing_order_goods` VALUES ('4', '4', '1', '5888', '70寸,灰色', '5', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('6', '5', '1', '99', '', '7', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('6', '1', '1', '1800', '64G,土豪金,标准套餐', '8', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('10', '4', '1', '5888', '70寸,灰色', '13', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('11', '8', '1', '169', '', '14', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('12', '3', '1', '1500', '64G,土豪金', '15', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('12', '5', '1', '99', '', '16', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('13', '7', '1', '99', '', '17', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('13', '4', '1', '5888', '70寸,灰色', '18', '0', '1');
INSERT INTO `qing_order_goods` VALUES ('17', '3', '1', '0.01', '64G,土豪金,豪华套餐', '22', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('17', '9', '1', '1', '', '23', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('18', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '24', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('19', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '25', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('20', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '26', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('21', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '27', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('22', '2', '1', '1700', '128G,玫瑰粉,标准套餐', '28', '1', '0');
INSERT INTO `qing_order_goods` VALUES ('22', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '29', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('23', '1', '1', '1800', '64G,玫瑰粉,标准套餐', '30', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('24', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '31', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('25', '8', '1', '0.02', '', '32', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('25', '3', '4', '0.01', '64G,玫瑰粉,豪华套餐', '33', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('26', '12', '1', '1300', '43寸,黑色', '34', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('27', '4', '1', '5888', '70寸,灰色', '35', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('27', '5', '1', '99', '', '36', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('27', '12', '1', '1300', '43寸,黑色', '37', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('28', '4', '1', '5888', '70寸,灰色', '38', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('29', '7', '1', '99', '', '39', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('29', '6', '1', '2000', '128G,玫瑰粉,标准套餐', '40', '11', '0');
INSERT INTO `qing_order_goods` VALUES ('29', '13', '2', '65', 'L,黑色', '41', '1', '0');
INSERT INTO `qing_order_goods` VALUES ('29', '3', '1', '0.01', '64G,土豪金,豪华套餐', '42', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('29', '3', '1', '0.01', '64G,玫瑰粉,豪华套餐', '43', '0', '0');
INSERT INTO `qing_order_goods` VALUES ('30', '6', '1', '2000', '128G,玫瑰粉,标准套餐', '44', '11', '0');

-- ----------------------------
-- Table structure for qing_page
-- ----------------------------
DROP TABLE IF EXISTS `qing_page`;
CREATE TABLE `qing_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='单页面';

-- ----------------------------
-- Records of qing_page
-- ----------------------------
INSERT INTO `qing_page` VALUES ('1', '商品购买政策', '<p>小米商城的部分商品，当您选择的收货区域无货时，可以点选到货通知。开启到货通知功能后，产品开售前，小米商城APP会分批以PUSH的形式通知您。设置成功后支持取消。</p>');
INSERT INTO `qing_page` VALUES ('2', '商品购买流程', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Heiti SC&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; background-color: rgb(251, 251, 251);\">根据国家税务总局公告2017年第16号第一条规定：自2017年7月1日起，购买方为企业的，索取增值税普通发票时，应向销售方提供纳税人识别号或统一社会信用代码；销售方为其开具增值税普通发票时，应在“购买方纳税人识 别号”栏填写购买方的纳税人识别号或统一社会信用代码。不符合规定的发票，不得作为税收凭证。纳税人识别号有两种方式获取：①联系公司财务咨询开票信息；②登录全国组织代码管理中心查询。</span></p>');
INSERT INTO `qing_page` VALUES ('3', '如何注册会员', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Heiti SC&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; background-color: rgb(251, 251, 251);\">开具电子发票的订单申请部分退货，原电子发票会通过系统自动冲红（原电子发票显示无效），并对未发生退货的商品重新开具电子发票。如整单退货，则我司将原电子发票做冲红处理（原电子发票显示无效）。</span></p>');

-- ----------------------------
-- Table structure for qing_score
-- ----------------------------
DROP TABLE IF EXISTS `qing_score`;
CREATE TABLE `qing_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `info` varchar(30) DEFAULT NULL,
  `source` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1签到2推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='会员积分';

-- ----------------------------
-- Records of qing_score
-- ----------------------------
INSERT INTO `qing_score` VALUES ('1', '1', '3', '1582598701', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('2', '1', '-1', '1582618252', null, '1');
INSERT INTO `qing_score` VALUES ('3', '1', '-1', '1582618856', '积分商品兑换', '1');
INSERT INTO `qing_score` VALUES ('9', '3', '2', '1588391194', '签到', '1');
INSERT INTO `qing_score` VALUES ('10', '1', '2', '1588584145', '签到', '1');
INSERT INTO `qing_score` VALUES ('11', '1', '-1', '1588665999', '积分商品兑换', '1');
INSERT INTO `qing_score` VALUES ('12', '1', '-1', '1588670789', '积分商品兑换', '1');
INSERT INTO `qing_score` VALUES ('13', '1', '2', '1588993892', '签到', '1');
INSERT INTO `qing_score` VALUES ('14', '4', '2', '1589189643', '签到', '1');
INSERT INTO `qing_score` VALUES ('15', '4', '2', '1590650596', '签到', '1');
INSERT INTO `qing_score` VALUES ('16', '1', '10', '1595900453', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('17', '1', '-2', '1595905313', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('18', '1', '-2', '1595905335', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('19', '1', '-1', '1595908071', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('20', '1', '10', '1596159280', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('25', '10', '10', '1596268517', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('26', '1', '10', '1596268768', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('27', '3', '200', '1596269488', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('28', '1', '100', '1596269488', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('29', '4', '200', '1596270502', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('30', '1', '100', '1596270502', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('31', '7', '200', '1596270662', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('32', '1', '100', '1596270662', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('33', '9', '200', '1596271885', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('34', '1', '100', '1596271885', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('35', '10', '200', '1596271970', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('36', '1', '100', '1596271970', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('37', '11', '200', '1596272026', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('38', '1', '100', '1596272026', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('39', '12', '200', '1596272097', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('40', '1', '100', '1596272097', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('41', '13', '200', '1596272182', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('42', '15', '200', '1596272763', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('43', '1', '100', '1596272763', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('44', '16', '200', '1596272850', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('45', '17', '200', '1596272887', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('46', '25', '200', '1596274444', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('47', '1', '100', '1596274444', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('48', '26', '200', '1596274510', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('49', '1', '100', '1596274510', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('50', '27', '200', '1596274686', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('51', '1', '100', '1596274686', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('52', '28', '200', '1596274760', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('53', '1', '100', '1596274760', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('54', '29', '200', '1596274795', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('55', '1', '100', '1596274795', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('56', '31', '200', '1596275364', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('57', '33', '200', '1596275434', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('58', '1', '100', '1596275434', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('59', '1', '10', '1596436479', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('60', '30', '10', '1596436545', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('61', '34', '200', '1598255643', '新用户奖励', '1');
INSERT INTO `qing_score` VALUES ('62', '1', '100', '1598255643', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('63', '36', '200', '1598344219', '新用户奖励', '2');
INSERT INTO `qing_score` VALUES ('64', '1', '100', '1598344219', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('65', '36', '10', '1598344317', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('66', '37', '200', '1598345040', '新用户奖励', '2');
INSERT INTO `qing_score` VALUES ('67', '1', '100', '1598345040', '推荐返佣', '1');
INSERT INTO `qing_score` VALUES ('68', '37', '10', '1598345076', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('69', '38', '200', '1598345648', '新用户奖励', '2');
INSERT INTO `qing_score` VALUES ('70', '1', '100', '1598345648', '推荐返佣', '2');
INSERT INTO `qing_score` VALUES ('71', '38', '10', '1598345673', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('72', '33', '10', '1703435787', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('73', '33', '-1', '1703436073', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('74', '33', '-1', '1703436081', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('75', '33', '-1', '1703436084', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('76', '33', '-2', '1703436093', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('77', '33', '10', '1703603640', '签到赚取积分', '1');
INSERT INTO `qing_score` VALUES ('78', '33', '-1', '1703603940', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('79', '33', '-1', '1703606343', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('80', '33', '-1', '1705160815', '商品换购', '1');
INSERT INTO `qing_score` VALUES ('81', '33', '10', '1705162259', '签到赚取积分', '1');

-- ----------------------------
-- Table structure for qing_score_goods
-- ----------------------------
DROP TABLE IF EXISTS `qing_score_goods`;
CREATE TABLE `qing_score_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(110) NOT NULL,
  `thumb` varchar(110) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `content` text,
  `time` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `listorder` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='积分商品表';

-- ----------------------------
-- Records of qing_score_goods
-- ----------------------------
INSERT INTO `qing_score_goods` VALUES ('1', '联通话费10元', '/public/upload/20200728/f3426466b0b7b8a267142523e1602a7e.jpg', '', '<p>联通话费10元，快来抢</p><p><br/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20200728/1595901865186616.jpg\" title=\"1595901865186616.jpg\" alt=\"liant.jpg\"/></p>', '1545964839', '1', '0');
INSERT INTO `qing_score_goods` VALUES ('2', '精美挂坠', '/public/upload/20200728/650699a16e4c77426ec9ffaf38dc0589.jpg', '', '', '1545968008', '6800', '2');
INSERT INTO `qing_score_goods` VALUES ('3', '爱奇艺30天会员', '/public/upload/20200728/4744e5c0d9abec0b666be8d19d9de645.jpg', null, null, '1588664854', '1000', '22');
INSERT INTO `qing_score_goods` VALUES ('4', '创世学说 游戏系统设计指南', '/public/upload/20200728/83c5b3cdc66914d77c769b363a0ad129.jpg', null, '<p>《创世学说——游戏系统设计指南》是腾讯游戏人十多年工作经验和总结的精华输出，涵盖了无数珍贵的实战案例、千锤百炼的经验总结，以及在用户研究、项目管理、测试迭代等方面的全方位的游戏开发心得和体会。系统设计是游戏设计领域的核心，与游戏的乐趣和核心玩法息息相关，只有通过设计优秀的游戏系统，才能诞生优秀的游戏。</p><p style=\"text-align: center;\"><img src=\"http://www.tp6.com/ueditor/php/upload/image/20200728/1595902085300120.jpg\" title=\"1595902085300120.jpg\" alt=\"QQ截图20200512093956.jpg\"/></p><p>在国内普遍缺乏优秀的游戏系统设计人才的情况下，《创世学说——游戏系统设计指南》对游戏行业系统策划新人的培养意义尤为重大。广大游戏爱好者可以通过阅读本书了解游戏是怎么制作出来的；有志于从事游戏设计事业的学生可以借助本书快速入门；在游戏行业中沉淀已久的专业人员更是可以把本书作为重要的工具书来使用。</p><p><br/></p><p style=\"text-align: center;\"><br/></p>', '1588665216', '2', '3');

-- ----------------------------
-- Table structure for qing_score_record
-- ----------------------------
DROP TABLE IF EXISTS `qing_score_record`;
CREATE TABLE `qing_score_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `empress` varchar(100) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='积分兑换记录';

-- ----------------------------
-- Records of qing_score_record
-- ----------------------------
INSERT INTO `qing_score_record` VALUES ('1', '10', '1', '1', 'YT10315900246', '1575511676', '1');
INSERT INTO `qing_score_record` VALUES ('2', '1', '1', '1', null, '1582618252', '1');
INSERT INTO `qing_score_record` VALUES ('3', '1', '1', '1', null, '1582618856', '1');
INSERT INTO `qing_score_record` VALUES ('5', '1', '1', '1', null, '1588670789', '1');
INSERT INTO `qing_score_record` VALUES ('6', '2', '4', '1', null, '1595905313', '1');
INSERT INTO `qing_score_record` VALUES ('7', '2', '4', '1', 'YT10315900246', '1595905335', '1');
INSERT INTO `qing_score_record` VALUES ('8', '1', '1', '1', null, '1595908071', '1');
INSERT INTO `qing_score_record` VALUES ('9', '1', '1', '1', null, '1703436073', '33');
INSERT INTO `qing_score_record` VALUES ('10', '1', '1', '1', null, '1703436081', '33');
INSERT INTO `qing_score_record` VALUES ('11', '1', '1', '1', null, '1703436084', '33');
INSERT INTO `qing_score_record` VALUES ('12', '2', '4', '1', null, '1703436093', '33');
INSERT INTO `qing_score_record` VALUES ('13', '1', '1', '1', null, '1703603940', '33');
INSERT INTO `qing_score_record` VALUES ('14', '1', '1', '1', null, '1703606343', '33');
INSERT INTO `qing_score_record` VALUES ('15', '1', '1', '1', null, '1705160815', '33');

-- ----------------------------
-- Table structure for qing_search
-- ----------------------------
DROP TABLE IF EXISTS `qing_search`;
CREATE TABLE `qing_search` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='热门搜索词';

-- ----------------------------
-- Records of qing_search
-- ----------------------------
INSERT INTO `qing_search` VALUES ('2', '羽绒服');
INSERT INTO `qing_search` VALUES ('3', '手机');
INSERT INTO `qing_search` VALUES ('4', '毛呢大衣');
INSERT INTO `qing_search` VALUES ('5', '电视');
INSERT INTO `qing_search` VALUES ('6', '小米');

-- ----------------------------
-- Table structure for qing_standard
-- ----------------------------
DROP TABLE IF EXISTS `qing_standard`;
CREATE TABLE `qing_standard` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '规格ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规格名称',
  `type_id` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='商品规格表';

-- ----------------------------
-- Records of qing_standard
-- ----------------------------
INSERT INTO `qing_standard` VALUES ('1', '内存', '1');
INSERT INTO `qing_standard` VALUES ('2', '颜色', '1');
INSERT INTO `qing_standard` VALUES ('3', '尺寸', '2');
INSERT INTO `qing_standard` VALUES ('4', '尺寸', '3');
INSERT INTO `qing_standard` VALUES ('5', '颜色', '2');
INSERT INTO `qing_standard` VALUES ('6', '颜色', '3');
INSERT INTO `qing_standard` VALUES ('7', '颜色', '4');
INSERT INTO `qing_standard` VALUES ('8', '尺寸', '5');
INSERT INTO `qing_standard` VALUES ('9', '手机套餐', '1');

-- ----------------------------
-- Table structure for qing_standard_value
-- ----------------------------
DROP TABLE IF EXISTS `qing_standard_value`;
CREATE TABLE `qing_standard_value` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性值ID',
  `standard_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '规格ID',
  `standard_value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='规格属性值表';

-- ----------------------------
-- Records of qing_standard_value
-- ----------------------------
INSERT INTO `qing_standard_value` VALUES ('1', '1', '32G');
INSERT INTO `qing_standard_value` VALUES ('2', '1', '64G');
INSERT INTO `qing_standard_value` VALUES ('3', '1', '128G');
INSERT INTO `qing_standard_value` VALUES ('4', '1', '320G');
INSERT INTO `qing_standard_value` VALUES ('5', '2', '科技黑');
INSERT INTO `qing_standard_value` VALUES ('6', '2', '玫瑰粉');
INSERT INTO `qing_standard_value` VALUES ('7', '3', 'L');
INSERT INTO `qing_standard_value` VALUES ('8', '3', 'XL');
INSERT INTO `qing_standard_value` VALUES ('9', '3', 'XXL');
INSERT INTO `qing_standard_value` VALUES ('10', '2', '土豪金');
INSERT INTO `qing_standard_value` VALUES ('11', '4', '70寸');
INSERT INTO `qing_standard_value` VALUES ('12', '4', '65寸');
INSERT INTO `qing_standard_value` VALUES ('13', '4', '55寸');
INSERT INTO `qing_standard_value` VALUES ('14', '5', '酒红色');
INSERT INTO `qing_standard_value` VALUES ('15', '5', '藏青色');
INSERT INTO `qing_standard_value` VALUES ('16', '6', '灰色');
INSERT INTO `qing_standard_value` VALUES ('17', '7', '黄色');
INSERT INTO `qing_standard_value` VALUES ('18', '7', '白色');
INSERT INTO `qing_standard_value` VALUES ('19', '8', '2.2米');
INSERT INTO `qing_standard_value` VALUES ('20', '8', '1.5米');
INSERT INTO `qing_standard_value` VALUES ('21', '8', '2米');
INSERT INTO `qing_standard_value` VALUES ('22', '2', '丹霞橙');
INSERT INTO `qing_standard_value` VALUES ('23', '9', '标准套餐');
INSERT INTO `qing_standard_value` VALUES ('24', '9', '豪华套餐');
INSERT INTO `qing_standard_value` VALUES ('25', '5', '卡其色');
INSERT INTO `qing_standard_value` VALUES ('26', '3', 'M');
INSERT INTO `qing_standard_value` VALUES ('27', '4', '43寸');
INSERT INTO `qing_standard_value` VALUES ('28', '6', '黑色');
INSERT INTO `qing_standard_value` VALUES ('29', '3', 'S');
INSERT INTO `qing_standard_value` VALUES ('30', '5', '黑色');
INSERT INTO `qing_standard_value` VALUES ('31', '9', '00套餐');

-- ----------------------------
-- Table structure for qing_text
-- ----------------------------
DROP TABLE IF EXISTS `qing_text`;
CREATE TABLE `qing_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of qing_text
-- ----------------------------
INSERT INTO `qing_text` VALUES ('1', 'abcd');
INSERT INTO `qing_text` VALUES ('2', 'abcd');
INSERT INTO `qing_text` VALUES ('3', 'abcd');
INSERT INTO `qing_text` VALUES ('4', 'abcd');
INSERT INTO `qing_text` VALUES ('5', 'abcd');
INSERT INTO `qing_text` VALUES ('6', 'abcd');
INSERT INTO `qing_text` VALUES ('7', 'abcd');
INSERT INTO `qing_text` VALUES ('8', 'abcd');
INSERT INTO `qing_text` VALUES ('9', 'abcd');
INSERT INTO `qing_text` VALUES ('10', 'abcd');
INSERT INTO `qing_text` VALUES ('11', 'abcd');
INSERT INTO `qing_text` VALUES ('12', 'abcd');
INSERT INTO `qing_text` VALUES ('13', 'abcd');
INSERT INTO `qing_text` VALUES ('14', 'abcd');
INSERT INTO `qing_text` VALUES ('15', 'abcd');
INSERT INTO `qing_text` VALUES ('16', 'abcd');
INSERT INTO `qing_text` VALUES ('17', 'abcd');
INSERT INTO `qing_text` VALUES ('18', 'abcd');
INSERT INTO `qing_text` VALUES ('19', 'abcd');
INSERT INTO `qing_text` VALUES ('20', 'abcd');
INSERT INTO `qing_text` VALUES ('21', 'abcd');
INSERT INTO `qing_text` VALUES ('22', 'abcd');
INSERT INTO `qing_text` VALUES ('23', 'abcd');
INSERT INTO `qing_text` VALUES ('24', 'abcd');
INSERT INTO `qing_text` VALUES ('25', 'abcd');
INSERT INTO `qing_text` VALUES ('26', 'abcd');
INSERT INTO `qing_text` VALUES ('27', 'abcd');
INSERT INTO `qing_text` VALUES ('28', 'abcd');
INSERT INTO `qing_text` VALUES ('29', 'abcd');
INSERT INTO `qing_text` VALUES ('30', 'abcd');
INSERT INTO `qing_text` VALUES ('31', 'abcd');
INSERT INTO `qing_text` VALUES ('32', 'abcd');
INSERT INTO `qing_text` VALUES ('33', 'abcd');
INSERT INTO `qing_text` VALUES ('34', 'abcd');
INSERT INTO `qing_text` VALUES ('35', 'abcd');
INSERT INTO `qing_text` VALUES ('36', 'abcd');
INSERT INTO `qing_text` VALUES ('37', 'abcd');
INSERT INTO `qing_text` VALUES ('38', 'abcd');
INSERT INTO `qing_text` VALUES ('39', 'abcd');
INSERT INTO `qing_text` VALUES ('40', 'abcd');
INSERT INTO `qing_text` VALUES ('41', 'abcd');
INSERT INTO `qing_text` VALUES ('42', 'abcd');
INSERT INTO `qing_text` VALUES ('43', 'abcd');
INSERT INTO `qing_text` VALUES ('44', 'abcd');
INSERT INTO `qing_text` VALUES ('45', 'abcd');
INSERT INTO `qing_text` VALUES ('46', 'abcd');
INSERT INTO `qing_text` VALUES ('47', 'abcd');
INSERT INTO `qing_text` VALUES ('48', 'abcd');
INSERT INTO `qing_text` VALUES ('49', 'abcd');
INSERT INTO `qing_text` VALUES ('50', 'abcd');
INSERT INTO `qing_text` VALUES ('51', 'abcd');
INSERT INTO `qing_text` VALUES ('52', 'abcd');
INSERT INTO `qing_text` VALUES ('53', 'abcd');
INSERT INTO `qing_text` VALUES ('54', 'abcd');
INSERT INTO `qing_text` VALUES ('55', 'abcd');
INSERT INTO `qing_text` VALUES ('56', 'abcd');
INSERT INTO `qing_text` VALUES ('57', 'abcd');
INSERT INTO `qing_text` VALUES ('58', 'abcd');
INSERT INTO `qing_text` VALUES ('59', 'abcd');
INSERT INTO `qing_text` VALUES ('60', 'abcd');
INSERT INTO `qing_text` VALUES ('61', 'abcd');
INSERT INTO `qing_text` VALUES ('62', 'abcd');
INSERT INTO `qing_text` VALUES ('63', 'abcd');
INSERT INTO `qing_text` VALUES ('64', 'abcd');
INSERT INTO `qing_text` VALUES ('65', 'abcd');
INSERT INTO `qing_text` VALUES ('66', 'abcd');
INSERT INTO `qing_text` VALUES ('67', 'abcd');
INSERT INTO `qing_text` VALUES ('68', 'abcd');
INSERT INTO `qing_text` VALUES ('69', 'abcd');
INSERT INTO `qing_text` VALUES ('70', 'abcd');
INSERT INTO `qing_text` VALUES ('71', 'abcd');
INSERT INTO `qing_text` VALUES ('72', 'abcd');
INSERT INTO `qing_text` VALUES ('73', 'abcd');
INSERT INTO `qing_text` VALUES ('74', 'abcd');
INSERT INTO `qing_text` VALUES ('75', 'abcd');
INSERT INTO `qing_text` VALUES ('76', 'abcd');
INSERT INTO `qing_text` VALUES ('77', 'abcd');
INSERT INTO `qing_text` VALUES ('78', 'abcd');
INSERT INTO `qing_text` VALUES ('79', 'abcd');
INSERT INTO `qing_text` VALUES ('80', 'abcd');
INSERT INTO `qing_text` VALUES ('81', 'abcd');
INSERT INTO `qing_text` VALUES ('82', 'abcd');
INSERT INTO `qing_text` VALUES ('83', 'abcd');
INSERT INTO `qing_text` VALUES ('84', 'abcd');
INSERT INTO `qing_text` VALUES ('85', 'abcd');
INSERT INTO `qing_text` VALUES ('86', 'abcd');
INSERT INTO `qing_text` VALUES ('87', 'abcd');
INSERT INTO `qing_text` VALUES ('88', 'abcd');
INSERT INTO `qing_text` VALUES ('89', 'abcd');
INSERT INTO `qing_text` VALUES ('90', 'abcd');
INSERT INTO `qing_text` VALUES ('91', 'abcd');
INSERT INTO `qing_text` VALUES ('92', 'abcd');
INSERT INTO `qing_text` VALUES ('93', 'abcd');
INSERT INTO `qing_text` VALUES ('94', 'abcd');
INSERT INTO `qing_text` VALUES ('95', 'abcd');
INSERT INTO `qing_text` VALUES ('96', 'abcd');
INSERT INTO `qing_text` VALUES ('97', 'abcd');
INSERT INTO `qing_text` VALUES ('98', 'abcd');
INSERT INTO `qing_text` VALUES ('99', 'abcd');
INSERT INTO `qing_text` VALUES ('100', 'abcd');
INSERT INTO `qing_text` VALUES ('101', 'abcd');
INSERT INTO `qing_text` VALUES ('102', 'abcd');
INSERT INTO `qing_text` VALUES ('103', 'abcd');
INSERT INTO `qing_text` VALUES ('104', 'abcd');
INSERT INTO `qing_text` VALUES ('105', 'abcd');
INSERT INTO `qing_text` VALUES ('106', 'abcd');
INSERT INTO `qing_text` VALUES ('107', 'abcd');
INSERT INTO `qing_text` VALUES ('108', 'abcd');
INSERT INTO `qing_text` VALUES ('109', 'abcd');
INSERT INTO `qing_text` VALUES ('110', 'abcd');
INSERT INTO `qing_text` VALUES ('111', 'abcd');
INSERT INTO `qing_text` VALUES ('112', 'abcd');
INSERT INTO `qing_text` VALUES ('113', 'abcd');
INSERT INTO `qing_text` VALUES ('114', 'abcd');
INSERT INTO `qing_text` VALUES ('115', 'abcd');
INSERT INTO `qing_text` VALUES ('116', 'abcd');
INSERT INTO `qing_text` VALUES ('117', 'abcd');
INSERT INTO `qing_text` VALUES ('118', 'abcd');
INSERT INTO `qing_text` VALUES ('119', 'abcd');
INSERT INTO `qing_text` VALUES ('120', 'abcd');
INSERT INTO `qing_text` VALUES ('121', 'abcd');
INSERT INTO `qing_text` VALUES ('122', 'abcd');
INSERT INTO `qing_text` VALUES ('123', 'abcd');
INSERT INTO `qing_text` VALUES ('124', 'abcd');
INSERT INTO `qing_text` VALUES ('125', 'abcd');
INSERT INTO `qing_text` VALUES ('126', 'abcd');
INSERT INTO `qing_text` VALUES ('127', 'abcd');
INSERT INTO `qing_text` VALUES ('128', 'abcd');
INSERT INTO `qing_text` VALUES ('129', 'abcd');
INSERT INTO `qing_text` VALUES ('130', 'abcd');
INSERT INTO `qing_text` VALUES ('131', 'abcd');
INSERT INTO `qing_text` VALUES ('132', 'abcd');
INSERT INTO `qing_text` VALUES ('133', 'abcd');
INSERT INTO `qing_text` VALUES ('134', 'abcd');
INSERT INTO `qing_text` VALUES ('135', 'abcd');
INSERT INTO `qing_text` VALUES ('136', 'abcd');
INSERT INTO `qing_text` VALUES ('137', 'abcd');
INSERT INTO `qing_text` VALUES ('138', 'abcd');
INSERT INTO `qing_text` VALUES ('139', 'abcd');
INSERT INTO `qing_text` VALUES ('140', 'abcd');
INSERT INTO `qing_text` VALUES ('141', 'abcd');
INSERT INTO `qing_text` VALUES ('142', 'abcd');
INSERT INTO `qing_text` VALUES ('143', 'abcd');
INSERT INTO `qing_text` VALUES ('144', 'abcd');
INSERT INTO `qing_text` VALUES ('145', 'abcd');
INSERT INTO `qing_text` VALUES ('146', 'abcd');
INSERT INTO `qing_text` VALUES ('147', 'abcd');
INSERT INTO `qing_text` VALUES ('148', 'abcd');
INSERT INTO `qing_text` VALUES ('149', 'abcd');
INSERT INTO `qing_text` VALUES ('150', 'abcd');
INSERT INTO `qing_text` VALUES ('151', 'abcd');
INSERT INTO `qing_text` VALUES ('152', 'abcd');
INSERT INTO `qing_text` VALUES ('153', 'abcd');
INSERT INTO `qing_text` VALUES ('154', 'abcd');
INSERT INTO `qing_text` VALUES ('155', 'abcd');
INSERT INTO `qing_text` VALUES ('156', 'abcd');
INSERT INTO `qing_text` VALUES ('157', 'abcd');
INSERT INTO `qing_text` VALUES ('158', 'abcd');
INSERT INTO `qing_text` VALUES ('159', 'abcd');
INSERT INTO `qing_text` VALUES ('160', 'abcd');
INSERT INTO `qing_text` VALUES ('161', 'abcd');
INSERT INTO `qing_text` VALUES ('162', 'abcd');
INSERT INTO `qing_text` VALUES ('163', 'abcd');
INSERT INTO `qing_text` VALUES ('164', 'abcd');
INSERT INTO `qing_text` VALUES ('165', 'abcd');
INSERT INTO `qing_text` VALUES ('166', 'abcd');
INSERT INTO `qing_text` VALUES ('167', 'abcd');
INSERT INTO `qing_text` VALUES ('168', 'abcd');
INSERT INTO `qing_text` VALUES ('169', 'abcd');
INSERT INTO `qing_text` VALUES ('170', 'abcd');
INSERT INTO `qing_text` VALUES ('171', 'abcd');
INSERT INTO `qing_text` VALUES ('172', 'abcd');
INSERT INTO `qing_text` VALUES ('173', 'abcd');
INSERT INTO `qing_text` VALUES ('174', 'abcd');
INSERT INTO `qing_text` VALUES ('175', 'abcd');
INSERT INTO `qing_text` VALUES ('176', 'abcd');
INSERT INTO `qing_text` VALUES ('177', 'abcd');
INSERT INTO `qing_text` VALUES ('178', 'abcd');
INSERT INTO `qing_text` VALUES ('179', 'abcd');
INSERT INTO `qing_text` VALUES ('180', 'abcd');
INSERT INTO `qing_text` VALUES ('181', 'abcd');
INSERT INTO `qing_text` VALUES ('182', 'abcd');
INSERT INTO `qing_text` VALUES ('183', 'abcd');
INSERT INTO `qing_text` VALUES ('184', 'abcd');
INSERT INTO `qing_text` VALUES ('185', 'abcd');
INSERT INTO `qing_text` VALUES ('186', 'abcd');
INSERT INTO `qing_text` VALUES ('187', 'abcd');
INSERT INTO `qing_text` VALUES ('188', 'abcd');
INSERT INTO `qing_text` VALUES ('189', 'abcd');
INSERT INTO `qing_text` VALUES ('190', 'abcd');
INSERT INTO `qing_text` VALUES ('191', 'abcd');
INSERT INTO `qing_text` VALUES ('192', 'abcd');
INSERT INTO `qing_text` VALUES ('193', 'abcd');
INSERT INTO `qing_text` VALUES ('194', 'abcd');
INSERT INTO `qing_text` VALUES ('195', 'abcd');
INSERT INTO `qing_text` VALUES ('196', 'abcd');
INSERT INTO `qing_text` VALUES ('197', 'abcd');
INSERT INTO `qing_text` VALUES ('198', 'abcd');
INSERT INTO `qing_text` VALUES ('199', 'abcd');
INSERT INTO `qing_text` VALUES ('200', 'abcd');
INSERT INTO `qing_text` VALUES ('201', 'abcd');
INSERT INTO `qing_text` VALUES ('202', 'abcd');
INSERT INTO `qing_text` VALUES ('203', 'abcd');
INSERT INTO `qing_text` VALUES ('204', 'abcd');
INSERT INTO `qing_text` VALUES ('205', 'abcd');
INSERT INTO `qing_text` VALUES ('206', 'abcd');
INSERT INTO `qing_text` VALUES ('207', 'abcd');
INSERT INTO `qing_text` VALUES ('208', 'abcd');
INSERT INTO `qing_text` VALUES ('209', 'abcd');
INSERT INTO `qing_text` VALUES ('210', 'abcd');
INSERT INTO `qing_text` VALUES ('211', 'abcd');
INSERT INTO `qing_text` VALUES ('212', 'abcd');
INSERT INTO `qing_text` VALUES ('213', 'abcd');
INSERT INTO `qing_text` VALUES ('214', 'abcd');
INSERT INTO `qing_text` VALUES ('215', 'abcd');
INSERT INTO `qing_text` VALUES ('216', 'abcd');
INSERT INTO `qing_text` VALUES ('217', 'abcd');
INSERT INTO `qing_text` VALUES ('218', 'abcd');
INSERT INTO `qing_text` VALUES ('219', 'abcd');
INSERT INTO `qing_text` VALUES ('220', 'abcd');
INSERT INTO `qing_text` VALUES ('221', 'abcd');
INSERT INTO `qing_text` VALUES ('222', 'abcd');
INSERT INTO `qing_text` VALUES ('223', 'abcd');
INSERT INTO `qing_text` VALUES ('224', 'abcd');
INSERT INTO `qing_text` VALUES ('225', 'abcd');
INSERT INTO `qing_text` VALUES ('226', 'abcd');
INSERT INTO `qing_text` VALUES ('227', 'abcd');
INSERT INTO `qing_text` VALUES ('228', 'abcd');
INSERT INTO `qing_text` VALUES ('229', 'abcd');
INSERT INTO `qing_text` VALUES ('230', 'abcd');
INSERT INTO `qing_text` VALUES ('231', 'abcd');
INSERT INTO `qing_text` VALUES ('232', 'abcd');
INSERT INTO `qing_text` VALUES ('233', 'abcd');
INSERT INTO `qing_text` VALUES ('234', 'abcd');
INSERT INTO `qing_text` VALUES ('235', 'abcd');
INSERT INTO `qing_text` VALUES ('236', 'abcd');
INSERT INTO `qing_text` VALUES ('237', 'abcd');
INSERT INTO `qing_text` VALUES ('238', 'abcd');
INSERT INTO `qing_text` VALUES ('239', 'abcd');

-- ----------------------------
-- Table structure for qing_type
-- ----------------------------
DROP TABLE IF EXISTS `qing_type`;
CREATE TABLE `qing_type` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_type
-- ----------------------------
INSERT INTO `qing_type` VALUES ('1', '手机');
INSERT INTO `qing_type` VALUES ('2', '女装');
INSERT INTO `qing_type` VALUES ('3', '电视');
INSERT INTO `qing_type` VALUES ('4', '插排');
INSERT INTO `qing_type` VALUES ('5', '床');

-- ----------------------------
-- Table structure for qing_user
-- ----------------------------
DROP TABLE IF EXISTS `qing_user`;
CREATE TABLE `qing_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT 'qing',
  `password` char(32) NOT NULL DEFAULT '',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '默认是1，不合格-1',
  `time` int(10) unsigned NOT NULL COMMENT '昵称',
  `face` varchar(200) DEFAULT NULL,
  `unionid` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1男2女3保密',
  `xingzuo` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `code` varchar(50) NOT NULL COMMENT '分佣推荐码',
  `nicname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `real_name` varchar(20) DEFAULT NULL,
  `id_front_pic` varchar(200) DEFAULT NULL,
  `id_back_pic` varchar(200) DEFAULT NULL,
  `self_pic` varchar(200) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  `check_status` tinyint(1) DEFAULT '0' COMMENT '0待审核1审核通过2审核不通过',
  `referral_code` varchar(50) DEFAULT NULL COMMENT '推荐人码',
  `id_number` varchar(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `cash_address` varchar(150) DEFAULT '',
  `submit_ip` varchar(50) DEFAULT NULL,
  `recommender` varchar(50) DEFAULT NULL COMMENT '推荐人',
  `mer_count` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `code_2` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qing_user
-- ----------------------------
INSERT INTO `qing_user` VALUES ('2', 'admin123456', 'a8a5c404e3927315ccb6e028d4372ac8', '1721638692', '15100000001', '1', '1707983653', null, null, 'admin@qq.com', '3', null, '0', 'YJ1596269352', null, '老九', '\\public\\upload/20240215\\6b53bbb474985ab7357d235becfc999b.png', '\\public\\upload/20240215\\ad49bd1fdcfe4ab4753d84ac7f891eeb.png', '\\public\\upload/20240215\\d6122dcbd4ea95cb83bb12dee5463f63.png', null, '1707980452', '0', null, '513232198710160820', '该会员条件不错，审核通过。', 'usdtqwrqrqqrqrqrqrqwrqwsfsfs', '127.0.0.1', '', '7');
INSERT INTO `qing_user` VALUES ('30', '15100000009', 'ae71b36a06b355ec6e4967afc57be73d', '1711007565', '15100000009', '1', '1596275329', null, null, null, '3', null, '0', 'YJ1596275329', null, null, null, null, null, null, null, '0', null, null, null, null, null, null, '0');
INSERT INTO `qing_user` VALUES ('33', '15100000011', 'a8a5c404e3927315ccb6e028d4372ac8', '1720429846', '15100000011', '1', '1596275434', null, null, null, '3', null, '1', 'YJ1596275434', null, null, null, null, null, null, null, '0', null, null, null, null, null, null, '0');
INSERT INTO `qing_user` VALUES ('34', '17615342771', 'a8a5c404e3927315ccb6e028d4372ac8', '1598255654', '17615342771', '1', '1598255643', null, null, null, '3', null, '1', 'YJ1598255643', null, null, null, null, null, null, null, '0', null, null, null, null, null, null, '0');
INSERT INTO `qing_user` VALUES ('36', '15100000010', 'a8a5c404e3927315ccb6e028d4372ac8', '1598344289', '15100000010', '1', '1598344219', null, null, null, '3', null, '1', 'YJ1598344219', null, null, null, null, null, null, null, '0', null, null, null, null, null, null, '0');
INSERT INTO `qing_user` VALUES ('37', '15100000012', 'a8a5c404e3927315ccb6e028d4372ac8', '1598345048', '15100000012', '1', '1598345040', null, null, null, '3', null, '1', 'YJ1598345040', null, null, null, null, null, null, null, '0', null, null, null, null, null, 'YJ1596269352', '2');
INSERT INTO `qing_user` VALUES ('38', '15100000013', 'admin123456', '1598345659', '15100000013', '1', '1598345648', null, null, null, '3', null, '1', 'YJ1598345648', null, null, null, null, null, null, null, '0', null, null, null, null, null, 'YJ1596269352', '2');
INSERT INTO `qing_user` VALUES ('39', 'admin', 'ae71b36a06b355ec6e4967afc57be73d', '0', '15280832018', '1', '1707985712', null, null, '15100000001@qq.com', '3', null, '0', 'YJ1707927651', null, '老九', '\\public\\upload/20240215\\4278604c5efd1b54e9d58a1666318d86.png', '\\public\\upload/20240215\\52d6ba6fa6d3bc1a9b9ceecf8132589a.png', '\\public\\upload/20240215\\72149581f5a80f5171f7cc7dd6b6f5a8.png', '1707927651', null, '0', null, '512828187620231028', '豆腐干大概', '', null, 'YJ1596269352', '1');
INSERT INTO `qing_user` VALUES ('43', 'admintest', 'ae71b36a06b355ec6e4967afc57be73d', '1707929221', null, '1', '1707928648', null, null, null, '3', null, '0', 'YJ1707928648', null, null, null, null, null, '1707928648', null, '0', null, null, null, '', null, 'YJ1596269352', '0');
INSERT INTO `qing_user` VALUES ('44', '15100000002', 'ae71b36a06b355ec6e4967afc57be73d', '1711787327', null, '1', '1710915525', null, null, null, '3', null, '0', 'YJ1710915525', null, null, null, null, null, '1710915525', null, '0', null, null, null, '', null, null, '0');

-- ----------------------------
-- Table structure for qing_user_trace
-- ----------------------------
DROP TABLE IF EXISTS `qing_user_trace`;
CREATE TABLE `qing_user_trace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户足迹表';

-- ----------------------------
-- Records of qing_user_trace
-- ----------------------------
INSERT INTO `qing_user_trace` VALUES ('28', '4', '1', '1600661309');
INSERT INTO `qing_user_trace` VALUES ('29', '9', '1', '1600661325');
INSERT INTO `qing_user_trace` VALUES ('30', '3', '1', '1600661377');
INSERT INTO `qing_user_trace` VALUES ('68', '3', '33', '1720430381');
INSERT INTO `qing_user_trace` VALUES ('69', '2', '33', '1720430378');
INSERT INTO `qing_user_trace` VALUES ('67', '7', '33', '1720430020');
INSERT INTO `qing_user_trace` VALUES ('64', '7', '44', '1711443388');
INSERT INTO `qing_user_trace` VALUES ('65', '12', '44', '1711787347');
INSERT INTO `qing_user_trace` VALUES ('63', '6', '44', '1711788754');
INSERT INTO `qing_user_trace` VALUES ('48', '11', '30', '1711007580');
INSERT INTO `qing_user_trace` VALUES ('49', '3', '30', '1711007634');
INSERT INTO `qing_user_trace` VALUES ('66', '10', '2', '1716971874');
