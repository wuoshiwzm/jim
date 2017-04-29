<div class="tab-pane" id="device-<? echo $dataObj->data_id; ?>">

    <p>最后更新时间:<span id="<?php echo $dataObj->data_id; ?>-update_datetime"></span>
    <table
            class="table table-bordered responsive table-striped table-sortable rt-data"
            data_id='<?php echo $dataObj->data_id; ?>'
            data_type="<?php echo $dataObj->model; ?>"
            id='realtimeData-<?php echo $dataObj->data_id; ?>'>
        <!--    id='table---><?php //echo $dataObj->data_id; ?><!--'-->

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
    <?php foreach ($loops as $loop) { ?>
        <h4>通道数据</h4>
        <table class="table table-bordered responsive table-striped table-sortable rt-data-loops-<?php echo $loop->id ?>">
            <?php echo $loop->id ?>
            <thead>
            <tr>
                <?php
                $contents = json_decode($loop->content);
                foreach ($contents as $content) {
                    ?>
                    <th>
                        <?php echo $content->name ?>
                    </th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    <?php } ?>
</div>