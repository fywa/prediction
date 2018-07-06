/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : prediction

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-07-05 11:04:16
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'f3d7867d1a29d5a8e5613ed4a88e6dc9', 'asfas', '0', 'asdfa', '1', '2823', '1', '1529908076', '1530603897');
INSERT INTO `admin` VALUES ('2', 'xiaodo', 'e2c94c355523605c16fa0c6424585d0b', 'sdf', '0', '', '2', '5336', '1', '1529908557', '1530344227');
INSERT INTO `admin` VALUES ('3', 'test', '603bde7d5698603f0b013c385f12d724', '', '0', '', '0', '995', '0', '1529908955', '1529995856');
INSERT INTO `admin` VALUES ('4', 'test2', '32035140e486f9fee228088065853f0a', 'asfda', '0', 'asfda', '1', '774', '1', '1529909147', '1530603903');
INSERT INTO `admin` VALUES ('9', 'test3', '59b6fd9b5a434cae1b14af13e0ccb623', 'admin', '0', 'test', '0', '5586', '0', '1530344254', '1530603839');
INSERT INTO `admin` VALUES ('10', 'xixi', '22845240c47eb6bee030a28185222fb5', '', '0', '', '0', '5388', '0', '1530347255', '1530347255');
INSERT INTO `admin` VALUES ('16', 'admin22', '3c23e4442fc00f41c4c6852a06f206eb', '', '0', '', '0', '1944', '0', '1530347830', '1530347830');
INSERT INTO `admin` VALUES ('17', 'tetsd', '5beb256d1d5e90fad69acee63e853726', 'admin', '0', 'asdfas', '0', '7269', '0', '1530348012', '1530348489');

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
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '0 预测话题评论 1 经验分享评论',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '评论',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '1', '沙发大厦', '100', '0', '1', null, null);
INSERT INTO `comment` VALUES ('2', '1', '2', '士大夫士大夫', '200', '0', '1', null, null);
INSERT INTO `comment` VALUES ('3', '1', '1', 'adfasfasdfasfdsad', '0', '1', '1', '1530690358', '1530690358');
INSERT INTO `comment` VALUES ('4', '1', '1', 'adfasfasdfasfdsad', '0', '1', '1', '1530699361', '1530699361');
INSERT INTO `comment` VALUES ('5', '1', '1', 'adfasfasdfasfdsad', '0', '1', '1', '1530699406', '1530699406');

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
INSERT INTO `featured` VALUES ('1', '预言家', 'test', '\\upload\\20180628\\17460d2d978ec5dd1f492e296661ce88.jpg', 'localhsot', '0', '1', null, '1530346882');
INSERT INTO `featured` VALUES ('2', 'test', 'stest', '\\upload\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', 'asdfasf', '0', '1', null, '1530346891');
INSERT INTO `featured` VALUES ('12', 'www', 'www', '\\upload\\20180629\\7fcc535f6e85b2679fb1ea45269ea1b4.jpg', 'www', '0', '1', null, '1530237039');

-- ----------------------------
-- Table structure for history_prediction
-- ----------------------------
DROP TABLE IF EXISTS `history_prediction`;
CREATE TABLE `history_prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prediction_id` int(11) NOT NULL COMMENT '预测外键',
  `key1` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案1',
  `key2` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案2',
  `key3` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案3',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of history_prediction
-- ----------------------------
INSERT INTO `history_prediction` VALUES ('1', '1', '11sdf', 'asdf', 'asdf', '1', null, null);
INSERT INTO `history_prediction` VALUES ('2', '2', '11sdf', 'asdf', 'asdf', '1', null, null);
INSERT INTO `history_prediction` VALUES ('3', '3', '11sdf', 'asdf', 'asdf', '1', null, null);
INSERT INTO `history_prediction` VALUES ('4', '4', '11sdf', 'asdf', 'asdf', '1', null, null);
INSERT INTO `history_prediction` VALUES ('5', '1', '士大夫士大夫', '', '', '0', null, null);

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
  `watch` int(11) NOT NULL DEFAULT '0' COMMENT '观看人数',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `end_time` int(1) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of prediction
