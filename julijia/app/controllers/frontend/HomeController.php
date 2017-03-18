<?php

/**
 *  首页控制器
 */
class HomeController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  首页
     */
    public function GetIndex()
    {
        //banner广告
        $banner = Home::getIndexBanner( 'banner', self::$cache, self::$time );
        //限时抢购
        $flashSale = Home::getFlashSale();
        //推荐
        $recommend = Home::getRecommendGoods( self::$cache );
        //层集数据
        $floor = Home::getFloorGoods( self::$cache );
        //友情链接
        $link = FriendshipLink::getLink( 0,self::$cache  );
        //seo
        $seo = Home::getIndexSeo( self::$cache );
        return $this->view('frontend.index.index',compact( 'banner','flashSale','recommend','floor','link','seo' ));
    }


    /**
     * 判断是列表页还是详情页
     */
    public function ListOrDetails( $name  )
    {
        $name = trim( $name );
        if( is_numeric( $name ) )
        {
            //详情
            return $this->GetDetails( $name );

        }else
        {
            //列表
            return $this->GetList( $name );
        }

    }

    /**
     * @param $name
     * 列表页
     */
    public function GetList( $name )
    {
        //分类信息
        $categoryInfo = Home::getCategoryNameByID( $name, self::$cache );
        //分类信息id
        $categoryId = $categoryInfo['id'];
        //分类信息名称
        $categoryName = $categoryInfo['name'];
        //分类信息等级
        $categoryLeavel = $categoryInfo['leavel'];
        //检索品牌
        $brand = Home::getScreenBrand( self::$cache, $categoryId );
        //检索列表
        $screen = Home::getScreenList( self::$cache, $categoryId );
        //获取参数
        $parameter = $_SERVER["QUERY_STRING"];
        $selected = Home::getSelected( $parameter, self::$cache );
        //列表数据
        $data = Home::getGoodsList( self::$cache, $categoryId, $parameter );
        //SEO
        $seo = $categoryInfo['seo'];
        //友情链接
        $link = FriendshipLink::getLink( $categoryInfo['categoryID'], self::$cache );
        //推荐产品
        $recommend = Home::getHotRecommend( self::$cache );
        return $this->view('frontend.list.index',compact( 'data','categoryName','brand','name','categoryLeavel','screen','selected','seo','link','recommend'));
    }

    /**
     * @param $id
     * 详情页
     */
    public function GetDetails( $id )
    {
        //分页类型和数据
        $type = Input::get('type');
        if( $type )
        {
            //提供评论查询
            $id = decode( $id );
            $data = Home::getGoodsComment( self::$cache, $id, $type );
            return View::make('frontend.details.commentlist',array('commentData'=>$data,'page'=>$data->getTotal()));

        }else
        {
            //详细信息
            $goods = Home::getGoodsDetails( self::$cache, $id );
            $data = $goods['data'];
            $price = json_encode($goods['price']);
            //可配置信息
            $attribute = $goods['attribute'];
         
            //图片信息
            $carousel = Home::getGoodsImg( self::$cache, $id );
            //配置信息
            $configInfo = Home::getGoodsConfigInfo( self::$cache, $id, $data );
            //评论数据
            //全部评论
            $comment['all'] = Home::getGoodsComment( self::$cache, $id, 1 );
            //好评
            $comment['good'] = Home::getGoodsComment( self::$cache, $id, 2 );
            //中评
            $comment['in'] = Home::getGoodsComment( self::$cache, $id, 3 );
            //差评
            $comment['difference'] = Home::getGoodsComment( self::$cache, $id, 4 );
            //SEO
            $seo = $goods['seo'];
            //推荐产品
            $recommend = Home::getHotRecommend( self::$cache );
            //写日志记录
            Event::fire('product.log',array($id));
            return $this->view('frontend.details.index',compact( 'data','carousel','configInfo','attribute','comment','price','seo','recommend'));
        }

    }


    /**
     * 搜索列表
     */
    public function searchList()
    {
        $keyword = Input::get('keyword');
        if( $keyword == false )
        {
            return  Redirect::to('/');
        }
        $Input = Input::all();
        $data = Home::getSearchList( $Input, self::$cache );
        $obj = new stdClass();
        $obj->title = $keyword.'- 商品搜索 - 居利家';
        $obj->keywords = $keyword;
        $obj->description = '在居利家中找到了'.$data->count().'件'.$keyword.'的类似商品，其中包含了';
        $seo = $obj;
        //排序字段
        $arr['data'] = [];
        $arr['url'] = 'tuijian=&created_at=&sort_price=';
        $screen = $arr;
        //获取参数
        $parameter = $_SERVER["QUERY_STRING"];
        $selected = Home::getSelected( $parameter, self::$cache );
        //推荐产品
        $recommend = Home::getHotRecommend( self::$cache );
        return $this->view('frontend.list.search',compact( 'data','keyword','seo','screen','selected','recommend' ));
    }
}