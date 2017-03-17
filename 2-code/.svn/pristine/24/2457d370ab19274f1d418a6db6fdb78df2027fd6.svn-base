<?php
/**
 * Created by PhpStorm.
 * User: wangdingfeng
 * Date: 2015/1/14
 * Time: 12:53
 */

class Source_Product_ProductImage extends \Eloquent {

    protected $table='town_product_image';
    //开启自动更新时间戳
    public $timestamps = true;

    //开启软删除
    protected $softDelete = true;
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];



    public  function  productflat($id){
         $jianlist  =  Eav_Attrbute::where('attribute_set_id' ,$id)->orderBy('sort','asc')->get();
        if (!Schema::hasTable('town_product_flat'))
        {
            Schema::create('town_product_flat', function($table) use( $jianlist)
            {
                $table->string('id');
                $table->string('attributeset_id');
                foreach($jianlist as  $val){
                    if($val->type =='int' && $val->front_input!='media'){
                        $table->integer($val->name);
                    }
                    if($val->type =='varchar' && $val->front_input!='media'){
                        $table->string($val->name);
                    }
                    if($val->type =='text'&& $val->front_input!='media'){
                        $table->longText($val->name);
                    }
                    if($val->type =='datetime' && $val->front_input!='media'){
                        $table->nullableTimestamps($val->name);
                    }
                }
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function  AttrbuteSet()
    {
        return $this->belongsTo('Eav_AttrbuteSet','attributeset_id');
    }
    public function  Doamins()
    {
        return  $this->hasMany('Domains','cityid','store_id');

    }


}