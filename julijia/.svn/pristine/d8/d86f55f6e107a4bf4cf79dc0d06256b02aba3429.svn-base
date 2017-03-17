<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/13
 * Time: 19:03
 */

class PageController extends CommonController{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function  PageList(){
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
         $url = Input::get('url');

        $sql = Source_Cms_Page::orderBy('created_at','desc');
        if(isset($url)&&!empty($url)){
            $sql->whereRaw('identifier like "%'.$url.'%"');
        }
        $list  =$sql->paginate($setPage);
        $set['setpage']=$setPage;
        $set['url']=isset($url)&&!empty($url) ?$url: '';
        return  $this->view('admin.cms.pagelist',compact('list','set'));
    }

    /**
     * @return bool|void
     * 新增或者修改页面
     */
    public function AddPage()
    {
        if(empty(Input::get('id'))){
            return  $this->view('admin.cms.page.add');
        }
        $id =   decode(Input::get('id'));
        $info  =  Source_Cms_Page::find($id);
        if(isset($info->id)){
            return  $this->view('admin.cms.page.add',compact('info'));
        }else{
            return false;
        }
    }

    /**
     * @return mixed
     * 保存数据
     */
    public function  PageSave(){
        $input =  Input::get();
        if($input['_token'] !=csrf_token()){
            return Redirect::back()->with('msg','表单验证不通过');
        }
        if(empty(Input::get('id'))){
            //新增
            $input['created_at'] = TimeTools::getFullTime();
            $input['updated_at'] = TimeTools::getFullTime();
            $input['shop_id'] = 1;
            $input = array_except($input,['_token']);
             $res =  Source_Cms_Page::insert($input);
            if($res){
                return Redirect::back()->with('msg','新增页面成功');
            }
          }else{
            //编辑
            $input = array_except($input,['_token','id']);
           $res =   Source_Cms_Page::where('id',decode(Input::get('id')))->update($input);
            if($res){
                return Redirect::to('/admin/cms/page')->with('msg','修改页面成功');
            }
         }
    }

    public function  DelPage(){
       $id =   Input::get('id');
        if(empty($id)||$id ==''){
            return Redirect::to('/admin/cms/page')->with('msg','参数为空');
        }
        $res =  Source_Cms_Page::find(decode($id))->delete();
        if($res){
            return Redirect::to('/admin/cms/page')->with('msg','删除成功');
        }
    }




}