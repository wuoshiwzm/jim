<?php

/**
 * Class HomeController
 * 首页控制器
 */
class IndexController extends BaseController {

	//protected $layout = 'layouts.frontend';
	protected $cityid;
	protected $cityname;

	public function __construct()
	{
		parent::__construct();
	}

	//属性集列表
    public function  AttributeSetList()
	{
		$list = Source_Eav_AttrbuteSet::get();
		return View::make('admin.test.index',array('list'=>$list));
		
	}
	//新增页面
	public function  AttributeSetAdd(){
		return View::make('admin.test.attrbustset.add');
	}
	//保存
	public  function  AttributeSetSave(){
         $model =  new Eav();
		 $postdata  =  Input::get();
		 $info =  $model->AttbuteSetSave($postdata);
			 return Redirect::to('test/');
	}


	//属性列表
	public function  AttributeList()
	{
		$list = Source_Eav_Attrbute::get();
		return View::make('admin.test.attbute.list',array('list'=>$list));

	}

	public function  AttributeAdd(){
		return View::make('admin.test.attbute.add');
	}

	public function  AttributeEdit(){
	   return View::make('admin.test.attbute.add');
	}
	
	 

}
