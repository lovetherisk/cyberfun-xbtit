ALTER TABLE `{$db_prefix}comments` CHANGE  `text`  `text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `{$db_prefix}comments` CHANGE  `ori_text`  `ori_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `{$db_prefix}forums` CHANGE  `description`  `description` VARCHAR( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}forums` CHANGE  `name`  `name` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '' ;
ALTER TABLE `{$db_prefix}posts`  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
ALTER TABLE `{$db_prefix}posts` CHANGE `body` `body` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}topics`  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
ALTER TABLE `{$db_prefix}topics` CHANGE `subject` `subject` VARCHAR( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}topics` CHANGE `locked` `locked` ENUM( 'yes', 'no' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no' ;
ALTER TABLE `{$db_prefix}topics` CHANGE `sticky` `sticky` ENUM( 'yes', 'no' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no' ;
ALTER TABLE `{$db_prefix}logs` CHANGE `txt` `txt` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}messages`  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
ALTER TABLE `{$db_prefix}messages` CHANGE `subject` `subject` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'reason for making my database bigger' ;
ALTER TABLE `{$db_prefix}comments` CHANGE `text` `text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `{$db_prefix}comments` CHANGE `ori_text` `ori_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `{$db_prefix}posts` CHANGE `body` `body` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}files` CHANGE  `comment`  `comment` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}users` CHANGE  `custom_title`  `custom_title` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `{$db_prefix}users` CHANGE  `warnreason`  `warnreason` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `{$db_prefix}files` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
ALTER TABLE `{$db_prefix}bannedip` CHANGE  `comment`  `comment` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  '' ;
