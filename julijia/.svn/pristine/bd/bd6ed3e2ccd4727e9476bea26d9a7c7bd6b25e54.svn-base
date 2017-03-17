<?php

/**
 *  前端数据模型
 */
class Home
{



    /**
     * -----------------------------------------------+
     *
     *  首页页数据模型
     *
     * -----------------------------------------------+
     */

    /**
     *  广告位数据
     */
    static function getIndexBanner( $position, $cache, $time )
    {
        $data = Cache::tags('ads')->remember('adsbanner',$cache,function() use( $position, $cache, $time ){
            $pid = Source_Ads_AdsType::where( 'position', $position )
                ->whereRaw('status = 1 and start_time <= ? and end_time >= ?',array( $time, $time ))
                ->pluck('id');
            return Source_Ads_Ads::where( 'pid', $pid )->where( 'status', 1 )->orderBy('sort','desc')->get();
        });
        return $data;
    }

    /**
     * 查询广告
     * @param $position
     * @return mixed
     */
    static function getAds( $position )
    {
        $time = date('Y-m-d');
        $pid = Source_Ads_AdsType::where( 'position', $position )
            ->whereRaw('status = 1 and start_time <= ? and end_time >= ?',array( $time, $time ))
            ->pluck('id');
        return Source_Ads_Ads::where( 'pid', $pid )->where( 'status', 1 )->orderBy('sort','desc')->get();
    }
    /**
     *  首页限时抢购
     */
    static function getFlashSale()
    {
        $data = Cache::tags('goods')->remember('goodsFlashSale',1,function(){
            $time = date("Y-m-d H:i:s");
            return Source_Product_ProductFlat::where( 'status', 1 )
                    ->whereRaw('price_begin <= ? and price_end >= ?',array( $time, $time ))
                    ->take(5)
                    ->orderBy('created_at','desc')
                    ->get();
        });
        return $data;
    }


    /**
     * 查询分类
     */
    static function getCategory( $cache )
    {
        $data = Cache::tags('category')->remember('category',$cache,function(){
            //所有分类
            $one = Source_Product_ProductCategory::where( 'status', 1 )
                ->orderBy('leavel','asc')
                ->orderBy('sort','desc')
                ->select('id','parent_id', 'name','url','icon')
                ->get();
            //组合数据
            $arr = array();
            foreach ( $one as $keyOne=>$rowOne )
            {
                if( $rowOne->parent_id == 0 )
                {
                    $arr[$keyOne]['one'] = $rowOne;
                    foreach ( $one as $keyTwo=>$rowTwo )
                    {
                        if( $rowTwo->parent_id == $rowOne->id )
                        {
                            $arr[$keyOne]['two'][$keyTwo] = $rowTwo;
                            foreach ( $one as $keyThree=>$rowThree )
                            {
                                if( $rowTwo->id == $rowThree->parent_id )
                                {
                                    $arr[$keyOne]['three'][$keyThree] = $rowThree;
                                }
                            }
                        }
                    }
                }
            }
            return $arr;
        });
        return $data;
    }

    /**
     * 精品推荐
     */
    static function getRecommendGoods( $cache )
    {
        $data = Cache::tags('goods')->remember('goodsRecommendGoods', $cache, function(){
            return Source_Product_ProductFlat::where( 'status', 1 )
                ->where('tuijian', 1 )
                ->take(5)
                ->orderBy('created_at','desc')
                ->get();
        });
        return $data;
    }

