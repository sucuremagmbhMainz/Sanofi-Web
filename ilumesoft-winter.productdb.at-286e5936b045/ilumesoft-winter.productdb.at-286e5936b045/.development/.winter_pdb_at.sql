# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: golive_winter_pdb_at
# Generation Time: 2022-06-14 10:49:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table backend_access_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_access_log`;

CREATE TABLE `backend_access_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_access_log` WRITE;
/*!40000 ALTER TABLE `backend_access_log` DISABLE KEYS */;

INSERT INTO `backend_access_log` (`id`, `user_id`, `ip_address`, `created_at`, `updated_at`)
VALUES
	(1,1,'::1','2022-06-13 14:26:14','2022-06-13 14:26:14');

/*!40000 ALTER TABLE `backend_access_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_user_groups`;

CREATE TABLE `backend_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_new_user_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_unique` (`name`),
  KEY `code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_user_groups` WRITE;
/*!40000 ALTER TABLE `backend_user_groups` DISABLE KEYS */;

INSERT INTO `backend_user_groups` (`id`, `name`, `created_at`, `updated_at`, `code`, `description`, `is_new_user_default`)
VALUES
	(1,'Owners','2021-11-26 07:57:03','2021-11-26 07:57:03','owners','Default group for website owners.',0);

/*!40000 ALTER TABLE `backend_user_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_user_preferences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_user_preferences`;

CREATE TABLE `backend_user_preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `namespace` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `user_item_index` (`user_id`,`namespace`,`group`,`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_user_preferences` WRITE;
/*!40000 ALTER TABLE `backend_user_preferences` DISABLE KEYS */;

INSERT INTO `backend_user_preferences` (`id`, `user_id`, `namespace`, `group`, `item`, `value`)
VALUES
	(1,1,'backend','backend','preferences','{\"locale\":\"de\",\"fallback_locale\":\"en\",\"timezone\":\"UTC\",\"editor_font_size\":\"12\",\"editor_word_wrap\":\"fluid\",\"editor_code_folding\":\"manual\",\"editor_tab_size\":\"4\",\"editor_theme\":\"twilight\",\"editor_show_invisibles\":\"0\",\"editor_highlight_active_line\":\"1\",\"editor_use_hard_tabs\":\"0\",\"editor_show_gutter\":\"1\",\"editor_auto_closing\":\"0\",\"editor_autocompletion\":\"manual\",\"editor_enable_snippets\":\"0\",\"editor_display_indent_guides\":\"0\",\"editor_show_print_margin\":\"0\",\"user_id\":1}'),
	(2,1,'backend','reportwidgets','dashboard','{\"welcome\":{\"class\":\"Backend\\\\ReportWidgets\\\\Welcome\",\"sortOrder\":50,\"configuration\":{\"ocWidgetWidth\":7}},\"systemStatus\":{\"class\":\"System\\\\ReportWidgets\\\\Status\",\"sortOrder\":60,\"configuration\":{\"ocWidgetWidth\":7}},\"activeTheme\":{\"class\":\"Cms\\\\ReportWidgets\\\\ActiveTheme\",\"sortOrder\":70,\"configuration\":{\"ocWidgetWidth\":5}},\"report_container_dashboard_4\":{\"class\":\"Romanov\\\\ClearCacheWidget\\\\ReportWidgets\\\\ClearCache\",\"configuration\":{\"title\":\"romanov.clearcachewidget::lang.plugin.label\",\"radius\":\"200\",\"delthumbs\":false,\"ocWidgetWidth\":\"12\"},\"sortOrder\":71}}');

/*!40000 ALTER TABLE `backend_user_preferences` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_user_roles`;

CREATE TABLE `backend_user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_unique` (`name`),
  KEY `role_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_user_roles` WRITE;
/*!40000 ALTER TABLE `backend_user_roles` DISABLE KEYS */;

INSERT INTO `backend_user_roles` (`id`, `name`, `code`, `description`, `permissions`, `is_system`, `created_at`, `updated_at`)
VALUES
	(2,'Developer','developer','Site administrator with access to developer tools.','',1,'2021-11-26 07:57:03','2021-11-26 07:57:03'),
	(3,'Editor-Full','editor-publisher','Editor Role for PDB data (reference data + product data) and also Microsites','{\"cms.manage_themes\":\"1\",\"rainlab.pages.manage_pages\":\"1\",\"rainlab.pages.manage_menus\":\"1\",\"sanofi.pdb.area\":\"1\",\"sanofi.pdb.ingredients\":\"1\",\"sanofi.pdb.products\":\"1\",\"utopigs.seo.manage\":\"1\",\"utopigs.seo.sitemap\":\"1\",\"media.manage_media\":\"1\"}',0,'2022-02-02 17:11:07','2022-03-08 10:29:38'),
	(4,'Editor-PDB-Only','editor-pdb','Editor Role for PDB data (reference data + product data) only','{\"sanofi.pdb.area\":\"1\",\"sanofi.pdb.ingredients\":\"1\",\"sanofi.pdb.products\":\"1\",\"media.manage_media\":\"1\"}',0,'2022-02-02 18:26:07','2022-02-02 20:18:11');

/*!40000 ALTER TABLE `backend_user_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_user_throttle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_user_throttle`;

CREATE TABLE `backend_user_throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `is_suspended` tinyint(1) NOT NULL DEFAULT '0',
  `suspended_at` timestamp NULL DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `backend_user_throttle_user_id_index` (`user_id`),
  KEY `backend_user_throttle_ip_address_index` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_user_throttle` WRITE;
/*!40000 ALTER TABLE `backend_user_throttle` DISABLE KEYS */;

INSERT INTO `backend_user_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `last_attempt_at`, `is_suspended`, `suspended_at`, `is_banned`, `banned_at`)
VALUES
	(1,1,'::1',0,NULL,0,NULL,0,NULL);

/*!40000 ALTER TABLE `backend_user_throttle` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_users`;

