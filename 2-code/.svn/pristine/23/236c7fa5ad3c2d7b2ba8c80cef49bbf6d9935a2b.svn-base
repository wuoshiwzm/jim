<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/8
 * Time: 16:53
 */
class Cart
{

    private static $quoteId;

    //先判断有没有购物车，如果没有新建一个
    static function getCart()
    {
        $userInfo = Session::get('member');
        $cart = Source_Cart_CartInfo::where('user_id', $userInfo->id)->first();

        //购物车数据已经存在
        if ($cart) {
            self::$quoteId = $cart->user_id;
            return true;
        }
        //当前用户名下购物车还不存在，则新建一个购物车

        //毫秒数为订单号
        $quote['quote_sn'] = floor(microtime(true) * 1000);
        $quote['user_id'] = $userInfo->id;
        $quote['user_group'] = $userInfo->group_id;
        $quote['username'] = $userInfo->name;
        //订单来源 1pc 2wap
        $quote['source'] = 1;

        $res = Source_Cart_CartInfo::create($quote);
        return $res ? true : false;


    }

    /**
     * @param $entityId 商品ID
     * @param null $guige 商品规格信息 数组形式
     *
     * 添加物品到购物车
     */
    static function addItem($entityId, $quantity, $guigeArr = null)
    {


        //获得商品属性
        $productInfo = Product::getProductById($entityId);
        if (!$productInfo)
            return flase;

        //得到rowId
        $shop_id = $productInfo->shop;
        $rowId = self::getRowId($entityId, $shop_id, $guigeArr);

        //判断是否已经有同类商品
        //没有同样商品 - 生成新商品条目
        if (!self::checkRowId($rowId)) {
            //addRow($entityId, $quantity, $guigeArr = null, $rowId)
            $res = self::addRow($entityId, $quantity, $guigeArr, $rowId);
            return $res;
        } else {
            //有同样商品 - 更新商品数量
            $res = self::addQty($rowId, $quantity);
            return $res;
        }
    }


    /**
     * @param array $entityIds 数组形式传商品ID
     * 确认折扣信息
     */
    static function chkDiscount(array $entityIds)
    {
        //
    }

    /**
     * @param $entityId
     * @param $quantity
     * 更新商品数量 用于更新 不增或减
     */
    static function updateQty($rowId, $quantity)
    {
        $item = Source_Cart_CartItem::where('row_id', $rowId)->first();
        $item->num = $quantity;
        $item->row_totatl = $item->price * $quantity;
        $item->row_weight = $item->weight * $quantity;
        $res = $item->save();
        return $res ? true : false;
    }


    /**
     * @param $entityId
     * @param $quantity
     * 增加商品数量 用于增减商品数量 不能小于0
     */
    static function addQty($rowId, $quantity)
    {

        $item = Source_Cart_CartItem::where('row_id', $rowId)->first();
        $totalQuantity = $item->num + $quantity;

        //如果商品数量小于 1 则删除该行商品
        if ($totalQuantity < 1) {
            $res = self::remove($rowId);
            return $res;
        }
        $res = self::updateQty($rowId, $totalQuantity);
        return $res;
    }


    /**
     * @param $entityId 商品id
     * @param $quantity 商品数量
     * @param null $guigeArr 商品规格数组
     * @param null $rowId 要增加的行对应的rowId
     * 目前购物车没有要添加的商品， 新增一行
     */
    private static function addRow($entityId, $quantity, $guigeArr = null, $rowId)
    {
        //获得商品属性
        $productInfo = Product::getProductById($entityId);
        //获取订单Id
        $addInfo['quote_id'] = self::$quoteId;

        $addInfo['row_id'] = $rowId;
        $addInfo['product_id'] = $productInfo['id'];
        $addInfo['categry_id'] = $productInfo['categry_id'];
        $addInfo['product_name'] = $productInfo['name'];
        $addInfo['product_status'] = $productInfo['visibility'];
        $addInfo['shop_id'] = $productInfo['shop'];
        $addInfo['sku'] = $productInfo['sku'];
        $addInfo['price'] = $productInfo['price'];
        $addInfo['weight'] = $productInfo['weight'];
        $addInfo['num'] = $quantity;
        $addInfo['guige'] = json_encode($guigeArr);
        $productInfo['cost_price'] == 0 ? $addInfo['free_shipping'] = 1 : $addInfo['free_shipping'] = 0;

        $addInfo['row_total'] = $productInfo['price'] * $quantity;
        $addInfo['row_wegith'] = $productInfo['weight'] * $quantity;

        $res = Source_Cart_CartItem::create($addInfo);
        return $res;
    }


    /**
     * @param $rowId 要删除的行对应的rowId
     */
    static function remove($rowId)
    {
        $res = Source_Cart_CartItem::where('row_id', $rowId)->delete();
        return $res ? true : false;
    }

    static function getContent(){
        $res = Source_Cart_CartItem::where('quote_id',self::$quoteId);
        return $res?$res:false;
    }
    /**
     * @param $entityId
     * @param $shopId
     * @param $guige
     * 生成RowId 同一个商品id 同一个shop_id 同一个规格 被当作一种商品， 添加同一种商品时只更新数量
     */
    private static function getRowId($entityId, $shopId, $guige)
    {
        $guige = serialize($guige);
        $rowId = sha1($entityId . $shopId . $guige);
        return $rowId;
    }

    /**
     * @param $rowId 商品编码列
     * 当前是否购物车有该种商品
     * 返回true表示有该产品，返加false表示没有该产品
     */
    private static function checkRowId($rowId)
    {
        $res = Source_Cart_CartItem::where('row_id', $rowId)->count();
        return $res ? true : false;
    }


}
