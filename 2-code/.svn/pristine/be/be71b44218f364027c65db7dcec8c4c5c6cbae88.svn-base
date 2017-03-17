@section('content')



<div class="page">


<div class="fixed-bar">
<div class="item-title">
  <div class="subject">
    <h3>
      <span class="action">会员 - 编辑</span>
    </h3>
          <h5>
      <span class="action-span">
        <a href="vip.html" class="btn btn-warning click-loading">
          <i class="iconfont">&#xe6d4;</i>
          返回会员列表
        </a>
      </span>
    </h5>
  </div>
</div>
</div>


<form id="SystemConfigModel" class="form-horizontal form"  method="post"  novalidate action="{{url('user/info/update')}}">
  {{Form::token()}}

<div class="table-content m-t-30 ">

      <h5 class="tab_h5"><font class="iconfont">&#xe64e;</font>基本信息</h5>





  <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="text-danger ng-binding">*</span>
              <span class="ng-binding">用户名：</span>
            </label>
            <div class="col-sm-8">
              <div class="form-control-box">
                 <input type="text"  class="form-control valid" name="name" value=<?php echo Auth::user()->name; ?>>

              </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="text-danger ng-binding">*</span>
              <span class="ng-binding">用户昵称：</span>
            </label>
            <div class="col-sm-8">
              <div class="form-control-box">
                  <input type="text"  class="form-control valid" name="alias" value=<?php echo Auth::user()->alias; ?>>
              </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">性别：</span>
            </label>
            <div class="col-sm-8">
               <div class="form-control-box">

                  <select class="form-control valid w100" name="sex">
                  <option value="2"
                  @if (Auth::user()->sex == 2)
                  selected="select"
                  @endif
                  >保密</option>
                  <option value="1"
                  @if (Auth::user()->sex == 1)
                  selected="select"
                  @endif
                  >男</option>
                  <option value="0"
                  @if (Auth::user()->sex == 0)
                  selected="select"
                  @endif
                  >女</option>
                  </select>
           </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">出生日期：</span>
            </label>

            <div class="col-sm-8">
               <div class="form-control-box">
                   <div style="margin-bottom:20px">
                     <input class="easyui-datebox"    style="width:100%;" name="birthday"
                     value= <?php
                     //dd(strtotime(Auth::user()->birthday));
                     echo date('d/m/Y',strtotime(Auth::user()->birthday));
                     ?>
                     >
                   </div>

           </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
            <div class="form-group">
                <label class="col-sm-4 control-label">
                  <span class="text-danger ng-binding">*</span>
                  <span class="ng-binding">邮 箱：</span>
                </label>
                <div class="col-sm-8">
                  <div class="form-control-box">
                     <input type="text"  class="form-control valid" name="email" value=<?php
                     echo Auth::user()->email;
                      ?> >
                  </div>
                </div>
            </div>
          </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">居住地：</span>
            </label>
            <script type="text/javascript" src="{{url('js/public/location_pick/location_pick.js')}}">


            </script>
            <div class="col-sm-8">
               <div class="form-control-box">
                  <select class="form-control valid w100" id="address1" name="province" >
                  <option value="{{$province}}">{{$province}}</option>


                  </select>
                  &nbsp;省&nbsp;
                  <select class="form-control valid w100" id="address2" name="city">
                  <option value="{{$city}}">{{$city}}</option>


                  </select>
                  &nbsp;市&nbsp;
                  <select class="form-control valid w100" id="address3" name="district">
                  <option value="{{$district}}">{{$district}}</option>


                  </select>
                  &nbsp;区&nbsp;
           </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">详细地址：</span>
            </label>
            <div class="col-sm-8">
              <div class="form-control-box">
                 <textarea  class="form-control valid" rows="5" style="height:60px" name="address">
                   <?php
                   if(isset($userAddr)){
                     if(isset($userAddr->address))
                     {
                       echo $userAddr->address;
                     }
                   }
                    ?>

                 </textarea>
              </div>
            </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">手机号码：</span>
            </label>
            <div class="col-sm-8">
              <div class="form-control-box">
                 <input type="text"  class="form-control valid" name="mobile_phone" value=
                 <?php echo Auth::user()->mobile_phone; ?>
                 >
              </div>
              <div class="help-block help-block-t"><div class="help-block help-block-t">可作为登录凭据</div></div>
            </div>
        </div>
      </div>

      <h5 class="tab_h5"><font class="iconfont">&#xe693;</font>账户信息</h5>
      <div class="simple-form-field">
        <div class="form-group" >
            <label class="col-sm-4 control-label">
              <span class="ng-binding">用户积分：</span>
            </label>
            <div class="col-sm-8">
            <label class="control-label cur-p m-r-10"><?php echo Auth::user()->user_points ?>分</label>
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">
              <span class="ng-binding">用户等级：</span>
            </label>
            <div class="col-sm-8">
            <label class="control-label cur-p m-r-10">{{$group}}</label>
          </div>
        </div>
      </div>

      <h5 class="tab_h5"><font class="iconfont">&#xe663;</font>登录信息</h5>
      <div class="simple-form-field">
        <div class="form-group">
          <label class="col-sm-4 control-label">
          <span class="ng-binding">是否登录：</span>
          </label>
          <div class="col-sm-8">
              <div class="form-control-box">
              <input type="hidden" value="1" aria-required="true" class="valid">
                <div><label class="control-label cur-p m-r-10"><input type="radio" name="deng01" id="deng1" value="0" checked>是</label>
              <label class="control-label cur-p m-r-10"><input type="radio" name="deng01" value="1" id="deng2">否</label>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="simple-form-field">
        <div class="form-group">
          <label class="col-sm-4 control-label">
          <span class="ng-binding">是否接收短信：</span>
          </label>
          <div class="col-sm-8">
              <div class="form-control-box">
              <input type="hidden" value="1" aria-required="true" class="valid">
                <div><label class="control-label cur-p m-r-10"><input type="radio" name="duan01" id="duan_d1" value="0" checked>是</label>
              <label class="control-label cur-p m-r-10"><input type="radio" name="duan01" value="1" id="duan_d2">否</label>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div class="simple-form-field p-b-30">
    <div class="form-group">
      <label for="text4" class="col-sm-4 control-label"></label>
      <div class="col-xs-8">
        <input type="button" id="btn_submit" value="确认提交" class="btn btn-primary">
      </div>
    </div>
  </div>

</div></form>
</div>
@stop
