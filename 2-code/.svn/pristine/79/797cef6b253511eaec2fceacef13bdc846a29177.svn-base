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
     *
     */
    public function  SaveConfig( $post)
    {
      foreach ( $post as $key =>$val){

          if($key =='shipping'){
           foreach ($val as $key1 =>$v){
               DB::table('config_shipping')->where('name',$key1)->update( array('value'=>$v));
            }
          }
          if($key =='payment'){
              foreach ($val as $key1 =>$v){
                  DB::table('config_payment')->where('name',$key1)->update( array('value'=>$v));
              }
          }
          if($key =='product'){
              foreach ($val as $key1 =>$v){
                  DB::table('config_product')->where('name',$key1)->update( array('value'=>$v));
              }
          }
          if($key =='core'){
              foreach ($val as $key1 =>$v){
                  DB::table('config_core')->where('name',$key1)->update( array('value'=>$v));
              }
          }
      }
        return true;

    }
}
