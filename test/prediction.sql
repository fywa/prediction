-- 用户表
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `username` varchar(50)  DEFAULT '' COMMENT '姓名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '别名',
  `sex` int(1) DEFAULT 0 COMMENT '性别',
  `education` varchar(50) DEFAULT '' COMMENT '学历',
  `job` varchar(50) DEFAULT '' COMMENT '职业',
  `signature` varchar(150) DEFAULT '' COMMENT '个性签名',
  `expert` varchar(150) DEFAULT '' COMMENT '擅长领域',
  `birthday` int(11) DEFAULT 0 COMMENT '生日',
  `status` int(1) DEFAULT 1 COMMENT '状态 0 删除 1 正常',
  `attention` int(11) DEFAULT 0 COMMENT '关注数量',
  `love` int(11) DEFAULT 0 COMMENT '获赞数量',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 评论防重复,关注防重复
CREATE TABLE `user_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign_id` int(11) NOT NULL COMMENT '评论表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `type` int(1) NULL NULL DEFAULT 0 COMMENT '0 评论 1 关注',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 用户擅长的领域
CREATE TABLE `user_expert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `name` int(1) NULL NULL DEFAULT 0 COMMENT '用户擅长的领域',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

-- 管理员表
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50)  DEFAULT '' COMMENT '姓名',
  `nickname` varchar(50) DEFAULT NULL COMMENT '别名',
  `sex` int(1) DEFAULT 0 COMMENT '性别',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT 'email电子邮箱',
  `role_id` int(11) NOT NULL DEFAULT 0 COMMENT 'role 角色分组外键',
  `status` int(1) DEFAULT 1 COMMENT '状态 0 删除 1 正常',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 角色分组
CREATE TABLE `role`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) 	NOT NULL DEFAULT '',
	`rules` varchar(255) NOT NULL DEFAULT '' COMMENT '权限规则外键id集合',
	`create_time` int(11) NOT NULL DEFAULT 0,
	`status` int(1) NOT NULL DEFAULT 0 COMMENT '分组状态',
  	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 规则权限
CREATE TABLE `rule`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
	`name` varchar(50) 	NOT NULL DEFAULT '' COMMENT '规则 如 Index/index 首页访问',
	`create_time` int(11) NOT NULL DEFAULT 0,
	`status` int(1) NOT NULL DEFAULT 0 COMMENT '分状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 预测表
CREATE TABLE `prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT '' NOT NULL COMMENT '预测话题标题',
  `content` varchar(255) DEFAULT '' NOT NULL COMMENT '话题具体介绍',
  `key1` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案1',
  `key2` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案2',
  `key3` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案3',
  `main_key` varchar(50) DEFAULT '' NOT NULL COMMENT '最终答案',
  `choose_key` varchar(10) DEFAULT '' NOT NULL COMMENT '是否预测准确，key1，key2,key3,null', 
  `main_score` varchar(50) DEFAULT '' NOT NULL COMMENT '通过布莱尔计算出最终预测概率值',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 用户预测表
CREATE TABLE `user_prediction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prediction_id` int(11) NOT NULL COMMENT '预测表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `key1` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案1',
  `key2` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案2',
  `key3` varchar(50) DEFAULT '' NOT NULL  COMMENT '预测答案3',
  `score` int(11) DEFAULT 0 NOT NULL COMMENT '布莱尔得分',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 经验分享
CREATE TABLE `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT '' NOT NULL COMMENT '经验标题',
  `content` varchar(255) DEFAULT '' NOT NULL COMMENT '主要内容',
  `watch` int(11) NOT NULL DEFAULT 0 COMMENT '观看人数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;
-- 评论
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign_id` int(11) NOT NULL COMMENT '分享表或者预测表外键',
  `user_id` int(11) NOT NULL COMMENT '用户表外键',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '用户评论的内容',
  `love` int(11) DEFAULT 0 NOT NULL COMMENT '用户点赞的人数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

-- 首页banner图
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';