    /**
     * @param $cache
     * 首页层级数据
     */
    static function getFloorGoods( $cache )
    {
        $data = Cache::tags('goods')->remember('goodsFloorGoods', $cache, function(){

            //查询分类
            $arr = array();
            $category = Source_Product_ProductCategory::where( 'status', 1 )
                    ->orderBy('leavel','asc')
                    ->orderBy('sort','desc')
                    ->select('id','parent_id', 'name')
                    ->get();
            foreach ( $category as $keyOne=>$rowOne )
            {
                if( $rowOne->parent_id == 0  )
                {
                    $arr[$keyOne]['pid'] = $rowOne->id;
                    $arr[$keyOne]['name'] = $rowOne->name;
                    foreach ( $category as $keyTwo=>$rowTwo )
                    {
                        if( $rowTwo->parent_id == $rowOne->id )
                        {
                            foreach ( $category as $keyThree=>$rowThree )
                            {
                                if( $rowTwo->id == $rowThree->parent_id )
                                {
                                    $arr[$keyOne]['id'][$keyThree] = $rowThree->id;
                                }
                            }
                        }
                    }
                }

                if( count($arr) >= 3 )
                {
                    break;
                }
            }

            //查询产品组合数据
            $array = array();
            foreach ( $arr as $key=>$row )
            {
                if( isset( $row['id'] ))
                {
                    $goods = Source_Product_ProductFlat::where( 'status', 1 )
                        ->whereIn('category_id', $row['id'] )
                        ->take(8)
                        ->orderBy('created_at','desc')
                        ->select('name','entity_id','price','small_image')
                        ->get();
                }else
                {
                    $goods = [];
                }

                $data[$key]['name'] = $row['name'];
                $data[$key]['goods'] = $goods;

            }
            //广告
            $array['goods'] = $data;
            $array['ads'] = Home::getAds('indexTypeBanner');
            return $array;
        });
        return $data;
    }



    /**
     * -----------------------------------------------+
     *
     *  列表页数据模型
     *
     * -----------------------------------------------+
     */


    /**
     * @param $name 分类名称url
     * @param $cache 缓存时间
     * @return mixed 返回分类名称和分类id
     */
    static function getCategoryNameByID( $name, $cache )
    {
        $name = trim( $name );
        $data = Cache::tags('category')->remember('categoryNameByID'.$name,$cache,function() use( $name ){
            $arr = array();
            $row = Source_Product_ProductCategory::where( 'status', 1 )
                ->where('url', $name )
                ->select('id','parent_id','leavel','name')
                ->first();
            //组合数据
            if( $row )
            {
                switch ( $row->leavel )
                {
                    case '1':
                        $pid = Source_Product_ProductCategory::where( 'status', 1 )->where('parent_id', $row->id )->lists('id');
                        $id = Source_Product_ProductCategory::where( 'status', 1 )->whereIn('parent_id', $pid )->lists('id');
                        $arr['name'] = $row->name;
                        $arr['id'] = $id;
                        $arr['leavel'] = 1;
                        break;
                    case '2':
                        $id = Source_Product_ProductCategory::where( 'status', 1 )->where('parent_id', $row->id )->lists('id');
                        $arr['name'] = $row->name;
                        $arr['id'] = $id;
                        $arr['leavel'] = 2;
                        break;
                    case '3':
                        $arr['name'] = $row->name;
                        $arr['id'] = [$row->id];
                        $arr['leavel'] = 3;
                        break;
                }
            }else
            {
                $arr['name'] = false;
                $arr['id'] = [];
                $arr['leavel'] = false;
            }
            return $arr;
        });
        return $data;
    }


    /**
     * @param $categoryId 分类ID
     * @param $parameter 查询参数
     */
    static function getGoodsList( $cache, $categoryId, $parameter )
    {
        $page  = Config::get('tools.homePage');
        $sql = Source_Product_ProductFlat::cacheTags('goodsList')->remember( $cache  )->where( 'status', 1 )
            ->join('product_flat_detail', 'product_flat.entity_id', '=', 'product_flat_detail.entity_id')
            ->whereIn('category_id', $categoryId )
            ->orderBy('created_at','desc');

            //->select('name','entity_id','price','cost_price','small_image');
        if( $parameter )
        {
            $arr = explode('&',$parameter);
            foreach ( $arr as $row )
            {
                if( $row )
                {
                    $nameOrValue = explode('=',$row);
                    //品牌
                    if( $nameOrValue[0] == 'b' )
                    {
                        $nameOrValue[0] = 'brand';
                    }
                    if( $nameOrValue[0] == 's' )
                    {
                        //排序
                        if( $nameOrValue[1] )
                        {
                            $sql->orderBy( 'price', $nameOrValue[1]);
                        }
                    }elseif( $nameOrValue[0] == 'price' )
                    {

                        $price = explode('-',$nameOrValue[1]);
                        if( count($price) == 1 )
                        {
                            if( (int)$price[0] )
                            {
                                $sql->where( 'price', '>', (int)$price[0] );
                            }
                        }elseif( count($price) == 2 )
                        {
                            $sql->whereRaw( 'price >= ? and price <= ?',array((int)$price[0],(int)$price[1]));
                        }

                    }
                    else
                    {
                        //正常查询
                        if ( Schema::hasColumn('product_flat', $nameOrValue[0]) )
                        {
                            if( $nameOrValue[1] )
                            {
                                $sql->where( $nameOrValue[0], $nameOrValue[1]);
                            }
                        }

                        if ( Schema::hasColumn('product_flat_detail', $nameOrValue[0]) )
                        {
                            if( $nameOrValue[1] )
                            {
                                $sql->where( 'product_flat_detail.'.$nameOrValue[0], $nameOrValue[1]);
                            }
                        }
                    }
                }
            }
        }
        $goods = $sql->paginate( $page );
        return $goods;
    }


