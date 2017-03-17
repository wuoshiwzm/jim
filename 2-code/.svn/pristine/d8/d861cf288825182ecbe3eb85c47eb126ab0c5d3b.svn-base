@section('content')

@if(Session::has('msg'))
           <p class="alert">{{Session::get('msg')}}</p>
           @endif

<form  action="{{url('user/loginVerify')}}" method="post">

  {{Form::token()}}



  用户名:<input type="text" name="name" value="{{Input::old('name')}}">
  <br>

  密码:<input type="password" name="password" value="{{Input::old('password')}}">
  <br>

  <input type="submit" >
</form>


@stop
