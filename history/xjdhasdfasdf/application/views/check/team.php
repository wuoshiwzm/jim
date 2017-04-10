<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">人员管理</h3>
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

        <div class="row-fluid ">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>
                            <i class="icon-search"></i> 综合查询
                        </h3>
                        <a class="widget-settings" href="#search-area" id='serarch-toggle'><i
                                    class="icon-hand-up"></i></a>
                    </div>
                    <div class="widget-container"
                         id='search-area'>
                        <form class="form-horizontal">
                            <div class="control-group">



                                <div class="control-group">
                                    <label class="control-label" style="float: left;">吉姆督查分配时间：开始时间 - 终止时间</label>
                                    <div class="controls" style="margin-left: 20px; float: left;">
                                        <input type="text" class='form-control date-range-picker'
                                               name="dateRange" id="dateRange"
                                               value="<?php if (isset($dateRange)) echo htmlentities($dateRange, ENT_COMPAT, "UTF-8"); ?>">
                                    </div>
                                </div>

                                <div class="control-group">

                                    <label class="control-label" style="float: left;">选择督导要验收的局站</label>
                                    <div class="controls" style="margin-left: 20px; float: left;">
                                        <select class="chzn-select" name='subSearch' id="subSearch">
                                            <option value="">请选择局站</option>
                                            <?php foreach ($subs as $team) { ?>
                                                <option value='<?php echo $team->substation_id; ?>'>
                                                    <?php echo htmlentities($this->mp_extra->Get_substation_info($team->substation_id)->name, ENT_COMPAT, "UTF-8"); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <button class="btn btn-success" name="action" type="submit" value="search"
                                            id='btn-submit'>提交
                                    </button>
                                    <!--                                <button class="btn btn-success" name="export" value="exporttoexcel" type="submit">导出报表-->
                                    <!--                                </button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>施工队上传图片列表</h3>
                    </div>
                    <div class="widget-container">
                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>督导名</th>
                                <th>局站名</th>
                                <th>提交时间</th>
                                <th width=40%">图片</th>
                                <!--<th>设备验证状态</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($teams as $team) { ?>
                                <tr>
                                    <input type="hidden" class="userID" value="<?php echo $user->id; ?>">
                                    <td>
                                        <?php echo $team->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $this->mp_extra->get_user_fullname($team->leader_id) ?>
                                    </td>
                                    <td>
                                        <?php echo $this->mp_extra->Get_substation_info($team->substation_id)->name ?>
                                    </td>
                                    <td>
                                        <?php echo $team->created_at ?>
                                    </td>
                                    <td>



                                        <ul>
                                            <?php foreach (json_decode($team->photo) as $k=>$photo){?><a
                                                <?php if($k>=3){echo "style='display:none'";}?>
                                                rel="group" class="image"
                                                href="/public/portal/Check_image/<?php echo $photo ?>">
                                                <img src="/public/portal/Check_image/<?php echo $photo ?>"
                                                     alt="" style="height: 150px;"/>
                                                </a>
                                                <img src="" alt="">

                                            <?php }?>
                                        </ul>
                                    </td>
                                    <td>

                                        <?php foreach ($this->mp_extra->get_user_subs($user->id) as $arrange) { ?>
                                            <span class="label label-success dev-lock">
                                            <?php echo $this->mp_extra->Get_substation_info($arrange->substation_id)->name ?>
                                        </span>

                                        <?php } ?>
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

