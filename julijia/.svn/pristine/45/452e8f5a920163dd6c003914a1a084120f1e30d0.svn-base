@section('footer_js')
    <link type="text/css" rel="stylesheet" href="{{url('js/public/jquery-easyui-1.5/themes/default/easyui.css?v=3300')}}">


<script type="text/javascript" src="{{url('js/public/jquery-easyui-1.5/jquery.easyui.min.js')}}"></script>
    <script>

        $(function () {
            $("#button").click(function () {
                tree  = $("#selecteaav");
                root  = tree.tree('getRoots');
                pushdata = [];
                setid =[];
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
                setidd =[];
                $("#peizhixing input[type=checkbox]").each(function () {
                    if(this.checked){
                        var r = $(this).val();
                        var reg = new RegExp("(^"+r+",)|(^"+r+"$)|(,"+r+",)|(,"+r+"$)");
                       if(reg.test(setid.toString())){
                           setidd.push(r);
                       }
                    }
                });
               $.post('/admin/product/abstoab',{data:pushdata,fiter:setidd },function (index) {
                   if(index =='0')
                   {
                       layer.alert('更新数据失败');
                   }
                   if(index =='1')
                   {
                       layer.alert('操作成功',function () {
                           location.href ='/admin/product/attribute_base_index';
                       });
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
    <input type="button" value="提交"  id="button" class="btn btn-primary tijiao">

@stop