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

        <!--选择对应的设备类型-->

        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>配置告警收敛规则</h3>
                    </div>
                    <div class="widget-container">
                        <form class="form-horizontal" method="post">
                            <!--                        <form class="form-horizontal" onsubmit="return checkForm()">-->
                            <div class="control-group">
                                <label class="control-label" style="float: left;">选择设备告警信号</label>
                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='jimSignal' id='jimSignal'>
                                        <option value=''>选择设备告警信号</option>
                                        <?php foreach ($signalsJim as $signal) { ?>
                                            <option value='<?php echo $signal->id; ?>'>
                                                <?php
                                                $type = '';
                                                switch ($signal->type) {
                                                    case 1:
                                                        $type = '机房环境';
                                                        break;

                                                    case 2:
                                                        $type = '蓄电池组';
                                                        break;

                                                    case 3:
                                                        $type = '开关电源';
                                                        break;
                                                }
                                                ?>
                                                <?php echo $signal->signal . '-' . $signal->alert_signal; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="control-label" style="float: left;">选择对应标准信号</label>
                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='telSignal' id='tel_Signal'>
                                        <option value=''>选择对应标准信号</option>
                                        <?php foreach ($signalsTel as $signal) { ?>
                                            <option value='<?php echo $signal->id; ?>'>
                                                <?php echo $signal->device_type . '-' . $signal->signal_standard_name . '-' .
                                                    $signal->signal_type . '-' . $signal->alertinfo_alert; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <button class="btn btn-success" type="submit" style="margin-left: 100px;">确认</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!--管理-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>管理收敛规则</h3>
                    </div>
                    <div class="widget-container">

                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th width="10%">id</th>
                                <th width="30%">设备告警信号</th>
                                <th width="30%">对应标准信号</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($signalsConf as $signal) { ?>
                                <tr>
                                    <td class="signal_id"><?php echo $signal->id ?></td>
                                    <td>
                                        <?php $info = $this->mp_extra->getJimAlert($signal->id);
                                        echo $info->type . '-' . $info->signal . '-' . $info->alert_signal;
                                        ?>
                                    </td>
                                    <td>
                                        <?php $telInfo = $this->mp_extra->getTelSignalStandard($signal->signal_tel_id);
                                        echo $telInfo->device_type . '-' . $telInfo->signal_standard_name . '-' .
                                            $telInfo->signal_type . '-' . $telInfo->alertinfo_alert;
                                        ?>
                                    </td>
                                    <td>
                                        <input type="submit" class="delete_signal_convergence" value="删除映射关系">
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