CREATE TABLE `backend_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persist_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_unique` (`login`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `act_code_index` (`activation_code`),
  KEY `reset_code_index` (`reset_password_code`),
  KEY `admin_role_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_users` WRITE;
/*!40000 ALTER TABLE `backend_users` DISABLE KEYS */;

INSERT INTO `backend_users` (`id`, `first_name`, `last_name`, `login`, `email`, `password`, `activation_code`, `persist_code`, `reset_password_code`, `permissions`, `is_activated`, `role_id`, `activated_at`, `last_login`, `created_at`, `updated_at`, `deleted_at`, `is_superuser`)
VALUES
	(1,'Admin','Person','udomin','admin@ilume.de','$2y$10$AD6VuzFTlh/zAMfx/Srk6Omv3/IPXkZwRAawYZNLv8baUAZ0WL35.',NULL,'$2y$10$OY2.tnyPyLQ/Q0RRRpB6.OUBPVd7tMU1rU0CqnF05WDUdlOjY7VFO',NULL,'',1,2,NULL,'2022-06-13 14:26:14','2021-11-26 07:57:03','2022-06-13 14:26:14',NULL,1),
	(2,'Bettina','Himmler','bettina.h','bettina.himmler@sanofi.com','$2y$10$yDBEbmpn/9q9EDs672bwVuNBs1mbCrINvJ7cBwh.JWQlEvrcSSsPe',NULL,'$2y$10$1gddXUDErLdL00iwzbzRPeX7ocVxkJ3dAcf2FvJNfTYbpBRlG3bfS',NULL,'',0,3,NULL,'2022-06-03 07:15:10','2022-01-18 09:49:04','2022-06-03 07:15:10',NULL,0),
	(3,'Katayoun','Myhankhah','katayoun.m','Katayoun.Myhankhah@sanofi.com','$2y$10$DvyA2X8t05FDOXAbUXbQ0ulqL34GghzcDWNPEuriJTt2Aj1odTUG.',NULL,NULL,NULL,'',0,4,NULL,'2022-03-03 14:44:12','2022-02-02 18:25:11','2022-03-03 14:44:28',NULL,0),
	(4,'Birgit','Kirnbauer','birgit.k','birgit.kirnbauer@sanofi.com','$2y$10$crM3zg/jJnsAa2HGt8DqceB350rMuLEgZ8Seqqh3OdAdTqEPeyMOK',NULL,'$2y$10$I.kJjQLLoisd4BHoibZ.k.mZEmehRwTCOaGw.GwxFqA8dzZ2Ug6US',NULL,'',0,3,NULL,'2022-02-28 16:09:32','2022-02-28 16:04:03','2022-02-28 16:09:32',NULL,0),
	(5,'Thorsten','Hufen','thorsten.h','thorsten.hufen@ilume.de','$2y$10$VyCtJLfdCBVN8uhqvceYWOj2FXGiNktWIXIeDntQlHSlsp/2aIQdm',NULL,NULL,NULL,'',0,3,NULL,'2022-03-03 13:36:35','2022-03-03 13:14:56','2022-03-08 10:28:38',NULL,0);

/*!40000 ALTER TABLE `backend_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table backend_users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backend_users_groups`;

CREATE TABLE `backend_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `backend_users_groups` WRITE;
/*!40000 ALTER TABLE `backend_users_groups` DISABLE KEYS */;

INSERT INTO `backend_users_groups` (`user_id`, `user_group_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `backend_users_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cms_theme_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_theme_data`;

CREATE TABLE `cms_theme_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_theme_data_theme_index` (`theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cms_theme_data` WRITE;
/*!40000 ALTER TABLE `cms_theme_data` DISABLE KEYS */;

INSERT INTO `cms_theme_data` (`id`, `theme`, `data`, `created_at`, `updated_at`)
VALUES
	(1,'pdb-theme-at','{\"site_name\":\"SANOFI Produktdatenbank\",\"site_author\":\"Sanofi\",\"site_url\":\"https:\\/\\/www.sanofi-produktdatenbank.at\\/\",\"site_description\":\"SANOFI Produktdatenbank\",\"site_keywords\":\"Sanofi,Produktdatenbank\",\"site_locale\":\"de\",\"fonts_googlefonts\":\"1\",\"fonts_google_fontfamily\":\"Raleway:100,600|Lato:300,400,900\",\"fonts_first_font\":\"\'Lato\', sans-serif\",\"fonts_second_font\":\"\'Raleway\', sans-serif\",\"fonts_fontawesome\":\"1\",\"fonts_lineicons\":\"1\",\"layout_container\":\"container\",\"header_menu_type\":\"logo\",\"header_menu_color\":\"theme\",\"header_menu_bg_color\":\"#f44336\",\"header_menu_text_color_base\":\"#9c27b0\",\"header_menu_text_color_hover\":\"#2196f3\",\"header_menu_text_color_select\":\"#cddc39\",\"footer_menu_color\":\"theme\",\"footer_menu_bg_color\":\"default-theme\",\"footer_menu_text_color_base\":\"default-theme\",\"footer_menu_text_color_hover\":\"default-theme\",\"scrolltop_js\":\"1\",\"scrolltop_js_form\":\"squared\",\"scrolltop_color\":\"theme\",\"scrolltop_primary_color\":\"#ffc107\",\"scrolltop_secondary_color\":\"#ffc107\",\"scrolltop_icon_color\":\"#ffc107\",\"settings_social\":\"1\",\"settings_disqus\":\"0\",\"animate_css\":\"0\",\"aos_js\":\"0\",\"normalize_css\":\"0\",\"smoothscroll_js\":\"0\",\"loader_js\":\"1\",\"framework_js\":\"1\",\"styles_theme_color\":\"blue\",\"styles_primary_color\":\"#ffc107\",\"styles_secondary_color\":\"#ffc107\",\"layout_container_width\":null,\"header_menu_logo\":\"\",\"header_menu_text\":\"\",\"settings_pageheader_active\":\"0\",\"settings_pageheader\":\"\\/sanofi-logo.png\",\"settings_pageheader_url\":\"https:\\/\\/www.sanofi.at\",\"footer_text\":\"Copyright \\u00a9 2022 sanofi-aventis GmbH, \\u00d6sterreich. Alle Rechte vorbehalten. MAT-AT-2200443 \\u2013 1.0 \\u2013 04\\/2022.\",\"footer_brand_image\":\"\",\"settings_favicon\":\"\\/general\\/favicon.png\",\"settings_disqus_url\":\"\",\"twitter_active\":\"0\",\"twitter_site\":\"\",\"twitter_creator\":\"\",\"custom_css\":\"\",\"custom_js\":\"\"}','2021-11-30 11:16:03','2022-06-09 13:24:55');

/*!40000 ALTER TABLE `cms_theme_data` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_theme_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_theme_logs`;

CREATE TABLE `cms_theme_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `old_content` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_theme_logs_type_index` (`type`),
  KEY `cms_theme_logs_theme_index` (`theme`),
  KEY `cms_theme_logs_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cms_theme_templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_theme_templates`;

CREATE TABLE `cms_theme_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(10) unsigned NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cms_theme_templates_source_index` (`source`),
  KEY `cms_theme_templates_path_index` (`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table deferred_bindings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deferred_bindings`;

CREATE TABLE `deferred_bindings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `master_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slave_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slave_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pivot_data` mediumtext COLLATE utf8mb4_unicode_ci,
  `session_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bind` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deferred_bindings_master_type_index` (`master_type`),
  KEY `deferred_bindings_master_field_index` (`master_field`),
  KEY `deferred_bindings_slave_type_index` (`slave_type`),
  KEY `deferred_bindings_slave_id_index` (`slave_id`),
  KEY `deferred_bindings_session_key_index` (`session_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `deferred_bindings` WRITE;
/*!40000 ALTER TABLE `deferred_bindings` DISABLE KEYS */;

INSERT INTO `deferred_bindings` (`id`, `master_type`, `master_field`, `slave_type`, `slave_id`, `pivot_data`, `session_key`, `is_bind`, `created_at`, `updated_at`)
VALUES
	(1,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','3',NULL,'ThnTFO22SzVpTOOC4IYxHdskJPm66EYN1tsvf9Lk',1,'2021-12-22 10:36:22','2021-12-22 10:36:22'),
	(2,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','4',NULL,'uqySwuOOtD8nrzHMjkKbNK6axpoVZDtjrY35G7TT',1,'2021-12-22 10:38:42','2021-12-22 10:38:42'),
	(3,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','5',NULL,'7JjKhXNVdrx0iz5RyQHnaYmIrfVoOzClxanRpCaT',1,'2021-12-22 10:39:41','2021-12-22 10:39:41'),
	(4,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','17',NULL,'NE6NCz2rYHvuH65G2mq2zW469Cdr8pNQrX2OakQt',1,'2021-12-22 10:45:56','2021-12-22 10:45:56'),
	(5,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','18',NULL,'NE6NCz2rYHvuH65G2mq2zW469Cdr8pNQrX2OakQt',1,'2021-12-22 10:46:12','2021-12-22 10:46:12'),
	(6,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','19',NULL,'NE6NCz2rYHvuH65G2mq2zW469Cdr8pNQrX2OakQt',1,'2021-12-22 10:47:04','2021-12-22 10:47:04'),
	(7,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','20',NULL,'NE6NCz2rYHvuH65G2mq2zW469Cdr8pNQrX2OakQt',1,'2021-12-22 10:49:06','2021-12-22 10:49:06'),
	(8,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','21',NULL,'NE6NCz2rYHvuH65G2mq2zW469Cdr8pNQrX2OakQt',1,'2021-12-22 10:49:42','2021-12-22 10:49:42'),
	(9,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','22',NULL,'3Hdjm47HWlXRHddkCOyYhuFYTvYW5VaoBXmtR46U',1,'2021-12-22 10:51:23','2021-12-22 10:51:23'),
	(10,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','23',NULL,'3Hdjm47HWlXRHddkCOyYhuFYTvYW5VaoBXmtR46U',1,'2021-12-22 10:51:53','2021-12-22 10:51:53'),
	(11,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','24',NULL,'3Hdjm47HWlXRHddkCOyYhuFYTvYW5VaoBXmtR46U',1,'2021-12-22 10:52:15','2021-12-22 10:52:15'),
	(12,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','25',NULL,'3Hdjm47HWlXRHddkCOyYhuFYTvYW5VaoBXmtR46U',1,'2021-12-22 10:52:48','2021-12-22 10:52:48'),
	(13,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','26',NULL,'ywtWd0XajYZsx6OVkOWCGX6MavCDKdTL0GxKUYri',1,'2021-12-22 10:53:20','2021-12-22 10:53:20'),
	(14,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','27',NULL,'ywtWd0XajYZsx6OVkOWCGX6MavCDKdTL0GxKUYri',1,'2021-12-22 10:53:25','2021-12-22 10:53:25'),
	(15,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','28',NULL,'TPIsOwn49HFkMVJnjqnukai3rsdB7kpbB9RiRN2L',1,'2021-12-22 10:54:39','2021-12-22 10:54:39'),
	(16,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','29',NULL,'s2DFmJVEZaBjESj9J8619NwolI3zdA6sws9JLVJY',1,'2021-12-22 10:56:00','2021-12-22 10:56:00'),
	(17,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','30',NULL,'s2DFmJVEZaBjESj9J8619NwolI3zdA6sws9JLVJY',1,'2021-12-22 10:57:38','2021-12-22 10:57:38'),
	(18,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','31',NULL,'G0ZekxtluRZozCkfdRWyaN0KwXooOzZhXJT8ssiI',1,'2021-12-22 10:58:40','2021-12-22 10:58:40'),
	(19,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','30',NULL,'sBh4qmE5VMmQVjcnliaybQiWhXZOouruVTGezWdB',0,'2021-12-22 11:02:24','2021-12-22 11:02:24'),
	(20,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','30',NULL,'BMpqI6LXY5foKHQTsdQbRuN2uG4c3gtdxjGorJYw',0,'2021-12-22 11:02:40','2021-12-22 11:02:40'),
	(21,'Sanofi\\Pdb\\Models\\PDBProductVariant','sizes','Sanofi\\Pdb\\Models\\PDBProductVariantSize','30',NULL,'80LVHOTzix9aQlNEjygxq7ccltnf46SJhFYb5Gnv',0,'2021-12-22 11:03:30','2021-12-22 11:03:30'),
	(22,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','1',NULL,'A9JIhel9pB8VRHpm2F065SmvNSYEVQMHZf9Wfp0b',1,'2021-12-22 15:56:57','2021-12-22 15:56:57'),
	(29,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','5',NULL,'LV6ywdAKGYKa8ZdNu0bqa6AFjvF4ou6XyEHk8G4V',1,'2021-12-22 15:58:42','2021-12-22 15:58:42'),
	(32,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','7',NULL,'tTWQGQO0D6FgHCudLH1QbtZqwZxLx1sk3UH9O2H0',0,'2021-12-22 16:05:24','2021-12-22 16:05:24'),
	(46,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','16',NULL,'UN2v3VllgCVAndRhdfS8s9wQdBIDvApoBQZhT30H',0,'2021-12-22 16:28:58','2021-12-22 16:28:58'),
	(47,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','17',NULL,'UN2v3VllgCVAndRhdfS8s9wQdBIDvApoBQZhT30H',1,'2021-12-22 16:29:03','2021-12-22 16:29:03'),
	(48,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','16',NULL,'SZ7F9i3LjckAg3wVkCTxRJnahkrl84w6CuTWarS9',0,'2021-12-22 16:32:41','2021-12-22 16:32:41'),
	(49,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','16',NULL,'QRAXxejHk5cPkN11aOb1xn6caJwkYtpURpT7pcwc',0,'2021-12-22 16:35:09','2021-12-22 16:35:09'),
	(54,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','21',NULL,'fneRVsqX6CGGYYxtI1orO9UJX1NQ4hle0n14xkE4',1,'2021-12-22 16:50:46','2021-12-22 16:50:46'),
	(56,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','23',NULL,'V6MTeUK2QLk23V8xGeJHd8iosGD9Kpeo5R4UHJ0Z',1,'2021-12-22 16:51:18','2021-12-22 16:51:18'),
	(58,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','25',NULL,'qyQW8u1qG13jktC0f1DtBIR8B75QEI4aSvPMikWo',1,'2021-12-22 16:55:21','2021-12-22 16:55:21'),
	(59,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','26',NULL,'teot3TiYiNrh1DrsZMEREYTVPhqeUvfPtqE9UTsT',1,'2021-12-22 16:55:55','2021-12-22 16:55:55'),
	(60,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','27',NULL,'bQ58LiPOCwDWgiOBLWoUCi921Gd6em6NTnIqyKng',1,'2021-12-22 17:08:23','2021-12-22 17:08:23'),
	(61,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','28',NULL,'T0LmMoV9jcwdruybhqIYpdz5hxQIdwOpVROJbgYi',1,'2021-12-22 17:16:38','2021-12-22 17:16:38'),
	(62,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','29',NULL,'DLn7G889jelUPAhVZ94nG3DsO3Xt5xpulNc3HRdU',1,'2021-12-22 17:23:13','2021-12-22 17:23:13'),
	(63,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','30',NULL,'zGQ0QOqoKMPS7H0rJom8Q6GpTZBVhebq0PE4Hf2k',1,'2021-12-22 17:24:22','2021-12-22 17:24:22'),
	(64,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','31',NULL,'zGQ0QOqoKMPS7H0rJom8Q6GpTZBVhebq0PE4Hf2k',1,'2021-12-22 17:24:26','2021-12-22 17:24:26'),
	(65,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','32',NULL,'zGQ0QOqoKMPS7H0rJom8Q6GpTZBVhebq0PE4Hf2k',1,'2021-12-22 17:24:35','2021-12-22 17:24:35'),
	(66,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_technical','System\\Models\\File','33',NULL,'zGQ0QOqoKMPS7H0rJom8Q6GpTZBVhebq0PE4Hf2k',1,'2021-12-22 17:24:38','2021-12-22 17:24:38'),
	(67,'Sanofi\\Pdb\\Models\\PDBProductVariant','pdf_use','System\\Models\\File','34',NULL,'zGQ0QOqoKMPS7H0rJom8Q6GpTZBVhebq0PE4Hf2k',1,'2021-12-22 17:24:42','2021-12-22 17:24:42'),
	(74,'Sanofi\\Pdb\\Models\\PDBProductVariant','img','System\\Models\\File','38',NULL,'67EuFN0TckMWAk8cfDNpCymy2N5kpIfxFPd69sZw',1,'2021-12-29 23:27:29','2021-12-29 23:27:29'),
	(75,'Sanofi\\Pdb\\Models\\PDBProduct','img','System\\Models\\File','1',NULL,'wUcaNtZyWqROyWAJdeLo2iZIMRd46prCVQ4j7dL0',1,'2021-12-30 10:04:20','2021-12-30 10:04:20'),
	(76,'Sanofi\\Pdb\\Models\\PDBProduct','img','System\\Models\\File','2',NULL,'IUWmYwjdoDEfLzwLSBtgrcLy27jJrN9ySnzYa6x0',1,'2021-12-30 10:04:32','2021-12-30 10:04:32'),
	(77,'Sanofi\\Pdb\\Models\\PDBProductVariant','img','System\\Models\\File','3',NULL,'8EF5ZzgEKnqpgEL0t0y5yUTwZVBw5NhL8MBOIYyT',1,'2021-12-30 10:05:46','2021-12-30 10:05:46'),
	(79,'Sanofi\\Pdb\\Models\\PDBProductVariant','img','System\\Models\\File','5',NULL,'hlv2Ka1B5KXqbowphDG6D4pn6nh8f6zlBbw1usjy',1,'2021-12-30 10:06:49','2021-12-30 10:06:49'),
	(80,'Sanofi\\Pdb\\Models\\PDBProductVariant','img','System\\Models\\File','6',NULL,'y5Mqb8bpEteS9uslRJ53DMgzfmJmO4JXl8VGnciZ',1,'2021-12-30 10:07:15','2021-12-30 10:07:15'),
	(81,'Sanofi\\Pdb\\Models\\PDBProductVariant','img','System\\Models\\File','7',NULL,'wjn8p4dWxNx1CaPfOlZmscX2jKp2haueOobXgB37',1,'2021-12-30 10:07:53','2021-12-30 10:07:53');

/*!40000 ALTER TABLE `deferred_bindings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci,
  `failed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table ilume_backend_rainlab_page_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ilume_backend_rainlab_page_revisions`;

CREATE TABLE `ilume_backend_rainlab_page_revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `revision_id` int(10) unsigned NOT NULL,
  `revision_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_editor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='CREATE TABLE `ilume_backend_rainlab_page_revisions` (\n  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\n  `page_id` int(10) unsigned NOT NULL,\n  `revision_id` int(10) unsigned NOT NULL,\n  `revision_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''',\n  `last_editor_id` int(10) unsigned NOT NULL,\n  `created_at` timestamp NULL DEFAULT NULL,\n  `updated_at` timestamp NULL DEFAULT NULL,\n  PRIMARY KEY (`id`)\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

LOCK TABLES `ilume_backend_rainlab_page_revisions` WRITE;
/*!40000 ALTER TABLE `ilume_backend_rainlab_page_revisions` DISABLE KEYS */;

INSERT INTO `ilume_backend_rainlab_page_revisions` (`id`, `page_id`, `revision_id`, `revision_name`, `last_editor_id`, `created_at`, `updated_at`)
VALUES
	(1,1,0,'Basis',2,'2022-01-12 15:12:35','2022-02-03 14:15:16'),
	(2,2,0,'Basis',1,'2022-01-17 15:02:45','2022-02-02 20:39:30'),
	(9,7,0,'Basis',2,'2022-02-02 19:07:36','2022-02-02 19:07:36'),
	(10,8,0,'Basis',2,'2022-02-02 19:08:50','2022-02-02 19:08:50'),
	(11,9,0,'Basis',1,'2022-02-02 20:24:08','2022-02-14 10:44:14'),
	(12,10,0,'Basis',4,'2022-02-28 16:13:57','2022-03-01 07:46:35'),
	(13,11,0,'Basis',4,'2022-03-01 07:50:46','2022-03-01 08:01:10');

/*!40000 ALTER TABLE `ilume_backend_rainlab_page_revisions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ilume_backend_rainlab_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ilume_backend_rainlab_pages`;

CREATE TABLE `ilume_backend_rainlab_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_ref` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `grant_group_access_to` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `current_revision_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ilume_backend_rainlab_pages` WRITE;
/*!40000 ALTER TABLE `ilume_backend_rainlab_pages` DISABLE KEYS */;

INSERT INTO `ilume_backend_rainlab_pages` (`id`, `page_ref`, `creator_id`, `grant_group_access_to`, `created_at`, `updated_at`, `current_revision_id`)
VALUES
	(1,'allenasal-microsite',1,'','2022-01-12 15:12:35','2022-02-03 14:15:16',0),
	(2,'bioflorin-microsite',1,'','2022-01-17 15:02:45','2022-02-02 20:39:30',0),
	(7,'testxy',2,'','2022-02-02 19:07:36','2022-02-02 19:07:36',0),
	(8,'xytest',2,'','2022-02-02 19:08:50','2022-02-02 19:08:50',0),
	(9,'impressum',1,'','2022-02-02 20:24:08','2022-02-14 10:44:14',0),
	(10,'essentiale',4,'','2022-02-28 16:13:57','2022-03-01 07:46:35',0),
	(11,'novalgin',4,'','2022-03-01 07:50:46','2022-03-01 08:01:10',0);

/*!40000 ALTER TABLE `ilume_backend_rainlab_pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ilume_backend_rainlab_pages_user_sort
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ilume_backend_rainlab_pages_user_sort`;

CREATE TABLE `ilume_backend_rainlab_pages_user_sort` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `revision_name` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2013_10_01_000001_Db_Deferred_Bindings',1),
	(2,'2013_10_01_000002_Db_System_Files',1),
	(3,'2013_10_01_000003_Db_System_Plugin_Versions',1),
	(4,'2013_10_01_000004_Db_System_Plugin_History',1),
	(5,'2013_10_01_000005_Db_System_Settings',1),
	(6,'2013_10_01_000006_Db_System_Parameters',1),
	(7,'2013_10_01_000007_Db_System_Add_Disabled_Flag',1),
	(8,'2013_10_01_000008_Db_System_Mail_Templates',1),
	(9,'2013_10_01_000009_Db_System_Mail_Layouts',1),
	(10,'2014_10_01_000010_Db_Jobs',1),
	(11,'2014_10_01_000011_Db_System_Event_Logs',1),
	(12,'2014_10_01_000012_Db_System_Request_Logs',1),
	(13,'2014_10_01_000013_Db_System_Sessions',1),
	(14,'2015_10_01_000014_Db_System_Mail_Layout_Rename',1),
	(15,'2015_10_01_000015_Db_System_Add_Frozen_Flag',1),
	(16,'2015_10_01_000016_Db_Cache',1),
	(17,'2015_10_01_000017_Db_System_Revisions',1),
	(18,'2015_10_01_000018_Db_FailedJobs',1),
	(19,'2016_10_01_000019_Db_System_Plugin_History_Detail_Text',1),
	(20,'2016_10_01_000020_Db_System_Timestamp_Fix',1),
	(21,'2017_08_04_121309_Db_Deferred_Bindings_Add_Index_Session',1),
	(22,'2017_10_01_000021_Db_System_Sessions_Update',1),
	(23,'2017_10_01_000022_Db_Jobs_FailedJobs_Update',1),
	(24,'2017_10_01_000023_Db_System_Mail_Partials',1),
	(25,'2017_10_23_000024_Db_System_Mail_Layouts_Add_Options_Field',1),
	(26,'2021_10_01_000025_Db_Add_Pivot_Data_To_Deferred_Bindings',1),
	(27,'2013_10_01_000001_Db_Backend_Users',2),
	(28,'2013_10_01_000002_Db_Backend_User_Groups',2),
	(29,'2013_10_01_000003_Db_Backend_Users_Groups',2),
	(30,'2013_10_01_000004_Db_Backend_User_Throttle',2),
	(31,'2014_01_04_000005_Db_Backend_User_Preferences',2),
	(32,'2014_10_01_000006_Db_Backend_Access_Log',2),
	(33,'2014_10_01_000007_Db_Backend_Add_Description_Field',2),
	(34,'2015_10_01_000008_Db_Backend_Add_Superuser_Flag',2),
	(35,'2016_10_01_000009_Db_Backend_Timestamp_Fix',2),
	(36,'2017_10_01_000010_Db_Backend_User_Roles',2),
	(37,'2018_12_16_000011_Db_Backend_Add_Deleted_At',2),
	(38,'2014_10_01_000001_Db_Cms_Theme_Data',3),
	(39,'2016_10_01_000002_Db_Cms_Timestamp_Fix',3),
	(40,'2017_10_01_000003_Db_Cms_Theme_Logs',3),
	(41,'2018_11_01_000001_Db_Cms_Theme_Templates',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rainlab_translate_attributes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rainlab_translate_attributes`;

CREATE TABLE `rainlab_translate_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_data` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `rainlab_translate_attributes_locale_index` (`locale`),
  KEY `rainlab_translate_attributes_model_id_index` (`model_id`),
  KEY `rainlab_translate_attributes_model_type_index` (`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table rainlab_translate_indexes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rainlab_translate_indexes`;

CREATE TABLE `rainlab_translate_indexes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `rainlab_translate_indexes_locale_index` (`locale`),
  KEY `rainlab_translate_indexes_model_id_index` (`model_id`),
  KEY `rainlab_translate_indexes_model_type_index` (`model_type`),
  KEY `rainlab_translate_indexes_item_index` (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table rainlab_translate_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rainlab_translate_locales`;

CREATE TABLE `rainlab_translate_locales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rainlab_translate_locales_code_index` (`code`),
  KEY `rainlab_translate_locales_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `rainlab_translate_locales` WRITE;
/*!40000 ALTER TABLE `rainlab_translate_locales` DISABLE KEYS */;

INSERT INTO `rainlab_translate_locales` (`id`, `code`, `name`, `is_default`, `is_enabled`, `sort_order`)
VALUES
	(1,'en','English',1,1,1);

/*!40000 ALTER TABLE `rainlab_translate_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rainlab_translate_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rainlab_translate_messages`;

CREATE TABLE `rainlab_translate_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_data` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `rainlab_translate_messages_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table rainlab_user_mail_blockers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rainlab_user_mail_blockers`;

CREATE TABLE `rainlab_user_mail_blockers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rainlab_user_mail_blockers_email_index` (`email`),
  KEY `rainlab_user_mail_blockers_template_index` (`template`),
  KEY `rainlab_user_mail_blockers_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sanofi_pdb_areas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_areas`;

CREATE TABLE `sanofi_pdb_areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_areas` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_areas` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_areas` (`id`, `name`, `is_active`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(6,'Husten, Erkältung',1,NULL,NULL,NULL),
	(14,'Schmerz',1,NULL,NULL,NULL),
	(17,'Verdauung',1,NULL,NULL,NULL),
	(28,'Gesunderhaltung der Venen; Venenleiden',1,NULL,NULL,NULL),
	(29,'Pilzerkrankungen der Nägel',1,NULL,NULL,NULL),
	(31,'Allergie',1,NULL,NULL,NULL),
	(32,'Schmerz; schmerzhafte Bauchkrämpfe',1,NULL,NULL,NULL),
	(35,'Muskel- und Rückenschmerzen',1,NULL,'2022-03-28 13:01:16',NULL),
	(37,'Halsschmerzen',1,NULL,NULL,NULL),
	(40,'Schnupfen',1,NULL,NULL,NULL),
	(41,'Lungenentfaltung',1,NULL,NULL,NULL),
	(42,'Allergie',1,NULL,NULL,NULL),
	(43,'Husten',1,NULL,NULL,NULL),
	(44,'Behandlung von Kopfschuppen',1,NULL,NULL,NULL),
	(50,'Stuhlweichmacher',1,NULL,NULL,NULL),
	(53,'Bauchschmerzen/Reizdarmsyndrom',1,NULL,NULL,NULL),
	(55,'Unterstützt einen gesunden Schlaf',1,NULL,NULL,NULL),
	(56,'Müdigkeit und Schwächegefühl',1,NULL,NULL,NULL),
	(61,'Verstopfung',1,NULL,NULL,NULL),
	(62,'Verstopfung, hartem Stuhl und Blähungen',1,NULL,NULL,NULL),
	(63,'Bauchschmerzen und -krämpfe',1,NULL,'2022-03-28 08:43:15',NULL),
	(64,'Lebererkrankungen',1,NULL,NULL,NULL),
	(65,'Für den Darm<sup>1</sup> und ein gesundes Immunsystem<sup>2</sup>',1,'2022-02-08 16:58:03','2022-02-09 17:25:06',NULL),
	(66,'Sodbrennen/Verdauung',1,'2022-03-28 13:17:00','2022-03-28 13:17:48',NULL),
	(67,'&nbsp;',1,'2022-05-12 09:50:52','2022-05-12 09:50:52',NULL);

/*!40000 ALTER TABLE `sanofi_pdb_areas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_ingredients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_ingredients`;

CREATE TABLE `sanofi_pdb_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sanofi_pdb_ingredients` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_ingredients` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_ingredients` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(15,'Fexofenadin-Hydrochlorid',NULL,NULL,NULL),
	(16,'Bromhexin-Hydrochlorid',NULL,NULL,NULL),
	(17,'Ibuprofen, Coffein',NULL,'2022-04-04 14:51:58',NULL),
	(23,'Ambroxol-Hydrochlorid',NULL,NULL,NULL),
	(25,'Clenbuterol-Hydrochlorid',NULL,NULL,NULL),
	(26,'Tramazolin-Hydrochlorid',NULL,NULL,NULL),
	(27,'Pentoxyverin-Citrat',NULL,NULL,NULL),
	(28,'Eibisch',NULL,'2022-03-31 13:44:44',NULL),
	(29,'Honig',NULL,NULL,NULL),
	(66,'Hyoscin-N-butylbromid',NULL,'2022-03-31 14:15:12',NULL),
	(67,'Paracetamol, Coffein',NULL,'2022-04-04 14:52:22',NULL),
	(70,'Metamizol-Natrium',NULL,NULL,NULL),
	(72,'Acetylsalicylsäure',NULL,NULL,NULL),
	(90,'Bisacodyl',NULL,NULL,NULL),
	(91,'Natriumpicosulfat',NULL,NULL,NULL),
	(105,'Rotes Weinlaub-Extrakt',NULL,NULL,NULL),
	(107,'Ciclopirox',NULL,NULL,NULL),
	(108,'Vitamine, Mineralstoffe, Spurenelemente',NULL,'2022-03-31 13:10:11',NULL),
	(109,'Mineralien',NULL,NULL,NULL),
	(110,'Spurenelemente',NULL,NULL,NULL),
	(111,'Ginseng G115',NULL,'2022-03-16 09:29:48',NULL),
	(132,'Selendisulfid',NULL,NULL,NULL),
	(134,'Coffein',NULL,NULL,NULL),
	(136,'Nikotinsäure-β butoxyethylester',NULL,NULL,NULL),
	(137,'Nonylvanillamid',NULL,NULL,NULL),
	(142,'Macrogol',NULL,'2022-03-28 09:35:49',NULL),
	(144,'Spitzwegerich',NULL,NULL,NULL),
	(145,'Thymian',NULL,NULL,NULL),
	(149,'Passionsblumenkraut (Passiflora incarnata)',NULL,'2022-03-28 14:02:15','2022-03-28 14:02:15'),
	(150,'Zitronenmelisse',NULL,'2022-03-28 14:02:15','2022-03-28 14:02:15'),
	(151,'Kalif. Mohn, Passionsblume, Zitronenmelisse',NULL,'2022-03-28 14:01:03',NULL),
	(152,'Vitamin B6',NULL,'2022-03-28 14:02:15','2022-03-28 14:02:15'),
	(153,'Melatonin, Kalifornischer Mohn, Passionsblume, Zitronenmelisse',NULL,'2022-03-28 14:07:44',NULL),
	(154,'Pfefferminzöl',NULL,'2022-03-28 08:34:17',NULL),
	(158,'Simethicon',NULL,NULL,NULL),
	(159,'Algeldrat, Magnesiumhydroxid',NULL,'2022-03-28 13:17:21',NULL),
	(160,'Phospholipide aus Sojabohnen',NULL,NULL,NULL),
	(161,'Saccharomyces boulardii, Vitamine, Fructooligosaccharide (neue Rezeptur)','2022-02-08 16:58:28','2022-04-29 07:27:07',NULL),
	(162,'Fructooligosaccharide und Vitamine (A, D, B6, B9, B12)','2022-02-08 16:58:34','2022-02-09 17:25:22',NULL),
	(163,'S. boulardii','2022-03-16 09:21:44','2022-03-16 09:22:28','2022-03-16 09:22:28'),
	(164,'Akazien- und Xanthangummi, Glycerol','2022-03-16 09:26:41','2022-03-18 10:12:59',NULL),
	(165,'Paracetmol','2022-04-26 10:08:12','2022-04-26 10:08:12',NULL);

/*!40000 ALTER TABLE `sanofi_pdb_ingredients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_live_product_variant_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_live_product_variant_type`;

CREATE TABLE `sanofi_pdb_live_product_variant_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `variant_id` int(11) NOT NULL,
  `pzn` varchar(100) NOT NULL DEFAULT '',
  `amount` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sanofi_pdb_live_product_variant_type` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_live_product_variant_type` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_live_product_variant_type` (`id`, `variant_id`, `pzn`, `amount`, `created_at`, `updated_at`)
VALUES
	(985,14,'4200032','10 Filmtabletten','2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(986,14,'4200049','30 Filmtabletten','2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(1010,95,'1293412','1,5g','2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(1011,95,'1293406','3g','2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(1013,123,'195245','100 ml','2022-03-28 08:27:05','2022-03-28 08:27:05'),
	(1014,192,'3546159','5 Stück','2022-05-12 09:51:27','2022-05-12 09:51:27'),
	(1015,234,'4970103','24 Weichkapseln','2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(1016,234,'4970126','48 Weichkapseln','2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(1017,195,'3521828','20 Stück','2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1018,196,'8763','6 Stück','2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1019,246,'3904096','20 Filmtabletten','2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1020,197,'3512344','40 Stück','2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1021,197,'3512350','100 Stück','2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1022,198,'18017','6 Stück','2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1023,198,'18023','100 Stück','2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1024,245,'5430260','200g','2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1025,224,'4481232','250 ml','2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1026,247,'490441','30 Stück','2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1027,247,'74501','100 Stück','2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1028,177,'1253200','20 g','2022-03-28 13:09:12','2022-03-28 13:09:12'),
	(1029,199,'1258723','15 ml','2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1030,199,'1274797','30 ml','2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1031,73,'1520434','20 Kautabletten','2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1032,73,'3534699','40 Kautabletten','2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1033,126,'3525140','18 Stück','2022-03-28 13:23:05','2022-03-28 13:23:05'),
	(1034,226,'4942928','128g','2022-04-29 06:12:57','2022-04-29 06:12:57'),
	(1035,129,'3522868','5 Ampullen','2022-04-29 06:12:20','2022-04-29 06:12:20'),
	(1040,131,'727676','100 ml','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1041,131,'3531583','200 ml','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1042,132,'3517985','100 ml','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1043,132,'3531608','200 ml','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1044,133,'727653','100 ml','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1045,134,'990735','20 Stück','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1046,130,'3517991','20 Stück','2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1047,135,'981558','100 ml','2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1048,136,'981564','20 Stück','2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1049,59,'38801','10 Ampullen','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1050,60,'38824','5 Ampullen','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1055,62,'38882','10 ml','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1056,62,'4467999','20 ml','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1057,62,'4209381','50 ml','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1058,62,'1310659','5x50 ml','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1060,230,'5184200','20 Tabletten','2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1061,208,'1314930','30 Stück','2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1062,208,'1314947','100 Stück','2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1063,137,'1283394','10 ml','2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1064,213,'626308','120 ml','2022-03-31 13:24:56','2022-03-31 13:24:56'),
	(1068,139,'4613254','100 ml','2022-03-31 13:47:09','2022-03-31 13:47:09'),
	(1069,214,'4480528','12 Stück','2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1070,214,'4480534','24 Stück','2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1071,179,'694267','30 Stück','2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1072,179,'1051732','60 Stück','2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1074,203,'2337643','100 g','2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1075,204,'2337666','125 ml','2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1076,248,'5377703','8 Direkt-Sticks zu je 2g','2022-06-03 07:15:28','2022-06-03 07:15:28'),
	(1081,61,'38876','10 Filmtabletten','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1082,61,'4953518','30 Filmtabletten','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1083,61,'4209725','50 Filmtabletten','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1084,61,'122281','100 Filmtabletten','2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1088,202,'3520415','30 Stück','2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1089,202,'3520421','60 Stück','2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1090,202,'3546432','90 Stück','2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1091,138,'4968655','190ml','2022-05-12 09:49:56','2022-05-12 09:49:56'),
	(1092,242,'5373504','15ml','2022-05-12 09:42:12','2022-05-12 09:42:12');

/*!40000 ALTER TABLE `sanofi_pdb_live_product_variant_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_live_product_variants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_live_product_variants`;

CREATE TABLE `sanofi_pdb_live_product_variants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_prescription_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_pharmacy_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_nutritional_supplement` tinyint(1) NOT NULL DEFAULT '0',
  `is_cosmetic` tinyint(1) NOT NULL DEFAULT '0',
  `is_medicine` tinyint(1) NOT NULL DEFAULT '0',
  `pdf_one_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '""',
  `pdf_two_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '""',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_live_product_variants` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_live_product_variants` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_live_product_variants` (`id`, `product_id`, `name`, `description`, `is_visible`, `is_prescription_required`, `is_pharmacy_required`, `is_nutritional_supplement`, `is_cosmetic`, `is_medicine`, `pdf_one_date`, `pdf_two_date`, `created_at`, `updated_at`, `sort_order`)
VALUES
	(14,15,'ALLEGRA 120mg Filmtabletten','',1,0,1,0,0,0,'07/2021','06/2021','2022-03-31 11:24:42','2022-03-31 11:24:42',0),
	(59,30,'NOVALGIN 1,0 g Ampullen','',1,1,1,0,0,0,'02/2021','02/2021','2022-05-12 09:55:06','2022-05-12 09:55:06',3),
	(60,30,'NOVALGIN 2,5 g Ampullen','',1,1,1,0,0,0,'02/2021','02/2021','2022-05-12 09:55:06','2022-05-12 09:55:06',4),
	(61,30,'NOVALGIN Filmtabletten','',1,1,1,0,0,0,'10/2021','02/2021','2022-05-12 09:55:06','2022-05-12 09:55:06',1),
	(62,30,'NOVALGIN Tropfen','',1,1,1,0,0,0,'02/2021','02/2021','2022-05-12 09:55:06','2022-05-12 09:55:06',2),
	(73,36,'MAALOX Kautabletten','',1,1,0,0,0,0,'08/2021','08/2021','2022-05-12 09:53:09','2022-05-12 09:53:09',0),
	(95,44,'BATRAFEN','',1,0,1,0,0,0,'07/2014','07/2014','2022-03-28 08:16:27','2022-03-28 08:16:27',0),
	(123,56,'BISOLVON Lösung','',1,0,1,0,0,0,'04/2020','08/2021','2022-03-28 08:27:05','2022-03-28 08:27:05',0),
	(126,58,'MUCOANGIN Johannisbeere 20 mg - Lutschtabletten','',1,0,1,0,0,0,'02/2018','02/2018','2022-03-28 13:23:05','2022-03-28 13:23:05',0),
	(129,60,'MUCOSAN 15 mg – Ampullen','',1,1,1,0,0,0,'10/2020','07/2020','2022-04-29 06:12:20','2022-04-29 06:12:20',0),
	(130,61,'MUCOSOLVAN 15 mg Lutschpastillen','<ul>\r\n	<li>der Hustensaft zum Lutschen für unterwegs</li>\r\n	<li>alkohol- und laktosefrei</li>\r\n	<li>ab 6 Jahren</li>\r\n</ul>',1,0,1,0,0,0,'10/2021','10/2021','2022-04-07 09:07:32','2022-04-07 09:07:32',3),
	(131,61,'MUCOSOLVAN 15 mg/5 ml Saft für Kinder','<ul>\r\n	<li>Hustensaft mit Waldbeergeschmack</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n	<li>für Kinder ab 0 Jahren*</li>\r\n</ul>\r\n\r\n<p><sub>*nach Rücksprache mit dem Arzt</sub></p>\r\n\r\n<p>\r\n	<br>\r\n</p>',1,0,1,0,0,0,'07/2021','07/2021','2022-04-07 09:07:32','2022-04-07 09:07:32',4),
	(132,61,'MUCOSOLVAN 30 mg/5 ml Saft','<ul>\r\n	<li>Hustensaft mit Erdbeer-Vanille-Geschmack</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n</ul>',1,0,1,0,0,0,'07/2021','07/2021','2022-04-07 09:07:32','2022-04-07 09:07:32',1),
	(133,61,'MUCOSOLVAN 7,5 mg/1 ml Lösung','<ul>\r\n	<li>zum Inhalieren für alle Vernebelungsgeräte geeignet</li>\r\n	<li>zucker- und alkoholfrei</li>\r\n</ul>',1,0,1,0,0,0,'07/2021','07/2021','2022-04-07 09:07:32','2022-04-07 09:07:32',5),
	(134,61,'MUCOSOLVAN 1x täglich 75 mg - Retardkapseln','<ul>\r\n	<li>1 Kapsel morgens ist dank verzögerter Wirkstoffabgabe ausreichend&nbsp;</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n</ul>\r\n\r\n<p>\r\n	<br>\r\n</p>',1,0,1,0,0,0,'04/2021','04/2021','2022-04-07 09:07:32','2022-04-07 09:07:32',2),
	(135,62,'MUCOSPAS Saft','',1,1,1,0,0,0,'03/2021','03/2021','2022-05-12 09:54:48','2022-05-12 09:54:48',0),
	(136,62,'MUCOSPAS Tabletten','',1,1,1,0,0,0,'03/2021','03/2021','2022-05-12 09:54:48','2022-05-12 09:54:48',0),
	(137,63,'RHINOSPRAY plus ätherische Öle - Nasenspray','',1,0,1,0,0,0,'06/2017','06/2017','2022-03-31 13:22:08','2022-03-31 13:22:08',0),
	(138,64,'MUCOMAT (vormals SILOMAT) Reizhusten 2,13 mg/ml Lösung zum Einnehmen','',1,0,1,0,0,0,'08/2021','08/2021','2022-05-12 09:49:56','2022-05-12 09:49:56',0),
	(139,65,'SILOMAT gegen Reizhusten Eibisch/Honig-Sirup','',1,0,0,0,0,1,'02/2017','','2022-03-31 13:47:09','2022-03-31 13:47:09',0),
	(177,93,'FINALGON - Salbe','',1,0,1,0,0,0,'07/2018','06/2017','2022-03-28 13:09:12','2022-03-28 13:09:12',0),
	(179,95,'THOMAPYRIN Tabletten','',1,0,1,0,0,0,'12/2019','12/2019','2022-04-04 14:54:33','2022-04-04 14:54:33',0),
	(192,105,'BUSCAPINA 20 mg/1 ml Ampullen','',1,1,1,0,0,0,'10/2020','12/2019','2022-05-12 09:51:27','2022-05-12 09:51:27',0),
	(195,107,'BUSCOPAN 10 mg Dragees','',1,0,1,0,0,0,'11/2017','11/2017','2022-04-04 14:41:31','2022-04-04 14:41:31',0),
	(196,107,'BUSCOPAN 10 mg - Zäpfchen','',1,0,1,0,0,0,'11/2017','07/2021','2022-04-04 14:41:31','2022-04-04 14:41:31',0),
	(197,108,'DULCOLAX Dragees','<ul>\r\n	<li>Wirkeintritt innerhalb von 6-12 Stunden</li>\r\n	<li>planbar über Nacht</li>\r\n	<li>dank Spezialdragierung wird der Wirkstoff dort freigesetzt, wo er gebraucht wird - im Dickdarm</li>\r\n	<li>nicht gleichzeitig mit Milch oder einem Magensäure bindenen Mittel einnehmen</li>\r\n	<li>Die Dragees dürfen nicht zerkleinert werden, sondern müssen unzerkaut geschluckt werden.</li>\r\n</ul>',1,0,1,0,0,0,'10/2017','10/2017','2022-04-04 14:45:14','2022-04-04 14:45:14',0),
	(198,108,'DULCOLAX - Zäpfchen','<ul>\r\n	<li>wirkt innerhalb von 10-30 Minuten</li>\r\n	<li>bei Körpertemperatur schmilzt das Zäpfchen, dadurch wird der Wirkstoff nur lokal aktiv</li>\r\n	<li>Die besondere Form der Zäpfchen gestattet es, sie einfach und leicht einzuführen.&nbsp;</li>\r\n	<li>Besonders geeignet zur sanften und wirksamen Behandlung von Personen mit Verstopfung, die Schluckschwierigkeiten haben.&nbsp;</li>\r\n</ul>',1,0,1,0,0,0,'10/2017','10/2017','2022-04-04 14:45:14','2022-04-04 14:45:14',0),
	(199,109,'GUTTALAX Tropfen','',1,0,1,0,0,0,'02/2021','02/2021','2022-03-31 11:24:53','2022-03-31 11:24:53',0),
	(202,112,'ANTISTAX 360 mg - Filmtabletten','<ul>\r\n	<li>pflanzliches Arzneimittel für Erwachsene ab 18 Jahren</li>\r\n	<li>zur Behandlung von Beschwerden bei Erkrankungen der Beinvenen (chronische Veneninsuffizienz Grad I)</li>\r\n	<li>stärken und schützen die venösen Blutgefäße und reparieren die Gefäßwände</li>\r\n	<li>reduzieren bzw. beugen Schwellung vor</li>\r\n	<li>fördern die Durchblutung in den Beinen</li>\r\n	<li>verringern die Durchlässigkeit der Gefäßwände</li>\r\n	<li>hemmen Entzündungen</li>\r\n	<li>lindern den Schmerz</li>\r\n</ul>\r\n\r\n<p>ANTISTAX 360mg - Filmtabletten helfen somit Symptome wie Schmerzen und Schweregefühl in den Beinen, Juckreiz oder Beinschwellungen, Krampfadern, Ermüdung sowie Spannungsgefühl und Krämpfe in den Waden zu lindern.</p>',1,0,1,0,0,0,'05/2021','05/2021','2022-04-29 06:17:39','2022-04-29 06:17:39',0),
	(203,112,'ANTISTAX Creme','<ul>\r\n	<li>wohltuend und lindernd bei müden, schweren Beinen&nbsp;</li>\r\n	<li>pflegt die Haut mit rückfettenden Substanzen &nbsp; &nbsp;</li>\r\n	<li>durch sanfte Massage mit der Creme werden die Durchblutung gefördert und die Beine belebt</li>\r\n	<li>Verwendung von ANTISTAX Creme unterstützt eine Therapie mit ANTISTAX 360mg Filmtabletten</li>\r\n</ul>',1,0,0,0,1,0,'','','2022-04-29 06:17:39','2022-04-29 06:17:39',0),
	(204,112,'ANTISTAX Frischgel','<ul>\r\n	<li>entspannt, kühlt und belebt müde, schwere Beine</li>\r\n	<li>an heißen Tagen im Kühlschrank aufbewahrt, wirkt es besonders erfrischend</li>\r\n	<li>sanft in die Haut einmassiert, wird die Durchblutung in den Beinen angeregt&nbsp;</li>\r\n	<li>mit Pfefferminze und Menthol &nbsp;</li>\r\n</ul>',1,0,0,0,1,0,'','','2022-04-29 06:17:39','2022-04-29 06:17:39',0),
	(208,114,'PHARMATON Vital','',1,0,0,1,0,0,'','','2022-04-04 16:14:50','2022-04-04 16:14:50',0),
	(213,118,'SELSUN medizinisches Shampoo','',1,0,1,0,0,0,'11/2021','11/2021','2022-03-31 13:24:56','2022-03-31 13:24:56',0),
	(214,119,'THOMADUO 400 mg/100 mg Filmtabletten','',1,0,1,0,0,0,'11/2021','11/2021','2022-04-04 14:53:21','2022-04-04 14:53:21',0),
	(224,125,'DULCOSOFT Flüssig','',1,0,0,0,0,1,'04/2021','','2022-03-28 13:04:20','2022-03-28 13:04:20',0),
	(226,127,'MUCONATURAL complete Sirup','',1,0,0,0,0,1,'01/2017','','2022-04-29 06:12:57','2022-04-29 06:12:57',0),
	(230,130,'NOVANIGHT Tabletten','',1,0,0,1,0,0,'11/2020','','2022-04-04 16:14:12','2022-04-04 16:14:12',0),
	(234,131,'BUSCOMINT 0,2 ml Reizdarmkapseln','',1,0,1,0,0,0,'01/2021','07/2021','2022-03-28 08:35:58','2022-03-28 08:35:58',0),
	(242,135,'ALLENASAL Protect','',1,0,0,0,0,1,'01/2022','','2022-05-12 09:42:12','2022-05-12 09:42:12',0),
	(245,137,'DULCOSOFT DUO Pulver für Trinklösung','',1,0,0,0,0,1,'02/2021','','2022-03-31 14:32:28','2022-03-31 14:32:28',0),
	(246,138,'BUSCOPAN PLUS Paracetamol 10 mg/ 500 mg Filmtabletten','',1,0,1,0,0,0,'02/2020','02/2020','2022-04-26 10:08:25','2022-04-26 10:08:25',0),
	(247,139,'ESSENTIALE forte - Kapseln','',1,1,1,0,0,0,'07/2021','02/2022','2022-05-12 09:52:22','2022-05-12 09:52:22',0),
	(248,140,'BIOFLORIN (neue Rezeptur)','',1,0,0,1,0,0,'','','2022-06-03 07:15:28','2022-06-03 07:15:28',0);

/*!40000 ALTER TABLE `sanofi_pdb_live_product_variants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_live_product_x_ingredients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_live_product_x_ingredients`;

CREATE TABLE `sanofi_pdb_live_product_x_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_live_product_x_ingredients` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_live_product_x_ingredients` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_live_product_x_ingredients` (`id`, `product_id`, `ingredient_id`)
VALUES
	(103,44,107),
	(106,56,16),
	(109,131,154),
	(123,125,142),
	(130,93,136),
	(131,93,137),
	(135,58,23),
	(150,15,15),
	(151,109,91),
	(162,63,26),
	(163,118,132),
	(168,65,28),
	(169,65,29),
	(180,137,142),
	(181,137,158),
	(189,107,66),
	(194,108,90),
	(197,119,17),
	(198,95,72),
	(199,95,67),
	(200,130,153),
	(203,114,111),
	(204,114,108),
	(211,61,23),
	(218,138,66),
	(219,138,165),
	(222,60,23),
	(223,127,29),
	(224,127,144),
	(225,127,145),
	(227,112,105),
	(231,135,164),
	(232,64,27),
	(233,105,66),
	(234,139,160),
	(235,36,159),
	(238,62,23),
	(239,62,25),
	(240,30,70),
	(241,140,161);

/*!40000 ALTER TABLE `sanofi_pdb_live_product_x_ingredients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_live_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_live_products`;

CREATE TABLE `sanofi_pdb_live_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ingredient_type` tinyint(1) NOT NULL,
  `color_main` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_sub` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `footnotes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_live_products` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_live_products` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_live_products` (`id`, `name`, `is_visible`, `description`, `area_id`, `ingredient_type`, `color_main`, `color_sub`, `created_at`, `updated_at`, `footnotes`)
VALUES
	(15,'ALLEGRA',1,'<ul>\r\n	<li>bei Erwachsenen und Jugendlichen ab dem 12. Lebensjahr&nbsp;</li>\r\n	<li>lindert die Symptome bei Heuschnupfen (sogenannte „saisonale allergische Rhinitis“)&nbsp;</li>\r\n	<li>lindert Beschwerden wie\r\n		<br>- Niesen\r\n		<br>- eine juckende, rinnende oder verstopfte Nase und\r\n		<br>- juckende, gerötete und tränende Augen</li>\r\n</ul>\r\n\r\n<p>Bei Vorliegen eines Rezeptes, bezahlen Sie nur die Rezeptgebühr.</p>',42,2,'#853A92','#C83D99','2022-03-31 11:24:42','2022-03-31 11:24:42','[]'),
	(30,'NOVALGIN',1,'',67,2,'#008381','#2C779B','2022-05-12 09:55:06','2022-05-12 09:55:06','[]'),
	(36,'MAALOX',1,'',67,2,'#0076C6','#6DC0EC','2022-05-12 09:53:09','2022-05-12 09:53:09','[]'),
	(44,'BATRAFEN',1,'<ul>\r\n	<li>wirkt pilztötend gegen Erreger von Nagelpilzerkrankungen</li>\r\n</ul>',29,2,'#A70E76','#D47A00','2022-03-28 08:16:27','2022-03-28 08:16:27','[]'),
	(56,'BISOLVON',1,'<ul>\r\n	<li>BISOLVON Lösung dient der Behandlung von zähem und angestautem Schleim und erleichtert sein Abhusten</li>\r\n</ul>',43,2,'#1D447A','#FF7704','2022-03-28 08:27:05','2022-03-28 08:27:05','[]'),
	(58,'MUCOANGIN',1,'',37,2,'#0061A0','#009AE0','2022-03-28 13:23:05','2022-03-28 13:23:05','[]'),
	(60,'MUCOSAN',0,'',41,2,'#676559','#EBA329','2022-04-29 06:12:20','2022-04-29 06:12:20','[]'),
	(61,'MUCOSOLVAN',1,'<ul>\r\n	<li>löst den Hustenschleim</li>\r\n	<li>erleichtert das Abhusten</li>\r\n</ul>',43,2,'#003188','#F1001A','2022-04-07 09:07:32','2022-04-07 09:07:32','[]'),
	(62,'MUCOSPAS',1,'',67,2,'#00B7F1','#F39C12','2022-05-12 09:54:48','2022-05-12 09:54:48','[]'),
	(63,'RHINOSPRAY',1,'<ul>\r\n	<li>Tramazolin befreit die Nase</li>\r\n	<li>Die ätherischen Öle Eukalyptol, Menthol und Kampfer lassen einen frei durchatmen</li>\r\n	<li>Ab 6 Jahren</li>\r\n</ul>',40,2,'#03418A','#13B1B6','2022-03-31 13:22:08','2022-03-31 13:22:08','[]'),
	(64,'MUCOMAT (vormals SILOMAT)',1,'<ul>\r\n	<li>stillt den Reizhusten nach 15 Minuten</li>\r\n	<li>ab 6 Jahren</li>\r\n</ul>',43,2,'#58B8D0','#38347A','2022-05-12 09:49:56','2022-05-12 09:49:56','[]'),
	(65,'SILOMAT Eibisch/Honig',1,'',6,1,'#58B8D0','#38347A','2022-03-31 13:47:09','2022-03-31 13:47:09','[]'),
	(93,'FINALGON',1,'<ul>\r\n	<li>fördert die Hautdurchblutung bei Muskel- und Gelenkbeschwerden</li>\r\n	<li>dient zur Behandlung von akuten Rückenschmerzen</li>\r\n</ul>',35,2,'#C0392B','#0033A0','2022-03-28 13:09:12','2022-03-28 13:09:12','[]'),
	(95,'THOMAPYRIN',1,'<ul>\r\n	<li>bei Kopfschmerzen, insbesondere Spannungskopfschmerzen</li>\r\n	<li>bei Migräneanfällen mit und ohne Aura</li>\r\n	<li>bei Zahnschmerzen und Regelschmerzen</li>\r\n	<li>bei Erkältungskrankheiten und grippalen Infekten, um Schmerzen zu lindern und Fieber zu senken</li>\r\n	<li>optimale Kombination der bewährten Wirkstoffe ASS, Paracetamol und Coffein</li>\r\n	<li>kombiniert seine drei Wirkstoffe so ideal, dass die schmerzlindernde Wirkung verstärkt wird</li>\r\n	<li>die Kombination ist den einzelnen hochdosierten Wirkstoffen (ASS, Paracetamol) überlegen: durch ihre unterschiedlichen analgetischen Angriffspunkte ergänzen sich ASS und Paracetamol in ihrer Anti-Schmerzwirkung, Coffein verstärkt die schmerzlindernde Eigenschaft von Paracetamol und ASS. So kann auch die Dosis der Einzelwirkstoffe pro Tablette möglichst geringgehalten werden.</li>\r\n	<li>wirkt dank der 3-fach Power nicht nur stärker, sondern auch 15 Minuten schneller*&nbsp;</li>\r\n	<li>überlegene Wirksamkeit klinisch belegt</li>\r\n	<li>gut verträglich</li>\r\n	<li>kann bereits ab 12 Jahren eingenommen werden</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.thomapyrin.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.thomapyrin.at</a></p>\r\n\r\n<p><sup>*15 Minuten schneller als 1000mg Paracetamol, 1000mg ASS</sup></p>',14,2,'#003156','#009FDA','2022-04-04 14:54:33','2022-04-04 14:54:33','[]'),
	(105,'BUSCAPINA',1,'',67,2,'#16874F','#FFAB40','2022-05-12 09:51:27','2022-05-12 09:51:27','[]'),
	(107,'BUSCOPAN',1,'<p>Sanfte Linderung bei Bauchschmerzen und -krämpfen</p>\r\n\r\n<ul>\r\n	<li>entspannt die verkrampfte Magen- und Darmmuskulatur und unterbindet deren Überaktivität</li>\r\n	<li>löst die Verspannung</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.buscopan.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.buscopan.at</a></p>',63,2,'#16874F','#F1C40F','2022-04-04 14:41:31','2022-04-04 14:41:31','[]'),
	(108,'DULCOLAX',1,'<ul>\r\n	<li>befreit bei Verstopfung schnell und zuverlässig</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.dulcolax.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.dulcolax.at</a></p>',61,2,'#076333','#A6C503','2022-04-04 14:45:14','2022-04-04 14:45:14','[]'),
	(109,'GUTTALAX',1,'<ul>\r\n	<li>wirkt ausschließlich im Dickdarm, wo die Verstopfung sitzt</li>\r\n	<li>sorgt für die Anregung der Dickdarmmuskulatur und unterstützt so die Darmbewegung</li>\r\n	<li>individuell dosierbar</li>\r\n	<li>Wirkungseintritt: i.d.R. innerhalb von 10 Stunden</li>\r\n</ul>\r\n\r\n<p>Bei Vorliegen eines Rezeptes, bezahlen Sie nur die Rezeptgebühr.</p>',61,2,'#076333','#A6C503','2022-03-31 11:24:53','2022-03-31 11:24:53','[]'),
	(112,'ANTISTAX',1,'<ul>\r\n	<li>Zur Behandlung von Beschwerden bei Erkrankungen der Beinvenen</li>\r\n	<li>Enthält venenaktive, pflanzliche Schutzstoffe aus dem Extrakt des roten Weinlaubs</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.antistax.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.antistax.at</a>&nbsp;</p>',28,2,'#880038','#F80000','2022-04-29 06:17:39','2022-04-29 06:17:39','[]'),
	(114,'PHARMATON Vital',1,'<p>PHARMATON Vital enthält:</p>\r\n\r\n<ul>\r\n	<li>Ginseng G115…\r\n		<br>… für körperliches und geistiges Wohlbefinden.\r\n		<br>… zur Unterstützung der Vitalität des Körpers und der Widerstandsfähigkeit gegen Stress.\r\n		<br>\r\n		<br>\r\n	</li>\r\n	<li>Vitamine C, B2, B6, B12…</li>\r\n	<li>Folsäure…</li>\r\n	<li>Niacin...\r\n		<br>… tragen zur Verringerung von Erschöpfung und Müdigkeit bei.</li>\r\n</ul>',56,1,'#FD7900','#F63000','2022-04-04 16:14:50','2022-04-04 16:14:50','[]'),
	(118,'SELSUN',1,'',44,2,'#00AD82','#91726B','2022-03-31 13:24:56','2022-03-31 13:24:56','[]'),
	(119,'THOMADUO',1,'<ul>\r\n	<li>bei Kopfschmerzen, auch in Verbindung mit Schulter- und Nackenschmerzen</li>\r\n	<li>eine clevere Kombination der beiden Wirkstoffe Ibuprofen und Coffein:\r\n		<br>- Ibuprofen wirkt schmerz- und entzündungshemmend\r\n		<br>- Coffein beschleunigt und verstärkt die Wirkung</li>\r\n	<li>wirkt schneller und stärker* gegen den Schmerz</li>\r\n	<li>spürbare Wirkung bereits nach 15 Minuten</li>\r\n	<li>leicht zu schlucken</li>\r\n	<li>gut verträglich</li>\r\n	<li>laktose-, glutenfrei und frei von tierischen Bestandteilen</li>\r\n	<li>auch auf nüchternen Magen einzunehmen</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.konaschu.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.konaschu.at</a></p>\r\n\r\n<p><sup>*als sein Einzelwirkstoff Ibuprofen 400mg</sup></p>',14,2,'#0B1E61','#EB038C','2022-04-04 14:53:21','2022-04-04 14:53:21','[]'),
	(125,'DULCOSOFT Flüssig',1,'<ul>\r\n	<li>einfache und gut verträgliche Hilfe bei hartem Stuhlgang</li>\r\n	<li>nach Rücksprache mit dem Arzt bereits für Kinder ab 6 Monaten, Schwangere und stillende Mütter geeignet</li>\r\n	<li>weicht harten Stuhl auf &nbsp;</li>\r\n	<li>geschmacksneutral</li>\r\n	<li>frei von Zucker, Kochsalz, Gluten, Laktose, Aroma und tierischen Bestandteilen</li>\r\n	<li>sanfter Wirkeintritt nach 24 bis 72 Stunden</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen finden Sie&nbsp;<a href=\"https://www.dulcolax.at/dulcosoftfluessig\" rel=\"noopener noreferrer\" target=\"_blank\">hier</a></p>',50,1,'#0090AC','#005F1A','2022-03-28 13:04:20','2022-03-28 13:04:20','[]'),
	(127,'MUCONATURAL complete',0,'',43,1,'#001379','#00A730','2022-04-29 06:12:57','2022-04-29 06:12:57','[]'),
	(130,'NOVANIGHT',1,'<p>Natürlich gut schlafen<sup>1,2,3</sup></p>\r\n\r\n<ol>\r\n	<li>Einschlafen\r\n		<br>Melatonin<sup>1</sup> ist ein körpereigenes Hormon und trägt zur Verkürzung der Einschlafphase bei. 1mg Melatonin vor dem Schlafengehen</li>\r\n	<li>Durchschlafen\r\n		<br>Zitronenmelisse<sup>2</sup> hilft einen gesunden Schlaf aufrecht zu erhalten und durchzuschlafen.</li>\r\n	<li>Erholt Aufwachen\r\n		<br>Passionsblume und kalifornischer Mohn<sup>3</sup> tragen zur Entspannung bei und unterstützen einen erholsamen Schlaf.</li>\r\n</ol>',55,1,'#001869','#00CCED','2022-04-04 16:14:12','2022-04-04 16:14:12','[]'),
	(131,'BUSCOMINT',1,'<p>Entspannter leben mit Reizdarm.\r\n	<br>Mit dem rein pflanzlichen Wirkstoff: Pfefferminzöl 0,2 ml (182 mg)</p>\r\n\r\n<ul>\r\n	<li>lindert Reizdarm-Symptome wie leichte Bauchschmerzen und -krämpfe sowie Blähungen</li>\r\n	<li>wirkt krampflösend und entblähend</li>\r\n	<li>100% natürlicher Wirkstoff: Pfefferminzöl</li>\r\n	<li>sanfte und natürliche Symptomlinderung</li>\r\n	<li>langfristige Anwendung nach Abklärung mit Arzt möglich (max. 3 Monate)</li>\r\n</ul>',53,2,'#008A2F','#7CB9A0','2022-03-28 08:35:58','2022-03-28 08:35:58','[]'),
	(135,'ALLENASAL Protect',1,'<ul>\r\n	<li>lindert die Symptome bei Heuschnupfen</li>\r\n	<li>die Ergänzung zum oralen Antihistaminikum bei allergischem Schnupfen&nbsp;</li>\r\n	<li>wirkt lokal auf der Nasenschleimhaut und bildet einen leichten Schutzfilm</li>\r\n	<li>lindert Nasenverstopfung</li>\r\n	<li>repariert die oft geschädigte Nasenschleimhaut&nbsp;</li>\r\n	<li>riecht angenehm nach den ätherischen Öle der Zitrone</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.allenasal.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.allenasal.at</a></p>',31,2,'#7F0D87','#B40084','2022-05-12 09:42:12','2022-05-12 09:42:12','[]'),
	(137,'DULCOSOFT DUO',1,'<ul>\r\n	<li>Pulver in mind. 150ml Getränk der Wahl auflösen</li>\r\n	<li>2-fach Wirkung: weicht harten Stuhl auf und reduziert Blähungen</li>\r\n	<li>geschmacksneutral, frei von Zucker, Gluten und Kochsalz</li>\r\n	<li>Für eine Anwendung in Schwangerschaft und Stillzeit und für Kinder ab 6 Monaten geeignet.*&nbsp;</li>\r\n	<li>Die Wirkung tritt in der Regel nach 24-72 Stunden ein.&nbsp;</li>\r\n</ul>\r\n\r\n<p><sub>*In diesen Fällen ist es ratsam, vor der Anwendung Ihren Arzt oder Ihre Ärztin zu fragen.</sub></p>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.dulcosoftduo.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.dulcosoftduo.at</a></p>',62,1,'#0090AC','#AD0078','2022-03-31 14:32:28','2022-03-31 14:32:28','[]'),
	(138,'BUSCOPAN PLUS',1,'<p>Stärker als Dein Bauchschmerz.</p>\r\n\r\n<ul>\r\n	<li>bei stärkeren Schmerzen und Krämpfen - verursacht z.B. durch Magen-Darm-Infekt, Durchfall, Regelschmerzen, Blasenentzündung</li>\r\n	<li>kombiniert das magenverträgliche Schmerzmittel Paracetamol mit dem gezielt wirkenden Krampflöser Butylscopolamin</li>\r\n	<li>2-fach Wirkung: es löst den Krampf und befreit vom Schmerz</li>\r\n	<li>Die Kerbe der Tablette ist nicht zum Teilen bestimmt.</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.buscopan.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.buscopan.at</a></p>',63,2,'#16874F','#FFAB40','2022-04-26 10:08:25','2022-04-26 10:08:25','[]'),
	(139,'ESSENTIALE',1,'',67,2,'#992000','#F56C00','2022-05-12 09:52:22','2022-05-12 09:52:22','[]'),
	(140,'BIOFLORIN (Nahrungsergänzungsmittel)',0,'<p>Eine gesunde Darmschleimhaut spielt eine wichtige Rolle für die Verdauung und &nbsp;für das Immunsystem. &nbsp;</p>\r\n\r\n<p>BIOFLORIN (Nahrungsergänzungsmittel, neue Rezeptur) kann mit seinen Inhaltsstoffen einen wichtigen Beitrag dazu leisten.¹ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<ul>\r\n	<li>ideal für Kinder (ab 3 Jahren): mit fruchtigem Erdbeergeschmack &amp; zuckerfrei</li>\r\n	<li>kann gleichzeitig zum Antibiotikum eingenommen werden</li>\r\n	<li>zur Erhaltung der Darmgesundheit</li>\r\n	<li>praktischer Reisebegleiter zur Erhaltung der normalen Darmfunktion:\r\n		<br>rechtzeitig vor und während der Reise</li>\r\n</ul>\r\n\r\n<p><strong>Verzehrsempfehlung</strong></p>\r\n\r\n<ul>\r\n	<li>Empfohlene Tagesdosis: 1 Direkt-Stick täglich</li>\r\n	<li>Empfohlene Dauer der Einnahme: 1 Monat. Bei Bedarf kann die Einnahme verlängert werden.</li>\r\n	<li>Kinder über 6 Jahre und Erwachsene: Nehmen Sie täglich den Inhalt eines Direkt-Sticks direkt in den Mund ein.</li>\r\n	<li>Kinder von 3 bis 6 Jahren: Es wird empfohlen, den Inhalt eines Direkt-Sticks in ein kleines Glas Wasser zu geben.</li>\r\n	<li>Nicht geeignet für Kinder unter 3 Jahren.</li>\r\n</ul>',65,1,'#56A0E5','#9ECA43','2022-06-03 07:15:28','2022-06-03 07:15:28','[{\"text\":\"<p>Vitamin A tr\\u00e4gt zur Erhaltung normaler Schleimh\\u00e4ute, wie zum Beispiel der Darmschleimhaut, bei.<\\/p>\\r\\n\"},{\"text\":\"<p>Vitamin A, Vitamin D, Vitamin B6, Vitamin B12 und Fols\\u00e4ure tragen zur normalen Funktion des Immunsystems bei. Vitamin B6, B12 und Fols\\u00e4ure tragen zur Verringerung von M\\u00fcdigkeit und Erm\\u00fcdung und zu einem normalen Energiestoffwechsel bei.<\\/p>\\r\\n\"}]');

/*!40000 ALTER TABLE `sanofi_pdb_live_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_product_variant_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_product_variant_type`;

CREATE TABLE `sanofi_pdb_product_variant_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `variant_id` int(11) NOT NULL,
  `pzn` varchar(100) NOT NULL DEFAULT '',
  `amount` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pzn` (`pzn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sanofi_pdb_product_variant_type` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_product_variant_type` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_product_variant_type` (`id`, `variant_id`, `pzn`, `amount`, `created_at`, `updated_at`)
VALUES
	(985,14,'4200032','10 Filmtabletten','2022-03-17 11:32:03','2022-03-17 11:32:03'),
	(986,14,'4200049','30 Filmtabletten','2022-03-17 11:32:03','2022-03-17 11:32:03'),
	(1010,95,'1293412','1,5g','2022-03-28 08:16:25','2022-03-28 08:16:25'),
	(1011,95,'1293406','3g','2022-03-28 08:16:25','2022-03-28 08:16:25'),
	(1013,123,'195245','100 ml','2022-03-28 08:27:04','2022-03-28 08:27:04'),
	(1014,192,'3546159','5 Stück','2022-03-28 08:29:51','2022-03-28 08:29:51'),
	(1015,234,'4970103','24 Weichkapseln','2022-03-28 08:35:24','2022-03-28 08:35:24'),
	(1016,234,'4970126','48 Weichkapseln','2022-03-28 08:35:24','2022-03-28 08:35:24'),
	(1017,195,'3521828','20 Stück','2022-03-28 08:47:59','2022-03-28 08:47:59'),
	(1018,196,'8763','6 Stück','2022-03-28 08:48:42','2022-03-28 08:48:42'),
	(1019,246,'3904096','20 Filmtabletten','2022-03-28 09:02:49','2022-03-28 09:02:49'),
	(1020,197,'3512344','40 Stück','2022-03-28 09:18:02','2022-03-28 09:18:02'),
	(1021,197,'3512350','100 Stück','2022-03-28 09:18:02','2022-03-28 09:18:02'),
	(1022,198,'18017','6 Stück','2022-03-28 09:20:00','2022-03-28 09:20:00'),
	(1023,198,'18023','100 Stück','2022-03-28 09:20:00','2022-03-28 09:20:00'),
	(1024,245,'5430260','200g','2022-03-28 09:36:39','2022-03-28 09:36:39'),
	(1025,224,'4481232','250 ml','2022-03-28 12:48:38','2022-03-28 12:48:38'),
	(1026,247,'490441','30 Stück','2022-03-28 12:54:22','2022-03-28 12:54:22'),
	(1027,247,'74501','100 Stück','2022-03-28 12:54:22','2022-03-28 12:54:22'),
	(1028,177,'1253200','20 g','2022-03-28 13:06:20','2022-03-28 13:06:20'),
	(1029,199,'1258723','15 ml','2022-03-28 13:14:11','2022-03-28 13:14:11'),
	(1030,199,'1274797','30 ml','2022-03-28 13:14:11','2022-03-28 13:14:11'),
	(1031,73,'1520434','20 Kautabletten','2022-03-28 13:18:35','2022-03-28 13:18:35'),
	(1032,73,'3534699','40 Kautabletten','2022-03-28 13:18:35','2022-03-28 13:18:35'),
	(1033,126,'3525140','18 Stück','2022-03-28 13:22:00','2022-03-28 13:22:00'),
	(1034,226,'4942928','128g','2022-03-28 13:24:42','2022-03-28 13:24:42'),
	(1035,129,'3522868','5 Ampullen','2022-03-28 13:26:08','2022-03-28 13:26:08'),
	(1040,131,'727676','100 ml','2022-03-28 13:37:36','2022-03-28 13:37:36'),
	(1041,131,'3531583','200 ml','2022-03-28 13:37:36','2022-03-28 13:37:36'),
	(1042,132,'3517985','100 ml','2022-03-28 13:37:41','2022-03-28 13:37:41'),
	(1043,132,'3531608','200 ml','2022-03-28 13:37:41','2022-03-28 13:37:41'),
	(1044,133,'727653','100 ml','2022-03-28 13:37:48','2022-03-28 13:37:48'),
	(1045,134,'990735','20 Stück','2022-03-28 13:37:53','2022-03-28 13:37:53'),
	(1046,130,'3517991','20 Stück','2022-03-28 13:38:58','2022-03-28 13:38:58'),
	(1047,135,'981558','100 ml','2022-03-28 13:46:14','2022-03-28 13:46:14'),
	(1048,136,'981564','20 Stück','2022-03-28 13:46:22','2022-03-28 13:46:22'),
	(1049,59,'38801','10 Ampullen','2022-03-28 13:50:42','2022-03-28 13:50:42'),
	(1050,60,'38824','5 Ampullen','2022-03-28 13:50:54','2022-03-28 13:50:54'),
	(1055,62,'38882','10 ml','2022-03-28 13:54:25','2022-03-28 13:54:25'),
	(1056,62,'4467999','20 ml','2022-03-28 13:54:25','2022-03-28 13:54:25'),
	(1057,62,'4209381','50 ml','2022-03-28 13:54:25','2022-03-28 13:54:25'),
	(1058,62,'1310659','5x50 ml','2022-03-28 13:54:25','2022-03-28 13:54:25'),
	(1060,230,'5184200','20 Tabletten','2022-03-28 14:10:51','2022-03-28 14:10:51'),
	(1061,208,'1314930','30 Stück','2022-03-31 13:08:05','2022-03-31 13:08:05'),
	(1062,208,'1314947','100 Stück','2022-03-31 13:08:05','2022-03-31 13:08:05'),
	(1063,137,'1283394','10 ml','2022-03-31 13:17:06','2022-03-31 13:17:06'),
	(1064,213,'626308','120 ml','2022-03-31 13:24:49','2022-03-31 13:24:49'),
	(1068,139,'4613254','100 ml','2022-03-31 13:46:27','2022-03-31 13:46:27'),
	(1069,214,'4480528','12 Stück','2022-03-31 13:55:44','2022-03-31 13:55:44'),
	(1070,214,'4480534','24 Stück','2022-03-31 13:55:44','2022-03-31 13:55:44'),
	(1071,179,'694267','30 Stück','2022-03-31 14:04:57','2022-03-31 14:04:57'),
	(1072,179,'1051732','60 Stück','2022-03-31 14:04:57','2022-03-31 14:04:57'),
	(1074,203,'2337643','100 g','2022-04-04 14:50:44','2022-04-04 14:50:44'),
	(1075,204,'2337666','125 ml','2022-04-04 14:51:11','2022-04-04 14:51:11'),
	(1081,61,'38876','10 Filmtabletten','2022-04-07 09:10:09','2022-04-07 09:10:09'),
	(1082,61,'4953518','30 Filmtabletten','2022-04-07 09:10:09','2022-04-07 09:10:09'),
	(1083,61,'4209725','50 Filmtabletten','2022-04-07 09:10:09','2022-04-07 09:10:09'),
	(1084,61,'122281','100 Filmtabletten','2022-04-07 09:10:09','2022-04-07 09:10:09'),
	(1088,202,'3520415','30 Stück','2022-04-29 06:14:45','2022-04-29 06:14:45'),
	(1089,202,'3520421','60 Stück','2022-04-29 06:14:45','2022-04-29 06:14:45'),
	(1090,202,'3546432','90 Stück','2022-04-29 06:14:45','2022-04-29 06:14:45'),
	(1091,138,'4968655','190ml','2022-04-29 06:26:30','2022-04-29 06:26:30'),
	(1092,242,'5373504','15ml','2022-05-12 09:42:09','2022-05-12 09:42:09'),
	(1093,248,'5377703','8 Direkt-Sticks zu je 2g','2022-06-03 07:16:00','2022-06-03 07:16:00');

/*!40000 ALTER TABLE `sanofi_pdb_product_variant_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_product_variants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_product_variants`;

CREATE TABLE `sanofi_pdb_product_variants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_prescription_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_pharmacy_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_nutritional_supplement` tinyint(1) NOT NULL DEFAULT '0',
  `is_cosmetic` tinyint(1) NOT NULL DEFAULT '0',
  `is_medicine` tinyint(1) NOT NULL DEFAULT '0',
  `pdf_one_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_two_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_product_variants` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_product_variants` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_product_variants` (`id`, `product_id`, `name`, `description`, `is_visible`, `is_prescription_required`, `is_pharmacy_required`, `is_nutritional_supplement`, `is_cosmetic`, `is_medicine`, `pdf_one_date`, `pdf_two_date`, `raw_image`, `created_at`, `updated_at`, `sort_order`)
VALUES
	(14,15,'ALLEGRA 120mg Filmtabletten','',1,0,1,0,0,0,'07/2021','06/2021','\"\\/products\\/allegra\\/allegra-120mg-filmtabletten\\/Allegra-120mg-10Filmtab-4200032-02092016.jpg\"',NULL,'2022-03-17 11:32:03',0),
	(59,30,'NOVALGIN 1,0 g Ampullen','',1,1,1,0,0,0,'02/2021','02/2021','\"\\/products\\/novalgin\\/novalgin-10-g-ampullen\\/Novalgin-1g-10Ampullen-0038801-02092016.jpg\"',NULL,'2022-03-28 13:50:42',3),
	(60,30,'NOVALGIN 2,5 g Ampullen','',1,1,1,0,0,0,'02/2021','02/2021','\"\\/products\\/novalgin\\/novalgin-25-g-ampullen\\/Packshot_Novalgin_ampullen_5st_2_5.JPG\"',NULL,'2022-03-28 13:50:54',4),
	(61,30,'NOVALGIN Filmtabletten','',1,1,1,0,0,0,'10/2021','02/2021','\"\\/products\\/novalgin\\/novalgin-filmtabletten\\/novalgin-500-mg-filmtabletten-D01599654-p1.jpg\"',NULL,'2022-04-07 09:10:09',1),
	(62,30,'NOVALGIN Tropfen','',1,1,1,0,0,0,'02/2021','02/2021','\"\\/products\\/novalgin\\/novalgin-tropfen\\/Novalgin-Tropfen-10ml-Loes-0038882-02092016.jpg\"',NULL,'2022-03-28 13:54:25',2),
	(73,36,'MAALOX Kautabletten','',1,1,0,0,0,0,'08/2021','08/2021','\"\\/products\\/maalox\\/maalox-kautabletten\\/Maalox-Antacidum-20Kautab-1520434-02092016.jpg\"',NULL,'2022-03-28 13:18:35',0),
	(95,44,'BATRAFEN','',1,0,1,0,0,0,'07/2014','07/2014','\"\\/products\\/batrafen-antimykotischer-nagellack\\/batrafen-antimykotischer-nagellack\\/Batrafen.jpg\"',NULL,'2022-03-28 08:16:25',0),
	(123,56,'BISOLVON Lösung','',1,0,1,0,0,0,'04/2020','08/2021','\"\\/products\\/bisolvon\\/cropped-images\\/Bisolvon L\\u00f6sung 100 ml-155-88-264-492-1648456021.png\"',NULL,'2022-03-28 08:27:04',0),
	(126,58,'MUCOANGIN Johannisbeere 20 mg - Lutschtabletten','',1,0,1,0,0,0,'02/2018','02/2018','\"\\/products\\/mucoangin\\/cropped-images\\/Mucoangin_Lutschtabletten-133-141-530-390-1648473718.png\"',NULL,'2022-03-28 13:22:00',0),
	(129,60,'MUCOSAN 15 mg – Ampullen','',1,1,1,0,0,0,'10/2020','07/2020','\"\\/products\\/mucosan\\/mucosan-15-mg-ampullen\\/NEU_Mucosan.JPG\"',NULL,'2022-03-28 13:26:08',0),
	(130,61,'MUCOSOLVAN 15 mg Lutschpastillen','<ul>\r\n	<li>der Hustensaft zum Lutschen für unterwegs</li>\r\n	<li>alkohol- und laktosefrei</li>\r\n	<li>ab 6 Jahren</li>\r\n</ul>',1,0,1,0,0,0,'10/2021','10/2021','\"\\/products\\/mucosolvan\\/mucosolvan-15-mg-lutschpastillen\\/cropped-images\\/Mucosolvan_Lutschpastillen-28-85-362-436-1648474710.png\"',NULL,'2022-03-28 13:38:58',3),
	(131,61,'MUCOSOLVAN 15 mg/5 ml Saft für Kinder','<ul>\r\n	<li>Hustensaft mit Waldbeergeschmack</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n	<li>für Kinder ab 0 Jahren*</li>\r\n</ul>\r\n\r\n<p><sub>*nach Rücksprache mit dem Arzt</sub></p>\r\n\r\n<p>\r\n	<br>\r\n</p>',1,0,1,0,0,0,'07/2021','07/2021','\"\\/products\\/mucosolvan\\/cropped-images\\/Mucosolvan_kindersaft_100ml_pkg-2-35-290-430-1648474619.png\"',NULL,'2022-03-28 13:37:36',4),
	(132,61,'MUCOSOLVAN 30 mg/5 ml Saft','<ul>\r\n	<li>Hustensaft mit Erdbeer-Vanille-Geschmack</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n</ul>',1,0,1,0,0,0,'07/2021','07/2021','\"\\/products\\/mucosolvan\\/mucosolvan-30-mg5-ml-saft\\/cropped-images\\/Mucosolvan_saft_100ml_pkg-3-39-332-432-1648474570.png\"',NULL,'2022-03-28 13:37:41',1),
	(133,61,'MUCOSOLVAN 7,5 mg/1 ml Lösung','<ul>\r\n	<li>zum Inhalieren für alle Vernebelungsgeräte geeignet</li>\r\n	<li>zucker- und alkoholfrei</li>\r\n</ul>',1,0,1,0,0,0,'07/2021','07/2021','\"\\/products\\/mucosolvan\\/cropped-images\\/Mucosolvan_Loesung-4-38-298-428-1648474500.png\"',NULL,'2022-03-28 13:37:48',5),
	(134,61,'MUCOSOLVAN 1x täglich 75 mg - Retardkapseln','<ul>\r\n	<li>1 Kapsel morgens ist dank verzögerter Wirkstoffabgabe ausreichend&nbsp;</li>\r\n	<li>zucker-, alkohol- und laktosefrei</li>\r\n</ul>\r\n\r\n<p>\r\n	<br>\r\n</p>',1,0,1,0,0,0,'04/2021','04/2021','\"\\/products\\/mucosolvan\\/cropped-images\\/Mucosolvan_retard_2019-0-0-0-0-1648474398.png\"',NULL,'2022-03-28 13:37:53',2),
	(135,62,'MUCOSPAS Saft','',1,1,1,0,0,0,'03/2021','03/2021','\"\\/products\\/mucospas\\/mucospas-saft\\/NEU_Mucospas.JPG\"',NULL,'2022-03-28 13:46:14',0),
	(136,62,'MUCOSPAS Tabletten','',1,1,1,0,0,0,'03/2021','03/2021','\"\\/products\\/mucospas\\/mucospas-tabletten\\/NEU_Mucospas_Tabletten.JPG\"',NULL,'2022-03-28 13:46:22',0),
	(137,63,'RHINOSPRAY plus ätherische Öle - Nasenspray','',1,0,1,0,0,0,'06/2017','06/2017','\"\\/products\\/rhinospray\\/cropped-images\\/Rhinospray-40-120-234-400-1648732622.png\"',NULL,'2022-03-31 13:17:06',0),
	(138,64,'MUCOMAT (vormals SILOMAT) Reizhusten 2,13 mg/ml Lösung zum Einnehmen','',1,0,1,0,0,0,'08/2021','08/2021','\"\\/products\\/silomat\\/cropped-images\\/Mucomat_packshot_high-0-0-0-0-1649415708.png\"',NULL,'2022-04-29 06:26:30',0),
	(139,65,'SILOMAT gegen Reizhusten Eibisch/Honig-Sirup','',1,0,0,0,0,1,'02/2017','','\"\\/products\\/silomat-eibischhonig-sirup\\/cropped-images\\/Silomat_Eibisch-0-0-0-0-1648734384.png\"',NULL,'2022-03-31 13:46:27',0),
	(177,93,'FINALGON - Salbe','',1,0,1,0,0,0,'07/2018','06/2017','\"\\/products\\/finalgon-salbe\\/finalgon-salbe\\/Finalgon_Salbe.png\"',NULL,'2022-03-28 13:06:20',0),
	(179,95,'THOMAPYRIN Tabletten','',1,0,1,0,0,0,'12/2019','12/2019','\"\\/products\\/thomapyrin\\/cropped-images\\/TY_packshot_60stk_2020-25-28-658-334-1648735485.png\"',NULL,'2022-03-31 14:04:57',0),
	(192,105,'BUSCAPINA 20 mg/1 ml Ampullen','',1,1,1,0,0,0,'10/2020','12/2019','\"\\/products\\/buscapina\\/buscapina-20-mg1-ml-ampullen\\/Packshot_Buscapina.JPG\"',NULL,'2022-03-28 08:29:51',0),
	(195,107,'BUSCOPAN 10 mg Dragees','',1,0,1,0,0,0,'11/2017','11/2017','\"\\/products\\/buscopan\\/cropped-images\\/Buscopan_20dragees-67-132-586-350-1648457274.png\"',NULL,'2022-03-28 08:47:59',0),
	(196,107,'BUSCOPAN 10 mg - Zäpfchen','',1,0,1,0,0,0,'11/2017','07/2021','\"\\/products\\/buscopan\\/cropped-images\\/Buscopan Z\\u00e4pfchen 6-38-162-664-402-1648457319.png\"',NULL,'2022-03-28 08:48:42',0),
	(197,108,'DULCOLAX Dragees','<ul>\r\n	<li>Wirkeintritt innerhalb von 6-12 Stunden</li>\r\n	<li>planbar über Nacht</li>\r\n	<li>dank Spezialdragierung wird der Wirkstoff dort freigesetzt, wo er gebraucht wird - im Dickdarm</li>\r\n	<li>nicht gleichzeitig mit Milch oder einem Magensäure bindenen Mittel einnehmen</li>\r\n	<li>Die Dragees dürfen nicht zerkleinert werden, sondern müssen unzerkaut geschluckt werden.</li>\r\n</ul>',1,0,1,0,0,0,'10/2017','10/2017','\"\\/products\\/dulcolax\\/cropped-images\\/Dulcolax_Dragees-15-36-282-452-1648458991.png\"',NULL,'2022-03-28 09:18:02',0),
	(198,108,'DULCOLAX - Zäpfchen','<ul>\r\n	<li>wirkt innerhalb von 10-30 Minuten</li>\r\n	<li>bei Körpertemperatur schmilzt das Zäpfchen, dadurch wird der Wirkstoff nur lokal aktiv</li>\r\n	<li>Die besondere Form der Zäpfchen gestattet es, sie einfach und leicht einzuführen.&nbsp;</li>\r\n	<li>Besonders geeignet zur sanften und wirksamen Behandlung von Personen mit Verstopfung, die Schluckschwierigkeiten haben.&nbsp;</li>\r\n</ul>',1,0,1,0,0,0,'10/2017','10/2017','\"\\/products\\/dulcolax\\/dulcolax-zpfchen\\/cropped-images\\/DL_zaepfchen_pkg_low-43-61-274-450-1648459198.png\"',NULL,'2022-03-28 09:20:00',0),
	(199,109,'GUTTALAX Tropfen','',1,0,1,0,0,0,'02/2021','02/2021','\"\\/products\\/guttalax-tropfen\\/cropped-images\\/Guttalax-80-71-238-452-1648473245.png\"',NULL,'2022-03-28 13:14:11',0),
	(202,112,'ANTISTAX 360 mg - Filmtabletten','<ul>\r\n	<li>pflanzliches Arzneimittel für Erwachsene ab 18 Jahren</li>\r\n	<li>zur Behandlung von Beschwerden bei Erkrankungen der Beinvenen (chronische Veneninsuffizienz Grad I)</li>\r\n	<li>stärken und schützen die venösen Blutgefäße und reparieren die Gefäßwände</li>\r\n	<li>reduzieren bzw. beugen Schwellung vor</li>\r\n	<li>fördern die Durchblutung in den Beinen</li>\r\n	<li>verringern die Durchlässigkeit der Gefäßwände</li>\r\n	<li>hemmen Entzündungen</li>\r\n	<li>lindern den Schmerz</li>\r\n</ul>\r\n\r\n<p>ANTISTAX 360mg - Filmtabletten helfen somit Symptome wie Schmerzen und Schweregefühl in den Beinen, Juckreiz oder Beinschwellungen, Krampfadern, Ermüdung sowie Spannungsgefühl und Krämpfe in den Waden zu lindern.</p>',1,0,1,0,0,0,'05/2021','05/2021','\"\\/products\\/antistax\\/antistax-360-mg-filmtabletten\\/AS_packshot_90er_2021.png\"',NULL,'2022-04-29 06:14:45',0),
	(203,112,'ANTISTAX Creme','<ul>\r\n	<li>wohltuend und lindernd bei müden, schweren Beinen&nbsp;</li>\r\n	<li>pflegt die Haut mit rückfettenden Substanzen &nbsp; &nbsp;</li>\r\n	<li>durch sanfte Massage mit der Creme werden die Durchblutung gefördert und die Beine belebt</li>\r\n	<li>Verwendung von ANTISTAX Creme unterstützt eine Therapie mit ANTISTAX 360mg Filmtabletten</li>\r\n</ul>',1,0,0,0,1,0,'','','\"\\/products\\/antistax\\/cropped-images\\/Antistax_Creme-150-0-645-429-1648204755.png\"',NULL,'2022-04-04 14:50:44',0),
	(204,112,'ANTISTAX Frischgel','<ul>\r\n	<li>entspannt, kühlt und belebt müde, schwere Beine</li>\r\n	<li>an heißen Tagen im Kühlschrank aufbewahrt, wirkt es besonders erfrischend</li>\r\n	<li>sanft in die Haut einmassiert, wird die Durchblutung in den Beinen angeregt&nbsp;</li>\r\n	<li>mit Pfefferminze und Menthol &nbsp;</li>\r\n</ul>',1,0,0,0,1,0,'','','\"\\/products\\/antistax\\/antistax-frischgel-mit-rotem-weinlaubextrakt-kosmetikum\\/cropped-images\\/Antistax_Frischgel_125_ml-48-44-228-456-1648201356.png\"',NULL,'2022-04-04 14:51:11',0),
	(208,114,'PHARMATON Vital','',1,0,0,1,0,0,'','','\"\\/products\\/pharmaton-vital\\/pharmaton-vital\\/cropped-images\\/PHvital_100packshot_21_low-9-15-246-422-1648732082.png\"',NULL,'2022-03-31 13:08:05',0),
	(213,118,'SELSUN medizinisches Shampoo','',1,0,1,0,0,0,'11/2021','11/2021','\"\\/products\\/selsun-medizinisches-shampoo\\/selsun-medizinisches-shampoo\\/NEU_Selsun.JPG\"',NULL,'2022-03-31 13:24:49',0),
	(214,119,'THOMADUO 400 mg/100 mg Filmtabletten','',1,0,1,0,0,0,'11/2021','11/2021','\"\\/products\\/thomaduo\\/cropped-images\\/ThomaDuo_packshot_24er-36-61-664-412-1648734941.png\"',NULL,'2022-03-31 13:55:44',0),
	(224,125,'DULCOSOFT Flüssig','',1,0,0,0,0,1,'04/2021','','\"\\/products\\/dulcosoft\\/cropped-images\\/Dulcosoft_packshot_250ml-1-20-253-462-1648471715.png\"',NULL,'2022-03-28 12:48:38',0),
	(226,127,'MUCONATURAL complete Sirup','',1,0,0,0,0,1,'01/2017','','\"\\/products\\/muconatural-complete\\/muconatural-complete-sirup\\/Muconatural_packshot128g__003_.png\"',NULL,'2022-03-28 13:24:42',0),
	(230,130,'NOVANIGHT Tabletten','',1,0,0,1,0,0,'11/2020','','\"\\/products\\/novanight\\/cropped-images\\/Novanight_packshot_IR-16-54-460-448-1648476396.png\"',NULL,'2022-03-28 14:10:51',0),
	(234,131,'BUSCOMINT 0,2 ml Reizdarmkapseln','',1,0,1,0,0,0,'01/2021','07/2021','\"\\/products\\/buscomint\\/cropped-images\\/Buscomint_48er-0-0-0-0-1648456520.png\"',NULL,'2022-03-28 08:35:24',0),
	(242,135,'ALLENASAL Protect','',1,0,0,0,0,1,'01/2022','','\"\\/products\\/allenasal-protect\\/cropped-images\\/allenasal_packshot3d_neu-82-82-236-450-1652348526.png\"',NULL,'2022-05-12 09:42:09',0),
	(245,137,'DULCOSOFT DUO Pulver für Trinklösung','',1,0,0,0,0,1,'02/2021','','\"\\/products\\/dulcosoft-duo\\/cropped-images\\/DulcoSoft_DUO_mitDose-7-1-436-452-1648460190.png\"',NULL,'2022-03-28 09:36:39',0),
	(246,138,'BUSCOPAN PLUS Paracetamol 10 mg/ 500 mg Filmtabletten','',1,0,1,0,0,0,'02/2020','02/2020','\"\\/products\\/buscopan-plus\\/cropped-images\\/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-13-14-660-408-1648458166.png\"',NULL,'2022-03-28 09:02:49',0),
	(247,139,'ESSENTIALE forte - Kapseln','',1,1,1,0,0,0,'07/2021','02/2022','\"\\/products\\/essentiale\\/cropped-images\\/essentiale_packshot3D-72-117-342-422-1648472058.png\"',NULL,'2022-03-28 12:54:22',0),
	(248,140,'BIOFLORIN (veränderte Inhaltsstoffe - neuer Hersteller)','',1,0,0,1,0,0,'','','\"\\/products\\/bioflorin\\/Bioflorin_3dpackage.png\"','2022-02-08 17:15:35','2022-06-03 07:16:00',0);

/*!40000 ALTER TABLE `sanofi_pdb_product_variants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_product_x_ingredients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_product_x_ingredients`;

CREATE TABLE `sanofi_pdb_product_x_ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_product_x_ingredients` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_product_x_ingredients` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_product_x_ingredients` (`id`, `product_id`, `ingredient_id`)
VALUES
	(1,15,15),
	(2,30,70),
	(3,36,159),
	(4,44,107),
	(5,56,16),
	(6,58,23),
	(7,60,23),
	(8,61,23),
	(9,62,23),
	(10,62,25),
	(11,63,26),
	(12,64,27),
	(13,65,28),
	(14,65,29),
	(15,93,136),
	(16,93,137),
	(17,95,67),
	(18,95,72),
	(20,105,66),
	(21,107,66),
	(22,108,90),
	(23,109,91),
	(24,112,105),
	(25,114,108),
	(28,114,111),
	(29,118,132),
	(30,119,17),
	(32,125,142),
	(33,127,29),
	(34,127,144),
	(35,127,145),
	(40,130,153),
	(41,131,154),
	(42,137,142),
	(43,137,158),
	(44,138,66),
	(46,139,160),
	(48,140,161),
	(49,135,164),
	(51,138,165);

/*!40000 ALTER TABLE `sanofi_pdb_product_x_ingredients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_products`;

CREATE TABLE `sanofi_pdb_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ingredient_type` tinyint(1) NOT NULL,
  `color_main` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_sub` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_images` text COLLATE utf8mb4_unicode_ci,
  `footnotes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sanofi_pdb_products` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_products` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_products` (`id`, `name`, `is_visible`, `description`, `area_id`, `ingredient_type`, `color_main`, `color_sub`, `raw_images`, `footnotes`, `created_at`, `updated_at`)
VALUES
	(15,'ALLEGRA',1,'<ul>\r\n	<li>bei Erwachsenen und Jugendlichen ab dem 12. Lebensjahr&nbsp;</li>\r\n	<li>lindert die Symptome bei Heuschnupfen (sogenannte „saisonale allergische Rhinitis“)&nbsp;</li>\r\n	<li>lindert Beschwerden wie\r\n		<br>- Niesen\r\n		<br>- eine juckende, rinnende oder verstopfte Nase und\r\n		<br>- juckende, gerötete und tränende Augen</li>\r\n</ul>\r\n\r\n<p>Bei Vorliegen eines Rezeptes, bezahlen Sie nur die Rezeptgebühr.</p>',42,2,'#853A92','#C83D99','[{\"path\":\"\\/products\\/allegra\\/Allegra-120mg-10Filmtab-4200032-02092016.jpg\"}]','[]',NULL,'2022-03-31 11:24:41'),
	(30,'NOVALGIN',1,'',67,2,'#008381','#2C779B','[{\"path\":\"\\/products\\/novalgin\\/Novalgin-1g-10Ampullen-0038801-02092016.jpg\"}]','[]',NULL,'2022-05-12 09:55:03'),
	(36,'MAALOX',1,'',67,2,'#0076C6','#6DC0EC','[{\"path\":\"\\/products\\/maalox\\/Maalox-Antacidum-20Kautab-1520434-02092016.jpg\"}]','[]',NULL,'2022-05-12 09:53:07'),
	(44,'BATRAFEN',1,'<ul>\r\n	<li>wirkt pilztötend gegen Erreger von Nagelpilzerkrankungen</li>\r\n</ul>',29,2,'#A70E76','#D47A00','[{\"path\":\"\\/products\\/batrafen-antimykotischer-nagellack\\/Batrafen.jpg\"}]','[]',NULL,'2022-03-28 08:09:52'),
	(56,'BISOLVON',1,'<ul>\r\n	<li>BISOLVON Lösung dient der Behandlung von zähem und angestautem Schleim und erleichtert sein Abhusten</li>\r\n</ul>',43,2,'#1D447A','#FF7704','[{\"path\":\"\\/products\\/bisolvon\\/cropped-images\\/Bisolvon L\\u00f6sung 100 ml-156-82-256-492-1648455951.png\"}]','[]',NULL,'2022-03-28 08:25:53'),
	(58,'MUCOANGIN',1,'',37,2,'#0061A0','#009AE0','[{\"path\":\"\\/products\\/mucoangin\\/cropped-images\\/Mucoangin_Lutschtabletten-98-115-534-392-1648473665.png\"}]','[]',NULL,'2022-03-28 13:23:03'),
	(60,'MUCOSAN',0,'',41,2,'#676559','#EBA329','[{\"path\":\"\\/products\\/mucosan\\/NEU_Mucosan.JPG\"}]','[]',NULL,'2022-04-29 06:12:17'),
	(61,'MUCOSOLVAN',1,'<ul>\r\n	<li>löst den Hustenschleim</li>\r\n	<li>erleichtert das Abhusten</li>\r\n</ul>',43,2,'#003188','#F1001A','[{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/Mucosolvan-132-34-430-380-1649083604.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A0727653-h2-0-0-0-0-1648474784.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A3517985-h3-0-0-0-0-1648474867.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A0990735-h3-0-0-0-0-1649321502.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A3517991-h3-0-0-0-0-1648474831.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A0727676-h3-0-0-0-0-1648474850.jpg\"},{\"path\":\"\\/products\\/mucosolvan\\/cropped-images\\/A0727653-h3-0-0-0-0-1649321522.jpg\"}]','[]',NULL,'2022-04-07 08:52:23'),
	(62,'MUCOSPAS',1,'',67,2,'#00B7F1','#F39C12','[{\"path\":\"\\/products\\/mucospas\\/cropped-images\\/Mucospas-168-33-340-380-1649083352.jpg\"}]','[]',NULL,'2022-05-12 09:54:30'),
	(63,'RHINOSPRAY',1,'<ul>\r\n	<li>Tramazolin befreit die Nase</li>\r\n	<li>Die ätherischen Öle Eukalyptol, Menthol und Kampfer lassen einen frei durchatmen</li>\r\n	<li>Ab 6 Jahren</li>\r\n</ul>',40,2,'#03418A','#13B1B6','[{\"path\":\"\\/products\\/rhinospray\\/cropped-images\\/Rhinospray-48-126-210-394-1648732565.png\"},{\"path\":\"\\/products\\/rhinospray\\/cropped-images\\/A1283394-h2-0-0-0-0-1648732576.jpg\"},{\"path\":\"\\/products\\/rhinospray\\/cropped-images\\/A1283394-h3-0-0-0-0-1648732587.jpg\"}]','[]',NULL,'2022-03-31 13:22:07'),
	(64,'MUCOMAT (vormals SILOMAT)',1,'<ul>\r\n	<li>stillt den Reizhusten nach 15 Minuten</li>\r\n	<li>ab 6 Jahren</li>\r\n</ul>',43,2,'#58B8D0','#38347A','[{\"path\":\"\\/products\\/silomat\\/cropped-images\\/Mucomat_packshot_high-0-0-0-0-1649415708.png\"}]','[]',NULL,'2022-04-08 11:04:36'),
	(65,'SILOMAT Eibisch/Honig',1,'',6,1,'#58B8D0','#38347A','[{\"path\":\"\\/products\\/silomat-eibischhonig-sirup\\/Silomat_Eibisch.png\"}]','[]',NULL,'2022-03-31 13:47:08'),
	(93,'FINALGON',1,'<ul>\r\n	<li>fördert die Hautdurchblutung bei Muskel- und Gelenkbeschwerden</li>\r\n	<li>dient zur Behandlung von akuten Rückenschmerzen</li>\r\n</ul>',35,2,'#C0392B','#0033A0','[{\"path\":\"\\/products\\/finalgon-salbe\\/cropped-images\\/Finalgon_Salbe-31-0-600-340-1648472763.png\"}]','[]',NULL,'2022-03-28 13:09:10'),
	(95,'THOMAPYRIN',1,'<ul>\r\n	<li>bei Kopfschmerzen, insbesondere Spannungskopfschmerzen</li>\r\n	<li>bei Migräneanfällen mit und ohne Aura</li>\r\n	<li>bei Zahnschmerzen und Regelschmerzen</li>\r\n	<li>bei Erkältungskrankheiten und grippalen Infekten, um Schmerzen zu lindern und Fieber zu senken</li>\r\n	<li>optimale Kombination der bewährten Wirkstoffe ASS, Paracetamol und Coffein</li>\r\n	<li>kombiniert seine drei Wirkstoffe so ideal, dass die schmerzlindernde Wirkung verstärkt wird</li>\r\n	<li>die Kombination ist den einzelnen hochdosierten Wirkstoffen (ASS, Paracetamol) überlegen: durch ihre unterschiedlichen analgetischen Angriffspunkte ergänzen sich ASS und Paracetamol in ihrer Anti-Schmerzwirkung, Coffein verstärkt die schmerzlindernde Eigenschaft von Paracetamol und ASS. So kann auch die Dosis der Einzelwirkstoffe pro Tablette möglichst geringgehalten werden.</li>\r\n	<li>wirkt dank der 3-fach Power nicht nur stärker, sondern auch 15 Minuten schneller*&nbsp;</li>\r\n	<li>überlegene Wirksamkeit klinisch belegt</li>\r\n	<li>gut verträglich</li>\r\n	<li>kann bereits ab 12 Jahren eingenommen werden</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.thomapyrin.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.thomapyrin.at</a></p>\r\n\r\n<p><sup>*15 Minuten schneller als 1000mg Paracetamol, 1000mg ASS</sup></p>',14,2,'#003156','#009FDA','[{\"path\":\"\\/products\\/thomapyrin\\/cropped-images\\/TY_packshot_60stk_2020-12-24-670-344-1648735340.png\"},{\"path\":\"\\/products\\/thomapyrin\\/cropped-images\\/A0694267-h2-0-0-0-0-1648735352.jpg\"},{\"path\":\"\\/products\\/thomapyrin\\/cropped-images\\/A0694267-h3-0-0-0-0-1648735363.jpg\"},{\"path\":\"\\/products\\/thomapyrin\\/cropped-images\\/A0694267-h4-0-0-0-0-1648735373.jpg\"},{\"path\":\"\\/products\\/thomapyrin\\/cropped-images\\/A0694267-h5-0-0-0-0-1648735385.jpg\"}]','[]',NULL,'2022-03-31 14:03:47'),
	(105,'BUSCAPINA',1,'',67,2,'#16874F','#FFAB40','[{\"path\":\"\\/products\\/buscapina\\/cropped-images\\/Buscapina-141-84-384-302-1649083410.jpg\"}]','[]',NULL,'2022-05-12 09:51:18'),
	(107,'BUSCOPAN',1,'<p>Sanfte Linderung bei Bauchschmerzen und -krämpfen</p>\r\n\r\n<ul>\r\n	<li>entspannt die verkrampfte Magen- und Darmmuskulatur und unterbindet deren Überaktivität</li>\r\n	<li>löst die Verspannung</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.buscopan.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.buscopan.at</a></p>',63,2,'#16874F','#F1C40F','[{\"path\":\"\\/products\\/buscopan\\/cropped-images\\/Buscopan-110-77-426-306-1649083278.jpg\"},{\"path\":\"\\/products\\/buscopan\\/cropped-images\\/a3521828a0008763h2-0-0-0-0-1648457515.jpg\"},{\"path\":\"\\/products\\/buscopan\\/cropped-images\\/a3521828a0008763h3-0-0-0-0-1648457532.jpg\"}]','[]',NULL,'2022-04-04 14:41:22'),
	(108,'DULCOLAX',1,'<ul>\r\n	<li>befreit bei Verstopfung schnell und zuverlässig</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.dulcolax.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.dulcolax.at</a></p>',61,2,'#076333','#A6C503','[{\"path\":\"\\/products\\/dulcolax\\/cropped-images\\/Dulcolax-138-47-396-372-1649083510.jpg\"},{\"path\":\"\\/products\\/dulcolax\\/cropped-images\\/a3512350a3512344a0018023a0018017h2-0-0-0-0-1648458879.jpg\"},{\"path\":\"\\/products\\/dulcolax\\/cropped-images\\/a3512350a3512344h3-0-0-0-0-1648458909.jpg\"},{\"path\":\"\\/products\\/dulcolax\\/cropped-images\\/a0018023a0018017h3-0-0-0-0-1648458924.jpg\"}]','[]',NULL,'2022-04-04 14:45:13'),
	(109,'GUTTALAX',1,'<ul>\r\n	<li>wirkt ausschließlich im Dickdarm, wo die Verstopfung sitzt</li>\r\n	<li>sorgt für die Anregung der Dickdarmmuskulatur und unterstützt so die Darmbewegung</li>\r\n	<li>individuell dosierbar</li>\r\n	<li>Wirkungseintritt: i.d.R. innerhalb von 10 Stunden</li>\r\n</ul>\r\n\r\n<p>Bei Vorliegen eines Rezeptes, bezahlen Sie nur die Rezeptgebühr.</p>',61,2,'#076333','#A6C503','[{\"path\":\"\\/products\\/guttalax-tropfen\\/cropped-images\\/Guttalax-75-72-250-444-1648473167.png\"}]','[]',NULL,'2022-03-31 11:24:52'),
	(112,'ANTISTAX',1,'<ul>\r\n	<li>Zur Behandlung von Beschwerden bei Erkrankungen der Beinvenen</li>\r\n	<li>Enthält venenaktive, pflanzliche Schutzstoffe aus dem Extrakt des roten Weinlaubs</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.antistax.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.antistax.at</a>&nbsp;</p>',28,2,'#880038','#F80000','[{\"path\":\"\\/products\\/antistax\\/cropped-images\\/Antistax-134-19-400-414-1649083455.jpg\"},{\"path\":\"\\/products\\/antistax\\/cropped-images\\/A3520415-h2-0-0-0-0-1648454736.jpg\"},{\"path\":\"\\/products\\/antistax\\/cropped-images\\/A2337643-h2-0-0-0-0-1648454762.jpg\"},{\"path\":\"\\/products\\/antistax\\/cropped-images\\/A2337666-h2-0-0-0-0-1648454777.jpg\"},{\"path\":\"\\/products\\/antistax\\/cropped-images\\/A2337666-h3-0-0-0-0-1648454793.jpg\"}]','[]',NULL,'2022-04-04 14:44:18'),
	(114,'PHARMATON Vital',1,'<p>PHARMATON Vital enthält:</p>\r\n\r\n<ul>\r\n	<li>Ginseng G115…\r\n		<br>… für körperliches und geistiges Wohlbefinden.\r\n		<br>… zur Unterstützung der Vitalität des Körpers und der Widerstandsfähigkeit gegen Stress.\r\n		<br>\r\n		<br>\r\n	</li>\r\n	<li>Vitamine C, B2, B6, B12…</li>\r\n	<li>Folsäure…</li>\r\n	<li>Niacin...\r\n		<br>… tragen zur Verringerung von Erschöpfung und Müdigkeit bei.</li>\r\n</ul>',56,1,'#FD7900','#F63000','[{\"path\":\"\\/products\\/pharmaton-vital\\/pharmaton-vital\\/cropped-images\\/PHvital_100packshot_21_low-1-2-262-442-1648732036.png\"},{\"path\":\"\\/products\\/pharmaton-vital\\/cropped-images\\/A1314930-h2-0-0-0-0-1648732324.jpg\"},{\"path\":\"\\/products\\/pharmaton-vital\\/cropped-images\\/A1314930-h3-0-0-0-0-1648732338.jpg\"}]','[]',NULL,'2022-03-31 13:12:28'),
	(118,'SELSUN',1,'',44,2,'#00AD82','#91726B','[{\"path\":\"\\/products\\/selsun-medizinisches-shampoo\\/NEU_Selsun.JPG\"}]','[]',NULL,'2022-03-31 13:24:54'),
	(119,'THOMADUO',1,'<ul>\r\n	<li>bei Kopfschmerzen, auch in Verbindung mit Schulter- und Nackenschmerzen</li>\r\n	<li>eine clevere Kombination der beiden Wirkstoffe Ibuprofen und Coffein:\r\n		<br>- Ibuprofen wirkt schmerz- und entzündungshemmend\r\n		<br>- Coffein beschleunigt und verstärkt die Wirkung</li>\r\n	<li>wirkt schneller und stärker* gegen den Schmerz</li>\r\n	<li>spürbare Wirkung bereits nach 15 Minuten</li>\r\n	<li>leicht zu schlucken</li>\r\n	<li>gut verträglich</li>\r\n	<li>laktose-, glutenfrei und frei von tierischen Bestandteilen</li>\r\n	<li>auch auf nüchternen Magen einzunehmen</li>\r\n</ul>\r\n\r\n<p>Weitere Informationen unter <a href=\"//www.konaschu.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.konaschu.at</a></p>\r\n\r\n<p><sup>*als sein Einzelwirkstoff Ibuprofen 400mg</sup></p>',14,2,'#0B1E61','#EB038C','[{\"path\":\"\\/products\\/thomaduo\\/cropped-images\\/ThomaDuo_packshot_24er-35-55-668-420-1648734805.png\"},{\"path\":\"\\/products\\/thomaduo\\/cropped-images\\/a4480534a4480528h2-0-0-0-0-1648734815.jpg\"},{\"path\":\"\\/products\\/thomaduo\\/cropped-images\\/a4480534a4480528h3-0-0-0-0-1648734827.jpg\"},{\"path\":\"\\/products\\/thomaduo\\/cropped-images\\/a4480534a4480528h4-0-0-0-0-1648734839.jpg\"}]','[]',NULL,'2022-04-04 14:53:19'),
	(125,'DULCOSOFT Flüssig',1,'<ul>\r\n	<li>einfache und gut verträgliche Hilfe bei hartem Stuhlgang</li>\r\n	<li>nach Rücksprache mit dem Arzt bereits für Kinder ab 6 Monaten, Schwangere und stillende Mütter geeignet</li>\r\n	<li>weicht harten Stuhl auf &nbsp;</li>\r\n	<li>geschmacksneutral</li>\r\n	<li>frei von Zucker, Kochsalz, Gluten, Laktose, Aroma und tierischen Bestandteilen</li>\r\n	<li>sanfter Wirkeintritt nach 24 bis 72 Stunden</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen finden Sie&nbsp;<a href=\"https://www.dulcolax.at/dulcosoftfluessig\" rel=\"noopener noreferrer\" target=\"_blank\">hier</a></p>',50,1,'#0090AC','#005F1A','[{\"path\":\"\\/products\\/dulcosoft\\/cropped-images\\/Dulcosoft_packshot_250ml-3-17-230-434-1648471647.png\"},{\"path\":\"\\/products\\/dulcosoft\\/cropped-images\\/A4481232_h2-0-0-0-0-1648471661.jpg\"},{\"path\":\"\\/products\\/dulcosoft\\/cropped-images\\/A8000416-h3-0-0-0-0-1648471675.jpg\"}]','[]',NULL,'2022-03-28 13:04:18'),
	(127,'MUCONATURAL complete',0,'',43,1,'#001379','#00A730','[{\"path\":\"\\/products\\/muconatural-complete\\/Muconatural_packshot128g__003_.png\"}]','[]',NULL,'2022-04-29 06:12:55'),
	(130,'NOVANIGHT',1,'<p>Natürlich gut schlafen<sup>1,2,3</sup></p>\r\n\r\n<ol>\r\n	<li>Einschlafen\r\n		<br>Melatonin<sup>1</sup> ist ein körpereigenes Hormon und trägt zur Verkürzung der Einschlafphase bei. 1mg Melatonin vor dem Schlafengehen</li>\r\n	<li>Durchschlafen\r\n		<br>Zitronenmelisse<sup>2</sup> hilft einen gesunden Schlaf aufrecht zu erhalten und durchzuschlafen.</li>\r\n	<li>Erholt Aufwachen\r\n		<br>Passionsblume und kalifornischer Mohn<sup>3</sup> tragen zur Entspannung bei und unterstützen einen erholsamen Schlaf.</li>\r\n</ol>',55,1,'#001869','#00CCED','[{\"path\":\"\\/products\\/novanight\\/cropped-images\\/Novanight_packshot_IR-17-50-446-452-1648476309.png\"},{\"path\":\"\\/products\\/novanight\\/cropped-images\\/A5184200-h2-0-0-0-0-1648476320.jpg\"},{\"path\":\"\\/products\\/novanight\\/cropped-images\\/A5184200-h3-0-0-0-0-1648476334.jpg\"},{\"path\":\"\\/products\\/novanight\\/cropped-images\\/A5184200-h4-0-0-0-0-1648476345.jpg\"}]','[]',NULL,'2022-03-28 14:06:45'),
	(131,'BUSCOMINT',1,'<p>Entspannter leben mit Reizdarm.\r\n	<br>Mit dem rein pflanzlichen Wirkstoff: Pfefferminzöl 0,2 ml (182 mg)</p>\r\n\r\n<ul>\r\n	<li>lindert Reizdarm-Symptome wie leichte Bauchschmerzen und -krämpfe sowie Blähungen</li>\r\n	<li>wirkt krampflösend und entblähend</li>\r\n	<li>100% natürlicher Wirkstoff: Pfefferminzöl</li>\r\n	<li>sanfte und natürliche Symptomlinderung</li>\r\n	<li>langfristige Anwendung nach Abklärung mit Arzt möglich (max. 3 Monate)</li>\r\n</ul>',53,2,'#008A2F','#7CB9A0','[{\"path\":\"\\/products\\/buscomint\\/cropped-images\\/Buscomint_24er-0-0-0-0-1648456396.png\"}]','[]',NULL,'2022-03-28 08:35:57'),
	(135,'ALLENASAL Protect',1,'<ul>\r\n	<li>lindert die Symptome bei Heuschnupfen</li>\r\n	<li>die Ergänzung zum oralen Antihistaminikum bei allergischem Schnupfen&nbsp;</li>\r\n	<li>wirkt lokal auf der Nasenschleimhaut und bildet einen leichten Schutzfilm</li>\r\n	<li>lindert Nasenverstopfung</li>\r\n	<li>repariert die oft geschädigte Nasenschleimhaut&nbsp;</li>\r\n	<li>riecht angenehm nach den ätherischen Öle der Zitrone</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.allenasal.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.allenasal.at</a></p>',31,2,'#7F0D87','#B40084','[{\"path\":\"\\/products\\/allenasal-protect\\/cropped-images\\/allenasal_packshot3d_neu-72-78-260-452-1652348494.png\"},{\"path\":\"\\/products\\/allenasal-protect\\/cropped-images\\/A5373504-h2-0-0-0-0-1647598479.jpg\"},{\"path\":\"\\/products\\/allenasal-protect\\/cropped-images\\/A5373504-h3-0-0-0-0-1647598494.jpg\"},{\"path\":\"\\/products\\/allenasal-protect\\/cropped-images\\/A5373504-h4-0-0-0-0-1647598510.jpg\"}]','[]',NULL,'2022-05-12 09:41:41'),
	(137,'DULCOSOFT DUO',1,'<ul>\r\n	<li>Pulver in mind. 150ml Getränk der Wahl auflösen</li>\r\n	<li>2-fach Wirkung: weicht harten Stuhl auf und reduziert Blähungen</li>\r\n	<li>geschmacksneutral, frei von Zucker, Gluten und Kochsalz</li>\r\n	<li>Für eine Anwendung in Schwangerschaft und Stillzeit und für Kinder ab 6 Monaten geeignet.*&nbsp;</li>\r\n	<li>Die Wirkung tritt in der Regel nach 24-72 Stunden ein.&nbsp;</li>\r\n</ul>\r\n\r\n<p><sub>*In diesen Fällen ist es ratsam, vor der Anwendung Ihren Arzt oder Ihre Ärztin zu fragen.</sub></p>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.dulcosoftduo.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.dulcosoftduo.at</a></p>',62,1,'#0090AC','#AD0078','[{\"path\":\"\\/products\\/dulcosoft-duo\\/cropped-images\\/DulcoSoft_DUO_mitDose-13-3-432-446-1648460084.png\"},{\"path\":\"\\/products\\/dulcosoft-duo\\/cropped-images\\/A5430260-h2-0-0-0-0-1648460095.jpg\"},{\"path\":\"\\/products\\/dulcosoft-duo\\/cropped-images\\/A5430260-h3-0-0-0-0-1648460106.jpg\"},{\"path\":\"\\/products\\/dulcosoft-duo\\/cropped-images\\/A5430260-h4-0-0-0-0-1648460117.jpg\"}]','[]',NULL,'2022-03-31 14:32:26'),
	(138,'BUSCOPAN PLUS',1,'<p>Stärker als Dein Bauchschmerz.</p>\r\n\r\n<ul>\r\n	<li>bei stärkeren Schmerzen und Krämpfen - verursacht z.B. durch Magen-Darm-Infekt, Durchfall, Regelschmerzen, Blasenentzündung</li>\r\n	<li>kombiniert das magenverträgliche Schmerzmittel Paracetamol mit dem gezielt wirkenden Krampflöser Butylscopolamin</li>\r\n	<li>2-fach Wirkung: es löst den Krampf und befreit vom Schmerz</li>\r\n	<li>Die Kerbe der Tablette ist nicht zum Teilen bestimmt.</li>\r\n</ul>\r\n\r\n<p>Mehr Informationen unter <a href=\"//www.buscopan.at\" rel=\"noopener noreferrer\" target=\"_blank\">www.buscopan.at</a></p>',63,2,'#16874F','#FFAB40','[{\"path\":\"\\/products\\/buscopan-plus\\/cropped-images\\/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-7-0-664-430-1648458052.png\"},{\"path\":\"\\/products\\/buscopan-plus\\/cropped-images\\/A3904096_h2-0-0-0-0-1648458115.jpg\"}]','[]',NULL,'2022-03-28 09:01:58'),
	(139,'ESSENTIALE',1,'',67,2,'#992000','#F56C00','[{\"path\":\"\\/products\\/essentiale\\/cropped-images\\/essentiale_packshot3D-49-99-346-410-1648472020.png\"}]','[]',NULL,'2022-05-12 09:52:20'),
	(140,'BIOFLORIN (Nahrungsergänzungsmittel)',0,'<p>Eine gesunde Darmschleimhaut spielt eine wichtige Rolle für die Verdauung und &nbsp;für das Immunsystem. &nbsp;</p>\r\n\r\n<p>BIOFLORIN (Nahrungsergänzungsmittel, neue Rezeptur) kann mit seinen Inhaltsstoffen einen wichtigen Beitrag dazu leisten.¹ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<ul>\r\n	<li>ideal für Kinder (ab 3 Jahren): mit fruchtigem Erdbeergeschmack &amp; zuckerfrei</li>\r\n	<li>kann gleichzeitig zum Antibiotikum eingenommen werden</li>\r\n	<li>zur Erhaltung der Darmgesundheit</li>\r\n	<li>praktischer Reisebegleiter zur Erhaltung der normalen Darmfunktion:\r\n		<br>rechtzeitig vor und während der Reise</li>\r\n</ul>\r\n\r\n<p><strong>Verzehrsempfehlung</strong></p>\r\n\r\n<ul>\r\n	<li>Empfohlene Tagesdosis: 1 Direkt-Stick täglich</li>\r\n	<li>Empfohlene Dauer der Einnahme: 1 Monat. Bei Bedarf kann die Einnahme verlängert werden.</li>\r\n	<li>Kinder über 6 Jahre und Erwachsene: Nehmen Sie täglich den Inhalt eines Direkt-Sticks direkt in den Mund ein.</li>\r\n	<li>Kinder von 3 bis 6 Jahren: Es wird empfohlen, den Inhalt eines Direkt-Sticks in ein kleines Glas Wasser zu geben.</li>\r\n	<li>Nicht geeignet für Kinder unter 3 Jahren.</li>\r\n</ul>',65,1,'#56A0E5','#9ECA43','[{\"path\":\"\\/products\\/bioflorin\\/Bioflorin_3dpackage.png\"},{\"path\":\"\\/products\\/bioflorin\\/cropped-images\\/A5377703-h2-0-0-0-0-1650974087.jpg\"},{\"path\":\"\\/products\\/bioflorin\\/cropped-images\\/A5377703-h3-0-0-0-0-1648455308.jpg\"},{\"path\":\"\\/products\\/bioflorin\\/cropped-images\\/A5377703-h4-0-0-0-0-1648455321.jpg\"}]','[{\"text\":\"<p>Vitamin A tr\\u00e4gt zur Erhaltung normaler Schleimh\\u00e4ute, wie zum Beispiel der Darmschleimhaut, bei.<\\/p>\\r\\n\"},{\"text\":\"<p>Vitamin A, Vitamin D, Vitamin B6, Vitamin B12 und Fols\\u00e4ure tragen zur normalen Funktion des Immunsystems bei. Vitamin B6, B12 und Fols\\u00e4ure tragen zur Verringerung von M\\u00fcdigkeit und Erm\\u00fcdung und zu einem normalen Energiestoffwechsel bei.<\\/p>\\r\\n\"}]','2022-02-08 17:03:15','2022-06-03 07:15:26');

/*!40000 ALTER TABLE `sanofi_pdb_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sanofi_pdb_sanmedical_redirects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sanofi_pdb_sanmedical_redirects`;

CREATE TABLE `sanofi_pdb_sanmedical_redirects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pzn` varchar(100) NOT NULL DEFAULT '',
  `pdf1` varchar(300) DEFAULT NULL,
  `pdf2` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pzn` (`pzn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sanofi_pdb_sanmedical_redirects` WRITE;
/*!40000 ALTER TABLE `sanofi_pdb_sanmedical_redirects` DISABLE KEYS */;

INSERT INTO `sanofi_pdb_sanmedical_redirects` (`id`, `pzn`, `pdf1`, `pdf2`, `created_at`, `updated_at`)
VALUES
	(1,'1260571','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25456&accId=&PID=01t0N00000BSRoEQAX&PN=01t0N00000BSRoEQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24899&accId=&PID=01t0N00000BSRoEQAX&PN=01t0N00000BSRoEQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(2,'2469988','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25488&accId=&PID=01t0N00000BSRoGQAX&PN=01t0N00000BSRoGQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24980&accId=&PID=01t0N00000BSRoGQAX&PN=01t0N00000BSRoGQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(3,'2469994','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25772&accId=&PID=01t0N00000BSRoIQAX&PN=01t0N00000BSRoIQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25236&accId=&PID=01t0N00000BSRoIQAX&PN=01t0N00000BSRoIQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(4,'2470017','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25498&accId=&PID=01t0N00000BSRoKQAX&PN=01t0N00000BSRoKQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24970&accId=&PID=01t0N00000BSRoKQAX&PN=01t0N00000BSRoKQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(5,'2434027','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25540&accId=&PID=01t0N00000BSRoMQAX&PN=01t0N00000BSRoMQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24919&accId=&PID=01t0N00000BSRoMQAX&PN=01t0N00000BSRoMQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(6,'2467788','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25603&accId=&PID=01t0N00000BSRoOQAX&PN=01t0N00000BSRoOQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24859&accId=&PID=01t0N00000BSRoOQAX&PN=01t0N00000BSRoOQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(7,'1290520','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25378&accId=&PID=01t0N00000BSRoQQAX&PN=01t0N00000BSRoQQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25067&accId=&PID=01t0N00000BSRoQQAX&PN=01t0N00000BSRoQQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(8,'3928168','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25787&accId=&PID=01t0N00000BSRoSQAX&PN=01t0N00000BSRoSQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24792&accId=&PID=01t0N00000BSRoSQAX&PN=01t0N00000BSRoSQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(9,'4467841','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25831&accId=&PID=01t0N00000BSRoUQAX&PN=01t0N00000BSRoUQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25223&accId=&PID=01t0N00000BSRoUQAX&PN=01t0N00000BSRoUQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(10,'4989918','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=45234&accId=&PID=01t5p00000AfSrWAAV&PN=01t5p00000AfSrWAAV','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=45176&accId=&PID=01t5p00000AfSrWAAV&PN=01t5p00000AfSrWAAV','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(11,'3920623','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25853&accId=&PID=01t0N00000BSRoXQAX&PN=01t0N00000BSRoXQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24761&accId=&PID=01t0N00000BSRoXQAX&PN=01t0N00000BSRoXQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(12,'2448555','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25974&accId=&PID=01t0N00000BSRoZQAX&PN=01t0N00000BSRoZQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24842&accId=&PID=01t0N00000BSRoZQAX&PN=01t0N00000BSRoZQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(13,'2430319','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25975&accId=&PID=01t0N00000BSRoZQAX&PN=01t0N00000BSRoZQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24842&accId=&PID=01t0N00000BSRoZQAX&PN=01t0N00000BSRoZQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(14,'3927542','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25926&accId=&PID=01t0N00000BSRocQAH&PN=01t0N00000BSRocQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24734&accId=&PID=01t0N00000BSRocQAH&PN=01t0N00000BSRocQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(15,'1315467','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25784&accId=&PID=01t0N00000BSRoeQAH&PN=01t0N00000BSRoeQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25235&accId=&PID=01t0N00000BSRoeQAH&PN=01t0N00000BSRoeQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(16,'3502245','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25999&accId=&PID=01t0N00000BSRogQAH&PN=01t0N00000BSRogQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24718&accId=&PID=01t0N00000BSRogQAH&PN=01t0N00000BSRogQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(17,'3502251','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25999&accId=&PID=01t0N00000BSRogQAH&PN=01t0N00000BSRogQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24718&accId=&PID=01t0N00000BSRogQAH&PN=01t0N00000BSRogQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(18,'4222163','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43888&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43861&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(19,'4222200','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43862&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43861&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(20,'1346315','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25840&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24826&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(21,'1346338','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25841&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24826&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(22,'2446651','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25445&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24826&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(23,'2446697','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25531&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24850&accId=&PID=01t0N00000BSRp1QAH&PN=01t0N00000BSRp1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(24,'1297344','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25788&accId=&PID=01t0N00000BSRpAQAX&PN=01t0N00000BSRpAQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25232&accId=&PID=01t0N00000BSRpAQAX&PN=01t0N00000BSRpAQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(25,'4960961','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25547&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25103&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(26,'559285','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25495&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25060&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(27,'4960978','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25452&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25088&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(28,'559291','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25483&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25078&accId=&PID=01t0N00000BSRpCQAX&PN=01t0N00000BSRpCQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(29,'3773470','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25835&accId=&PID=01t0N00000BSRpWQAX&PN=01t0N00000BSRpWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25099&accId=&PID=01t0N00000BSRpWQAX&PN=01t0N00000BSRpWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(30,'4954297','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25738&accId=&PID=01t0N00000BSRpaQAH&PN=01t0N00000BSRpaQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24805&accId=&PID=01t0N00000BSRpaQAH&PN=01t0N00000BSRpaQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(31,'4955351','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25843&accId=&PID=01t0N00000BSRpcQAH&PN=01t0N00000BSRpcQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24757&accId=&PID=01t0N00000BSRpcQAH&PN=01t0N00000BSRpcQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(32,'618585','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25973&accId=&PID=01t0N00000BSRpgQAH&PN=01t0N00000BSRpgQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25191&accId=&PID=01t0N00000BSRpgQAH&PN=01t0N00000BSRpgQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(33,'3544717','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25642&accId=&PID=01t0N00000BSRpiQAH&PN=01t0N00000BSRpiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24830&accId=&PID=01t0N00000BSRpiQAH&PN=01t0N00000BSRpiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(34,'3759582','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25964&accId=&PID=01t0N00000BSRpkQAH&PN=01t0N00000BSRpkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24730&accId=&PID=01t0N00000BSRpkQAH&PN=01t0N00000BSRpkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(35,'3524784','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25963&accId=&PID=01t0N00000BSRpkQAH&PN=01t0N00000BSRpkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24730&accId=&PID=01t0N00000BSRpkQAH&PN=01t0N00000BSRpkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(36,'3762101','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26016&accId=&PID=01t0N00000BSRppQAH&PN=01t0N00000BSRppQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24711&accId=&PID=01t0N00000BSRppQAH&PN=01t0N00000BSRppQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(37,'3540056','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25858&accId=&PID=01t0N00000BSRptQAH&PN=01t0N00000BSRptQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24755&accId=&PID=01t0N00000BSRptQAH&PN=01t0N00000BSRptQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(38,'4473965','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25898&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24703&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(39,'4963586','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25896&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24702&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(40,'4473959','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25895&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24703&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(41,'4963563','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25897&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24702&accId=&PID=01t0N00000BSRpvQAH&PN=01t0N00000BSRpvQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(42,'4214353','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25994&accId=&PID=01t0N00000BSRq0QAH&PN=01t0N00000BSRq0QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24720&accId=&PID=01t0N00000BSRq0QAH&PN=01t0N00000BSRq0QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(43,'4211627','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25994&accId=&PID=01t0N00000BSRq0QAH&PN=01t0N00000BSRq0QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24720&accId=&PID=01t0N00000BSRq0QAH&PN=01t0N00000BSRq0QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(44,'4960955','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=35635&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24819&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(45,'865622','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=35634&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24819&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(46,'3932081','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=53337&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24931&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(47,'752823','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=53338&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25000&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(48,'1255848','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25489&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25000&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(49,'73016','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=52067&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24902&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(50,'1336328','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25499&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24902&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(51,'171948','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25468&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24993&accId=&PID=01t0N00000BSRqLQAX&PN=01t0N00000BSRqLQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(52,'1297396','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25824&accId=&PID=01t0N00000BSRqVQAX&PN=01t0N00000BSRqVQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25225&accId=&PID=01t0N00000BSRqVQAX&PN=01t0N00000BSRqVQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(53,'678943','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=53336&accId=&PID=01t0N00000BSRqYQAX&PN=01t0N00000BSRqYQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24833&accId=&PID=01t0N00000BSRqYQAX&PN=01t0N00000BSRqYQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(54,'678972','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=53335&accId=&PID=01t0N00000BSRqYQAX&PN=01t0N00000BSRqYQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24837&accId=&PID=01t0N00000BSRqYQAX&PN=01t0N00000BSRqYQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(55,'1304920','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25480&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25094&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(56,'1304937','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25774&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25094&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(57,'1304943','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25792&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25094&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(58,'3520504','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25504&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25094&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(59,'3520510','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25793&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25094&accId=&PID=01t0N00000BSRqyQAH&PN=01t0N00000BSRqyQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(60,'1282354','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25555&accId=&PID=01t0N00000BSRr6QAH&PN=01t0N00000BSRr6QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25231&accId=&PID=01t0N00000BSRr6QAH&PN=01t0N00000BSRr6QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(61,'1282348','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25544&accId=&PID=01t0N00000BSRr6QAH&PN=01t0N00000BSRr6QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25230&accId=&PID=01t0N00000BSRr6QAH&PN=01t0N00000BSRr6QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(62,'1346700','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26050&accId=&PID=01t0N00000BSRrFQAX&PN=01t0N00000BSRrFQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24704&accId=&PID=01t0N00000BSRrFQAX&PN=01t0N00000BSRrFQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(63,'4466439','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26094&accId=&PID=01t0N00000BSRrHQAX&PN=01t0N00000BSRrHQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=34983&accId=&PID=01t0N00000BSRrHQAX&PN=01t0N00000BSRrHQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(64,'4464469','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26095&accId=&PID=01t0N00000BSRrHQAX&PN=01t0N00000BSRrHQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=34983&accId=&PID=01t0N00000BSRrHQAX&PN=01t0N00000BSRrHQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(65,'3510368','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26019&accId=&PID=01t0N00000BSRrKQAX&PN=01t0N00000BSRrKQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24710&accId=&PID=01t0N00000BSRrKQAX&PN=01t0N00000BSRrKQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(66,'2427895','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26018&accId=&PID=01t0N00000BSRrKQAX&PN=01t0N00000BSRrKQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24710&accId=&PID=01t0N00000BSRrKQAX&PN=01t0N00000BSRrKQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(67,'4211030','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26003&accId=&PID=01t0N00000BSRrNQAX&PN=01t0N00000BSRrNQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24717&accId=&PID=01t0N00000BSRrNQAX&PN=01t0N00000BSRrNQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(68,'3510374','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25550&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29410&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(69,'3501174','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25537&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29410&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(70,'24700052','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25705&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29410&accId=&PID=01t0N00000BSRrPQAX&PN=01t0N00000BSRrPQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(71,'3773441','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40016&accId=&PID=01t0N00000BSRrTQAX&PN=01t0N00000BSRrTQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40019&accId=&PID=01t0N00000BSRrTQAX&PN=01t0N00000BSRrTQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(72,'1324710','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40013&accId=&PID=01t0N00000BSRrTQAX&PN=01t0N00000BSRrTQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40019&accId=&PID=01t0N00000BSRrTQAX&PN=01t0N00000BSRrTQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(73,'3773464','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40014&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40291&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(74,'1324696','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40012&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40291&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(75,'1324704','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40015&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40021&accId=&PID=01t0N00000BSRrWQAX&PN=01t0N00000BSRrWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(76,'2423302','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25453&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40022&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(77,'1324667','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40017&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40020&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(78,'3773458','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40018&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40020&accId=&PID=01t0N00000BSRraQAH&PN=01t0N00000BSRraQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(79,'4968827','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=35600&accId=&PID=01t0N00000BT4MvQAL&PN=01t0N00000BT4MvQAL','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=45769&accId=&PID=01t0N00000BT4MvQAL&PN=01t0N00000BT4MvQAL','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(80,'4968833','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=35600&accId=&PID=01t0N00000BT4MvQAL&PN=01t0N00000BT4MvQAL','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=45769&accId=&PID=01t0N00000BT4MvQAL&PN=01t0N00000BT4MvQAL','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(81,'1298326','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25259&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25074&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(82,'1021317','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25279&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25059&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(83,'1520552','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=48174&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25097&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(84,'1292140','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=48173&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25042&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(85,'1520606','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=48172&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25113&accId=&PID=01t0N00000BSRrkQAH&PN=01t0N00000BSRrkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(86,'2447679','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25720&accId=&PID=01t0N00000BSRrrQAH&PN=01t0N00000BSRrrQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24860&accId=&PID=01t0N00000BSRrrQAH&PN=01t0N00000BSRrrQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(87,'1297367','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25536&accId=&PID=01t0N00000BSRrtQAH&PN=01t0N00000BSRrtQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24975&accId=&PID=01t0N00000BSRrtQAH&PN=01t0N00000BSRrtQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(88,'1320706','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25541&accId=&PID=01t0N00000BSRrtQAH&PN=01t0N00000BSRrtQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24975&accId=&PID=01t0N00000BSRrtQAH&PN=01t0N00000BSRrtQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(89,'1257155','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25648&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25213&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(90,'1260111','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25662&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25213&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(91,'1256517','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25851&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25212&accId=&PID=01t0N00000BSRrxQAH&PN=01t0N00000BSRrxQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(92,'3762118','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40062&accId=&PID=01t5p00000AgWPeAAN&PN=01t5p00000AgWPeAAN','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40063&accId=&PID=01t5p00000AgWPeAAN&PN=01t5p00000AgWPeAAN','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(93,'3762124','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40062&accId=&PID=01t5p00000AgWPeAAN&PN=01t5p00000AgWPeAAN','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=40063&accId=&PID=01t5p00000AgWPeAAN&PN=01t5p00000AgWPeAAN','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(94,'3919459','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25493&accId=&PID=01t0N00000BSRs1QAH&PN=01t0N00000BSRs1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24864&accId=&PID=01t0N00000BSRs1QAH&PN=01t0N00000BSRs1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(95,'3919465','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=44076&accId=&PID=01t0N00000BSRs1QAH&PN=01t0N00000BSRs1QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24864&accId=&PID=01t0N00000BSRs1QAH&PN=01t0N00000BSRs1QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(96,'60120','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25592&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24908&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(97,'69919','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25722&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24913&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(98,'147513','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25722&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24913&accId=&PID=01t0N00000BSRsBQAX&PN=01t0N00000BSRsBQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(99,'4959892','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25718&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24954&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(100,'4959900','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25604&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24920&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(101,'147507','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25595&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24947&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(102,'509577','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25711&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24968&accId=&PID=01t0N00000BSRsEQAX&PN=01t0N00000BSRsEQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(103,'1277755','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=42285&accId=&PID=01t0N00000BSRsJQAX&PN=01t0N00000BSRsJQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24940&accId=&PID=01t0N00000BSRsJQAX&PN=01t0N00000BSRsJQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(104,'851548','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25465&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25147&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(105,'851560','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25469&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25143&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(106,'523732','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25494&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25238&accId=&PID=01t0N00000BSRsWQAX&PN=01t0N00000BSRsWQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(107,'3545792','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25781&accId=&PID=01t0N00000BSRsgQAH&PN=01t0N00000BSRsgQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24794&accId=&PID=01t0N00000BSRsgQAH&PN=01t0N00000BSRsgQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(108,'2444563','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25257&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25240&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(109,'2444586','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25256&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25240&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(110,'2444592','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25255&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25240&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(111,'2422165','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25254&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25240&accId=&PID=01t0N00000BSRsiQAH&PN=01t0N00000BSRsiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(112,'2422260','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25351&accId=&PID=01t0N00000BSRsnQAH&PN=01t0N00000BSRsnQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25080&accId=&PID=01t0N00000BSRsnQAH&PN=01t0N00000BSRsnQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(113,'49259','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25844&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25214&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(114,'49271','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25849&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25215&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(115,'4223197','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25848&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25216&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(116,'440644','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25845&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25217&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(117,'67292','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25846&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25219&accId=&PID=01t0N00000BSRspQAH&PN=01t0N00000BSRspQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(118,'193105','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25847&accId=&PID=01t0N00000BSRrhQAH&PN=01t0N00000BSRrhQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25218&accId=&PID=01t0N00000BSRrhQAH&PN=01t0N00000BSRrhQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(119,'1302536','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25826&accId=&PID=01t0N00000BSRsxQAH&PN=01t0N00000BSRsxQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24770&accId=&PID=01t0N00000BSRsxQAH&PN=01t0N00000BSRsxQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(120,'1125732','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25447&accId=&PID=01t0N00000BSRszQAH&PN=01t0N00000BSRszQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24934&accId=&PID=01t0N00000BSRszQAH&PN=01t0N00000BSRszQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(121,'1280929','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25460&accId=&PID=01t0N00000BSRszQAH&PN=01t0N00000BSRszQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24921&accId=&PID=01t0N00000BSRszQAH&PN=01t0N00000BSRszQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(122,'4469633','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29462&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29424&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(123,'4469685','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29461&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29424&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(124,'4469662','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29462&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29424&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(125,'4469716','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29461&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29424&accId=&PID=01t0N00000BSRt2QAH&PN=01t0N00000BSRt2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(126,'3544700','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25984&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24763&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(127,'3544692','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25985&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24762&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(128,'4968804','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43596&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43591&accId=&PID=01t0N00000BSRt8QAH&PN=01t0N00000BSRt8QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(129,'4212874','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25899&accId=&PID=01t0N00000BSRtBQAX&PN=01t0N00000BSRtBQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24739&accId=&PID=01t0N00000BSRtBQAX&PN=01t0N00000BSRtBQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(130,'132641','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25551&accId=&PID=01t0N00000BSRtFQAX&PN=01t0N00000BSRtFQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24912&accId=&PID=01t0N00000BSRtFQAX&PN=01t0N00000BSRtFQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(131,'154039','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26099&accId=&PID=01t0N00000BSRtHQAX&PN=01t0N00000BSRtHQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29917&accId=&PID=01t0N00000BSRtHQAX&PN=01t0N00000BSRtHQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(132,'2437043','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26100&accId=&PID=01t0N00000BSRtHQAX&PN=01t0N00000BSRtHQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=29930&accId=&PID=01t0N00000BSRtHQAX&PN=01t0N00000BSRtHQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(133,'1275673','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26101&accId=&PID=01t0N00000BSRtKQAX&PN=01t0N00000BSRtKQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=30203&accId=&PID=01t0N00000BSRtKQAX&PN=01t0N00000BSRtKQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(134,'1275710','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26102&accId=&PID=01t0N00000BSRtKQAX&PN=01t0N00000BSRtKQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=30203&accId=&PID=01t0N00000BSRtKQAX&PN=01t0N00000BSRtKQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(135,'4960085','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26104&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=30204&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(136,'4960079','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26103&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=30204&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(137,'4960091','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26105&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=30204&accId=&PID=01t0N00000BSRtNQAX&PN=01t0N00000BSRtNQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(138,'509465','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25982&accId=&PID=01t0N00000BSRtRQAX&PN=01t0N00000BSRtRQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25190&accId=&PID=01t0N00000BSRtRQAX&PN=01t0N00000BSRtRQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(139,'618579','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25983&accId=&PID=01t0N00000BSRtRQAX&PN=01t0N00000BSRtRQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25189&accId=&PID=01t0N00000BSRtRQAX&PN=01t0N00000BSRtRQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(140,'1265456','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25487&accId=&PID=01t0N00000BSRtXQAX&PN=01t0N00000BSRtXQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24996&accId=&PID=01t0N00000BSRtXQAX&PN=01t0N00000BSRtXQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(141,'1265462','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25492&accId=&PID=01t0N00000BSRtXQAX&PN=01t0N00000BSRtXQAX','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24981&accId=&PID=01t0N00000BSRtXQAX&PN=01t0N00000BSRtXQAX','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(142,'3920675','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25877&accId=&PID=01t0N00000BSRtbQAH&PN=01t0N00000BSRtbQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24748&accId=&PID=01t0N00000BSRtbQAH&PN=01t0N00000BSRtbQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(143,'1347711','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=26004&accId=&PID=01t0N00000BSRtdQAH&PN=01t0N00000BSRtdQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24764&accId=&PID=01t0N00000BSRtdQAH&PN=01t0N00000BSRtdQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(144,'813714','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25472&accId=&PID=01t0N00000BSRtfQAH&PN=01t0N00000BSRtfQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24861&accId=&PID=01t0N00000BSRtfQAH&PN=01t0N00000BSRtfQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(145,'813708','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25557&accId=&PID=01t0N00000BSRtfQAH&PN=01t0N00000BSRtfQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24856&accId=&PID=01t0N00000BSRtfQAH&PN=01t0N00000BSRtfQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(146,'3786768','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25869&accId=&PID=01t0N00000BSRtkQAH&PN=01t0N00000BSRtkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24709&accId=&PID=01t0N00000BSRtkQAH&PN=01t0N00000BSRtkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(147,'3786774','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25869&accId=&PID=01t0N00000BSRtkQAH&PN=01t0N00000BSRtkQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=24709&accId=&PID=01t0N00000BSRtkQAH&PN=01t0N00000BSRtkQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(148,'1260335','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25991&accId=&PID=01t0N00000BSRtnQAH&PN=01t0N00000BSRtnQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25188&accId=&PID=01t0N00000BSRtnQAH&PN=01t0N00000BSRtnQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(149,'1286576','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25990&accId=&PID=01t0N00000BSRtnQAH&PN=01t0N00000BSRtnQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25187&accId=&PID=01t0N00000BSRtnQAH&PN=01t0N00000BSRtnQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(150,'4968649','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25842&accId=&PID=01t0N00000BSRtqQAH&PN=01t0N00000BSRtqQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=25221&accId=&PID=01t0N00000BSRtqQAH&PN=01t0N00000BSRtqQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(151,'5501988','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43880&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&CN=AT&docId=43861&accId=&PID=01t0N00000BSRoiQAH&PN=01t0N00000BSRoiQAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(152,'1127151','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35252&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24865&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(153,'2425809','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35252&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24865&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(154,'1304133','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35252&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24865&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(155,'1304156','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35252&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24865&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(156,'1304162','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35252&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24865&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(157,'2422225','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35251&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24911&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(158,'2422248','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=35251&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24911&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(159,'2422254','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=25549&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24994&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27'),
	(160,'1311682','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=25633&PN=01t0N00000BSRq2QAH','https://www.sanofimedicalinformation.com/s/document-viewer-pdf?language=de&accId=&PID=01t0N00000BSRq2QAH&docId=24911&PN=01t0N00000BSRq2QAH','2021-12-30 14:53:27','2021-12-30 14:53:27');

/*!40000 ALTER TABLE `sanofi_pdb_sanmedical_redirects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci,
  `last_activity` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_event_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_event_logs`;

CREATE TABLE `system_event_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `details` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_event_logs_level_index` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_files`;

CREATE TABLE `system_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disk_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `system_files_field_index` (`field`),
  KEY `system_files_attachment_id_index` (`attachment_id`),
  KEY `system_files_attachment_type_index` (`attachment_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_files` WRITE;
/*!40000 ALTER TABLE `system_files` DISABLE KEYS */;

INSERT INTO `system_files` (`id`, `disk_name`, `file_name`, `file_size`, `content_type`, `title`, `description`, `field`, `attachment_id`, `attachment_type`, `is_public`, `sort_order`, `created_at`, `updated_at`)
VALUES
	(1,'61faaedce6590777262270.pdf','Gebrauchsinformation.pdf',263744,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','14','Sanofi\\Pdb\\Models\\PDBProductVariant',0,1,'2022-02-02 16:18:36','2022-02-02 16:18:36'),
	(2,'61faaedce8551611658384.pdf','Fachinformation.pdf',235996,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','14','Sanofi\\Pdb\\Models\\PDBProductVariant',0,2,'2022-02-02 16:18:36','2022-02-02 16:18:36'),
	(3,'61faaedd3432d610093083.pdf','Gebrauchsinformation.pdf',264064,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','59','Sanofi\\Pdb\\Models\\PDBProductVariant',0,3,'2022-02-02 16:18:37','2022-02-02 16:18:37'),
	(4,'61faaedd35d32753692376.pdf','Fachinformation.pdf',185905,'application/pdf','Fachinformation',NULL,'pdf_file_two','59','Sanofi\\Pdb\\Models\\PDBProductVariant',0,4,'2022-02-02 16:18:37','2022-02-02 16:18:37'),
	(5,'61faaedd767bd737820165.pdf','Gebrauchsinformation.pdf',263781,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','60','Sanofi\\Pdb\\Models\\PDBProductVariant',0,5,'2022-02-02 16:18:37','2022-02-02 16:18:37'),
	(6,'61faaedd77c8e127362413.pdf','Fachinformation.pdf',185905,'application/pdf','Fachinformation',NULL,'pdf_file_two','60','Sanofi\\Pdb\\Models\\PDBProductVariant',0,6,'2022-02-02 16:18:37','2022-02-02 16:18:37'),
	(7,'61faaede8697c024667822.pdf','Gebrauchsinformation.pdf',250516,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','61','Sanofi\\Pdb\\Models\\PDBProductVariant',0,7,'2022-02-02 16:18:38','2022-02-02 16:18:38'),
	(8,'61faaede88437049638140.pdf','Fachinformation.pdf',179186,'application/pdf','Fachinformation',NULL,'pdf_file_two','61','Sanofi\\Pdb\\Models\\PDBProductVariant',0,8,'2022-02-02 16:18:38','2022-02-02 16:18:38'),
	(9,'61faaedf95f70920557992.pdf','Gebrauchsinformation.pdf',286215,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','62','Sanofi\\Pdb\\Models\\PDBProductVariant',0,9,'2022-02-02 16:18:39','2022-02-02 16:18:39'),
	(10,'61faaedf97e15801031371.pdf','Fachinformation.pdf',173283,'application/pdf','Fachinformation',NULL,'pdf_file_two','62','Sanofi\\Pdb\\Models\\PDBProductVariant',0,10,'2022-02-02 16:18:39','2022-02-02 16:18:39'),
	(11,'61faaee02b61e899831910.pdf','Gebrauchsinformation.pdf',112608,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','73','Sanofi\\Pdb\\Models\\PDBProductVariant',0,11,'2022-02-02 16:18:40','2022-02-02 16:18:40'),
	(12,'61faaee02cfa4737279376.pdf','Fachinformation.pdf',118360,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','73','Sanofi\\Pdb\\Models\\PDBProductVariant',0,12,'2022-02-02 16:18:40','2022-02-02 16:18:40'),
	(13,'61faaee0a637d380518110.pdf','Gebrauchsinformation.pdf',120956,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','95','Sanofi\\Pdb\\Models\\PDBProductVariant',0,13,'2022-02-02 16:18:40','2022-02-02 16:18:40'),
	(14,'61faaee0a7fae436406349.pdf','Fachinformation.pdf',107661,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','95','Sanofi\\Pdb\\Models\\PDBProductVariant',0,14,'2022-02-02 16:18:40','2022-02-02 16:18:40'),
	(15,'61faaee11495f788591173.pdf','Gebrauchsinformation.pdf',342495,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','123','Sanofi\\Pdb\\Models\\PDBProductVariant',0,15,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(16,'61faaee116f12631806782.pdf','Fachinformation.pdf',134134,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','123','Sanofi\\Pdb\\Models\\PDBProductVariant',0,16,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(17,'61faaee15c68b460308475.pdf','Gebrauchsinformation.pdf',44275,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','126','Sanofi\\Pdb\\Models\\PDBProductVariant',0,17,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(18,'61faaee15d74a841716374.pdf','Fachinformation.pdf',49992,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','126','Sanofi\\Pdb\\Models\\PDBProductVariant',0,18,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(19,'61faaee1a1144293595330.pdf','Gebrauchsinformation.pdf',112635,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','129','Sanofi\\Pdb\\Models\\PDBProductVariant',0,19,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(20,'61faaee1a2b9c583213202.pdf','Fachinformation.pdf',108136,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','129','Sanofi\\Pdb\\Models\\PDBProductVariant',0,20,'2022-02-02 16:18:41','2022-02-02 16:18:41'),
	(23,'61faaee272783304661882.pdf','Gebrauchsinformation.pdf',168793,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','131','Sanofi\\Pdb\\Models\\PDBProductVariant',0,23,'2022-02-02 16:18:42','2022-02-02 16:18:42'),
	(24,'61faaee274b04401519194.pdf','Fachinformation.pdf',108911,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','131','Sanofi\\Pdb\\Models\\PDBProductVariant',0,24,'2022-02-02 16:18:42','2022-02-02 16:18:42'),
	(25,'61faaee30dac8019571656.pdf','Gebrauchsinformation.pdf',142371,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','132','Sanofi\\Pdb\\Models\\PDBProductVariant',0,25,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(26,'61faaee30efe7571012545.pdf','Fachinformation.pdf',108466,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','132','Sanofi\\Pdb\\Models\\PDBProductVariant',0,26,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(27,'61faaee355d5b030808477.pdf','Gebrauchsinformation.pdf',119106,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','133','Sanofi\\Pdb\\Models\\PDBProductVariant',0,27,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(28,'61faaee356fd4544801671.pdf','Fachinformation.pdf',124409,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','133','Sanofi\\Pdb\\Models\\PDBProductVariant',0,28,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(29,'61faaee39f3b1901700471.pdf','Gebrauchsinformation.pdf',206538,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','134','Sanofi\\Pdb\\Models\\PDBProductVariant',0,29,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(30,'61faaee3a0c6d591861116.pdf','Fachinformation.pdf',115376,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','134','Sanofi\\Pdb\\Models\\PDBProductVariant',0,30,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(31,'61faaee3e7c53791209221.pdf','Gebrauchsinformation_03-2021.pdf',159292,'application/pdf','Gebrauchsinformation_03-2021','Gebrauchsinformation_03-2021','pdf_file_one','135','Sanofi\\Pdb\\Models\\PDBProductVariant',0,31,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(32,'61faaee3e98b4902398765.pdf','Fachinformation_03-2021.pdf',138135,'application/pdf','Fachinformation_03-2021','Fachinformation_03-2021','pdf_file_two','135','Sanofi\\Pdb\\Models\\PDBProductVariant',0,32,'2022-02-02 16:18:43','2022-02-02 16:18:43'),
	(33,'61faaee43d920649242717.pdf','Gebrauchsinformation_03-2021.pdf',151504,'application/pdf','Gebrauchsinformation_03-2021','Gebrauchsinformation_03-2021','pdf_file_one','136','Sanofi\\Pdb\\Models\\PDBProductVariant',0,33,'2022-02-02 16:18:44','2022-02-02 16:18:44'),
	(34,'61faaee43f872087716232.pdf','Fachinformation_03-2021.pdf',136229,'application/pdf','Fachinformation_03-2021','Fachinformation_03-2021','pdf_file_two','136','Sanofi\\Pdb\\Models\\PDBProductVariant',0,34,'2022-02-02 16:18:44','2022-02-02 16:18:44'),
	(35,'61faaee489c56343623634.pdf','Gebrauchsinformation.pdf',159701,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','137','Sanofi\\Pdb\\Models\\PDBProductVariant',0,35,'2022-02-02 16:18:44','2022-02-02 16:18:44'),
	(36,'61faaee48b3cf510335945.pdf','Fachinformation.pdf',159621,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','137','Sanofi\\Pdb\\Models\\PDBProductVariant',0,36,'2022-02-02 16:18:44','2022-02-02 16:18:44'),
	(37,'61faaee5168fe350998617.pdf','Gebrauchsinformation.pdf',121876,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','138','Sanofi\\Pdb\\Models\\PDBProductVariant',0,37,'2022-02-02 16:18:45','2022-02-02 16:18:45'),
	(38,'61faaee517ae3101309960.pdf','Fachinformation.pdf',123876,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','138','Sanofi\\Pdb\\Models\\PDBProductVariant',0,38,'2022-02-02 16:18:45','2022-02-02 16:18:45'),
	(39,'61faaee55d3fd901974316.pdf','Gebrauchsanweisung.pdf',410721,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','139','Sanofi\\Pdb\\Models\\PDBProductVariant',0,39,'2022-02-02 16:18:45','2022-02-02 16:18:45'),
	(40,'61faaee5a1726020036110.pdf','Gebrauchsinformation.pdf',180519,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','177','Sanofi\\Pdb\\Models\\PDBProductVariant',0,40,'2022-02-02 16:18:45','2022-02-02 16:18:45'),
	(41,'61faaee5a2b19652847950.pdf','Fachinformation.pdf',172040,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','177','Sanofi\\Pdb\\Models\\PDBProductVariant',0,41,'2022-02-02 16:18:45','2022-02-02 16:18:45'),
	(42,'61faaee62af04522388655.pdf','Gebrauchsinformation .pdf',314623,'application/pdf','Gebrauchsinformation ','Gebrauchsinformation','pdf_file_one','179','Sanofi\\Pdb\\Models\\PDBProductVariant',0,42,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(43,'61faaee62cdfe909312605.pdf','Fachinformation.pdf',301002,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','179','Sanofi\\Pdb\\Models\\PDBProductVariant',0,43,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(44,'61faaee66e809096217003.pdf','Gebrauchsinformation.pdf',281617,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','192','Sanofi\\Pdb\\Models\\PDBProductVariant',0,44,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(45,'61faaee66fef1510814123.pdf','Fachinformation.pdf',122321,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','192','Sanofi\\Pdb\\Models\\PDBProductVariant',0,45,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(46,'61faaee6bdbfe049389246.pdf','Gebrauchsinformation.pdf',53018,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','195','Sanofi\\Pdb\\Models\\PDBProductVariant',0,46,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(47,'61faaee6bf9b8714439244.pdf','Fachinformation.pdf',63908,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','195','Sanofi\\Pdb\\Models\\PDBProductVariant',0,47,'2022-02-02 16:18:46','2022-02-02 16:18:46'),
	(48,'61faaee718b19032750381.pdf','Gebrauchsinformation.pdf',47364,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','196','Sanofi\\Pdb\\Models\\PDBProductVariant',0,48,'2022-02-02 16:18:47','2022-02-02 16:18:47'),
	(49,'61faaee719d8e465998264.pdf','Fachinformation.pdf',119693,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','196','Sanofi\\Pdb\\Models\\PDBProductVariant',0,49,'2022-02-02 16:18:47','2022-02-02 16:18:47'),
	(50,'61faaee79c599384286394.pdf','Gebrauchsinformation.pdf',53544,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','197','Sanofi\\Pdb\\Models\\PDBProductVariant',0,50,'2022-02-02 16:18:47','2022-02-02 16:18:47'),
	(51,'61faaee79dede701678304.pdf','Fachinformation.pdf',55512,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','197','Sanofi\\Pdb\\Models\\PDBProductVariant',0,51,'2022-02-02 16:18:47','2022-02-02 16:18:47'),
	(52,'61faaee8280e3931460914.pdf','Gebrauchsinformation.pdf',46537,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','198','Sanofi\\Pdb\\Models\\PDBProductVariant',0,52,'2022-02-02 16:18:48','2022-02-02 16:18:48'),
	(53,'61faaee829cd4717710704.pdf','Fachinformation.pdf',50776,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','198','Sanofi\\Pdb\\Models\\PDBProductVariant',0,53,'2022-02-02 16:18:48','2022-02-02 16:18:48'),
	(54,'61faaee8ad4f5429965190.pdf','Gebrauchsinformation.pdf',224361,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','199','Sanofi\\Pdb\\Models\\PDBProductVariant',0,54,'2022-02-02 16:18:48','2022-02-02 16:18:48'),
	(55,'61faaee8aeb30798513394.pdf','Fachinformation.pdf',130771,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','199','Sanofi\\Pdb\\Models\\PDBProductVariant',0,55,'2022-02-02 16:18:48','2022-02-02 16:18:48'),
	(56,'61faaee979cac891947473.pdf','Gebrauchsinformation.pdf',216759,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','202','Sanofi\\Pdb\\Models\\PDBProductVariant',0,56,'2022-02-02 16:18:49','2022-02-02 16:18:49'),
	(57,'61faaee97b196686208987.pdf','Fachinformation.pdf',152402,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','202','Sanofi\\Pdb\\Models\\PDBProductVariant',0,57,'2022-02-02 16:18:49','2022-02-02 16:18:49'),
	(58,'61faaee9c5a75252787922.pdf','Beipackzettel.pdf',210040,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','203','Sanofi\\Pdb\\Models\\PDBProductVariant',0,58,'2022-02-02 16:18:49','2022-02-02 16:18:49'),
	(59,'61faaeea14966509850094.pdf','Beipackzettel.pdf',471652,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','204','Sanofi\\Pdb\\Models\\PDBProductVariant',0,59,'2022-02-02 16:18:50','2022-02-02 16:18:50'),
	(60,'61faaeea8fa32019417916.pdf','Beipackzettel.pdf',219865,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','208','Sanofi\\Pdb\\Models\\PDBProductVariant',0,60,'2022-02-02 16:18:50','2022-02-02 16:18:50'),
	(61,'61faaeeadab30086213326.pdf','Gebrauchsinformation.pdf',99080,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','213','Sanofi\\Pdb\\Models\\PDBProductVariant',0,61,'2022-02-02 16:18:50','2022-02-02 16:18:50'),
	(62,'61faaeeadc253089726941.pdf','Fachinformation.pdf',46948,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','213','Sanofi\\Pdb\\Models\\PDBProductVariant',0,62,'2022-02-02 16:18:50','2022-02-02 16:18:50'),
	(65,'61faaeebb9795038523656.pdf','Gebrauchsanweisung.pdf',112717,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','224','Sanofi\\Pdb\\Models\\PDBProductVariant',0,65,'2022-02-02 16:18:51','2022-02-02 16:18:51'),
	(66,'61faaeec0e574693294675.pdf','Gebrauchsanweisung.pdf',957113,'application/pdf','Gebrauchsanweisung',NULL,'pdf_file_one','226','Sanofi\\Pdb\\Models\\PDBProductVariant',0,66,'2022-02-02 16:18:52','2022-02-02 16:18:52'),
	(67,'61faaeec4ed16729683749.pdf','Beipackzettel.pdf',103416,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','230','Sanofi\\Pdb\\Models\\PDBProductVariant',0,67,'2022-02-02 16:18:52','2022-02-02 16:18:52'),
	(68,'61faaeecd395f231919522.pdf','Gebrauchsinformation.pdf',277186,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','234','Sanofi\\Pdb\\Models\\PDBProductVariant',0,68,'2022-02-02 16:18:52','2022-02-02 16:18:52'),
	(69,'61faaeecd5361105119022.pdf','Fachinformation.pdf',149709,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','234','Sanofi\\Pdb\\Models\\PDBProductVariant',0,69,'2022-02-02 16:18:52','2022-02-02 16:18:52'),
	(70,'61faaeed210e6400246577.pdf','Gebrauchsanweisung.pdf',181265,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','242','Sanofi\\Pdb\\Models\\PDBProductVariant',0,70,'2022-02-02 16:18:53','2022-02-02 16:18:53'),
	(71,'61faaeed66c00262263436.pdf','Gebrauchsanweisung.pdf',153260,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','245','Sanofi\\Pdb\\Models\\PDBProductVariant',0,71,'2022-02-02 16:18:53','2022-02-02 16:18:53'),
	(72,'61faaeedb1630713110548.pdf','Gebrauchsinformation.pdf',156528,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','246','Sanofi\\Pdb\\Models\\PDBProductVariant',0,72,'2022-02-02 16:18:53','2022-02-02 16:18:53'),
	(73,'61faaeedb3cb2909265707.pdf','Fachinformation.pdf',145529,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','246','Sanofi\\Pdb\\Models\\PDBProductVariant',0,73,'2022-02-02 16:18:53','2022-02-02 16:18:53'),
	(74,'61faaeee3c293960098807.pdf','Gebrauchsinformation.pdf',87275,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','247','Sanofi\\Pdb\\Models\\PDBProductVariant',0,74,'2022-02-02 16:18:54','2022-02-02 16:18:54'),
	(737,'6220c7819d130097264811.pdf','AT_SPC_Essentiale_forte_Kapseln.pdf',93405,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','247','Sanofi\\Pdb\\Models\\PDBProductVariant',0,737,'2022-03-03 13:49:53','2022-03-03 13:51:44'),
	(742,'6220cc9828126006984926.pdf','AT_PIL_ThomaDuo_400mg100mg_Filmtabletten_UA_annotated.pdf',161828,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','214','Sanofi\\Pdb\\Models\\PDBProductVariant',0,742,'2022-03-03 14:11:36','2022-03-03 14:21:01'),
	(743,'6220ceaacf937176837643.pdf','AT_SPC_ThomaDuo_400mg100mg_Filmtabletten_annotated.pdf',208316,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','214','Sanofi\\Pdb\\Models\\PDBProductVariant',0,743,'2022-03-03 14:20:26','2022-03-03 14:21:01'),
	(748,'6220d1c9388ea603053423.pdf','AT_PIL_Mucosolvan_Lutschpastillen_UA.pdf',142934,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','130','Sanofi\\Pdb\\Models\\PDBProductVariant',0,748,'2022-03-03 14:33:45','2022-03-03 14:34:35'),
	(749,'6220d1d5eb947579781008.pdf','AT_SPC_Mucosolvan_Lutschpastillen.pdf',108938,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','130','Sanofi\\Pdb\\Models\\PDBProductVariant',0,749,'2022-03-03 14:33:57','2022-03-03 14:34:35'),
	(932,'62416edbee1fe994668719.jpg','products/batrafen-antimykotischer-nagellack/Batrafen.jpg',24066,'image/jpeg','products/batrafen-antimykotischer-nagellack/Batrafen','','images','44','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,932,'2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(933,'62416edbf071a936272355.jpg','products/batrafen-antimykotischer-nagellack/batrafen-antimykotischer-nagellack/Batrafen.jpg',24066,'image/jpeg','products/batrafen-antimykotischer-nagellack/batrafen-antimykotischer-nagellack/Batrafen','','image','95','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,933,'2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(934,'62416edbf0d91234183681.pdf','Gebrauchsinformation.pdf',120956,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','95','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,934,'2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(935,'62416edbf12a9683728238.pdf','Fachinformation.pdf',107661,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','95','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,935,'2022-03-28 08:16:27','2022-03-28 08:16:27'),
	(946,'624171598d1e2989686986.png','products/bisolvon/cropped-images/Bisolvon Lösung 100 ml-156-82-256-492-1648455951.png',162603,'image/png','products/bisolvon/cropped-images/Bisolvon Lösung 100 ml-156-82-256-492-1648455951','','images','56','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,946,'2022-03-28 08:27:05','2022-03-28 08:27:05'),
	(947,'624171598fb7b850903589.png','products/bisolvon/cropped-images/Bisolvon Lösung 100 ml-155-88-264-492-1648456021.png',165013,'image/png','products/bisolvon/cropped-images/Bisolvon Lösung 100 ml-155-88-264-492-1648456021','','image','123','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,947,'2022-03-28 08:27:05','2022-03-28 08:27:05'),
	(948,'6241715990557213606695.pdf','Gebrauchsinformation.pdf',342495,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','123','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,948,'2022-03-28 08:27:05','2022-03-28 08:27:05'),
	(949,'6241715990c4d553357840.pdf','Fachinformation.pdf',134134,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','123','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,949,'2022-03-28 08:27:05','2022-03-28 08:27:05'),
	(958,'6241736e6745f294226236.png','products/buscomint/cropped-images/Buscomint_24er-0-0-0-0-1648456396.png',319484,'image/png','products/buscomint/cropped-images/Buscomint_24er-0-0-0-0-1648456396','','images','131','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,958,'2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(959,'6241736e6b3fe393639453.png','products/buscomint/cropped-images/Buscomint_48er-0-0-0-0-1648456520.png',299438,'image/png','products/buscomint/cropped-images/Buscomint_48er-0-0-0-0-1648456520','','image','234','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,959,'2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(960,'6241736e6bfcc105250938.pdf','Gebrauchsinformation.pdf',277186,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','234','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,960,'2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(961,'6241736e6c89a362962383.pdf','Fachinformation.pdf',149709,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','234','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,961,'2022-03-28 08:35:58','2022-03-28 08:35:58'),
	(1024,'6241b2548ab19516315376.png','products/dulcosoft/cropped-images/Dulcosoft_packshot_250ml-3-17-230-434-1648471647.png',107180,'image/png','products/dulcosoft/cropped-images/Dulcosoft_packshot_250ml-3-17-230-434-1648471647','','images','125','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1024,'2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1025,'6241b2548b955192479708.jpg','products/dulcosoft/cropped-images/A4481232_h2-0-0-0-0-1648471661.jpg',60344,'image/jpeg','products/dulcosoft/cropped-images/A4481232_h2-0-0-0-0-1648471661','','images','125','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1025,'2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1026,'6241b2548c882653102547.jpg','products/dulcosoft/cropped-images/A8000416-h3-0-0-0-0-1648471675.jpg',69275,'image/jpeg','products/dulcosoft/cropped-images/A8000416-h3-0-0-0-0-1648471675','','images','125','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1026,'2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1027,'6241b2548f76c607433503.png','products/dulcosoft/cropped-images/Dulcosoft_packshot_250ml-1-20-253-462-1648471715.png',122766,'image/png','products/dulcosoft/cropped-images/Dulcosoft_packshot_250ml-1-20-253-462-1648471715','','image','224','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1027,'2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1028,'6241b2548fd35142583348.pdf','Gebrauchsanweisung.pdf',112717,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','224','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1028,'2022-03-28 13:04:20','2022-03-28 13:04:20'),
	(1041,'6241b3780a6b5132550888.png','products/finalgon-salbe/cropped-images/Finalgon_Salbe-31-0-600-340-1648472763.png',185920,'image/png','products/finalgon-salbe/cropped-images/Finalgon_Salbe-31-0-600-340-1648472763','','images','93','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1041,'2022-03-28 13:09:12','2022-03-28 13:09:12'),
	(1042,'6241b3780ea8d629430457.png','products/finalgon-salbe/finalgon-salbe/Finalgon_Salbe.png',303737,'image/png','products/finalgon-salbe/finalgon-salbe/Finalgon_Salbe','','image','177','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1042,'2022-03-28 13:09:12','2022-03-28 13:09:12'),
	(1043,'6241b3780f32c416394935.pdf','Gebrauchsinformation.pdf',180519,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','177','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1043,'2022-03-28 13:09:12','2022-03-28 13:09:12'),
	(1044,'6241b3780f9fa166114773.pdf','Fachinformation.pdf',172040,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','177','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1044,'2022-03-28 13:09:12','2022-03-28 13:09:12'),
	(1057,'6241b6b92879e547724945.png','products/mucoangin/cropped-images/Mucoangin_Lutschtabletten-98-115-534-392-1648473665.png',201998,'image/png','products/mucoangin/cropped-images/Mucoangin_Lutschtabletten-98-115-534-392-1648473665','','images','58','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1057,'2022-03-28 13:23:05','2022-03-28 13:23:05'),
	(1058,'6241b6b92b089420115296.png','products/mucoangin/cropped-images/Mucoangin_Lutschtabletten-133-141-530-390-1648473718.png',261316,'image/png','products/mucoangin/cropped-images/Mucoangin_Lutschtabletten-133-141-530-390-1648473718','','image','126','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1058,'2022-03-28 13:23:05','2022-03-28 13:23:05'),
	(1059,'6241b6b92b65a112468347.pdf','Gebrauchsinformation.pdf',44275,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','126','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1059,'2022-03-28 13:23:05','2022-03-28 13:23:05'),
	(1060,'6241b6b92bb20311807630.pdf','Fachinformation.pdf',49992,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','126','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1060,'2022-03-28 13:23:05','2022-03-28 13:23:05'),
	(1162,'62458f7a4919a097285248.jpg','products/allegra/Allegra-120mg-10Filmtab-4200032-02092016.jpg',165789,'image/jpeg','products/allegra/Allegra-120mg-10Filmtab-4200032-02092016','','images','15','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1162,'2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(1163,'62458f7a4caa7428956601.jpg','products/allegra/allegra-120mg-filmtabletten/Allegra-120mg-10Filmtab-4200032-02092016.jpg',165789,'image/jpeg','products/allegra/allegra-120mg-filmtabletten/Allegra-120mg-10Filmtab-4200032-02092016','','image','14','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1163,'2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(1164,'62458f7a4d70b153915572.pdf','Gebrauchsinformation.pdf',263744,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','14','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1164,'2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(1165,'62458f7a4e055846935583.pdf','Fachinformation.pdf',235996,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','14','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1165,'2022-03-31 11:24:42','2022-03-31 11:24:42'),
	(1166,'62458f85dbdaf540269174.png','products/guttalax-tropfen/cropped-images/Guttalax-75-72-250-444-1648473167.png',125942,'image/png','products/guttalax-tropfen/cropped-images/Guttalax-75-72-250-444-1648473167','','images','109','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1166,'2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1167,'62458f85de420798646643.png','products/guttalax-tropfen/cropped-images/Guttalax-80-71-238-452-1648473245.png',123581,'image/png','products/guttalax-tropfen/cropped-images/Guttalax-80-71-238-452-1648473245','','image','199','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1167,'2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1168,'62458f85decd1402301961.pdf','Gebrauchsinformation.pdf',224361,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','199','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1168,'2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1169,'62458f85df34b430880396.pdf','Fachinformation.pdf',130771,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','199','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1169,'2022-03-31 11:24:53','2022-03-31 11:24:53'),
	(1193,'6245ab003cfdc014675706.png','products/rhinospray/cropped-images/Rhinospray-48-126-210-394-1648732565.png',85170,'image/png','products/rhinospray/cropped-images/Rhinospray-48-126-210-394-1648732565','','images','63','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1193,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1194,'6245ab003e0b8991746105.jpg','products/rhinospray/cropped-images/A1283394-h2-0-0-0-0-1648732576.jpg',67951,'image/jpeg','products/rhinospray/cropped-images/A1283394-h2-0-0-0-0-1648732576','','images','63','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1194,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1195,'6245ab003f0c1636106471.jpg','products/rhinospray/cropped-images/A1283394-h3-0-0-0-0-1648732587.jpg',72352,'image/jpeg','products/rhinospray/cropped-images/A1283394-h3-0-0-0-0-1648732587','','images','63','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1195,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1196,'6245ab0042511585480645.png','products/rhinospray/cropped-images/Rhinospray-40-120-234-400-1648732622.png',85567,'image/png','products/rhinospray/cropped-images/Rhinospray-40-120-234-400-1648732622','','image','137','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1196,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1197,'6245ab0042ec4550504737.pdf','Gebrauchsinformation.pdf',159701,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','137','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1197,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1198,'6245ab0043789481168848.pdf','Fachinformation.pdf',159621,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','137','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1198,'2022-03-31 13:22:08','2022-03-31 13:22:08'),
	(1199,'6245aba8492ae670359708.jpg','products/selsun-medizinisches-shampoo/NEU_Selsun.JPG',18710,'image/jpeg','products/selsun-medizinisches-shampoo/NEU_Selsun','','images','118','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1199,'2022-03-31 13:24:56','2022-03-31 13:24:56'),
	(1200,'6245aba84c311985386481.jpg','products/selsun-medizinisches-shampoo/selsun-medizinisches-shampoo/NEU_Selsun.JPG',18710,'image/jpeg','products/selsun-medizinisches-shampoo/selsun-medizinisches-shampoo/NEU_Selsun','','image','213','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1200,'2022-03-31 13:24:56','2022-03-31 13:24:56'),
	(1201,'6245aba84cbe0592173536.pdf','Gebrauchsinformation.pdf',99080,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','213','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1201,'2022-03-31 13:24:56','2022-03-31 13:24:56'),
	(1202,'6245aba84d34a250292023.pdf','Fachinformation.pdf',46948,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','213','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1202,'2022-03-31 13:24:56','2022-03-31 13:24:56'),
	(1214,'6245b0ddb3ad7691845125.png','products/silomat-eibischhonig-sirup/Silomat_Eibisch.png',61700,'image/png','products/silomat-eibischhonig-sirup/Silomat_Eibisch','','images','65','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1214,'2022-03-31 13:47:09','2022-03-31 13:47:09'),
	(1215,'6245b0ddb640e076163625.png','products/silomat-eibischhonig-sirup/cropped-images/Silomat_Eibisch-0-0-0-0-1648734384.png',132409,'image/png','products/silomat-eibischhonig-sirup/cropped-images/Silomat_Eibisch-0-0-0-0-1648734384','','image','139','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1215,'2022-03-31 13:47:09','2022-03-31 13:47:09'),
	(1216,'6245b0ddb6ea1143297662.pdf','Gebrauchsanweisung.pdf',410721,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','139','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1216,'2022-03-31 13:47:09','2022-03-31 13:47:09'),
	(1253,'6245bb7c5dca9010410627.png','products/dulcosoft-duo/cropped-images/DulcoSoft_DUO_mitDose-13-3-432-446-1648460084.png',245603,'image/png','products/dulcosoft-duo/cropped-images/DulcoSoft_DUO_mitDose-13-3-432-446-1648460084','','images','137','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1253,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1254,'6245bb7c5ea79670669300.jpg','products/dulcosoft-duo/cropped-images/A5430260-h2-0-0-0-0-1648460095.jpg',50802,'image/jpeg','products/dulcosoft-duo/cropped-images/A5430260-h2-0-0-0-0-1648460095','','images','137','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1254,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1255,'6245bb7c5f75d271247879.jpg','products/dulcosoft-duo/cropped-images/A5430260-h3-0-0-0-0-1648460106.jpg',44100,'image/jpeg','products/dulcosoft-duo/cropped-images/A5430260-h3-0-0-0-0-1648460106','','images','137','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1255,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1256,'6245bb7c6048a630431113.jpg','products/dulcosoft-duo/cropped-images/A5430260-h4-0-0-0-0-1648460117.jpg',40537,'image/jpeg','products/dulcosoft-duo/cropped-images/A5430260-h4-0-0-0-0-1648460117','','images','137','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1256,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1257,'6245bb7c62ad0862661651.png','products/dulcosoft-duo/cropped-images/DulcoSoft_DUO_mitDose-7-1-436-452-1648460190.png',214115,'image/png','products/dulcosoft-duo/cropped-images/DulcoSoft_DUO_mitDose-7-1-436-452-1648460190','','image','245','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1257,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1258,'6245bb7c6323a163458453.pdf','Gebrauchsanweisung.pdf',153260,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','245','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1258,'2022-03-31 14:32:28','2022-03-31 14:32:28'),
	(1301,'624b039b4c4ea360063923.jpg','products/buscopan/cropped-images/Buscopan-110-77-426-306-1649083278.jpg',46285,'image/jpeg','products/buscopan/cropped-images/Buscopan-110-77-426-306-1649083278','','images','107','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1301,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1302,'624b039b4d478779674591.jpg','products/buscopan/cropped-images/a3521828a0008763h2-0-0-0-0-1648457515.jpg',57162,'image/jpeg','products/buscopan/cropped-images/a3521828a0008763h2-0-0-0-0-1648457515','','images','107','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1302,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1303,'624b039b4e245480630688.jpg','products/buscopan/cropped-images/a3521828a0008763h3-0-0-0-0-1648457532.jpg',63904,'image/jpeg','products/buscopan/cropped-images/a3521828a0008763h3-0-0-0-0-1648457532','','images','107','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1303,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1304,'624b039b50a0b892429486.png','products/buscopan/cropped-images/Buscopan_20dragees-67-132-586-350-1648457274.png',260533,'image/png','products/buscopan/cropped-images/Buscopan_20dragees-67-132-586-350-1648457274','','image','195','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1304,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1305,'624b039b5106e345581521.pdf','Gebrauchsinformation.pdf',53018,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','195','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1305,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1306,'624b039b515e5805252105.pdf','Fachinformation.pdf',63908,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','195','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1306,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1307,'624b039b54c15348448514.png','products/buscopan/cropped-images/Buscopan Zäpfchen 6-38-162-664-402-1648457319.png',343857,'image/png','products/buscopan/cropped-images/Buscopan Zäpfchen 6-38-162-664-402-1648457319','','image','196','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1307,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1308,'624b039b55244187650460.pdf','Gebrauchsinformation.pdf',47364,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','196','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1308,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1309,'624b039b558b3849486992.pdf','Fachinformation.pdf',119693,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','196','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1309,'2022-04-04 14:41:31','2022-04-04 14:41:31'),
	(1333,'624b047a9ec41571764254.jpg','products/dulcolax/cropped-images/Dulcolax-138-47-396-372-1649083510.jpg',45762,'image/jpeg','products/dulcolax/cropped-images/Dulcolax-138-47-396-372-1649083510','','images','108','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1333,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1334,'624b047a9fb92581007237.jpg','products/dulcolax/cropped-images/a3512350a3512344a0018023a0018017h2-0-0-0-0-1648458879.jpg',46357,'image/jpeg','products/dulcolax/cropped-images/a3512350a3512344a0018023a0018017h2-0-0-0-0-1648458879','','images','108','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1334,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1335,'624b047aa0760059697209.jpg','products/dulcolax/cropped-images/a3512350a3512344h3-0-0-0-0-1648458909.jpg',45788,'image/jpeg','products/dulcolax/cropped-images/a3512350a3512344h3-0-0-0-0-1648458909','','images','108','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1335,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1336,'624b047aa14bb580136099.jpg','products/dulcolax/cropped-images/a0018023a0018017h3-0-0-0-0-1648458924.jpg',45250,'image/jpeg','products/dulcolax/cropped-images/a0018023a0018017h3-0-0-0-0-1648458924','','images','108','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1336,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1337,'624b047aa4253152200893.png','products/dulcolax/cropped-images/Dulcolax_Dragees-15-36-282-452-1648458991.png',160883,'image/png','products/dulcolax/cropped-images/Dulcolax_Dragees-15-36-282-452-1648458991','','image','197','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1337,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1338,'624b047aa4a9e632793047.pdf','Gebrauchsinformation.pdf',53544,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','197','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1338,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1339,'624b047aa5171995019444.pdf','Fachinformation.pdf',55512,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','197','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1339,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1340,'624b047aa9477278577231.png','products/dulcolax/dulcolax-zpfchen/cropped-images/DL_zaepfchen_pkg_low-43-61-274-450-1648459198.png',180193,'image/png','products/dulcolax/dulcolax-zpfchen/cropped-images/DL_zaepfchen_pkg_low-43-61-274-450-1648459198','','image','198','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1340,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1341,'624b047aa9ae3525177747.pdf','Gebrauchsinformation.pdf',46537,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','198','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1341,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1342,'624b047aaa01a470672662.pdf','Fachinformation.pdf',50776,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','198','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1342,'2022-04-04 14:45:14','2022-04-04 14:45:14'),
	(1375,'624b066125b54580465483.png','products/thomaduo/cropped-images/ThomaDuo_packshot_24er-35-55-668-420-1648734805.png',342130,'image/png','products/thomaduo/cropped-images/ThomaDuo_packshot_24er-35-55-668-420-1648734805','','images','119','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1375,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1376,'624b066126c5b178920736.jpg','products/thomaduo/cropped-images/a4480534a4480528h2-0-0-0-0-1648734815.jpg',71047,'image/jpeg','products/thomaduo/cropped-images/a4480534a4480528h2-0-0-0-0-1648734815','','images','119','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1376,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1377,'624b066127b2d538893713.jpg','products/thomaduo/cropped-images/a4480534a4480528h3-0-0-0-0-1648734827.jpg',73464,'image/jpeg','products/thomaduo/cropped-images/a4480534a4480528h3-0-0-0-0-1648734827','','images','119','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1377,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1378,'624b066128a40813624667.jpg','products/thomaduo/cropped-images/a4480534a4480528h4-0-0-0-0-1648734839.jpg',41347,'image/jpeg','products/thomaduo/cropped-images/a4480534a4480528h4-0-0-0-0-1648734839','','images','119','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1378,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1379,'624b06612c3bc569511128.png','products/thomaduo/cropped-images/ThomaDuo_packshot_24er-36-61-664-412-1648734941.png',339356,'image/png','products/thomaduo/cropped-images/ThomaDuo_packshot_24er-36-61-664-412-1648734941','','image','214','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1379,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1380,'624b06612cea7557555260.pdf','AT_PIL_ThomaDuo_400mg100mg_Filmtabletten_UA_annotated.pdf',161828,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','214','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1380,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1381,'624b06612d96a041040901.pdf','AT_SPC_ThomaDuo_400mg100mg_Filmtabletten_annotated.pdf',208316,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','214','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1381,'2022-04-04 14:53:21','2022-04-04 14:53:21'),
	(1382,'624b06a9cf1f0232018313.png','products/thomapyrin/cropped-images/TY_packshot_60stk_2020-12-24-670-344-1648735340.png',293326,'image/png','products/thomapyrin/cropped-images/TY_packshot_60stk_2020-12-24-670-344-1648735340','','images','95','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1382,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1383,'624b06a9cff98745679535.jpg','products/thomapyrin/cropped-images/A0694267-h2-0-0-0-0-1648735352.jpg',70718,'image/jpeg','products/thomapyrin/cropped-images/A0694267-h2-0-0-0-0-1648735352','','images','95','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1383,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1384,'624b06a9d0ddb914807493.jpg','products/thomapyrin/cropped-images/A0694267-h3-0-0-0-0-1648735363.jpg',51531,'image/jpeg','products/thomapyrin/cropped-images/A0694267-h3-0-0-0-0-1648735363','','images','95','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1384,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1385,'624b06a9d1bd0839455080.jpg','products/thomapyrin/cropped-images/A0694267-h4-0-0-0-0-1648735373.jpg',54203,'image/jpeg','products/thomapyrin/cropped-images/A0694267-h4-0-0-0-0-1648735373','','images','95','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1385,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1386,'624b06a9d28a1745237827.jpg','products/thomapyrin/cropped-images/A0694267-h5-0-0-0-0-1648735385.jpg',57879,'image/jpeg','products/thomapyrin/cropped-images/A0694267-h5-0-0-0-0-1648735385','','images','95','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1386,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1387,'624b06a9d6140141962083.png','products/thomapyrin/cropped-images/TY_packshot_60stk_2020-25-28-658-334-1648735485.png',288626,'image/png','products/thomapyrin/cropped-images/TY_packshot_60stk_2020-25-28-658-334-1648735485','','image','179','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1387,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1388,'624b06a9d6f3a012788505.pdf','Gebrauchsinformation .pdf',314623,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','179','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1388,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1389,'624b06a9d791d749264440.pdf','Fachinformation.pdf',301002,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','179','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1389,'2022-04-04 14:54:33','2022-04-04 14:54:33'),
	(1390,'624b1954ced0a385911128.png','products/novanight/cropped-images/Novanight_packshot_IR-17-50-446-452-1648476309.png',292997,'image/png','products/novanight/cropped-images/Novanight_packshot_IR-17-50-446-452-1648476309','','images','130','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1390,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1391,'624b1954cfc4c732440301.jpg','products/novanight/cropped-images/A5184200-h2-0-0-0-0-1648476320.jpg',72385,'image/jpeg','products/novanight/cropped-images/A5184200-h2-0-0-0-0-1648476320','','images','130','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1391,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1392,'624b1954d0ad3428909776.jpg','products/novanight/cropped-images/A5184200-h3-0-0-0-0-1648476334.jpg',53358,'image/jpeg','products/novanight/cropped-images/A5184200-h3-0-0-0-0-1648476334','','images','130','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1392,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1393,'624b1954d1711178765931.jpg','products/novanight/cropped-images/A5184200-h4-0-0-0-0-1648476345.jpg',39958,'image/jpeg','products/novanight/cropped-images/A5184200-h4-0-0-0-0-1648476345','','images','130','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1393,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1394,'624b1954d466f626000940.png','products/novanight/cropped-images/Novanight_packshot_IR-16-54-460-448-1648476396.png',296581,'image/png','products/novanight/cropped-images/Novanight_packshot_IR-16-54-460-448-1648476396','','image','230','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1394,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1395,'624b1954d4e28450820923.pdf','Beipackzettel.pdf',103416,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','230','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1395,'2022-04-04 16:14:12','2022-04-04 16:14:12'),
	(1401,'624b197ace6bb005750743.png','products/pharmaton-vital/pharmaton-vital/cropped-images/PHvital_100packshot_21_low-1-2-262-442-1648732036.png',171252,'image/png','products/pharmaton-vital/pharmaton-vital/cropped-images/PHvital_100packshot_21_low-1-2-262-442-1648732036','','images','114','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1401,'2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1402,'624b197acf85f367872126.jpg','products/pharmaton-vital/cropped-images/A1314930-h2-0-0-0-0-1648732324.jpg',116623,'image/jpeg','products/pharmaton-vital/cropped-images/A1314930-h2-0-0-0-0-1648732324','','images','114','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1402,'2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1403,'624b197ad0827882866068.jpg','products/pharmaton-vital/cropped-images/A1314930-h3-0-0-0-0-1648732338.jpg',96322,'image/jpeg','products/pharmaton-vital/cropped-images/A1314930-h3-0-0-0-0-1648732338','','images','114','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1403,'2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1404,'624b197ad39d6976551716.png','products/pharmaton-vital/pharmaton-vital/cropped-images/PHvital_100packshot_21_low-9-15-246-422-1648732082.png',163624,'image/png','products/pharmaton-vital/pharmaton-vital/cropped-images/PHvital_100packshot_21_low-9-15-246-422-1648732082','','image','208','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1404,'2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1405,'624b197ad41f6760956524.pdf','Beipackzettel.pdf',219865,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','208','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1405,'2022-04-04 16:14:50','2022-04-04 16:14:50'),
	(1470,'624ea9d494d68555707775.jpg','products/mucosolvan/cropped-images/Mucosolvan-132-34-430-380-1649083604.jpg',62443,'image/jpeg','products/mucosolvan/cropped-images/Mucosolvan-132-34-430-380-1649083604','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1470,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1471,'624ea9d495dcc228351172.jpg','products/mucosolvan/cropped-images/A0727653-h2-0-0-0-0-1648474784.jpg',58330,'image/jpeg','products/mucosolvan/cropped-images/A0727653-h2-0-0-0-0-1648474784','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1471,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1472,'624ea9d496acd907666036.jpg','products/mucosolvan/cropped-images/A3517985-h3-0-0-0-0-1648474867.jpg',55630,'image/jpeg','products/mucosolvan/cropped-images/A3517985-h3-0-0-0-0-1648474867','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1472,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1473,'624ea9d49793c405478717.jpg','products/mucosolvan/cropped-images/A0990735-h3-0-0-0-0-1649321502.jpg',56548,'image/jpeg','products/mucosolvan/cropped-images/A0990735-h3-0-0-0-0-1649321502','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1473,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1474,'624ea9d4989e5106508098.jpg','products/mucosolvan/cropped-images/A3517991-h3-0-0-0-0-1648474831.jpg',52567,'image/jpeg','products/mucosolvan/cropped-images/A3517991-h3-0-0-0-0-1648474831','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1474,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1475,'624ea9d49983b904172428.jpg','products/mucosolvan/cropped-images/A0727676-h3-0-0-0-0-1648474850.jpg',53878,'image/jpeg','products/mucosolvan/cropped-images/A0727676-h3-0-0-0-0-1648474850','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1475,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1476,'624ea9d49a67d365133785.jpg','products/mucosolvan/cropped-images/A0727653-h3-0-0-0-0-1649321522.jpg',52892,'image/jpeg','products/mucosolvan/cropped-images/A0727653-h3-0-0-0-0-1649321522','','images','61','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1476,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1477,'624ea9d49e66f564887323.png','products/mucosolvan/mucosolvan-30-mg5-ml-saft/cropped-images/Mucosolvan_saft_100ml_pkg-3-39-332-432-1648474570.png',136094,'image/png','products/mucosolvan/mucosolvan-30-mg5-ml-saft/cropped-images/Mucosolvan_saft_100ml_pkg-3-39-332-432-1648474570','','image','132','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1477,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1478,'624ea9d49eefa456638018.pdf','Gebrauchsinformation.pdf',142371,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','132','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1478,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1479,'624ea9d49f581451113687.pdf','Fachinformation.pdf',108466,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','132','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1479,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1480,'624ea9d4a3294474280590.png','products/mucosolvan/cropped-images/Mucosolvan_retard_2019-0-0-0-0-1648474398.png',186241,'image/png','products/mucosolvan/cropped-images/Mucosolvan_retard_2019-0-0-0-0-1648474398','','image','134','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1480,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1481,'624ea9d4a4119888700435.pdf','Gebrauchsinformation.pdf',206538,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','134','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1481,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1482,'624ea9d4a4a4b691895258.pdf','Fachinformation.pdf',115376,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','134','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1482,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1483,'624ea9d4a8841142140161.png','products/mucosolvan/mucosolvan-15-mg-lutschpastillen/cropped-images/Mucosolvan_Lutschpastillen-28-85-362-436-1648474710.png',162532,'image/png','products/mucosolvan/mucosolvan-15-mg-lutschpastillen/cropped-images/Mucosolvan_Lutschpastillen-28-85-362-436-1648474710','','image','130','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1483,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1484,'624ea9d4a928f075805669.pdf','AT_PIL_Mucosolvan_Lutschpastillen_UA.pdf',142934,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','130','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1484,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1485,'624ea9d4a9b71589822718.pdf','AT_SPC_Mucosolvan_Lutschpastillen.pdf',108938,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','130','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1485,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1486,'624ea9d4adf49688139114.png','products/mucosolvan/cropped-images/Mucosolvan_kindersaft_100ml_pkg-2-35-290-430-1648474619.png',133936,'image/png','products/mucosolvan/cropped-images/Mucosolvan_kindersaft_100ml_pkg-2-35-290-430-1648474619','','image','131','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1486,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1487,'624ea9d4ae98a244905790.pdf','Gebrauchsinformation.pdf',168793,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','131','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1487,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1488,'624ea9d4af204046565505.pdf','Fachinformation.pdf',108911,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','131','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1488,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1489,'624ea9d4b2e19418016741.png','products/mucosolvan/cropped-images/Mucosolvan_Loesung-4-38-298-428-1648474500.png',124758,'image/png','products/mucosolvan/cropped-images/Mucosolvan_Loesung-4-38-298-428-1648474500','','image','133','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1489,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1490,'624ea9d4b37b2449497672.pdf','Gebrauchsinformation.pdf',119106,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','133','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1490,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1491,'624ea9d4b4096143158619.pdf','Fachinformation.pdf',124409,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','133','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1491,'2022-04-07 09:07:32','2022-04-07 09:07:32'),
	(1532,'6267c4991c56f536959091.png','products/buscopan-plus/cropped-images/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-7-0-664-430-1648458052.png',304625,'image/png','products/buscopan-plus/cropped-images/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-7-0-664-430-1648458052','','images','138','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1532,'2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1533,'6267c4991d998117128931.jpg','products/buscopan-plus/cropped-images/A3904096_h2-0-0-0-0-1648458115.jpg',61453,'image/jpeg','products/buscopan-plus/cropped-images/A3904096_h2-0-0-0-0-1648458115','','images','138','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1533,'2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1534,'6267c49921eb7930223948.png','products/buscopan-plus/cropped-images/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-13-14-660-408-1648458166.png',299786,'image/png','products/buscopan-plus/cropped-images/BPplus_packshot_layers_farbkorr_2fach_warnhinweis-13-14-660-408-1648458166','','image','246','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1534,'2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1535,'6267c49922a22978735802.pdf','Gebrauchsinformation.pdf',156528,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','246','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1535,'2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1536,'6267c49923451592908033.pdf','Fachinformation.pdf',145529,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','246','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1536,'2022-04-26 10:08:25','2022-04-26 10:08:25'),
	(1547,'626b81c47b0b2015960031.jpg','products/mucosan/NEU_Mucosan.JPG',18423,'image/jpeg','products/mucosan/NEU_Mucosan','','images','60','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1547,'2022-04-29 06:12:20','2022-04-29 06:12:20'),
	(1548,'626b81c47deaf511476292.jpg','products/mucosan/mucosan-15-mg-ampullen/NEU_Mucosan.JPG',18423,'image/jpeg','products/mucosan/mucosan-15-mg-ampullen/NEU_Mucosan','','image','129','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1548,'2022-04-29 06:12:20','2022-04-29 06:12:20'),
	(1549,'626b81c47e8df717780126.pdf','Gebrauchsinformation.pdf',112635,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','129','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1549,'2022-04-29 06:12:20','2022-04-29 06:12:20'),
	(1550,'626b81c47f216403128729.pdf','Fachinformation.pdf',108136,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','129','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1550,'2022-04-29 06:12:20','2022-04-29 06:12:20'),
	(1551,'626b81e902763651711090.png','products/muconatural-complete/Muconatural_packshot128g__003_.png',398590,'image/png','products/muconatural-complete/Muconatural_packshot128g__003_','','images','127','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1551,'2022-04-29 06:12:57','2022-04-29 06:12:57'),
	(1552,'626b81e9065bb506858061.png','products/muconatural-complete/muconatural-complete-sirup/Muconatural_packshot128g__003_.png',398590,'image/png','products/muconatural-complete/muconatural-complete-sirup/Muconatural_packshot128g__003_','','image','226','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1552,'2022-04-29 06:12:57','2022-04-29 06:12:57'),
	(1553,'626b81e907d2e588438808.pdf','Gebrauchsanweisung.pdf',957113,'application/pdf','Gebrauchsanweisung',NULL,'pdf_file_one','226','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1553,'2022-04-29 06:12:57','2022-04-29 06:12:57'),
	(1566,'626b83036f661642859753.jpg','products/antistax/cropped-images/Antistax-134-19-400-414-1649083455.jpg',58773,'image/jpeg','products/antistax/cropped-images/Antistax-134-19-400-414-1649083455','','images','112','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1566,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1567,'626b830370232782147225.jpg','products/antistax/cropped-images/A3520415-h2-0-0-0-0-1648454736.jpg',74734,'image/jpeg','products/antistax/cropped-images/A3520415-h2-0-0-0-0-1648454736','','images','112','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1567,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1568,'626b830370c28586099137.jpg','products/antistax/cropped-images/A2337643-h2-0-0-0-0-1648454762.jpg',63834,'image/jpeg','products/antistax/cropped-images/A2337643-h2-0-0-0-0-1648454762','','images','112','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1568,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1569,'626b83037158f382169909.jpg','products/antistax/cropped-images/A2337666-h2-0-0-0-0-1648454777.jpg',58725,'image/jpeg','products/antistax/cropped-images/A2337666-h2-0-0-0-0-1648454777','','images','112','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1569,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1570,'626b8303720ea565087288.jpg','products/antistax/cropped-images/A2337666-h3-0-0-0-0-1648454793.jpg',65010,'image/jpeg','products/antistax/cropped-images/A2337666-h3-0-0-0-0-1648454793','','images','112','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1570,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1571,'626b8303755a7718138352.png','products/antistax/antistax-360-mg-filmtabletten/AS_packshot_90er_2021.png',535311,'image/png','products/antistax/antistax-360-mg-filmtabletten/AS_packshot_90er_2021','','image','202','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1571,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1572,'626b830375da5321388482.pdf','Gebrauchsinformation.pdf',216759,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','202','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1572,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1573,'626b83037630c556314539.pdf','Fachinformation.pdf',152402,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','202','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1573,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1574,'626b830378f8a785604288.png','products/antistax/cropped-images/Antistax_Creme-150-0-645-429-1648204755.png',159089,'image/png','products/antistax/cropped-images/Antistax_Creme-150-0-645-429-1648204755','','image','203','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1574,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1575,'626b83037955f730704151.pdf','Beipackzettel.pdf',210040,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','203','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1575,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1576,'626b83037bc3d787490760.png','products/antistax/antistax-frischgel-mit-rotem-weinlaubextrakt-kosmetikum/cropped-images/Antistax_Frischgel_125_ml-48-44-228-456-1648201356.png',149154,'image/png','products/antistax/antistax-frischgel-mit-rotem-weinlaubextrakt-kosmetikum/cropped-images/Antistax_Frischgel_125_ml-48-44-228-456-1648201356','','image','204','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1576,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1577,'626b83037c5eb259238980.pdf','Beipackzettel.pdf',471652,'application/pdf','Beipackzettel','Beipackzettel','pdf_file_one','204','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1577,'2022-04-29 06:17:39','2022-04-29 06:17:39'),
	(1592,'627cd6742f1fe373909794.png','products/allenasal-protect/cropped-images/allenasal_packshot3d_neu-72-78-260-452-1652348494.png',173417,'image/png','products/allenasal-protect/cropped-images/allenasal_packshot3d_neu-72-78-260-452-1652348494','','images','135','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1592,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1593,'627cd67430fb3156768291.jpg','products/allenasal-protect/cropped-images/A5373504-h2-0-0-0-0-1647598479.jpg',84716,'image/jpeg','products/allenasal-protect/cropped-images/A5373504-h2-0-0-0-0-1647598479','','images','135','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1593,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1594,'627cd67431f71602263697.jpg','products/allenasal-protect/cropped-images/A5373504-h3-0-0-0-0-1647598494.jpg',44756,'image/jpeg','products/allenasal-protect/cropped-images/A5373504-h3-0-0-0-0-1647598494','','images','135','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1594,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1595,'627cd67432fb3992125292.jpg','products/allenasal-protect/cropped-images/A5373504-h4-0-0-0-0-1647598510.jpg',40819,'image/jpeg','products/allenasal-protect/cropped-images/A5373504-h4-0-0-0-0-1647598510','','images','135','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1595,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1596,'627cd6743573f249215241.png','products/allenasal-protect/cropped-images/allenasal_packshot3d_neu-82-82-236-450-1652348526.png',165502,'image/png','products/allenasal-protect/cropped-images/allenasal_packshot3d_neu-82-82-236-450-1652348526','','image','242','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1596,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1597,'627cd67436014168132998.pdf','Gebrauchsanweisung.pdf',181265,'application/pdf','Gebrauchsanweisung','Gebrauchsanweisung','pdf_file_one','242','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1597,'2022-05-12 09:42:12','2022-05-12 09:42:12'),
	(1598,'627cd844438ec948831454.png','products/silomat/cropped-images/Mucomat_packshot_high-0-0-0-0-1649415708.png',257604,'image/png','products/silomat/cropped-images/Mucomat_packshot_high-0-0-0-0-1649415708','','images','64','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1598,'2022-05-12 09:49:56','2022-05-12 09:49:56'),
	(1599,'627cd844463fb909580187.png','products/silomat/cropped-images/Mucomat_packshot_high-0-0-0-0-1649415708.png',257604,'image/png','products/silomat/cropped-images/Mucomat_packshot_high-0-0-0-0-1649415708','','image','138','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1599,'2022-05-12 09:49:56','2022-05-12 09:49:56'),
	(1600,'627cd84446b30401417964.pdf','Gebrauchsinformation.pdf',121876,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','138','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1600,'2022-05-12 09:49:56','2022-05-12 09:49:56'),
	(1601,'627cd8444710f562526847.pdf','Fachinformation.pdf',123876,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','138','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1601,'2022-05-12 09:49:56','2022-05-12 09:49:56'),
	(1602,'627cd89fc4b10034103533.jpg','products/buscapina/cropped-images/Buscapina-141-84-384-302-1649083410.jpg',31340,'image/jpeg','products/buscapina/cropped-images/Buscapina-141-84-384-302-1649083410','','images','105','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1602,'2022-05-12 09:51:27','2022-05-12 09:51:27'),
	(1603,'627cd89fc7583119708602.jpg','products/buscapina/buscapina-20-mg1-ml-ampullen/Packshot_Buscapina.JPG',20064,'image/jpeg','products/buscapina/buscapina-20-mg1-ml-ampullen/Packshot_Buscapina','','image','192','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1603,'2022-05-12 09:51:27','2022-05-12 09:51:27'),
	(1604,'627cd89fc8550107123245.pdf','Gebrauchsinformation.pdf',281617,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','192','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1604,'2022-05-12 09:51:27','2022-05-12 09:51:27'),
	(1605,'627cd89fc8f46341111165.pdf','Fachinformation.pdf',122321,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','192','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1605,'2022-05-12 09:51:27','2022-05-12 09:51:27'),
	(1606,'627cd8d643b6e749288608.png','products/essentiale/cropped-images/essentiale_packshot3D-49-99-346-410-1648472020.png',167820,'image/png','products/essentiale/cropped-images/essentiale_packshot3D-49-99-346-410-1648472020','','images','139','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1606,'2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1607,'627cd8d646b4d752845924.png','products/essentiale/cropped-images/essentiale_packshot3D-72-117-342-422-1648472058.png',182214,'image/png','products/essentiale/cropped-images/essentiale_packshot3D-72-117-342-422-1648472058','','image','247','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1607,'2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1608,'627cd8d647236852846140.pdf','Gebrauchsinformation.pdf',87275,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','247','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1608,'2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1609,'627cd8d647895087629005.pdf','AT_SPC_Essentiale_forte_Kapseln.pdf',93405,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','247','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1609,'2022-05-12 09:52:22','2022-05-12 09:52:22'),
	(1610,'627cd90507ee9567757655.jpg','products/maalox/Maalox-Antacidum-20Kautab-1520434-02092016.jpg',180978,'image/jpeg','products/maalox/Maalox-Antacidum-20Kautab-1520434-02092016','','images','36','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1610,'2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1611,'627cd9050ac2b564021194.jpg','products/maalox/maalox-kautabletten/Maalox-Antacidum-20Kautab-1520434-02092016.jpg',180978,'image/jpeg','products/maalox/maalox-kautabletten/Maalox-Antacidum-20Kautab-1520434-02092016','','image','73','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1611,'2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1612,'627cd9050b2e8246308171.pdf','Gebrauchsinformation.pdf',112608,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','73','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1612,'2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1613,'627cd9050b9ba867421398.pdf','Fachinformation.pdf',118360,'application/pdf','Fachinformation','Fachinformation','pdf_file_two','73','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1613,'2022-05-12 09:53:09','2022-05-12 09:53:09'),
	(1621,'627cd968e5a46447251773.jpg','products/mucospas/cropped-images/Mucospas-168-33-340-380-1649083352.jpg',26219,'image/jpeg','products/mucospas/cropped-images/Mucospas-168-33-340-380-1649083352','','images','62','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1621,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1622,'627cd968e8962950188481.jpg','products/mucospas/mucospas-saft/NEU_Mucospas.JPG',19400,'image/jpeg','products/mucospas/mucospas-saft/NEU_Mucospas','','image','135','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1622,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1623,'627cd968e90e5116671640.pdf','Gebrauchsinformation_03-2021.pdf',159292,'application/pdf','Gebrauchsinformation_03-2021','Gebrauchsinformation_03-2021','pdf_file_one','135','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1623,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1624,'627cd968e979b073687091.pdf','Fachinformation_03-2021.pdf',138135,'application/pdf','Fachinformation_03-2021','Fachinformation_03-2021','pdf_file_two','135','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1624,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1625,'627cd968ec938142385262.jpg','products/mucospas/mucospas-tabletten/NEU_Mucospas_Tabletten.JPG',23483,'image/jpeg','products/mucospas/mucospas-tabletten/NEU_Mucospas_Tabletten','','image','136','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1625,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1626,'627cd968ed0a1265549557.pdf','Gebrauchsinformation_03-2021.pdf',151504,'application/pdf','Gebrauchsinformation_03-2021','Gebrauchsinformation_03-2021','pdf_file_one','136','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1626,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1627,'627cd968ed6d1357384812.pdf','Fachinformation_03-2021.pdf',136229,'application/pdf','Fachinformation_03-2021','Fachinformation_03-2021','pdf_file_two','136','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1627,'2022-05-12 09:54:48','2022-05-12 09:54:48'),
	(1628,'627cd97a58588959015180.jpg','products/novalgin/Novalgin-1g-10Ampullen-0038801-02092016.jpg',159914,'image/jpeg','products/novalgin/Novalgin-1g-10Ampullen-0038801-02092016','','images','30','Sanofi\\Pdb\\Models\\PDBLiveProduct',1,1628,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1629,'627cd97a5c02d485874834.jpg','products/novalgin/novalgin-filmtabletten/novalgin-500-mg-filmtabletten-D01599654-p1.jpg',51977,'image/jpeg','products/novalgin/novalgin-filmtabletten/novalgin-500-mg-filmtabletten-D01599654-p1','','image','61','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1629,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1630,'627cd97a5cafb033090206.pdf','Gebrauchsinformation.pdf',250516,'application/pdf','Gebrauchsinformation','Gebrauchsinformation','pdf_file_one','61','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1630,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1631,'627cd97a5d356682314733.pdf','Fachinformation.pdf',179186,'application/pdf','Fachinformation',NULL,'pdf_file_two','61','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1631,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1632,'627cd97a6318b566935705.jpg','products/novalgin/novalgin-tropfen/Novalgin-Tropfen-10ml-Loes-0038882-02092016.jpg',130768,'image/jpeg','products/novalgin/novalgin-tropfen/Novalgin-Tropfen-10ml-Loes-0038882-02092016','','image','62','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1632,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1633,'627cd97a63dc9243389421.pdf','Gebrauchsinformation.pdf',286215,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','62','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1633,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1634,'627cd97a645ee601921587.pdf','Fachinformation.pdf',173283,'application/pdf','Fachinformation',NULL,'pdf_file_two','62','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1634,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1635,'627cd97a68216852775604.jpg','products/novalgin/novalgin-10-g-ampullen/Novalgin-1g-10Ampullen-0038801-02092016.jpg',159914,'image/jpeg','products/novalgin/novalgin-10-g-ampullen/Novalgin-1g-10Ampullen-0038801-02092016','','image','59','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1635,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1636,'627cd97a68c4b959901876.pdf','Gebrauchsinformation.pdf',264064,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','59','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1636,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1637,'627cd97a693ec949474193.pdf','Fachinformation.pdf',185905,'application/pdf','Fachinformation',NULL,'pdf_file_two','59','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1637,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1638,'627cd97a6c68c385962332.jpg','products/novalgin/novalgin-25-g-ampullen/Packshot_Novalgin_ampullen_5st_2_5.JPG',26703,'image/jpeg','products/novalgin/novalgin-25-g-ampullen/Packshot_Novalgin_ampullen_5st_2_5','','image','60','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1638,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1639,'627cd97a6d463980349195.pdf','Gebrauchsinformation.pdf',263781,'application/pdf','Gebrauchsinformation',NULL,'pdf_file_one','60','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1639,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1640,'627cd97a6dfe6330243516.pdf','Fachinformation.pdf',185905,'application/pdf','Fachinformation',NULL,'pdf_file_two','60','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',1,1640,'2022-05-12 09:55:06','2022-05-12 09:55:06'),
	(1641,'6299b5108d3fc347295358.png','products/bioflorin/Bioflorin_3dpackage.png',528212,'image/png','products/bioflorin/Bioflorin_3dpackage','','images','140','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1641,'2022-06-03 07:15:28','2022-06-03 07:15:28'),
	(1642,'6299b5108e8ec565236796.jpg','products/bioflorin/cropped-images/A5377703-h2-0-0-0-0-1650974087.jpg',80583,'image/jpeg','products/bioflorin/cropped-images/A5377703-h2-0-0-0-0-1650974087','','images','140','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1642,'2022-06-03 07:15:28','2022-06-03 07:15:28'),
	(1643,'6299b5108f686990160601.jpg','products/bioflorin/cropped-images/A5377703-h3-0-0-0-0-1648455308.jpg',71984,'image/jpeg','products/bioflorin/cropped-images/A5377703-h3-0-0-0-0-1648455308','','images','140','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1643,'2022-06-03 07:15:28','2022-06-03 07:15:28'),
	(1644,'6299b510906a1161753528.jpg','products/bioflorin/cropped-images/A5377703-h4-0-0-0-0-1648455321.jpg',71615,'image/jpeg','products/bioflorin/cropped-images/A5377703-h4-0-0-0-0-1648455321','','images','140','Sanofi\\Pdb\\Models\\PDBLiveProduct',0,1644,'2022-06-03 07:15:28','2022-06-03 07:15:28'),
	(1645,'6299b510936fa177388104.png','products/bioflorin/Bioflorin_3dpackage.png',528212,'image/png','products/bioflorin/Bioflorin_3dpackage','','image','248','Sanofi\\Pdb\\Models\\PDBLiveProductVariant',0,1645,'2022-06-03 07:15:28','2022-06-03 07:15:28');

/*!40000 ALTER TABLE `system_files` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_mail_layouts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_mail_layouts`;

CREATE TABLE `system_mail_layouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_html` text COLLATE utf8mb4_unicode_ci,
  `content_text` text COLLATE utf8mb4_unicode_ci,
  `content_css` text COLLATE utf8mb4_unicode_ci,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `options` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_mail_layouts` WRITE;
/*!40000 ALTER TABLE `system_mail_layouts` DISABLE KEYS */;

INSERT INTO `system_mail_layouts` (`id`, `name`, `code`, `content_html`, `content_text`, `content_css`, `is_locked`, `options`, `created_at`, `updated_at`)
VALUES
	(1,'Default layout','default','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n</head>\n<body>\n    <style type=\"text/css\" media=\"screen\">\n        {{ brandCss|raw }}\n        {{ css|raw }}\n    </style>\n\n    <table class=\"wrapper layout-default\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n\n        <!-- Header -->\n        {% partial \'header\' body %}\n            {{ subject|raw }}\n        {% endpartial %}\n\n        <tr>\n            <td align=\"center\">\n                <table class=\"content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                    <!-- Email Body -->\n                    <tr>\n                        <td class=\"body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                            <table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\">\n                                <!-- Body content -->\n                                <tr>\n                                    <td class=\"content-cell\">\n                                        {{ content|raw }}\n                                    </td>\n                                </tr>\n                            </table>\n                        </td>\n                    </tr>\n                </table>\n            </td>\n        </tr>\n\n        <!-- Footer -->\n        {% partial \'footer\' body %}\n            &copy; {{ \"now\"|date(\"Y\") }} {{ appName }}. All rights reserved.\n        {% endpartial %}\n\n    </table>\n\n</body>\n</html>','{{ content|raw }}','@media only screen and (max-width: 600px) {\n    .inner-body {\n        width: 100% !important;\n    }\n\n    .footer {\n        width: 100% !important;\n    }\n}\n\n@media only screen and (max-width: 500px) {\n    .button {\n        width: 100% !important;\n    }\n}',1,NULL,'2021-11-26 07:57:03','2021-11-26 07:57:03'),
	(2,'System layout','system','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n</head>\n<body>\n    <style type=\"text/css\" media=\"screen\">\n        {{ brandCss|raw }}\n        {{ css|raw }}\n    </style>\n\n    <table class=\"wrapper layout-system\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n        <tr>\n            <td align=\"center\">\n                <table class=\"content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                    <!-- Email Body -->\n                    <tr>\n                        <td class=\"body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n                            <table class=\"inner-body\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\">\n                                <!-- Body content -->\n                                <tr>\n                                    <td class=\"content-cell\">\n                                        {{ content|raw }}\n\n                                        <!-- Subcopy -->\n                                        {% partial \'subcopy\' body %}\n                                            **This is an automatic message. Please do not reply to it.**\n                                        {% endpartial %}\n                                    </td>\n                                </tr>\n                            </table>\n                        </td>\n                    </tr>\n                </table>\n            </td>\n        </tr>\n    </table>\n\n</body>\n</html>','{{ content|raw }}\n\n\n---\nThis is an automatic message. Please do not reply to it.','@media only screen and (max-width: 600px) {\n    .inner-body {\n        width: 100% !important;\n    }\n\n    .footer {\n        width: 100% !important;\n    }\n}\n\n@media only screen and (max-width: 500px) {\n    .button {\n        width: 100% !important;\n    }\n}',1,NULL,'2021-11-26 07:57:03','2021-11-26 07:57:03');

/*!40000 ALTER TABLE `system_mail_layouts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_mail_partials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_mail_partials`;

CREATE TABLE `system_mail_partials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_html` text COLLATE utf8mb4_unicode_ci,
  `content_text` text COLLATE utf8mb4_unicode_ci,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_mail_templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_mail_templates`;

CREATE TABLE `system_mail_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content_html` text COLLATE utf8mb4_unicode_ci,
  `content_text` text COLLATE utf8mb4_unicode_ci,
  `layout_id` int(11) DEFAULT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_mail_templates_layout_id_index` (`layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_parameters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_parameters`;

CREATE TABLE `system_parameters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namespace` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `item_index` (`namespace`,`group`,`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_parameters` WRITE;
/*!40000 ALTER TABLE `system_parameters` DISABLE KEYS */;

INSERT INTO `system_parameters` (`id`, `namespace`, `group`, `item`, `value`)
VALUES
	(1,'system','update','count','0'),
	(2,'system','update','retry','1655216373'),
	(3,'cms','theme','active','\"pdb-theme-at\"'),
	(4,'system','core','build','\"1.1.8\"'),
	(5,'system','core','modified','0');

/*!40000 ALTER TABLE `system_parameters` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_plugin_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_plugin_history`;

CREATE TABLE `system_plugin_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_plugin_history_code_index` (`code`),
  KEY `system_plugin_history_type_index` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_plugin_history` WRITE;
/*!40000 ALTER TABLE `system_plugin_history` DISABLE KEYS */;

INSERT INTO `system_plugin_history` (`id`, `code`, `type`, `version`, `detail`, `created_at`)
VALUES
	(1,'Winter.Demo','comment','1.0.1','First version of Demo','2021-11-26 07:57:03'),
	(2,'Winter.Builder','comment','1.0.1','Initialize plugin.','2021-11-26 07:57:05'),
	(3,'Winter.Builder','comment','1.0.2','Fixes the problem with selecting a plugin. Minor localization corrections. Configuration files in the list and form behaviors are now autocomplete.','2021-11-26 07:57:05'),
	(4,'Winter.Builder','comment','1.0.3','Improved handling of the enum data type.','2021-11-26 07:57:05'),
	(5,'Winter.Builder','comment','1.0.4','Added user permissions to work with the Builder.','2021-11-26 07:57:05'),
	(6,'Winter.Builder','comment','1.0.5','Fixed permissions registration.','2021-11-26 07:57:05'),
	(7,'Winter.Builder','comment','1.0.6','Fixed front-end record ordering in the Record List component.','2021-11-26 07:57:05'),
	(8,'Winter.Builder','comment','1.0.7','Builder settings are now protected with user permissions. The database table column list is scrollable now. Minor code cleanup.','2021-11-26 07:57:05'),
	(9,'Winter.Builder','comment','1.0.8','Added the Reorder Controller behavior.','2021-11-26 07:57:05'),
	(10,'Winter.Builder','comment','1.0.9','Minor API and UI updates.','2021-11-26 07:57:05'),
	(11,'Winter.Builder','comment','1.0.10','Minor styling update.','2021-11-26 07:57:05'),
	(12,'Winter.Builder','comment','1.0.11','Fixed a bug where clicking placeholder in a repeater would open Inspector. Fixed a problem with saving forms with repeaters in tabs. Minor style fix.','2021-11-26 07:57:05'),
	(13,'Winter.Builder','comment','1.0.12','Added support for the Trigger property to the Media Finder widget configuration. Names of form fields and list columns definition files can now contain underscores.','2021-11-26 07:57:05'),
	(14,'Winter.Builder','comment','1.0.13','Minor styling fix on the database editor.','2021-11-26 07:57:05'),
	(15,'Winter.Builder','comment','1.0.14','Added support for published_at timestamp field','2021-11-26 07:57:05'),
	(16,'Winter.Builder','comment','1.0.15','Fixed a bug where saving a localization string in Inspector could cause a JavaScript error. Added support for Timestamps and Soft Deleting for new models.','2021-11-26 07:57:05'),
	(17,'Winter.Builder','comment','1.0.16','Fixed a bug when saving a form with the Repeater widget in a tab could create invalid fields in the form\'s outside area. Added a check that prevents creating localization strings inside other existing strings.','2021-11-26 07:57:05'),
	(18,'Winter.Builder','comment','1.0.17','Added support Trigger attribute support for RecordFinder and Repeater form widgets.','2021-11-26 07:57:05'),
	(19,'Winter.Builder','comment','1.0.18','Fixes a bug where \'::class\' notations in a model class definition could prevent the model from appearing in the Builder model list. Added emptyOption property support to the dropdown form control.','2021-11-26 07:57:05'),
	(20,'Winter.Builder','comment','1.0.19','Added a feature allowing to add all database columns to a list definition. Added max length validation for database table and column names.','2021-11-26 07:57:05'),
	(21,'Winter.Builder','comment','1.0.20','Fixes a bug where form the builder could trigger the \"current.hasAttribute is not a function\" error.','2021-11-26 07:57:05'),
	(22,'Winter.Builder','comment','1.0.21','Back-end navigation sort order updated.','2021-11-26 07:57:05'),
	(23,'Winter.Builder','comment','1.0.22','Added scopeValue property to the RecordList component.','2021-11-26 07:57:05'),
	(24,'Winter.Builder','comment','1.0.23','Added support for balloon-selector field type, added Brazilian Portuguese translation, fixed some bugs','2021-11-26 07:57:05'),
	(25,'Winter.Builder','comment','1.0.24','Added support for tag list field type, added read only toggle for fields. Prevent plugins from using reserved PHP keywords for class names and namespaces','2021-11-26 07:57:05'),
	(26,'Winter.Builder','comment','1.0.25','Allow editing of migration code in the \"Migration\" popup when saving changes in the database editor.','2021-11-26 07:57:05'),
	(27,'Winter.Builder','comment','1.0.26','Allow special default values for columns and added new \"Add ID column\" button to database editor.','2021-11-26 07:57:05'),
	(28,'Winter.Builder','comment','1.0.27','Added ability to use \'scope\' in a form relation field, added ability to change the sort order of versions and added additional properties for repeater widget in form builder. Added Polish translation.','2021-11-26 07:57:05'),
	(29,'Winter.Builder','script','2.0.0','v2.0.0/convert_data.php','2021-11-26 07:57:05'),
	(30,'Winter.Builder','comment','2.0.0','Rebrand to Winter.Builder','2021-11-26 07:57:05'),
	(31,'Winter.Builder','comment','2.0.0','Fixes namespace parsing on php >= 8.0','2021-11-26 07:57:05'),
	(32,'RainLab.Pages','comment','1.0.1','Implemented the static pages management and the Static Page component.','2021-11-30 11:09:32'),
	(33,'RainLab.Pages','comment','1.0.2','Fixed the page preview URL.','2021-11-30 11:09:32'),
	(34,'RainLab.Pages','comment','1.0.3','Implemented menus.','2021-11-30 11:09:32'),
	(35,'RainLab.Pages','comment','1.0.4','Implemented the content block management and placeholder support.','2021-11-30 11:09:32'),
	(36,'RainLab.Pages','comment','1.0.5','Added support for the Sitemap plugin.','2021-11-30 11:09:32'),
	(37,'RainLab.Pages','comment','1.0.6','Minor updates to the internal API.','2021-11-30 11:09:32'),
	(38,'RainLab.Pages','comment','1.0.7','Added the Snippets feature.','2021-11-30 11:09:32'),
	(39,'RainLab.Pages','comment','1.0.8','Minor improvements to the code.','2021-11-30 11:09:32'),
	(40,'RainLab.Pages','comment','1.0.9','Fixes issue where Snippet tab is missing from the Partials form.','2021-11-30 11:09:32'),
	(41,'RainLab.Pages','comment','1.0.10','Add translations for various locales.','2021-11-30 11:09:32'),
	(42,'RainLab.Pages','comment','1.0.11','Fixes issue where placeholders tabs were missing from Page form.','2021-11-30 11:09:32'),
	(43,'RainLab.Pages','comment','1.0.12','Implement Media Manager support.','2021-11-30 11:09:32'),
	(44,'RainLab.Pages','script','1.1.0','snippets_rename_viewbag_properties.php','2021-11-30 11:09:32'),
	(45,'RainLab.Pages','comment','1.1.0','Adds meta title and description to pages. Adds |staticPage filter.','2021-11-30 11:09:32'),
	(46,'RainLab.Pages','comment','1.1.1','Add support for Syntax Fields.','2021-11-30 11:09:32'),
	(47,'RainLab.Pages','comment','1.1.2','Static Breadcrumbs component now respects the hide from navigation setting.','2021-11-30 11:09:32'),
	(48,'RainLab.Pages','comment','1.1.3','Minor back-end styling fix.','2021-11-30 11:09:32'),
	(49,'RainLab.Pages','comment','1.1.4','Minor fix to the StaticPage component API.','2021-11-30 11:09:32'),
	(50,'RainLab.Pages','comment','1.1.5','Fixes bug when using syntax fields.','2021-11-30 11:09:32'),
	(51,'RainLab.Pages','comment','1.1.6','Minor styling fix to the back-end UI.','2021-11-30 11:09:32'),
	(52,'RainLab.Pages','comment','1.1.7','Improved menu item form to include CSS class, open in a new window and hidden flag.','2021-11-30 11:09:32'),
	(53,'RainLab.Pages','comment','1.1.8','Improved the output of snippet partials when saved.','2021-11-30 11:09:32'),
	(54,'RainLab.Pages','comment','1.1.9','Minor update to snippet inspector internal API.','2021-11-30 11:09:32'),
	(55,'RainLab.Pages','comment','1.1.10','Fixes a bug where selecting a layout causes permanent unsaved changes.','2021-11-30 11:09:32'),
	(56,'RainLab.Pages','comment','1.1.11','Add support for repeater syntax field.','2021-11-30 11:09:32'),
	(57,'RainLab.Pages','comment','1.2.0','Added support for translations, UI updates.','2021-11-30 11:09:32'),
	(58,'RainLab.Pages','comment','1.2.1','Use nice titles when listing the content files.','2021-11-30 11:09:32'),
	(59,'RainLab.Pages','comment','1.2.2','Minor styling update.','2021-11-30 11:09:32'),
	(60,'RainLab.Pages','comment','1.2.3','Snippets can now be moved by dragging them.','2021-11-30 11:09:32'),
	(61,'RainLab.Pages','comment','1.2.4','Fixes a bug where the cursor is misplaced when editing text files.','2021-11-30 11:09:32'),
	(62,'RainLab.Pages','comment','1.2.5','Fixes a bug where the parent page is lost upon changing a page layout.','2021-11-30 11:09:32'),
	(63,'RainLab.Pages','comment','1.2.6','Shared view variables are now passed to static pages.','2021-11-30 11:09:32'),
	(64,'RainLab.Pages','comment','1.2.7','Fixes issue with duplicating properties when adding multiple snippets on the same page.','2021-11-30 11:09:32'),
	(65,'RainLab.Pages','comment','1.2.8','Fixes a bug where creating a content block without extension doesn\'t save the contents to file.','2021-11-30 11:09:32'),
	(66,'RainLab.Pages','comment','1.2.9','Add conditional support for translating page URLs.','2021-11-30 11:09:32'),
	(67,'RainLab.Pages','comment','1.2.10','Streamline generation of URLs to use the new Cms::url helper.','2021-11-30 11:09:32'),
	(68,'RainLab.Pages','comment','1.2.11','Implements repeater usage with translate plugin.','2021-11-30 11:09:32'),
	(69,'RainLab.Pages','comment','1.2.12','Fixes minor issue when using snippets and switching the application locale.','2021-11-30 11:09:32'),
	(70,'RainLab.Pages','comment','1.2.13','Fixes bug when AJAX is used on a page that does not yet exist.','2021-11-30 11:09:32'),
	(71,'RainLab.Pages','comment','1.2.14','Add theme logging support for changes made to menus.','2021-11-30 11:09:32'),
	(72,'RainLab.Pages','comment','1.2.15','Back-end navigation sort order updated.','2021-11-30 11:09:32'),
	(73,'RainLab.Pages','comment','1.2.16','Fixes a bug when saving a template that has been modified outside of the CMS (mtime mismatch).','2021-11-30 11:09:32'),
	(74,'RainLab.Pages','comment','1.2.17','Changes locations of custom fields to secondary tabs instead of the primary Settings area. New menu search ability on adding menu items','2021-11-30 11:09:32'),
	(75,'RainLab.Pages','comment','1.2.18','Fixes cache-invalidation issues when RainLab.Translate is not installed. Added Greek & Simplified Chinese translations. Removed deprecated calls. Allowed saving HTML in snippet properties. Added support for the MediaFinder in menu items.','2021-11-30 11:09:32'),
	(76,'RainLab.Pages','comment','1.2.19','Catch exception with corrupted menu file.','2021-11-30 11:09:32'),
	(77,'RainLab.Pages','comment','1.2.20','StaticMenu component now exposes menuName property; added pages.menu.referencesGenerated event.','2021-11-30 11:09:32'),
	(78,'RainLab.Pages','comment','1.2.21','Fixes a bug where last Static Menu item cannot be deleted. Improved Persian, Slovak and Turkish translations.','2021-11-30 11:09:32'),
	(79,'RainLab.Pages','comment','1.3.0','Added support for using Database-driven Themes when enabled in the CMS configuration.','2021-11-30 11:09:32'),
	(80,'RainLab.Pages','comment','1.3.1','Added ChildPages Component, prevent hidden pages from being returned via menu item resolver.','2021-11-30 11:09:32'),
	(81,'RainLab.Pages','comment','1.3.2','Fixes error when creating a subpage whose parent has no layout set.','2021-11-30 11:09:32'),
	(82,'RainLab.Pages','comment','1.3.3','Improves user experience for users with only partial access through permissions','2021-11-30 11:09:32'),
	(83,'RainLab.Pages','comment','1.3.4','Fix error where large menus were being truncated due to the PHP \"max_input_vars\" configuration value. Improved Slovenian translation.','2021-11-30 11:09:32'),
	(84,'RainLab.Pages','comment','1.3.5','Minor fix to bust the browser cache for JS assets. Prevent duplicate property fields in snippet inspector.','2021-11-30 11:09:32'),
	(85,'RainLab.Pages','comment','1.3.6','ChildPages component now displays localized page titles from Translate plugin.','2021-11-30 11:09:32'),
	(86,'RainLab.Pages','comment','1.3.7','Adds MenuPicker formwidget. Adds future support for v2.0 of October CMS.','2021-11-30 11:09:32'),
	(87,'RainLab.Pages','comment','1.4.0','Fixes bug when adding menu items in October CMS v2.0.','2021-11-30 11:09:32'),
	(88,'RainLab.Pages','comment','1.4.1','Fixes support for configuration values.','2021-11-30 11:09:32'),
	(89,'RainLab.Pages','comment','1.4.3','Fixes page deletion is newer platform builds.','2021-11-30 11:09:32'),
	(90,'RainLab.User','script','1.0.1','create_users_table.php','2021-11-30 11:26:33'),
	(91,'RainLab.User','script','1.0.1','create_throttle_table.php','2021-11-30 11:26:33'),
	(92,'RainLab.User','comment','1.0.1','Initialize plugin.','2021-11-30 11:26:33'),
	(93,'RainLab.User','comment','1.0.2','Seed tables.','2021-11-30 11:26:33'),
	(94,'RainLab.User','comment','1.0.3','Translated hard-coded text to language strings.','2021-11-30 11:26:33'),
	(95,'RainLab.User','comment','1.0.4','Improvements to user-interface for Location manager.','2021-11-30 11:26:33'),
	(96,'RainLab.User','comment','1.0.5','Added contact details for users.','2021-11-30 11:26:33'),
	(97,'RainLab.User','script','1.0.6','create_mail_blockers_table.php','2021-11-30 11:26:33'),
	(98,'RainLab.User','comment','1.0.6','Added Mail Blocker utility so users can block specific mail templates.','2021-11-30 11:26:33'),
	(99,'RainLab.User','comment','1.0.7','Add back-end Settings page.','2021-11-30 11:26:33'),
	(100,'RainLab.User','comment','1.0.8','Updated the Settings page.','2021-11-30 11:26:33'),
	(101,'RainLab.User','comment','1.0.9','Adds new welcome mail message for users and administrators.','2021-11-30 11:26:33'),
	(102,'RainLab.User','comment','1.0.10','Adds administrator-only activation mode.','2021-11-30 11:26:33'),
	(103,'RainLab.User','script','1.0.11','users_add_login_column.php','2021-11-30 11:26:33'),
	(104,'RainLab.User','comment','1.0.11','Users now have an optional login field that defaults to the email field.','2021-11-30 11:26:33'),
	(105,'RainLab.User','script','1.0.12','users_rename_login_to_username.php','2021-11-30 11:26:34'),
	(106,'RainLab.User','comment','1.0.12','Create a dedicated setting for choosing the login mode.','2021-11-30 11:26:34'),
	(107,'RainLab.User','comment','1.0.13','Minor fix to the Account sign in logic.','2021-11-30 11:26:34'),
	(108,'RainLab.User','comment','1.0.14','Minor improvements to the code.','2021-11-30 11:26:34'),
	(109,'RainLab.User','script','1.0.15','users_add_surname.php','2021-11-30 11:26:34'),
	(110,'RainLab.User','comment','1.0.15','Adds last name column to users table (surname).','2021-11-30 11:26:34'),
	(111,'RainLab.User','comment','1.0.16','Require permissions for settings page too.','2021-11-30 11:26:34'),
	(112,'RainLab.User','comment','1.1.0','!!! Profile fields and Locations have been removed.','2021-11-30 11:26:34'),
	(113,'RainLab.User','script','1.1.1','create_user_groups_table.php','2021-11-30 11:26:34'),
	(114,'RainLab.User','script','1.1.1','seed_user_groups_table.php','2021-11-30 11:26:34'),
	(115,'RainLab.User','comment','1.1.1','Users can now be added to groups.','2021-11-30 11:26:34'),
	(116,'RainLab.User','comment','1.1.2','A raw URL can now be passed as the redirect property in the Account component.','2021-11-30 11:26:34'),
	(117,'RainLab.User','comment','1.1.3','Adds a super user flag to the users table, reserved for future use.','2021-11-30 11:26:34'),
	(118,'RainLab.User','comment','1.1.4','User list can be filtered by the group they belong to.','2021-11-30 11:26:34'),
	(119,'RainLab.User','comment','1.1.5','Adds a new permission to hide the User settings menu item.','2021-11-30 11:26:34'),
	(120,'RainLab.User','script','1.2.0','users_add_deleted_at.php','2021-11-30 11:26:34'),
	(121,'RainLab.User','comment','1.2.0','Users can now deactivate their own accounts.','2021-11-30 11:26:34'),
	(122,'RainLab.User','comment','1.2.1','New feature for checking if a user is recently active/online.','2021-11-30 11:26:34'),
	(123,'RainLab.User','comment','1.2.2','Add bulk action button to user list.','2021-11-30 11:26:34'),
	(124,'RainLab.User','comment','1.2.3','Included some descriptive paragraphs in the Reset Password component markup.','2021-11-30 11:26:34'),
	(125,'RainLab.User','comment','1.2.4','Added a checkbox for blocking all mail sent to the user.','2021-11-30 11:26:34'),
	(126,'RainLab.User','script','1.2.5','update_timestamp_nullable.php','2021-11-30 11:26:34'),
	(127,'RainLab.User','comment','1.2.5','Database maintenance. Updated all timestamp columns to be nullable.','2021-11-30 11:26:34'),
	(128,'RainLab.User','script','1.2.6','users_add_last_seen.php','2021-11-30 11:26:34'),
	(129,'RainLab.User','comment','1.2.6','Add a dedicated last seen column for users.','2021-11-30 11:26:34'),
	(130,'RainLab.User','comment','1.2.7','Minor fix to user timestamp attributes.','2021-11-30 11:26:34'),
	(131,'RainLab.User','comment','1.2.8','Add date range filter to users list. Introduced a logout event.','2021-11-30 11:26:34'),
	(132,'RainLab.User','comment','1.2.9','Add invitation mail for new accounts created in the back-end.','2021-11-30 11:26:34'),
	(133,'RainLab.User','script','1.3.0','users_add_guest_flag.php','2021-11-30 11:26:34'),
	(134,'RainLab.User','script','1.3.0','users_add_superuser_flag.php','2021-11-30 11:26:34'),
	(135,'RainLab.User','comment','1.3.0','Introduced guest user accounts.','2021-11-30 11:26:34'),
	(136,'RainLab.User','comment','1.3.1','User notification variables can now be extended.','2021-11-30 11:26:34'),
	(137,'RainLab.User','comment','1.3.2','Minor fix to the Auth::register method.','2021-11-30 11:26:34'),
	(138,'RainLab.User','comment','1.3.3','Allow prevention of concurrent user sessions via the user settings.','2021-11-30 11:26:34'),
	(139,'RainLab.User','comment','1.3.4','Added force secure protocol property to the account component.','2021-11-30 11:26:34'),
	(140,'RainLab.User','comment','1.4.0','!!! The Notifications tab in User settings has been removed.','2021-11-30 11:26:34'),
	(141,'RainLab.User','comment','1.4.1','Added support for user impersonation.','2021-11-30 11:26:34'),
	(142,'RainLab.User','comment','1.4.2','Fixes security bug in Password Reset component.','2021-11-30 11:26:34'),
	(143,'RainLab.User','comment','1.4.3','Fixes session handling for AJAX requests.','2021-11-30 11:26:34'),
	(144,'RainLab.User','comment','1.4.4','Fixes bug where impersonation touches the last seen timestamp.','2021-11-30 11:26:34'),
	(145,'RainLab.User','comment','1.4.5','Added token fallback process to Account / Reset Password components when parameter is missing.','2021-11-30 11:26:34'),
	(146,'RainLab.User','comment','1.4.6','Fixes Auth::register method signature mismatch with core OctoberCMS Auth library','2021-11-30 11:26:34'),
	(147,'RainLab.User','comment','1.4.7','Fixes redirect bug in Account component / Update translations and separate user and group management.','2021-11-30 11:26:34'),
	(148,'RainLab.User','comment','1.4.8','Fixes a bug where calling MailBlocker::removeBlock could remove all mail blocks for the user.','2021-11-30 11:26:34'),
	(149,'RainLab.User','comment','1.5.0','!!! Required password length is now a minimum of 8 characters. Previous passwords will not be affected until the next password change.','2021-11-30 11:26:34'),
	(150,'RainLab.User','script','1.5.1','users_add_ip_address.php','2021-11-30 11:26:34'),
	(151,'RainLab.User','comment','1.5.1','User IP addresses are now logged. Introduce registration throttle.','2021-11-30 11:26:34'),
	(152,'RainLab.User','comment','1.5.2','Whitespace from usernames is now trimmed, allowed for username to be added to Reset Password mail templates.','2021-11-30 11:26:34'),
	(153,'RainLab.User','comment','1.5.3','Fixes a bug in the user update functionality if password is not changed. Added highlighting for banned users in user list.','2021-11-30 11:26:34'),
	(154,'RainLab.User','comment','1.5.4','Multiple translation improvements. Added view events to extend user preview and user listing toolbars.','2021-11-30 11:26:34'),
	(220,'Ilume.Frontend','comment','1.0.1','Initial Release','2021-11-30 11:34:00'),
	(244,'Ilume.Backend','comment','1.0.1','Initial Release','2021-11-30 12:46:27'),
	(245,'Ilume.Backend','script','1.0.2','1_0_2_builder_table_create_ilume_backend_rainlab_pages.php','2021-11-30 12:52:25'),
	(246,'Ilume.Backend','comment','1.0.2','Created table ilume_backend_rainlab_page_access','2021-11-30 12:52:25'),
	(247,'Ilume.Backend','script','1.0.3','1_0_3_builder_table_create_ilume_backend_rainlab_page_revisions.php','2021-11-30 12:52:25'),
	(248,'Ilume.Backend','comment','1.0.3','Updated table ilume_backend_rainlab_page_revisions','2021-11-30 12:52:25'),
	(249,'Ilume.Backend','script','1.0.4','1_0_4_builder_table_update_ilume_backend_rainlab_pages_user_sort.php','2021-11-30 12:52:25'),
	(250,'Ilume.Backend','comment','1.0.4','Updated table ilume_backend_rainlab_pages_user_sort','2021-11-30 12:52:25'),
	(251,'RainLab.Translate','script','1.0.1','create_messages_table.php','2021-11-30 12:55:51'),
	(252,'RainLab.Translate','script','1.0.1','create_attributes_table.php','2021-11-30 12:55:51'),
	(253,'RainLab.Translate','script','1.0.1','create_locales_table.php','2021-11-30 12:55:51'),
	(254,'RainLab.Translate','comment','1.0.1','First version of Translate','2021-11-30 12:55:51'),
	(255,'RainLab.Translate','comment','1.0.2','Languages and Messages can now be deleted.','2021-11-30 12:55:51'),
	(256,'RainLab.Translate','comment','1.0.3','Minor updates for latest October release.','2021-11-30 12:55:51'),
	(257,'RainLab.Translate','comment','1.0.4','Locale cache will clear when updating a language.','2021-11-30 12:55:51'),
	(258,'RainLab.Translate','comment','1.0.5','Add Spanish language and fix plugin config.','2021-11-30 12:55:51'),
	(259,'RainLab.Translate','comment','1.0.6','Minor improvements to the code.','2021-11-30 12:55:51'),
	(260,'RainLab.Translate','comment','1.0.7','Fixes major bug where translations are skipped entirely!','2021-11-30 12:55:51'),
	(261,'RainLab.Translate','comment','1.0.8','Minor bug fixes.','2021-11-30 12:55:51'),
	(262,'RainLab.Translate','comment','1.0.9','Fixes an issue where newly created models lose their translated values.','2021-11-30 12:55:51'),
	(263,'RainLab.Translate','comment','1.0.10','Minor fix for latest build.','2021-11-30 12:55:51'),
	(264,'RainLab.Translate','comment','1.0.11','Fix multilingual rich editor when used in stretch mode.','2021-11-30 12:55:51'),
	(265,'RainLab.Translate','comment','1.1.0','Introduce compatibility with RainLab.Pages plugin.','2021-11-30 12:55:51'),
	(266,'RainLab.Translate','comment','1.1.1','Minor UI fix to the language picker.','2021-11-30 12:55:51'),
	(267,'RainLab.Translate','comment','1.1.2','Add support for translating Static Content files.','2021-11-30 12:55:51'),
	(268,'RainLab.Translate','comment','1.1.3','Improved support for the multilingual rich editor.','2021-11-30 12:55:51'),
	(269,'RainLab.Translate','comment','1.1.4','Adds new multilingual markdown editor.','2021-11-30 12:55:51'),
	(270,'RainLab.Translate','comment','1.1.5','Minor update to the multilingual control API.','2021-11-30 12:55:51'),
	(271,'RainLab.Translate','comment','1.1.6','Minor improvements in the message editor.','2021-11-30 12:55:51'),
	(272,'RainLab.Translate','comment','1.1.7','Fixes bug not showing content when first loading multilingual textarea controls.','2021-11-30 12:55:51'),
	(273,'RainLab.Translate','comment','1.2.0','CMS pages now support translating the URL.','2021-11-30 12:55:51'),
	(274,'RainLab.Translate','comment','1.2.1','Minor update in the rich editor and code editor language control position.','2021-11-30 12:55:51'),
	(275,'RainLab.Translate','comment','1.2.2','Static Pages now support translating the URL.','2021-11-30 12:55:51'),
	(276,'RainLab.Translate','comment','1.2.3','Fixes Rich Editor when inserting a page link.','2021-11-30 12:55:51'),
	(277,'RainLab.Translate','script','1.2.4','create_indexes_table.php','2021-11-30 12:55:51'),
	(278,'RainLab.Translate','comment','1.2.4','Translatable attributes can now be declared as indexes.','2021-11-30 12:55:51'),
	(279,'RainLab.Translate','comment','1.2.5','Adds new multilingual repeater form widget.','2021-11-30 12:55:51'),
	(280,'RainLab.Translate','comment','1.2.6','Fixes repeater usage with static pages plugin.','2021-11-30 12:55:51'),
	(281,'RainLab.Translate','comment','1.2.7','Fixes placeholder usage with static pages plugin.','2021-11-30 12:55:51'),
	(282,'RainLab.Translate','comment','1.2.8','Improvements to code for latest October build compatibility.','2021-11-30 12:55:51'),
	(283,'RainLab.Translate','comment','1.2.9','Fixes context for translated strings when used with Static Pages.','2021-11-30 12:55:51'),
	(284,'RainLab.Translate','comment','1.2.10','Minor UI fix to the multilingual repeater.','2021-11-30 12:55:51'),
	(285,'RainLab.Translate','comment','1.2.11','Fixes translation not working with partials loaded via AJAX.','2021-11-30 12:55:51'),
	(286,'RainLab.Translate','comment','1.2.12','Add support for translating the new grouped repeater feature.','2021-11-30 12:55:51'),
	(287,'RainLab.Translate','comment','1.3.0','Added search to the translate messages page.','2021-11-30 12:55:51'),
	(288,'RainLab.Translate','script','1.3.1','builder_table_update_rainlab_translate_locales.php','2021-11-30 12:55:51'),
	(289,'RainLab.Translate','script','1.3.1','seed_all_tables.php','2021-11-30 12:55:51'),
	(290,'RainLab.Translate','comment','1.3.1','Added reordering to languages','2021-11-30 12:55:51'),
	(291,'RainLab.Translate','comment','1.3.2','Improved compatibility with RainLab.Pages, added ability to scan Mail Messages for translatable variables.','2021-11-30 12:55:51'),
	(292,'RainLab.Translate','comment','1.3.3','Fix to the locale picker session handling in Build 420 onwards.','2021-11-30 12:55:51'),
	(293,'RainLab.Translate','comment','1.3.4','Add alternate hreflang elements and adds prefixDefaultLocale setting.','2021-11-30 12:55:51'),
	(294,'RainLab.Translate','comment','1.3.5','Fix MLRepeater bug when switching locales.','2021-11-30 12:55:51'),
	(295,'RainLab.Translate','comment','1.3.6','Fix Middleware to use the prefixDefaultLocale setting introduced in 1.3.4','2021-11-30 12:55:51'),
	(296,'RainLab.Translate','comment','1.3.7','Fix config reference in LocaleMiddleware','2021-11-30 12:55:51'),
	(297,'RainLab.Translate','comment','1.3.8','Keep query string when switching locales','2021-11-30 12:55:51'),
	(298,'RainLab.Translate','comment','1.4.0','Add importer and exporter for messages','2021-11-30 12:55:51'),
	(299,'RainLab.Translate','comment','1.4.1','Updated Hungarian translation. Added Arabic translation. Fixed issue where default texts are overwritten by import. Fixed issue where the language switcher for repeater fields would overlap with the first repeater row.','2021-11-30 12:55:51'),
	(300,'RainLab.Translate','comment','1.4.2','Add multilingual MediaFinder','2021-11-30 12:55:51'),
	(301,'RainLab.Translate','comment','1.4.3','!!! Please update OctoberCMS to Build 444 before updating this plugin. Added ability to translate CMS Pages fields (e.g. title, description, meta-title, meta-description)','2021-11-30 12:55:51'),
	(302,'RainLab.Translate','comment','1.4.4','Minor improvements to compatibility with Laravel framework.','2021-11-30 12:55:51'),
	(303,'RainLab.Translate','comment','1.4.5','Fixed issue when using the language switcher','2021-11-30 12:55:51'),
	(304,'RainLab.Translate','comment','1.5.0','Compatibility fix with Build 451','2021-11-30 12:55:51'),
	(305,'RainLab.Translate','comment','1.6.0','Make File Upload widget properties translatable. Merge Repeater core changes into MLRepeater widget. Add getter method to retrieve original translate data.','2021-11-30 12:55:51'),
	(306,'RainLab.Translate','comment','1.6.1','Add ability for models to provide translated computed data, add option to disable locale prefix routing','2021-11-30 12:55:51'),
	(307,'RainLab.Translate','comment','1.6.2','Implement localeUrl filter, add per-locale theme configuration support','2021-11-30 12:55:51'),
	(308,'RainLab.Translate','comment','1.6.3','Add eager loading for translations, restore support for accessors & mutators','2021-11-30 12:55:51'),
	(309,'RainLab.Translate','comment','1.6.4','Fixes PHP 7.4 compatibility','2021-11-30 12:55:51'),
	(310,'RainLab.Translate','comment','1.6.5','Fixes compatibility issue when other plugins use a custom model morph map','2021-11-30 12:55:51'),
	(311,'RainLab.Translate','script','1.6.6','migrate_morphed_attributes.php','2021-11-30 12:55:51'),
	(312,'RainLab.Translate','comment','1.6.6','Introduce migration to patch existing translations using morph map','2021-11-30 12:55:51'),
	(313,'RainLab.Translate','script','1.6.7','migrate_morphed_indexes.php','2021-11-30 12:55:51'),
	(314,'RainLab.Translate','comment','1.6.7','Introduce migration to patch existing indexes using morph map','2021-11-30 12:55:51'),
	(315,'RainLab.Translate','comment','1.6.8','Add support for transOrderBy; Add translation support for ThemeData; Update russian localization.','2021-11-30 12:55:51'),
	(316,'RainLab.Translate','comment','1.6.9','Clear Static Page menu cache after saving the model; CSS fix for Text/Textarea input fields language selector.','2021-11-30 12:55:51'),
	(317,'RainLab.Translate','comment','1.6.10','Add option to purge deleted messages when scanning messages, Add Scan error column on Messages page, update_messages_table.php, Fix translations that were lost when clicking locale twice while holding ctrl key, Fix error with nested fields default locale value, Escape Message translate params value.','2021-11-30 12:55:51'),
	(318,'RainLab.Translate','comment','1.7.0','!!! Breaking change for the Message::trans() method (params are now escaped), fix message translation documentation, fix string translation key for scan errors column header.','2021-11-30 12:55:51'),
	(319,'RainLab.Translate','comment','1.7.1','Fix YAML issue with previous tag/release.','2021-11-30 12:55:51'),
	(320,'RainLab.Translate','comment','1.7.2','Fix regex when \"|_\" filter is followed by another filter, Try locale without country before returning default translation, Allow exporting default locale, Fire \'rainlab.translate.themeScanner.afterScan\' event in the theme scanner for extendability.','2021-11-30 12:55:51'),
	(321,'RainLab.Translate','comment','1.7.3','Make plugin ready for Laravel 6 update, Add support for translating RainLab.Pages MenuItem properties (requires RainLab.Pages v1.3.6), Restore multilingual button position for textarea, Fix translatableAttributes.','2021-11-30 12:55:51'),
	(322,'RainLab.Translate','comment','1.7.4','Faster version of transWhere, Mail templates/views can now be localized, Fix messages table layout on mobile, Fix scopeTransOrderBy duplicates, Polish localization updates, Turkish localization updates, Add Greek language localization.','2021-11-30 12:55:51'),
	(323,'RainLab.Translate','comment','1.8.0','Adds initial support for October v2.0','2021-11-30 12:55:51'),
	(324,'RainLab.Translate','comment','1.8.1','Minor bugfix','2021-11-30 12:55:51'),
	(325,'RainLab.Translate','comment','1.8.2','Fixes translated file models and theme data for v2.0. The parent model must implement translatable behavior for their related file models to be translated.','2021-11-30 12:55:51'),
	(326,'Utopigs.Seo','script','1.0.1','create_data_table.php','2021-11-30 12:55:51'),
	(327,'Utopigs.Seo','comment','1.0.1','First version of Utopigs Seo plugin','2021-11-30 12:55:51'),
	(328,'Utopigs.Seo','comment','1.0.2','Fix bug with elements with nested items','2021-11-30 12:55:51'),
	(329,'Utopigs.Seo','script','1.1.0','create_sitemaps_table.php','2021-11-30 12:55:51'),
	(330,'Utopigs.Seo','comment','1.1.0','Add sitemap functionality','2021-11-30 12:55:51'),
	(331,'Utopigs.Seo','comment','1.1.0','Fix some bugs with nested items','2021-11-30 12:55:51'),
	(332,'Utopigs.Seo','comment','1.1.1','Fix browser render issue','2021-11-30 12:55:51'),
	(333,'Utopigs.Seo','comment','1.1.2','Undo last change to fix Google Search Console sitemap fetch issues','2021-11-30 12:55:51'),
	(334,'Utopigs.Seo','comment','1.1.3','Add a sitemap-debug.xml that renders ok (using https protocol for the namespace attributes) to be able to debug sitemap issues visually','2021-11-30 12:55:51'),
	(335,'Utopigs.Seo','comment','1.1.4','Fix bug model image not showing','2021-11-30 12:55:51'),
	(336,'Utopigs.Seo','comment','1.1.5','Fix bug with nested categories','2021-11-30 12:55:51'),
	(337,'Utopigs.Seo','comment','1.1.6','Try to retrieve image from defaults if not specified','2021-11-30 12:55:51'),
	(338,'Utopigs.Seo','comment','1.1.6','Autofill properties for blog post and category pages','2021-11-30 12:55:51'),
	(339,'Utopigs.Seo','comment','1.1.7','Add translations for catalan','2021-11-30 12:55:51'),
	(342,'Sanofi.Pdb','comment','1.0.1','Initialize plugin.','2021-12-10 08:19:52'),
	(343,'Sanofi.Pdb','script','1.0.2','builder_table_create_sanofi_pdb_area.php','2021-12-10 08:56:40'),
	(344,'Sanofi.Pdb','comment','1.0.2','Created table sanofi_pdb_area','2021-12-10 08:56:40'),
	(345,'Sanofi.Pdb','script','1.0.3','builder_table_create_sanofi_pdb_ingriedients.php','2021-12-10 09:00:32'),
	(346,'Sanofi.Pdb','comment','1.0.3','Created table sanofi_pdb_ingriedients','2021-12-10 09:00:32'),
	(347,'Sanofi.Pdb','script','1.0.4','builder_table_update_sanofi_pdb_area.php','2021-12-10 09:15:42'),
	(348,'Sanofi.Pdb','comment','1.0.4','Updated table sanofi_pdb_area','2021-12-10 09:15:42'),
	(349,'Sanofi.Pdb','script','1.0.5','builder_table_create_sanofi_pdb_product.php','2021-12-10 09:20:35'),
	(350,'Sanofi.Pdb','comment','1.0.5','Created table sanofi_pdb_product','2021-12-10 09:20:35'),
	(351,'Sanofi.Pdb','script','1.0.6','builder_table_update_sanofi_pdb_ingredients.php','2021-12-10 10:35:44'),
	(352,'Sanofi.Pdb','comment','1.0.6','Updated table sanofi_pdb_ingriedients','2021-12-10 10:35:44'),
	(353,'Sanofi.Pdb','script','1.0.7','builder_table_create_sanofi_pdb_product_x_ingredients.php','2021-12-10 10:36:56'),
	(354,'Sanofi.Pdb','comment','1.0.7','Created table sanofi_pdb_product_x_ingredients','2021-12-10 10:36:56'),
	(355,'Sanofi.Pdb','script','1.0.8','builder_table_create_sanofi_pdb_product_variants.php','2021-12-10 13:19:22'),
	(356,'Sanofi.Pdb','comment','1.0.8','Created table sanofi_pdb_product_variants','2021-12-10 13:19:22'),
	(357,'Sanofi.Pdb','script','1.0.9','builder_table_update_sanofi_pdb_product.php','2021-12-10 13:19:38'),
	(358,'Sanofi.Pdb','comment','1.0.9','Updated table sanofi_pdb_product','2021-12-10 13:19:38'),
	(359,'Sanofi.Pdb','script','1.0.10','builder_table_update_sanofi_pdb_area_2.php','2021-12-10 13:20:02'),
	(360,'Sanofi.Pdb','comment','1.0.10','Updated table sanofi_pdb_area','2021-12-10 13:20:02'),
	(361,'Sanofi.Pdb','script','1.0.11','builder_table_update_sanofi_pdb_products.php','2021-12-10 13:21:15'),
	(362,'Sanofi.Pdb','comment','1.0.11','Updated table sanofi_pdb_product','2021-12-10 13:21:15'),
	(363,'Sanofi.Pdb','script','1.0.12','builder_table_update_sanofi_pdb_areas.php','2021-12-10 13:21:20'),
	(364,'Sanofi.Pdb','comment','1.0.12','Updated table sanofi_pdb_area','2021-12-10 13:21:20'),
	(365,'Sanofi.Pdb','script','1.0.13','builder_table_update_sanofi_pdb_product_variants.php','2021-12-10 13:22:09'),
	(366,'Sanofi.Pdb','comment','1.0.13','Updated table sanofi_pdb_product_variants','2021-12-10 13:22:09'),
	(367,'Sanofi.Pdb','script','1.0.14','builder_table_update_sanofi_pdb_product_x_ingredients.php','2021-12-10 13:22:19'),
	(368,'Sanofi.Pdb','comment','1.0.14','Updated table sanofi_pdb_product_x_ingredients','2021-12-10 13:22:19'),
	(369,'Sanofi.Pdb','script','1.0.15','builder_table_update_sanofi_pdb_products_2.php','2021-12-10 13:22:29'),
	(370,'Sanofi.Pdb','comment','1.0.15','Updated table sanofi_pdb_products','2021-12-10 13:22:29'),
	(371,'Sanofi.Pdb','script','1.0.16','builder_table_create_sanofi_pdb_product_variant_types.php','2021-12-10 13:28:02'),
	(372,'Sanofi.Pdb','comment','1.0.16','Created table sanofi_pdb_product_variant_types','2021-12-10 13:28:02'),
	(373,'Sanofi.Pdb','script','1.0.17','builder_table_update_sanofi_pdb_products_3.php','2021-12-10 13:30:20'),
	(374,'Sanofi.Pdb','comment','1.0.17','Updated table sanofi_pdb_products','2021-12-10 13:30:20'),
	(375,'Sanofi.Pdb','script','1.0.18','builder_table_update_sanofi_pdb_products_4.php','2021-12-10 13:30:51'),
	(376,'Sanofi.Pdb','comment','1.0.18','Updated table sanofi_pdb_products','2021-12-10 13:30:51'),
	(377,'Sanofi.Pdb','script','1.0.19','builder_table_update_sanofi_pdb_product_variants_2.php','2021-12-10 13:31:31'),
	(378,'Sanofi.Pdb','comment','1.0.19','Updated table sanofi_pdb_product_variants','2021-12-10 13:31:31'),
	(379,'Sanofi.Pdb','script','1.0.20','builder_table_update_sanofi_pdb_products_5.php','2022-03-18 15:33:51'),
	(380,'Sanofi.Pdb','comment','1.0.20','Updated table sanofi_pdb_products','2022-03-18 15:33:51'),
	(381,'Sanofi.Pdb','script','1.0.21','builder_table_update_sanofi_pdb_product_variants_3.php','2022-03-18 15:34:00'),
	(382,'Sanofi.Pdb','comment','1.0.21','Updated table sanofi_pdb_product_variants','2022-03-18 15:34:00'),
	(383,'Sanofi.Pdb','script','1.0.22','builder_table_update_sanofi_pdb_live_products.php','2022-03-18 15:41:14'),
	(384,'Sanofi.Pdb','comment','1.0.22','Updated table sanofi_pdb_live_products','2022-03-18 15:41:14'),
	(385,'Sanofi.Pdb','script','1.0.23','builder_table_update_sanofi_pdb_live_product_variants.php','2022-03-18 15:41:25'),
	(386,'Sanofi.Pdb','comment','1.0.23','Updated table sanofi_pdb_live_product_variants','2022-03-18 15:41:25'),
	(387,'Romanov.ClearCacheWidget','comment','1.0.1','First version of ClearCacheWidget','2022-05-12 09:38:51'),
	(388,'Romanov.ClearCacheWidget','comment','1.0.2','Translate for brazilian portuguese','2022-05-12 09:38:51'),
	(389,'Romanov.ClearCacheWidget','comment','1.0.3','Some fix','2022-05-12 09:38:51'),
	(390,'Romanov.ClearCacheWidget','comment','1.0.4','Fix chart','2022-05-12 09:38:51'),
	(391,'Romanov.ClearCacheWidget','comment','1.0.5','Add chart size property','2022-05-12 09:38:51'),
	(392,'Romanov.ClearCacheWidget','comment','1.0.6','Add cs_CZ locale','2022-05-12 09:38:51'),
	(393,'Romanov.ClearCacheWidget','comment','1.1.0','Added functionality to delete thumbs images. (set up in widget settings)','2022-05-12 09:38:51'),
	(394,'Romanov.ClearCacheWidget','comment','1.1.1','Ability to specify the path to the folder preview. (set up in widget settings)','2022-05-12 09:38:51'),
	(395,'Romanov.ClearCacheWidget','comment','1.1.2','Some fix. For those who use PHP version below 5.5','2022-05-12 09:38:51'),
	(396,'Romanov.ClearCacheWidget','comment','1.1.3','Update cs_CZ locale','2022-05-12 09:38:51'),
	(397,'Romanov.ClearCacheWidget','comment','1.1.4','Fix ErrorException','2022-05-12 09:38:51'),
	(398,'Romanov.ClearCacheWidget','comment','1.1.5','Add french and italian locales','2022-05-12 09:38:51'),
	(399,'Romanov.ClearCacheWidget','comment','1.2.0','Add property \'Regex for thumb file names\'','2022-05-12 09:38:52'),
	(400,'Romanov.ClearCacheWidget','comment','1.2.1','Add the Hungarian translation','2022-05-12 09:38:52'),
	(401,'Romanov.ClearCacheWidget','comment','1.2.2','Fix for user defined widget title','2022-05-12 09:38:52'),
	(402,'Romanov.ClearCacheWidget','comment','1.2.3','Add Turkish language file','2022-05-12 09:38:52'),
	(403,'Romanov.ClearCacheWidget','comment','1.2.4','Add Dutch language','2022-05-12 09:38:52'),
	(404,'Romanov.ClearCacheWidget','comment','1.2.5','IT locale updated','2022-05-12 09:38:52'),
	(405,'Romanov.ClearCacheWidget','comment','1.2.6','Add sk locale','2022-05-12 09:38:52'),
	(406,'Romanov.ClearCacheWidget','comment','1.3.0','Changing default regex for clearing thumbnails according to the comment https://github.com/romanov-acc/octobercms_clearcachewidget/pull/16#issuecomment-404909441','2022-05-12 09:38:52'),
	(407,'Romanov.ClearCacheWidget','comment','1.3.1','Add Polish translation','2022-05-12 09:38:52'),
	(408,'Romanov.ClearCacheWidget','comment','1.3.2','Add Slovenian translation','2022-05-12 09:38:52'),
	(409,'Sanofi.Pdb','script','1.0.24','builder_table_update_sanofi_pdb_product_variants_3.php','2022-06-13 14:21:55'),
	(410,'Sanofi.Pdb','comment','1.0.24','Updated table sanofi_pdb_product_variants','2022-06-13 14:21:55'),
	(411,'Sanofi.Pdb','script','1.0.25','builder_table_update_sanofi_pdb_live_product_variants2.php','2022-06-13 14:21:55'),
	(412,'Sanofi.Pdb','comment','1.0.25','Updated table sanofi_pdb_live_product_variants','2022-06-13 14:21:55');

/*!40000 ALTER TABLE `system_plugin_history` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_plugin_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_plugin_versions`;

CREATE TABLE `system_plugin_versions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `is_frozen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `system_plugin_versions_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_plugin_versions` WRITE;
/*!40000 ALTER TABLE `system_plugin_versions` DISABLE KEYS */;

INSERT INTO `system_plugin_versions` (`id`, `code`, `version`, `created_at`, `is_disabled`, `is_frozen`)
VALUES
	(1,'Winter.Demo','1.0.1','2021-11-26 07:57:03',0,0),
	(2,'Winter.Builder','2.0.0','2021-11-26 07:57:05',0,0),
	(3,'RainLab.Pages','1.4.3','2021-11-30 11:09:32',0,0),
	(4,'RainLab.User','1.5.4','2021-11-30 11:26:34',0,0),
	(11,'Ilume.Frontend','1.0.1','2021-11-30 11:34:00',0,0),
	(15,'Ilume.Backend','1.0.4','2021-11-30 12:52:25',0,0),
	(16,'RainLab.Translate','1.8.2','2021-11-30 12:55:51',0,0),
	(17,'Utopigs.Seo','1.1.7','2021-11-30 12:55:51',0,0),
	(20,'Sanofi.Pdb','1.0.25','2022-06-13 14:21:55',0,0),
	(21,'Romanov.ClearCacheWidget','1.3.2','2022-05-12 09:38:52',0,0);

/*!40000 ALTER TABLE `system_plugin_versions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table system_request_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_request_logs`;

CREATE TABLE `system_request_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status_code` int(11) DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` text COLLATE utf8mb4_unicode_ci,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_revisions`;

CREATE TABLE `system_revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `new_value` text COLLATE utf8mb4_unicode_ci,
  `revisionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisionable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_revisions_revisionable_id_revisionable_type_index` (`revisionable_id`,`revisionable_type`),
  KEY `system_revisions_user_id_index` (`user_id`),
  KEY `system_revisions_field_index` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table system_settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `system_settings`;

CREATE TABLE `system_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `system_settings_item_index` (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `system_settings` WRITE;
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;

INSERT INTO `system_settings` (`id`, `item`, `value`)
VALUES
	(1,'winter_builder_settings','{\"author_name\":\"Ilume\",\"author_namespace\":\"pdb\"}'),
	(2,'cms_maintenance_settings','{\"is_enabled\":\"0\",\"cms_page\":\"error-page-500.htm\",\"allowed_ips\":[],\"theme_map\":{\"pdb-theme-at\":\"error-page-500.htm\"}}');

/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_groups_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;

INSERT INTO `user_groups` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Guest','guest','Default group for guest users.','2021-11-30 11:26:34','2021-11-30 11:26:34'),
	(2,'Registered','registered','Default group for registered users.','2021-11-30 11:26:34','2021-11-30 11:26:34');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_throttle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_throttle`;

CREATE TABLE `user_throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `is_suspended` tinyint(1) NOT NULL DEFAULT '0',
  `suspended_at` timestamp NULL DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_throttle_user_id_index` (`user_id`),
  KEY `user_throttle_ip_address_index` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persist_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `is_activated` tinyint(1) NOT NULL DEFAULT '0',
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `created_ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_login_unique` (`username`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`),
  KEY `users_login_index` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table utopigs_seo_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utopigs_seo_data`;

CREATE TABLE `utopigs_seo_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table utopigs_seo_sitemaps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utopigs_seo_sitemaps`;

CREATE TABLE `utopigs_seo_sitemaps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utopigs_seo_sitemaps_theme_index` (`theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `utopigs_seo_sitemaps` WRITE;
/*!40000 ALTER TABLE `utopigs_seo_sitemaps` DISABLE KEYS */;

INSERT INTO `utopigs_seo_sitemaps` (`id`, `theme`, `data`, `created_at`, `updated_at`)
VALUES
	(1,'pdb-theme-at','[]','2022-03-03 10:01:25','2022-03-03 10:01:25');

/*!40000 ALTER TABLE `utopigs_seo_sitemaps` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
