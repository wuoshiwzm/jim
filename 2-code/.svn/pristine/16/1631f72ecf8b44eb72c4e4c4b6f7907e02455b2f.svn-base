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
                    <li><a class="current" href="product_management.html"><span>所有商品</span></a></li>
                    <li><a  href="product_down.html"><span>商品下架</span></a></li>
                </ul>
                <h5>
				<span class="action-span">
					<a href="add01.html" class="btn btn-warning click-loading">
                        <i class="fa fa-plus"></i>发布商品</a>
				</span>
                </h5>
            </div>
        </div>
    </div>
    <div class="search-term m-b-10">
        <form id="SearchModel" name="SearchModel" action="##" method="POST">
            <input type="hidden" name="_csrf" value="##">
            <div class="simple-form-field">
                <div class="form-group">
                    <label class="control-label">
                        <span>关键字：</span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" id="searchmodel-keyword" class="form-control" name="keyword" placeholder="商品ID/货号/名称">
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
                            @foreach( $category as $ca )
                            <option value="{{$ca->id}}">
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
                            <option value="">全部</option>
                            <option value="1">出售中</option>
                            <option value="0">已下架</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="simple-form-field">
                <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5">
            </div>
        </form>
    </div>
    <div class="common-title">
        <div class="ftitle">
            <h3>属性列表</h3>
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
                    <input type="checkbox" class="table-list-checkbox-all" title="全选/全不选">
                </th>
                <th class="text-c w100" >编号</th>
                <th class=" w200">商品名称</th>
                <th class=" w150">SKU</th>
                <th class=" w100">库存</th>
                <th class=" w150">价格（元）</th>
                <th class=" w100">状态</th>
                <th class=" w100">推荐</th>
                <th class=" w150">发布时间<span class="sort"></span></th>
                <th class="text-c w100">排序</th>
                <th class="handle w400">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tcheck">
                    <input type="checkbox" class="checkBox table-list-checkbox" value="420">
                </td>
                <td class="text-c">420</td>
                <td>
                    <div class="goodsPicBox pull-left m-r-10">
                        <a href="##" target="_blank">
                            <!-- 图片缩略图 -->
                            <img src="../images/pic01.png" class="goods-thumb" width="44">
                            <!-- 虚拟商品 -->
                        </a>
                    </div>
                    <div class="ng-binding goods-message w200">
                        <div class="name">
                            <a href="##" target="_blank" data-toggle="tooltip" data-placement="auto bottom"  data-original-title="的软件行业同仁">的软件行业同仁</a>
                        </div>
                    </div>
                </td>
                <td>
                    BJB201425452
                </td>
                <td>
                    100
                </td>
                <td>3900
                    <font style=" color:#F93">优惠:375</font>
                </td>
                <td>
                    上架
                </td>
                <td>
                    热销:<font style="color:#06C; margin-left:6px;">是</font>
                </td>

                <td>
                    2016-10-10
                </td>
                <td class="text-c">
                    <input type="text" class="form-control small" value="420">
                </td>
                <td class="handle">
                    <a href="javascript:void(0);" class="d_er" >生成二维码</a>
                    <span>|</span>
                    <a href="javascript:void(0);" target="_blank">查看</a>
                    <span>|</span>
                    <a href="##" target="_blank">编辑</a>
                    <span>|</span>
                    <a href="javascript:void(0);" class="offsale-goods del xiajia">下架</a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="text-c w10">
                    <input type="checkbox" class="table-list-checkbox-all" title="全选/全不选">
                </td>
                <td colspan="4">
                    <div class="pull-left">
                        <input type="button" class="btn btn-primary m-r-2 batch-offsale-goods" value="批量修改">
                        <!--当没有选中任何所操作的项，按钮为禁用状态，将按钮样式btn-danger替换为isabled-->

                        <input type="button" class="btn btn-danger m-r-2 batch-offsale-goods" value="下架">
                        <!--当没有选中任何所操作的项，按钮为禁用状态，将按钮样式btn-danger替换为disabled-->

                    </div>
                <td colspan="6">
                    <div class="pull-right page-box page-box02">
                        <div id="pagination"  class=" pull-right">

                            <div class="pagination-info">
                                共7条记录，每页显示：
                                <select class="select m-r-5" data-page-size="10">

                                    <option value="1">1</option>

                                    <option value="10" selected="selected">10</option>

                                    <option value="20">20</option>

                                    <option value="30">30</option>

                                    <option value="50">50</option>

                                </select>
                                条
                            </div>

                            <ul class="pagination">
                                <li class="disabled" style="display: none;">
                                    <a class="fa fa-angle-double-left" data-go-page="1" title="第一页"></a>
                                </li>

                                <li class="disabled">
                                    <a class="iconfont" title="上一页">&#xe70a;</a>
                                </li>

                                <li class="active">
                                    <a data-cur-page="1">1</a>
                                </li>

                                <li class="disabled">
                                    <a class="iconfont" title="下一页">&#xe709;</a>
                                </li>

                                <li class="disabled" style="display: none;">
                                    <a class="fa fa-angle-double-right" data-go-page="1" title="最后一页"></a>
                                </li>
                            </ul>

                            <div class="pagination-goto">
                                <input class="ipt form-control goto-input" type="text">
                                <button class="btn btn-default goto-button" title="点击跳转到指定页面">GO</button>
                                <a class="goto-link" data-go-page="" style="display: none;"></a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop
@section('footer_js')
    <script type="text/javascript" src="/js/admin/common.js?v={{Config::get('tools.adminJsTime')}}"></script>
    <script type="text/javascript" src="/js/admin/jquery.chosen.js?v={{Config::get('tools.adminJsTime')}}"></script>
@stop