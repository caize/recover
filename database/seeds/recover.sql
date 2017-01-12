/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : recover

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-01-12 11:30:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标题',
  `category_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '分类ID',
  `intro` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章简介',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章封面',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章内容-html格式',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_title_unique` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '1', '1', '111', 'http://oe3em7ins.bkt.clouddn.com/5b1bc9dc8e0db20a92506affb6f8fef7.png', '', '1', '2016-09-26 09:08:27', '2016-09-26 09:08:27');
INSERT INTO `articles` VALUES ('2', '122', '2', '111', 'http://izxin.ngrok.4kb.cn/assets/img/no-image.png', '', '1', '2016-09-26 09:11:02', '2016-09-26 09:11:02');
INSERT INTO `articles` VALUES ('3', '122333', '2', '111', 'http://izxin.ngrok.4kb.cn/assets/img/no-image.png', '<p>1111</p>\n', '1', '2016-09-26 09:13:45', '2016-09-26 09:13:45');
INSERT INTO `articles` VALUES ('4', 'vue', '1', 'vue', 'http://izxin.ngrok.4kb.cn/assets/img/no-image.png', '<p>vue</p>\n', '1', '2016-09-26 09:15:12', '2016-09-26 09:15:12');
INSERT INTO `articles` VALUES ('5', 'java', '2', 'java', 'http://oe3em7ins.bkt.clouddn.com/aizxin/article/ca0f3e7728c7ab3daef1cf6134a07628.png', '<p><img src=\"http://oe3em7ins.bkt.clouddn.com/uploads/ueditor/php/upload/image/20170111/148410699726f892.png\" title=\"148410699726f892.png\" alt=\"aboutus.png\"/>java</p>', '3', '2016-09-26 09:16:25', '2017-01-11 03:56:43');
INSERT INTO `articles` VALUES ('6', '111111', '2', '1111111', 'http://oe3em7ins.bkt.clouddn.com/89de5e7b1b386e1c412ca841272ebe1d.png', '<blockquote><p>nihao</p></blockquote><hr/><ol class=\" list-paddingleft-2\"><li><p>nihao</p></li><li><p>jkkk</p></li><li><p>kfkfk</p></li><li><p><img src=\"http://oe3em7ins.bkt.clouddn.com/uploads/ueditor/php/upload/image/20170111/148413006063c9d6.png\" title=\"148413006063c9d6.png\" alt=\"333.png\"/><br/></p><h6><img class=\"anchorclass\"/><span class=\"header-link octicon octicon-link\"></span>dddd</h6></li></ol><p><img src=\"http://oe3em7ins.bkt.clouddn.com/aizxin/article/056ccdbd0bf8700808b0547cca17d703.png\" alt=\"nihao\" title=\"nihao\"/></p>', '3', '2016-12-23 10:31:24', '2017-01-11 10:22:20');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类关系',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `engineName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '分类描述',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', '关于我们', 'about me', '', '1', '1', '2016-09-23 03:28:00', '2017-01-11 10:32:13');
INSERT INTO `categories` VALUES ('2', '0', '后端', '', '', '2', '1', '2016-09-23 04:01:05', '2016-09-23 04:01:05');
INSERT INTO `categories` VALUES ('3', '0', '数据库', '', '', '3', '1', '2016-09-23 04:03:30', '2016-09-23 04:03:30');
INSERT INTO `categories` VALUES ('4', '0', '运维&测试', '', '', '4', '1', '2016-09-23 04:05:14', '2016-09-23 04:05:14');
INSERT INTO `categories` VALUES ('11', '2', 'php', '', '', '1', '1', '2016-09-23 07:59:50', '2016-09-23 07:59:50');
INSERT INTO `categories` VALUES ('6', '1', 'html', '', '', '1', '1', '2016-09-23 04:09:29', '2016-09-23 04:09:29');
INSERT INTO `categories` VALUES ('7', '1', 'vue', '', '', '2', '1', '2016-09-23 04:10:43', '2016-09-23 04:10:43');
INSERT INTO `categories` VALUES ('9', '1', 'react', '', '', '3', '1', '2016-09-23 06:12:11', '2016-09-23 06:12:11');

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '字段名称',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '字段代码',
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '字段类型',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章简介',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '字段排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `configs_code_unique` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of configs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_09_03_031122_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_menu` int(1) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '0', 'admin.index.manage', '主页管理', '主页管理', '1', 'fa fa-laptop', '1', '2016-09-20 04:42:36', '2016-09-20 04:42:36');
INSERT INTO `permissions` VALUES ('2', '0', 'admin.rbac.manage', '权限管理', '权限管理', '1', 'fa fa-users', '5', '2016-09-20 04:44:16', '2016-09-20 15:08:20');
INSERT INTO `permissions` VALUES ('3', '1', 'admin.index.index', '后台主页', '后台主页', '1', null, '1', '2016-09-20 04:46:37', '2016-09-20 04:46:37');
INSERT INTO `permissions` VALUES ('4', '2', 'admin.user.index', '管理员列表', '管理员列表', '1', null, '1', '2016-09-20 04:47:26', '2016-09-20 04:47:26');
INSERT INTO `permissions` VALUES ('5', '4', 'admin.user.create', '新增管理视图', '新增管理视图', '0', null, '1', '2016-09-20 04:48:57', '2016-09-20 04:48:57');
INSERT INTO `permissions` VALUES ('6', '4', 'admin.user.store', '新增管理操作', '新增管理操作', '0', null, '2', '2016-09-20 04:50:01', '2016-09-20 04:50:01');
INSERT INTO `permissions` VALUES ('7', '4', 'admin.user.edit', '编辑管理视图', '编辑管理视图', '0', null, '3', '2016-09-20 04:50:56', '2016-09-20 04:50:56');
INSERT INTO `permissions` VALUES ('8', '4', 'admin.user.update', '编辑管理操作', '编辑管理操作', '0', null, '4', '2016-09-20 04:51:58', '2016-09-20 04:51:58');
INSERT INTO `permissions` VALUES ('9', '4', 'admin.user.show', '管理角色视图', '管理角色视图', '0', null, '5', '2016-09-20 04:53:05', '2016-09-20 04:53:05');
INSERT INTO `permissions` VALUES ('10', '4', 'admin.user.role', '管理角色操作', '管理角色操作', '0', null, '6', '2016-09-20 04:53:56', '2016-09-20 04:53:56');
INSERT INTO `permissions` VALUES ('11', '4', 'admin.user.destroy', '管理员删除', '管理员删除', '0', null, '7', '2016-09-20 05:58:27', '2016-09-20 05:58:27');
INSERT INTO `permissions` VALUES ('12', '2', 'admin.role.index', '角色列表', '角色列表', '1', null, '2', '2016-09-20 04:55:08', '2016-09-20 04:55:08');
INSERT INTO `permissions` VALUES ('13', '12', 'admin.role.create', '新增角色视图', '新增角色视图', '0', null, '1', '2016-09-20 04:55:56', '2016-09-20 04:55:56');
INSERT INTO `permissions` VALUES ('14', '12', 'admin.role.store', '新增角色操作', '新增角色操作', '0', null, '2', '2016-09-20 05:43:47', '2016-09-20 05:43:47');
INSERT INTO `permissions` VALUES ('15', '12', 'admin.role.edit', '编辑角色视图', '编辑角色视图', '0', null, '3', '2016-09-20 05:45:12', '2016-09-20 05:45:12');
INSERT INTO `permissions` VALUES ('16', '12', 'admin.role.update', '编辑角色操作', '编辑角色操作', '0', null, '4', '2016-09-20 05:46:43', '2016-09-20 05:46:43');
INSERT INTO `permissions` VALUES ('17', '12', 'admin.role.show', '角色权限视图', '角色权限视图', '0', null, '5', '2016-09-20 05:47:42', '2016-09-20 05:47:42');
INSERT INTO `permissions` VALUES ('18', '12', 'admin.role.permission', '角色权限操作', '角色权限操作', '0', null, '6', '2016-09-20 05:49:27', '2016-09-20 05:49:27');
INSERT INTO `permissions` VALUES ('19', '12', 'admin.role.destroy', '角色删除', '角色删除', '0', null, '7', '2016-09-20 06:00:57', '2016-09-20 06:00:57');
INSERT INTO `permissions` VALUES ('20', '2', 'admin.permission.index', '权限列表', '权限列表', '1', null, '3', '2016-09-20 05:53:16', '2016-09-20 05:53:16');
INSERT INTO `permissions` VALUES ('21', '20', 'admin.permission.create', '新增权限视图', '新增权限视图', '0', null, '1', '2016-09-20 05:53:46', '2016-09-20 05:53:46');
INSERT INTO `permissions` VALUES ('22', '20', 'admin.permission.store', '新增权限操作', '新增权限操作', '0', null, '2', '2016-09-20 05:54:18', '2016-09-20 05:54:18');
INSERT INTO `permissions` VALUES ('23', '20', 'admin.permission.edit', '编辑权限视图', '编辑权限视图', '0', null, '3', '2016-09-20 05:54:40', '2016-09-20 05:54:40');
INSERT INTO `permissions` VALUES ('24', '20', 'admin.permission.update', '编辑权限操作', '编辑权限操作', '0', null, '4', '2016-09-20 06:06:27', '2016-09-20 06:06:27');
INSERT INTO `permissions` VALUES ('25', '20', 'admin.permission.destroy', '权限删除', '权限删除', '0', null, '7', '2016-09-20 06:07:02', '2016-09-20 06:07:02');
INSERT INTO `permissions` VALUES ('26', '0', 'admin.system.manage', '系统管理', '系统管理', '1', 'fa fa-gear', '4', '2016-09-20 14:28:30', '2016-09-20 15:08:40');
INSERT INTO `permissions` VALUES ('27', '0', 'admin.article.manage', '文章管理', '文章管理', '1', 'fa fa-file-text', '3', '2016-09-20 14:43:37', '2016-09-20 15:08:58');
INSERT INTO `permissions` VALUES ('28', '27', 'admin.category.index', '分类列表', '分类列表', '1', null, '1', '2016-09-20 15:03:56', '2016-09-20 15:03:56');
INSERT INTO `permissions` VALUES ('29', '27', 'admin.article.index', '文章列表', '文章列表', '1', null, '3', '2016-09-20 15:05:10', '2016-09-23 08:48:35');
INSERT INTO `permissions` VALUES ('30', '0', 'admin.website.manage', '网站管理', '网站管理', '1', 'fa fa-windows', '2', '2016-09-20 15:07:58', '2016-09-20 15:07:58');
INSERT INTO `permissions` VALUES ('31', '30', 'admin.config.index', '基本配置', '基本配置', '1', '', '1', '2016-09-20 15:10:36', '2016-09-20 15:10:36');
INSERT INTO `permissions` VALUES ('32', '28', 'admin.category.create', '新增分类视图', '新增分类视图', '0', null, '1', '2016-09-22 05:39:40', '2016-09-22 05:41:31');
INSERT INTO `permissions` VALUES ('33', '28', 'admin.category.store', '新增分类操作', '新增分类操作', '0', null, '2', '2016-09-22 05:41:13', '2016-09-22 05:41:13');
INSERT INTO `permissions` VALUES ('34', '28', 'admin.category.edit', '编辑分类视图', '编辑分类视图', '0', null, '3', '2016-09-22 05:42:57', '2016-09-22 05:42:57');
INSERT INTO `permissions` VALUES ('35', '28', 'admin.category.update', '编辑分类操作', '编辑分类操作', '0', null, '4', '2016-09-22 05:44:12', '2016-09-22 05:44:12');
INSERT INTO `permissions` VALUES ('36', '28', 'admin.category.destroy', '分类删除', '分类删除', '0', null, '5', '2016-09-22 05:44:56', '2016-09-22 05:44:56');
INSERT INTO `permissions` VALUES ('37', '29', 'admin.article.create', '新增文章视图', '新增文章视图', '0', null, '1', '2016-09-23 08:42:02', '2016-09-23 08:42:02');
INSERT INTO `permissions` VALUES ('38', '29', 'admin.article.store', '新增文章操作', '新增文章操作', '0', null, '2', '2016-09-23 08:42:54', '2016-09-23 08:42:54');
INSERT INTO `permissions` VALUES ('39', '29', 'admin.article.edit', '编辑文章视图', '编辑文章视图', '0', null, '3', '2016-09-23 08:44:21', '2016-09-23 08:44:21');
INSERT INTO `permissions` VALUES ('40', '29', 'admin.article.update', '编辑文章操作', '编辑文章操作', '0', null, '4', '2016-09-23 08:45:26', '2016-09-23 08:45:26');
INSERT INTO `permissions` VALUES ('41', '29', 'admin.article.destroy', '文章删除', '文章删除', '0', null, '1', '2016-09-23 08:46:22', '2016-09-23 08:46:22');
INSERT INTO `permissions` VALUES ('42', '0', 'admin.recover.manage', '资源管理', '资源管理', '1', 'fa fa-institution alias', '2', '2017-01-12 03:01:37', '2017-01-12 03:01:37');
INSERT INTO `permissions` VALUES ('43', '42', 'admin.recover.category.index', '资源分类列表', '资源分类资源分类列表', '1', null, '1', '2017-01-12 03:09:51', '2017-01-12 03:28:21');
INSERT INTO `permissions` VALUES ('44', '42', 'admin.recover.index', '资源列表', '资源列表', '1', null, '2', '2017-01-12 03:16:09', '2017-01-12 03:16:09');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('1', '3');
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('2', '3');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('3', '3');
INSERT INTO `permission_role` VALUES ('4', '1');
INSERT INTO `permission_role` VALUES ('4', '3');
INSERT INTO `permission_role` VALUES ('5', '1');
INSERT INTO `permission_role` VALUES ('6', '1');
INSERT INTO `permission_role` VALUES ('7', '1');
INSERT INTO `permission_role` VALUES ('8', '1');
INSERT INTO `permission_role` VALUES ('9', '1');
INSERT INTO `permission_role` VALUES ('10', '1');
INSERT INTO `permission_role` VALUES ('11', '1');
INSERT INTO `permission_role` VALUES ('12', '1');
INSERT INTO `permission_role` VALUES ('12', '3');
INSERT INTO `permission_role` VALUES ('13', '1');
INSERT INTO `permission_role` VALUES ('14', '1');
INSERT INTO `permission_role` VALUES ('15', '1');
INSERT INTO `permission_role` VALUES ('16', '1');
INSERT INTO `permission_role` VALUES ('17', '1');
INSERT INTO `permission_role` VALUES ('18', '1');
INSERT INTO `permission_role` VALUES ('19', '1');
INSERT INTO `permission_role` VALUES ('20', '1');
INSERT INTO `permission_role` VALUES ('21', '1');
INSERT INTO `permission_role` VALUES ('22', '1');
INSERT INTO `permission_role` VALUES ('23', '1');
INSERT INTO `permission_role` VALUES ('24', '1');
INSERT INTO `permission_role` VALUES ('25', '1');
INSERT INTO `permission_role` VALUES ('27', '1');
INSERT INTO `permission_role` VALUES ('28', '1');
INSERT INTO `permission_role` VALUES ('29', '1');
INSERT INTO `permission_role` VALUES ('30', '1');
INSERT INTO `permission_role` VALUES ('31', '1');
INSERT INTO `permission_role` VALUES ('32', '1');
INSERT INTO `permission_role` VALUES ('33', '1');
INSERT INTO `permission_role` VALUES ('34', '1');
INSERT INTO `permission_role` VALUES ('35', '1');
INSERT INTO `permission_role` VALUES ('36', '1');
INSERT INTO `permission_role` VALUES ('37', '1');
INSERT INTO `permission_role` VALUES ('38', '1');
INSERT INTO `permission_role` VALUES ('39', '1');
INSERT INTO `permission_role` VALUES ('40', '1');
INSERT INTO `permission_role` VALUES ('41', '1');
INSERT INTO `permission_role` VALUES ('42', '1');
INSERT INTO `permission_role` VALUES ('43', '1');
INSERT INTO `permission_role` VALUES ('44', '1');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '超级管理员', '系统的管理员', '2016-09-16 15:59:50', '2016-09-16 15:59:54');
INSERT INTO `roles` VALUES ('3', 'demo', '测试', '测试', '2016-09-19 05:38:24', '2016-09-20 06:08:48');
INSERT INTO `roles` VALUES ('6', 'test555', 'test555', 'test55', '2016-09-22 05:27:36', '2016-09-22 05:28:14');
INSERT INTO `roles` VALUES ('7', '555', '5555', '5555', '2016-09-23 07:31:56', '2016-09-23 07:31:56');
INSERT INTO `roles` VALUES ('8', '9999', '9999', '9999', '2016-09-23 07:42:49', '2016-09-23 07:42:49');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('3', '1');
INSERT INTO `role_user` VALUES ('3', '3');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$uyMqZp3BjFHKvf.mxhIQfOPoppPaZZ5N0FxfIMJALtxAhJbD5xed6', 'ZrmVsZKJLIUFcQumD1cM1Ptb4dUVsweyLe6pritFFCtmJNB81gpEpoa7Rcoi', '2016-09-01 08:17:57', '2017-01-11 10:35:00');
INSERT INTO `users` VALUES ('3', 'demo', 'demo@demo.com', '$2y$10$nvd0j6ZlGrX9q9SdLg/dZeN8iYUpezixZtPdmfkTVDeZZFyLmYFDa', 'V1q5m5bpjy8azgRVvJoeHzF55uiHYdp0OCJsOm1Bi7KyMkQEcqha6E7tLGIq', '2016-09-20 03:22:26', '2016-09-20 06:51:35');
INSERT INTO `users` VALUES ('4', 'test', 'test@test.com', '$2y$10$m8ophfQ7FFpdmP1Xc2UVau/IEp31Zgg8trJLYomeUngWWJGMdZ5JO', null, '2016-09-20 07:15:42', '2016-09-20 07:15:42');
INSERT INTO `users` VALUES ('5', 'test44', 'test44@test.com', '$2y$10$9zrWnAH.LhK2RiDbYy1AGO3zcpSRzQpGAiBEItWhl3T/H0sET5KyS', null, '2016-09-22 05:21:27', '2016-09-22 05:21:27');
INSERT INTO `users` VALUES ('6', 'test55', 'test55@admin.com', '$2y$10$4dUW.wEcYAOqL9ZhhvVQIeyXH4H/B.IO4Slut5lcyemlzclI7H4bW', null, '2016-09-22 05:25:46', '2016-09-22 05:25:46');
