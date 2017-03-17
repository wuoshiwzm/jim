<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/26
 * Time: 19:03
 */

class FinanceController extends CommonController{

    public function __construct()
    {
        parent::__construct();
    }

    public function  AccountRuHuizong(){
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $input =   Input::get();
        $sql  =  Finance::getaccouthuizong($input);
        $list = $sql->paginate($setPage);
        $set['setpage'] = $setPage;
        $set['beg_time'] = isset($input['beg_time'])?$input['beg_time']:'';
        $set['end_time'] = isset($input['end_time'])?$input['end_time']:'';
       return  $this->view('admin.finance.accounthuizong',compact('list','set'));
    }

    public function  GingYingshangJieKuan(){
        return  $this->view('admin.finance.jiesuan');
    }

    public function  MingXiHuiZong(){

        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $input =   Input::get();
        $sql  =  Finance::getaccoutmingxi($input);
        $list = $sql->paginate($setPage);
        $set['setpage'] = $setPage;
        $set['beg_time'] = isset($input['beg_time'])?$input['beg_time']:'';
        $set['end_time'] = isset($input['end_time'])?$input['end_time']:'';
        return  $this->view('admin.finance.mingxihuizong',compact('list','set'));
    }

    /**
     *
     */
    public function  MingXiHuzongExport(){
        $input =Input::get();
        $title = "客户账户交易明细导出";

        $sql = Finance::getaccoutmingxi($input);
        $data= $sql->get();
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
                $grabList[$i][] = $row->type;
                $grabList[$i][] = $row->entity_sn;
                $grabList[$i][] = $row->p_name;
                $grabList[$i][] = $row->p_guige;
                $grabList[$i][] = $row->p_gongyingshang;
                $grabList[$i][] = $row->p_sum;
                $grabList[$i][] = $row->p_price;
                $grabList[$i][] = $row->p_tprice;
                $grabList[$i][] = $row->shipping_fei;
                $grabList[$i][] = $row->discount;
                $grabList[$i][] = $row->pay_price;
                $grabList[$i][] = $row->c_name;
                $grabList[$i][] = $row->c_phone;
                $grabList[$i][] = $row->c_pay_count;
                $grabList[$i][] = $row->c_zhenshi_name;
                $grabList[$i][] = $row->p_pay_no;
                $grabList[$i][] = $row->p_pay_time;
                $grabList[$i][] = $row->order_status;
                $grabList[$i][] = $row->confirm_time;
                $grabList[$i][] = $row->created_at;
                $i++;
            }
            $columns =array('类型','单号','商品名称','商品规格','供应商','购物数量','单价','商品总价','运费','优惠金额',
                '支付金额',  '客户名称',  '客户电话',  '付款账号',  '真实姓名',  '支付单号','支付时间','订单状态','收货时间'
                ,'时间');

            Excel::create($title.date('Ymd',time()), function($excel) use( $arrHeader, $grabList,$title,$columns ) {
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
        }else{
            echo  "<script>alert('没有数据');location.href ='/admin/finance/mingxihuizong'</script>";
        }


    }

}