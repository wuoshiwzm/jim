<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">预算管理</h3>
                    <ul class="breadcrumb">
                        <li><a class="icon-home" href="/"></a> <span class="divider"><i
                                    class="icon-angle-right"></i></span></li>
                        <?php foreach ($bcList as $bcObj) { ?>
                            <?php if ($bcObj->isLast) { ?>
                                <li class="active">
                                    <?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href='<?php echo htmlentities($bcObj->url, ENT_COMPAT, "UTF-8"); ?>'>
                                        <?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?>
                                    </a>
                                    <span class="divider"><i class="icon-angle-right"></i></span>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>


            <!--安排督导验收局站-->
            <form class="form-horizontal" onsubmit="return checkForm()">


                <div class="row-fluid">
                    <div class="span12">
                        <div class="content-widgets light-gray">
                            <div class="widget-head bondi-blue">
                                <h3>请输入对应时间点的预算值 （单位：度）</h3>
                            </div>
                            <div class="widget-container">
                                <table
                                    class="table table-bordered responsive table-striped table-sortable">
                                    <thead>
                                    <tr>
                                        <th  >0：00</th>
                                        <th >3：00</th>
                                        <th>6：00</th>
                                        <th>9：00</th>
                                        <th>12：00</th>
                                        <th>15：00</th>
                                        <th>18：00</th>
                                        <th>21：00</th>
                                        <th>23：59</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>
                                            <td><input type="text"  style="width:90px" ></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                    <button class="btn btn-success confirmArrange" type="submit" style="margin-left: 100px;">确认</button>


            </form>


        <br>
        <hr>

        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>预算详情</h3>
                    </div>
                    <div class="widget-container">
                        <table
                            class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>分公司</th>
                                <th>区域</th>
                                <th>吉姆督查</th>
                                <th>局站</th>
                                <th>吉姆督导</th>
                                <th>分配时间</th>
                                <th>验收时间</th>
                                <th>电信督查</th>
                                <th>验收状态</th>
                                <th>审核状态</th>
                                <th>操作</th>
                                <!--<th>设备验证状态</th>-->
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
</div>

