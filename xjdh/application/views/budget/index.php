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


        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>
                            <i class="icon-search"></i> 综合查询
                        </h3>
                        <a class="widget-settings" href="#search-area" id='serarch-toggle'><i
                                    class="icon-hand-up"></i></a>
                    </div>

                </div>
            </div>
        </div>


        <!--安排督导验收局站-->
        <form class="form-horizontal" method="post">
            <div class="row-fluid">

                <div class="content-widgets light-gray">

                    <div class="widget-container">
                        <h3>请输入对应时间点的预算值 （单位：千瓦/时）</h3>
                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th>3：00</th>
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
                                <td><input type="text" name="time3" style="width:90px"></td>
                                <td><input type="text" name="time6" style="width:90px"></td>
                                <td><input type="text" name="time9" style="width:90px"></td>
                                <td><input type="text" name="time12" style="width:90px"></td>
                                <td><input type="text" name="time15" style="width:90px"></td>
                                <td><input type="text" name="time18" style="width:90px"></td>
                                <td><input type="text" name="time21" style="width:90px"></td>
                                <td><input type="text" name="time24" style="width:90px"></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="widget-container"
                         id='search-area'>
                        <h3>请输入对应的地理位置信息</h3>
                        <div class="control-group">
                            <label class="control-label" style="float: left;">所属部门/分公司</label>
                            <div class="controls" style="margin-left: 20px; float: left;">
                                <select class="chzn-select" data-placeholder="选择分公司"
                                        name='selCity' id='selCity'>
                                    <?php if ($userObj->user_role == "admin") { ?>
                                        <option value=''>全网</option>
                                        <?php foreach (Defines::$gCity as $cityKey => $cityVal) { ?>
                                            <option value='<?php echo $cityKey; ?>'
                                                <?php if ($cityCode == $cityKey) { ?> selected="selected"
                                                <?php } ?>><?php echo $cityVal; ?>本地网
                                            </option>
                                        <?php } ?>
                                    <?php } else if ($userObj->user_role == "city_admin") { ?>
                                        <option value="<?php echo $userObj->city_code; ?>">
                                            <?php echo Defines::$gCity[$userObj->city_code]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="control-label" style="float: left;">区域</label>
                            <div class="controls" style="margin-left: 20px; float: left;">
                                <select class="chzn-select" data-placeholder="选择区域"
                                        name='selCounty' id='selCounty'>
                                    <?php if ($userObj->user_role == "city_admin") { ?>
                                        <option value="0">所有区域</option>
                                        <?php foreach (Defines::$gCounty[$userObj->city_code] as $key => $val) { ?>
                                            <option value='<?php echo $key; ?>'
                                                    <?php if ($countyCode == $key){ ?>selected="selected"<?php } ?>>
                                                <?php echo $val; ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="0">所有区域</option>
                                        <?php if (count($cityCode)) foreach (Defines::$gCounty[$cityCode] as $key => $val) { ?>
                                            <option value='<?php echo $key; ?>'
                                                <?php if ($countyCode == $key) { ?> selected="selected" <?php } ?>>
                                                <?php echo $val; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" style="float: left;">所属局站</label>
                            <div class="controls" style="margin-left: 20px; float: left;">
                                <select class="chzn-select" data-placeholder="选择局站"
                                        name='selSubstation' id='selSubstation'>
                                    <option value=''>所有局站</option>
                                    <?php if (isset($substationId)) { ?>
                                        <?php foreach ($substationList as $substationObj) { ?>
                                            <option <?php if ($substationObj->id == $substationId) { ?> selected="selected" <?php } ?>
                                                    value="<?php echo htmlentities($substationObj->id, ENT_COMPAT, "UTF-8"); ?>">
                                                <?php if ($substationObj->county_code == $countyCode) echo htmlentities($substationObj->name, ENT_COMPAT, "UTF-8"); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="control-label" style="float: left;">所属机房</label>
                            <div class="controls" style="margin-left: 20px; float: left;">
                                <select class="chzn-select" data-placeholder="选择机房"
                                        name='selRoom' id='selRoom'>
                                    <option value=''>所有机房</option>
                                    <?php if (isset($substationId)) { ?>
                                        <?php foreach ($roomList as $roomListObj) { ?>
                                            <option <?php if ($roomListObj->id == $roomId) { ?> selected="selected" <?php } ?>
                                                    value="<?php echo htmlentities($roomListObj->id, ENT_COMPAT, "UTF-8"); ?>">
                                                <?php if ($roomListObj->substation_id == $substationId) echo htmlentities($roomListObj->name, ENT_COMPAT, "UTF-8"); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                                <label class="control-label" style="float: left;">请填写预算名称</label>
                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <input type="text" class="left-stripe" name="budget_name">
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-large confirmArrange" type="submit" style="margin-left: 100px;">确认生成预算计划</button>


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
                                <th>预算单位</th>
                                <th>预算具体地址</th>
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

