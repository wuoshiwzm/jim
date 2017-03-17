

CREATE TABLE `shop_quote_info` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `quote_sn` VARCHAR(50) NOT NULL COMMENT '订单编号',
  `user_id` INT(11) NOT NULL COMMENT '会员id',
  `user_group` INT(11) NOT NULL COMMENT '会员所在群组id',
  `username` INT(11) NOT NULL COMMENT '会员名称',
  `shop_id` INT(11) NOT NULL COMMENT '店铺id',
  `source` TINYINT(1) DEFAULT NULL COMMENT '订单来源 1pc 2wap',
  `status` TINYINT(1) DEFAULT NULL COMMENT '状态 1显示 0 禁止',
  `itemnum` INT(2) DEFAULT NULL COMMENT '商品数量',
  `itemweight` INT(2) DEFAULT NULL COMMENT '商品重量',
  `checkout_method` VARCHAR(50)  COMMENT '支付方式',
  `grand_total` DECIMAL(8,2) DEFAULT NULL COMMENT '商品总价',
  `discount` DECIMAL(8,2) DEFAULT NULL COMMENT '优惠价格',
  `remote_ip` VARCHAR(60)  COMMENT '下单ip地址',
   `created_at` TIMESTAMP COMMENT '下单时间',
   `updated_at` TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT ='购物车';

/*Table structure for table `shop_order_item` */

CREATE TABLE `shop_quote_item` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `quote_id` INT(11) NOT NULL COMMENT '订单id',
  `product_id` INT(11) DEFAULT NULL COMMENT '商品id',
  `categry_id` INT(11) DEFAULT NULL COMMENT '商品分类ID',
  `product_name` VARCHAR(30) DEFAULT NULL COMMENT '商品名称',
  `product_status` INT(1) DEFAULT NULL COMMENT '商品状态 1 正常 2 下架 3 删除',
  `sku` VARCHAR(20) DEFAULT NULL COMMENT '商品编码',
  `price` DECIMAL(8,2) DEFAULT NULL COMMENT '价格',
  `weight` INT(10) DEFAULT NULL COMMENT '重量',
  `num` INT(2) DEFAULT NULL COMMENT '商品数量',
  `guige` VARCHAR(255) DEFAULT NULL COMMENT '属性的json',
  `free_shipping` INT(1) DEFAULT NULL COMMENT '是否免运费',
  `row_total` DECIMAL(8,2) DEFAULT NULL COMMENT '商品价格 数量x单价',
  `row_wegith` INT(12) DEFAULT NULL COMMENT '商品重量 数量x重量',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT = '购物车item表';

-- 增加

ALTER TABLE `shop_order_info` ADD COLUMN  pay_amount  DECIMAL(8,2) NOT NULL  COMMENT '支付金额'  AFTER  total_amount;
ALTER TABLE `shop_order_info` ADD COLUMN  shipping_amount  DECIMAL(8,2) NOT NULL  COMMENT '总的运费 item运费和'  AFTER  cost_freight;
ALTER TABLE `shop_order_info`  CHANGE   form  source  TINYINT(1)   COMMENT '订单来源 1pc 2wap' ; 
ALTER TABLE `shop_order_item` CHANGE   wegith  weight  INT(10) COMMENT '重量';
ALTER TABLE `shop_order_item` ADD COLUMN  row_total  DECIMAL(8,2) NOT NULL  COMMENT '商品总价 价格x数量'   AFTER  weight;
ALTER TABLE `shop_order_item` ADD COLUMN  row_weigth  INT(10) NOT NULL  COMMENT '商品重量 单重量x数量'   AFTER  row_total;
ALTER TABLE `shop_order_favoutable` ADD COLUMN  item_id  INT(11) NOT NULL  COMMENT '订单itemId'   AFTER  order_id;