    /**
     * @param $cache
     * @param $id
     * @return mixed
     * 检索品牌列表
     */
    static function getScreenBrand( $cache,$id )
    {
       return Source_Screen_CategoryBrand::cacheTags('goodsListScreenBrand')->remember( $cache  )->whereIn( 'category_id', $id )->with('screenCategoryToBrand')->groupBy('brand_id')->get();
    }


    /**
     * @param $cache
     * @param $id 分类id
     * @return mixed
     * 检索条件列表
     */
    static function getScreenList( $cache,$id )
    {
        $data = Cache::tags('screen')->remember('screen'.$id[0],$cache,function() use( $id ) {
            $arr = array();
            $data = Source_Screen_CategoryOption::whereIn('category_id', $id)->orderBy('id','desc')->get();
            $url = '';
            foreach ( $data as $key=>$row )
            {
                $obj = new stdClass();
                $obj->name = isset($row->screenCategoryToAttrbute->front_lable)?$row->screenCategoryToAttrbute->front_lable:'';
                $obj->value = Source_Screen_CategoryOptionDetail::where('option_id',$row->id)->get();
                $url.= isset($row->screenCategoryToAttrbute->name)?'&'.$row->screenCategoryToAttrbute->name.'='.'':'';
                $list[ $key ] = $obj;
            }
            //价格区间
            $maxPrice = (int)Source_Product_ProductFlat::where(['category_id'=>$id,'status'=>1])->max('price');
            $price = ceil($maxPrice/5);
            for ( $i=0; $i<6; $i++ )
            {
                if( $i == 0 )
                {
                    $obj = new stdClass();
                    $obj->tilte = 'price';
                    $obj->value = '0-'.$price;
                    $prices[] = $obj;

                }
                if( $i == 5 )
                {
                    $obj = new stdClass();
                    $obj->tilte = 'price';
                    $obj->value = $maxPrice.'以上';
                    $prices[] = $obj;
                }
                if( $i != 5 && $i != 0 )
                {
                    $obj = new stdClass();
                    $obj->tilte = 'price';
                    $obj->value = $price*$i.'-'.$price*($i+1);
                    $prices[] = $obj;
                }
            }
            $obj = new stdClass();
            $obj->name = '价格';
            $obj->value = $prices;
            $list[ isset($list)?count($list):0 ] = $obj;
            $url.= '&price=';
            $arr['data'] = $list;
            $arr['url'] = $url;
            return $arr;
        });
        return $data;
    }

    /**
     * @param $parameter
     * @param $cache
     * @return array
     * 已筛选的数据
     */
    static function getSelected( $parameter, $cache )
    {
        $arr = explode('&',$parameter);
        $str = array();
        $url = URL::current();
        foreach ( $arr as $row )
        {
            if ($row)
            {
                $nameOrValue = explode('=', $row);
                //排除分页
                if( $nameOrValue[0] != 'page' && $nameOrValue[0] != 's' )
                {
                    if( $nameOrValue[1] )
                    {
                        if( $nameOrValue[0] == 'b' )
                        {
                            $value = '品牌：'.Source_Product_ProductBrand::cacheTags('brand')->remember( $cache  )->where('id',$nameOrValue[1])->pluck('name');
                        }else
                        {
                            $value = Source_Eav_Attrbute::cacheTags('attrbute')->remember( $cache  )->where('name',$nameOrValue[0])->pluck('front_lable').'：'.$nameOrValue[1];
                        }
                        $obj = new stdClass();
                        $obj->title = $value;
                        $obj->url = $url.'?'.str_replace( $row, $nameOrValue[0].'=', $parameter );
                        $str[]= $obj;
                    }
                }
            }
        }

        return $str;
    }

