<?php
class Source_Salerule_FavoutableRule extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='favoutable_rule';
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * @return mixed
     *  关联优惠规则分类表
     */
    public function  Category()
    {
        return $this->hasMany( 'Source_Salerule_FavoutableCategory', 'rule_id');
    }

    /**
     * @return mixed
     * 关联优惠规则商品表
     */
    public function  Product()
    {
        return $this->hasMany( 'Source_Salerule_FavoutableRule', 'rule_id');
    }

}