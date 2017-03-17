<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/bootstrap.min.css')}}">
    <script type="text/javascript" src="/js/public/jquery/jquery-1.9.1.min.js"></script>
    <style>
        /* css 重置 */
        *{margin:0; padding:0; list-style:none; }
        .phone{ padding:0px 30px 0px 20px; font-family:"微软雅黑";}
        .phone h1{ height:40px; line-height:34px; font-size:16px; color:#24A0D6; border-bottom:1px solid #24A0D6; font-weight:bold;}
        .phone ul { padding:20px; }
        .phone ul li{ height:44px; line-height:44px; font-size:16px;}
        .phone ul li font{  float:left; display:block; width:100px; text-align:right; display:inline-block}
        .phone ul li .txt{ height:30px;width:210px; padding:0 10px; line-height:30px; font-size:16px; border:1px solid #ddd;float:left; margin-top:6px;}
        .phone ul li .txt2{ width:100px;}
        .phone .button{ width:158px; color:#fff; height:36px; line-height:36px; background:#24A0D6; border:0; float:left;margin-top:6px;font-weight:bold; font-size:16px; margin-top:16px;}
    </style>
</head>
<body>
<div class="phone">
    <h1></h1>编辑属性集</h1>
    <form class="m-form" action="{{url('admin/product/attribute_base_edit')}}" method="post">
        <ul>
            <li><font>名称：</font><input name="attribute_name" value="{{$data->attribute_name}}" type="text" class="txt" datatype="*" maxlength="15" tipsrmsg="请输入属性集名称" errormsg="输入的属性集名称不正确" ></li>
            <input name="type" type="hidden" class="txt" value="product">
            <input type="hidden" name="id" value="{{encode($data->id)}}"/>
            <li><font>&nbsp;&nbsp;</font><input type="submit" value="保存"  class="button"></li>
        </ul>
    </form>
</div>
</body>
<!--弹框-->
<script type="text/javascript" src="/js/public/layer/layer.js"></script>
<!--form 验证-->
<script type="text/javascript" src="/js/public/Validform/Validform_v5.3.2_min.js"></script>
<script>
    /**
     *  from 表单验证
     */
    $(".m-form").Validform({
        altercss:'Validform_skate',
        showAllError:true,
        postonce:true,
        tipSweep:true,
        tiptype:function(msg,o,cssctl){
            if(!o.obj.is("form"))
            {
                if(o.type != 2)
                {
                    layer.msg(msg);
                }
            }
        }
    });
</script>
</html>