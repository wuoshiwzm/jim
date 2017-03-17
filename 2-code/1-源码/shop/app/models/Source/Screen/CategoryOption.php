<?php
class Source_Screen_CategoryOption extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $table='cagetoty_option';
    public  $timestamps = false;

    /**
     * @return mixed
     * 关联属性表
     */
    public function screenCategoryToAttrbute()
    {
        return $this->belongsTo( 'Source_Eav_Attrbute', 'attbute_id', 'id' );
    }

}