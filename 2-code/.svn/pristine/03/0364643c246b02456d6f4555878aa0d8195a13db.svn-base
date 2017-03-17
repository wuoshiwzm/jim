/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 10.1.13-MariaDB : Database - lijia_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lijia_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lijia_shop`;

/*创建 `shop_order_refundreason_type` */

CREATE TABLE `shop_order_refundreason_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) DEFAULT '1' COMMENT '退款分类 1 退款 2 退货',
  `value` varchar(100) DEFAULT NULL COMMENT '原因分类值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (1,1,'承诺没做到');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (2,1,'未按照约定时间发货');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (3,1,'未按成交价格交易');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (4,1,'未按成交价格交易');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (5,1,'拒绝提供售后服务');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (6,1,'空包裹');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (7,2,'退运费');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (8,2,'商品质量');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (9,2,'做工瑕疵');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (10,2,'商品无法使用');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (11,2,'尺寸大小不符');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (12,2,'颜色/图案/款式不符');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (13,2,'颜式不符');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (14,2,'与描述差异太大');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (15,2,'少发，漏件');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (16,2,'颜款式不符');
insert  into `shop_order_refundreason_type`(`id`,`type`,`value`) values (17,2,'假冒商品');
--更新退款表
ALTER  TABLE  `shop_order_back`   MODIFY   COLUMN refund_reason int(3) NOT NULL  COMMENT  '退款原因' ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
