<?php

/**
 *  列表页控制器
 */
class ApiController extends \BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 列表页
     *
     */
    public function getJulijiahome( )
    {
        $list = Source_Product_ProductFlat::cacheTags('product')
                ->where('small_image','<>','')
                ->remember(20)
                ->orderBy('created_at','desc')->take('10')->with('productFlatToFlatDetail')->get();
        $res=array();
        foreach ($list as $key=> $val ){
             $res[$key]['entity_id']  =  $val->entity_id;
             $res[$key]['name']= $val->name;
             $res[$key]['price']=  $val->price;
             $res[$key]['cost_price']= $val->cost_price;
             $res[$key]['preferential_price']= $val->preferential_price;
             $res[$key]['small_image']= getImgSize( 'goods', $val->entity_id, $val->small_image,210,210 );
        }
       return json_encode($res);
    }


    /**
     * @return bool
     *  快递鸟推送回来的数据进行处理
     */
    public function  postReshipping()
    {
	
        $RequestData=urldecode($_POST['RequestData']);
        $resdata = json_decode($RequestData);
        if( $resdata->Count==0 ){
            return false;
        }
        //处理返回数据
		$res =array();
        foreach ( $resdata->Data as $key=> $val){
            if($val->Success){
                $LogisticCode = $val->LogisticCode; //快递号
                $OrderCode = $val->OrderCode; //快递号
                $item = Source_Order_OrderItem::where('shipping_id', $val->LogisticCode)->first();
			
			     if(!empty($item)){
					if(is_array($val->Traces)){
						
						if($item->id){
							DB::table('order_shipping_detail')->where('item_id',$item->id)->delete();
						}
						foreach ($val->Traces as $trace ){
						
						   $shipping['item_id'] =  $item->id;
						   $shipping['AcceptStation'] =  $trace->AcceptStation;
						   $shipping['AcceptTime'] = $trace->AcceptTime;
						   DB::table('order_shipping_detail')->insert($shipping);
						}
					}
				 }
			
				 $res['EBusinessID']=$val->EBusinessID;
				 $res['UpdateTime']=TimeTools::getFullTime();
				 $res['Success']=$val->Success;
				 $res['Reason']=$val->Reason;
                
            }
        }

         return json_encode($res);
    }

}