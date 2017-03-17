@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/login.css')}}">
@stop

@section('content')

           @if(Session::has('msg'))
            <p class="alert">{{Session::get('msg')}}</p>
           @endif


<!-- <div class="page-container"> -->
           <div class="center">
               <div class="logo-info">
                   <a href="javascript:void(0);">
                       <img src="../images/logo.png">
                   </a>
                   <p>曼蒂商城平台系统管理中心</p>
               </div>
               <div class="line">
                   <img src="../images/line.png">
               </div>
               <div class="form-info">
                   <form id=" " name=" " method="post" class="m-form" action="{{url('user/loginVerify')}}">
                       {{Form::token()}}
                   <div class="input-text-box">
                     <div class="form-group" style="width:600px; text-align:left;">
                         <label class="tit">帐号</label>
                         <!-- 用户名 -->
                         <input type="text" class="username input-text"  ignore="ignore"  datatype="n" placeholder="请输入用户名"  errormsg="请输入" tipsrmsg="请输入" name="name" value="{{Input::old('name')}}"><span class="Validform_checktip"></span>
                     </div>
                     <div class="form-group" style="width:600px; text-align:left;">
                         <label class="tit">密码</label>
                         <!-- 密码 -->
                         <input type="password" id=" " class="username input-text" name="password"  ignore="ignore"  datatype="n" placeholder="请输入密码"  errormsg="请输入" tipsrmsg="请输入" name="password" value="{{Input::old('password')}}"><span class="Validform_checktip"></span>

                     </div>

                       <div class="form-group checkbox-signup">
                           <label class="check-label">
                               <input type="checkbox" checked="checked">
                               记住密码
                           </label>
                       </div>
                   </div>

                   <input type="submit" id="btn_submit" class="submit" value="立即登录">

                   </form>

               </div>


           </div>
<!-- </div> -->
           <ul class="speed" id="supersized" style="visibility: visible;">
           <li class="slide-3 activeslide" style="visibility: visible; opacity: 0.941146;"><a target="_blank"><img src="../images/login_bg.jpg" style="width: 1920px; height: 1075.2px; left: 0px; top: -32px;"></a></li>
           </ul>

@stop
