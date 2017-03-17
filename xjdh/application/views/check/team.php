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
                                    <?php foreach (json_decode($team->photo) as $photo){?>
                                        <img src="" alt="">
                                        <img src="/public/portal/Check_image/<?php echo $photo ?>"
                                             alt="" style="height: 150px;"/>
                                    <?php }?>
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

