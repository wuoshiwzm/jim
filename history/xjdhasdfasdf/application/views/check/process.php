<script type="text/javascript">
    var title = {
        text: '局站验收进度'
    };

    var xAxis = {
        categories: [
            <?php foreach ($checks as $check){?>
            <?php echo "'" . $check['date'] . "'" . ',';?>
            <?php }?>
        ]
    };
    var yAxis = {
        title: {
            text: '局站数'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    };

    var tooltip = {
        valueSuffix: '个'
    }

    var legend = {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    };

    var series = [
        {
            name: '已安排',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['total'] . ',';?>
                <?php }?>
            ]
        },

        {
            name: '待验收',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['unapply'] . ',';?>
                <?php }?>
            ]
        },
        {
            name: '已验收',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['is_apply'] . ',';?>
                <?php }?>
            ]
        },
        {
            name: '待审核',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['uncheck'] . ',';?>
                <?php }?>
            ]
        },
        {
            name: '吉姆已审核',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['check_jim'] . ',';?>
                <?php }?>
            ]
        },
        {
            name: '电信已审核',
            data: [
                <?php foreach ($checks as $check){?>
                <?php echo $check['check_tel'] . ',';?>
                <?php }?>
            ]
        }
    ];

    var json = {};

    json.title = title;

    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.tooltip = tooltip;
    json.legend = legend;
    json.series = series;

    $(document).ready(function () {


        $('#chart-area').highcharts(
            json
        );
    });

</script>

<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">管理面板</h3>
                    <ul class="breadcrumb">
                        <li><a class="icon-home" href="/"></a> <span class="divider"><i
                                        class="icon-angle-right"></i></span></li>
                        <?php foreach ($bcList as $bcObj) { ?>
                            <?php if ($bcObj->isLast) { ?>
                                <li class="active"><?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?></li>
                            <?php } else { ?>
                                <li>
                                    <a href='<?php echo htmlentities($bcObj->url, ENT_COMPAT, "UTF-8"); ?>'><?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?></a>
                                    <span class="divider"><i class="icon-angle-right"></i></span></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--        查询-->
        <div class="row-fluid ">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>
                            <i class="icon-search"></i> 查询
                        </h3>
                        <a class="widget-settings" href="#search-area" id='serarch-toggle'><i
                                    class="icon-hand-up"></i></a>
                    </div>
                    <div class="widget-container"
                         id='search-area'>
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <div class="control-group">
                                    <label class="control-label" style="float: left;">选择数据对应时间段：开始时间 - 终止时间</label>
                                    <div class="controls" style="margin-left: 20px; float: left;">
                                        <input type="text" class='form-control date-range-picker'
                                               name="dateRange" id="dateRange"
                                               value="<?php if (isset($timeSearch)) echo htmlentities($timeSearch, ENT_COMPAT, "UTF-8"); ?>">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button class="btn btn-success" name="action" type="submit" value="search"
                                            id='btn-submit'>提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        统计图-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets">
                    <div class="widget-head bondi-blue">
                        <h3>统计图</h3>
                    </div>
                    <div class="widget-container">
                        <div id="chart-area"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--        统计表-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>局站进度信息</h3>
                    </div>
                    <div class="widget-container">
                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th>城市</th>
                                <th>已安排验收局站(个)</th>
                                <th>待验收局站(个)</th>
                                <th>待审核局站(个)</th>
                                <th>已验收局站(个)</th>
                                <th>吉姆已审核局站(个)</th>
                                <th>电信已审核局站(个)</th>
                                <!--<th>设备验证状态</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cities as $check) { ?>
                                <tr>
                                    <td>
                                        <?php echo $check['cityname']; ?>
                                    </td>

                                    <td>
                                        <?php echo $check['total']; ?>
                                    </td>
                                    <td>
                                        <?php echo $check['unapply']; ?>
                                    </td>
                                    <td>
                                        <?php echo $check['uncheck']; ?>
                                    </td>
                                    <td>
                                        <?php echo $check['is_apply']; ?>
                                    </td>

                                    <td>
                                        <?php echo $check['check_jim']; ?>
                                    </td>
                                    <td>
                                        <?php echo $check['check_tel']; ?>
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