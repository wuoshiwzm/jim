<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">告警信号管理</h3>
                    <ul class="breadcrumb">
                        <li><a class="icon-home" href="/"></a> <span class="divider"><i
                                        class="icon-angle-right"></i></span></li>
                        <?php foreach ($bcList as $bcObj) { ?>
                            <?php if ($bcObj->isLast) { ?>
                                <li class="active"><?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?></li>
                            <?php } else { ?>
                                <li><a href='<?php echo htmlentities($bcObj->url, ENT_COMPAT, "UTF-8"); ?>'>
                                        <?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?>
                                    </a>
                                    <span class="divider"><i class="icon-angle-right"></i></span></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <hr>

        <!--搜索-->

        <!--添加-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>添加信号名称映射</h3>
                    </div>
                    <div class="widget-container">
                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th width="40%"></th>
                                <th width="60%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>选择设备类型</td>
                                <td>
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='model_add' id='model_add'>
                                        <option value=''>选择设备类型</option>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>选择逻辑分类</td>
                                <td>
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='logic_type' id='logic_type'>
                                        <option value=''>选择逻辑分类</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>信号标准名</td>
                                <td><input type="text" name="signal_standard_name" placeholder="信号标准名" class="span3">
                                </td>
                            </tr>

                            <tr>
                                <td>信号类型</td>
                                <td>
                                    <select class="chzn-select" data-placeholder="信号类型"
                                            name='signal_type' id='signal_type'>
                                        <option value=''>选择信号类型</option>
                                        <option value='1'>遥信</option>
                                        <option value='2'>遥测</option>
                                        <option value='3'>遥调</option>
                                        <option value='4'>遥控</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>单位</td>
                                <td><input type="text" name="signal_unit" placeholder="单位" class="span3"></td>
                            </tr>

                            <tr>
                                <td>告警信息</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>告警时</td>
                                            <td>
                                                <select class="chzn-select" data-placeholder="选择设备类型"
                                                        name='signal_type_alert' id='signal_type_alert'>
                                                    <option value=''>选择信号类型</option>
                                                    <option value='1'>超低</option>
                                                    <option value='2'>超高</option>
                                                    <option value='3'>告警时</option>
                                                    <option value='4'>过大</option>
                                                    <option value='5'>过低</option>
                                                    <option value='6'>过高</option>
                                                    <option value='7'>开</option>
                                                    <option value='8'>缺两相</option>
                                                    <option value='9'>缺一相</option>
                                                    <option value='10'>停电</option>
                                                    <option value='11'>有告警</option>
                                                    <option value='12'>(空白)</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>正常时</td>
                                            <td>
                                                <select class="chzn-select" data-placeholder="选择设备类型"
                                                        name='signal_type_normal' id='signal_type_normal'>
                                                    <option value=''>选择信号类型</option>
                                                    <option value='1'>正常</option>
                                                    <option value='2'>-</option>
                                                    <option value='3'>（空白）</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td>信号说明</td>
                                <td>
                                    <textarea type="text" name="signal_desc" placeholder="信号说明"
                                              class="span6"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>信号解释</td>
                                <td>
                                    <textarea type="text" name="signal_exp" placeholder="信号解释" class="span6"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>备注</td>
                                <td>
                                    <textarea type="text" name="signal_exp" placeholder="备注" class="span6"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <hr>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td>机房类型</td>
                                <td>
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='room_type' id='room_type'>
                                        <option value=''>选择机房类型</option>
                                        <option value=1>A类机房</option>
                                        <option value=2>B类机房</option>
                                        <option value=3>C类机房</option>
                                        <option value=4>D类机房</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>告警级别</td>
                                <td><input type="text" name="alert_name" placeholder="告警级别" class="span3"></td>
                            </tr>

                            <tr>
                                <td>告警门限</td>
                                <td><input type="text" name="alert_threshold" placeholder="告警门限" class="span3"></td>
                            </tr>

                            <tr>
                                <td>告警延时（秒）</td>
                                <td><input type="text" name="alert_seconds" placeholder="告警延时（秒）" class="span3"></td>
                            </tr>

                            <tr>
                                <td>存储周期(秒)</td>
                                <td><input type="text" name="alert_store_seconds" placeholder="存储周期(秒)" class="span3">
                                </td>
                            </tr>

                            <tr>
                                <td>绝对阀值</td>
                                <td><input type="text" name="alert_threshold_abs" placeholder="绝对阀值" class="span3"></td>
                            </tr>

                            <tr>
                                <td>百分比阀值</td>
                                <td><input type="text" name="alert_threshold_percent" placeholder="百分比阀值" class="span3">%
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-success add_signal" value="添加信号"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--管理-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>管理信号名称</h3>
                    </div>
                    <div class="widget-container">

                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th width="30%">id</th>
                                <th width="30%">设备信号</th>
                                <th width="30%">对应标准信号</th>
                                <th width="10%">操作</th>
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

