@section('content')



@if(Session::has('msg'))
           <p class="alert">{{ var_dump(Session::get('msg')); }}</p>
           @endif

  注册信息

    <form action="{{url('user/store')}}" method="post">

      {{ Form::token() }}
      用户名:<input type="text" name="name" value="{{Input::old('name')}}">
      <br>

      密码:<input type="password" name="password"  >
      <br>

      重新输入密码:<input type="password" name="repassword"  >
      <br>

      Email:<input type="text" name="email" value="{{Input::old('email')}}">
      <br>

      办公室电话:<input type="text" name="office_phone" value="{{Input::old('office_phone')}}">
      <br>

      手机:<input type="text" name="mobile_phone" value="{{Input::old('mobile_phone')}}">
      <br>

      住宅电话:<input type="text" name="home_phone" value="{{Input::old('home_phone')}}">
      <br>

      性别:<select type="text" name="sex" value="{{Input::old('sex')}}">
        <option selected="select">请选择</option>
        <option <?php  if(Input::old('sex')==1) echo "selected='select'";?> value="1">男</option>
        <option <?php  if(Input::old('sex')==2) echo "selected='select'";?> value="2">女</option>
      </select>
      <br>

      生日:<input type="date" name="birthday" value="{{Input::old('birthday')}}">
      <br>

      QQ号码:<input type="text" name="qq" value="{{Input::old('qq')}}">
      <br>

      微信号码:<input type="text" name="wechat" value="{{Input::old('wechat')}}">
      <br>



      <input type="submit" >
    </form>
@stop
