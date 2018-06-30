/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : prediction

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-06-30 11:57:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(50) NOT NULL COMMENT '别名',
  `sex` int(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT 'email电子邮箱',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT 'role 角色分组外键',
  `salt` int(11) NOT NULL DEFAULT '0' COMMENT '盐值',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态 0 删除 1 正常',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `账号唯一` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'f3d7867d1a29d5a8e5613ed4a88e6dc9', '', '0', '', '1', '2823', '1', '1529908076', '1530000261');
INSERT INTO `admin` VALUES ('2', 'xiaodo', 'e2c94c355523605c16fa0c6424585d0b', '', '0', '', '2', '5336', '1', '1529908557', '1530149397');
INSERT INTO `admin` VALUES ('3', 'test', '603bde7d5698603f0b013c385f12d724', '', '0', '', '0', '995', '0', '1529908955', '1529995856');
INSERT INTO `admin` VALUES ('4', 'test2', '32035140e486f9fee228088065853f0a', '', '0', '', '0', '774', '0', '1529909147', '1529995861');
INSERT INTO `admin` VALUES ('8', 'dongge', '1312715576d3cd5304d468f97450fb7b', '', '0', '97404667@qq.com', '0', '5587', '1', '1529999931', '1530001323');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign_id` int(11) NOT NULL COMMENT '分享表或者预测表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '用户评论的内容',
  `love` int(11) NOT NULL DEFAULT '0' COMMENT '用户点赞的人数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for experience
-- ----------------------------
DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '经验标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '主要内容',
  `watch` int(11) NOT NULL DEFAULT '0' COMMENT '观看人数',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of experience
-- ----------------------------
INSERT INTO `experience` VALUES ('1', '1', '撒的发生', '撒地方萨芬', '1', '1', null, '1530256713');

-- ----------------------------
-- Table structure for featured
-- ----------------------------
DROP TABLE IF EXISTS `featured`;
CREATE TABLE `featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) NOT NULL COMMENT 'Banner描述',
  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '跳转地址',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '推荐位类型，0首页推荐图，1，其他',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 待审 1 正常',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

-- ----------------------------
-- Records of featured
-- ----------------------------
INSERT INTO `featured` VALUES ('1', '预言家', 'test', '\\upload\\20180628\\17460d2d978ec5dd1f492e296661ce88.jpg', 'localhsot', '0', '1', null, '1530258851');
INSERT INTO `featured` VALUES ('2', 'test', 'stest', '\\upload\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', 'asdfasf', '0', '1', null, '1530237457');
INSERT INTO `featured` VALUES ('12', 'www', 'www', '\\upload\\20180629\\7fcc535f6e85b2679fb1ea45269ea1b4.jpg', 'www', '0', '1', null, '1530237039');

-- ----------------------------
-- Table structure for prediction
-- ----------------------------
DROP TABLE IF EXISTS `prediction`;
CREATE TABLE `prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '预测话题标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '话题具体介绍',
  `key1` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案1',
  `key2` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案2',
  `key3` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案3',
  `main_key` varchar(50) NOT NULL DEFAULT '' COMMENT '最终答案',
  `choose_key` varchar(10) NOT NULL DEFAULT '' COMMENT '是否预测准确，key1，key2,key3,null',
  `main_score` varchar(50) NOT NULL DEFAULT '' COMMENT '通过布莱尔计算出最终预测概率值',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of prediction
-- ----------------------------
INSERT INTO `prediction` VALUES ('1', '1', '第三方', 'asdfa', '11sdf', 'asdf', 'asdf', '', '', '', '1', null, null);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `rules` varchar(255) NOT NULL DEFAULT '' COMMENT '权限规则外键id集合',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '分组状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '*', '0', '1530083515', '1');
INSERT INTO `role` VALUES ('2', '测试组', '1,2,3,9,10', '1530088143', '1530152285', '1');

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '子类id',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '规则 如 Index/index 首页访问',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '分状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rule
-- ----------------------------
INSERT INTO `rule` VALUES ('1', '0', '管理员管理', 'Admin/index', '0', '1530080913', '1');
INSERT INTO `rule` VALUES ('2', '1', '修改管理', 'Admin/edit', '0', '1530083496', '1');
INSERT INTO `rule` VALUES ('3', '1', '添加管理员', 'Admin/add', '0', '0', '1');
INSERT INTO `rule` VALUES ('4', '1', '删除管理员', 'Admin/del', '0', '1530081205', '1');
INSERT INTO `rule` VALUES ('5', '0', '角色组管理', 'Role/index', '0', '0', '1');
INSERT INTO `rule` VALUES ('6', '5', '添加角色组', 'Role/add', '0', '1530066222', '1');
INSERT INTO `rule` VALUES ('7', '5', '修改角色', 'Role/edit', '0', '1530066224', '1');
INSERT INTO `rule` VALUES ('9', '0', '首页访问', 'Index/index', '1530150918', '1530151039', '1');
INSERT INTO `rule` VALUES ('10', '9', '主页', 'Index/main', '1530152263', '1530152273', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL DEFAULT '' COMMENT 'openid',
  `head_img` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `nickname` varchar(50) NOT NULL COMMENT '别名',
  `sex` int(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `education` varchar(50) NOT NULL DEFAULT '' COMMENT '学历',
  `job` varchar(50) NOT NULL DEFAULT '' COMMENT '职业',
  `signature` varchar(150) NOT NULL DEFAULT '' COMMENT '个性签名',
  `expert` varchar(150) NOT NULL DEFAULT '' COMMENT '擅长领域',
  `birthday` int(11) NOT NULL DEFAULT '0' COMMENT '生日',
  `attention` int(11) NOT NULL DEFAULT '0' COMMENT '关注数量',
  `love` int(11) NOT NULL DEFAULT '0' COMMENT '获赞数量',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', '\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', 'Poulsen', 'xiaodo221', '0', '大学', '程序猿', '', '计算机', '0', '15874', '1300', '1', null, null);
INSERT INTO `user` VALUES ('2', 'tests', 'stes', 'asdfasdf', 'asdfasdf', '0', 'asdfa', 'asdfa', '', 'asdfasd', '0', '0', '0', '1', null, null);

-- ----------------------------
-- Table structure for user_action
-- ----------------------------
DROP TABLE IF EXISTS `user_action`;
CREATE TABLE `user_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign_id` int(11) NOT NULL COMMENT '评论表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `type` int(1) DEFAULT '0' COMMENT '0 评论 1 关注',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_action
-- ----------------------------

-- ----------------------------
-- Table structure for user_expert
-- ----------------------------
DROP TABLE IF EXISTS `user_expert`;
CREATE TABLE `user_expert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `name` varchar(250) NOT NULL DEFAULT '0' COMMENT '用户擅长的领域',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_expert
-- ----------------------------
INSERT INTO `user_expert` VALUES ('1', '1', '程序猿1', '1', null, '1530258100');

-- ----------------------------
-- Table structure for user_prediction
-- ----------------------------
DROP TABLE IF EXISTS `user_prediction`;
CREATE TABLE `user_prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prediction_id` int(11) NOT NULL COMMENT '预测表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `key1` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案1',
  `key2` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案2',
  `key3` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案3',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '布莱尔得分',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_prediction
-- ----------------------------
INSERT INTO `user_prediction` VALUES ('1', '1', '1', '1', '1', '1', '0', null, null);
INSERT INTO `user_prediction` VALUES ('2', '2', '2', '2', '2', '2', '2', null, null);
SET FOREIGN_KEY_CHECKS=1;
