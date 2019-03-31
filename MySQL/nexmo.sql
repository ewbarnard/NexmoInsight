SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `formattings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) unsigned NOT NULL DEFAULT '0',
  `intl_format_number` varchar(255) NOT NULL DEFAULT '',
  `natl_format_number` varchar(255) NOT NULL DEFAULT '',
  `country_code` varchar(16) NOT NULL DEFAULT '',
  `country_code_iso3` char(3) NOT NULL DEFAULT '',
  `country_name` varchar(255) NOT NULL DEFAULT '',
  `country_prefix` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
