<p>最后更新时间:<span id="<?php echo $dataObj->data_id; ?>-update_datetime"></span>


<table
    class="table table-bordered responsive table-striped table-sortable rt-data"
    data_id='<?php echo $dataObj->data_id;?>'
    data_type="<?php echo $dataObj->model; ?>"
    id='realtimeData'>
<!--    id='table---><?php //echo $dataObj->data_id; ?><!--'-->

    <?php echo $model; ?>
    <thead>
    <tr>
        <th>序号</th>
        <th>信号名称</th>
        <th>当前值</th>
    </tr>
    </thead>
    <tbody>

<!--    insert data here for normal signals,not circulate data-->
    </tbody>

</table>

<!--循环体 -->
<h4>通道数据</h4>
<table
    class="table table-bordered responsive table-striped table-sortable"
    id='<?php echo $dataObj->data_id; ?>-sps-rc-2'>
    <thead>
    <tr>
        <th>序号</th>
        <th>ModuleState模块状态,参考前面定义的宏</th>
        <th>ModuleOutputVoltage模块输出电压*100</th>
        <th>ModuleOutputCurrent模块输出电流*100</th>
        <th>ModuleTempature内部温度</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>


