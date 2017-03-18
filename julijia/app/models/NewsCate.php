<?php

class NewsCate
{
    static function validatorNewsCate($data)
    {
        $rules = [
            'name' => 'required',
            'keyword' => 'required',
            'meta_desc' => 'required',

        ];
        $message = [];
        $validator = Validator::make($data, $rules, $message);
        if ($validator->passes()) {
            return true;

        } else {
            return $validator;
        }
    }


    /**
     * @param $id 分类id
     * @param $input 更新分类信息内容
     */
    static function update($id, $input)
    {
        $res = Source_News_NewsCate::where('id', $id)->update($input);
        return $res;
    }

    /**
     * @param $id 分类id
     * @return mixed 返回查询结果
     */
    static function find($id)
    {
        $res = Source_News_NewsCate::find($id);
        return $res;
    }

    /**
     * @param $id 分类id
     * @return mixed 返回是否有子分类
     */
    static function findChild($id)
    {
        $res = Source_News_NewsCate::where('pid', $id);
        return $res;
    }

    /**
     * @return mixed
     * 返回所有分类 信息
     */
    static function all()
    {
        return Source_News_NewsCate::all();
    }


}
