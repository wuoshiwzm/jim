<?php //t::f($dataObj)  ?><p>最后更新时间:<span id="<?php echo $dataObj->data_id; ?>-update_datetime"></span>
<table
        class="table table-bordered responsive table-striped table-sortable rt-data"
        data_id='<?php echo $dataObj->data_id; ?>'
        data_type="<?php echo $dataObj->model; ?>"
        id='table-<?php echo $dataObj->data_id; ?>'>
    <thead>
    <tr>
        <th>序号</th>
        <th>信号名称</th>
        <th>当前值</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $signalArray = array("out_v显示", "channel_count通道数", "update_time更新时间");
    foreach ($signalArray as $key => $val) {
        ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $val; ?></td>
            <td id='cuc21vb-<?php echo $dataObj->data_id . '-field' . $key; ?>'></td>
        </tr>
    <?php } ?>
    </tbody>

</table>

<h4>通道数据</h4>
<table
        class="table table-bordered responsive table-striped table-sortable"
        id='<?php echo $dataObj->data_id; ?>-sps-rc-2'>
    <thead>
    <tr>
        <th>序号</th>
        <th>status状态量</th>
        <th>开机/关机状态 00H：开机，01H：关机</th>
        <th>限流/不限流状态 00H：限流，01H：不限流</th>
        <th>浮充/均充/测试状态 00H：浮充，01H：均充，02H：测试</th>
        <th>alert告警量</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<h4>整流输入各路告警状态</h4>
<table
        class="table table-bordered responsive table-striped table-sortable"
        id='<?php echo $dataObj->data_id; ?>-sps-rc-3'>
    <thead>
    <tr>
        <th>序号</th>
        <th>整流模块故障</th>
        <th>输出电压过高</th>
        <th>输出电压过低</th>
        <th>模块地址为0</th>
        <th>输入开关未合</th>
        <th>内部高压直流回路故障</th>
        <th>电压回路控制放大器超出正常工作范围</th>
        <th>内部温度高</th>
        <th>内部控制回路调节电压故障</th>
        <th>输出限流</th>
        <th>风扇故障</th>
        <th>输出欠流</th>
        <th>输入开关跳闸</th>
        <th>手动关机</th>
        <th>遥控关机</th>
        <th>参考电压超出范围</th>
        <th>通信故障</th>
        <th>高压关机</th>
        <th>交流故障</th>
        <th>功率限制</th>
        <th>均衡充电</th>
        <th>故障并关机</th>
        <th>告警未关机</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>