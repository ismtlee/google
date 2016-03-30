/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50627
 Source Host           : localhost
 Source Database       : admob_report

 Target Server Type    : MySQL
 Target Server Version : 50627
 File Encoding         : utf-8

 Date: 03/29/2016 16:49:43 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `accounts`
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `pub_id` varchar(20) NOT NULL,
  `tokens` varchar(100) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:admob;2:adsense',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `rp_admob`
-- ----------------------------
DROP TABLE IF EXISTS `rp_admob`;
CREATE TABLE `rp_admob` (
  `ad_unit_name` varchar(100) DEFAULT '',
  `app_name` varchar(100) DEFAULT '',
  `app_id` varchar(100) DEFAULT '',
  `ad_client_id` varchar(100) DEFAULT '',
  `clicks` int(10) unsigned DEFAULT '0',
  `earnings` decimal(8,2) DEFAULT '0.00',
  `individual_ad_impressions_ctr` decimal(10,4) DEFAULT '0.0000',
  `page_views` int(10) DEFAULT '0',
  `rp_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `individual_ad_impressions_rpm` decimal(10,2) DEFAULT '0.00',
  `individual_ad_impressions` int(10) DEFAULT '0',
  `page_views_ctr` decimal(10,4) DEFAULT '0.0000',
  `page_views_rpm` decimal(10,2) DEFAULT '0.00',
  UNIQUE KEY `ad_unit_name` (`ad_unit_name`,`app_name`,`app_id`,`ad_client_id`,`rp_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `rp_adsense`
-- ----------------------------
DROP TABLE IF EXISTS `rp_adsense`;
CREATE TABLE `rp_adsense` (
  `ad_unit_name` varchar(100) DEFAULT '',
  `ad_client_id` varchar(100) DEFAULT '',
  `clicks` int(10) unsigned DEFAULT '0',
  `earnings` decimal(8,2) DEFAULT '0.00',
  `individual_ad_impressions_ctr` decimal(10,4) DEFAULT '0.0000',
  `page_views` int(10) DEFAULT '0',
  `individual_ad_impressions_rpm` decimal(10,2) DEFAULT '0.00',
  `individual_ad_impressions` int(10) DEFAULT '0',
  `page_views_ctr` decimal(10,4) DEFAULT '0.0000',
  `page_views_rpm` decimal(10,2) DEFAULT '0.00',
  `rp_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `ad_unit_name` (`ad_unit_name`,`ad_client_id`,`rp_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
