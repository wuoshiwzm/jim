<?php
class ProductEav
{

    /**
     * @param $data
     * @return mixed
     * 属性集验证
     */
    static function validatorAbs( $data )
    {
        $rules = [];
        $message = [];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            return true;

        } else {
            return $validator;
        }
    }

    /**
     * @param $data
     * @return mixed
     * 属集验证
     */
    static function validatorAb( $data )
    {
        $rules = [];
        $message = [];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            return true;

        } else {
            return $validator;
        }
    }


    /**
     * @param $data
     * @return mixed
     * 添加属性集
     */
    static function addAbs( $data )
    {
        if( Source_Eav_AttrbuteSet::where( $data )->count() )
        {
            return false;
        }
        return Source_Eav_AttrbuteSet::create( $data );
    }

    /**
     * @param $id
     * @param $type
     * 关连属性集和属性查询
     */
    static function getRavTypeCount( $id, $name, $type='product' )
    {
       switch ( $type )
       {
           case 'product':
              return Source_Product_ProductEav::where($name,$id)->count();
           break;
       }
    }


    /**
     * @param $data
     * @return mixed
     * 添加属性
     */
    static function addAb( $data )
    {
        if( Source_Eav_Attrbute::where( $data )->count() )
        {
            return false;
        }
        return Source_Eav_Attrbute::create( $data );
    }


    /**
     * @param $id
     * @return array
     * 查询属性集和属性的挂靠关系
     */
    static function getAdsToAd( $id )
    {
        $data = new stdClass();
        $fEav = Source_Product_ProductEav::where( 'attbute_set_id', $id )->with('productEavToEav')->get();
        if( count($fEav) )
        {
            $pEav = array();
            $aId = array();
            foreach ( $fEav as $key=>$row )
            {
                $obj = new stdClass();
                $obj->id = $row->attbute_id;
                $obj->name = $row->productEavToEav->admin_label;
                $pEav[$key] = $obj;
                $aId[] = $row->attbute_id;
            }
        }else
        {
            $pEav = array();
            $res = Source_Eav_Attrbute::where('is_system',1)->select('id','admin_label')->get();
            foreach ( $res as $key=>$row )
            {
                $obj = new stdClass();
                $obj->id = $row->id;
                $obj->name = $row->admin_label;
                $pEav[$key] = $obj;
            }
        }

        $eav = Source_Eav_Attrbute::where('is_system',0);
        if( isset($aId) )
        {
            $eav->whereNotIn('id',$aId);
        }
        $data->pEav = $pEav;
        $data->eav = $eav->get();
        return $data;
    }

    /**
     * @param $id
     * @param $data
     * 保存属性集和属性的关系
     */
    static function AdsToAdSave( $id, $data )
    {
        $pEav = Source_Product_ProductEav::where( 'attbute_set_id', $id )->count();
        if( $pEav )
        {
            $arr = array();
            foreach ( $data as $k=>$v )
            {
                $arr[$k]['attbute_set_id'] = $id;
                $arr[$k]['attbute_id'] = $v;
                $arr[$k]['created_at'] = date("Y-m-d H:i:s");
            }

            //调用写入数据方法 根据属性id查询属性表扩充flat表
            return (new ProductEav())->addProductFlat( $data, $arr );

        }else
        {

            $res = Source_Eav_Attrbute::where('is_system',1)->select('id')->get();
            $arr = array();
            $i=0;
            foreach ( $res as $row )
            {
                $arr[$i]['attbute_set_id'] = $id;
                $arr[$i]['attbute_id'] = $row->id;
                $arr[$i]['created_at'] = date("Y-m-d H:i:s");
                $i++;
            }

            foreach ( $data as $r=>$v )
            {
                $arr[$i]['attbute_set_id'] = $id;
                $arr[$i]['attbute_id'] = $v;
                $arr[$i]['created_at'] = date("Y-m-d H:i:s");
                $i++;
            }

            //调用写入数据方法 根据属性id查询属性表扩充flat表
            return (new ProductEav())->addProductFlat( $data, $arr );
        }
    }


    /**
     *  添加flat动态字段
     */
    private function addProductFlat( $data, $arr )
    {
        $result = DB::transaction(function() use ( $data, $arr )
        {
            $res = Source_Eav_Attrbute::whereIn('id',$data)->get();
            foreach ( $res as $row )
            {
                if ( !Schema::hasColumn('product_flat_detail', $row->name) )
                {
                    Schema::table('product_flat_detail', function($table) use ( $row )
                    {
                        switch ( $row->type )
                        {
                            case 'int':
                                $table->integer( $row->name );
                                break;
                            case 'bigint':
                                $table->bigInteger( $row->name );
                                break;
                            case 'blob':
                                $table->binary( $row->name );
                                break;
                            case 'boolean':
                                $table->boolean( $row->name );
                                break;
                            case 'char':
                                $table->char( $row->name, $row->length );
                                break;
                            case 'date':
                                $table->date( $row->name);
                                break;
                            case 'datetime':
                                $table->dateTime( $row->name);
                                break;
                            case 'decimal':
                                $table->decimal( $row->name);
                            case 'double':
                                $table->double( $row->name, $row->length,3);
                                break;
                            case 'choices':
                                $table->double( $row->name,  array('foo', 'bar'));
                                break;
                            case 'float':
                                $table->float( $row->name );
                                break;
                            case 'integer':
                                $table->integer( $row->name );
                                break;
                            case 'longtext':
                                $table->longtext( $row->name );
                                break;
                            case 'mediumint':
                                $table->mediumInteger( $row->name );
                                break;
                            case 'mediumtext':
                                $table->mediumText( $row->name );
                                break;
                            case 'smallint':
                                $table->smallInteger( $row->name );
                                break;
                            case 'tinyint':
                                $table->tinyInteger( $row->name );
                                break;
                            case 'varchar':
                                $table->string( $row->name, $row->length);
                                break;
                            case 'text':
                                $table->text( $row->name );
                                break;
                            case 'time':
                                $table->time( $row->name );
                                break;
                        }
                    });
                }
            }
            Source_Product_ProductEav::insert( $arr );
        });

        if( is_null($result) )
        {
            return true;

        }else
        {
            return false;
        }
    }
}