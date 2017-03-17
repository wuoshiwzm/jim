<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/17
 * Time: 10:36
 */?>

@section('content')
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>
                        <span class="action">优惠券</span>
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
                            <span>有效期：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" class="form-control w100"> 至 <input type="text" class="form-control w100">
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>状 态：</span>
                        </label>
                        <div class="form-control-wrap">
                            <select id="##" class="form-control" >
                                <option value="">全部</option>
                                <option value="1">正常</option>
                                <option value="0">作废</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="simple-form-field">
                    <div class="form-group">
                        <label class="control-label">
                            <span>规则名称：</span>
                        </label>

                        <div class="form-control-wrap">
                            <input type="text" id="searchmodel-keyword" class="form-control" name="keyword">
                        </div>

                    </div>
                </div>


                <div class="simple-form-field">
                    <input type="button" id="btn_search" value="查询" class="btn btn-primary m-r-5">
                    <input type="button" id="btn_search" value="新增规则" class="btn btn-primary m-r-5" onclick="location='/admin/salerule/addcoupons'">
                </div>

            </form>
        </div>

        <div class="common-title">
            <div class="ftitle">
                <h3>满减满送列表</h3>

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
            @include('admin.marketing.coupons.list',array('list'=>'111'))
        </div>

    </div>
@stop
