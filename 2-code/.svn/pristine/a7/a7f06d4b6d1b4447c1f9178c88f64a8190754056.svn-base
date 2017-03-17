<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/3
 * Time: 17:41
 * 广告控制器
 */

class AdsController extends CommonController
{

    public function __construct()
    {

        parent::__construct();
    }

    /**
     * 广告分类
     */
    public function  getType(){
        $sql  =Source_Ads_AdsType::orderBy('created_at','asc');
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $input =Input::get();
        if(isset($input['beg_time'])&&$input['end_time']&&$input['beg_time']!=''&&$input['end_time']!=''){
            $sql->where('created_at' ,'>' ,$input['beg_time'])->where('created_at' ,'<' ,$input['end_time']) ;
        }
        $list = $sql->paginate($setPage);
        $set['setpage'] = $setPage;
        $set['beg_time'] = isset($input['beg_time'])?$input['beg_time']:'';
        $set['end_time'] = isset($input['end_time'])?$input['end_time']:'';
        $this->view("admin.ads.typelist",compact('list','set'));
    }

    public function  getAddtype(){

        $res = Source_Ads_AdsType::find(Input::get('id'));
        $this->view('admin.ads.ads.addtype',compact('res'));
    }

    /**
     * 广告管理
     */
    public function  getAds(){
        $sql  =Source_Ads_Ads::orderBy('created_at','asc');

        $input =Input::get();
        if(isset($input['type'])&&$input['type']!=''){
            $sql->where('type' ,$input['type']) ;
        }
        if(isset($input['position'])&&$input['position']!=''){
            $sql->where('pid' ,$input['position']) ;
        }
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $set['setpage'] = $setPage;
        $set['type'] = isset($input['type'])?$input['type']:'';
        $set['position'] = isset($input['position'])?$input['position']:'';
        $list = $sql->paginate($setPage);
         $typelist =  Source_Ads_AdsType::all();

        $this->view("admin.ads.list",compact('list','set','typelist'));
    }

    /**
     * 新增页面
     */
    public  function  getAddads(){
        $typelist =  Source_Ads_AdsType::all();
        $res = Source_Ads_Ads::find(decode(Input::get('id')));
        
        $this->view('admin.ads.ads.add',compact('typelist','res'));
    }

    /**
     * @return mixed
     * 保存广告
     */
    public function  postSaveads(){

        $input= Input::get();
        if($input['_token']=csrf_token()){
            if(!isset($input['id'])|| $input['id']== ''){
                $res =  Ads::SaveAds($input);
                if($res){
                    return Redirect::to('/admin/ads/ads')->with('msg','编辑成功');
                }
            }
            if(isset($input['id'])|| $input['id']!=''){
                $res =  Ads::EditAds($input);
                if($res){
                    return Redirect::to('/admin/ads/ads')->with('msg','编辑成功');
                }
            }
        }
        if($res){
            return Redirect::to('/admin/ads/ads')->with('msg','保存成功');
        }else{
            return Redirect::to('/admin/ads/ads')->with('msg','错误');
        }
    }

    /**
     * @return mixed
     * 保存广告位置
     */
    public function  postSaveadstype(){
        $input =Input::get();
        if($input['_token']=csrf_token()){
            if(!isset($input['id'])|| $input['id']== ''){
                $res =  Ads::SaveAdsType($input);
                if($res){
                    return Redirect::to('/admin/ads/type')->with('msg','编辑成功');
                }
            }
            if(isset($input['id'])|| $input['id']!=''){
                $res =  Ads::EditAdsType($input);
                if($res){
                    return Redirect::to('/admin/ads/type')->with('msg','编辑成功');
                }
            }
        }
        return Redirect::to('/admin/ads/type')->with('msg','保存失败');
    }



}