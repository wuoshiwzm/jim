<?php

/**
 * 营销模型
 */
class Marketing
{
    /**
     * @param $data
     * @return bool
     * 验证满减满送
     */
    static function validatorFullCut( $data )
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
     * @return bool
     * 验证优惠卷
     */
    static function validatorCoupon( $data )
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
     * 添加满减满送
     */
    static function addFullCut( $data )
    {
        $arr['type'] = 'manjian';
        $arr['use_tiaojian'] = 'manjian';
        $arr['yunsuanfu'] = '>=';
        $arr['value'] = $data['conditions_use'];
        $data['conditions_use'] = json_encode( $arr );
        $data['conditions_type'] = 1;
        return Source_Salerule_FavoutableRule::create( $data );
    }

    /**
     * @param $data
     * @return mixed
     * 添加优惠券
     */
    static function addCoupon( $data )
    {
        switch ( $data['type'] )
        {
            case "subtotal":
            case "number":
            case "weight":
            case "payment":
                $arr['type'] = 'youhuiquan';
                $arr['use_tiaojian'] = $data['type'];
                $arr['yunsuanfu'] = $data['yunsuanfu'];
                $arr['value'] = $data['value'];
                $data['conditions_use'] = json_encode( $arr );
                $data['conditions_type'] = 2;
                $data = array_except( $data, ['type','yunsuanfu','value'] );
                return Source_Salerule_FavoutableRule::create( $data );
                break;
            case "goods":
                $result = DB::transaction(function() use ( $data ) {
                    $goodsId =  isset($data['entity_id'])?$data['entity_id']:false;
                    if( $goodsId == false ) return false;
                    $arr['type'] = 'youhuiquan';
                    $arr['use_tiaojian'] = $data['type'];
                    $arr['yunsuanfu'] = '=';
                    $arr['value'] = 'goods';
                    $data['conditions_type'] = 2;
                    $data['conditions_use'] = json_encode($arr);
                    $data = array_except($data, ['entity_id', '_token', 'type']);
                    $ruleID = Source_Salerule_FavoutableRule::insertGetId($data);
                    foreach ( $goodsId as $row )
                    {
                        if ($row)
                        {
                            $res = Source_Salerule_FavoutableProduct::where(['rule_id' => $ruleID, 'product_id' => $row])->count();
                            if ($res == false)
                            {
                                $goods['rule_id'] = $ruleID;
                                $goods['product_id'] = $row;
                                $goods['created_at'] = date('Y-m-d H:i:s');
                                Source_Salerule_FavoutableProduct::insert($goods);
                            }
                        }
                    }
                });
                if( is_null( $result ) ) return true;
                else return false;
                break;
            case "classification":
                $result = DB::transaction(function() use ( $data ) {
                    $CategoryId = isset($data['category_id'])?$data['category_id']:false;
                    if( $CategoryId == false ) return false;
                    $arr['type'] = 'youhuiquan';
                    $arr['use_tiaojian'] = $data['type'];
                    $arr['yunsuanfu'] = '=';
                    $arr['value'] = 'category';
                    $data['conditions_type'] = 2;
                    $data['conditions_use'] = json_encode( $arr );
                    $data = array_except( $data, ['category_id','_token','type'] );
                    $ruleID = Source_Salerule_FavoutableRule::insertGetId( $data );
                    foreach ( $CategoryId  as $row )
                    {
                        if( $row )
                        {
                            $Category['rule_id'] = $ruleID;
                            $Category['category_id'] = $row;
                            $Category['created_at'] = date('Y-m-d H:i:s');
                            Source_Salerule_FavoutableCategory::insert($Category);
                        }
                    }
                });
                if( is_null( $result ) ) return true;
                else return false;
                break;
        }

    }


    /**
     * @param $data
     * @param $id
     * @return mixed
     * 修改优惠券
     */
    static function editCoupon( $data ,$id )
    {
        switch ( $data['type'] )
        {
            case "subtotal":
            case "number":
            case "weight":
            case "payment":
                $arr['type'] = 'youhuiquan';
                $arr['use_tiaojian'] = $data['type'];
                $arr['yunsuanfu'] = $data['yunsuanfu'];
                $arr['value'] = $data['value'];
                $data['conditions_use'] = json_encode( $arr );
                $data['conditions_type'] = 2;
                $data = array_except( $data, ['type','yunsuanfu','value','_token','_method'] );
                return Source_Salerule_FavoutableRule::where('id',$id)->update( $data );
                break;
            case "goods":
                $result = DB::transaction(function() use ( $data,$id ) {
                    $goodsId = isset($data['entity_id'])?$data['entity_id']:false;
                    $oldGoodsId = isset($data['oldId'])?$data['oldId']:false;;
                    $arr['type'] = 'youhuiquan';
                    $arr['use_tiaojian'] = $data['type'];
                    $arr['yunsuanfu'] = '=';
                    $arr['value'] = 'goods';
                    $data['conditions_type'] = 2;
                    $data['conditions_use'] = json_encode( $arr );
                    $data = array_except( $data, ['category_id','_token','type','_method','oldId'] );
                    Source_Salerule_FavoutableRule::where('id',$id)->update( $data );
                    //新增
                    if( $goodsId )
                    {
                        foreach ( $goodsId  as $row )
                        {
                            if( $row )
                            {
                                $res = Source_Salerule_FavoutableProduct::where(['rule_id'=>$id,'product_id'=>$row] )->count();
                                if( $res == false )
                                {
                                    $goods['rule_id'] = $id;
                                    $goods['product_id'] = $row;
                                    $goods['created_at'] = date('Y-m-d H:i:s');
                                    Source_Salerule_FavoutableProduct::insert($goods);
                                }
                            }
                        }
                    }
                    //删除
                    if( $oldGoodsId )
                    {
                        Source_Salerule_FavoutableProduct::where('rule_id',$id)->whereIn('product_id',$oldGoodsId)->delete();
                    }
                });
                if( is_null( $result ) ) return true;
                else return false;
                break;
            case "classification":
                $result = DB::transaction(function() use ( $data,$id ) {
                    $CategoryId = isset($data['category_id'])?$data['category_id']:false;
                    $oldCategoryId = isset($data['oldId'])?$data['oldId']:false;;
                    $arr['type'] = 'youhuiquan';
                    $arr['use_tiaojian'] = $data['type'];
                    $arr['yunsuanfu'] = '=';
                    $arr['value'] = 'category';
                    $data['conditions_type'] = 2;
                    $data['conditions_use'] = json_encode( $arr );
                    $data = array_except( $data, ['category_id','_token','type','_method','oldId'] );
                    Source_Salerule_FavoutableRule::where('id',$id)->update( $data );
                    //新增
                    if( $CategoryId )
                    {
                        foreach ( $CategoryId  as $row )
                        {
                            if( $row )
                            {
                                $Category['rule_id'] = $id;
                                $Category['category_id'] = $row;
                                $Category['created_at'] = date('Y-m-d H:i:s');
                                Source_Salerule_FavoutableCategory::insert($Category);
                            }
                        }
                    }
                    //删除
                    if( $oldCategoryId )
                    {
                        Source_Salerule_FavoutableCategory::where('rule_id',$id)->whereIn('category_id',$oldCategoryId)->delete();
                    }
                });
                if( is_null( $result ) ) return true;
                else return false;
                break;
        }
    }
}