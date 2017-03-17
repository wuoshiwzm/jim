<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/9
 * Time: 10:59
 */?>
@extends('layouts.admin_main')
@section('right')
  @foreach( $list as $val)
      {{$val->id}}
    @endforeach
@stop

