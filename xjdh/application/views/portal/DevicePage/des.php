<p>最后更新时间:<span id="<?php echo $dataObj->data_id; ?>-update_datetime"></span>
<table
        class="table table-bordered responsive table-striped table-sortable"
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
    $signalArray = array(
        //struct 	GeneratingSetStatusInformation
        "BatteryChargerMode电池充电模式", "BatteryChargerActiveCellCount电池充电活跃电池单元数量",
        "BatteryChemistryID电池化学ID","ChargingStages充电状态","ActiveCellCount活跃电池单元数量",

        //struct BasicInstrumentation
        "Fuellevel","Chargealternatorvoltage","Generatorfrequency",
        "Mainsfrequency","MainsvoltagephaselagOrlead","Generatorphaserotation","Mainsphaserotation",
        "Mainscurrentlag_lead","DCVoltage","DCPlantBatteryCurrent","DCTotalCurrent",
        "DCPlantBatteryCycles","DCChargerWatts","DCPlantBatteryWatts","DCTotalWatts",
        "DCChargeMode","DCPlantBatterytemperature","BatteryChargerOutputCurrent",
        "BatteryChargerOutputVoltage","BatteryOpenCircuitVoltage","BatteryChargerAuxiliaryVoltage",
        "BatteryChargerAuxiliaryCurrent",

        //ExtendedInstrumentation
        "Fuelconsumption","Fueltemperature","Oillevel","EngineOperatingState",
        "CurrentOperatingMode","TripAverageFuel","TripAverageFuelEfficiency","InstantaneousFuelEfficiency",

        //
        "update_time"
    );


    foreach ($signalArray as $key => $val) {
        ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $val; ?></td>
            <td id='des-<?php echo $dataObj->data_id . '-field' . $key; ?>'></td>
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