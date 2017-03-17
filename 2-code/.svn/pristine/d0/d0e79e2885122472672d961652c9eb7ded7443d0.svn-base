@section('footer_js')
    <link type="text/css" rel="stylesheet" href="{{url('js/public/jquery-easyui-1.5/themes/default/easyui.css?v=321')}}">

    <style type="text/css">
	 .bg_div{ display:inline-block; min-height:400px;width:900px;}
	 .free_d .h_hd{ height:28px; line-height:28px; font-weight:bold;font-family:"Microsoft Yahei", "Lucida Grande", Verdana, Lucida, Helvetica, Arial, sans-serif; font-size:14px;}
	 .free_d #peizhixing{ font-size:14px; margin-right:12px;}
	 .free_d .hd_left{ border:7px solid #f0f0f0; width:280px; float:left; }
	 .free_d .hd_left .tree-folder-open{ margin:0 5px; }
	 .free_d .hd_left .tree-folder{ margin:0 5px; }
	 .free_d .hd_left .easyui-panel{  }
	 .free_d .hd_left .easyui-tree{  line-height:1.8; padding:14px;}
	 .free_d .hd_left .easyui-tree  li{line-height:32px !important; font-size:14px; }
	 .free_d .hd_right{ border:7px solid #f0f0f0; width:270px!important; float:left; padding:14px 0px; margin-left:136px; }
	 .tree-node{ height:26px !important; padding-top:4px;}
	 .clearfix hd_left .panel{ width:500px!important; }
	 .btn-primary{ margin:0px 0px 30px 20px; width:100px; }
	 .panel{box-shadow:0 !important; border:0!important;-webkit-box-shadow:0 0 0 rgba(0,0,0,.0); background: none !important;}
	</style>
<script type="text/javascript" src="{{url('js/public/jquery-easyui-1.5/jquery.easyui.min.js')}}"></script>
    <script>

        $(function () {
            $("#button").click(function () {
                tree  = $("#selecteaav");
                root  = tree.tree('getRoots');
                pushdata = [];
                setid =new Array();
                for( var i =0 ; i<root.length;i++){
                    clid  = root[i]['children'];

                    for( var j =0 ; j<clid.length;j++){
                        list = {};
                        list.id= clid[j]['id'];
                        list.text= clid[j]['text'];
                        list.parent= root[i]['text'];
                        list.setid= "{{$_GET['setid']}}";
                        pushdata.push(list);
                        setid.push( list.id);
                    }
                }
                setidd =new Array();
                $("#peizhixing input[type=checkbox]").each(function () {
                    if(this.checked){
                        var r = $(this).val();
                        var reg = new RegExp("(^"+r+",)|(^"+r+"$)|(,"+r+",)|(,"+r+"$)");
                       if(reg.test(setid.toString())){
                           setidd.push(r);
                       }
                    }
                })
               $.post('/admin/product/abstoab',{data:pushdata,fiter:setidd },function (index) {
                   if(index =='0'){
                       layer.alert('更新数据失败');
                   }
                   if(index =='1'){
                       location.href ='/admin/product/attribute_base_index';
                   }
               })
            });
            $('#selecteaav').tree({
                onBeforeDrop : function (target, source, point)
                {
                    tree  = $("#choosetree");
                    root  = tree.tree('getRoots');
                    if(root.length==1){
                        layer.alert('最后一个选项不能移动');
                        return false;
                    }
                }
            });
        })
    </script>
@stop
@section('content')
    <div class="page page03">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">商品属性集 - 设置属性</span>
                    </h3>
                    <h5>
				<span class="action-span">
					<a href="{{url('admin/product/attribute_base_index')}}" class="btn btn-warning click-loading">
                        <i class="iconfont">&#xe6d4;</i>
                           返回商品属性集列表
                    </a>
				</span>
                    </h5>
                </div>
            </div>
        </div>
        <div class="free_d">
            <label class="h_hd">请选择配置项</label>
            <div >
                  @foreach($attrbute as $r)
                      <cite id="peizhixing">
                          <input  type="checkbox" name="checkbox" value="{{$r->id}}" @if( in_array($r->id,$fiterlist)) checked="checked"  @endif title="{{$r->name}}">
                          <span>{{$r->name}}</span>
                      </cite>
                  @endforeach
            </div>
            <div class="clear"></div><br>
            <div class="bg_div">
                <label class="h_hd">请设置属性集</label>
                <div>
                    <div class="table-content mt10 clearfix hd_left" >
                        <div class="easyui-panel" >
                            <ul id="selecteaav"  class="easyui-tree" data-options="
                                 url:'/admin/product/attribute_data?setid={{$_GET['setid']}}'
                                 ,method:'get',
                                 animate:true,
                                 dnd:true">
                            </ul>
                        </div>
                    </div>
                    <div class="easyui-panel hd_right" >
                        <ul id="choosetree" class="easyui-tree" data-options="
                            url:'/admin/product/attribute_customerdata?setid={{$_GET['setid']}}',
                            method:'get',
                            animate:true,
                            dnd:true">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" value="提交"  id="button" class="btn btn-primary">

@stop