    /**
     * ---------------------------------------------------------
     *
     *   详情页
     *
     * ---------------------------------------------------------
     *
     */

    /**
     * @param $cache
     * @param $id
     * @return mixed
     * 产品详情
     */
    static function getGoodsDetails( $cache, $id )
    {
        $data = Cache::tags('goods')->remember('goodsdetails'.$id, $cache, function() use( $id,$cache ) {
            $details['data'] = Source_Product_ProductFlat::where( 'status', 1 )->where('entity_id', $id )->with('productFlatToCategory')->with('productFlatToFlatDetail')->first();
            $attribute = isset($details['data']->productFlatToFlatDetail->attribute_json)?$details['data']->productFlatToFlatDetail->attribute_json:false;
            $details['attribute'] = array();
            $details['price'] = array();
            if( $attribute != false )
            {
                $arr = json_decode( $attribute );
                foreach ( $arr[0] as $key=>$row )
                {
                    $obj = new stdClass();
                    $obj->name = Source_Eav_Attrbute::cacheTags('attrbute')->remember( $cache  )->where( 'name', $key )->pluck('front_lable');
                    $obj->title = $key;
                    $obj->value = $row;
                    $details['attribute'][] = $obj;
                }
                foreach ( $arr[1] as $k=>$v )
                {
                    $i='';
                   foreach ( $v as $keys=>$value )
                    {
                        if( $keys == 'p' )
                        {
                            $price = $value;
                        }
                        if( $keys != 'p' )
                        {

                            $i.= $keys.$value;
                            $i = trim($i);
                        }
                    }
                    $details['price'][$i] = isset($price)?trim($price):[];
                }
            }
            return $details;
        });
        return $data;
    }


    /**
     * @param $cache
     * @param $id
     * @return mixed
     * 产品图片
     */
    static function getGoodsImg( $cache, $id )
    {
        $data = Cache::tags('goods')->remember('goodsImg'.$id, $cache, function() use( $id ) {
            $details = Source_Product_ProductImage::where('entity_id', $id )->orderBy('sort','desc')->get();
            return $details;
        });
        return $data;
    }

    /**
     * @param $cache
     * @param $id
     * @param $setId
     * 产品参数信息
     */
    static function getGoodsConfigInfo( $cache, $id, $data )
    {
        $data = Cache::tags('goods')->remember('goodsConfigInfo'.$id, $cache, function() use( $id, $data ) {
            $attbuteID = Source_Product_ProductEav::where('attbute_set_id', $data->attribute_set_id )->where('is_html_allowed_on_front',1)->lists('attbute_id');
            $keyAndName = Source_Eav_Attrbute::whereIn('id',$attbuteID)->select('name','front_lable')->get();
            $arr = array();
            foreach ( $keyAndName as $key=>$row )
            {
                $obj = new stdClass();
                $obj->name = $row->front_lable;
                $name = $row->name;
                if( isset($data->$name) )
                {
                    $obj->value = $data->$name;

                }elseif( isset($data->Source_Product_ProductFlatDetail->$name ))
                {
                    $obj->value = $data->Source_Product_ProductFlatDetail->$name;
                }else
                {
                    $obj->value = '暂无数据';
                }

                $arr[$key] = $obj;
            }
            return $arr;
        });
        return $data;
    }


    /**
     * @param $cache 缓存时间
     * @param $id 产品id
     * @param $type 评论类型
     * @return mixed
     * 评论数据
     */
    static function getGoodsComment( $cache, $id, $type )
    {
        $sql = Source_Order_OrderReview::cacheTags( 'comment' )->remember( $cache  )->where( 'status', 1 )
               ->where('entity_id', $id )
               ->orderBy('id','desc');
        $page = Config::get('tools.homePage');
        switch ( $type )
        {
            //全部
            case '1':
                $data = $sql->paginate( $page );
                break;
            //好评
            case '2':
                $data = $sql->where('leavel',1)->paginate( $page );
                break;
            //中评
            case '3':
                $data = $sql->whereNotIn('leavel',[1,5])->paginate( $page );
                break;
            //差评
            case '4':
                $data = $sql->where('leavel',5)->paginate( $page );
                break;
        }
        return $data;
    }
}