-- ----------------------------
INSERT INTO `prediction` VALUES ('1', '1', 's', 'asdfa', '11sdf', 'asdf', 'asdf', '', '', '', '1', '1', '0', null, null);
INSERT INTO `prediction` VALUES ('2', '1', '第三方', 'asdfa', '11sdf', 'asdf', 'asdf', '', '', '', '10', '1', '0', null, '1530667353');
INSERT INTO `prediction` VALUES ('3', '1', '第三方', 'asdfa', '11sdf', 'asdf', 'asdf', '', '', '', '1000000', '1', '0', null, null);
INSERT INTO `prediction` VALUES ('4', '1', '第三方', 'asdfa', '11sdf', 'asdf', 'asdf', '', '', '', '999999', '1', '0', null, null);
INSERT INTO `prediction` VALUES ('5', '1', '明天要下雨么？', '预测明天的下雨是50%预测明天的下雨是50%预测明天的下雨是50%预测明天的下雨是50%预测明天的下雨是50%预测明天的下雨是50%', '90%以上', '50%-90%', '50%以下', '', '', '', '0', '1', '1995', '1530694051', '1530694051');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '常见问题的标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '问题的内容',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '评论',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('2', '士大夫士大夫', '阿斯蒂芬', '1', null, null);
INSERT INTO `question` VALUES ('3', 'adfasfasdfasfdsad', '阿萨德', '1', '1530690358', '1530690358');
INSERT INTO `question` VALUES ('4', '大师傅', 'sdfas', '1', '1530698225', '1530698420');
INSERT INTO `question` VALUES ('5', '按时发送', '收到发多少', '0', '1530698232', '1530698232');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '*', '0', '1530083515', '1');
INSERT INTO `role` VALUES ('2', '测试组', '1,2,3,9,10', '1530088143', '1530152285', '1');
INSERT INTO `role` VALUES ('3', 'SAFASDF', '1,2,3,4,5', '1530348504', '1530348514', '1');

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
INSERT INTO `rule` VALUES ('10', '9', '主页', 'Index/main', '1530152263', '1530345446', '1');

-- ----------------------------
-- Table structure for suggestion
-- ----------------------------
DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '问题的内容',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '反馈人id',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '评论',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of suggestion
-- ----------------------------
INSERT INTO `suggestion` VALUES ('1', '阿斯顿发生', '0', '1', null, '1530698663');
INSERT INTO `suggestion` VALUES ('2', 'asfasdfasfs', '1', '1', '1530755907', '1530755907');

-- ----------------------------
-- Table structure for top
-- ----------------------------
DROP TABLE IF EXISTS `top`;
CREATE TABLE `top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户表外键',
  `avg_score` double(6,4) NOT NULL DEFAULT '0.0000' COMMENT '布莱尔得分(平均分)',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `用户唯一` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of top
-- ----------------------------
INSERT INTO `top` VALUES ('1', '1', '1.7000', '1', null, null);
INSERT INTO `top` VALUES ('2', '2', '1.6000', '1', null, null);

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
  `birthday` int(11) NOT NULL DEFAULT '0' COMMENT '生日',
  `attention` int(11) NOT NULL DEFAULT '0' COMMENT '关注数量',
  `love` int(11) NOT NULL DEFAULT '0' COMMENT '获赞数量',
  `user_expert` varchar(256) NOT NULL DEFAULT '' COMMENT '用户标签',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', '\\20180628\\316fdea4d29ae655c1b68f5a2b285687.jpg', '小东', 'poulsen', '0', '本科', 'programmer', '乘风破浪会有时，直挂云帆济沧海，现在还有很多需要不断提高，有志者事竟成，希望我可以成为软通动力的医院，为软通动力不断奉献自己的一份力量，软通动力，我的动力', '199503', '15874', '1300', 'asdfasdf,sfsdasadf,sdfadsads', '1', null, '1530699391');
INSERT INTO `user` VALUES ('2', 'tests', 'stes', 'asdfasdf', 'asdfasdf', '0', 'asdfa', 'asdfa', '', '0', '0', '0', '', '1', null, null);

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
  `reason` varchar(255) NOT NULL DEFAULT '' COMMENT '预测原因',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '布莱尔得分',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `参与预测唯一` (`prediction_id`,`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_prediction
-- ----------------------------
INSERT INTO `user_prediction` VALUES ('1', '1', '1', '1', '1', '1', '', '0', '1', null, null);
INSERT INTO `user_prediction` VALUES ('5', '1', '3', 'asdfa', 'asdf', '', 'asdfa', '0', '1', null, null);
INSERT INTO `user_prediction` VALUES ('6', '1', '4', 'asdfa', 'asdfa', 'asdfas', 'asdfa', '0', '1', null, null);
INSERT INTO `user_prediction` VALUES ('8', '2', '1', '1', '2', '3', 'asdfasdf', '0', '1', '1530611851', '1530611851');
SET FOREIGN_KEY_CHECKS=1;
