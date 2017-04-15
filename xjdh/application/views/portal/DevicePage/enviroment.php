<div class="tab-pane active" id='tab-data'>
	<div class="tab-widget tabbable tabs-left chat-widget">
	    <?php if(!isset($isMobile) || !$isMobile){ ?>
		<ul class="nav nav-tabs">
			<li class="active"><a href="####"> <?php echo $room_name;?>环境</a></li>
		</ul>
		<?php } ?>
		<div class="tab-content" style='height: 800px;'>
			<div id="devDate">
				<table
					class="table table-bordered responsive table-striped table-sortable">
					<thead>
						<tr class="trth">
							<th width="50">序号</th>
							<th width="300">名称</th>
							<th>实时数据状态</th>
							<th>最后数据时间</th>
						<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<th>操作</th>
						<?php } ?>
					</tr>
					</thead>
					<tbody>
				    <?php $index = 1;foreach ($dataList as $dataObj){	?>
		                      <tr class='rt-data' data_type='aidi'
							data_id='<?php echo $dataObj->data_id;?>'
							id='device-<?php echo $dataObj->data_id;?>'>
							<td><?php echo $index++;?></td>
							<td><a class='dev-info' data_id='<?php echo $dataObj->data_id;?>'
								model='<?php echo $dataObj->model;?>'><?php echo htmlentities($dataObj->name, ENT_COMPAT, "UTF-8");?></a></td>
							<td></td>
							<td class='data-time'></td>
						<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<td class="hasThreshold"><button
									data_id='<?php echo $dataObj->data_id;?>' field="value"
									model='<?php echo $dataObj->model;?>'
									class="btn btn-warning setThreshold">设置告警规则</button></td>
						<?php } ?>
					</tr>
		                  <?php } ?>
		                  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>


