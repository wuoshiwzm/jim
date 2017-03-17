<?php

// use 	Illuminate\

class CartController extends CommonController
{

    /**
     * 显示购物车
     */
    public function index($id)
    {

        $cart = Cart::getContent();
        return $this->view('user.cart', compact('cart'));

    }

    /**
     * @param $rowid 删除物品
     */
    public function deleteItem($rowid)
    {
        Cart::remove($rowid);
    }


    /**
     * @param $id 商品ID
     * 添加物品
     */
    public function addItem($id)
    {
        $id = decode(trim($id));


    }

    /**
     * 更新购物车
     */
    public function update()
    {

    }


}
