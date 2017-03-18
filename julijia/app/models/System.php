<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/14
 * Time: 11:59
 */

class System {


    /**
     * @param $post 提交的数据
     * 根据前端页面提交的数据进行数据保存，前端提交的数据为数组
     *
     *
     */
    public function  SaveConfig( $post)
    {
        $result=  DB::transaction(function() use ($post){
            foreach ( $post as $key =>$val){
                 //保存运费相关信息
                if($key =='shipping'){
                    foreach ($val as $key1 =>$v){
                        if(is_array($v)){
                            foreach ($v as $files=>$vv){
                                //判断是否文件
                                if($files=="file"){
                                    ( new Upload())->uploadProductImage('shipping',$vv,'config');
                                    if(DB::table('config_shipping')->where('name',$key1)->count()){
                                        DB::table('config_shipping')->where('name',$key1)->update( array('value'=>$vv));
                                    }else{
                                        DB::table('config_shipping')->insert(array('name'=>$key1,'value'=>$vv));
                                    }
                                }
                            }
                        }else{
                            if( DB::table('config_shipping')->where('name',$key1)->count()>0){
                                DB::table('config_shipping')
                                    ->where('name',$key1)
                                    ->update( array('value'=>$v));
                            }else{
                                DB::table('config_shipping')
                                    ->insert(array('name'=>$key1,'value'=>$v));
                            }
                        }
                    }
                }
                //保存支付相关信息
                if($key =='payment'){
                    foreach ($val as $key1 =>$v){
                        //判断是否文件
                        if(is_array($v)){
                            foreach ($v as $files=>$vv){
                                if($files=="file"){
                                    ( new Upload())->uploadProductImage('payment',$vv,'config');
                                    if(DB::table('config_payment')->where('name',$key1)->count()){
                                        DB::table('config_payment')->where('name',$key1)->update( array('value'=>$vv));
                                    }else{
                                        DB::table('config_payment')->insert(array('name'=>$key1,'value'=>$vv));
                                    }
                                }
                            }
                        }else{
                            if(DB::table('config_payment')->where('name',$key1)->count()>0){
                                DB::table('config_payment')->where('name',$key1)->update( array('value'=>$v));
                            }else{
                                DB::table('config_payment')
                                    ->insert(array('name'=>$key1,'value'=>$v));
                            }
                        }
                    }
                }
                //保存商品信息
                if($key =='product'){
                    foreach ($val as $key1 =>$v){
                        if(is_array($v)){
                            foreach ($v as $files=>$vv){
                                //判断是否文件
                                if($files=="file"){
                                    ( new Upload())->uploadProductImage('product',$vv,'config');
                                    if(DB::table('config_product')->where('name',$key1)->count()){
                                        DB::table('config_product')->where('name',$key1)->update( array('value'=>$vv));
                                    }else{
                                        DB::table('config_product')->insert(array('name'=>$key1,'value'=>$vv));
                                    }
                                }
                            }
                        }else{
                            if( DB::table('config_product')->where('name',$key1)->count()>0){
                                DB::table('config_product')->where('name',$key1)->update( array('value'=>$v));
                            }else{
                                DB::table('config_product')->insert(array('name'=>$key1,'value'=>$v));
                            }
                        }
                    }
                }
                //保存核心关系数据
                if($key =='core'){
                    foreach ($val as $key1 =>$v){
                        if(is_array($v)){
                             foreach ($v as $files=>$vv){
                                 //判断是否文件
                                 if($files=="file"){
                                     ( new Upload())->uploadProductImage('core',$vv,'config');
                                     if(DB::table('config_core')->where('name',$key1)->count()){
                                         DB::table('config_core')->where('name',$key1)->update( array('value'=>$vv));
                                     }else{
                                         DB::table('config_core')->insert(array('name'=>$key1,'value'=>$vv));
                                     }
                                 }
                             }

                        }else{
                            if(DB::table('config_core')->where('name',$key1)->count()){
                                DB::table('config_core')->where('name',$key1)->update( array('value'=>$v));
                            }else{
                                DB::table('config_core')->insert(array('name'=>$key1,'value'=>$v));
                            }
                        }

                    }
                }
            }
        });
        if( is_null($result) )
            return true;
        else return false;

    }
}
