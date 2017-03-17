<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/4
 * Time: 16:09
 */

class  Ads{


    /**
     * @param $input
     * @return mixed
     * 保存
     */
    static function  SaveAds($input){

           $input['created_at']=TimeTools::getFullTime();
           $data =  array_except($input,['_token','id']);
            $res =   Source_Ads_Ads::create($data);
            if( $input['img']){
                (new Upload())->uploadProductImage($data['pid'],$input['img'],'ads' );
            }
        return $res;
    }

    /**
     * @param $input
     * @return mixed
     * 编辑
     */
    static function  EditAds($input){
        $input['created_at']=TimeTools::getFullTime();
        $data =  array_except($input,['_token','id','created_at']);
        $res=  Source_Ads_Ads::where('id',$input['id'])->update($data);
        if( $input['img']){
            (new Upload())->uploadProductImage($data['pid'],$input['img'],'ads' );
        }
        return $res;
    }

    /**
     * @return mixed
     * 保存广告位置（新增）
     */
    static function  SaveAdsType($input){

        $input['created_at']=TimeTools::getFullTime();
        $input['user']=1;
        $data =  array_except($input,['_token','id']);
        $res =   Source_Ads_AdsType::create($data);
        return $res;
    }

    /**
     * @return mixed
     * 保存编辑广告位置
     */
    static function  EditAdsType($input){
        $input['created_at']=TimeTools::getFullTime();
        $input['user']=1;
        $data =  array_except($input,['_token','id']);
        $res =   Source_Ads_AdsType::where('id',decode($input['id']))->update($data);
        return $res;
    }
}