<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/13
 * Time: 17:39
 */
  ?>
@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">设置</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="##" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                        返回列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>

        <form id="SystemConfigModel" class="form-horizontal m-form"  method="post"  novalidate action="/admin/system/cofnig">
            <div class="table-content m-t-30">

                {{--基本设置--}}
                @include('admin.system.config.base')


                {{--商品与运费配置--}}
                @include('admin.system.config.product')
                {{--用户与购买--}}
                @include('admin.system.config.shopandshop')
                {{--支付方式--}}
                @include('admin.system.config.orderpay')


                <div class="simple-form-field p-b-30">
                    <div class="form-group">
                        <label for="text4" class="col-sm-4 control-label"></label>
                        <div class="col-xs-8">
                            <input type="submit" id="btn_submit" value="确认提交" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <style>
        .form-group{ line-height: 20px}
    </style>

@stop
@section('footer_js')
    <script>
        ss =  "<?php echo Session::get('msg') ?>";
        if(ss!=''){
            layer.alert(ss);
        }
    </script>

    <script>
        function getImgTemplet( index, id )
        {

            layer.open({
                type: 2,
                title:false,
                shadeClose: true,
                shade: 0.8,
                area: ['460px', '480px'],
                content: ['/admin/get/imgtemplet/'+id,'no']
            });
        }

        function setPathUrl( path, index  )
        {
            $("#"+index).parents('.addimg').find('img').attr('src','/media/temp/'+path);
            $("#"+index).val(path);
        }
    </script>
@stop

