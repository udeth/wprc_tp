/*
MySQL Data Transfer
Source Host: localhost
Source Database: www.wprc.com
Target Host: localhost
Target Database: www.wprc.com
Date: 2014-6-18 11:49:50
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for think_action
-- ----------------------------
DROP TABLE IF EXISTS `think_action`;
CREATE TABLE `think_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

-- ----------------------------
-- Table structure for think_action_log
-- ----------------------------
DROP TABLE IF EXISTS `think_action_log`;
CREATE TABLE `think_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`),
  KEY `action_id_ix` (`action_id`),
  KEY `user_id_ix` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

-- ----------------------------
-- Table structure for think_auth_extend
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_extend`;
CREATE TABLE `think_auth_extend` (
  `group_id` mediumint(10) unsigned NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) unsigned NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限',
  UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`),
  KEY `uid` (`group_id`),
  KEY `group_id` (`extend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

-- ----------------------------
-- Table structure for think_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_channel
-- ----------------------------
DROP TABLE IF EXISTS `think_channel`;
CREATE TABLE `think_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_config
-- ----------------------------
DROP TABLE IF EXISTS `think_config`;
CREATE TABLE `think_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_follow
-- ----------------------------
DROP TABLE IF EXISTS `think_follow`;
CREATE TABLE `think_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `flollow_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注者ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='关注表';

-- ----------------------------
-- Table structure for think_member
-- ----------------------------
DROP TABLE IF EXISTS `think_member`;
CREATE TABLE `think_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `moblie` varchar(15) NOT NULL COMMENT '手机号码',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Table structure for think_menu
-- ----------------------------
DROP TABLE IF EXISTS `think_menu`;
CREATE TABLE `think_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否仅开发者模式可见',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_message
-- ----------------------------
DROP TABLE IF EXISTS `think_message`;
CREATE TABLE `think_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `review_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网评ID',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论ID',
  `readed` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '消息是否已读，0=未读，1=已读',
  `time` int(11) NOT NULL,
  `fid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户消息表';

-- ----------------------------
-- Table structure for think_product_category
-- ----------------------------
DROP TABLE IF EXISTS `think_product_category`;
CREATE TABLE `think_product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '类别名',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父类ID',
  `sort` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='产品分类表';

-- ----------------------------
-- Table structure for think_reply
-- ----------------------------
DROP TABLE IF EXISTS `think_reply`;
CREATE TABLE `think_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `rid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网评ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父评论ID',
  `content` text NOT NULL COMMENT '评论内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `reuid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='评论表';

-- ----------------------------
-- Table structure for think_review
-- ----------------------------
DROP TABLE IF EXISTS `think_review`;
CREATE TABLE `think_review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `product_name` text NOT NULL COMMENT '产品名',
  `product_category_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品ID',
  `store_name` varchar(64) NOT NULL DEFAULT '' COMMENT '商店名',
  `store_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商店类别，0=网店，1=实体店',
  `address` varchar(256) NOT NULL DEFAULT '' COMMENT '网址/地址',
  `province` varchar(32) NOT NULL DEFAULT '' COMMENT '省',
  `city` varchar(32) NOT NULL DEFAULT '' COMMENT '市',
  `district` varchar(32) NOT NULL DEFAULT '' COMMENT '区',
  `content` text NOT NULL COMMENT '网评内容',
  `image` varchar(256) NOT NULL DEFAULT '' COMMENT '网评凭证',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网评时间',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网评数',
  `hot` int(11) NOT NULL DEFAULT '0' COMMENT '推荐/权重',
  `checked` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否审核，0=未审核，1=已审核',
  `collect_count` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网评表';

-- ----------------------------
-- Table structure for think_review_img
-- ----------------------------
DROP TABLE IF EXISTS `think_review_img`;
CREATE TABLE `think_review_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `rid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '网评ID',
  `image` varchar(256) NOT NULL DEFAULT '' COMMENT '图片',
  `sort` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `thumb_img` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=302 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网评图片表';

-- ----------------------------
-- Table structure for think_score_shop
-- ----------------------------
DROP TABLE IF EXISTS `think_score_shop`;
CREATE TABLE `think_score_shop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `zhuanqu_id` int(10) NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `isDel` tinyint(2) NOT NULL,
  `market_price` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for think_shop_history
-- ----------------------------
DROP TABLE IF EXISTS `think_shop_history`;
CREATE TABLE `think_shop_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(56) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isSend` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `account` varchar(64) NOT NULL DEFAULT '' COMMENT '帐号',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT '用户邮箱',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '昵称',
  `pid` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

-- ----------------------------
-- Table structure for think_user_info
-- ----------------------------
DROP TABLE IF EXISTS `think_user_info`;
CREATE TABLE `think_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `introduction` varchar(64) NOT NULL DEFAULT '' COMMENT '一句话介绍',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别，男1，女2',
  `image` varchar(256) NOT NULL DEFAULT '' COMMENT '头像图片',
  `province` varchar(64) NOT NULL DEFAULT '' COMMENT '省份',
  `city` varchar(64) NOT NULL DEFAULT '' COMMENT '城市',
  `district` varchar(64) NOT NULL DEFAULT '' COMMENT '区',
  `ip` varchar(64) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态，保留字段，暂定为0',
  `favorites` text NOT NULL COMMENT '我的收藏，网评ID，逗号分隔',
  `follow_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注人数',
  `fans_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '被关注人数/粉丝人数',
  `birthday` datetime NOT NULL,
  `QQ` bigint(12) NOT NULL,
  `score` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户详细表';

-- ----------------------------
-- Table structure for think_user_qq
-- ----------------------------
DROP TABLE IF EXISTS `think_user_qq`;
CREATE TABLE `think_user_qq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `open_id` varchar(56) NOT NULL,
  `access` varchar(56) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for think_user_weibo
-- ----------------------------
DROP TABLE IF EXISTS `think_user_weibo`;
CREATE TABLE `think_user_weibo` (
  `uid` int(11) NOT NULL,
  `weiboUid` int(11) NOT NULL,
  `access` varchar(56) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for think_xinxi
-- ----------------------------
DROP TABLE IF EXISTS `think_xinxi`;
CREATE TABLE `think_xinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sendId` int(10) NOT NULL,
  `saveId` int(10) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL,
  `isRead` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for think_zhuanqu
-- ----------------------------
DROP TABLE IF EXISTS `think_zhuanqu`;
CREATE TABLE `think_zhuanqu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `zhuanqu_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `think_action` VALUES ('1', 'user_login', '用户登录', '积分+10，每天一次', 'table:member|field:score|condition:uid={$self} AND status>-1|rule:score+10|cycle:24|max:1;', '[user|get_nickname]在[time|time_format]登录了后台', '1', '1', '1393320286');
INSERT INTO `think_action` VALUES ('2', 'add_article', '发布文章', '积分+5，每天上限5次', 'table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:5', '', '2', '0', '1393299983');
INSERT INTO `think_action` VALUES ('3', 'review', '评论', '评论积分+1，无限制', 'table:member|field:score|condition:uid={$self}|rule:score+1', '', '2', '0', '1393299983');
INSERT INTO `think_action` VALUES ('4', 'add_document', '发表文档', '积分+10，每天上限5次', 'table:member|field:score|condition:uid={$self}|rule:score+10|cycle:24|max:5', '[user|get_nickname]在[time|time_format]发表了一篇文章。\r\n表[model]，记录编号[record]。', '2', '0', '1393299983');
INSERT INTO `think_action` VALUES ('5', 'add_document_topic', '发表讨论', '积分+5，每天上限10次', 'table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:10', '', '2', '0', '1393299983');
INSERT INTO `think_action` VALUES ('6', 'update_config', '更新配置', '新增或修改或删除配置', '', '', '1', '1', '1383294988');
INSERT INTO `think_action` VALUES ('7', 'update_model', '更新模型', '新增或修改模型', '', '', '1', '1', '1383295057');
INSERT INTO `think_action` VALUES ('8', 'update_attribute', '更新属性', '新增或更新或删除属性', '', '', '1', '1', '1383295963');
INSERT INTO `think_action` VALUES ('9', 'update_channel', '更新导航', '新增或修改或删除导航', '', '', '1', '1', '1383296301');
INSERT INTO `think_action` VALUES ('10', 'update_menu', '更新菜单', '新增或修改或删除菜单', '', '', '1', '1', '1383296392');
INSERT INTO `think_action` VALUES ('11', 'update_category', '更新分类', '新增或修改或删除分类', '', '', '1', '1', '1383296765');
INSERT INTO `think_action_log` VALUES ('151', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-17 11:05登录了后台', '1', '1397703957');
INSERT INTO `think_action_log` VALUES ('152', '10', '1', '2130706433', 'Menu', '1', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721506');
INSERT INTO `think_action_log` VALUES ('153', '10', '1', '2130706433', 'Menu', '16', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721548');
INSERT INTO `think_action_log` VALUES ('154', '10', '1', '2130706433', 'Menu', '122', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397721642');
INSERT INTO `think_action_log` VALUES ('155', '10', '1', '2130706433', 'Menu', '123', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397721678');
INSERT INTO `think_action_log` VALUES ('156', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del.html', '1', '1397721720');
INSERT INTO `think_action_log` VALUES ('157', '10', '1', '2130706433', 'Menu', '93', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721732');
INSERT INTO `think_action_log` VALUES ('158', '10', '1', '2130706433', 'Menu', '68', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721739');
INSERT INTO `think_action_log` VALUES ('159', '10', '1', '2130706433', 'Menu', '124', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397721798');
INSERT INTO `think_action_log` VALUES ('160', '10', '1', '2130706433', 'Menu', '124', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721807');
INSERT INTO `think_action_log` VALUES ('161', '10', '1', '2130706433', 'Menu', '16', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397721865');
INSERT INTO `think_action_log` VALUES ('162', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-17 16:06登录了后台', '1', '1397722014');
INSERT INTO `think_action_log` VALUES ('163', '10', '1', '2130706433', 'Menu', '125', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397722386');
INSERT INTO `think_action_log` VALUES ('164', '10', '1', '2130706433', 'Menu', '126', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397722412');
INSERT INTO `think_action_log` VALUES ('165', '10', '1', '2130706433', 'Menu', '127', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397722534');
INSERT INTO `think_action_log` VALUES ('166', '10', '1', '2130706433', 'Menu', '128', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397722614');
INSERT INTO `think_action_log` VALUES ('167', '10', '1', '2130706433', 'Menu', '68', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397722632');
INSERT INTO `think_action_log` VALUES ('168', '10', '1', '2130706433', 'Menu', '129', '操作url：/index.php/admin/menu/add.html', '1', '1397722697');
INSERT INTO `think_action_log` VALUES ('169', '10', '1', '2130706433', 'Menu', '129', '操作url：/index.php/admin/menu/edit.html', '1', '1397722952');
INSERT INTO `think_action_log` VALUES ('170', '10', '1', '2130706433', 'Menu', '16', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397723257');
INSERT INTO `think_action_log` VALUES ('171', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del.html', '1', '1397723281');
INSERT INTO `think_action_log` VALUES ('172', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/68.html', '1', '1397723307');
INSERT INTO `think_action_log` VALUES ('173', '10', '1', '2130706433', 'Menu', '130', '操作url：/index.php/admin/menu/add.html', '1', '1397723283');
INSERT INTO `think_action_log` VALUES ('174', '10', '1', '2130706433', 'Menu', '131', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397725029');
INSERT INTO `think_action_log` VALUES ('175', '10', '1', '2130706433', 'Menu', '131', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397725051');
INSERT INTO `think_action_log` VALUES ('176', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-17 17:10登录了后台', '1', '1397725857');
INSERT INTO `think_action_log` VALUES ('177', '10', '1', '2130706433', 'Menu', '132', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397731710');
INSERT INTO `think_action_log` VALUES ('178', '10', '1', '2130706433', 'Menu', '133', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397731739');
INSERT INTO `think_action_log` VALUES ('179', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-17 19:03登录了后台', '1', '1397732595');
INSERT INTO `think_action_log` VALUES ('180', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-17 19:31登录了后台', '1', '1397734306');
INSERT INTO `think_action_log` VALUES ('181', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 09:00登录了后台', '1', '1397782844');
INSERT INTO `think_action_log` VALUES ('182', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 09:05登录了后台', '1', '1397783129');
INSERT INTO `think_action_log` VALUES ('183', '10', '1', '2130706433', 'Menu', '134', '操作url：/index.php/admin/menu/add.html', '1', '1397784076');
INSERT INTO `think_action_log` VALUES ('184', '10', '1', '2130706433', 'Menu', '93', '操作url：/wprc/index.php/admin/menu/edit.html', '1', '1397786359');
INSERT INTO `think_action_log` VALUES ('185', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 10:20登录了后台', '1', '1397787646');
INSERT INTO `think_action_log` VALUES ('186', '10', '1', '2130706433', 'Menu', '135', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397787689');
INSERT INTO `think_action_log` VALUES ('187', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 10:22登录了后台', '1', '1397787740');
INSERT INTO `think_action_log` VALUES ('188', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/135.html', '1', '1397787746');
INSERT INTO `think_action_log` VALUES ('189', '6', '1', '2130706433', 'config', '39', '操作url：/wprc/index.php/admin/config/edit.html', '1', '1397787791');
INSERT INTO `think_action_log` VALUES ('190', '10', '1', '2130706433', 'Menu', '136', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790284');
INSERT INTO `think_action_log` VALUES ('191', '10', '1', '2130706433', 'Menu', '137', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790317');
INSERT INTO `think_action_log` VALUES ('192', '10', '1', '2130706433', 'Menu', '138', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790344');
INSERT INTO `think_action_log` VALUES ('193', '10', '1', '2130706433', 'Menu', '139', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790396');
INSERT INTO `think_action_log` VALUES ('194', '10', '1', '2130706433', 'Menu', '140', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790459');
INSERT INTO `think_action_log` VALUES ('195', '10', '1', '2130706433', 'Menu', '141', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790496');
INSERT INTO `think_action_log` VALUES ('196', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 11:11登录了后台', '1', '1397790678');
INSERT INTO `think_action_log` VALUES ('197', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/141.html', '1', '1397790688');
INSERT INTO `think_action_log` VALUES ('198', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/138.html', '1', '1397790700');
INSERT INTO `think_action_log` VALUES ('199', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/137.html', '1', '1397790703');
INSERT INTO `think_action_log` VALUES ('200', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/140.html', '1', '1397790715');
INSERT INTO `think_action_log` VALUES ('201', '10', '1', '2130706433', 'Menu', '0', '操作url：/wprc/index.php/admin/menu/del/id/139.html', '1', '1397790718');
INSERT INTO `think_action_log` VALUES ('202', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-18 11:12登录了后台', '1', '1397790760');
INSERT INTO `think_action_log` VALUES ('203', '10', '1', '2130706433', 'Menu', '142', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397790885');
INSERT INTO `think_action_log` VALUES ('204', '10', '1', '2130706433', 'Menu', '143', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397791018');
INSERT INTO `think_action_log` VALUES ('205', '10', '1', '2130706433', 'Menu', '144', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1397810931');
INSERT INTO `think_action_log` VALUES ('206', '10', '1', '2130706433', 'Menu', '145', '操作url：/index.php/admin/menu/add.html', '1', '1397813842');
INSERT INTO `think_action_log` VALUES ('207', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-19 08:58登录了后台', '1', '1397869087');
INSERT INTO `think_action_log` VALUES ('208', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-19 09:02登录了后台', '1', '1397869358');
INSERT INTO `think_action_log` VALUES ('209', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-19 09:22登录了后台', '1', '1397870526');
INSERT INTO `think_action_log` VALUES ('210', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-19 15:46登录了后台', '1', '1397893578');
INSERT INTO `think_action_log` VALUES ('211', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-21 08:52登录了后台', '1', '1398041574');
INSERT INTO `think_action_log` VALUES ('212', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-21 09:08登录了后台', '1', '1398042499');
INSERT INTO `think_action_log` VALUES ('213', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-21 11:10登录了后台', '1', '1398049806');
INSERT INTO `think_action_log` VALUES ('214', '10', '1', '2130706433', 'Menu', '146', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1398061599');
INSERT INTO `think_action_log` VALUES ('215', '10', '1', '2130706433', 'Menu', '147', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1398061801');
INSERT INTO `think_action_log` VALUES ('216', '10', '1', '2130706433', 'Menu', '148', '操作url：/wprc/index.php/admin/menu/add.html', '1', '1398061836');
INSERT INTO `think_action_log` VALUES ('217', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-21 18:29登录了后台', '1', '1398076148');
INSERT INTO `think_action_log` VALUES ('218', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-22 08:57登录了后台', '1', '1398128253');
INSERT INTO `think_action_log` VALUES ('219', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-22 09:03登录了后台', '1', '1398128619');
INSERT INTO `think_action_log` VALUES ('220', '1', '1', '0', 'member', '1', 'Admin在2014-04-22 15:19登录了后台', '1', '1398151141');
INSERT INTO `think_action_log` VALUES ('221', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-22 15:20登录了后台', '1', '1398151232');
INSERT INTO `think_action_log` VALUES ('222', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-23 09:10登录了后台', '1', '1398215401');
INSERT INTO `think_action_log` VALUES ('223', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-24 09:14登录了后台', '1', '1398302041');
INSERT INTO `think_action_log` VALUES ('224', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-24 10:28登录了后台', '1', '1398306490');
INSERT INTO `think_action_log` VALUES ('225', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-25 09:16登录了后台', '1', '1398388594');
INSERT INTO `think_action_log` VALUES ('226', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-25 09:45登录了后台', '1', '1398390319');
INSERT INTO `think_action_log` VALUES ('227', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-26 09:15登录了后台', '1', '1398474936');
INSERT INTO `think_action_log` VALUES ('228', '1', '1', '2130706433', 'member', '1', 'Admin在2014-04-26 13:54登录了后台', '1', '1398491699');
INSERT INTO `think_action_log` VALUES ('229', '1', '1', '2047497238', 'member', '1', 'Admin在2014-04-26 14:44登录了后台', '1', '1398494642');
INSERT INTO `think_action_log` VALUES ('230', '1', '1', '1885260733', 'member', '1', 'Admin在2014-04-26 14:44登录了后台', '1', '1398494672');
INSERT INTO `think_action_log` VALUES ('231', '1', '1', '1885260120', 'member', '1', 'Admin在2014-06-07 11:10登录了后台', '1', '1402110633');
INSERT INTO `think_action_log` VALUES ('232', '10', '1', '1885260120', 'Menu', '149', '操作url：/index.php/admin/menu/add.html', '1', '1402110668');
INSERT INTO `think_action_log` VALUES ('233', '10', '1', '1885260120', 'Menu', '149', '操作url：/index.php/admin/menu/edit.html', '1', '1402110722');
INSERT INTO `think_action_log` VALUES ('234', '10', '1', '1885260120', 'Menu', '150', '操作url：/index.php/admin/menu/add.html', '1', '1402110774');
INSERT INTO `think_action_log` VALUES ('235', '10', '1', '1885260120', 'Menu', '151', '操作url：/index.php/admin/menu/add.html', '1', '1402110900');
INSERT INTO `think_action_log` VALUES ('236', '10', '1', '1885260120', 'Menu', '152', '操作url：/index.php/admin/menu/add.html', '1', '1402110917');
INSERT INTO `think_action_log` VALUES ('237', '1', '1', '-1224652374', 'member', '1', 'Admin在2014-06-07 11:22登录了后台', '1', '1402111370');
INSERT INTO `think_action_log` VALUES ('238', '1', '1', '-1224652374', 'member', '1', 'Admin在2014-06-07 13:11登录了后台', '1', '1402117896');
INSERT INTO `think_action_log` VALUES ('239', '1', '1', '1885260120', 'member', '1', 'Admin在2014-06-07 15:17登录了后台', '1', '1402125445');
INSERT INTO `think_action_log` VALUES ('240', '1', '1', '1885260120', 'member', '1', 'Admin在2014-06-09 15:19登录了后台', '1', '1402298349');
INSERT INTO `think_action_log` VALUES ('241', '1', '1', '1885259813', 'member', '1', 'Admin在2014-06-10 11:36登录了后台', '1', '1402371394');
INSERT INTO `think_action_log` VALUES ('242', '1', '1', '1885235715', 'member', '1', 'Admin在2014-06-14 16:23登录了后台', '1', '1402734193');
INSERT INTO `think_action_log` VALUES ('243', '1', '1', '-1224652871', 'member', '1', 'Admin在2014-06-16 15:57登录了后台', '1', '1402905473');
INSERT INTO `think_action_log` VALUES ('244', '1', '1', '-1224652788', 'member', '1', 'Admin在2014-06-17 09:32登录了后台', '1', '1402968766');
INSERT INTO `think_action_log` VALUES ('245', '1', '1', '1885260352', 'member', '1', 'Admin在2014-06-17 10:31登录了后台', '1', '1402972279');
INSERT INTO `think_action_log` VALUES ('246', '1', '1', '1002194752', 'member', '1', 'Admin在2014-06-17 10:31登录了后台', '1', '1402972298');
INSERT INTO `think_action_log` VALUES ('247', '1', '1', '-1224652871', 'member', '1', 'Admin在2014-06-17 14:09登录了后台', '1', '1402985377');
INSERT INTO `think_action_log` VALUES ('248', '1', '1', '-1224653032', 'member', '1', 'Admin在2014-06-18 09:15登录了后台', '1', '1403054117');
INSERT INTO `think_action_log` VALUES ('249', '1', '1', '1885260352', 'member', '1', 'Admin在2014-06-18 11:38登录了后台', '1', '1403062685');
INSERT INTO `think_auth_extend` VALUES ('1', '1', '2');
INSERT INTO `think_auth_extend` VALUES ('1', '2', '2');
INSERT INTO `think_auth_extend` VALUES ('1', '3', '2');
INSERT INTO `think_auth_group` VALUES ('1', 'admin', '1', '默认用户组', '默认用户组。最少权限', '1', '1,272,273,274,275');
INSERT INTO `think_auth_group` VALUES ('2', 'admin', '1', '权限受限组', '权限受限组。有部分权限', '1', '1,3,272,273,274,275');
INSERT INTO `think_auth_group` VALUES ('3', 'admin', '1', '系统管理组', '系统管理组，有所有权限', '1', '1,3,5,19,20,21,22,23,24,25,26,27,28,29,30,31,218,219,220,221,222,223,224,225,226,227,228,229,230,251,252,253,254,255,256,257,268,269,272,273,274,275,278,283,284,285,287,289,290,291,292');
INSERT INTO `think_auth_rule` VALUES ('1', 'admin', '2', 'Admin/Index/index', '首页', '1', '');
INSERT INTO `think_auth_rule` VALUES ('2', 'admin', '2', 'Admin/Article/mydocument', '内容', '-1', '');
INSERT INTO `think_auth_rule` VALUES ('3', 'admin', '2', 'Admin/User/index', '用户', '1', '');
INSERT INTO `think_auth_rule` VALUES ('4', 'admin', '2', 'Admin/Addons/index', '扩展', '-1', '');
INSERT INTO `think_auth_rule` VALUES ('5', 'admin', '2', 'Admin/Config/group', '配置', '-1', '');
INSERT INTO `think_auth_rule` VALUES ('6', 'admin', '2', 'other', '其他', '-1', '');
INSERT INTO `think_auth_rule` VALUES ('7', 'admin', '1', 'Admin/article/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('8', 'admin', '1', 'Admin/article/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('9', 'admin', '1', 'Admin/article/setStatus', '改变状态', '1', '');
INSERT INTO `think_auth_rule` VALUES ('10', 'admin', '1', 'Admin/article/update', '保存', '1', '');
INSERT INTO `think_auth_rule` VALUES ('11', 'admin', '1', 'Admin/article/autoSave', '保存草稿', '1', '');
INSERT INTO `think_auth_rule` VALUES ('12', 'admin', '1', 'Admin/article/move', '移动', '1', '');
INSERT INTO `think_auth_rule` VALUES ('13', 'admin', '1', 'Admin/article/copy', '复制', '1', '');
INSERT INTO `think_auth_rule` VALUES ('14', 'admin', '1', 'Admin/article/paste', '粘贴', '1', '');
INSERT INTO `think_auth_rule` VALUES ('15', 'admin', '1', 'Admin/article/permit', '还原', '1', '');
INSERT INTO `think_auth_rule` VALUES ('16', 'admin', '1', 'Admin/article/clear', '清空', '1', '');
INSERT INTO `think_auth_rule` VALUES ('17', 'admin', '1', 'Admin/article/index', '文档列表', '1', '');
INSERT INTO `think_auth_rule` VALUES ('18', 'admin', '1', 'Admin/article/recycle', '回收站', '1', '');
INSERT INTO `think_auth_rule` VALUES ('19', 'admin', '1', 'Admin/User/addaction', '新增用户行为', '1', '');
INSERT INTO `think_auth_rule` VALUES ('20', 'admin', '1', 'Admin/User/editaction', '编辑用户行为', '1', '');
INSERT INTO `think_auth_rule` VALUES ('21', 'admin', '1', 'Admin/User/saveAction', '保存用户行为', '1', '');
INSERT INTO `think_auth_rule` VALUES ('22', 'admin', '1', 'Admin/User/setStatus', '变更行为状态', '1', '');
INSERT INTO `think_auth_rule` VALUES ('23', 'admin', '1', 'Admin/User/changeStatus?method=forbidUser', '禁用会员', '1', '');
INSERT INTO `think_auth_rule` VALUES ('24', 'admin', '1', 'Admin/User/changeStatus?method=resumeUser', '启用会员', '1', '');
INSERT INTO `think_auth_rule` VALUES ('25', 'admin', '1', 'Admin/User/changeStatus?method=deleteUser', '删除会员', '1', '');
INSERT INTO `think_auth_rule` VALUES ('26', 'admin', '1', 'Admin/User/index', '用户信息', '1', '');
INSERT INTO `think_auth_rule` VALUES ('27', 'admin', '1', 'Admin/User/action', '用户行为', '1', '');
INSERT INTO `think_auth_rule` VALUES ('28', 'admin', '1', 'Admin/AuthManager/changeStatus?method=deleteGroup', '删除', '1', '');
INSERT INTO `think_auth_rule` VALUES ('29', 'admin', '1', 'Admin/AuthManager/changeStatus?method=forbidGroup', '禁用', '1', '');
INSERT INTO `think_auth_rule` VALUES ('30', 'admin', '1', 'Admin/AuthManager/changeStatus?method=resumeGroup', '恢复', '1', '');
INSERT INTO `think_auth_rule` VALUES ('31', 'admin', '1', 'Admin/AuthManager/createGroup', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('217', 'admin', '1', 'Admin/article/batchOperate', '导入', '1', '');
INSERT INTO `think_auth_rule` VALUES ('218', 'admin', '1', 'Admin/User/add', '新增用户', '1', '');
INSERT INTO `think_auth_rule` VALUES ('219', 'admin', '1', 'Admin/AuthManager/index', '角色组管理', '1', '');
INSERT INTO `think_auth_rule` VALUES ('220', 'admin', '1', 'Admin/AuthManager/editGroup', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('221', 'admin', '1', 'Admin/AuthManager/writeGroup', '保存用户组', '1', '');
INSERT INTO `think_auth_rule` VALUES ('222', 'admin', '1', 'Admin/AuthManager/group', '授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('223', 'admin', '1', 'Admin/AuthManager/access', '访问授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('224', 'admin', '1', 'Admin/AuthManager/user', '成员授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('225', 'admin', '1', 'Admin/AuthManager/removeFromGroup', '解除授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('226', 'admin', '1', 'Admin/AuthManager/addToGroup', '保存成员授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('227', 'admin', '1', 'Admin/AuthManager/category', '分类授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('228', 'admin', '1', 'Admin/AuthManager/addToCategory', '保存分类授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('229', 'admin', '1', 'Admin/AuthManager/modelauth', '模型授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('230', 'admin', '1', 'Admin/AuthManager/addToModel', '保存模型授权', '1', '');
INSERT INTO `think_auth_rule` VALUES ('231', 'admin', '1', 'Admin/Addons/create', '创建', '1', '');
INSERT INTO `think_auth_rule` VALUES ('232', 'admin', '1', 'Admin/Addons/checkForm', '检测创建', '1', '');
INSERT INTO `think_auth_rule` VALUES ('233', 'admin', '1', 'Admin/Addons/preview', '预览', '1', '');
INSERT INTO `think_auth_rule` VALUES ('234', 'admin', '1', 'Admin/Addons/build', '快速生成插件', '1', '');
INSERT INTO `think_auth_rule` VALUES ('235', 'admin', '1', 'Admin/Addons/config', '设置', '1', '');
INSERT INTO `think_auth_rule` VALUES ('236', 'admin', '1', 'Admin/Addons/disable', '禁用', '1', '');
INSERT INTO `think_auth_rule` VALUES ('237', 'admin', '1', 'Admin/Addons/enable', '启用', '1', '');
INSERT INTO `think_auth_rule` VALUES ('238', 'admin', '1', 'Admin/Addons/install', '安装', '1', '');
INSERT INTO `think_auth_rule` VALUES ('239', 'admin', '1', 'Admin/Addons/uninstall', '卸载', '1', '');
INSERT INTO `think_auth_rule` VALUES ('240', 'admin', '1', 'Admin/Addons/saveconfig', '更新配置', '1', '');
INSERT INTO `think_auth_rule` VALUES ('241', 'admin', '1', 'Admin/Addons/adminList', '插件后台列表', '1', '');
INSERT INTO `think_auth_rule` VALUES ('242', 'admin', '1', 'Admin/Addons/execute', 'URL方式访问插件', '1', '');
INSERT INTO `think_auth_rule` VALUES ('243', 'admin', '1', 'Admin/model/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('244', 'admin', '1', 'Admin/model/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('245', 'admin', '1', 'Admin/model/setStatus', '改变状态', '1', '');
INSERT INTO `think_auth_rule` VALUES ('246', 'admin', '1', 'Admin/model/update', '保存数据', '1', '');
INSERT INTO `think_auth_rule` VALUES ('247', 'admin', '1', 'Admin/Attribute/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('248', 'admin', '1', 'Admin/Attribute/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('249', 'admin', '1', 'Admin/Attribute/setStatus', '改变状态', '1', '');
INSERT INTO `think_auth_rule` VALUES ('250', 'admin', '1', 'Admin/Attribute/update', '保存数据', '1', '');
INSERT INTO `think_auth_rule` VALUES ('251', 'admin', '1', 'Admin/Config/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('252', 'admin', '1', 'Admin/Config/del', '删除', '1', '');
INSERT INTO `think_auth_rule` VALUES ('253', 'admin', '1', 'Admin/Config/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('254', 'admin', '1', 'Admin/Config/save', '保存', '1', '');
INSERT INTO `think_auth_rule` VALUES ('255', 'admin', '1', 'Admin/Channel/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('256', 'admin', '1', 'Admin/Channel/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('257', 'admin', '1', 'Admin/Channel/del', '删除', '1', '');
INSERT INTO `think_auth_rule` VALUES ('258', 'admin', '1', 'Admin/Category/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('259', 'admin', '1', 'Admin/Category/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('260', 'admin', '1', 'Admin/Category/remove', '删除', '1', '');
INSERT INTO `think_auth_rule` VALUES ('261', 'admin', '1', 'Admin/Category/operate/type/move', '移动', '1', '');
INSERT INTO `think_auth_rule` VALUES ('262', 'admin', '1', 'Admin/Category/operate/type/merge', '合并', '1', '');
INSERT INTO `think_auth_rule` VALUES ('263', 'admin', '1', 'Admin/Database/export', '备份', '1', '');
INSERT INTO `think_auth_rule` VALUES ('264', 'admin', '1', 'Admin/Database/optimize', '优化表', '1', '');
INSERT INTO `think_auth_rule` VALUES ('265', 'admin', '1', 'Admin/Database/repair', '修复表', '1', '');
INSERT INTO `think_auth_rule` VALUES ('266', 'admin', '1', 'Admin/Database/import', '恢复', '1', '');
INSERT INTO `think_auth_rule` VALUES ('267', 'admin', '1', 'Admin/Database/del', '删除', '1', '');
INSERT INTO `think_auth_rule` VALUES ('268', 'admin', '1', 'Admin/Menu/add', '新增', '1', '');
INSERT INTO `think_auth_rule` VALUES ('269', 'admin', '1', 'Admin/Menu/edit', '编辑', '1', '');
INSERT INTO `think_auth_rule` VALUES ('270', 'admin', '1', 'Admin/Think/lists?model=download', '下载管理', '1', '');
INSERT INTO `think_auth_rule` VALUES ('271', 'admin', '1', 'Admin/Think/lists?model=config', '配置管理', '1', '');
INSERT INTO `think_auth_rule` VALUES ('272', 'admin', '1', 'Admin/Action/actionlog', '行为日志', '1', '');
INSERT INTO `think_auth_rule` VALUES ('273', 'admin', '1', 'Admin/User/updatePassword', '修改密码', '1', '');
INSERT INTO `think_auth_rule` VALUES ('274', 'admin', '1', 'Admin/User/updateNickname', '修改昵称', '1', '');
INSERT INTO `think_auth_rule` VALUES ('275', 'admin', '1', 'Admin/action/edit', '查看行为日志', '1', '');
INSERT INTO `think_auth_rule` VALUES ('276', 'admin', '1', 'Admin/think/add', '新增数据', '1', '');
INSERT INTO `think_auth_rule` VALUES ('277', 'admin', '1', 'Admin/think/edit', '编辑数据', '1', '');
INSERT INTO `think_auth_rule` VALUES ('278', 'admin', '1', 'Admin/Menu/import', '导入', '1', '');
INSERT INTO `think_auth_rule` VALUES ('279', 'admin', '1', 'Admin/Model/generate', '生成', '1', '');
INSERT INTO `think_auth_rule` VALUES ('280', 'admin', '1', 'Admin/Addons/addHook', '新增钩子', '1', '');
INSERT INTO `think_auth_rule` VALUES ('281', 'admin', '1', 'Admin/Addons/edithook', '编辑钩子', '1', '');
INSERT INTO `think_auth_rule` VALUES ('282', 'admin', '1', 'Admin/Article/sort', '文档排序', '1', '');
INSERT INTO `think_auth_rule` VALUES ('283', 'admin', '1', 'Admin/Config/sort', '排序', '1', '');
INSERT INTO `think_auth_rule` VALUES ('284', 'admin', '1', 'Admin/Menu/sort', '排序', '1', '');
INSERT INTO `think_auth_rule` VALUES ('285', 'admin', '1', 'Admin/Channel/sort', '排序', '1', '');
INSERT INTO `think_auth_rule` VALUES ('286', 'admin', '1', 'Admin/Addons/index', '插件管理', '1', '');
INSERT INTO `think_auth_rule` VALUES ('287', 'admin', '1', 'Admin/Config/group', '网站设置', '1', '');
INSERT INTO `think_auth_rule` VALUES ('288', 'admin', '1', 'Admin/Addons/hooks', '钩子管理', '1', '');
INSERT INTO `think_auth_rule` VALUES ('289', 'admin', '1', 'Admin/Config/index', '配置内容', '1', '');
INSERT INTO `think_auth_rule` VALUES ('290', 'admin', '1', 'Admin/Menu/index', '后台菜单', '1', '');
INSERT INTO `think_auth_rule` VALUES ('291', 'admin', '2', 'Admin/Menu/index', '系统', '1', '');
INSERT INTO `think_auth_rule` VALUES ('292', 'admin', '1', 'Admin/Channel/index', '前台菜单', '1', '');
INSERT INTO `think_auth_rule` VALUES ('293', 'admin', '2', 'Admin/Config/index', '配置', '1', '');
INSERT INTO `think_channel` VALUES ('1', '0', '首页', 'Index/index', '1', '1379475111', '1379923177', '1', '0');
INSERT INTO `think_channel` VALUES ('2', '0', '博客', 'Article/index?category=blog', '2', '1379475131', '1379483713', '1', '0');
INSERT INTO `think_channel` VALUES ('3', '0', '官网', 'http://www.onethink.cn', '3', '1379475154', '1387163458', '1', '0');
INSERT INTO `think_config` VALUES ('1', 'WEB_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1379235274', '1', '管理系统', '1');
INSERT INTO `think_config` VALUES ('2', 'WEB_SITE_DESCRIPTION', '2', '网站描述', '1', '', '网站搜索引擎描述', '1378898976', '1393466089', '1', 'ThinkPHP内容管理框架', '5');
INSERT INTO `think_config` VALUES ('3', 'WEB_SITE_KEYWORD', '2', '网站关键字', '1', '', '网站搜索引擎关键字', '1378898976', '1381390100', '1', 'ThinkPHP,OneThink', '19');
INSERT INTO `think_config` VALUES ('4', 'WEB_SITE_CLOSE', '4', '关闭站点', '1', '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1378898976', '1379235296', '1', '1', '6');
INSERT INTO `think_config` VALUES ('9', 'CONFIG_TYPE_LIST', '3', '配置类型列表', '4', '', '主要用于数据解析和页面表单的生成', '1378898976', '1379235348', '1', '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', '9');
INSERT INTO `think_config` VALUES ('10', 'WEB_SITE_ICP', '1', '网站备案号', '1', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1378900335', '1379235859', '1', '', '21');
INSERT INTO `think_config` VALUES ('11', 'DOCUMENT_POSITION', '3', '文档推荐位', '2', '', '文档推荐位，推荐到多个位置KEY值相加即可', '1379053380', '1379235329', '1', '1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐', '11');
INSERT INTO `think_config` VALUES ('12', 'DOCUMENT_DISPLAY', '3', '文档可见性', '2', '', '文章可见性仅影响前台显示，后台不收影响', '1379056370', '1379235322', '1', '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', '14');
INSERT INTO `think_config` VALUES ('13', 'COLOR_STYLE', '4', '后台色系', '1', 'default_color:默认\r\nblue_color:紫罗兰', '后台颜色风格', '1379122533', '1379235904', '1', 'blue_color', '23');
INSERT INTO `think_config` VALUES ('20', 'CONFIG_GROUP_LIST', '3', '配置分组', '4', '', '配置分组', '1379228036', '1384418383', '1', '1:基本\r\n2:内容\r\n3:用户\r\n4:系统', '15');
INSERT INTO `think_config` VALUES ('21', 'HOOKS_TYPE', '3', '钩子的类型', '4', '', '类型 1-用于扩展显示内容，2-用于扩展业务处理', '1379313397', '1379313407', '1', '1:视图\r\n2:控制器', '17');
INSERT INTO `think_config` VALUES ('22', 'AUTH_CONFIG', '3', 'Auth配置', '4', '', '自定义Auth.class.php类配置', '1379409310', '1379409564', '1', 'AUTH_ON:1\r\nAUTH_TYPE:2', '20');
INSERT INTO `think_config` VALUES ('23', 'OPEN_DRAFTBOX', '4', '是否开启草稿功能', '2', '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '新增文章时的草稿功能配置', '1379484332', '1379484591', '1', '1', '7');
INSERT INTO `think_config` VALUES ('24', 'DRAFT_AOTOSAVE_INTERVAL', '0', '自动保存草稿时间', '2', '', '自动保存草稿的时间间隔，单位：秒', '1379484574', '1386143323', '1', '60', '10');
INSERT INTO `think_config` VALUES ('25', 'LIST_ROWS', '0', '后台每页记录数', '2', '', '后台数据每页显示记录数', '1379503896', '1380427745', '1', '10', '24');
INSERT INTO `think_config` VALUES ('26', 'USER_ALLOW_REGISTER', '4', '是否允许用户注册', '3', '0:关闭注册\r\n1:允许注册', '是否开放用户注册', '1379504487', '1379504580', '1', '1', '12');
INSERT INTO `think_config` VALUES ('27', 'CODEMIRROR_THEME', '4', '预览插件的CodeMirror主题', '4', '3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight', '详情见CodeMirror官网', '1379814385', '1384740813', '1', 'ambiance', '13');
INSERT INTO `think_config` VALUES ('28', 'DATA_BACKUP_PATH', '1', '数据库备份根路径', '4', '', '路径必须以 / 结尾', '1381482411', '1381482411', '1', './Data/', '16');
INSERT INTO `think_config` VALUES ('29', 'DATA_BACKUP_PART_SIZE', '0', '数据库备份卷大小', '4', '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '1381482488', '1381729564', '1', '20971520', '18');
INSERT INTO `think_config` VALUES ('30', 'DATA_BACKUP_COMPRESS', '4', '数据库备份文件是否启用压缩', '4', '0:不压缩\r\n1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '1381713345', '1381729544', '1', '1', '22');
INSERT INTO `think_config` VALUES ('31', 'DATA_BACKUP_COMPRESS_LEVEL', '4', '数据库备份文件压缩级别', '4', '1:普通\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '1381713408', '1381713408', '1', '9', '25');
INSERT INTO `think_config` VALUES ('32', 'DEVELOP_MODE', '4', '开启开发者模式', '4', '0:关闭\r\n1:开启', '是否开启开发者模式', '1383105995', '1383291877', '1', '1', '26');
INSERT INTO `think_config` VALUES ('33', 'ALLOW_VISIT', '3', '不受限控制器方法', '0', '', '', '1386644047', '1386644741', '1', '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture', '2');
INSERT INTO `think_config` VALUES ('34', 'DENY_VISIT', '3', '超管专限控制器方法', '0', '', '仅超级管理员可访问的控制器方法', '1386644141', '1386644659', '1', '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', '3');
INSERT INTO `think_config` VALUES ('35', 'REPLY_LIST_ROWS', '0', '回复列表每页条数', '2', '', '', '1386645376', '1387178083', '1', '10', '4');
INSERT INTO `think_config` VALUES ('36', 'ADMIN_ALLOW_IP', '2', '后台允许访问IP', '4', '', '多个用逗号分隔，如果不配置表示不限制IP访问', '1387165454', '1387165553', '1', '', '27');
INSERT INTO `think_config` VALUES ('38', 'AAA', '0', 'aaa', '0', '', '', '1397787763', '1397787763', '1', '', '0');
INSERT INTO `think_config` VALUES ('39', 'BBB', '0', 'aaa', '0', '', '', '1397787775', '1397787791', '1', '', '0');
INSERT INTO `think_follow` VALUES ('38', '49', '50');
INSERT INTO `think_follow` VALUES ('39', '49', '51');
INSERT INTO `think_follow` VALUES ('40', '50', '49');
INSERT INTO `think_member` VALUES ('1', 'Admin', '13010678e23efe96fe5d460289544df0', 'a@b.com', '', '0', '0000-00-00', '', '120', '118', '0', '1393248428', '1885260352', '1403062685', '1');
INSERT INTO `think_member` VALUES ('7', 'aaa', 'dcea61440dacca0eba3ae4281c9ba675', '123456@123.com', '', '0', '0000-00-00', '', '0', '0', '2130706433', '1397787548', '0', '0', '-1');
INSERT INTO `think_member` VALUES ('8', 'bbb', '690e92d3b285dfc6e724a72141af5a50', '1234516@123.com', '', '0', '0000-00-00', '', '0', '0', '2130706433', '1397787561', '0', '0', '-1');
INSERT INTO `think_menu` VALUES ('1', '首页', '0', '1', 'Index/index', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('3', '文档列表', '2', '0', 'article/index', '1', '', '内容', '0');
INSERT INTO `think_menu` VALUES ('4', '新增', '3', '0', 'article/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('5', '编辑', '3', '0', 'article/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('6', '改变状态', '3', '0', 'article/setStatus', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('7', '保存', '3', '0', 'article/update', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('8', '保存草稿', '3', '0', 'article/autoSave', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('9', '移动', '3', '0', 'article/move', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('10', '复制', '3', '0', 'article/copy', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('11', '粘贴', '3', '0', 'article/paste', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('12', '导入', '3', '0', 'article/batchOperate', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('13', '回收站', '2', '0', 'article/recycle', '1', '', '内容', '0');
INSERT INTO `think_menu` VALUES ('14', '还原', '13', '0', 'article/permit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('15', '清空', '13', '0', 'article/clear', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('16', '管理员', '0', '2', 'User/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('17', '用户信息', '16', '2', 'User/index', '0', '', '用户管理', '0');
INSERT INTO `think_menu` VALUES ('18', '新增用户', '17', '0', 'User/add', '0', '添加新用户', '', '0');
INSERT INTO `think_menu` VALUES ('19', '用户行为', '16', '3', 'User/action', '0', '', '用户管理', '0');
INSERT INTO `think_menu` VALUES ('20', '新增用户行为', '19', '0', 'User/addaction', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('21', '编辑用户行为', '19', '0', 'User/editaction', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('22', '保存用户行为', '19', '0', 'User/saveAction', '0', '\"用户->用户行为\"保存编辑和新增的用户行为', '', '0');
INSERT INTO `think_menu` VALUES ('23', '变更行为状态', '19', '0', 'User/setStatus', '0', '\"用户->用户行为\"中的启用,禁用和删除权限', '', '0');
INSERT INTO `think_menu` VALUES ('24', '禁用会员', '19', '0', 'User/changeStatus?method=forbidUser', '0', '\"用户->用户信息\"中的禁用', '', '0');
INSERT INTO `think_menu` VALUES ('25', '启用会员', '19', '0', 'User/changeStatus?method=resumeUser', '0', '\"用户->用户信息\"中的启用', '', '0');
INSERT INTO `think_menu` VALUES ('26', '删除会员', '19', '0', 'User/changeStatus?method=deleteUser', '0', '\"用户->用户信息\"中的删除', '', '0');
INSERT INTO `think_menu` VALUES ('27', '角色组管理', '16', '1', 'AuthManager/index', '0', '', '权限管理', '0');
INSERT INTO `think_menu` VALUES ('28', '删除', '27', '0', 'AuthManager/changeStatus?method=deleteGroup', '0', '删除用户组', '', '0');
INSERT INTO `think_menu` VALUES ('29', '禁用', '27', '0', 'AuthManager/changeStatus?method=forbidGroup', '0', '禁用用户组', '', '0');
INSERT INTO `think_menu` VALUES ('30', '恢复', '27', '0', 'AuthManager/changeStatus?method=resumeGroup', '0', '恢复已禁用的用户组', '', '0');
INSERT INTO `think_menu` VALUES ('31', '新增', '27', '0', 'AuthManager/createGroup', '0', '创建新的用户组', '', '0');
INSERT INTO `think_menu` VALUES ('32', '编辑', '27', '0', 'AuthManager/editGroup', '0', '编辑用户组名称和描述', '', '0');
INSERT INTO `think_menu` VALUES ('33', '保存用户组', '27', '0', 'AuthManager/writeGroup', '0', '新增和编辑用户组的\"保存\"按钮', '', '0');
INSERT INTO `think_menu` VALUES ('34', '授权', '27', '0', 'AuthManager/group', '0', '\"后台 \\ 用户 \\ 用户信息\"列表页的\"授权\"操作按钮,用于设置用户所属用户组', '', '0');
INSERT INTO `think_menu` VALUES ('35', '访问授权', '27', '0', 'AuthManager/access', '0', '\"后台 \\ 用户 \\ 权限管理\"列表页的\"访问授权\"操作按钮', '', '0');
INSERT INTO `think_menu` VALUES ('36', '成员授权', '27', '0', 'AuthManager/user', '0', '\"后台 \\ 用户 \\ 权限管理\"列表页的\"成员授权\"操作按钮', '', '0');
INSERT INTO `think_menu` VALUES ('37', '解除授权', '27', '0', 'AuthManager/removeFromGroup', '0', '\"成员授权\"列表页内的解除授权操作按钮', '', '0');
INSERT INTO `think_menu` VALUES ('38', '保存成员授权', '27', '0', 'AuthManager/addToGroup', '0', '\"用户信息\"列表页\"授权\"时的\"保存\"按钮和\"成员授权\"里右上角的\"添加\"按钮)', '', '0');
INSERT INTO `think_menu` VALUES ('39', '分类授权', '27', '0', 'AuthManager/category', '0', '\"后台 \\ 用户 \\ 权限管理\"列表页的\"分类授权\"操作按钮', '', '0');
INSERT INTO `think_menu` VALUES ('40', '保存分类授权', '27', '0', 'AuthManager/addToCategory', '0', '\"分类授权\"页面的\"保存\"按钮', '', '0');
INSERT INTO `think_menu` VALUES ('41', '模型授权', '27', '0', 'AuthManager/modelauth', '0', '\"后台 \\ 用户 \\ 权限管理\"列表页的\"模型授权\"操作按钮', '', '0');
INSERT INTO `think_menu` VALUES ('42', '保存模型授权', '27', '0', 'AuthManager/addToModel', '0', '\"分类授权\"页面的\"保存\"按钮', '', '0');
INSERT INTO `think_menu` VALUES ('44', '插件管理', '43', '1', 'Addons/index', '0', '', '扩展', '0');
INSERT INTO `think_menu` VALUES ('45', '创建', '44', '0', 'Addons/create', '0', '服务器上创建插件结构向导', '', '0');
INSERT INTO `think_menu` VALUES ('46', '检测创建', '44', '0', 'Addons/checkForm', '0', '检测插件是否可以创建', '', '0');
INSERT INTO `think_menu` VALUES ('47', '预览', '44', '0', 'Addons/preview', '0', '预览插件定义类文件', '', '0');
INSERT INTO `think_menu` VALUES ('48', '快速生成插件', '44', '0', 'Addons/build', '0', '开始生成插件结构', '', '0');
INSERT INTO `think_menu` VALUES ('49', '设置', '44', '0', 'Addons/config', '0', '设置插件配置', '', '0');
INSERT INTO `think_menu` VALUES ('50', '禁用', '44', '0', 'Addons/disable', '0', '禁用插件', '', '0');
INSERT INTO `think_menu` VALUES ('51', '启用', '44', '0', 'Addons/enable', '0', '启用插件', '', '0');
INSERT INTO `think_menu` VALUES ('52', '安装', '44', '0', 'Addons/install', '0', '安装插件', '', '0');
INSERT INTO `think_menu` VALUES ('53', '卸载', '44', '0', 'Addons/uninstall', '0', '卸载插件', '', '0');
INSERT INTO `think_menu` VALUES ('54', '更新配置', '44', '0', 'Addons/saveconfig', '0', '更新插件配置处理', '', '0');
INSERT INTO `think_menu` VALUES ('55', '插件后台列表', '44', '0', 'Addons/adminList', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('56', 'URL方式访问插件', '44', '0', 'Addons/execute', '0', '控制是否有权限通过url访问插件控制器方法', '', '0');
INSERT INTO `think_menu` VALUES ('57', '钩子管理', '43', '2', 'Addons/hooks', '0', '', '扩展', '0');
INSERT INTO `think_menu` VALUES ('59', '新增', '58', '0', 'model/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('60', '编辑', '58', '0', 'model/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('61', '改变状态', '58', '0', 'model/setStatus', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('62', '保存数据', '58', '0', 'model/update', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('64', '新增', '63', '0', 'Attribute/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('65', '编辑', '63', '0', 'Attribute/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('66', '改变状态', '63', '0', 'Attribute/setStatus', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('67', '保存数据', '63', '0', 'Attribute/update', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('130', '用户管理', '129', '0', 'Guest/index', '0', '', '基本管理', '0');
INSERT INTO `think_menu` VALUES ('131', '产品类别', '124', '2', 'ProductCategory/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('145', '用户详细资料', '130', '0', 'Guest/detail', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('72', '删除', '70', '0', 'Config/del', '0', '删除配置', '', '0');
INSERT INTO `think_menu` VALUES ('144', '修改', '125', '0', 'Review/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('74', '保存', '70', '0', 'Config/save', '0', '保存配置', '', '0');
INSERT INTO `think_menu` VALUES ('75', '后台菜单', '93', '5', 'Menu/index', '0', '', '菜单管理', '0');
INSERT INTO `think_menu` VALUES ('76', '前台菜单', '93', '6', 'Channel/index', '0', '', '菜单管理', '0');
INSERT INTO `think_menu` VALUES ('77', '新增', '76', '0', 'Channel/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('78', '编辑', '76', '0', 'Channel/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('79', '删除', '76', '0', 'Channel/del', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('81', '编辑', '80', '0', 'Category/edit', '0', '编辑和保存栏目分类', '', '0');
INSERT INTO `think_menu` VALUES ('82', '新增', '80', '0', 'Category/add', '0', '新增栏目分类', '', '0');
INSERT INTO `think_menu` VALUES ('83', '删除', '80', '0', 'Category/remove', '0', '删除栏目分类', '', '0');
INSERT INTO `think_menu` VALUES ('84', '移动', '80', '0', 'Category/operate/type/move', '0', '移动栏目分类', '', '0');
INSERT INTO `think_menu` VALUES ('85', '合并', '80', '0', 'Category/operate/type/merge', '0', '合并栏目分类', '', '0');
INSERT INTO `think_menu` VALUES ('87', '备份', '86', '0', 'Database/export', '0', '备份数据库', '', '0');
INSERT INTO `think_menu` VALUES ('88', '优化表', '86', '0', 'Database/optimize', '0', '优化数据表', '', '0');
INSERT INTO `think_menu` VALUES ('89', '修复表', '86', '0', 'Database/repair', '0', '修复数据表', '', '0');
INSERT INTO `think_menu` VALUES ('91', '恢复', '90', '0', 'Database/import', '0', '数据库恢复', '', '0');
INSERT INTO `think_menu` VALUES ('92', '删除', '90', '0', 'Database/del', '0', '删除备份文件', '', '0');
INSERT INTO `think_menu` VALUES ('93', '系统', '0', '0', 'Menu/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('96', '新增', '75', '0', 'Menu/add', '0', '', '系统设置', '0');
INSERT INTO `think_menu` VALUES ('98', '编辑', '75', '0', 'Menu/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('104', '下载管理', '102', '0', 'Think/lists?model=download', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('105', '配置管理', '102', '0', 'Think/lists?model=config', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('106', '行为日志', '16', '4', 'Action/actionlog', '0', '', '日志管理', '0');
INSERT INTO `think_menu` VALUES ('108', '修改密码', '16', '5', 'User/updatePassword', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('109', '修改昵称', '16', '6', 'User/updateNickname', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('110', '查看行为日志', '106', '0', 'action/edit', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('112', '新增数据', '58', '0', 'think/add', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('113', '编辑数据', '58', '0', 'think/edit', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('114', '导入', '75', '0', 'Menu/import', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('115', '生成', '58', '0', 'Model/generate', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('116', '新增钩子', '57', '0', 'Addons/addHook', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('117', '编辑钩子', '57', '0', 'Addons/edithook', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('118', '文档排序', '3', '0', 'Article/sort', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('119', '排序', '70', '0', 'Config/sort', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('120', '排序', '75', '0', 'Menu/sort', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('121', '排序', '76', '0', 'Channel/sort', '1', '', '', '0');
INSERT INTO `think_menu` VALUES ('132', '新增', '131', '0', 'ProductCategory/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('124', '网评管理', '0', '4', 'Review/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('125', '网评管理', '124', '0', 'Review/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('126', '评论管理', '124', '0', 'Reply/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('127', '配置内容', '93', '0', 'Config/index', '0', '', '配置管理', '0');
INSERT INTO `think_menu` VALUES ('128', '网站设置', '93', '0', 'Config/group', '0', '', '配置管理', '0');
INSERT INTO `think_menu` VALUES ('129', '用户管理', '0', '5', 'Guest/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('133', '修改', '131', '0', 'ProductCategory/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('134', '编辑用户', '130', '0', 'Guest/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('136', '新增', '125', '0', 'Review/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('146', '详情', '125', '0', 'Review/detail', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('142', '编辑', '127', '0', 'Config/edit', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('143', '新增', '127', '0', 'Config/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('147', '添加', '126', '0', 'Reply/add', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('148', '详情', '126', '0', 'Reply/detail', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('149', '商品管理', '0', '0', 'Goods/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('150', '发货管理', '149', '0', 'History/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('151', '商品列表', '149', '0', 'Goods/index', '0', '', '', '0');
INSERT INTO `think_menu` VALUES ('152', '专区列表', '149', '0', 'Zhuanqu/index', '0', '', '', '0');
INSERT INTO `think_message` VALUES ('1', '6', '100', '0', '1', '1399289803', '6');
INSERT INTO `think_message` VALUES ('2', '6', '100', '9', '1', '1399290294', '6');
INSERT INTO `think_message` VALUES ('3', '6', '100', '9', '0', '1400328280', '9');
INSERT INTO `think_message` VALUES ('4', '6', '100', '0', '0', '1400328298', '9');
INSERT INTO `think_message` VALUES ('5', '11', '102', '0', '0', '1400462175', '12');
INSERT INTO `think_message` VALUES ('6', '12', '102', '13', '0', '1400462227', '11');
INSERT INTO `think_message` VALUES ('7', '11', '103', '0', '0', '1400462783', '12');
INSERT INTO `think_message` VALUES ('8', '11', '105', '0', '0', '1400463993', '12');
INSERT INTO `think_message` VALUES ('9', '12', '105', '16', '0', '1400464013', '11');
INSERT INTO `think_message` VALUES ('10', '6', '100', '0', '0', '1400487319', '13');
INSERT INTO `think_message` VALUES ('11', '11', '106', '0', '0', '1400488848', '12');
INSERT INTO `think_message` VALUES ('12', '11', '102', '0', '0', '1400489054', '13');
INSERT INTO `think_message` VALUES ('13', '12', '106', '19', '0', '1400489178', '13');
INSERT INTO `think_message` VALUES ('14', '12', '107', '0', '0', '1400489328', '12');
INSERT INTO `think_message` VALUES ('15', '6', '100', '0', '0', '1400489329', '14');
INSERT INTO `think_message` VALUES ('16', '12', '107', '0', '0', '1400489365', '14');
INSERT INTO `think_message` VALUES ('17', '12', '107', '0', '0', '1400489412', '13');
INSERT INTO `think_message` VALUES ('18', '6', '100', '0', '0', '1400489888', '12');
INSERT INTO `think_message` VALUES ('19', '12', '108', '0', '0', '1400571835', '11');
INSERT INTO `think_message` VALUES ('20', '11', '119', '0', '0', '1400577785', '21');
INSERT INTO `think_message` VALUES ('21', '12', '120', '0', '0', '1400577824', '21');
INSERT INTO `think_message` VALUES ('22', '12', '120', '0', '0', '1400577890', '11');
INSERT INTO `think_message` VALUES ('23', '21', '119', '28', '0', '1400577912', '11');
INSERT INTO `think_message` VALUES ('24', '11', '119', '0', '0', '1400578336', '22');
INSERT INTO `think_message` VALUES ('25', '12', '106', '19', '0', '1400660094', '21');
INSERT INTO `think_message` VALUES ('26', '28', '185', '0', '0', '1400669203', '11');
INSERT INTO `think_message` VALUES ('27', '11', '186', '0', '0', '1400669228', '23');
INSERT INTO `think_message` VALUES ('28', '12', '189', '0', '0', '1400669512', '11');
INSERT INTO `think_message` VALUES ('29', '12', '189', '0', '0', '1400669515', '28');
INSERT INTO `think_message` VALUES ('30', '23', '187', '0', '0', '1400669704', '26');
INSERT INTO `think_message` VALUES ('31', '11', '186', '0', '0', '1400669724', '28');
INSERT INTO `think_message` VALUES ('32', '12', '189', '0', '0', '1400669735', '26');
INSERT INTO `think_message` VALUES ('33', '12', '194', '0', '0', '1400669907', '27');
INSERT INTO `think_message` VALUES ('34', '26', '193', '0', '0', '1400670165', '12');
INSERT INTO `think_message` VALUES ('35', '12', '189', '0', '0', '1400686135', '21');
INSERT INTO `think_message` VALUES ('36', '11', '180', '0', '0', '1400686354', '21');
INSERT INTO `think_message` VALUES ('37', '26', '187', '38', '0', '1400827022', '11');
INSERT INTO `think_message` VALUES ('38', '26', '193', '0', '0', '1400827254', '11');
INSERT INTO `think_message` VALUES ('39', '27', '195', '0', '0', '1400827284', '11');
INSERT INTO `think_message` VALUES ('40', '27', '195', '0', '0', '1400827292', '11');
INSERT INTO `think_message` VALUES ('41', '32', '203', '0', '0', '1401088906', '11');
INSERT INTO `think_message` VALUES ('42', '21', '198', '0', '0', '1401088938', '11');
INSERT INTO `think_message` VALUES ('43', '32', '203', '0', '0', '1401089262', '21');
INSERT INTO `think_message` VALUES ('44', '11', '201', '0', '0', '1401089288', '21');
INSERT INTO `think_message` VALUES ('45', '11', '203', '49', '0', '1401089312', '21');
INSERT INTO `think_message` VALUES ('46', '11', '198', '50', '0', '1402300158', '11');
INSERT INTO `think_message` VALUES ('47', '21', '204', '0', '0', '1402382952', '21');
INSERT INTO `think_message` VALUES ('48', '21', '204', '0', '0', '1402458231', '40');
INSERT INTO `think_message` VALUES ('49', '49', '215', '0', '0', '1402906688', '48');
INSERT INTO `think_message` VALUES ('50', '49', '215', '0', '0', '1402911003', '50');
INSERT INTO `think_message` VALUES ('51', '49', '215', '0', '0', '1402911026', '50');
INSERT INTO `think_message` VALUES ('52', '50', '218', '0', '0', '1402912833', '11');
INSERT INTO `think_message` VALUES ('53', '49', '215', '0', '0', '1402972915', '51');
INSERT INTO `think_message` VALUES ('54', '21', '204', '0', '0', '1402972940', '51');
INSERT INTO `think_message` VALUES ('55', '50', '218', '0', '0', '1402973229', '51');
INSERT INTO `think_message` VALUES ('56', '48', '216', '0', '0', '1402973302', '51');
INSERT INTO `think_message` VALUES ('57', '48', '215', '57', '0', '1402989865', '11');
INSERT INTO `think_message` VALUES ('58', '51', '215', '61', '0', '1402995540', '49');
INSERT INTO `think_message` VALUES ('59', '50', '218', '0', '0', '1402996056', '49');
INSERT INTO `think_message` VALUES ('60', '48', '216', '0', '0', '1402996521', '53');
INSERT INTO `think_message` VALUES ('61', '51', '216', '64', '0', '1402996531', '53');
INSERT INTO `think_message` VALUES ('62', '49', '215', '0', '0', '1402996737', '54');
INSERT INTO `think_message` VALUES ('63', '50', '218', '0', '0', '1402996762', '54');
INSERT INTO `think_message` VALUES ('64', '53', '225', '0', '0', '1402997292', '54');
INSERT INTO `think_message` VALUES ('65', '49', '224', '0', '0', '1402998802', '54');
INSERT INTO `think_message` VALUES ('66', '48', '216', '0', '0', '1403020955', '11');
INSERT INTO `think_product_category` VALUES ('1', '电器类', '0', '2');
INSERT INTO `think_product_category` VALUES ('5', '书籍类', '0', '0');
INSERT INTO `think_product_category` VALUES ('6', '美食类', '0', '0');
INSERT INTO `think_product_category` VALUES ('7', '电子类', '0', '0');
INSERT INTO `think_product_category` VALUES ('20', '测试类', '1', '0');
INSERT INTO `think_reply` VALUES ('4', '1', '88', '0', '对啊，我也买了这个东西，质感很差，而且退货时间太长了，等了几个月', '1398066128', '0');
INSERT INTO `think_reply` VALUES ('5', '1', '88', '4', '原来大家的经历和我的很相似', '1398066188', '0');
INSERT INTO `think_reply` VALUES ('6', '2', '88', '5', '测试评论\r\n测试评论\r\n测试评论\r\n测试评论测试评论测试评论\r\n测试评论测试评论\r\n测试评论测试评论', '1398069688', '0');
INSERT INTO `think_reply` VALUES ('9', '6', '100', '0', 'Eeewwww', '1399289803', '6');
INSERT INTO `think_reply` VALUES ('10', '6', '100', '9', 'Rrr', '1399290294', '6');
INSERT INTO `think_reply` VALUES ('11', '9', '100', '9', 'dsafdasf', '1400328280', '6');
INSERT INTO `think_reply` VALUES ('12', '9', '100', '0', 'dsadfga', '1400328298', '6');
INSERT INTO `think_reply` VALUES ('13', '12', '102', '0', 'dhshddhdj', '1400462175', '11');
INSERT INTO `think_reply` VALUES ('14', '11', '102', '13', '是男是女是', '1400462227', '12');
INSERT INTO `think_reply` VALUES ('15', '12', '103', '0', 'dhdb', '1400462783', '11');
INSERT INTO `think_reply` VALUES ('16', '12', '105', '0', 'hshssh', '1400463993', '11');
INSERT INTO `think_reply` VALUES ('17', '11', '105', '16', '耍手机上班', '1400464013', '12');
INSERT INTO `think_reply` VALUES ('18', '13', '100', '0', '挂号费的干活', '1400487319', '6');
INSERT INTO `think_reply` VALUES ('19', '12', '106', '0', 'Dhshsh', '1400488848', '11');
INSERT INTO `think_reply` VALUES ('20', '13', '102', '0', '魁拔', '1400489054', '11');
INSERT INTO `think_reply` VALUES ('21', '13', '106', '19', '哈哈', '1400489178', '12');
INSERT INTO `think_reply` VALUES ('22', '12', '107', '0', '赞', '1400489328', '12');
INSERT INTO `think_reply` VALUES ('23', '14', '100', '0', '哈哈', '1400489329', '6');
INSERT INTO `think_reply` VALUES ('24', '14', '107', '0', '力赞', '1400489365', '12');
INSERT INTO `think_reply` VALUES ('25', '13', '107', '0', '赞', '1400489412', '12');
INSERT INTO `think_reply` VALUES ('26', '12', '100', '0', '电话多好多好', '1400489888', '6');
INSERT INTO `think_reply` VALUES ('27', '11', '108', '0', '的就是就是', '1400571835', '12');
INSERT INTO `think_reply` VALUES ('28', '21', '119', '0', '我也是啊，被坑了- -！', '1400577785', '11');
INSERT INTO `think_reply` VALUES ('29', '21', '120', '0', '真的可以退货么？', '1400577824', '12');
INSERT INTO `think_reply` VALUES ('30', '11', '120', '0', '太坑了', '1400577890', '12');
INSERT INTO `think_reply` VALUES ('31', '11', '119', '28', '太恶心了', '1400577912', '21');
INSERT INTO `think_reply` VALUES ('32', '22', '119', '0', '太坑了', '1400578336', '11');
INSERT INTO `think_reply` VALUES ('33', '21', '106', '19', '11111', '1400660094', '12');
INSERT INTO `think_reply` VALUES ('34', '11', '185', '0', '是啊，我还正准备去，现在都不敢去了。', '1400669203', '28');
INSERT INTO `think_reply` VALUES ('35', '23', '186', '0', '真的吗？那我下次不会去了，这不是坑爹的节奏吗，说好那么多还要加钱', '1400669228', '11');
INSERT INTO `think_reply` VALUES ('36', '11', '189', '0', '就是，上次我们也是去了也是这样，以后告他去。坑爹的卖家', '1400669512', '12');
INSERT INTO `think_reply` VALUES ('37', '28', '189', '0', '原来那么坑啊，还打算说这个星期跟朋友去吃了。', '1400669515', '12');
INSERT INTO `think_reply` VALUES ('38', '26', '187', '0', '不是吧，真的假的？！！', '1400669704', '23');
INSERT INTO `think_reply` VALUES ('39', '28', '186', '0', '不是吧，还要给钱啊，这不就抢吗？', '1400669724', '11');
INSERT INTO `think_reply` VALUES ('40', '26', '189', '0', '牛蛙啊。。。。。咦。。。。。。。。恶心。。。。。', '1400669735', '12');
INSERT INTO `think_reply` VALUES ('41', '27', '194', '0', '赞', '1400669907', '12');
INSERT INTO `think_reply` VALUES ('42', '12', '193', '0', '这家一点都不好吃', '1400670165', '26');
INSERT INTO `think_reply` VALUES ('43', '21', '189', '0', '这么坑………………', '1400686135', '12');
INSERT INTO `think_reply` VALUES ('44', '21', '180', '0', '半夜还有人敲门，难道是收服务费的？', '1400686354', '11');
INSERT INTO `think_reply` VALUES ('45', '11', '187', '38', '感觉起来怕怕的', '1400827022', '26');
INSERT INTO `think_reply` VALUES ('46', '11', '193', '0', '不好吃啊不好吃', '1400827254', '26');
INSERT INTO `think_reply` VALUES ('47', '11', '195', '0', '打击无良卖家啊', '1400827284', '27');
INSERT INTO `think_reply` VALUES ('48', '11', '195', '0', '净化购物环境啊', '1400827292', '27');
INSERT INTO `think_reply` VALUES ('49', '11', '203', '0', '我上次给女朋友买一双鞋业是这样的，垃圾淘宝卖家。', '1401088906', '32');
INSERT INTO `think_reply` VALUES ('50', '11', '198', '0', '还说哪天去试试呢，现在看了你发的，都不敢去吃了。', '1401088938', '21');
INSERT INTO `think_reply` VALUES ('51', '21', '203', '0', '二手货无疑', '1401089262', '32');
INSERT INTO `think_reply` VALUES ('52', '21', '201', '0', '严重影响吃货的心情啊', '1401089288', '11');
INSERT INTO `think_reply` VALUES ('53', '21', '203', '49', '节哀。。。', '1401089312', '11');
INSERT INTO `think_reply` VALUES ('54', '11', '198', '50', '家里老板娘就', '1402300158', '11');
INSERT INTO `think_reply` VALUES ('55', '21', '204', '0', '怎么没人', '1402382952', '21');
INSERT INTO `think_reply` VALUES ('56', '40', '204', '0', '网上买的吗', '1402458231', '21');
INSERT INTO `think_reply` VALUES ('57', '48', '215', '0', '这么坑啊，还好我没去。', '1402906688', '49');
INSERT INTO `think_reply` VALUES ('58', '50', '215', '0', '鄙视！！好多团购都是这样的，虚假！', '1402911003', '49');
INSERT INTO `think_reply` VALUES ('59', '50', '215', '0', '我也要告诉我的朋友们千万别去被坑了', '1402911026', '49');
INSERT INTO `think_reply` VALUES ('60', '11', '218', '0', '这样啊', '1402912833', '50');
INSERT INTO `think_reply` VALUES ('61', '51', '215', '0', '不能信广告啊', '1402972915', '49');
INSERT INTO `think_reply` VALUES ('62', '51', '204', '0', '坏人啊', '1402972940', '21');
INSERT INTO `think_reply` VALUES ('63', '51', '218', '0', '无良商家', '1402973229', '50');
INSERT INTO `think_reply` VALUES ('64', '51', '216', '0', '这样做生意还不倒闭啊', '1402973302', '48');
INSERT INTO `think_reply` VALUES ('65', '11', '215', '57', '我也你一样', '1402989865', '48');
INSERT INTO `think_reply` VALUES ('66', '49', '215', '61', '是啊，以后要注意啊！', '1402995540', '51');
INSERT INTO `think_reply` VALUES ('67', '49', '218', '0', '非常鄙视这种商家啊！！！', '1402996056', '50');
INSERT INTO `think_reply` VALUES ('68', '53', '216', '0', '我以前也遇见这样的情况啊，现在的好多网店老板都不负责任啊！', '1402996521', '48');
INSERT INTO `think_reply` VALUES ('69', '53', '216', '64', '是啊，我也觉得！！', '1402996531', '51');
INSERT INTO `think_reply` VALUES ('70', '54', '215', '0', '现在很多团购都是这样的了，这些商家都赚黑心钱！', '1402996737', '49');
INSERT INTO `think_reply` VALUES ('71', '54', '218', '0', '顶楼上的，鄙视这种老板。。。', '1402996762', '50');
INSERT INTO `think_reply` VALUES ('72', '54', '225', '0', '最好不在要在网上买化妆品了，现在骗子假货太多了。', '1402997292', '53');
INSERT INTO `think_reply` VALUES ('73', '54', '224', '0', '这是Nike最流行的款式啊，肯定很多无良卖家会造假货来卖，以后都要小心啊。。。。。', '1402998802', '49');
INSERT INTO `think_reply` VALUES ('74', '11', '216', '0', '我的一个朋友也是这样被坑的!', '1403020955', '48');
INSERT INTO `think_review` VALUES ('216', '48', '短袖衣服', '1', '', '0', 'http://detail.tmall.com/item.htm?spm=a230r.1.14.1.1YRN3V&id=38011509022', '', '', '', '前几天在网上买的衣服，真是无语，物流慢的比蜗牛还慢。拍的是M码，发来的货，吊牌是M码，衣服上的标签是XL码，大的太多了，没发穿，老板太不负责了，欺骗消费者。上传照片为证。姐妹们要注意啊。', 'Uploads/Picture/Review/2014-06-16/20140616162040_745.jpg', '1402906840', '4', '0', '1', '1');
INSERT INTO `think_review` VALUES ('218', '50', '短袖衣服', '1', '', '0', 'http://detail.tmall.com/item.htm?spm=a230r.1.14.1.PZr2dA&id=18453637401', '', '', '', '在网上买的这件衣服有几个黑点，关键还不洗掉了！和卖家协商还不让退，虽然衣服不贵，但是希望老板发货前检查一下！', 'Uploads/Picture/Review/2014-06-16/20140616173558_509.jpg', '1402911358', '4', '0', '1', '2');
INSERT INTO `think_review` VALUES ('214', '48', 'iphone5手机', '1', '', '0', 'http://item.taobao.com/item.htm?spm=a230r.1.14.51.P5ptP1&id=38038755955&ns=1#detail', '', '', '', '这个手机卖家，我在网上购买了一部iPhone5,简直就是一坑货卖家，服务态度差就不说了，还做虚假广告，先客服跟你说是库存机，查序列号是未激活保修还有一年的，然后等到货了以后经理又说没有库存机，都是置换机。然后拍的是官方标配，又给我发个套餐一，又骗我说确认收货了以后就反差价。我只是说出我的真实经历，有图有真相，希望各位亲不要再上当受骗了。', 'Uploads/Picture/Review/2014-06-16/20140616150403_613.jpg', '1402902243', '0', '0', '1', '0');
INSERT INTO `think_review` VALUES ('204', '21', '风扇', '1', '广州风扇专卖店', '1', '广州市市桥', '广东省', '广州市', '番禺区', '风扇拿回来竟然不能转，然后，我愉快的度过了一个火热的夜晚', 'Uploads/Picture/Review/2014-06-10/20140610143356_395.jpg', '1402382036', '3', '0', '1', '10');
INSERT INTO `think_review` VALUES ('215', '49', '火锅', '1', '渔婆', '1', '番禺区大龙街道石岗北路93号西', '广东省', '广州市', '番禺区', '今天中午去出去玩，在外面吃饭，感觉这家渔婆不错就团购了一份，结果鱼的分量太少了，团购里面包含的根本不够吃，还说够4个人吃，两个人吃了都不够，而且这个锅吃起来很麻烦，说赠送什么特别调的汤，就是一般的骨头汤，很差的一次团购！！！！', 'Uploads/Picture/Review/2014-06-16/20140616151859_605.jpg', '1402903139', '7', '0', '1', '4');
INSERT INTO `think_review` VALUES ('223', '11', '女包', '1', '', '0', 'http://item.taobao.com/item.htm?spm=a230r.1.14.1.xbzkqc&id=18777257454&ns=1#detail', '', '', '', '前几天女朋友在网上买了一个女包，结果背了几天链子就坏了，联系老板让换货，结果老板说是我们自己弄坏的，还让我们出来回邮费，这种无良的商家的，一定要把他举报了！！', 'Uploads/Picture/Review/2014-06-17/20140617165718_699.jpg', '1402995438', '0', '0', '1', '0');
INSERT INTO `think_review` VALUES ('224', '49', 'nike篮球鞋', '1', '', '0', 'http://item.taobao.com/item.htm?spm=a230r.1.14.40.vKoawW&id=39010642610&ns=1#detail', '', '', '', '伤心啊，在网上买了双篮球鞋，被坑了！！千万不要买这家的 月卖100+ 评语6个人 当初还奇怪 现在可以肯定是托了 这家的估计当都是刷出来的 看看我传的照片 鞋子那白色的钩是直接贴上去的 用手轻轻就能撕下来 鞋子长短不一样 鞋垫那钩要一样 什么型号的帖子都没 收据丢了完拍了 还写的什么正品鞋子 还500+呢 还好评里的人估计全是刷出来了的 。。。。', 'Uploads/Picture/Review/2014-06-17/20140617170524_572.jpg', '1402995924', '1', '0', '1', '1');
INSERT INTO `think_review` VALUES ('225', '53', '欧莱雅护肤套装', '1', '', '0', 'http://item.taobao.com/item.htm?spm=a230r.1.14.141.k2c8NL&id=38120306661&ns=1#detail', '', '', '', '在网上给老妈买的欧莱雅护肤套装，结果发现包装密封都不好，打开以后使用以后觉得也不像是正品，大家以后不要去这家买了！！', 'Uploads/Picture/Review/2014-06-17/20140617171428_558.jpg', '1402996468', '1', '0', '1', '1');
INSERT INTO `think_review_img` VALUES ('218', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_173.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('219', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_449.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('220', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_481.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('221', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_845.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('222', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_823.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('223', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_558.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('224', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_801.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('225', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_388.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('226', '191', 'Uploads/Picture/Review/2014-05-21/20140521184758_341.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('227', '191', 'Uploads/Picture/Review/2014-05-21/20140521184758_557.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('228', '191', 'Uploads/Picture/Review/2014-05-21/20140521184758_958.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('229', '192', 'Uploads/Picture/Review/2014-05-21/20140521184904_101.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('230', '192', 'Uploads/Picture/Review/2014-05-21/20140521184904_427.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('231', '192', 'Uploads/Picture/Review/2014-05-21/20140521184904_971.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('232', '193', 'Uploads/Picture/Review/2014-05-21/20140521185337_744.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('233', '193', 'Uploads/Picture/Review/2014-05-21/20140521185337_791.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('234', '193', 'Uploads/Picture/Review/2014-05-21/20140521185337_252.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('235', '194', 'Uploads/Picture/Review/2014-05-21/20140521185605_551.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('236', '194', 'Uploads/Picture/Review/2014-05-21/20140521185605_529.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('237', '194', 'Uploads/Picture/Review/2014-05-21/20140521185605_707.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('238', '195', 'Uploads/Picture/Review/2014-05-21/20140521185733_402.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('239', '195', 'Uploads/Picture/Review/2014-05-21/20140521185733_500.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('240', '195', 'Uploads/Picture/Review/2014-05-21/20140521185733_347.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('241', '196', 'Uploads/Picture/Review/2014-05-21/20140521190148_419.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('242', '196', 'Uploads/Picture/Review/2014-05-21/20140521190148_501.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('243', '196', 'Uploads/Picture/Review/2014-05-21/20140521190148_335.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('190', '180', 'Uploads/Picture/Review/2014-05-21/20140521183007_355.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('191', '180', 'Uploads/Picture/Review/2014-05-21/20140521183007_695.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('192', '180', 'Uploads/Picture/Review/2014-05-21/20140521183007_477.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('193', '181', 'Uploads/Picture/Review/2014-05-21/20140521183507_670.png', '0', '');
INSERT INTO `think_review_img` VALUES ('194', '181', 'Uploads/Picture/Review/2014-05-21/20140521183507_469.png', '0', '');
INSERT INTO `think_review_img` VALUES ('195', '181', 'Uploads/Picture/Review/2014-05-21/20140521183507_144.png', '0', '');
INSERT INTO `think_review_img` VALUES ('196', '182', 'Uploads/Picture/Review/2014-05-21/20140521183549_546.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('197', '182', 'Uploads/Picture/Review/2014-05-21/20140521183549_708.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('198', '182', 'Uploads/Picture/Review/2014-05-21/20140521183549_710.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('199', '0', 'Uploads/Picture/Review/2014-05-21/20140521183718_621.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('200', '0', 'Uploads/Picture/Review/2014-05-21/20140521183718_821.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('201', '183', 'Uploads/Picture/Review/2014-05-21/20140521183940_610.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('202', '184', 'Uploads/Picture/Review/2014-05-21/20140521184129_675.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('203', '185', 'Uploads/Picture/Review/2014-05-21/20140521184205_347.png', '0', '');
INSERT INTO `think_review_img` VALUES ('204', '185', 'Uploads/Picture/Review/2014-05-21/20140521184205_169.png', '0', '');
INSERT INTO `think_review_img` VALUES ('205', '185', 'Uploads/Picture/Review/2014-05-21/20140521184205_940.png', '0', '');
INSERT INTO `think_review_img` VALUES ('206', '185', 'Uploads/Picture/Review/2014-05-21/20140521184205_370.png', '0', '');
INSERT INTO `think_review_img` VALUES ('207', '186', 'Uploads/Picture/Review/2014-05-21/20140521184213_147.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('208', '186', 'Uploads/Picture/Review/2014-05-21/20140521184213_675.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('209', '186', 'Uploads/Picture/Review/2014-05-21/20140521184213_612.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('210', '187', 'Uploads/Picture/Review/2014-05-21/20140521184418_400.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('211', '188', 'Uploads/Picture/Review/2014-05-21/20140521184525_414.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('212', '188', 'Uploads/Picture/Review/2014-05-21/20140521184525_218.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('213', '188', 'Uploads/Picture/Review/2014-05-21/20140521184525_467.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('214', '189', 'Uploads/Picture/Review/2014-05-21/20140521184622_799.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('215', '189', 'Uploads/Picture/Review/2014-05-21/20140521184622_982.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('216', '189', 'Uploads/Picture/Review/2014-05-21/20140521184622_760.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('217', '190', 'Uploads/Picture/Review/2014-05-21/20140521184751_794.jpg', '0', '');
INSERT INTO `think_review_img` VALUES ('244', '0', 'Uploads/Picture/Review/2014-05-24/20140524134949_588.png', '0', '');
INSERT INTO `think_review_img` VALUES ('245', '0', 'Uploads/Picture/Review/2014-05-26/20140526143505_986.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143505_986.jpg');
INSERT INTO `think_review_img` VALUES ('246', '0', 'Uploads/Picture/Review/2014-05-26/20140526143505_497.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143505_497.jpg');
INSERT INTO `think_review_img` VALUES ('247', '0', 'Uploads/Picture/Review/2014-05-26/20140526143515_566.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143515_566.jpg');
INSERT INTO `think_review_img` VALUES ('248', '0', 'Uploads/Picture/Review/2014-05-26/20140526143515_313.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143515_313.jpg');
INSERT INTO `think_review_img` VALUES ('249', '197', 'Uploads/Picture/Review/2014-05-26/20140526143537_682.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143537_682.jpg');
INSERT INTO `think_review_img` VALUES ('250', '197', 'Uploads/Picture/Review/2014-05-26/20140526143537_302.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526143537_302.jpg');
INSERT INTO `think_review_img` VALUES ('251', '198', 'Uploads/Picture/Review/2014-05-26/20140526145237_321.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145237_321.jpg');
INSERT INTO `think_review_img` VALUES ('252', '198', 'Uploads/Picture/Review/2014-05-26/20140526145237_598.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145237_598.jpg');
INSERT INTO `think_review_img` VALUES ('253', '198', 'Uploads/Picture/Review/2014-05-26/20140526145237_542.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145237_542.jpg');
INSERT INTO `think_review_img` VALUES ('254', '199', 'Uploads/Picture/Review/2014-05-26/20140526145720_218.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145720_218.jpg');
INSERT INTO `think_review_img` VALUES ('255', '199', 'Uploads/Picture/Review/2014-05-26/20140526145720_639.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145720_639.jpg');
INSERT INTO `think_review_img` VALUES ('256', '199', 'Uploads/Picture/Review/2014-05-26/20140526145720_995.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526145720_995.jpg');
INSERT INTO `think_review_img` VALUES ('257', '200', 'Uploads/Picture/Review/2014-05-26/20140526150423_115.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526150423_115.jpg');
INSERT INTO `think_review_img` VALUES ('258', '200', 'Uploads/Picture/Review/2014-05-26/20140526150423_769.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526150423_769.jpg');
INSERT INTO `think_review_img` VALUES ('259', '200', 'Uploads/Picture/Review/2014-05-26/20140526150423_862.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526150423_862.jpg');
INSERT INTO `think_review_img` VALUES ('260', '201', 'Uploads/Picture/Review/2014-05-26/20140526151006_866.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151006_866.jpg');
INSERT INTO `think_review_img` VALUES ('261', '201', 'Uploads/Picture/Review/2014-05-26/20140526151006_537.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151006_537.jpg');
INSERT INTO `think_review_img` VALUES ('262', '201', 'Uploads/Picture/Review/2014-05-26/20140526151006_130.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151006_130.jpg');
INSERT INTO `think_review_img` VALUES ('263', '201', 'Uploads/Picture/Review/2014-05-26/20140526151006_787.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151006_787.jpg');
INSERT INTO `think_review_img` VALUES ('264', '202', 'Uploads/Picture/Review/2014-05-26/20140526151231_897.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151231_897.jpg');
INSERT INTO `think_review_img` VALUES ('265', '202', 'Uploads/Picture/Review/2014-05-26/20140526151231_943.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151231_943.jpg');
INSERT INTO `think_review_img` VALUES ('266', '202', 'Uploads/Picture/Review/2014-05-26/20140526151231_582.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151231_582.jpg');
INSERT INTO `think_review_img` VALUES ('267', '203', 'Uploads/Picture/Review/2014-05-26/20140526151724_750.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151724_750.jpg');
INSERT INTO `think_review_img` VALUES ('268', '203', 'Uploads/Picture/Review/2014-05-26/20140526151724_751.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151724_751.jpg');
INSERT INTO `think_review_img` VALUES ('269', '203', 'Uploads/Picture/Review/2014-05-26/20140526151724_948.jpg', '0', 'Uploads/Picture/Review/2014-05-26/_thumb_20140526151724_948.jpg');
INSERT INTO `think_review_img` VALUES ('270', '204', 'Uploads/Picture/Review/2014-06-10/20140610143356_284.jpg', '0', 'Uploads/Picture/Review/2014-06-10/_thumb_20140610143356_284.jpg');
INSERT INTO `think_review_img` VALUES ('271', '204', 'Uploads/Picture/Review/2014-06-10/20140610143356_611.jpg', '0', 'Uploads/Picture/Review/2014-06-10/_thumb_20140610143356_611.jpg');
INSERT INTO `think_review_img` VALUES ('298', '224', 'Uploads/Picture/Review/2014-06-17/20140617170524_817.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617170524_817.jpg');
INSERT INTO `think_review_img` VALUES ('297', '224', 'Uploads/Picture/Review/2014-06-17/20140617170523_692.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617170523_692.jpg');
INSERT INTO `think_review_img` VALUES ('287', '216', 'Uploads/Picture/Review/2014-06-16/20140616162040_603.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616162040_603.jpg');
INSERT INTO `think_review_img` VALUES ('288', '216', 'Uploads/Picture/Review/2014-06-16/20140616162040_857.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616162040_857.jpg');
INSERT INTO `think_review_img` VALUES ('296', '224', 'Uploads/Picture/Review/2014-06-17/20140617170523_382.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617170523_382.jpg');
INSERT INTO `think_review_img` VALUES ('290', '218', 'Uploads/Picture/Review/2014-06-16/20140616173558_322.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616173558_322.jpg');
INSERT INTO `think_review_img` VALUES ('294', '223', 'Uploads/Picture/Review/2014-06-17/20140617165718_189.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617165718_189.jpg');
INSERT INTO `think_review_img` VALUES ('295', '223', 'Uploads/Picture/Review/2014-06-17/20140617165718_367.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617165718_367.jpg');
INSERT INTO `think_review_img` VALUES ('282', '214', 'Uploads/Picture/Review/2014-06-16/20140616150403_173.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616150403_173.jpg');
INSERT INTO `think_review_img` VALUES ('283', '214', 'Uploads/Picture/Review/2014-06-16/20140616150403_563.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616150403_563.jpg');
INSERT INTO `think_review_img` VALUES ('284', '214', 'Uploads/Picture/Review/2014-06-16/20140616150403_538.png', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616150403_538.png');
INSERT INTO `think_review_img` VALUES ('285', '215', 'Uploads/Picture/Review/2014-06-16/20140616151859_268.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616151859_268.jpg');
INSERT INTO `think_review_img` VALUES ('286', '215', 'Uploads/Picture/Review/2014-06-16/20140616151859_109.jpg', '0', 'Uploads/Picture/Review/2014-06-16/_thumb_20140616151859_109.jpg');
INSERT INTO `think_review_img` VALUES ('299', '225', 'Uploads/Picture/Review/2014-06-17/20140617171427_736.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617171427_736.jpg');
INSERT INTO `think_review_img` VALUES ('300', '225', 'Uploads/Picture/Review/2014-06-17/20140617171427_670.jpg', '0', 'Uploads/Picture/Review/2014-06-17/_thumb_20140617171427_670.jpg');
INSERT INTO `think_score_shop` VALUES ('10', '风扇', '1', '高档风扇，你值得拥有', '/Images/Product/20140607/53928e2aaf79e.jpg', '/Images/Product/20140607/thumb_53928e2aaf79e.jpg', '100', '0', '50');
INSERT INTO `think_shop_history` VALUES ('2', '10', '11', '100', '2147483647', '广州番禺', '我我都觉得', '1');
INSERT INTO `think_shop_history` VALUES ('3', '10', '11', '100', '12313123', '31231231', '12312312', '0');
INSERT INTO `think_user` VALUES ('1', 'guest', '13010678e23efe96fe5d460289544df0', 'guest@guet.com', 'qq', '0', '');
INSERT INTO `think_user` VALUES ('2', 'admin', '36cd7da1eeeac1e296e219d82eee83b7', 'sfsf@sfs.com', '网评如潮小助手', '0', '');
INSERT INTO `think_user` VALUES ('8', 'yhm', '021af4108934c33c76b5db84b8e8a01d', '', 'yhm', '0', '');
INSERT INTO `think_user` VALUES ('4', 'doact', 'f1438296e47763910ac698028bbba85b', '', 'doact', '0', '');
INSERT INTO `think_user` VALUES ('5', '16113141414', 'ac5745145c34d9d3a6566a58893c341e', '', '16113141414', '0', '');
INSERT INTO `think_user` VALUES ('6', 'junyi111', '021af4108934c33c76b5db84b8e8a01d', '', '悲剧哥', '0', '');
INSERT INTO `think_user` VALUES ('9', 'aaaaa', '65dd2646d5afc2c20993d58770aa9871', '', 'aaaaa', '0', '');
INSERT INTO `think_user` VALUES ('10', '2222', 'c6d2a38009c7be6995eeb5266f8d115b', '', '2222', '0', '');
INSERT INTO `think_user` VALUES ('11', '1991371', 'd0988fdcc32e0f173282ca1a72fe165e', '', '风一样', '0', '');
INSERT INTO `think_user` VALUES ('12', '654321', 'd0988fdcc32e0f173282ca1a72fe165e', '', '阴阳五行', '0', '');
INSERT INTO `think_user` VALUES ('13', '123456', 'd0988fdcc32e0f173282ca1a72fe165e', '', '123456', '0', '');
INSERT INTO `think_user` VALUES ('14', '朗朗', '3a89c083905ec266a0e6933bd86a6cd1', '', '朗朗', '0', '');
INSERT INTO `think_user` VALUES ('15', '喝酒第一', 'bf94147452ca6c8072d27446b049b48f', '', '喝酒第一', '0', '');
INSERT INTO `think_user` VALUES ('16', 'aaaaaa', '455bf1996586e2b3b89eca7664444737', '121379520@qq.com', 'aaaaaa', '0', '');
INSERT INTO `think_user` VALUES ('19', '', '', '', '海鸟和鱼', '0', '');
INSERT INTO `think_user` VALUES ('20', '我晕', '2fb1db4ed626f62d9bc32da65a6c6265', '', '我晕', '0', '');
INSERT INTO `think_user` VALUES ('21', 'a121379520', '654e47d63fe2243661957c68b4bbda6b', '', '吃货一枚', '0', '');
INSERT INTO `think_user` VALUES ('22', 'Axis', '7fffb013984f1d202f5b965bee9b3ff1', '', 'Axis', '0', '');
INSERT INTO `think_user` VALUES ('23', '朗朗a', 'c81bee35a7cc6b7964d718e5a128f354', '', '朗朗a', '0', '');
INSERT INTO `think_user` VALUES ('24', '下下', '97f5f9c5867fdff58138d63faa3759f1', '', '下下', '0', '');
INSERT INTO `think_user` VALUES ('26', '草根', 'b6508bcc917a4a3903a793794b5468a7', '', '老爹爹', '0', '');
INSERT INTO `think_user` VALUES ('25', 'ttxs2014', '05d791a8534bf65624e6b2a5ca0781c9', '', 'ttxs2014', '0', '');
INSERT INTO `think_user` VALUES ('27', 'yijing', '65fd2d819c2b94933bf6f053bd48e916', '', 'yijing', '0', '');
INSERT INTO `think_user` VALUES ('28', 'overy', '97f5f9c5867fdff58138d63faa3759f1', '', 'overy', '0', '');
INSERT INTO `think_user` VALUES ('29', '阿豪', 'd0988fdcc32e0f173282ca1a72fe165e', '', '测试专人', '0', '');
INSERT INTO `think_user` VALUES ('30', 'shenglr', 'b0ea963aebc3946c93c7d6f1b87f62c8', '', 'shenglr', '0', '');
INSERT INTO `think_user` VALUES ('31', '110110', 'd2389f1fc6d5fcc098fbd82dc9c28bfe', '', '110110', '0', '');
INSERT INTO `think_user` VALUES ('32', '1234567', 'd0988fdcc32e0f173282ca1a72fe165e', '', '花仙子', '0', '');
INSERT INTO `think_user` VALUES ('33', '', '', '', '默默默默', '0', '');
INSERT INTO `think_user` VALUES ('34', 'a', 'd8012be77a78f2b813ff93cfb22951fb', '', 'a', '0', '');
INSERT INTO `think_user` VALUES ('36', '111111', '021af4108934c33c76b5db84b8e8a01d', '121379520@qq.com', '111111', '0', '');
INSERT INTO `think_user` VALUES ('37', 'cactus', '47924ba0fc941c015b9747a9ddcbe086', '1991081915@qq.com', 'cactus', '0', '');
INSERT INTO `think_user` VALUES ('38', 'mahb520', '02084c75e06cc0ecf8c05d191532ca2c', 'mahb520@gmail.com', 'mahb520', '0', '');
INSERT INTO `think_user` VALUES ('39', 'b121379520', '654e47d63fe2243661957c68b4bbda6b', '121379520@qq.com', 'b121379520', '21', '');
INSERT INTO `think_user` VALUES ('40', 'feitengteng', 'cc4c0eb5f96b53090bd3998067be095b', 'feitengg@126.com', 'feitengteng', '0', '');
INSERT INTO `think_user` VALUES ('41', 'w123456', 'e728262fe8dc9dbd31fcc21ac40ee0b3', 'ayhr001@sina.com', 'w123456', '0', '');
INSERT INTO `think_user` VALUES ('44', '1111aaaa', '7ceafdc717ec42cdf81a5242cc24fe1e', '', '1111aaaa', '0', '13226522447');
INSERT INTO `think_user` VALUES ('47', '2222222', 'd0988fdcc32e0f173282ca1a72fe165e', '', '2222222', '0', '13250565888');
INSERT INTO `think_user` VALUES ('48', '7654321', 'd0988fdcc32e0f173282ca1a72fe165e', '342753980@qq.com', '佳美~', '11', '13885123256');
INSERT INTO `think_user` VALUES ('49', 'aaa123', 'd0988fdcc32e0f173282ca1a72fe165e', '342753980@qq.com', '无敌帅哥', '11', '13532506555');
INSERT INTO `think_user` VALUES ('50', '12345678', 'd0988fdcc32e0f173282ca1a72fe165e', '123@qq.com', '夏天的雨', '11', '13565153252');
INSERT INTO `think_user` VALUES ('51', 'w12345', 'd0988fdcc32e0f173282ca1a72fe165e', 'wjh7001@sina.com', 'w12345', '0', '13928827001');
INSERT INTO `think_user` VALUES ('52', '13660493199', '79047b8254f4dbeb5a9d95152e61a313', '519154105@qq.com', '13660493199', '0', '18664666690');
INSERT INTO `think_user` VALUES ('53', 'abc123', 'd0988fdcc32e0f173282ca1a72fe165e', '342753980@qq.com', '草莓女孩', '0', '13250565888');
INSERT INTO `think_user` VALUES ('54', 'abc1234', 'd0988fdcc32e0f173282ca1a72fe165e', '2313@qq.com', '可爱多', '0', '13250565856');
INSERT INTO `think_user_info` VALUES ('1', '1', '什么也没有！', '1', '', '广东省', '广州市', '番禺区', '127.0.0.1', '1396257002', '1', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('40', '40', '', '0', '', '', '', '', '-1224653965', '1402458205', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('33', '33', '', '0', '', '', '', '', '1885259847', '1401088715', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('34', '34', '', '0', '', '', '', '', '1885259847', '1401090424', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('35', '35', '', '0', '', '', '', '', '1885259847', '1401092407', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('36', '36', '', '0', '', '山西省', '晋城市', '沁水县', '1885259847', '1401092612', '0', '204,', '0', '0', '2014-12-31 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('37', '37', '', '0', '', '', '', '', '236804449', '1401327714', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('2', '2', '顶替地', '0', '', '村棒', '地有', '村村', '', '1396257002', '1', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('41', '41', '', '0', '', '', '', '', '-1224653965', '1402465751', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('42', '42', '', '0', '', '', '', '', '-1224653965', '1402554202', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('3', '3', '', '0', '', '', '', '', '', '0', '1', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('4', '4', '', '0', '', '', '', '', '1885260733', '1398496234', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('5', '5', '', '0', '', '', '', '', '-1224654324', '1398497386', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('6', '6', '我是歌手', '1', '', '广东', '广州', '从化', '-1224654324', '1398497507', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('7', '7', '', '0', '', '', '', '', '1885260695', '1398663688', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('9', '9', 'sdadsadfgadfhfghsf', '1', '', '辽宁', '鞍山', '鞍山市', '1885260300', '1400328169', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('8', '8', '', '1', '', '省份', '地级市', '市、县级市、县', '-590953811', '1399288550', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('10', '10', '', '0', '', '', '', '', '1885260300', '1400328740', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('11', '11', '', '1', '20140526152027_456.jpg', '四川省', '成都市', '锦江区', '-1224656885', '1400461833', '0', '216,', '0', '0', '1995-03-14 00:00:00', '342753980', '1854');
INSERT INTO `think_user_info` VALUES ('12', '12', '专业差评50年', '0', '20140519165743_174.jpg', '省份', '地级市', '市、县级市', '-1224656885', '1400462139', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('13', '13', '马年大发', '0', '20140519153351_698.jpg', '广东', '广州', '天河区', '-1224656885', '1400464206', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('14', '14', '哈哈', '1', '', '天津市', '天津市', '市、县级市', '-1224656885', '1400488961', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('15', '15', '', '0', '', '', '', '', '-1224651881', '1400492152', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('16', '16', '', '0', '', '', '', '', '-1224651881', '1400564189', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('17', '17', '', '0', '', '', '', '', '-1224651881', '1400568808', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('18', '18', '', '0', '', '', '', '', '-1224651881', '1400568914', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('19', '19', '', '0', '', '', '', '', '-1224651881', '1400569614', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('20', '20', '', '0', '', '', '', '', '236914544', '1400572767', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('21', '21', '我是吃货……', '0', '20140520172136_218.jpg', '广东省', '广州市', '天河区', '-1224651881', '1400577491', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '3');
INSERT INTO `think_user_info` VALUES ('22', '22', '', '0', '', '', '', '', '-1224651881', '1400577695', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('23', '23', '', '0', '', '', '', '', '-1224651881', '1400577875', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('24', '24', '', '0', '', '', '', '', '-1224651881', '1400578117', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('25', '25', '', '0', '', '', '', '', '248535547', '1400588131', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('26', '26', '呵呵，我是帅锅，耶', '0', '', '广东省', '广州市', '番禺区', '-1224653705', '1400665945', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('27', '27', '', '0', '', '', '', '', '-1224653705', '1400666652', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('28', '28', '', '0', '', '', '', '', '-1224653705', '1400668148', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('31', '31', '', '0', '', '', '', '', '1885259847', '1401087646', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('29', '29', '这家伙很懒，什么也没有留下', '1', '20140522094935_880.jpg', '广东省', '广州市', '番禺区', '1885260600', '1400723079', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('32', '32', '', '0', '20140526151953_691.jpg', '北京市', '北京市', '东城区', '-1224655406', '1401088547', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('38', '38', '', '0', '', '', '', '', '1032632150', '1401443197', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('30', '30', '', '0', '', '', '', '', '989714976', '1401072845', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('39', '39', '', '0', '', '', '', '', '1885260120', '1402113444', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('43', '43', '', '0', '', '', '', '', '-1224653965', '1402555462', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('44', '44', '', '0', '', '', '', '', '1885259813', '1402556815', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('48', '48', '我爱洗澡皮肤好好', '0', '20140616161522_676.jpg', '北京市', '北京市', '崇文区', '-1224652871', '1402902024', '0', '215,', '0', '0', '2014-12-31 00:00:00', '0', '2');
INSERT INTO `think_user_info` VALUES ('45', '45', '', '0', '', '', '', '', '-1224655637', '1402631827', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('46', '46', '', '0', '', '', '', '', '-1224655637', '1402631834', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('47', '47', '', '0', '', '', '', '', '-1224655637', '1402631862', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('49', '49', '风一样的男人！！！！！！', '0', '20140616151129_469.jpg', '上海市', '上海市', '黄浦区', '-1224652871', '1402902400', '0', '218,', '1', '2', '2014-12-31 00:00:00', '0', '2');
INSERT INTO `think_user_info` VALUES ('50', '50', '一个爱美丽的吃货。', '0', '20140616172943_571.jpg', '重庆市', '重庆市', '渝中区', '-1224652871', '1402906910', '0', '', '1', '1', '2014-12-31 00:00:00', '0', '1');
INSERT INTO `think_user_info` VALUES ('51', '51', '', '1', '', '省份', '地级市', '市、县级市', '-1224652871', '1402970639', '0', '215,', '1', '0', '2014-12-31 00:00:00', '0', '3');
INSERT INTO `think_user_info` VALUES ('52', '52', '', '0', '', '', '', '', '-1224652871', '1402974380', '0', '', '0', '0', '0000-00-00 00:00:00', '0', '0');
INSERT INTO `think_user_info` VALUES ('53', '53', '我爱草莓！', '0', '20140617170848_366.jpg', '省份', '地级市', '市、县级市', '-1224652871', '1402996084', '0', '215,', '0', '0', '2014-12-31 00:00:00', '0', '1');
INSERT INTO `think_user_info` VALUES ('54', '54', '', '0', '20140617171754_362.jpg', '湖南省', '长沙市', '长沙市', '-1224652871', '1402996645', '0', '215,218,225,224,', '0', '0', '2014-12-31 00:00:00', '0', '0');
INSERT INTO `think_user_qq` VALUES ('1', '19', '02B388960EFACFB582A9F01AAAD637EF', '8702AA9F83C3535B32814A7A405CF4E7');
INSERT INTO `think_user_qq` VALUES ('2', '33', '8A3F9317A2DC9396F219B6E17CF90626', 'BDC338EF2AEC1DDB94B44C776BFF26B0');
INSERT INTO `think_user_weibo` VALUES ('36', '1737435664', '2.00s4GatBM5eLcC80d89b4eb3qHc7OE', '1');
INSERT INTO `think_xinxi` VALUES ('1', '32', '30', 'fgjdgjdhgjdhgjhkhgdg', '1400000000', '0');
INSERT INTO `think_xinxi` VALUES ('2', '30', '32', 'fgfhgcvxbxcnbvnbx', '1420000000', '0');
INSERT INTO `think_xinxi` VALUES ('3', '30', '32', '看看', '1401445735', '1');
INSERT INTO `think_xinxi` VALUES ('4', '30', '32', '快速大卷发', '1401446173', '0');
INSERT INTO `think_xinxi` VALUES ('5', '32', '31', 'dadfafdad', '1412012565', '0');
INSERT INTO `think_xinxi` VALUES ('6', '31', '33', 'sdafasdfasdf', '1412363253', '0');
INSERT INTO `think_xinxi` VALUES ('7', '31', '32', 'sdgafda', '1415789520', '0');
INSERT INTO `think_xinxi` VALUES ('8', '35', '32', 'sdfadgfhf', '1418745856', '0');
INSERT INTO `think_xinxi` VALUES ('9', '32', '30', '看看', '1401763124', '0');
INSERT INTO `think_xinxi` VALUES ('10', '39', '30', 'haskdhf', '1401790152', '0');
INSERT INTO `think_xinxi` VALUES ('13', '2', '21', '您发表的 比萨已经审核通过!', '1402112022', '1');
INSERT INTO `think_xinxi` VALUES ('14', '2', '21', '您发表的 比萨已经审核通过!', '1402112089', '1');
INSERT INTO `think_xinxi` VALUES ('19', '11', '11', 'das', '1402125223', '1');
INSERT INTO `think_xinxi` VALUES ('20', '11', '11', '假的，但他没时间去考虑自己。\n　　他不想继续跟老穆扯谈，拿起手电要跟老穆分道扬镳。这一次老穆没打算拦他了，也就没有谁再出手阻止。他往回走，走到拐弯处。\n　　老穆依然是望着他，开口说：“你身体里面的催情蛊，虽然是被小刘给弄掉了，但它对你的影响，还有残留，就跟重病后遗症是一个道理，你应该没笨到连我的话也听不懂的地步。好好想想。”\n　　“催情蛊，去你妈的催情蛊。。。。。”神偷听得心浮气躁，脚步加快，拿着手电到处晃动，越看墙壁上的荧光不爽，对墙壁猛捶几下。\n　　一个人下地道的事情，神偷也干过，不至于害怕，不过老穆说墙壁上都是灵蛊，还是让他犯怵，毕竟是中过一次蛊的人，知道这玩意儿的厉害。\n　　一个小小的催情蛊，就弄得太要死要活，现在身体里的是能控制人意识的灵蛊，比要人命更可怕。不过，他不明白老穆说整个密道都是灵蛊是什么意思，难道说，墙壁上发光的这些荧光小虫真的都是蛊？蛊不是都依赖于生命而存在的吗？\n　　神偷迟疑要不要去找老穆问个清楚，最终还是决定继续往前走，管他呢，什么都比不上嫣儿。\n　　可是嫣儿又在哪呢？没有远图的追踪能力，只能是漫无目的的瞎找。。。', '1402125271', '1');
INSERT INTO `think_xinxi` VALUES ('24', '2', '21', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=204\'>风扇</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402382058', '1');
INSERT INTO `think_xinxi` VALUES ('27', '2', '49', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=215\'>火锅</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402906434', '0');
INSERT INTO `think_xinxi` VALUES ('28', '2', '48', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=214\'>iphone5手机</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402906447', '0');
INSERT INTO `think_xinxi` VALUES ('29', '2', '48', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=216\'>短袖衣服</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402906846', '0');
INSERT INTO `think_xinxi` VALUES ('30', '2', '50', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=218\'>短袖衣服</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402911370', '0');
INSERT INTO `think_xinxi` VALUES ('31', '36', '50', '勾搭一下……', '1402912470', '0');
INSERT INTO `think_xinxi` VALUES ('34', '2', '51', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=221\'>杯子</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402971335', '1');
INSERT INTO `think_xinxi` VALUES ('35', '2', '51', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=220\'>杯子</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402971344', '1');
INSERT INTO `think_xinxi` VALUES ('36', '51', '49', '你是?', '1402972758', '0');
INSERT INTO `think_xinxi` VALUES ('38', '2', '49', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=224\'>nike篮球鞋</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402996018', '0');
INSERT INTO `think_xinxi` VALUES ('39', '2', '53', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=225\'>欧莱雅护肤套装</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402996476', '0');
INSERT INTO `think_xinxi` VALUES ('40', '2', '51', '您发表的 <a style=\'color:red\' href=\'/index.php/home/act/reviewinfo.html?id=226\'>杯子</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~', '1402999743', '0');
INSERT INTO `think_zhuanqu` VALUES ('1', '100分专区', '1');
INSERT INTO `think_zhuanqu` VALUES ('2', '200分专区', '2');
