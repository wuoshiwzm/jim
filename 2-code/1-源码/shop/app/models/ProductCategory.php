<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25 0025
 * Time: 12:28
 *  产品分类业务类
 */
class ProductCategory
{
    /**
     * @param $data
     * @return bool
     * 验证产品分类
     */
    static function validatorCategory( $data )
    {
        $rules =  [];
        $message = [];
        $validator = Validator::make( $data, $rules, $message );
        if( $validator->passes() )
        {
            return true;

        }else
        {
            return $validator;
        }
    }

    /**
     * @param $data
     * @return mixed
     * 添加分类
     */
    static function addCategory( $data )
    {
        $path = $data['icon'];
        $res = Source_Product_ProductCategory::create( $data );
        if( $res && $path )
        {
            //上传图片
            (new Upload())->uploadProductImage( $res->id, $path, 'category' );
        }
        return $res;
    }

    /**
     *  获取分类层级
     */
    static function getCategoryRelation()
    {
        $data = Source_Product_ProductCategory::whereRaw('status = 1 and leavel != 3')->select('parent_id','name','id','leavel')->get();
        return ProductCategory::getTwoTree( $data,'parent_id','id',0,'prefix');
    }


    /**
     * @param $data
     * @return array
     * 获取分类
     */
    static function getTree( $data, $pid)
    {
        $arr = array();
        foreach ( $data as $k=>$row )
        {
            if( $row->parent_id == $pid )
            {
                $arr[] = $row;
                $arr = array_merge($arr,self::getTree($data, $row->id ));
            }
        }
        return $arr;
    }

    /**
     * @param $data
     * @param $file_pid
     * @param $file_id
     * @param $pid
     * @param $filename
     * @return array
     * 排除3级目录
     */
    static function getTwoTree( $data,$file_pid,$file_id,$pid,$filename )
    {
        $arr = array();
        foreach ( $data as $K=>$v )
        {
            if( $v->$file_pid == $pid )
            {
                $data[$K][$filename] = '◢&nbsp;';
                $arr[] = $data[$K];
                foreach ( $data as $i=>$j )
                {
                    if( $j->$file_pid == $v->$file_id )
                    {
                        $data[$i][$filename] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;◢&nbsp;';
                        $arr[] = $data[$i];
                    }
                }
            }
        }
        return $arr;
    }


    /**
     * @return bool
     * 设置筛选数据
     */
    static function setScreen()
    {
        $result = DB::transaction(function()
        {
            $Category = Source_Product_ProductCategory::where('leavel',3)->orderBy('sort','desc')->lists('id');
            //截断品牌表
            Source_Screen_CategoryBrand::truncate();
            //截断数据检索表
            Source_Screen_CategoryOption::truncate();
            Source_Screen_CategoryOptionDetail::truncate();
            foreach ( $Category as $rows )
            {
                //添加品牌检索表
                $brandArray = Source_Product_ProductFlat::where('category_id',$rows)->groupBy('brand')->select('category_id','brand')->get();
                foreach ( $brandArray as $b )
                {
                    $bArray['category_id'] = $b->category_id;
                    $bArray['brand_id'] = $b->brand;
                }
                if( isset( $bArray ) )
                {
                    Source_Screen_CategoryBrand::insert( $bArray );
                }

                //检索表  根据分类id查询产品属性集ID
                $setID = Source_Product_ProductFlat::where('status',1)->where('category_id',$rows)->groupBy('attribute_set_id')->lists('attribute_set_id');
                if( $setID == false )
                {
                    continue;
                }
                //查询属性集表得到属性ID
                $attributeID = Source_Product_ProductEav::where('attbute_set_id',$setID)->groupBy('attbute_id')->lists('attbute_id');
                if( $attributeID == false )
                {
                    continue;
                }
                //查询属性表获取设置了检索字段的属性
                $attributeName = Source_Eav_Attrbute::where('is_layer_search',1)->whereIn('id',$attributeID)->select('name','id','is_system')->get();
                if( $attributeName == false )
                {
                    continue;
                }
                foreach ( $attributeName as $row )
                {
                    //添加检索分类表
                    $OptionID = Source_Screen_CategoryOption::insertGetId(['attbute_id'=>$row->id,'category_id'=>$rows]);
                    if( $row->is_system == 1 )
                    {
                        //筛选数据
                        $name = $row->name;
                        $attribute = Source_Product_ProductFlat::where('status',1)->select($name)->groupBy( $name )->get();
                        foreach ( $attribute as $att )
                        {
                            $opArray['option_id'] = $OptionID;
                            $opArray['value'] = $att->$name;
                            $opArray['tilte'] = $name;
                        }
                    }
                    //自定义属性
                    if( $row->is_system == 0 )
                    {
                        //筛选数据
                        $name = $row->name;
                        $attribute = Source_Product_ProductFlatDetail::select($name)->groupBy( $name )->get();
                        foreach ( $attribute as $att )
                        {
                            $opArray['option_id'] = $OptionID;
                            $opArray['value'] = $att->$name;
                            $opArray['tilte'] = $name;
                        }
                    }
                    if( isset($opArray ) )
                    {
                        Source_Screen_CategoryOptionDetail::insert( $opArray );
                    }
                }
            }
        });
        if( is_null($result) )
            return true;
        else return false;
    }

}