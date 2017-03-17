<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/27
 * Time: 15:41
 * 财务控制器
 */

class Finance
{

        /**
         * @param $input
         * @return mixed
         * 获取账户汇总信息
         */
        static function  getaccouthuizong($input =null){
            $res =  self::gethuizongcolltion($input);
            return $res;
        }



    /**
     * @param $fiter
     * @return mixed
     * 获取账户明细sql 链接
     */
    static function  getaccoutmingxi($fiter =null){

         $sql  =  Source_Finance_AcccountDetail::orderBy('created_at','desc');
         //判断是否输入类型
        if(isset($fiter['type'] )&& $fiter['type']!='0'){
            $sql->where('type',trim($fiter['type']) );
        }
        // 判断时间段
        if(!empty($fiter['beg_time'] )&& !empty($fiter['end_time'] )){
            if($fiter['beg_time']==$fiter['end_time']){
                $sql->whereRaw( "created_at like  '%".$fiter['beg_time']."%'");
            }else{
                $sql->where('created_at' ,'>' ,$fiter['beg_time'])
                    ->where('created_at' ,'<=' ,$fiter['end_time']) ;
            }
        }
        
        return $sql;
    }

    /**
     * @param $fiter
     * @return mixed
     * 获取sql
     */
    private  static  function   gethuizongcolltion($fiter){
        $sql   =  Source_Finance_AcccountHuizong::orderBy('created_at','desc');
        if(!empty($fiter['beg_time'] )&& !empty($fiter['end_time'] )){
            if($fiter['beg_time']==$fiter['end_time']){
                $sql->whereRaw( "created_at like  '%".$fiter['beg_time']."%'");
            }else{
                $sql->where('created_at' ,'>' ,$fiter['beg_time'])
                    ->where('created_at' ,'<=' ,$fiter['end_time']) ;
            }
        }
        return $sql;
    }



}