@section('title','产品列表')
@section('admincss')
    <link type="text/css" rel="stylesheet" href="{{url('css/admin/chosen.css').'?v='.Config::get('tools.adminJsTime')}}">
@stop
@section('content')
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>
                    <span class="action">商品管理 - 所有商品</span>
                </h3>
                <ul class="tab-base shop-row">
                    <li><a @if( $set['status'] == '' || $set['status'] == '1' ) class="current" @endif href="{{url('admin/product/goods')}}"><span>线上产品</span></a></li>
                    <li><a @if( $set['status'] == '0' ) class="current" @endif href="{{url('admin/product/goods?status=0')}}"><span>线下产品</span></a></li>
                </ul>
                <h5>
				<span class="action-span">
					<a href="{{url('admin/product/goods/create')}}" class="btn btn-warning click-loading">
                        <i class="fa fa-plus"></i>发布商品</a>
				</span>
                </h5>
            </div>
        </div>
    </div>
    <div class="search-term m-b-10">
        <form action="{{Request::url()}}" method="get">
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>关键字：</span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" id="searchmodel-keyword" class="form-control" name="name" value="{{$set['name']}}" placeholder="商品ID/名称">
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>分类：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select  class="form-control chosen-select" name="category_id">
                            <option value="" @if($set['category_id']== '') selected="selected" @endif> 请选择分类 </option>
                            @foreach( $category as $ca )
                            <option value="{{$ca->id}}" @if($set['category_id'] == $ca->id) selected="selected" @endif>
                                @if( $ca->leavel == 1 )
                                 ◢
                                @elseif( $ca->leavel == 2 )
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;◢
                                @else
                                  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;◢
                                @endif
                                {{$ca->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>商品状态：</span>
                    </label>
                    <div class="form-control-wrap">
                        <select id="searchmodel-goods_status" class="form-control" name="status" data-width="120">
                            <option value="1" @if($set['status'] == '1' ) selected="selected" @endif>出售中</option>
                            <option value="0" @if($set['status'] == '0' ) selected="selected" @endif>已下架</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5" onclick="searchCheck( this )">
            </div>
        </form>
    </div>
    <div class="common-title">
        <div class="ftitle">
            <h3>商品列表</h3>
            <h5>(&nbsp;共<span data-total-record="true">{{$data->getTotal()}}</span>条记录&nbsp;)</h5>
        </div>
        <div class="operate">
            <a class="reload" href="javascript:location.reload();" title="刷新数据"><i class="iconfont">&#xe6fb;</i></a>
        </div>
    </div>
    <!--列表内容-->
    <div class="table-responsive">
        <table id="table_list" class="table table-hover">
            <thead>
            <tr>
                <th class="tcheck w60">
                    <input type="checkbox"  onclick="CheckAll(this.checked)" class="table-list-checkbox-all" title="全选/全不选">
                </th>
                <th class="text-c w100" >编号</th>
                <th class="w200">商品名称</th>
                <th class="w150">SKU</th>
                <th class="w100">库存</th>
                <th class="w150">价格（元）</th>
                <th class="w150">发布时间</th>
                <th class="text-c w100">排序</th>
                <th class="handle w400">操作</th>
            </tr>
            </thead>
            <form  class="goods" action="{{url('admin/product/goods/statusall')}}" method="post">
            <tbody>
            @foreach( $data as $row )
            <tr>
                <td class="tcheck">
                    <input type="checkbox" class="checkBox table-list-checkbox" name='check[]' value="{{$row->entity_id}}" onclick="CheckOne(this.checked,this);">
                </td>
                <td class="text-c">{{$row->entity_id}}</td>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <a href="javascript:;" target="_blank">
                            <img src="{{getImagesUrl( 'goods', $row->entity_id, $row->small_image)}}" class="goods-thumb" width="44">
                        </a>
                    </div>
                    <div class="ng-binding goods-message w200">
                        <div class="name">
                            <a href="javascript:;" target="_blank" data-toggle="tooltip" data-placement="auto bottom">{{$row->name}}</a>
                        </div>
                    </div>
                </td>
                <td>{{$row->sku}}</td>
                <td>{{$row->kc_qty}}</td>
                <td>{{$row->price}}
                    <font style="color:#F93">优惠:{{$row->preferential_price}}</font>
                </td>
                <td>{{$row->created_at}}</td>
                <td class="text-c">
                    <input type="text" class="form-control small" value="420">
                </td>
                <td class="handle">
                    <a href="javascript:void(0);" target="_blank">查看</a>
                    <span>|</span>
                    @if( $row->status == 1)
                    <a href="javascript:void(0);" onclick="setStatus('down',this,{{$row->entity_id}});" class="offsale-goods">下架</a>
                    @endif
                    @if( $row->status == 0)
                    <a href="{{url('admin/product/goods/'.encode($row->entity_id).'/edit?setid='.encode($row->attribute_set_id))}}">编辑</a>
                    <span>|</span>
                    <a href="javascript:void(0);" onclick="setStatus('up',this,{{$row->entity_id}});" class="offsale-goods">上架</a>
                    <span>|</span>
                    <a href="javascript:void(0);" onclick="delProduct(this,{{$row->entity_id}});" class="offsale-goods">删除</a>
                    @endif
                </td>
            </tr>
            @endforeach
            <!-- 没有数据显示 -->
            @include('admin.public.null',array('data'=>$data,'cols'=>11))
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <div class="pull-left">
                        @if( $set['status'] == '' || $set['status'] == '1' )
                            <input type="button" class="btn btn-danger m-r-2 batch-offsale-goods" onclick="setStatusAll()" value="下架">
                            <input type="hidden" name="status" value="0">
                        @else
                            <input type="button" class="btn btn-danger m-r-2 batch-offsale-goods" onclick="setStatusAll()" value="上架">
                            <input type="hidden" name="status" value="1">
                        @endif
                    </div>
                </td>
            </form>
                <td colspan="7">
                    <!-- 分页 -->
                    @include('admin.public.page',array('data'=>$data,'set'=>$set,'product'=>1))
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    {{ Form::token() }}
</div>
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/admin/common.js?v={{Config::get('tools.adminJsTime')}}"></script>
    <script type="text/javascript" src="/js/admin/jquery.chosen.js?v={{Config::get('tools.adminJsTime')}}"></script>
    <script type="text/javascript" src="/js/admin/product.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop