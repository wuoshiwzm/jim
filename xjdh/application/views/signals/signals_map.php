<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">设备信号管理</h3>
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

        <!--先择对应的设备类型-->
        <form class="form-horizontal" onsubmit="return checkForm()">
            <div class="control-group">
                <label class="control-label" style="float: left;">选择设备类型</label>
                <div class="controls" style="margin-left: 20px; float: left;">
                    <select class="chzn-select" data-placeholder="选择设备类型"
                            name='model' id='model'>
                        <option value=''>选择设备类型</option>
                        <?php foreach (Defines::$gDevModel as $key => $val) { ?>
                            <option
                                    value='<?php echo $key; ?>'><?php echo $val; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-success" type="submit" style="margin-left: 100px;">确认</button>
            </div>
        </form>

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
                                <th width="30%">设备类型</th>
                                <th width="30%">设备信号名称</th>
                                <th width="30%">对应标准信号称</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select class="chzn-select" data-placeholder="选择设备类型"
                                            name='model_add' id='model_add'>
                                        <option value=''>选择设备类型</option>
                                        <?php foreach (Defines::$gDevModel as $key => $val) { ?>
                                            <option value='<?php echo $key; ?>'><?php echo $val; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><input type="text" class="input desc jim_name"></td>
                                <td>
                                    <select class="chzn-select add_tel_name_id" data-placeholder="选择标准信号名"
                                            name='add_tel_name_id' id=''>
                                        <option value=''>
                                            选择标准信号名
                                        </option>
                                        <?php foreach ($standard_signals as $v) { ?>
                                            <option value='<?php echo $v->id; ?>'><?php echo $v->name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <input type="hidden" class="input desc type" value=1>

                                <td><input type="submit"
                                           class="btn btn-success add_signal" value="添加信号"/></td>
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
                            <?php foreach ($signals as $s) { ?>
                                <tr>
                                    <td>
                                        <input type="text" readonly="readonly" class="id" value="<?php echo $s->id ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="input jim_name" value="<?php echo $s->jim_name ?>">
                                    </td>
                                    <td>
                                        <select class="chzn-select tel_name_id" data-placeholder="选择标准信号名"
                                                name='model_add' id=''>
                                            <option value=''>
                                                <?php if(empty($s->tel_name_id)){?>
                                                    选择标准信号名
                                                <?php }else{
                                                    echo $this->mp_extra->GetStandardSignalName($s->tel_name_id);
                                                } ?>
                                            </option>
                                            <?php foreach ($standard_signals as $v) { ?>
                                                <option value='<?php echo $v->id; ?>'><?php echo $v->name; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" class="update_signal" value="更改">
                                        <input type="submit" class="delete_signal" value="删除">
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

