/*
SQLyog Ultimate v11.26 (32 bit)
MySQL - 5.5.29-MariaDB : Database - p3_02
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`p3_02` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `fiit_invoice_item` */

DROP TABLE IF EXISTS `fiit_invoice_item`;

CREATE TABLE `fiit_invoice_item` (
  `fiit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fiit_finv_id` smallint(10) unsigned NOT NULL,
  `fiit_desc` text,
  `fiit_debet_facn_code` char(20) CHARACTER SET ascii DEFAULT NULL,
  `fiit_credit_facn_code` char(20) CHARACTER SET ascii DEFAULT NULL,
  `fiit_fprc_id` smallint(5) unsigned DEFAULT NULL,
  `fiit_quantity` double NOT NULL,
  `fiit_fqnt_id` tinyint(10) unsigned DEFAULT NULL,
  `fiit_price` decimal(10,4) DEFAULT NULL,
  `fiit_amt` decimal(10,2) DEFAULT NULL,
  `fiit_vat` decimal(10,2) DEFAULT NULL,
  `fiit_total` decimal(10,2) DEFAULT NULL,
  `fiit_fvat_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`fiit_id`),
  KEY `fiit_finv_id` (`fiit_finv_id`),
  KEY `fiit_cqnt_id` (`fiit_fqnt_id`),
  KEY `fiit_credit_facn_code` (`fiit_credit_facn_code`(4)),
  KEY `fiit_debet_facn_code` (`fiit_debet_facn_code`(4),`fiit_id`,`fiit_quantity`),
  KEY `fiit_fvat_id` (`fiit_fvat_id`),
  KEY `fiit_fprc_id` (`fiit_fprc_id`),
  CONSTRAINT `fiit_invoice_item_ibfk_1` FOREIGN KEY (`fiit_finv_id`) REFERENCES `finv_invoice` (`finv_id`),
  CONSTRAINT `fiit_invoice_item_ibfk_2` FOREIGN KEY (`fiit_fvat_id`) REFERENCES `fvat_vat` (`fvat_id`),
  CONSTRAINT `fiit_invoice_item_ibfk_3` FOREIGN KEY (`fiit_fprc_id`) REFERENCES `fprc_product_category` (`fprc_id`),
  CONSTRAINT `fiit_invoice_item_ibfk_4` FOREIGN KEY (`fiit_fqnt_id`) REFERENCES `fqnt_quantity` (`fqnt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fiit_invoice_item` */

/*Table structure for table `finv_invoice` */

DROP TABLE IF EXISTS `finv_invoice`;

CREATE TABLE `finv_invoice` (
  `finv_id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `finv_series_number` varchar(10) DEFAULT NULL,
  `finv_number` varchar(20) NOT NULL,
  `finv_issuer_ccmp_id` int(10) unsigned NOT NULL,
  `finv_payer_ccmp_id` int(10) unsigned NOT NULL,
  `finv_reg_date` date NOT NULL,
  `finv_date` date NOT NULL DEFAULT '0000-00-00',
  `finv_budget_date` date DEFAULT '0000-00-00',
  `finv_due_date` date DEFAULT '0000-00-00',
  `finv_notes` text,
  `finv_fcrn_id` tinyint(10) unsigned NOT NULL,
  `finv_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_vat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_basic_fcrn_id` tinyint(10) unsigned NOT NULL,
  `finv_basic_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_basic_vat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_basic_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_basic_payment_before` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finv_stst_id` tinyint(10) unsigned DEFAULT NULL,
  `finv_paid` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`finv_id`),
  KEY `finv_payer_bcmp_id` (`finv_payer_ccmp_id`),
  KEY `finv_cinv_id` (`finv_issuer_ccmp_id`),
  KEY `finv_fcrn_id` (`finv_fcrn_id`),
  KEY `finv_csta_id` (`finv_stst_id`),
  KEY `finv_number` (`finv_number`(4)),
  KEY `finv_bvsl_id` (`finv_id`),
  KEY `finv_basic_fcrn_id` (`finv_basic_fcrn_id`),
  CONSTRAINT `finv_invoice_ibfk_1` FOREIGN KEY (`finv_issuer_ccmp_id`) REFERENCES `ccmp_company` (`ccmp_id`),
  CONSTRAINT `finv_invoice_ibfk_2` FOREIGN KEY (`finv_payer_ccmp_id`) REFERENCES `ccmp_company` (`ccmp_id`),
  CONSTRAINT `finv_invoice_ibfk_3` FOREIGN KEY (`finv_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`),
  CONSTRAINT `finv_invoice_ibfk_4` FOREIGN KEY (`finv_basic_fcrn_id`) REFERENCES `fcrn_currency` (`fcrn_id`),
  CONSTRAINT `finv_invoice_ibfk_5` FOREIGN KEY (`finv_stst_id`) REFERENCES `stst_state` (`stst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32425 DEFAULT CHARSET=utf8;

/*Data for the table `finv_invoice` */

/*Table structure for table `fprc_product_category` */

DROP TABLE IF EXISTS `fprc_product_category`;

CREATE TABLE `fprc_product_category` (
  `fprc_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fprc_code` char(10) NOT NULL,
  `fprc_name` varchar(100) NOT NULL,
  PRIMARY KEY (`fprc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fprc_product_category` */

insert  into `fprc_product_category`(`fprc_id`,`fprc_code`,`fprc_name`) values (1,'DYZ002','Dyzelinas/Diesel');

/*Table structure for table `fqnt_quantity` */

DROP TABLE IF EXISTS `fqnt_quantity`;

CREATE TABLE `fqnt_quantity` (
  `fqnt_id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fqnt_code` varchar(10) DEFAULT NULL,
  `fqnt_name` varchar(50) NOT NULL,
  PRIMARY KEY (`fqnt_id`),
  UNIQUE KEY `cqnt_name` (`fqnt_name`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

/*Data for the table `fqnt_quantity` */

insert  into `fqnt_quantity`(`fqnt_id`,`fqnt_code`,`fqnt_name`) values (1,'l','liter');

/*Table structure for table `fvat_vat` */

DROP TABLE IF EXISTS `fvat_vat`;

CREATE TABLE `fvat_vat` (
  `fvat_id` tinyint(11) unsigned NOT NULL AUTO_INCREMENT,
  `fvat_rate` double unsigned DEFAULT NULL,
  `fvat_label` char(10) DEFAULT NULL,
  `fvat_order` tinyint(11) unsigned NOT NULL DEFAULT '0',
  `fvat_hide` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fvat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `fvat_vat` */

insert  into `fvat_vat`(`fvat_id`,`fvat_rate`,`fvat_label`,`fvat_order`,`fvat_hide`) values (1,NULL,'-',1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
