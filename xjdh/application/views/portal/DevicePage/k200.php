<div class='rt-data' data_type='k200'
     data_id='<?php echo $dataObj->data_id;?>'
     model = '<?php echo $dataObj->model;?>'>
</div>
<div class='row-fluid'>
    <div class="span6">
        <h4>性能指标</h4>
        <?php if($_SESSION['XJTELEDH_USERROLE'] == 'admin'){?>
            <p>
                <a
                        href='<?php echo site_url('portal/dynamicSetting/'.$dataObj->data_id);?>'
                        target="_blank" class="btn btn-info">动态设置</a>
            </p>
        <?php }?>
    </div>
    <table
            class="table table-bordered responsive table-striped table-sortable"
            id='tb-<?php echo $dataObj->data_id;?>-dc'>
        <thead>
        <tr>
            <th>序号</th>
            <th>变量名</th>
            <th>当前值</th>
            <th>告警级别</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="row-fluid ">
    <table
            class="table table-bordered table-striped responsive table-sortable">
        <thead>
        <tr>
            <th>序号</th>
            <th>信号量</th>
            <th>当前值</th>
        </tr>
        </thead>

        <tbody>

        <tr>
            <td>状态信号</td>
            <td>开关机状态set_switch</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-set_switch'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature1"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>

        <tr>
            <td>状态信号</td>
            <td>设定温度set_temp</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-set_temp'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature1"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>

        <tr>
            <td>状态信号</td>
            <td>设定湿度set_humid</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-set_humid'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature1"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>





        <tr>
            <td>1</td>
            <td>加湿humidify</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-1'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature1"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>除湿dehumidfy</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-2'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature2"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>3</td>
            <td>制热heating</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-3'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature3"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>4</td>
            <td>制冷cooling</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-4'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature4"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>5</td>
            <td>风机fan</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-5'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="temperature5"
                        class="btn btn-info changeSetting">修改设置</button></td>
        </tr>
        <tr>
            <td>6</td>
            <td>压缩机低压low_pressure_compressor</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-6'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="humid1"
                        class="btn btn-important changeSetting">修改设置</button></td>
        </tr>
        <tr>
            <td>7</td>
            <td>压缩机高压high_pressure_compressor</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-7'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="humid2"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>8</td>
            <td>气流丢失air_flow_loss</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-8'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="humid3"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>9</td>
            <td>风机过载fan_overload</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-9'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="humid4"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>10</td>
            <td>加热器过载heater_overload</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-10'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>' field="humid5"
                        class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>11</td>
            <td>空气过滤网airstrainer</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-11'><span></span></td>
        </tr>
        <tr>
            <td>12</td>
            <td>高温告警high_temp_alert</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-12'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>'
                        field="outside_temperature" class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>13</td>
            <td>低温告警low_temp_alert</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-13'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>'
                        field="outside_humidity" class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>

        <tr>
            <td>14</td>
            <td>低温告警low_temp_alert</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-14'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>'
                        field="average_temperature" class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>15</td>
            <td>高湿告警high_humid_alert</td>
            <td class="hasThreshold"
                id='k200-<?php echo $dataObj->data_id;?>-15'><span></span>&nbsp;
                <button style="display: none;"
                        data_id='<?php echo $dataObj->data_id;?>'
                        field="average_humid" class="btn btn-warning setThreshold">设置阈值</button></td>
        </tr>
        <tr>
            <td>16</td>
            <td>低湿告警low_humid_alert</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-16'>
            </td>
        </tr>
        <tr>
            <td>17</td>
            <td>回风温度探头故障air_temp_probe_alert</td>
            <td  id='k200-<?php echo $dataObj->data_id;?>-17'>
            </td>
        </tr>
        <tr>
            <td>18</td>
            <td>送风温度探头故障wind_temp_probe_alert</td>
            <td  id='k200-<?php echo $dataObj->data_id;?>-18'>
            </td>
        </tr>
        <tr>
            <td>19</td>
            <td>回风湿度探头告警air_humid_probe_alert</td>
            <td  id='k200-<?php echo $dataObj->data_id;?>-19'>
            </td>
        </tr>
        <tr>
            <td>20</td>
            <td>室外温度探头告警out_temp_probe_alert</td>
            <td  id='k200-<?php echo $dataObj->data_id;?>-20'>
            </td>
        </tr>
        <tr>
            <td>21</td>
            <td>加湿器电流过大high_hunidifier_current</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-21'></td>
        </tr>




        <tr>
            <td>22</td>
            <td>加湿器缺水humidifier_water_shortage</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-22'></td>
        </tr>

        <tr>
            <td>23</td>
            <td>无加湿电流no_humid_current</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-23'></td>
        </tr>

        <tr>
            <td>24</td>
            <td>溢流告警overflow_alert</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-24'></td>
        </tr>

        <tr>
            <td>25</td>
            <td>用户告警user_alert</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-25'></td>
        </tr>

        <tr>
            <td>26</td>
            <td>烟雾告警smoke_alert</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-26'></td>
        </tr>

        <tr>
            <td>27</td>
            <td>压缩机2高压high_pressure_compressor2</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-27'></td>
        </tr>

        <tr>
            <td>28</td>
            <td>压缩机2低压low_pressure_compressor2</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-28'></td>
        </tr>

        <tr>
            <td>29</td>
            <td>水流开关告警water_switch_alert</td>
            <td id='k200-<?php echo $dataObj->data_id;?>-29'></td>
        </tr>



        </tbody>
    </table>

</div>