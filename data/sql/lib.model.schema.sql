
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- ads
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ads`;


CREATE TABLE `ads`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`user_id` BIGINT(20),
	`config_id` BIGINT(20),
	`info` TEXT,
	`price` BIGINT(20),
	`rating` BIGINT(20),
	`weigth` INTEGER default 0,
	PRIMARY KEY (`id`),
	KEY `user_id_idx`(`user_id`),
	KEY `config_id_idx`(`config_id`),
	CONSTRAINT `ads_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `ads_FK_2`
		FOREIGN KEY (`config_id`)
		REFERENCES `config` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- brand
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `brand`;


CREATE TABLE `brand`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`brand_name` VARCHAR(255)  NOT NULL,
	`brand_info` TEXT,
	`brand_country` VARCHAR(255),
	`weigth` INTEGER default 0,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `brand_name` (`brand_name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- config
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `config`;


CREATE TABLE `config`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`model_id` BIGINT(20)  NOT NULL,
	`config_name` VARCHAR(255),
	`weigth` INTEGER default 0,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `model_id_idx`(`model_id`),
	CONSTRAINT `config_FK_1`
		FOREIGN KEY (`model_id`)
		REFERENCES `model` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- config_field
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `config_field`;


CREATE TABLE `config_field`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`category_id` BIGINT(20)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`html_comment` VARCHAR(255),
	`info` TEXT,
	`weigth` INTEGER default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `config_field_FI_1` (`category_id`),
	CONSTRAINT `config_field_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `config_field_category` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- config_field_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `config_field_category`;


CREATE TABLE `config_field_category`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`weigth` INTEGER default 0,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- field_value
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `field_value`;


CREATE TABLE `field_value`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`field_id` BIGINT(20),
	`config_id` BIGINT(20),
	`value` TEXT,
	`rating` BIGINT(20),
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `field_value_FI_1` (`field_id`),
	CONSTRAINT `field_value_FK_1`
		FOREIGN KEY (`field_id`)
		REFERENCES `config_field` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `field_value_FI_2` (`config_id`),
	CONSTRAINT `field_value_FK_2`
		FOREIGN KEY (`config_id`)
		REFERENCES `config` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `link`;


CREATE TABLE `link`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`value` VARCHAR(255),
	`title` VARCHAR(255),
	`href` TEXT,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- logs
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `logs`;


CREATE TABLE `logs`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`query_by` BIGINT(20),
	`check_by` BIGINT(20),
	`query_at` DATETIME,
	`check_at` DATETIME,
	`status` TEXT,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `query_by_idx`(`query_by`),
	KEY `check_by_idx`(`check_by`),
	CONSTRAINT `logs_FK_1`
		FOREIGN KEY (`query_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `logs_FK_2`
		FOREIGN KEY (`check_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- media
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `media`;


CREATE TABLE `media`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`parent_id` BIGINT(20)  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`type` VARCHAR(255),
	`class_name` VARCHAR(255),
	`ext` VARCHAR(255),
	`is_main` TINYINT(1)  NOT NULL,
	`path` TEXT  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- menu
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;


CREATE TABLE `menu`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`slot` BIGINT(20),
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- menu_item
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `menu_item`;


CREATE TABLE `menu_item`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`menu_id` BIGINT(20),
	`type` VARCHAR(255),
	`ref_id` BIGINT(20),
	`list_order` BIGINT(20) default 999999,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `menu_id_idx`(`menu_id`),
	CONSTRAINT `menu_item_FK_1`
		FOREIGN KEY (`menu_id`)
		REFERENCES `menu` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- model
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `model`;


CREATE TABLE `model`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`model_name` VARCHAR(255)  NOT NULL,
	`model_info` TEXT,
	`series_id` BIGINT(20)  NOT NULL,
	`review_id` BIGINT(20),
	`score_id` BIGINT(20),
	`weigth` INTEGER default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `series_id_idx`(`series_id`),
	KEY `review_id_idx`(`review_id`),
	KEY `score_id_idx`(`score_id`),
	CONSTRAINT `model_FK_1`
		FOREIGN KEY (`series_id`)
		REFERENCES `series` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `model_FK_2`
		FOREIGN KEY (`review_id`)
		REFERENCES `review` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `model_FK_3`
		FOREIGN KEY (`score_id`)
		REFERENCES `score` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `page`;


CREATE TABLE `page`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`parent_id` BIGINT(20),
	`title` VARCHAR(255),
	`keywords` VARCHAR(255),
	`metadata` TEXT,
	`content` TEXT,
	`is_published` TINYINT(1)  NOT NULL,
	`p_order` BIGINT(20) default 999999,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `parent_id_idx`(`parent_id`),
	CONSTRAINT `page_FK_1`
		FOREIGN KEY (`parent_id`)
		REFERENCES `page` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;


CREATE TABLE `post`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`keywords` VARCHAR(255),
	`metadata` TEXT,
	`content` TEXT,
	`is_published` TINYINT(1)  NOT NULL,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post_category`;


CREATE TABLE `post_category`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `name` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post_category_relation
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post_category_relation`;


CREATE TABLE `post_category_relation`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`post_id` BIGINT(20),
	`category_id` BIGINT(20),
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `post_id_idx`(`post_id`),
	KEY `category_id_idx`(`category_id`),
	CONSTRAINT `post_category_relation_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `post_category_relation_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `post_category` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- review
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `review`;


CREATE TABLE `review`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`author_id` BIGINT(20)  NOT NULL,
	`model_id` BIGINT(20)  NOT NULL,
	`cons` TEXT,
	`pros` TEXT,
	`rtext` TEXT,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `author_id_idx`(`author_id`),
	KEY `model_id_idx`(`model_id`),
	CONSTRAINT `review_FK_1`
		FOREIGN KEY (`author_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `review_FK_2`
		FOREIGN KEY (`model_id`)
		REFERENCES `model` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- score
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `score`;


CREATE TABLE `score`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`user_id` BIGINT(20)  NOT NULL,
	`model_id` BIGINT(20)  NOT NULL,
	`overall` DOUBLE,
	`design` DOUBLE,
	`features` DOUBLE,
	`performance` DOUBLE,
	`battery` DOUBLE,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `user_id_idx`(`user_id`),
	KEY `model_id_idx`(`model_id`),
	CONSTRAINT `score_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `score_FK_2`
		FOREIGN KEY (`model_id`)
		REFERENCES `model` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- series
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `series`;


CREATE TABLE `series`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`series_name` VARCHAR(255)  NOT NULL,
	`series_info` VARCHAR(255),
	`brand_id` BIGINT(20)  NOT NULL,
	`weigth` INTEGER default 0,
	`created_at` DATETIME  NOT NULL,
	`updated_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `brand_id_idx`(`brand_id`),
	CONSTRAINT `series_FK_1`
		FOREIGN KEY (`brand_id`)
		REFERENCES `brand` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- shop
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `shop`;


CREATE TABLE `shop`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`owner_id` BIGINT(20),
	`info` TEXT,
	`photo` VARCHAR(255),
	`website` VARCHAR(255),
	`email` VARCHAR(255),
	`address` VARCHAR(255),
	`phone` VARCHAR(255),
	`fax` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `owner_id_idx`(`owner_id`),
	CONSTRAINT `shop_FK_1`
		FOREIGN KEY (`owner_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- shop_vitrin
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_vitrin`;


CREATE TABLE `shop_vitrin`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`shop_id` BIGINT(20),
	`config_id` BIGINT(20),
	PRIMARY KEY (`id`),
	KEY `shop_id_idx`(`shop_id`),
	KEY `config_id_idx`(`config_id`),
	CONSTRAINT `shop_vitrin_FK_1`
		FOREIGN KEY (`shop_id`)
		REFERENCES `shop` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `shop_vitrin_FK_2`
		FOREIGN KEY (`config_id`)
		REFERENCES `config` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- user_meta
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_meta`;


CREATE TABLE `user_meta`
(
	`id` BIGINT(20)  NOT NULL AUTO_INCREMENT,
	`user_id` BIGINT(20),
	`model_id` BIGINT(20),
	`info` TEXT,
	`city` BIGINT(20),
	PRIMARY KEY (`id`),
	KEY `user_id_idx`(`user_id`),
	KEY `model_id_idx`(`model_id`),
	CONSTRAINT `user_meta_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `user_meta_FK_2`
		FOREIGN KEY (`model_id`)
		REFERENCES `model` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;


CREATE TABLE `setting`
(
	`key` VARCHAR(255)  NOT NULL,
	`value` VARCHAR(255),
	PRIMARY KEY (`key`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
