<?php
class NewsCate {
  static function validatorNewsCate( $data )
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




}
