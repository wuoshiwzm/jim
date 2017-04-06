<?php if(isset($isMobile) && $isMobile){?>
<div class='row-fluid'>
	<div class='rt-data' data_type='canatal'
		data_id='<?php echo $dataObj->data_id;?>'
		id='liebert-pex-<?php echo $dataObj->data_id;?>'>
		<h3><?php echo $dataObj->name;?></h3>
		<ul>
			<li><h5>
					设备状态：<span class="status">在线</span>
				</h5></li>
			<li><h5>
					更新时间：<span class="update_datetime" style='font-size: 20px;'><?php echo date('Y-m-d H:i:s');?></span>
				</h5></li>
		</ul>
<?php }else{?>
<div class="row-fluid ">
			<div class="span3">
				<div class="board-widgets orange small-widget">
					<div class="board-widgets-content">
						<span class="n-counter status">在线</span><span class="n-sources">设备状态</span>
					</div>
				</div>
			</div>
			<div class="span3">
				<div class="board-widgets blue small-widget">
					<div class="board-widgets-content">
						<span class="n-counter update_datetime" style='font-size: 20px;'><?php echo date('Y-m-d H:i:s');?></span><span
							class="n-sources">更新时间</span>
					</div>
				</div>
			</div>
		</div>
<?php }?>
<div class='row-fluid'>
			<div class="span6">
				<h4>设备性能指标</h4>
    <?php if($_SESSION['XJTELEDH_USERROLE'] == 'admin'){?>
    <p>
					<a
						href='<?php echo site_url('portal/dynamicSetting/'.$dataObj->data_id);?>'
						target="_blank" class="btn btn-info">动态设置</a>
					<button class='btn btn-info dev-info'
						data_id='<?php echo $dataObj->data_id;?>'
						model='<?php echo $dataObj->model;?>'>详细信息</button>
				</p>    
    <?php }?>
    </div>
			<table
				class="table table-bordered responsive table-striped table-sortable"
				>
				<thead>
					<tr>
						<th>序号</th>
						<th>变量名</th>
						<th>当前值</th>
					</tr>
				</thead>
				<tbody class='rt-data pmac600a' id='<?php echo $dataObj->data_id;?>'>
                     <tr>
        				<td>1</td>
        				<td>电流(安培)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>2</td>
        				<td>电压(伏特)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>3</td>
        				<td>有功功率(瓦)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>4</td>
        				<td>无功功率(乏)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>5</td>
        				<td>功率因数</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>6</td>
        				<td>频率(赫兹)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>7</td>
        				<td>有功电度(千瓦时)</td>
        				<td><span></span></td>
        			</tr>
        			<tr>
        				<td>8</td>
        				<td>无功电度(千乏时)</td>
        				<td><span></span></td>
        			</tr>
                </tbody>
			</table>
<?php if(isset($isMobile) && $isMobile){?>
    </div>
</div>
<?php }?>
