<?php

class ShippingController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 产品首页
	 * @return Response
	 */
	public function getTemplete()
	{
		$setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
		$list = Source_Shipping_ShippingTemplete::orderBy('created_at','desc')->with('FreeShip','ModelShip')->paginate($setPage);;
		$set['setpage'] = $setPage;
		$this->view('admin.shipping.templete',compact('list','set'));

	}
	//编辑和新增页面
	public function  getAddtemplete(){
		$shiplist = Source_Shipping_Code::where('status','1')->get();
		$id = Input::get('id');
		if(isset($id)){
			$info = Source_Shipping_ShippingTemplete::find((decode($id)));
			if($info->is_freeshipping==0){
			  $deteil =$info->ModelShip()->get();
			}else{
			  $deteil =$info->FreeShip()->get();
			}
			$this->view('admin.shipping.add',compact('shiplist','info','deteil'));
		}
		else{
			$this->view('admin.shipping.add',compact('shiplist'));
		}

	}


 //区域选择
	public function  getShippingquyu(){
		$plist = Source_Area_Province::remember('provicelist','5000')->select('provinceID','province')->get();
        $code =  Input::get('code');
		if(isset($code)){
			return view::make('admin.shipping.templete.quyu',compact('plist','code'));
		}else{
			return view::make('admin.shipping.templete.freequyu',compact('plist','code'));
		}

	}

	/**
	 * @return bool
	 * 新增和编辑保存
	 */
	public function  postSavetemplet(){

		if(Input::get('_token')!=csrf_token()){
			return false;
		}
		$in = Input::get();
		if(isset($in['id'])&&decode($in['id'])){
			//编辑
			$res = DB::transaction(function() use ( $in){
				$res['name']  =$in['name'];
				$res['fahuoshijian']  =$in['fahuoshijian'];
				$res['is_freeshipping']  =$in['is_freeshipping'];
				$res['jifei_model']  =$in['jifei_model'];
				$res['updated_at']  =TimeTools::getFullTime();
				Source_Shipping_ShippingTemplete::where('id',decode($in['id']))->update($res);
				if($in['is_freeshipping']==0){
					Source_Shipping_ShippingModel::where('pid')->delete();
					if(is_array($in['tiaojian'])){
						foreach ($in['tiaojian'] as $m ){
							if($m['area']!=''){
								$mres['pid']=decode($in['id']);
								$mres['Region']=$m['area'];
								$mres['Ship_code_id']=$m['code'];
								$mres['FirstAmount']=$m['xufei'];
								$mres['FirstWeight']=$m['shouhzong'];
								$mres['SecondWeight']=$m['xuzhong'];
								$mres['SecondAmount']=$m['xuyuan'];
								if(isset($m['defalt'])){
									$mres['IsDefault']=$m['defalt'];
								}
								$mres['created_at']=TimeTools::getFullTime();
								$mres['updated_at']=TimeTools::getFullTime();
								Source_Shipping_ShippingModel::insert($mres);
							}
						}
					}
				}else{
					Source_Shipping_FreeShippingTiaoJian::where('shipping_id',decode($in['id']))->delete();
					$fres['shipping_id'] =decode($in['id']);
					$fres['shipping_code'] =$in['shipcode'];
					$fres['region'] =$in['freeshipp'];
					switch ($in['fangshi']){
						case 'price':
							$fres['price'] =$in['shuzhi'];
							break;
						case 'weight_no':
							$fres['weight_no'] =$in['shuzhi'];
							break;
						case 'bulk_no':
							$fres['bulk_no'] =$in['shuzhi'];
							break;
						case 'pie_no':
							$fres['pie_no'] =$in['shuzhi'];
							break;
					}
					$fres['created_at'] =TimeTools::getFullTime();
					$fres['updated_at'] =TimeTools::getFullTime();
					Source_Shipping_FreeShippingTiaoJian::insert($fres);
				}

			});
			if(is_null($res)){
				return Redirect::to('/admin/shipping/templete')->with('msg','编辑页面成功');
			}
		}
		//新增模板
		$res = DB::transaction(function() use ( $in){
		if($in['is_freeshipping']==0){
			//自定义运费
			//首先处理模板
                     $res['name']  =$in['name'];
                     $res['fahuoshijian']  =$in['fahuoshijian'];
                     $res['is_freeshipping']  =$in['is_freeshipping'];
                     $res['jifei_model']  =$in['jifei_model'];
                     $res['created_at']  =TimeTools::getFullTime();
                     $res['updated_at']  =TimeTools::getFullTime();
					 $pid  = Source_Shipping_ShippingTemplete::insertGetId($res);
			         Source_Shipping_ShippingModel::where('pid')->delete();
				     if(is_array($in['tiaojian'])){
						 foreach ($in['tiaojian'] as $m ){
							 if($m['area']!=''){
								 $mres['pid']=$pid;
								 $mres['Region']=$m['area'];
								 $mres['Ship_code_id']=$m['code'];
								 $mres['FirstAmount']=$m['xufei'];
								 $mres['FirstWeight']=$m['shouhzong'];
								 $mres['SecondWeight']=$m['xuzhong'];
								 $mres['SecondAmount']=$m['xuyuan'];
								 if(isset($m['defalt'])){
									 $mres['IsDefault']=$m['defalt'];
								 }
								 $mres['created_at']=TimeTools::getFullTime();
								 $mres['updated_at']=TimeTools::getFullTime();
                                 Source_Shipping_ShippingModel::insert($mres);
							 }
						 }
					 }
	  			}else if($in['is_freeshipping']==1){
							$res['name']  =$in['name'];
							$res['fahuoshijian']  =$in['fahuoshijian'];
							$res['is_freeshipping']  =$in['is_freeshipping'];
							$res['jifei_model']  =$in['jifei_model'];
							$res['created_at']  =TimeTools::getFullTime();
							$res['updated_at']  =TimeTools::getFullTime();
							$pid  = Source_Shipping_ShippingTemplete::insertGetId($res);
							$fres['shipping_id'] =$pid;
							$fres['shipping_code'] =$in['shipcode'];
							$fres['region'] =$in['freeshipp'];
							switch ($in['fangshi']){
								case 'price':
									$fres['price'] =$in['shuzhi'];
									break;
								case 'weight_no':
									$fres['weight_no'] =$in['shuzhi'];
									break;
								case 'bulk_no':
									$fres['bulk_no'] =$in['shuzhi'];
									break;
								case 'pie_no':
									$fres['pie_no'] =$in['shuzhi'];
									break;
								}
							$fres['created_at'] =TimeTools::getFullTime();
							$fres['updated_at'] =TimeTools::getFullTime();
							Source_Shipping_FreeShippingTiaoJian::insert($fres);
						}
					});
		      //结果返回
			  if(is_null($res)){
				  return Redirect::to('/admin/shipping/templete')->with('msg','新增页面成功');
			  }

	}

	/**
	 * @return mixed
	 * 删除
	 */
	public function  getDeltemplete()
	{
		$id = Input::get('id');
		if(isset($id)){
			$info  = Source_Shipping_ShippingTemplete::find(decode($id));
			if(isset($info)&& $info->is_freeshipping==0){
				$info->ModelShip()->delete();
			}
			if(isset($info)&& $info->is_freeshipping==1){
				$info->FreeShip()->delete();
			}
			if($info->delete()){
				return Redirect::to('/admin/shipping/templete')->with('msg','删除成功');
			}else{
				return Redirect::to('/admin/shipping/templete')->with('msg','删除失败');
			}
		}
		return Redirect::to('/admin/shipping/templete')->with('msg','没有数据');
	}


}
