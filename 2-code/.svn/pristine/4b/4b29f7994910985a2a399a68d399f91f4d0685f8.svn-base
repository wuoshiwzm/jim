<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/12/27
 * Time: 12:25
 */?>

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">财务入账-供应商货款结算</span>
                    </h3>
                </div>
            </div>
        </div>

        <!--搜索-->
        <div class="search-term m-b-10"><form  action="##" method="POST">
                <input type="hidden" name="_csrf" value="##">

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>时间：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" class="form-control w100"> 至 <input type="text" class="form-control w100">
                        </div>
                    </div>
                </div>



                <div class="simple-form-field">
                    <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="btn_search" value="导出结果" class="btn btn-primary m-r-5" onclick="location='coupons_add.html'">
                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>供应商货款</h3>

                <h5>
                    (&nbsp;共
                    <span data-total-record="true">309</span>
                    条记录&nbsp;)
                </h5>

            </div>
            <div class="operate">

                <a class="reload" href="javascript:reload();" data-toggle="tooltip" data-placement="auto bottom" title="" data-original-title="刷新数据">
                    <i class="iconfont">&#xe6fb;</i>
                </a>

            </div>
        </div>
        <!--列表内容-->
        <div class="table-responsive">
            <table id="table_list" class="table table-hover">
                <thead>
                <tr>
                    <!--排序样式sort默认，asc升序，desc降序-->
                    <th class="w150" style="cursor: pointer;">商品所在（订单编号）</th>
                    <th class="w150" style="cursor: pointer;">客户名称</th>
                    <th class="w150" style="cursor: pointer;">商品名称</th>
                    <th class="w150" style="cursor: pointer;">产品规格</th>
                    <th class="w150" style="cursor: pointer;">商品价格</th>
                    <th class="w150" style="cursor: pointer;">供货商名称</th>
                    <th class="w150" style="cursor: pointer;">发货时间</th>
                    <th class="w150" style="cursor: pointer;">商品收货状态</th>
                    <th class="w150" style="cursor: pointer;">收货时间<span class="sort desc"></span></th>
                </tr>
                </thead>
                <tbody>
                <!--以下为循环内容-->
                <tr>
                    <td>
                        JLJ20124152
                    </td>
                    <td>
                        张三
                    </td>
                    <td>
                        U盘
                    </td>
                    <td>
                        1000x5555
                    </td>
                    <td>
                        <font class="c-red">45</font>
                    </td>
                    <td>
                        深圳电子厂
                    </td>
                    <td>
                        2016/11/12
                    </td>
                    <td>
                        已收货
                    </td>
                    <td>
                        2016/11/12
                    </td>

                </tr>

                </tbody>


            </table>
            <div class="pull-right page-box">
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


        </div>

    </div>
@stop
