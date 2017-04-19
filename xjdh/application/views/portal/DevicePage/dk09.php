<p>最后更新时间:<span id="<?php echo $dataObj->data_id; ?>-update_datetime"></span>
<table
        class="table table-bordered responsive table-striped table-sortable rt-data"
        data_id='<?php echo $dataObj->data_id;?>'
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
    $signalArray = array("ACChannelNum交流输入路数", "MainSupplyAC_a主供交流电源相电压 a", "MainSupplyAC_b主供交流电源相电压 b",
        "MainSupplyAC_c主供交流电源相电压 c", "MainSupplyACFreq主供交流输入频率", "ThreeACInput_a三相交流输入电流 a",
        "ThreeACInput_b三相交流输入电流 b", "ThreeACInput_c三相交流输入电流 c", "BackUpBatteryVoltage_a备用交流电源相电压a",
        "BackUpBatteryVoltage_b备用交流电源相电压", "BackUpBatteryVoltage_c备用交流电源相电压c", "BackUpBatteryVoltage_Free备用交流输入频率",
        "RectificationNum", "ModuleState(模块状态,参考前面定义的宏)", "ModuleOutputVoltage模块输出电压*100", "ModuleOutputCurrent模块输出电流*100",
        "ModuleTempature内部温度", "BatteryNum电池组数", "Battery_1_Voltage电池1电压", "Battery_1_Current电池1电流", "Battery_1_Capacity电池1容量",
        "Battery_1_temperature电池1温度", "System_voltage系统电压2", "Environment_tamperature环境温度2", "PayLoad负载",
        "Battery_2_Voltage电池2电压", "Battery_2_Current电池2电流", "Battery_2_Capacity电池2容量", "battery_2_temperature电池2温度",
        "status状态","SeriousAlarm严重报警","Generalalarm一般报警","update_time"

    );


    foreach ($signalArray as $key => $val) {
        ?>
        <tr id='device-<?php echo $dataObj->data_id;?>' >
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $val; ?></td>
            <td id='dk09-<?php echo $dataObj->data_id . '-field' . $key; ?>'></td>
        </tr>
    <?php } ?>
    </tbody>

</table>

<h4>整流输入各路状态</h4>
<table
        class="table table-bordered responsive table-striped table-sortable"
        id='<?php echo $dataObj->data_id; ?>-sps-rc-2'>
    <thead>
    <tr>
        <th>序号</th>
        <th>整流模块输出电流</th>
        <th>浮充电压(V)</th>
        <th>均衡电压(V)</th>
        <th>电压高告警(V)</th>
        <th>电压低告警(V)</th>
        <th>高压关机阈值电压(V)</th>
        <th>限流值(A)</th>
        <th>均流调节值</th>
        <th>保密功能开启</th>
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