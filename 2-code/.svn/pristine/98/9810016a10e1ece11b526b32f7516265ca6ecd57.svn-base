<?php

/**
 *  Class User
 *  用户业务模型
 */
class User
{

    static function validatorUser($data){
      $rules =  [
        'name'=>'required|regex:/\w/',
        'password'=>'required|min:6|same:repassword',
        'repassword'=>'required|min:6',
        'email'=>'required|email',

        'office_phone'=>'min:7|max:20',
        'mobile_phone'=>'min:7|max:20',
        'home_phone'=>'min:|max:20',
        'sex'=>'required',
        'qq'=>'min:4|max:13',
        'wechat'=>'regex:/\w/',



      ];
      $message = [

      ];
      $validator = Validator::make( $data, $rules, $message );
      if( $validator->passes() )
      {
          return true;

      }else
      {
          return $validator->messages();
      }
    }


    //check if the name is occupied
    static function checkName($name){
      $res = Source_User_UserInfo::where('name',$name)->get()->toArray();
      // dd(Empty($res));
      return Empty($res)? true:false;
    }

    //check if the email is occupied
    static function checkEmail($email){
      $res = Source_User_UserInfo::where('email',$email)->get()->toArray();
      // dd(Empty($res));
      return Empty($res)? true:false;
    }

    //check if the tel is filled at least one
    static function checkTel($arr){
      $res='';
      foreach($arr as $k){
        $res.=$k;
      }
      return $res?true:false;

    }

    //add user to database
    static function addUser($data){

      $info['name'] = $data['name'];
      $info['password'] = encode($data['password']);
      $info['email'] = $data['email'];

      $info['office_phone'] = $data['office_phone'];
      $info['mobile_phone'] = $data['mobile_phone'];
      $info['home_phone'] = $data['home_phone'];
      $info['sex'] = $data['sex'];
      $info['qq'] = $data['qq'];
      $info['wechat'] = $data['wechat'];

      // dd($info['password']);
      return Source_User_UserInfo::create( $info );
    }

    static function checkUser($data){
      $name = $data['name'];
      $password= encode($data['password']);
      return  Source_User_UserInfo::where('name',$name)->where('password',$password)->first()? true : false;

    }

    static function getUser($username){
      return Source_User_UserInfo::where('name',$username);
    }

    /**
     * @param $data
     * @return mixed
     * 服务商用户验证
     */
    static function validatorSupplier( $data )
    {
        $rules =  [];
        $message = [];
        $validator = Validator::make( $data, $rules, $message );
        if( $validator->passes() )
        {
            return true;

        }else
        {
            return $validator;
        }
    }

    /**
     * @param $data
     * @return bool
     * 验证门店信息
     */
    static function validatorShop( $data )
    {
        $rules =  [];
        $message = [];
        $validator = Validator::make( $data, $rules, $message );
        if( $validator->passes() )
        {
            return true;

        }else
        {
            return $validator;
        }
    }

    /**
     * @param $data
     * 添加服务商用户
     */
    static function addSupplier( $data )
    {
        return Source_User_SupplierInfo::create( $data );
    }

    /**
     * @param $data
     * @param $id
     * 修改数据
     */
    static  function editSupplier( $data, $id )
    {
        $res = Source_User_SupplierInfo::find( $id );
        if( $res )
        {
            $res->status = $data;
            if( $res->save() )
            {
                return true;
            }else
            {
                return false;
            }

        }else
        {
            return false;
        }
    }

    static function getAddrFromUser($id){
      return Source_User_UserInfoAdd::where('user_id',$id);
    }

    static function getProv($provId){
      return Source_Area_Province::where('id',$provId);
    }
    static function getCity($cityId){
      return Source_Area_City::where('id',$cityId);
    }
    static function getDist($distId){
      return Source_Area_Area::where('id',$distId);
    }

    static function getGroup($groupId){
      return Source_User_UserInfoGroup::where('id',$groupId);
    }
    static function calcPoint($userId){

    }
}
