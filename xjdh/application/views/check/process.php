<script type="text/javascript">
    //    var chartData = new Object();
    //    chartData.title = '<?php //echo '施工验收进度图';?>//';
    //    chartData.categories = new Array();
    //    chartData.values = new Object();
    //    chartData.values.level1 = new Array();
    //
    //    var alarmList = eval('<?php //echo json_encode($alarmList);?>//');
    //    for(var i = 0 ; i < alarmList.length ; i++)
    //    {
    //        var alarmObj = alarmList[i];
    //        chartData.categories[i] = alarmObj.name;
    //        chartData.values.level1[i] = parseInt(alarmObj.level1);
    //
    //    }


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
                <?php echo $check['uncheck'] . ',';?>
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
//            {
//            chart: {
//                type: 'column'
//            },
//            credits: false,
//            title: {
//                text: '新疆电信动环'+chartData.title+'统计图'
//            },
//            xAxis: {
//                categories: chartData.categories,
//                crosshair: true
//            },
//            yAxis: {
//                min: 0,
//                title: {
//                    text: '告警数量'
//                },
//                stackLabels: {
//                    enabled: true,
//                    style: {
//                        fontWeight: 'bold',
//                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
//                    }
//                }
//            },
//            legend: {
//                align: 'right',
//                x: -70,
//                verticalAlign: 'top',
//                y: 20,
//                floating: true,
//                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
//                borderColor: '#CCC',
//                borderWidth: 1,
//                shadow: false
//            },
//            tooltip: {
//                formatter: function() {
//                    return '<b>'+ this.x +'</b><br>'+
//                        this.series.name +': '+ this.y +' 个<br>'+
//                        '总共: '+ this.point.stackTotal + ' 个';
//                }
//            },
//            plotOptions: {
//                column: {
//                    stacking: 'normal',
//                    dataLabels: {
//                        enabled: true,
//                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
//                    }
//                }
//            },
//            series: [{
//                name: '一级告警',
//                data: chartData.values.level1,
//                color: 'red'
//            }, {
//                name: '二级告警',
//                data: chartData.values.level2,
//                color: 'orange'
//            }, {
//                name: '三级告警',
//                data: chartData.values.level3,
//                color: 'yellow'
//            }, {
//                name: '四级告警',
//                data: chartData.values.level4,
//                color: 'blue'
//            }]
//        }
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


    </div>
</div>