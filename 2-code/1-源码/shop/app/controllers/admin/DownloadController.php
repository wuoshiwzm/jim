<?php

class DownloadController extends Controller
{
    /**
     * 导出用户列表
     */

    public function downloadUserList(){

        $title = "居利家商城用户信息表";
        $data= $users = Source_User_UserInfo::orderBy('id')->get();
        if( isset( $data ) && count( $data ) > 0)
        {
            $arrHeader[] = date( 'ymdHis', $_SERVER[ 'REQUEST_TIME' ] );
            $arrHeader[] = date( 'Y/m/d H:i' , $_SERVER[ 'REQUEST_TIME' ] );
            $arrHeader[] = 'Content-type:application/vnd.ms-excel;charset=gb2312';
            $arrHeader[] = 'wangdingfeng@sxdaxin.com';
            $arrHeader[] = '陕西大信网络科技有限公司';
            $i = 0;
            foreach( $data as $row )
            {
                $grabList[$i][] = $row->id;
                $grabList[$i][] = $row->name;
                $grabList[$i][] = $row->mobile_phone;
                $grabList[$i][] = $row->home_phone;
                $grabList[$i][] = $row->sex==1?'男':'女';
                $grabList[$i][] = $row->user_points;
                $grabList[$i][] = $row->pay_points;
                $grabList[$i][] = $row->qq;
                $grabList[$i][] = $row->wechat;
                $grabList[$i][] = $row->created_at;
                $i++;
            }
            $columns =array('用户id','用户名','用户手机','用户座机','用户性别','用户积分','消费积分','qq','微信','创建时间');
//            $columns =array('订单编号','订单来源','客户名称','客户电话','支付方式','购买数量','商品价格','优惠金额','支付金额','下单时间');
            Excel::create('居利家用户信息表'.date('Ymd',time()), function($excel) use( $arrHeader, $grabList,$title,$columns ) {
                $excel->setTitle($title);
                $excel->setCreator('居利家')
                    ->setCompany('陕西大信网络科技有限公司');
                $excel->sheet($title, function($sheet) use( $arrHeader, $grabList,$columns )  {
                    $sheet->row(1, $columns);
                    $sheet->row(1, function($row){
                        $row->setFontWeight();
                    });
                    // 新增行
                    $sheet->rows( $grabList );
                });
            })->export('xls');
        }
    }

}