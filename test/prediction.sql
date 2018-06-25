/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : prediction

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-06-21 17:55:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '' COMMENT '姓名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '别名',
  `sex` int(1) DEFAULT '0' COMMENT '性别',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT 'email电子邮箱',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT 'role 角色分组外键',
  `status` int(1) DEFAULT '1' COMMENT '状态 0 删除 1 正常',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

-- ----------------------------
-- Records of banner
-- ----------------------------

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
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '经验标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '主要内容',
  `watch` int(11) NOT NULL DEFAULT '0' COMMENT '观看人数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of experience
-- ----------------------------

-- ----------------------------
-- Table structure for prediction
-- ----------------------------
DROP TABLE IF EXISTS `prediction`;
CREATE TABLE `prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '预测话题标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '话题具体介绍',
  `key1` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案1',
  `key2` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案2',
  `key3` varchar(50) NOT NULL DEFAULT '' COMMENT '预测答案3',
  `main_key` varchar(50) NOT NULL DEFAULT '' COMMENT '最终答案',
  `choose_key` varchar(10) NOT NULL DEFAULT '' COMMENT '是否预测准确，key1，key2,key3,null',
  `main_score` varchar(50) NOT NULL DEFAULT '' COMMENT '通过布莱尔计算出最终预测概率值',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of prediction
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `rules` varchar(255) NOT NULL DEFAULT '' COMMENT '权限规则外键id集合',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '分组状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for rule
-- ----------------------------
DROP TABLE IF EXISTS `rule`;
CREATE TABLE `rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '规则 如 Index/index 首页访问',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '分状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rule
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT '' COMMENT '姓名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '别名',
  `sex` int(1) DEFAULT '0' COMMENT '性别',
  `education` varchar(50) DEFAULT '' COMMENT '学历',
  `job` varchar(50) DEFAULT '' COMMENT '职业',
  `signature` varchar(150) DEFAULT '' COMMENT '个性签名',
  `expert` varchar(150) DEFAULT '' COMMENT '擅长领域',
  `birthday` int(11) DEFAULT '0' COMMENT '生日',
  `status` int(1) DEFAULT '1' COMMENT '状态 0 删除 1 正常',
  `attention` int(11) DEFAULT '0' COMMENT '关注数量',
  `love` int(11) DEFAULT '0' COMMENT '获赞数量',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------

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
  `name` int(1) DEFAULT '0' COMMENT '用户擅长的领域',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_expert
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_prediction
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
